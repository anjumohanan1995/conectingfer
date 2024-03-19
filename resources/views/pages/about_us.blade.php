@extends('home.app')
@section('content')
    <!--Page Title-->
    <section class="page-banner style-two" style="background-image:url(images/about-page-title-bg.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix mt-5 text-center p-5">
                <h1>About Us </h1>

            </div>
        </div>
    </section>
    <!--End Page Title-->




    <!-- Fun Facts Section -->
    <section class="about-section-two" style="background-image:url(images/about-section-two-bg.png);">
        <div class="auto-container">
            <div class="title-style-one style-two centered">
                <div class="icon"><img src="images/icons/logo-icon.png" alt=""></div>

                <h2>{{ @$data->title }}</h2>
                <div class="text">{{ @$data->sub_title }}</div>
            </div>

            <div class="row">
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <figure class="image"><img
                                    src="{{asset('/Aboutus/'.@$data->image)}}" alt=""></figure>
                    </div>
                </div>

                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="text">
                           {!! @$data->content !!}
                            <div class="learn">
                                <a href="{{url('/contact')}}" class="theme-btn btn-style-three">Learn More</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fun Facts Section -->
@endsection
