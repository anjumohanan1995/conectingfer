@extends('home.app')
@section('content')

<!--Page Title-->
<section class="page-banner" style="background-image:url(images/3.jpg);">
    <div class="auto-container">
        <div class="inner-container clearfix mt-5 text-center p-5">
            <h1>Logistics Management</h1>
            
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
                            <li><a href="industrial.html">Industrial
                                    Automation</a>
                            </li>
                            <li><a href="manufacturing.html">Manufacturing</a></li>
                            <li class="active"><a href="logistics.html">Logistics Management</a></li>
                            <li><a href="energy.html">Energy</a></li>

                        </ul>
                    </div>
                    <div class="image col-12 mt-5">
                        <img src="images/trucking.jpg" alt="" />
                    </div>
                    <div class="image col-12 mt-5">
                        <img src="images/cargoship.jpg" alt="" />
                    </div>
                    <div class="image col-12 mt-5">
                        <img src="images/cargo train.jpg" alt="" />
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
                                <h2>Logistics Management</h2>
                            </div>
                            <div class="bold-text ">Optimizing Logistics Operations with IoT
                            </div>

                            <p>
                                ConnectInfer provides asset and supply chain visibility solutions to drive
                                efficiency, safety,
                                and sustainability across transportation and logistics networks. </p>

                            <br>

                            <div class="bold-text ">Fleet Management
                            </div>
                            <p>
                                Real-time vehicle tracking combined with engine diagnostics and fuel
                                consumption analytics
                                help maximize uptime while improving driving habits. Data-driven insights
                                enable proactive
                                maintenance to keep fleets moving.</p>

                            <br>
                            <div class="bold-text ">Facility Management
                            </div>
                            <p>
                                Comprehensive solutions integrate lighting, environmental, safety and
                                equipment health
                                data to streamline maintenance tasks and enhance workplace conditions.</p>

                            <br>
                            <div class="bold-text ">Cold Chain Monitoring
                            </div>
                            <p>
                                Comprehensive temperature monitoring from reefer devices to trailers ensures
                                optimal
                                product routing, quality control, and regulatory compliance throughout the
                                cold supply
                                chain. </p>

                            <br>
                            <div class="bold-text ">Inventory Visibility
                            </div>
                            <p>
                                Remote sensors provide end-to-end traceability of shipments and real-time
                                location/condition updates. Manage exceptions to reduce delays and protect
                                goods.
                            </p>

                            <br>
                            <div class="bold-text ">Dashboard Analytics
                            </div>
                            <p>
                                Dashboard views deliver network-wide visibility for monitoring asset
                                performance, uptime,
                                and maintenance needs across the logistics ecosystem.
                            </p>
                            <br>
                            <br>
                            <div class="bold-text ">Contact us to streamline logistics operations with
                                secure connectivity and predictive monitoring
                                solutions tailored for your multi-modal transportation requirements.
                            </div>
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
