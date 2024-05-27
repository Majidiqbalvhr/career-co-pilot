@extends('layout.auth')
@section('title')
    {{ ('Login') }}
@endsection
@section('contents')
    <!--login registration section start-->
    <main class="page-wrapper">
        <!-- Start Sign up Area  -->
        <div class="signup-area">
            <div class="wrapper">
                <div class="row">
                    <div class="col-lg-6 bg-color-blackest left-wrapper">
                        <div class="sign-up-box">
                            <div class="signup-box-top">
                                <img src="assets/images/logo/logo.png" alt="sign-up logo">
                            </div>
                            <div class="signup-box-bottom">
                                <div class="signup-box-content">
                                    <div class="social-btn-grp">
                                        <a class="btn-default btn-border" href="#">
                                            <span class="icon-left"><img src="assets/images/sign-up/google.png" alt="Google Icon"></span>Login with Google
                                        </a>
                                        <a class="btn-default btn-border" href="#">
                                            <span class="icon-left"><img src="assets/images/sign-up/facebook.png" alt="Google Icon"></span>Login with Facebook
                                        </a>
                                    </div>
                                    <div class="text-social-area">
                                        <hr>
                                        <span>Or continue with</span>
                                        <hr>
                                    </div>
                                    <form>
                                        <div class="input-section mail-section">
                                            <div class="icon"><i class="fa-sharp fa-regular fa-envelope"></i></div>
                                            <input type="email" placeholder="Enter email address">
                                        </div>
                                        <div class="input-section password-section">
                                            <div class="icon"><i class="fa-sharp fa-regular fa-lock"></i></div>
                                            <input type="password" placeholder="Password">
                                        </div>
                                        <div class="forget-text"><a class="btn-read-more" href="#"><span>Forgot password</span></a></div>
                                        <button type="submit" class="btn-default">Sign In</button>
                                    </form>
                                </div>
                                <div class="signup-box-footer">
                                    <div class="bottom-text">
                                        Don't have an account? <a class="btn-read-more ml--5" href="signup.html"><span>Sign Up</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 right-wrapper">
                        <div class="client-feedback-area">
                            <div class="single-feedback">
                                <div class="inner">
                                    <div class="meta-img-section">
                                        <a class="image" href="#">
                                            <img src="assets/images/team/team-02sm.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="rating">
                                        <a href="#rating">
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                        </a>
                                        <a href="#rating">
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                        </a>
                                        <a href="#rating">
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                        </a>
                                        <a href="#rating">
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                        </a>
                                        <a href="#rating">
                                            <i class="fa-sharp fa-solid fa-star"></i>
                                        </a>
                                    </div>
                                    <div class="content">
                                        <p class="description">Rainbow-Themes is now a crucial component of our work! We made it simple to collaborate across departments by grouping our work</p>
                                        <div class="bottom-content">
                                            <div class="meta-info-section">
                                                <h4 class="title-text mb--0">Guy Hawkins</h4>
                                                <p class="desc mb--20">Nursing Assistant</p>
                                                <div class="desc-img">
                                                    <img src="assets/images/brand/brand-t.png" alt="Brand Image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="close-button" href="index.html">
                <i class="fa-sharp fa-regular fa-x"></i>
            </a>
        </div>
        <!-- End Sign up Area  -->
    </main>

    <!-- All Scripts  -->
    <div class="rbt-progress-parent">
        <svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!--login registration section end-->
@endsection
