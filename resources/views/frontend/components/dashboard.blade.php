@extends('frontend.layouts.app')
@section('content')
    <main class="main">
        @include('frontend.pages.dashboard.body_header')
        <!--End hero slider-->
        @include('frontend.pages.dashboard.body_category')
       {{-- @include('frontend.pages.dashboard.best_brand')--}}
        <!--End category slider-->
        {{--@include('frontend.pages.dashboard.banner')--}}
        <!--End banners-->
        @include('frontend.pages.dashboard.product-tab')
        <!--Products Tabs-->
        @include('frontend.pages.dashboard.middle_product')
        <!--End 4 banners-->
        @include('frontend.pages.dashboard.best_selling')
        <!--End Best Sales-->
        @include('frontend.pages.dashboard.deal_day')
        <!--End Deals-->
        @include('frontend.pages.dashboard.top_selling')
        <!--End 4 columns-->
    </main>
@endsection
