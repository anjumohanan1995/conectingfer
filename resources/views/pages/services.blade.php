@extends('home.app')
@section('content')




<!--Page Title-->
<section class="page-banner" style="background-image:url(images/3.jpg);">
    <div class="auto-container">
        <div class="inner-container clearfix mt-5 text-center p-5">
            <h1>Our Services</h1>
            
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- Services Section Three -->
<section class="services-section-three style-two">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title">
            <div class="row">
                <div class="col-lg-12 col-md-12 wow fadeInLeft" data-wow-delay="0ms"
                    data-wow-duration="1500ms">

                    <h2 class="text-center">End-to-End Services for IoT Solution Development</h2>
                </div>

            </div>
        </div>

        <div class="row">
            <!-- Services Block Three -->
            @foreach ($datas as $data)
            <div class="services-block-three col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="image">
                        <a href="javascript:void(0)"><img src="{{ asset('Services/' . @$data->image) }}" alt="" /></a>
                    </div>
                    <div class="lower-content">
                        <h3><a href="javascript:void(0)">{{ @$data->title }}</a></h3>
                        <div class="text">{!! @$data->description !!}</div>
                        <a href="{{url('/contact')}}" class="read-more">Learn More<span
                                class="fas fa-angle-right"></span></a>
                    </div>
                </div>
            </div> 
            @endforeach
         
           

            <!-- <p>From concept to consumer, ConnectInfer delivers customized, end-to-end solutions that
                solve critical challenges and accelerate technology adoption. </p> -->

        </div>
    </div>
</section>
<!-- End Services Section Three -->

<!-- Skill Section -->
<!-- <section class="skill-section" style="background-image:url(images/1.jpg)">
    <div class="auto-container">
        <div class="row clearfix">

           
            <div class="skill-column col-xl-7 col-lg-12 col-md-12 col-sm-12">
                <div class="inner-column">
                    <h2>We produce positive results from ever-growing <span>Industrial &
                            manufacturing</span> estates.</h2>

                   
                    <div class="skills">
                       
                        <div class="skill-item">
                            <div class="skill-header clearfix">
                                <div class="skill-title">Latest Equipemnts Used</div>
                                <div class="skill-percentage">
                                    <div class="count-box"><span class="count-text" data-speed="2000"
                                            data-stop="95">0</span>%</div>
                                </div>
                            </div>
                            <div class="skill-bar">
                                <div class="bar-inner">
                                    <div class="bar progress-line" data-width="95"></div>
                                </div>
                            </div>
                        </div>
                      
                        <div class="skill-item">
                            <div class="skill-header clearfix">
                                <div class="skill-title">Factories Production</div>
                                <div class="skill-percentage">
                                    <div class="count-box"><span class="count-text" data-speed="2000"
                                            data-stop="80">0</span>%</div>
                                </div>
                            </div>
                            <div class="skill-bar">
                                <div class="bar-inner">
                                    <div class="bar progress-line" data-width="80"></div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="skill-item">
                            <div class="skill-header clearfix">
                                <div class="skill-title">Management & Services</div>
                                <div class="skill-percentage">
                                    <div class="count-box"><span class="count-text" data-speed="2000"
                                            data-stop="65">0</span>%</div>
                                </div>
                            </div>
                            <div class="skill-bar">
                                <div class="bar-inner">
                                    <div class="bar progress-line" data-width="65"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>



        </div>
    </div>
</section> -->
<!-- End Skill Section -->

<!-- Clients Section -->
<!-- <section class="clients-section">
    <div class="auto-container">
        <div class="logo-icon flaticon-settings-4"></div>
      
        <div class="sec-title centered">
            <div class="title">We are Solustrid</div>
            <h2>Client’s Reviews</h2>
        </div>

        <div class="single-item-carousel owl-carousel owl-theme">

          
            <div class="testimonial-block">
                <div class="inner-box">
                    <div class="image-outer">
                      
                        <div class="quote quote-left">
                            <span class="icon flaticon-right-quotation-sign"></span>
                        </div>
                       
                        <div class="quote quote-right">
                            <span class="icon flaticon-right-quotation-sign"></span>
                        </div>
                        <div class="image">
                            <img src="images/author-1.jpg" alt="" />
                        </div>
                    </div>
                    <div class="text">Since vindictively over agile the some far well besides constructively
                        well airy then one during with close excellent grabbed gosh contrary far dalmatian
                        upheld intrepid bought and toucan majestic more some apart dear boa much cast falcon
                        a dwelled ouch busy.</div>
                    <h3>James Shane Well</h3>
                    <div class="location">California, USA</div>
                </div>
            </div>

         
            <div class="testimonial-block">
                <div class="inner-box">
                    <div class="image-outer">
                     
                        <div class="quote quote-left">
                            <span class="icon flaticon-right-quotation-sign"></span>
                        </div>
                       
                        <div class="quote quote-right">
                            <span class="icon flaticon-right-quotation-sign"></span>
                        </div>
                        <div class="image">
                            <img src="images/author-1.jpg" alt="" />
                        </div>
                    </div>
                    <div class="text">Since vindictively over agile the some far well besides constructively
                        well airy then one during with close excellent grabbed gosh contrary far dalmatian
                        upheld intrepid bought and toucan majestic more some apart dear boa much cast falcon
                        a dwelled ouch busy.</div>
                    <h3>James Shane Well</h3>
                    <div class="location">California, USA</div>
                </div>
            </div>

           
            <div class="testimonial-block">
                <div class="inner-box">
                    <div class="image-outer">
                       
                        <div class="quote quote-left">
                            <span class="icon flaticon-right-quotation-sign"></span>
                        </div>
                      
                        <div class="quote quote-right">
                            <span class="icon flaticon-right-quotation-sign"></span>
                        </div>
                        <div class="image">
                            <img src="images/author-1.jpg" alt="" />
                        </div>
                    </div>
                    <div class="text">Since vindictively over agile the some far well besides constructively
                        well airy then one during with close excellent grabbed gosh contrary far dalmatian
                        upheld intrepid bought and toucan majestic more some apart dear boa much cast falcon
                        a dwelled ouch busy.</div>
                    <h3>James Shane Well</h3>
                    <div class="location">California, USA</div>
                </div>
            </div>

        </div>

    </div>
</section> -->
<!-- End Clients Section -->

<!-- Sponsors Section -->
<!-- <section class="sponsors-section alternate-2">
    <div class="auto-container">
        <div class="factories-icons-carousel owl-carousel owl-theme">

            <div class="logo">
                <a href="#"><img src="images/6.png" alt="" /></a>
            </div>

            <div class="logo">
                <a href="#"><img src="images/7.png" alt="" /></a>
            </div>

            <div class="logo">
                <a href="#"><img src="images/8.png" alt="" /></a>
            </div>

            <div class="logo">
                <a href="#"><img src="images/9.png" alt="" /></a>
            </div>

            <div class="logo">
                <a href="#"><img src="images/10.png" alt="" /></a>
            </div>

            <div class="logo">
                <a href="#"><img src="images/6.png" alt="" /></a>
            </div>

            <div class="logo">
                <a href="#"><img src="images/7.png" alt="" /></a>
            </div>

            <div class="logo">
                <a href="#"><img src="images/8.png" alt="" /></a>
            </div>

            <div class="logo">
                <a href="#"><img src="images/9.png" alt="" /></a>
            </div>

            <div class="logo">
                <a href="#"><img src="images/10.png" alt="" /></a>
            </div>
        </div>
    </div>
</section> -->
<!-- End Sponsors Section -->

@endsection
