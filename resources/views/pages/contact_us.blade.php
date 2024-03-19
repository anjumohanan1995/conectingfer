@extends('home.app')
@section('content')

<section class="page-banner" style="background-image:url(images/3.jpg);">
    <div class="auto-container">
        <div class="inner-container clearfix mt-5 text-center p-5">
            <h1>Contact us</h1>
           
        </div>
    </div>
</section>
<!--End Page Title-->


<!-- Contact Page Section -->
<section class="contact-page-section">
    <div class="auto-container">
        <div class="row clearfix">

            
            <div class="info-column col-lg-4 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInLeft" data-wow-delay="0ms">
                  
                    <div class="title-box">
                        <h3>{{ @$data->title }}</h3>
                        <div class="title-text">{{ @$data->sub_title}}</div>
                    </div>
                    <ul class="contact-info-list">
                        
                        <li><span class="icon icon-location-pin"></span><strong>
                                Address</strong>
                            {!! @$data->address !!}</li>
                        <li><span class="icon icon-envelope-open"></span><strong>Email
                                us</strong>{{ @$data->email }}</li>
                        <li><span class="icon icon-call-in"></span><strong>Call Support</strong>{{ @$data->contact }}</li>
                    </ul>

                
                    <ul class="social-links">
                        <!-- <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                        <li><a href="#"><span class="fab fa-google-plus-g"></span></a></li> -->
                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                        <!-- <li><a href="#"><span class="fab fa-youtube"></span></a></li> -->
                    </ul>

                </div>
            </div>

            <div class="form-column col-lg-8 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInRight" data-wow-delay="0ms">
                  
                    <div class="sec-title">
                        <div class="titles">We are Connectinfer</div>
                        <h2>Send a Message</h2>
                    </div>

                 
                    <div class="contact-form">
                        <form method="" action="" id="">
                            <div class="row clearfix">

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="username" placeholder="First Name " required>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="lastname" placeholder="Last Name " required>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="email" name="email" placeholder="Email " required>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="phone" placeholder="Phone " required>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="company" placeholder="Company " required>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="subject" placeholder="Subject " required>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <textarea name="message" placeholder="Message "></textarea>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <button class="theme-btn btn-style-five" type="submit" name="submit-form">Send
                                        Now</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>


<!-- <div class="contact__us">


    <div class="form contact__us--box">
        <h2 class="contact__us--text">CONTACT US</h2>
        
    <div class="d-flex">
        <input  class="contact-form contact__us--input mr-3" type="text" placeholder="Type your name">
        <input class="contact-form contact__us--input ml-3" type="email" placeholder="Type your e-mail address">
    </div>
        <select class="contact-form1">
            <option value="General Query">General Query</option>
            <option value="Technical Support">Investor Relations</option>
            <option value="Sales Inquiry">Media Relations</option>
            <option value="Sales Inquiry">Job Related</option>
            <option value="Sales Inquiry">Pre-Order</option>
        </select>
        <textarea class="contact-form" placeholder="Your message..."></textarea>
        <button class="contact__us--send--btn">SEND</button>
    </div>


    <div class="contact-info">
        <h2>HEAD OFFICE:</h2>
        <p>Prestige Brooklyn Pearl Heights,<br>
        #598/8 Kariyappana Palya Road,<br>
        1st Phase JP Nagar,<br>
        Bengaluru-560078,<br>
        Karnataka, India</p>
        <h2>PHONE:</h2>
        <p>+91 95001 58602</p>
        <h2>WRITE US:</h2>
        <p>info@greensmotors.com</p>
    </div>
</div>
-->



@endsection
