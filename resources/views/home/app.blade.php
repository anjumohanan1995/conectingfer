<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>connectifier</title>
    <!-- Stylesheets -->
    <link href={{ asset('css/bootstrap.css') }} rel="stylesheet">
    <link href={{ asset('css/settings.css') }} rel="stylesheet" type="text/css"><!-- REVOLUTION SETTINGS STYLES -->
    <link href={{ asset('css/layers.css') }} rel="stylesheet" type="text/css"><!-- REVOLUTION LAYERS STYLES -->
    <link href={{ asset('css/navigation.css') }} rel="stylesheet" type="text/css"><!-- REVOLUTION NAVIGATION STYLES -->
    <link rel="stylesheet" href={{ asset('css/icomoon.css') }} />
    <link href={{ asset('css/style.css') }} rel="stylesheet">
    <link href={{ asset('css/responsive.css') }} rel="stylesheet">

    <link rel="shortcut icon" href={{ asset('images/favicon.png') }} type="image/x-icon">
    <link rel="icon" href={{ asset('images/favicon.png') }} type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->



    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- <title>6 New Year Countdown</title> --}}
</head>

<body>



    @php
        // Get the main menu items.
        $mainMenus = App\Models\MainMenu::whereNull('deleted_at')->get();

        // Initialize an empty array to store the structured data.
        $menuData = [];

        // Loop through each main menu item.
        foreach ($mainMenus as $mainMenu) {
            $menu = [
                'title' => $mainMenu->title,
                'url' => $mainMenu->link_type == 'link' ? $mainMenu->link : $mainMenu->slug,
                'submenu' => [],
            ];

            // Get the submenus for the current main menu.
            $subMenus = App\Models\SubMenu::where('menu_id', $mainMenu->id)
                ->whereNull('deleted_at')
                ->get();

            // Loop through each submenu.
            foreach ($subMenus as $subMenu) {
                $submenu = [
                    'title' => $subMenu->title,
                    'url' => $subMenu->link_type == 'link' ? $subMenu->link : $subMenu->slug,
                    'subsubmenu' => [],
                ];

                // Get the subsubmenus for the current submenu.
                $subSubMenus = App\Models\SubSubMenu::where('sub_menu_id', $subMenu->id)
                    ->whereNull('deleted_at')
                    ->get();

                // Loop through each subsubmenu.
                foreach ($subSubMenus as $subSubMenu) {
                    $submenu['subsubmenu'][] = [
                        'title' => $subSubMenu->title,
                        'url' => $subSubMenu->link_type == 'link' ? $subSubMenu->link : $subSubMenu->slug,
                    ];
                }

                // Add the submenu to the main menu
                $menu['submenu'][] = $submenu;
            }

            // Add the main menu to the overall structure
            $menuData[] = $menu;

            // dd($menuData);
        }
    @endphp

    <div class="page-wrapper">
        <!-- Preloader -->
        <div class="preloader"></div>


        <!-- Header Upper -->
        <header class="main-header header-style-three">

            <!-- header-lower -->

            <div class="header-lower">

                <div class="auto-container">

                    <div class="outer-box clearfix">

                        <div class="logo-box pull-left">

                            <figure class="logo"><a href="index-3.html"><img src="images/logo-4.png"
                                        alt=""></a></figure>

                        </div>

                        <div class="menu-area pull-right clearfix">

                            <!--Mobile Navigation Toggler-->

                            <div class="mobile-nav-toggler">

                                <i class="icon-bar"></i>

                                <i class="icon-bar"></i>

                                <i class="icon-bar"></i>

                            </div>
                            <div class="mobile-menu">



                                <div class="close-btn"><i class="fas fa-times"></i></div>



                                <nav class="menu-box">

                                    <div class="nav-logo"><a href="{{ url('/') }}"><img src="images/logo-4.png"
                                                alt="" title=""></a></div>

                                    <div class="menu-outer">


                                        <ul class="navigation clearfix">


                                            @if (!empty($menuData))
                                            @foreach ($menuData as $menu)
                                                <li class="{{ Request::is($menu['url']) ? 'current' : '' }} {{ isset($menu['submenu']) && !empty($menu['submenu']) ? 'dropdown' : '' }}">
                                                    <a href="{{ $menu['url'] }}">{{ $menu['title'] }}</a>
                                        
                                                    @if (!empty($menu['submenu']))
                                                        <ul>
                                                            @foreach ($menu['submenu'] as $submenu)
                                                                <li>
                                                                    <a href="{{ $submenu['url'] }}">{{ $submenu['title'] }}</a>
                                                                    @if (!empty($submenu['subsubmenu']))
                                                                        <ul>
                                                                            @foreach ($submenu['subsubmenu'] as $subsubmenu)
                                                                                <li>
                                                                                    <a href="{{ $subsubmenu['url'] }}">{{ $subsubmenu['title'] }}</a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        @else
                                            <p>No menu data available.</p>
                                        @endempty
                                

                                        </ul>


                                    </div>



                                    <div class="social-links">

                                        <ul class="clearfix">

                                            <li><a href=""><span class="fab fa-twitter"></span></a></li>


                                            <li><a href=""><span class="fab fa-linkedin"></span></a></li>



                                        </ul>

                                    </div>

                                </nav>

                            </div><!-- End Mobile Menu -->

                            <nav class="main-menu navbar-expand-md navbar-light">

                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">

                                    <ul class="navigation clearfix">



                                        @if (!empty($menuData))
                                        @foreach ($menuData as $menu)
                                            <li class=" {{ Request::is($menu['url']) ? 'current' : '' }} {{ isset($menu['submenu']) && !empty($menu['submenu']) ? 'dropdown' : '' }}">
                                                <a href="{{ $menu['url'] }}">{{ $menu['title'] }}</a>
                                    
                                                @if (!empty($menu['submenu']))
                                                    <ul>
                                                        @foreach ($menu['submenu'] as $submenu)
                                                            <li>
                                                                <a href="{{ $submenu['url'] }}">{{ $submenu['title'] }}</a>
                                                                @if (!empty($submenu['subsubmenu']))
                                                                    <ul>
                                                                        @foreach ($submenu['subsubmenu'] as $subsubmenu)
                                                                            <li>
                                                                                <a href="{{ $subsubmenu['url'] }}">{{ $subsubmenu['title'] }}</a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    @else
                                        <p>No menu data available.</p>
                                    @endempty
                                    


                            </ul>

                        </div>

                    </nav>

                    <div class="search-box-outer">

                        <div class="dropdown">

                            <button class="search-box-btn" type="button" id="dropdownMenu3"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="fas fa-search"></i></button>

                            <div class="dropdown-menu search-panel" aria-labelledby="dropdownMenu3">

                                <div class="form-container">

                                    <form method="post" action="blog.html">

                                        <div class="form-group">

                                            <input type="search" name="search-field" value=""
                                                placeholder="Search...." required="">

                                            <button type="submit" class="search-btn"><span
                                                    class="fas fa-search"></span></button>

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>




    <!--sticky Header-->

    <div class="sticky-header">

        <div class="auto-container">

            <div class="outer-box clearfix">

                <figure class="sticky-logo pull-left">

                    <a href="index.html"><img src="images/logo-4.png" alt=""></a>

                </figure>

                <div class="menu-area pull-right clearfix">

                    <nav class="main-menu clearfix">

                        <!--Keep This Empty / Menu will come through Javascript-->



                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">

                            <ul class="navigation clearfix">


                                @if (!empty($menuData))
                                @foreach ($menuData as $menu)
                                    <li class=" {{ Request::is($menu['url']) ? 'current' : '' }} {{ isset($menu['submenu']) && !empty($menu['submenu']) ? 'dropdown' : '' }}">
                                        <a href="{{ $menu['url'] }}">{{ $menu['title'] }}</a>
                            
                                        @if (!empty($menu['submenu']))
                                            <ul>
                                                @foreach ($menu['submenu'] as $submenu)
                                                    <li>
                                                        <a href="{{ $submenu['url'] }}">{{ $submenu['title'] }}</a>
                                                        @if (!empty($submenu['subsubmenu']))
                                                            <ul>
                                                                @foreach ($submenu['subsubmenu'] as $subsubmenu)
                                                                    <li>
                                                                        <a href="{{ $subsubmenu['url'] }}">{{ $subsubmenu['title'] }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            @else
                                <p>No menu data available.</p>
                            @endempty

                               

                            </ul>

                        </div>

                    </nav>

                </div>

            </div>

        </div>

    </div>

</header>
<!-- main-header end -->



@yield('content')




<!-- main-footer -->
<footer class="main-footer footer-style-three">

    <div class="footer-top-two">

        <div class="pattern-layer">

            <div class="pattern-1" style="background-image: url(images/shape-21.png);"></div>

            <div class="pattern-2" style="background-image: url(images/shape-22.png);"></div>

        </div>

        <div class="auto-container">

            <div class="row clearfix">

                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">

                    <div class="footer-widget logo-widget">

                        <figure class="footer-logo"><a href="index-2.html"><img src="images/logo-4.png"
                                    alt=""></a></figure>

                        <div class="text">

                            <p>Customized sensor-based end-to-end IoT solutions to optimize system performance,
                                reduce risk and drive efficiencies across industrial operations. Assets are
                                securely connected, monitored and tracked continuously in demanding
                                environments.</p>

                        </div>

                        <ul class="social-links clearfix">

                            <!-- <li><a href="index-3.html"><i class="fab fa-facebook-f"></i></a></li> -->

                            <li><a href="index-3.html"><i class="fab fa-linkedin"></i></a></li>

                            <li><a href="index-3.html"><i class="fab fa-twitter"></i></a></li>

                            <!-- <li><a href="index-3.html"><i class="fab fa-dribbble"></i></a></li> -->

                        </ul>

                    </div>

                </div>




                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">

                    <div class="footer-widget links-widget ml-40">

                        <div class="widget-title">

                            <h3>Useful Links</h3>

                        </div>

                        <div class="widget-content">

                            <ul class="links-list clearfix">

                                <li><a href="index.html">Home</a></li>

                                <li><a href="about.html">About us</a></li>

                                <li><a href="industrial.html">Solutions</a></li>

                                <li><a href="technology.html">Technology</a></li>

                                <li><a href="services.html">Services</a></li>



                            </ul>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">

                    <div class="footer-widget contact-widget">

                        <div class="widget-title">

                            <h3>Contact Us</h3>

                        </div>

                        <div class="widget-content">

                            <ul class="info-list clearfix">

                                <li>

                                    <h4>Address</h4>

                                    <p>5457 Twin Knolls Rd<br>

                                        Ste 300 PMB 1045<br>

                                        Columbia, MD 21045</p>

                                </li>

                                <li>

                                    <h4>Phone No.</h4>

                                    <p><a href="tel:0088827240">+1 408 673 0959</a></p>

                                </li>

                                <li>

                                    <h4>Email Address</h4>

                                    <p><a
                                            href="mailto:solutions@connectinfer.com">solutions@connectinfer.com</a>
                                    </p>

                                </li>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="footer-bottom">

        <!-- scroll to top -->

        <button class="scroll-top style-one scroll-to-target" data-target="html">

            <i class="fas fa-angle-up"></i>

        </button>

        <div class="auto-container">

            <div class="bottom-inner clearfix">

                <div class="copyright pull-left">

                    <p>Copyright &copy; <a href="">Connectinfer</a>, All Rights Reserved.</p>

                </div>



            </div>

        </div>

    </div>

</footer>
<!-- main-footer end -->


</div>












<!--End pagewrapper-->

<!--Scroll to top-->
<!-- <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div> -->
<!--Scroll to top-->

<script src={{ asset('js/jquery.js') }}></script>
<script src={{ asset('js/popper.min.js') }}></script>
<script src={{ asset('js/bootstrap.min.js') }}></script>
<!--Revolution Slider-->
<script src={{ asset('js/jquery.themepunch.revolution.min.js') }}></script>
<script src={{ asset('js/jquery.themepunch.tools.min.js') }}></script>
<script src={{ asset('js/revolution.extension.actions.min.js') }}></script>
<script src={{ asset('js/revolution.extension.carousel.min.js') }}></script>
<script src={{ asset('js/revolution.extension.kenburn.min.js') }}></script>
<script src={{ asset('js/revolution.extension.layeranimation.min.js') }}></script>
<script src={{ asset('js/revolution.extension.migration.min.js') }}></script>
<script src={{ asset('js/revolution.extension.navigation.min.js') }}></script>
<script src={{ asset('js/revolution.extension.parallax.min.js') }}></script>
<script src={{ asset('js/revolution.extension.slideanims.min.js') }}></script>
<script src={{ asset('js/revolution.extension.video.min.js') }}></script>
<script src={{ asset('js/main-slider-script.js') }}></script>
<!--Revolution Slider-->

<script src={{ asset('js/jquery-ui.js') }}></script>
<script src={{ asset('js/jquery.fancybox.js') }}></script>
<script src={{ asset('js/owl.js') }}></script>
<script src={{ asset('js/wow.js') }}></script>
<script src={{ asset('js/appear.js') }}></script>
<script src={{ asset('js/script.js') }}></script>
<script>
    $(document).ready(function() {
        // Function to add a class to the body when the button is clicked
        $(".mobile-nav-toggler").click(function() {
            $("body").addClass("mobile-menu-visible");

        });
        $(' .close-btn').on('click', function() {
            $('body').removeClass('mobile-menu-visible');
        });
    });
</script>

</body>

</html>
