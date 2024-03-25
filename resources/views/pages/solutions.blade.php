@extends('home.app')
@section('content')
    <!--Page Title-->
    <section class="page-banner" style="background-image:url(images/3.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix mt-5 text-center p-5">
                <h1>Industrial Automation</h1>

            </div>
        </div>
    </section>
    <!--End Page Title-->





    <!--Sidebar Page Container-->
    <section>

        <div class="container">
            <div class="row p-5">
                <div class="col-12 col-md-4">
                    <div class="sidebar-widget categories-two d-fex flex-direction-row">
                        <div class="widget-content col-12">
                            <!-- Services Category -->

                            {{-- putting active class to highlight the side bar  --}}
                            @php
                                $currentPath = Request::path();
                            @endphp

                            <ul class="services-categories">
                                @foreach ($content_list as $item)
                                    <li class="{{ '/' . $currentPath == $item->link ? 'active' : '' }}">
                                        <a href="{{ @$item->link }}">{{ @$item->title }}</a>
                                    </li>
                                @endforeach
                            </ul>




                        </div>
                        @if(!empty($content['image']))
                        @php $array = json_decode($content['image'], true); @endphp
                        @foreach ($array as $image)
                            <div class="image col-12 mt-5    d-flex justify-content-center align-items-center">
                                <img class="solution__content--size" src="{{ asset('content/' . @$image) }}" alt="{{ $image }}" />
                            </div>
                        @endforeach
                        @endif



                        <div class="image col-12 mt-5">
                            <img src="images/boiler.jpg" alt="" />
                        </div>
                        <div class="image col-12 mt-5">
                            <img src="images/boiler-1.jpg" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="services-detail">
                        <div class="inner-box">

                            <div class="lower-content">
                                <!-- Title Box -->
                                <div class="title-box">
                                    <div class="title">Connectinfer</div>
                                    <h2>{{ @$content->title }}</h2>
                                </div>
                               

                                <div>
                                    {!! @$content->description !!}
                                </div>

                                <br>
                                <div class="learn">
                                    <a href="{{ url('contact') }}" class="theme-btn btn-style-three">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>

    <!-- Category Widget -->
@endsection
