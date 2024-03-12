@extends('home.app')
@section('content')

 <!--Page Title-->
 <section class="page-banner" style="background-image:url(images/3.jpg);">
    <div class="auto-container">
        <div class="inner-container clearfix mt-5 text-center p-5">
            <h1>Manufacturing</h1>
            
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
                        <ul class="services-categories">
                            <li ><a href="industrial.html">Industrial
                                    Automation</a>
                            </li>
                            <li class="active"><a href="manufacturing.html">Manufacturing</a></li>
                            <li><a href="logistics.html">Logistics Management</a></li>
                            <li><a href="energy.html">Energy</a></li>

                        </ul>
                    </div>
                    <div class="image col-12 mt-5">
                        <img src="images/factoryfloor.jpg" alt="" />
                    </div>
                    <div class="image col-12 mt-5">
                        <img src="images/floor-1.jpg" alt="" />
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
                                <h2>Manufacturing</h2>
                            </div>
                            <div class="bold-text ">Driving Manufacturing Excellence through IoT
                            </div>

                            <p>
                                ConnectInfer Industry 4.0 solutions deliver transparency, predictive
                                maintenance, and
                                prescriptive guidance to optimize process operations. Real-time sensor data
                                from production
                                lines integrates seamlessly with cloud management systems for centralized
                                visibility and
                                control.</p>

                            <br>


                            <p>
                                Rapid data transmission supports machine learning algorithms that
                                continuously analyze
                                equipment performance to proactively identify and resolve production issues.
                                Industrial remote
                                monitoring provides comprehensive insights across factory assets to improve
                                quality and
                                uncover inefficiencies.</p>

                            <br>

                            <p>
                                Secure connectivity platforms support evolving manufacturing technologies
                                with over-
                                the-air software and firmware updates. Remote asset monitoring for mining,
                                utilities, and other
                                industrial verticals enables predictive maintenance to reduce downtime and
                                maintenance costs
                                while driving productivity gains.</p>

                            <br>

                            <p>
                                Digital transformation starts at the plant floor. Contact a solutions
                                specialist to learn how
                                ConnectInfer industrial IoT offerings can streamline operations, lower
                                energy consumption, and
                                enhance manufacturing excellence for your organization. </p>

                            <br>



                            <br>
                            <div class="learn">
                                <a href="contact.html" class="theme-btn btn-style-three">Learn More</a>
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
