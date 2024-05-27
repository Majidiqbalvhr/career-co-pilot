<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
//    function __construct()
//    {
////        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
//        $this->middleware('permission:product-create', ['only' => ['create','store']]);
//        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
//        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
//    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return view('index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);
//        $role = Role::create(['name' => 'writer']);
        $role = Product::create([
            'name' => $request->name,
            'detail' => $request->detail,
        ]);
        return redirect('products')->with('status','Product Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);
        $product = $product->update([
            'name' => $request->name,
            'detail' => $request->detail,
        ]);
        return redirect('products')->with('status','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('products')->with('status', 'Product deleted successfully.');
    }
}
