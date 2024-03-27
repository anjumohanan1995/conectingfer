@extends('home.app')
@section('content')
    <!--Page Title-->
    <section class="page-banner" style="background-image:url(images/3.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix  mt-5 text-center p-5">
                <h1>Technology</h1>

            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side / Our Blog-->
                <div class="content-side col-12">
                    <div class="our-blog">

                        <div class="row">
                            @foreach ($datas as $data)
                            <div class="col-12 col-md-6">
                                <div class="news-block-two">
                                    <div class="inner-box">
                                        <div class="image wow fadeInDown" data-wow-delay="0ms" data-wow-duration="1500ms">
                                            <a href="javascript:void(0)"><img src="{{asset('/Technology/'.@$data->image)}}" alt="" /></a>
                                        </div>
                                        <div class="lower-content wow fadeInUp" data-wow-delay="0ms"
                                            data-wow-duration="1500ms">
                                            <div class="content-inner">

                                                <h3><a href="javascript:void(0)">{{ @$data->title }}</a></h3>
                                                <div class="text">{!! @$data->description !!}</div>


                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            @endforeach
                            
                          
                        </div>
                   


                        <!-- News Block -->



                    </div>
                </div>

                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar padding-left">


                    </aside>
                </div>

            </div>
        </div>
    </div>
@endsection
