@extends('frontend.main_master')

@section('main')

@section('title')
Home | Katsucode Website
@endsection

    <!-- banner-area -->
    @include('frontend.home.banner')
    <!-- banner-area-end -->
    <!-- about-area -->
    @include('frontend.home.about')
    <!-- about-area-end -->
    <!-- services-area -->
    @include('frontend.home.service')
    <!-- services-area-end -->
    <!-- work-process-area -->
    @include('frontend.home.workprocess')
    <!-- work-process-area-end -->
    <!-- portfolio-area -->
    @include('frontend.home.portfolio')
    <!-- portfolio-area-end -->
    <!-- partner-area -->
    @include('frontend.home.parthner')
    <!-- partner-area-end -->
    <!-- testimonial-area -->
    @include('frontend.home.testimonial')
    <!-- testimonial-area-end -->
    <!-- blog-area -->
    @include('frontend.home.blog')
    <!-- blog-area-end -->
    <!-- contact-area -->
    @include('frontend.home.contact')
    <!-- contact-area-end -->
@endsection
