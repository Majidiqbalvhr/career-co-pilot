<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Pay Mob</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/media/logos/PayMob_Favicon.png">

    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
          type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('backend/assets/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Toaster Css-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>

<body>
<div class="bg-overlay"></div>
<div class="wrapper-page">
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-body">
                <div class="text-center mt-4">
                    <div class="mb-3">
                        <a href="index.html" class="auth-logo">
                            <img src="assets/media/logos/PayMob.png" height="30" class="logo-dark mx-auto" alt="">
                            <img src="{{ asset('backend/images/logo-light.png') }}" height="30"
                                 class="logo-light mx-auto" alt="">
                        </a>
                    </div>
                </div>

                <h4 class="text-muted text-center font-size-18"><b>Register</b></h4>

                <div class="p-3">
                    <form class="form-horizontal mt-3" method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group mb-3 row">
                            <div class="col-12">
                                <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name"
                                       required autofocus autocomplete="name" placeholder="Name" />
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col-12">
                                <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email"
                                       required autofocus autocomplete="email" placeholder="Email" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <div class="col-12">
                                <input class="form-control" id="email_confirmation" type="email" name="email_confirmation"
                                       required autofocus autocomplete="email" placeholder="Confirm Email" />
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <div class="col-12">
                                <input class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" type="text" name="phone_number" required placeholder="Enter Phone Number" pattern="[0-9]{8,}">
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group mb-3 row">
                            <div class="col-12">
                                <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password"
                                       required autofocus autocomplete="new-password" placeholder="Password" />
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col-12">
                                <input class="form-control" id="password_confirmation" type="password" name="password_confirmation"
                                       required autofocus autocomplete="new-password" placeholder="Confirm Password" />
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <div class="col-12">
                                <input class="form-control @error('profile_picture') is-invalid @enderror" id="profile_picture" type="file" accept=".jpg, .jpeg, .png" name="profile_picture">
                                @error('profile_picture')
                                <span id="profile_picture_error" class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="btn btn-info w-100 waves-effect waves-light">
                                {{ __('Register') }}
                            </button>
                        </div>
                        <div class="form-group mt-2 mb-0 row">
                            <div class="col-12 mt-3 text-center">
                                <a href="{{ route('login') }}">Already registered? Login here.</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end cardbody -->
        </div>
        <!-- end card -->
    </div>
    <!-- end container -->
</div>
<!-- end -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#profile_picture').on('change', function () {
            var input = this;
            var image = input.files[0];
            var errorContainer = $('#profile_picture_error');

            // Reset error message
            errorContainer.text('');

            if (image) {
                // Check file type
                if (!/image\/(jpg|jpeg|png)/.test(image.type)) {
                    errorContainer.text('Please upload a valid image (jpg, jpeg, or png).');
                    input.value = ''; // Clear the input
                    return;
                }

                // Check file size (in bytes)
                if (image.size > 2097152) { // 2 MB
                    errorContainer.text('The image file size should be less than 2 MB.');
                    input.value = ''; // Clear the input
                    return;
                }
            }
        });
    });
</script>

<!-- JAVASCRIPT -->
<script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('backend/js/app.js') }}"></script>
{{-- Toaster js --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


{{-- ================================================ --}}
</body>

</html>
