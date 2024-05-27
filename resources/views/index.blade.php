@extends('layout.app')
@section('title')
    {{ ('Welcome') }}
@endsection
@section('contents')
    <!--landing Page section start-->
    @include('frontend.default.inc.header')
    @include('frontend.default.pages.popup-mobile-menu')
    @include('frontend.default.pages.slider')
    @include('frontend.default.pages.rating')
    @include('frontend.default.pages.brand')
    @include('frontend.default.pages.ai_models')
    @include('frontend.default.pages.ai_models')
    @include('frontend.default.pages.service')
    @include('frontend.default.pages.service')
    @include('frontend.default.pages.advance_service')
    @include('frontend.default.pages.advance_ai_models')
    @include('frontend.default.pages.cta')
    @include('frontend.default.pages.pricing')
    @include('frontend.default.pages.aiwave-service')
    @include('frontend.default.pages.testimonial')
    @include('frontend.default.pages.rating')
    @include('frontend.default.pages.feedback_area')
    @include('frontend.default.inc.footer')
    <!--Landing Page registration section end-->
@endsection
