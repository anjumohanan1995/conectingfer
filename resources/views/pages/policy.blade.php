@extends('home.app')
@section('content')
<!--Page Title-->
<section class="page-banner" style="background-image:url(images/3.jpg);">
    <div class="auto-container">
        <div class="inner-container clearfix mt-5 text-center p-5">
            <h1>{{ @$data->title }}</h1>

        </div>
    </div>
</section>
<!--End Page Title-->




    <!-- Fun Facts Section -->
    <section>

        <div class="container">
            <div class="row p-5">
                <div class="col-12 col-md-4">

                </div>
                <div class="col-12 col-md-12">
                    <div class="services-detail">
                        <div class="inner-box">

                            <div class="lower-content">
                                <!-- Title Box -->
                                <div class="title-box">
                                    <div class="title">Connectinfer</div>
                                    <h2>{{ @$data->sub_title }}</h2>
                                </div>


                                {!! @$data->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!-- Fun Facts Section -->
@endsection
