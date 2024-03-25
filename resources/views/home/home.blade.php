@extends('home.app')
@section('content')
    <!--Main Slider-->
    <section class="main-slider">

        <div class="rev_slider_wrapper fullwidthbanner-container" id="rev_slider_one_wrapper" data-source="gallery">
            <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
                <ul>
                    @if(count(@$sliders_top) > 0)
                    @php
                        $index = 1688; // Initialize the index value outside the loop
                    @endphp
                    @foreach ($sliders_top as $slider)
                    <li data-transition="parallaxvertical" data-description="Slide Description" data-easein="default"
                    data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade"
                    data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-{{ $index }}" data-masterspeed="default"
                    data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5=""
                    data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0"
                    data-saveperformance="off" data-slotamount="default" data-thumb="{{ asset('/admin/uploads/thumbnails/'.$slider->image)}}">
                    <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10"
                        data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{ asset('/admin/uploads/thumbnails/'.$slider->image)}}">

                    <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                        data-type="text" data-height="none" data-width="['650','650','650','450']"
                        data-whitespace="normal" data-hoffset="['15','15','15','15']"
                        data-voffset="['-10','-10','-80','-80']" data-x="['left','left','left','left']"
                        data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                        data-frames='[{"delay":0,"speed":1500,"frame":"0","from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                        <div class="border-layer"></div>
                    </div>

                    <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                        data-type="text" data-height="none" data-width="['650','650','650','450']"
                        data-whitespace="normal" data-hoffset="['80','80','15','15']"
                        data-voffset="['-60','-60','-80','-80']" data-x="['left','left','left','left']"
                        data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                        data-frames='[{"delay":1000,"speed":1500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                        <h2>{{ @$slider->title }}</h2>
                    </div>

                    <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                        data-type="text" data-height="none" data-width="['650','650','650','450']"
                        data-whitespace="normal" data-hoffset="['80','80','15','15']"
                        data-voffset="['55','55','30','30']" data-x="['left','left','left','left']"
                        data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                        data-frames='[{"delay":1500,"speed":1500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                        <div class="text"></div>
                    </div>

                    <div class="tp-caption tp-resizeme" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                        data-type="text" data-height="none" data-whitespace="normal"
                        data-width="['650','650','650','450']" data-hoffset="['270','270','15','15']"
                        data-voffset="['155','155','120','120']" data-x="['left','left','left','left']"
                        data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                        data-frames='[{"delay":2000,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                        <div class="link-box">
                            <a href="{{ @$slider->button_url }}" class="theme-btn btn-style-two">{{ @$slider->button_text }}</a>
                        </div>
                    </div>

                    <div class="tp-caption tp-resizeme" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                        data-type="text" data-height="none" data-whitespace="normal"
                        data-width="['650','650','650','450']" data-hoffset="['480','480','15','15']"
                        data-voffset="['155','155','120','120']" data-x="['left','left','left','left']"
                        data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                        data-frames='[{"delay":2500,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                        <div class="icons-box clearfix">
                            <span class="icon flaticon-manufacturing"></span>
                            <span class="icon flaticon-robot-1"></span>
                            <span class="icon flaticon-helmet-2"></span>
                        </div>
                    </div>
                    @php
                    $index++; // Increment the index value for the next iteration
                @endphp
                </li>

                    @endforeach
                    @endif
                  
                </ul>

            </div>
        </div>

        <ul class="social-links clearfix">

            <!-- <li><a href="index-3.html"><i class="fab fa-facebook-f"></i></a></li> -->

            <li><a href="index-3.html"><i class="fab fa-linkedin"></i></a></li>

            <li><a href="index-3.html"><i class="fab fa-twitter"></i></a></li>

            <!-- <li><a href="index-3.html"><i class="fab fa-dribbble"></i></a></li> -->

        </ul>
    </section>
    <!--End Main Slider-->

    <!-- Innovation Section -->
    <section class="innovation-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Content Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!-- Sec Title -->
                        <div class="sec-title wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="title">We are connectifer</div>
                            <h2>{{ @$innovation->title }}</h2>
                        </div>
                      {!! @$innovation->description !!}

                    </div>
                </div>

                <!-- Imaages Column -->
                <div class="images-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        @if (!empty($innovation->image))
                        @php $inntns = json_decode($innovation->image, true); @endphp
                        @foreach ($inntns as $inn_img)
                        <div class="image wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <img src="{{ asset('innovations/' . $inn_img) }}" alt="" />
                        </div>
                        @endforeach                 
                        @endif
                   
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Innovation Section -->

    <!-- Services Section -->
    <!--  -->

    <!-- <section class="ds text-sm-left text-center container-px-0 c-gutter-0">
          <div class="container-fluid">
           <div class="row service-v2">
            <div class="col-sm-6 col-md-4 col-xl-2">
             <div class="icon-box service-single with-icon layout2 ds text-center">
              <a class="link-icon" href="service-single.html">
               <div class="icon-styled fs-50">
                <i class="ico ico-refinery"></i>
               </div>
              </a>
              <a href="service-single.html">
               <h5>
                Thermal Power
               </h5>
              </a>

              <p>Lorem ipsum dolor amet consectetur</p>
              <a class="btn btn-outline-darkgrey" href="service-single.html">
               <i class="fas fa-chevron-right"></i>
              </a>
             </div>
            </div>
            <div class="col-sm-6 col-md-4 col-xl-2">
             <div class="icon-box service-single with-icon layout2 ds text-center">
              <a class="link-icon" href="service-single.html">
               <div class="icon-styled fs-50">
                <i class="ico ico-tank"></i>
               </div>
              </a>
              <a href="service-single.html">
               <h5>
                Oil Platform
               </h5>
              </a>

              <p>Adipisicing elit, sed do eiusmod tempor</p>
              <a class="btn btn-outline-darkgrey" href="service-single.html">
               <i class="fas fa-chevron-right"></i>
              </a>
             </div>
            </div>
            <div class="col-sm-6 col-md-4 col-xl-2">
             <div class="icon-box service-single with-icon layout2 ds text-center">
              <a class="link-icon" href="service-single.html">
               <div class="icon-styled fs-50">
                <i class="ico ico-oil"></i>
               </div>
              </a>
              <a href="service-single.html">
               <h5>
                Gas Flaring
               </h5>
              </a>

              <p>Incididunt labore dolore magna aliqua</p>
              <a class="btn btn-outline-darkgrey" href="service-single.html">
               <i class="fas fa-chevron-right"></i>
              </a>
             </div>
            </div>
            <div class="col-sm-6 col-md-4 col-xl-2">
             <div class="icon-box service-single with-icon layout2 ds text-center">
              <a class="link-icon" href="service-single.html">
               <div class="icon-styled fs-50">
                <i class="ico ico-extraction"></i>
               </div>
              </a>
              <a href="service-single.html">
               <h5>
                Oil Pump
               </h5>
              </a>

              <p>Utenim adminim veniam quis nostrud</p>
              <a class="btn btn-outline-darkgrey" href="service-single.html">
               <i class="fas fa-chevron-right"></i>
              </a>
             </div>
            </div>
            <div class="col-sm-6 col-md-4 col-xl-2">
             <div class="icon-box service-single with-icon layout2 ds text-center">
              <a class="link-icon" href="service-single.html">
               <div class="icon-styled fs-50">
                <i class="ico ico-oil-tanker"></i>
               </div>
              </a>
              <a href="service-single.html">
               <h5>
                Oil Refinaery
               </h5>
              </a>

              <p>Ullamco laboris nisi ut aliquip veniam exea</p>
              <a class="btn btn-outline-darkgrey" href="service-single.html">
               <i class="fas fa-chevron-right"></i>
              </a>
             </div>
            </div>
            <div class="col-sm-6 col-md-4 col-xl-2">
             <div class="icon-box service-single with-icon layout2 ds text-center">
              <a class="link-icon" href="service-single.html">
               <div class="icon-styled fs-50">
                <i class="ico ico-pipe"></i>
               </div>
              </a>
              <a href="service-single.html">
               <h5>
                Factory
               </h5>
              </a>

              <p>Commodo conquat duis aute irure dolor</p>
              <a class="btn btn-outline-darkgrey" href="service-single.html">
               <i class="fas fa-chevron-right"></i>
              </a>
             </div>
            </div>
           </div>
          </div>
         </section> -->






    <section class="services-section">
        <div class="auto-container">
            <div class="row clearfix">
                @foreach ($home_services as $home_service)
                <!-- Services Block -->
                <div class="services-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="big-icon flaticon-settings-4"></div>
                        <div class="icon-box">
                            {!! @$home_service->icon !!}
                        </div>
                        <h3><a href="services-1.html">{{ @$home_service->title }}</a></h3>
                        {!! @$home_service->description !!}
                        <a class="arrow" href="{{ url('contact') }}"><span class="icon flaticon-next"></span></a>
                    </div>
                </div>
                @endforeach
               

            </div>
        </div>
    </section>




    <!-- End Services Section -->


    <section class="chooseus-style-two">

        <div class="pattern-layer" style="background-image: url(images/shape-18.png);"></div>

        <div class="auto-container">

            <div class="row clearfix">

                <div class="col-lg-6 col-md-12 col-sm-12 left-column">

                    <div class="inner-column wow fadeInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">

                        <div class="sec-title light">

                            <h5>{{ @$setting->why_choose_subtitle }}</h5>

                            <h2>{{ @$setting->why_choose_title }}</h2>

                            <div class="divider" style="background-image: url(images/divider-2.png);"></div>

                        </div>

                        <!-- <div class="text">

               <p>When our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed every pain avoided but in certain circumstances.</p>

              </div> -->

                        <div class="chooseus-block-one">

                            <!-- <div class="inner-box">

                <figure class="icon-box">

                 <img src="images/icon-7.png" alt="">

                 <div class="shape" style="background-image: url(images/icons-shape-1.png);"></div>

                </figure>

                <h3>Incentive for Results</h3>

                <p>Aside from get a few focal points from ithas any to criticize an outcomes.</p>

               </div> -->

                        </div>

                    </div>

                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 right-column">

                    <div class="inner-column wow fadeInRight animated" data-wow-delay="00ms" data-wow-duration="1500ms">

                        @foreach ($why_choose_us as $choose)
                            
                       
                        <div class="chooseus-block-one">

                            <div class="inner-box">

                                <figure class="icon-box">

                                    <img src="{{ asset('why_choose_us/' . $choose->image) }}" alt="">

                                    <div class="shape" style="background-image: url(images/icons-shape-1.png);"></div>

                                </figure>

                                <h3>{{ @$choose->title }}</h3>

                                <p>{!! @$choose->description !!}</p>

                            </div>

                        </div>
                        @endforeach                  

                    </div>

                </div>

            </div>

        </div>

    </section>





    <!-- Fluid Section One -->
    <!-- <section class="fluid-section-one">
            <div class="outer-container clearfix">
                -->
    <!--Image Column-->
    <!-- <div class="image-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms" style="background-image:url(images/image-1.jpg);">
                    <figure class="image-box"><img src="images/image-1.jpg" alt=""></figure>
                    </div> -->

    <!--Content Column-->
    <!-- <div class="content-column">
                    <div class="inner-column"> -->
    <!-- Sec Title -->
    <!-- <div class="sec-title">
              <div class="title">We are connectifer</div>
              <h2>About Industry</h2>
             </div> -->
    <!-- <div class="text">Incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nos-trud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit. Sunt in culpa qui officia deseru mollit anim id est laborum unde omnis iste natus.</div>
             <ul class="list-style-one">
              <li>Leading industrial solutions with best machinery</li>
              <li>Voluptatem acusantium doloremque laudantium totam</li>
              <li>Aperiam, eaque ipsa quae ab illo inventore veritatis</li>
              <li>Quasi architecto beatae vitae dicta sunt explicabo</li>
              <li>Nemo enim ipsam voluptatem quia voluptas sit</li>
             </ul> -->
    <!-- Signature Box -->
    <!-- <div class="signature-box">
              <h4>Daniel Ricardo</h4>
              <div class="signature-img">
               <img src="images/signature.png" alt= ""/>
              </div>
             </div>
            </div>
           </div>
          </div>
         </section> -->
    <!-- End Fluid Section One -->

    <!-- Services Section Two -->
    <section class="services-section-two">
        <div class="auto-container">
            <div class="inner-container">
                <div class="big-icon flaticon-settings-4"></div>
                <!-- Sec Title -->
                <div class="sec-title light wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="row clearfix">
                        <div class="pull-left col-xl-4 col-lg-5 col-md-12 col-sm-12">
                            <div class="title">We are connectifer</div>
                            <h2>Services <br> For Industries</h2>
                        </div>
                        <div class="pull-left col-xl-8 col-lg-7 col-md-12 col-sm-12">
                            <!-- <div class="text">Aliquip ex ea commodo consequat duis aute irure dolor in reprehenderit voluptate velit sunt in culpa qui officia deseru mollit anim ipsum id est laborum.</div> -->
                        </div>
                    </div>
                </div>

                <div class="three-item-carousel owl-carousel owl-theme">
                    @foreach ($industrial_services as $in_services)
                    <!-- Services Block Two -->
                    <div class="services-block-two">
                        <div class="inner-box">
                            <div class="image">
                                <a href="#"><img src="{{ asset('Industrial_Services/' . $in_services->image) }}"
                                        alt="" /></a>
                            </div>
                            <div class="lower-content">
                                <h3><a href="building-construction.html">{{ @$in_services->title }}</a></h3>
                                {!! @$in_services->description !!}
                                <a href="{{ url('contact') }}" class="read-more">Learn More<span
                                        class="arrow flaticon-next"></span></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                  

                </div>
            </div>
        </div>
    </section>
    <!-- End Services Section Two -->





    <!-- <section class="ls s-py-xl-160 s-py-lg-130 s-py-md-90 s-py-60 text-sm-left text-center container-px-0 servicebox">
         
          <div class="container-fluid">
           <div class="row">
            <div class="col-xs-12 col-12 col-lg-6 p-0"><img src="images/service1.jpg" alt="01" /></div>
            <div class="col-xs-12 col-12 col-lg-6 p-0">
             <div class="content-center">
              <div>
               <h1 class="numbering">01.</h1> &nbsp; <span class="text-capitalizee">
                Chemical Industry
               </span>
              </div>
              <div class="clearfix"></div>
               
              
              <div class="divider-45 hidden-below-lg"></div>
              <div class="divider-30 hidden-above-lg"></div>
              <p>
               Cillum doloreu fugiat nulla pariatur excepteur si occaecat cupdatat non proident sunt culpaq officia deserunt mollt animest laborum sed perspiciatis unde omnis iste natus errosit voluptatem accuantium
               doloremque laudantium totam.
              </p>
              <div class="divider-45 hidden-below-lg"></div>
              <div class="divider-30 hidden-above-lg"></div>
              <ul class="list-styled">
               <li>Laudantium, totam rem aperiam</li>
               <li>Eaque ipsa quae ab illo inventore veritatis</li>
               <li>Quasi architecto beatae</li>
              </ul>
              <div class="divider--10"></div>
             </div>
            </div>
           </div>
          
           <div class="row">
            <div class="col-xs-12 col-12 col-lg-6 p-0">
             <div class="content-center">
              <div>
               <h1 class="numbering">02.</h1> <span class="text-capitalizee">
                Saving Technologies
               </span>
              </div>
              <div class="clearfix"></div>
              <div class="divider-45 hidden-below-lg"></div>
              <div class="divider-30 hidden-above-lg"></div>
              <p>
               Rem aperiam, eaque ipsa qillo inventore veritatis etquasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia consequuntur
               magni dolores eos.
              </p>
              <div class="divider-45 hidden-below-lg"></div>
              <div class="divider-30 hidden-above-lg"></div>
              <div class="shortcode-widget-area">
               <div class="widget widget_mailchimp">
                <p>
                 Subscribe to Our Newsletter:
                </p>

                <form class="signup" action="/">
                 <label for="mailchimp_email88">
                  <span class="screen-reader-text">Subscribe:</span>
                 </label>
                 <input id="mailchimp_email88" name="email" type="email" class="form-control mailchimp_email has-placeholder" placeholder="Email" />
                 <button type="submit" class="search-submit">
                  <span class="screen-reader-text">Subscribe</span>
                 </button>
                 <div class="response"></div>
                </form>
               </div>
              </div>
             </div>
            </div>
            <div class="col-xs-12 col-12 col-lg-6 p-0"><img src="images/service2.jpg" alt="01" /></div>
           </div>
          
           <div class="row">
            <div class="col-xs-12 col-12 col-lg-6 p-0"><img src="images/service3.jpg" alt="01" /></div>
            <div class="col-xs-12 col-12 col-lg-6 p-0">
             <div class="content-center">
              <div>
               <h1 class="numbering">03.</h1> &nbsp; <span class="text-capitalizee">
                Military Industry
               </span>
              </div>
              <div class="clearfix"></div>
              <div class="divider-45 hidden-below-lg"></div>
              <div class="divider-30 hidden-above-lg"></div>
              <p>
               Qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam. Watch our presentation:
              </p>
              
              
              <div id="countdown">
              <div id="days"></div>
              <div id="hours"></div>
              <div id="minutes"></div>
              <div id="seconds"></div>
              </div>



              
             </div>
            </div>
           </div>
          </div>
         </section> -->





    <!-- Projects Section -->
    <!-- <section class="projects-section">
          <div class="auto-container">
           
           <div class="sec-title centered">
            <div class="title">We are connectifer</div>
            <h2>Recent Projects</h2>
           </div>
           
           <div class="projects-carousel">
            <div class="image-column">
             <div class="carousel-outer">

              <div class="image-carousel owl-carousel owl-theme">
              
              
               <div class="slide-item">
                <div class="row clearfix">
                 
                 <div class="image-column col-lg-6 col-md-12 col-sm-12">
                  <div class="inner-column">
                   <div class="image">
                    <img src="images/1.jpg" alt= ""/>
                   </div>
                  </div>
                 </div>
                
                 <div class="content-column col-lg-6 col-md-12 col-sm-12">
                  <div class="inner-column">
                   <div class="title">Power & Energy</div>
                   <h3>Chemical Factory Unit</h3>
                   <div class="text">Incididunt ut labore et dolore magna aliqua. Ut enim veniam, trud exercita tion ullamco laboris nisi ut aliquip ex eac consequat duis aute irure dolor inc reprehenderit velit culpa quis labore et dolore magna aliqua nostrud exer tation ullamco laboris nisi ut aliquip irure.</div>
                   <a href="power-generation.html" class="read-more">view detail <span class="arrow fas fa-angle-right"></span></a>
                  </div>
                 </div>
                </div>
               </div>
               
               
               <div class="slide-item">
                <div class="row clearfix">
                
                 <div class="image-column col-lg-6 col-md-12 col-sm-12">
                  <div class="inner-column">
                   <div class="image">
                    <img src="images/1.jpg" alt= ""/>
                   </div>
                  </div>
                 </div>
                 
                 <div class="content-column col-lg-6 col-md-12 col-sm-12">
                  <div class="inner-column">
                   <div class="title">Power & Energy</div>
                   <h3>Chemical Factory Unit</h3>
                   <div class="text">Incididunt ut labore et dolore magna aliqua. Ut enim veniam, trud exercita tion ullamco laboris nisi ut aliquip ex eac consequat duis aute irure dolor inc reprehenderit velit culpa quis labore et dolore magna aliqua nostrud exer tation ullamco laboris nisi ut aliquip irure.</div>
                   <a href="power-generation.html" class="read-more">view detail <span class="arrow fas fa-angle-right"></span></a>
                  </div>
                 </div>
                </div>
               </div>
               
               
               <div class="slide-item">
                <div class="row clearfix">
                
                 <div class="image-column col-lg-6 col-md-12 col-sm-12">
                  <div class="inner-column">
                   <div class="image">
                    <img src="images/1.jpg" alt= ""/>
                   </div>
                  </div>
                 </div>
                
                 <div class="content-column col-lg-6 col-md-12 col-sm-12">
                  <div class="inner-column">
                   <div class="title">Power & Energy</div>
                   <h3>Chemical Factory Unit</h3>
                   <div class="text">Incididunt ut labore et dolore magna aliqua. Ut enim veniam, trud exercita tion ullamco laboris nisi ut aliquip ex eac consequat duis aute irure dolor inc reprehenderit velit culpa quis labore et dolore magna aliqua nostrud exer tation ullamco laboris nisi ut aliquip irure.</div>
                   <a href="power-generation.html" class="read-more">view detail <span class="arrow fas fa-angle-right"></span></a>
                  </div>
                 </div>
                </div>
               </div>
               
              
               <div class="slide-item">
                <div class="row clearfix">
                 
                 <div class="image-column col-lg-6 col-md-12 col-sm-12">
                  <div class="inner-column">
                   <div class="image">
                    <img src="images/1.jpg" alt= ""/>
                   </div>
                  </div>
                 </div>
                
                 <div class="content-column col-lg-6 col-md-12 col-sm-12">
                  <div class="inner-column">
                   <div class="title">Power & Energy</div>
                   <h3>Chemical Factory Unit</h3>
                   <div class="text">Incididunt ut labore et dolore magna aliqua. Ut enim veniam, trud exercita tion ullamco laboris nisi ut aliquip ex eac consequat duis aute irure dolor inc reprehenderit velit culpa quis labore et dolore magna aliqua nostrud exer tation ullamco laboris nisi ut aliquip irure.</div>
                   <a href="power-generation.html" class="read-more">view detail <span class="arrow fas fa-angle-right"></span></a>
                  </div>
                 </div>
                </div>
               </div>
               
              
               <div class="slide-item">
                <div class="row clearfix">
                
                 <div class="image-column col-lg-6 col-md-12 col-sm-12">
                  <div class="inner-column">
                   <div class="image">
                    <img src="images/1.jpg" alt= ""/>
                   </div>
                  </div>
                 </div>
                
                 <div class="content-column col-lg-6 col-md-12 col-sm-12">
                  <div class="inner-column">
                   <div class="title">Power & Energy</div>
                   <h3>Chemical Factory Unit</h3>
                   <div class="text">Incididunt ut labore et dolore magna aliqua. Ut enim veniam, trud exercita tion ullamco laboris nisi ut aliquip ex eac consequat duis aute irure dolor inc reprehenderit velit culpa quis labore et dolore magna aliqua nostrud exer tation ullamco laboris nisi ut aliquip irure.</div>
                   <a href="power-generation.html" class="read-more">view detail <span class="arrow fas fa-angle-right"></span></a>
                  </div>
                 </div>
                </div>
               </div>
               
               
               <div class="slide-item">
                <div class="row clearfix">
                
                 <div class="image-column col-lg-6 col-md-12 col-sm-12">
                  <div class="inner-column">
                   <div class="image">
                    <img src="images/1.jpg" alt= ""/>
                   </div>
                  </div>
                 </div>
                 
                 <div class="content-column col-lg-6 col-md-12 col-sm-12">
                  <div class="inner-column">
                   <div class="title">Power & Energy</div>
                   <h3>Chemical Factory Unit</h3>
                   <div class="text">Incididunt ut labore et dolore magna aliqua. Ut enim veniam, trud exercita tion ullamco laboris nisi ut aliquip ex eac consequat duis aute irure dolor inc reprehenderit velit culpa quis labore et dolore magna aliqua nostrud exer tation ullamco laboris nisi ut aliquip irure.</div>
                   <a href="power-generation.html" class="read-more">view detail <span class="arrow fas fa-angle-right"></span></a>
                  </div>
                 </div>
                </div>
               </div>
               
               
               <div class="slide-item">
                <div class="row clearfix">
                 
                 <div class="image-column col-lg-6 col-md-12 col-sm-12">
                  <div class="inner-column">
                   <div class="image">
                    <img src="images/1.jpg" alt= ""/>
                   </div>
                  </div>
                 </div>
                
                 <div class="content-column col-lg-6 col-md-12 col-sm-12">
                  <div class="inner-column">
                   <div class="title">Power & Energy</div>
                   <h3>Chemical Factory Unit</h3>
                   <div class="text">Incididunt ut labore et dolore magna aliqua. Ut enim veniam, trud exercita tion ullamco laboris nisi ut aliquip ex eac consequat duis aute irure dolor inc reprehenderit velit culpa quis labore et dolore magna aliqua nostrud exer tation ullamco laboris nisi ut aliquip irure.</div>
                   <a href="power-generation.html" class="read-more">view detail <span class="arrow fas fa-angle-right"></span></a>
                  </div>
                 </div>
                </div>
               </div>
               
              
               <div class="slide-item">
                <div class="row clearfix">
                 
                 <div class="image-column col-lg-6 col-md-12 col-sm-12">
                  <div class="inner-column">
                   <div class="image">
                    <img src="images/1.jpg" alt= ""/>
                   </div>
                  </div>
                 </div>
                 
                 <div class="content-column col-lg-6 col-md-12 col-sm-12">
                  <div class="inner-column">
                   <div class="title">Power & Energy</div>
                   <h3>Chemical Factory Unit</h3>
                   <div class="text">Incididunt ut labore et dolore magna aliqua. Ut enim veniam, trud exercita tion ullamco laboris nisi ut aliquip ex eac consequat duis aute irure dolor inc reprehenderit velit culpa quis labore et dolore magna aliqua nostrud exer tation ullamco laboris nisi ut aliquip irure.</div>
                   <a href="power-generation.html" class="read-more">view detail <span class="arrow fas fa-angle-right"></span></a>
                  </div>
                 </div>
                </div>
               </div>
               
               
               <div class="slide-item">
                <div class="row clearfix">
                
                 <div class="image-column col-lg-6 col-md-12 col-sm-12">
                  <div class="inner-column">
                   <div class="image">
                    <img src="images/1.jpg" alt= ""/>
                   </div>
                  </div>
                 </div>
                
                 <div class="content-column col-lg-6 col-md-12 col-sm-12">
                  <div class="inner-column">
                   <div class="title">Power & Energy</div>
                   <h3>Chemical Factory Unit</h3>
                   <div class="text">Incididunt ut labore et dolore magna aliqua. Ut enim veniam, trud exercita tion ullamco laboris nisi ut aliquip ex eac consequat duis aute irure dolor inc reprehenderit velit culpa quis labore et dolore magna aliqua nostrud exer tation ullamco laboris nisi ut aliquip irure.</div>
                   <a href="power-generation.html" class="read-more">view detail <span class="arrow fas fa-angle-right"></span></a>
                  </div>
                 </div>
                </div>
               </div>
               
               
               <div class="slide-item">
                <div class="row clearfix">
                 
                 <div class="image-column col-lg-6 col-md-12 col-sm-12">
                  <div class="inner-column">
                   <div class="image">
                    <img src="images/1.jpg" alt= ""/>
                   </div>
                  </div>
                 </div>
                
                 <div class="content-column col-lg-6 col-md-12 col-sm-12">
                  <div class="inner-column">
                   <div class="title">Power & Energy</div>
                   <h3>Chemical Factory Unit</h3>
                   <div class="text">Incididunt ut labore et dolore magna aliqua. Ut enim veniam, trud exercita tion ullamco laboris nisi ut aliquip ex eac consequat duis aute irure dolor inc reprehenderit velit culpa quis labore et dolore magna aliqua nostrud exer tation ullamco laboris nisi ut aliquip irure.</div>
                   <a href="power-generation.html" class="read-more">view detail <span class="arrow fas fa-angle-right"></span></a>
                  </div>
                 </div>
                </div>
               </div>
               
              </div>
              
              <ul class="thumbs-carousel owl-carousel owl-theme">
               <li><img src="images/thumb-1.jpg" alt=""></li>
               <li><img src="images/thumb-2.jpg" alt=""></li>
               <li><img src="images/thumb-3.jpg" alt=""></li>
               <li><img src="images/thumb-4.jpg" alt=""></li>
               <li><img src="images/thumb-5.jpg" alt=""></li>
               <li><img src="images/thumb-1.jpg" alt=""></li>
               <li><img src="images/thumb-2.jpg" alt=""></li>
               <li><img src="images/thumb-3.jpg" alt=""></li>
               <li><img src="images/thumb-4.jpg" alt=""></li>
               <li><img src="images/thumb-5.jpg" alt=""></li>
              </ul>
              
             </div>
            </div>
           </div>
           
          </div>
         </section> -->
    <!-- End Projects Section -->















    <!-- <section class="ds call-to-action text-center s-py-xl-160 s-py-lg-130 s-py-md-90 s-py-60">
          <div class="container blog__bg_image--height">
           <div class="row">
            <div class="col-12"style=mt-100>
             <h2 class="special-heading text-center">
              <span class="text-capitalize big">
               All for Good. Good for All.
              </span>
             </h2>
             <div class="divider-45 hidden-below-lg"></div>
             <div class="divider-30 hidden-above-lg"></div>
             <a class="btn btn-darkgrey big-btn" href="blog-right.html">Go To Blog</a>
            </div>
           </div>
          </div>
         </section> -->




    <!-- Skill Section -->
    <!-- <section class="skill-section" style="background-image:url(images/1.jpg)">
          <div class="auto-container"> -->
    <!-- <div class="row clearfix">
            
            
            <div class="skill-column col-xl-7 col-lg-12 col-md-12 col-sm-12">
             <div class="inner-column">
              <h2>We produce positive results from ever-growing <span>Industrial & manufacturing</span> estates.</h2>
              
             
              <div class="skills">
               
                <div class="skill-header clearfix">
                 <div class="skill-title">Latest Equipemnts Used</div>
                 <div class="skill-percentage"><div class="count-box"><span class="count-text" data-speed="2000" data-stop="95">0</span>%</div></div>
                </div>
                <div class="skill-bar">
                 <div class="bar-inner"><div class="bar progress-line" data-width="95"></div></div>
                </div>
               </div>
              
               <div class="skill-item">
                <div class="skill-header clearfix">
                 <div class="skill-title">Factories Production</div>
                 <div class="skill-percentage"><div class="count-box"><span class="count-text" data-speed="2000" data-stop="80">0</span>%</div></div>
                </div>
                <div class="skill-bar">
                 <div class="bar-inner"><div class="bar progress-line" data-width="80"></div></div>
                </div>
               </div>
              
               <div class="skill-item">
                <div class="skill-header clearfix">
                 <div class="skill-title">Management & Services</div>
                 <div class="skill-percentage"><div class="count-box"><span class="count-text" data-speed="2000" data-stop="65">0</span>%</div></div>
                </div>
                <div class="skill-bar">
                 <div class="bar-inner"><div class="bar progress-line" data-width="65"></div></div>
                </div>
               </div>
              </div>
              
             </div>
            </div> -->

    <!-- Video Column -->
    <!-- <div class="video-column col-xl-5 col-lg-5 col-md-12 col-sm-12">
             <div class="inner-column clearfix"> -->

    <!--Video Box-->
    <!-- <div class="video-link-box">
               <a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="lightbox-image play-box"><span class="icon-outer"><span class="icon flaticon-play-button"><i class="ripple"></i></span></span></a>
               <div class="video-title">watch the intro video</div>
              </div> -->
    {{-- 
    </div>
    </div>

    </div>
    </div>
    </section> --}}
    <!-- End Skill Section -->

    <!-- Clients Section -->
    <!-- <section class="clients-section">
          <div class="auto-container">
           <div class="logo-icon flaticon-settings-4"></div>
          
           <div class="sec-title centered">
            <div class="title">We are connectifer</div>
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
                <img src="images/author-1.jpg" alt= "" />
               </div>
              </div>
              <div class="text">Since vindictively over agile the some far well besides constructively well airy then one during with close excellent grabbed gosh contrary far dalmatian upheld intrepid bought and toucan majestic more some apart dear boa much cast falcon a dwelled ouch busy.</div>
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
                <img src="images/author-1.jpg" alt= "" />
               </div>
              </div>
              <div class="text">Since vindictively over agile the some far well besides constructively well airy then one during with close excellent grabbed gosh contrary far dalmatian upheld intrepid bought and toucan majestic more some apart dear boa much cast falcon a dwelled ouch busy.</div>
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
                <img src="images/author-1.jpg" alt= "" />
               </div>
              </div>
              <div class="text">Since vindictively over agile the some far well besides constructively well airy then one during with close excellent grabbed gosh contrary far dalmatian upheld intrepid bought and toucan majestic more some apart dear boa much cast falcon a dwelled ouch busy.</div>
              <h3>James Shane Well</h3>
              <div class="location">California, USA</div>
             </div>
            </div>
            
           </div>
           
          </div>
         </section> -->
    <!-- End Clients Section -->


    <!-- <section class="faq-section">

          <div class="bg-layer" style="background-image: url(images/faq-bg.png);"></div>

          <div class="pattern-layer" style="background-image: url(images/shape-19.png);"></div>

          <div class="auto-container">

           <div class="row clearfix">

            <div class="col-lg-8 col-md-12 col-sm-12 offset-lg-4 content-column">

             <div class="content-box">

              <div class="sec-title style-two light">

               <h5>CLIENT FAQ’S</h5>

               <h2>Questions and answers for <br />common ML queries</h2>

               <div class="divider" style="background-image: url(images/divider-2.png);"></div>

               <a href="faq.html" class="theme-btn btn-eight">More Answer</a>

              </div>

              <ul class="accordion-box">

               <li class="accordion block active-block">

                <div class="acc-btn active">

                 <div class="icon-outer"><i class="fas fa-plus"></i></div>

                 <h5>What is the difference between a Data Scientist, Data Analyst?</h5>

                </div>

                <div class="acc-content current">

                 <div class="text">

                  <p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power choice is untrammelled and when nothing prevents our being able do what we like best, every pleasure is to be welcomed and every pain avoided.</p>

                 </div>

                </div>

               </li>

               <li class="accordion block">

                <div class="acc-btn">

                 <div class="icon-outer"><i class="fas fa-plus"></i></div>

                 <h5>Why focus on Data Science?</h5>

                </div>

                <div class="acc-content">

                 <div class="text">

                  <p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power choice is untrammelled and when nothing prevents our being able do what we like best, every pleasure is to be welcomed and every pain avoided.</p>

                 </div>

                </div>

               </li>

               <li class="accordion block">

                <div class="acc-btn">

                 <div class="icon-outer"><i class="fas fa-plus"></i></div>

                 <h5>Can i have multiple activities in single feature?</h5>

                </div>

                <div class="acc-content">

                 <div class="text">

                  <p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power choice is untrammelled and when nothing prevents our being able do what we like best, every pleasure is to be welcomed and every pain avoided.</p>

                 </div>

                </div>

               </li>

               <li class="accordion block">

                <div class="acc-btn">

                 <div class="icon-outer"><i class="fas fa-plus"></i></div>

                 <h5>What is the difference between a Data Scientist, Data Analyst?</h5>

                </div>

                <div class="acc-content">

                 <div class="text">

                  <p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power choice is untrammelled and when nothing prevents our being able do what we like best, every pleasure is to be welcomed and every pain avoided.</p>

                 </div>

                </div>

               </li>

              </ul>

              <div class="video-btn">

               <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A&amp;t=28s" class="lightbox-image" data-caption=""><i class="fas fa-play-circle"></i></a>

               <h2>PRODUCT MAINTENACE <br />AND SUPPORT</h2>

              </div>

             </div>

            </div>

           </div>

          </div>

         </section> -->




    <!-- News Section -->


    <!-- <section class="ls ms s-pt-xl-160 s-pt-lg-130 s-pt-md-90 s-pt-60 s-pb-xl-280 s-pb-lg-250 s-pb-md-90 s-pb-60">
          <div class="container">
           <div class="row">
            <div class="col-12">
             <h2 class="connect"style=text-blue-500
             >Latest News</h2>
             <p class="connect-1">Our blog</p>
             <div class="divider-50 hidden-below-lg"></div>
             <div class="divider-30 hidden-above-lg"></div>
             <div class="shortcode-posts row tiled-layout c-gutter-30 c-mb-30">
              <div class="bigitem col-xl-6 col-lg-5">
               <article class="vertical-item ls rounded post type-post status-publish format-standard has-post-thumbnail">
                <div class="item-media post-thumbnail">
                 <a href="blog-single-@@type.html">
                  <img src="images/blog/01.jpg" alt="img" />
                 </a>
                </div>
                
                <div class="item-content">
                 <header class="entry-header">
                  <div class="entry-meta">
                   <div class="byline">
                    <span class="date">
                     <a href="blog-@@type.html" rel="bookmark">
                      <time class="published entry-date" datetime="2019-04-09T12:23:09+00:00">20.03.2019</time>
                     </a>
                    </span>
                    <span class="author vcard">
                     <a class="url fn n" href="blog-@@type.html" rel="author"><span>by</span> Admin</a>
                    </span>
                   </div>
                  </div>
                  <h4 class="entry-title">
                   <a href="blog-single-@@type.html" rel="bookmark">
                    Consectetur adipisicing elited do eiusmod tempor incididunt ut labore.
                   </a>
                  </h4>

                  
                 </header>
                

                 <div class="entry-content">
                  <p style="margin-top: 30px; color: #000000;">
                   Tempor incididunt labore dolmagna aliqua eniminim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                   voluptate.
                  </p>
                 </div>
                
                </div>
               
               </article>
               
              </div>
              <div class="smallitem col-xl-6 col-lg-7">
               <article class="vertical-item side-item ls rounded post type-post status-publish format-standard has-post-thumbnail">
                <div class="item-media post-thumbnail">
                 <a href="blog-single-@@type.html">
                  <img src="images/blog/02.jpg" alt="img" />
                 </a>
                </div>
               
                <div class="item-content">
                 <header class="entry-header">
                  <div class="entry-meta">
                   <div class="byline">
                    <span class="date">
                     <a href="blog-@@type.html" rel="bookmark">
                      <time class="published entry-date" datetime="2019-04-09T12:23:09+00:00">20.03.2019</time>
                     </a>
                    </span>
                    <span class="author vcard">
                     <a class="url fn n" href="blog-@@type.html" rel="author"><span>by</span> Admin</a>
                    </span>
                   </div>
                  </div>
                  <h4 class="entry-title">
                   <a href="blog-single-@@type.html" rel="bookmark">
                    Lorem ipsum dolor sit amet consectetur
                   </a>
                  </h4>

                  
                 </header>
                

                 <div class="entry-content">
                  <p>
                   Tempor incididunt labore dolmagna aliqua eniminim veniam quis.
                  </p>
                 </div>
                 
                </div>
                
               </article>
               <article class="vertical-item side-item ls rounded post type-post status-publish format-standard has-post-thumbnail">
                <div class="item-media post-thumbnail">
                 <a href="blog-single-@@type.html">
                  <img src="images/blog/03.jpg" alt="img" />
                 </a>
                </div>
               
                <div class="item-content">
                 <header class="entry-header">
                  <div class="entry-meta">
                   <div class="byline">
                    <span class="date">
                     <a href="blog-@@type.html" rel="bookmark">
                      <time class="published entry-date" datetime="2019-04-09T12:23:09+00:00">20.03.2019</time>
                     </a>
                    </span>
                    <span class="author vcard">
                     <a class="url fn n" href="blog-@@type.html" rel="author"><span>by</span> Admin</a>
                    </span>
                   </div>
                  </div>
                  <h4 class="entry-title">
                   <a href="blog-single-@@type.html" rel="bookmark">
                    Adipisicing elit sed do eiusmod
                   </a>
                  </h4>

                  
                 </header>
                 

                 <div class="entry-content">
                  <p>
                   Nstrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
                  </p>
                 </div>
                 
                </div>
                
               </article>
              </div>
             </div>
             <div class="mt--30"></div>
            </div>
           </div>
          </div>
         </section> -->





    <!-- End News Section -->


    <!-- clients-style-three -->

    <!-- <section class="clients-style-three centred">

         <div class="auto-container">

          <div class="inner-container">

           <ul class="clients-logo-list clearfix">

            <li class="clients-logo-box">

             <a href="index.html"><img src="images/clients-logo-11.png" alt=""></a>

            </li>

            <li class="clients-logo-box">

             <a href="index.html"><img src="images/clients-logo-12.png" alt=""></a>

            </li>

            <li class="clients-logo-box">

             <a href="index.html"><img src="images/clients-logo-13.png" alt=""></a>

            </li>

            <li class="clients-logo-box">

             <a href="index.html"><img src="images/clients-logo-14.png" alt=""></a>

            </li>

            <li class="clients-logo-box">

             <a href="index.html"><img src="images/clients-logo-15.png" alt=""></a>

            </li>

           </ul>

          </div>

         </div>

        </section> -->

    <!-- clients-style-three end -->
@endsection
