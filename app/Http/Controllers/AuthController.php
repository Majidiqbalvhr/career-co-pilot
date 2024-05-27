<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use function PHPUnit\Framework\result;
use function Symfony\Component\Mime\to;


class AuthController extends Controller
{
    public function forget_view()
    {
        return view('auth.forgetpassword');
    }
    public function createregistration()
    {
        return View('auth.register');
    }
    public function view_login()
    {
        return view('auth.login');
    }
    protected function login(LoginRequest $request)
    {
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            $user = User::where('id', auth()->id())->with('roles')->first();
            if ($user->hasRole('Admin')  || $user->hasRole('SuperAdmin'))
            {
                $notificationMessage = "login success";
                return redirect()->route('products.index')->with('success', $notificationMessage);
            }
            else if($user->hasRole('User'))
            {
                $notificationMessage = "login success";
                return redirect()->route('products.index')->with('success', $notificationMessage);
            }

        }
        else{
            $notificationMessage = "login failed";
            return redirect()->route('login')->with('error', $notificationMessage);
        }
    }
    public function Registration(RegisterRequest $request)
    {

        $attribute = $request->all();
        $attribute['password'] = Hash::make($attribute['password']);
        $profilePicture = $request->file('profile_picture');
        if ($profilePicture)
        {
            $publicPath = public_path('ProfilePicture');
            $profilePictureName = time().'.'.$profilePicture->getClientOriginalExtension();
            $profilePicture->move($publicPath, $profilePictureName);
            $attribute['profile_picture'] = $profilePictureName;
        }
        $user = User::create($attribute);
        $userRole = Role::whereName('User')->first();
        $user->roles()->attach($userRole);
        if ($user) {
            $notificationMessage = "User registration successful. Please log in.";
            return redirect()->route('login')->with('success', $notificationMessage);
        } else {
            // User creation failed, so return to the login page with an error message
            $notificationMessage = "User registration failed. Please try again.";
            return redirect()->route('login')->with('error', $notificationMessage);
        }
    }
    public function destroy()
    {
        $user = Auth::user();
        Auth::logout();
        Session::invalidate();
        Session::regenerate();
        $user->tokens->each(function ($token, $key) {
            $token->delete();
        });
        return redirect()->route('/');
    }
    public function index()
    {
        if($userId = auth()->user()->type == "Admin")
        {
            return redirect()->route('admin.dashboard');
        }else
        {
            return redirect()->route('user.dashboard');

        }
    }
}
