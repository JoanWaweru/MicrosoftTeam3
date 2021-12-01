{{--@extends('layouts.app')--}}
@extends('layouts.profile')

@section('content')

    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Constructive HTML Template</title>
    <!--

    Template 2102 Constructive

    http://www.tooplate.com/view/2102-constructive

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="{{asset('assets/assets2/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/assets2/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/assets2/css/magnific-popup.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/assets2/slick/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/assets2/slick/slick-theme.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/assets2/css/tooplate-style.css')}}">

    <script>
        var renderPage = true;

        if(navigator.userAgent.indexOf('MSIE')!==-1
            || navigator.appVersion.indexOf('Trident/') > 0){
            /* Microsoft Internet Explorer detected in. */
            alert("Please view this in a modern browser such as Chrome or Microsoft Edge.");
            renderPage = false;
        }
    </script>
</head>

<body>
<!-- Loader -->

{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>

{{--<div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }}--}}
{{--                </div>--}}
{{--            </div>--}}

<!-- Page Content -->
<div class="container-fluid tm-main">
    <div class="row tm-main-row">

        <!-- Sidebar -->
        <div id="tmSideBar" class="col-xl-3 col-lg-4 col-md-12 col-sm-12 sidebar">

            <button id="tmMainNavToggle" class="menu-icon">&#9776;</button>

            <div class="inner">
                <nav id="tmMainNav" class="tm-main-nav">
                    <ul>
                        <li>
                            <a href="{{route('home')}}" id="tmNavLink1" class="scrolly active" data-bg-img="{{asset('assets/assets2/constructive_bg_01.jpg')}}" data-page="#tm-section-1">
                                <i class="fas fa-home tm-nav-fa-icon"></i>
                                <span>Home</span>
                            </a>
                        </li>
{{--                        <li>--}}
{{--                            <a href="{{route('myprofile')}}" id="tmNavLink2" class="scrolly" data-bg-img="{{asset('assets/assets2/constructive_bg_02.jpg')}}" data-page="#tm-section-2" data-page-type="carousel">--}}
{{--                                <i class="fas fa-map tm-nav-fa-icon"></i>--}}
{{--                                <span>My Profile</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        <li>
                            <a href="#aboutus" class="scrolly" data-bg-img="{{asset('assets/assets2/constructive_bg_03.jpg')}}" data-page="#tm-section-3">
                                <i class="fas fa-users tm-nav-fa-icon"></i>
                                <span>About Us</span>
                            </a>
                        </li>
                        <li>
                            <a href="#contact" class="scrolly" data-bg-img="{{asset('assets/assets2/constructive_bg_04.jpg')}}" data-page="#tm-section-4">
                                <i class="fas fa-comments tm-nav-fa-icon"></i>
                                <span>Contact Us</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 tm-content">

            <!-- section 1 -->
            <section id="tm-section-1" class="tm-section" data-nav-link="#tmNavLink1">
                <div class="ml-auto">
                    <header class="mb-4"><h1 class="tm-text-shadow">Microsoft Team 3</h1></header>
                    <p class="mb-5 tm-font-big">Welcome to our application.</p>
                    <a href="{{route('myprofile')}}" class="btn tm-btn tm-font-big">My Profile</a>
                    <!-- data-nav-link holds the ID of nav item, which means this link should behave the same as that nav item  -->
                </div>
            </section>

            <!-- section 2 -->
            <section id="tm-section-2" class="tm-section tm-section-carousel" data-nav-link="#tmNavLink2">
                <div>
                    <header class="mb-4"><h2 class="tm-text-shadow">My Profile</h2></header>
{{--                    <div class="content2">--}}
{{--                        <div class="container d-flex justify-content-center">--}}
{{--                            <div class="card p-3 py-4">--}}
{{--                                <div class="text-center"> <img src="{{asset("assets/images/users/".Auth::user()->profile_photo)}}" width='100' class="rounded-circle">--}}
{{--                                    <h3 class="mt-2">{{$user->name}}</h3>City: <span class="mt-1 clearfix">{{$user->city}}</span> Phone Number: <small class="mt-4">{{$user->phone_number}}</small></br>--}}
{{--                                    <a href={{ route('myprofileUpdate',$user)}} class="btn btn-primary" type="button"  >Edit Profile</a>--}}
{{--                                    <div class="social-buttons mt-5"> <button class="neo-button"><i class="fa fa-facebook fa-1x"></i> </button> <button class="neo-button"><i class="fa fa-linkedin fa-1x"></i></button> <button class="neo-button"><i class="fa fa-google fa-1x"></i> </button> <button class="neo-button"><i class="fa fa-youtube fa-1x"></i> </button> <button class="neo-button"><i class="fa fa-twitter fa-1x"></i> </button> </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </section>

            <!-- section 3 -->
            <section id="tm-section-3" class="tm-section">
                <div class="row mb-4">
                    <header class="col-xl-12"><h2 class="tm-text-shadow">About Us</h2></header>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-12 col-xl-6 mb-4">
                        <div class="media tm-bg-transparent-black tm-border-white">
                            <i class="fab fa-apple tm-icon-circled tm-icon-media"></i>
                            <div class="media-body">
                                <h3>Brief Description</h3>
                                <p>We are a group of 5 students from Strathmore University, currently in our Third Year.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-12 col-xl-6 mb-4">
                        <div class="media tm-bg-transparent-black tm-border-white">
                            <i class="fas fa-map-pin mr-4 tm-icon-circled tm-icon-media"></i>
                            <div class="media-body">
                                <h3>Our Team</h3>
                                <ul>
                                    <li>Yvonne Bichii - Team Lead</li>
                                    <li>Amen Gemeda</li>
                                    <li>Joan Waweru</li>
                                    <li>Naomi Munyiri</li>
                                    <li>Bruce Onyango</li>
                                </ul>
                            </div>
                        </div>
                    </div>
{{--                    <div class="col-sm-12 col-md-6 col-lg-12 col-xl-6 mb-4">--}}
{{--                        <div class="media tm-bg-transparent-black tm-border-white">--}}
{{--                            <i class="fab fa-fly mr-4 tm-icon-circled tm-icon-media"></i>--}}
{{--                            <div class="media-body">--}}
{{--                                <h3>Phasellus eleifend</h3>--}}
{{--                                <p>Phasellus feugiat scelerisque sapien, ac ornare arcu finibus sed. Aenean ultrices nisi sit amet facilisis viverra.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-md-6 col-lg-12 col-xl-6 mb-4">--}}
{{--                        <div class="media tm-bg-transparent-black tm-border-white">--}}
{{--                            <i class="fab fa-linode mr-4 tm-icon-circled tm-icon-media"></i>--}}
{{--                            <div class="media-body">--}}
{{--                                <h3>Phasellus eleifend</h3>--}}
{{--                                <p>Phasellus feugiat scelerisque sapien, ac ornare arcu finibus sed. Aenean ultrices nisi sit amet facilisis viverra.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </section>

            <!-- section 4 -->
            <section id="tm-section-4" class="tm-section">
                <div class="tm-bg-transparent-black tm-contact-box-pad">
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <header><h2 class="tm-text-shadow">Contact Us</h2></header>
                        </div>
                    </div>
                    <div class="row tm-page-4-content">
                        <div class="col-md-6 col-sm-12 tm-contact-col">
                            <div class="contact_message">
                                <form action="#contact" method="post" class="contact-form">
                                    <div class="form-group">
                                        <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" id="contact_email" name="contact_email" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="contact_message" name="contact_message" class="form-control" rows="9" placeholder="Message" required></textarea>
                                    </div>
                                    <button type="submit" class="btn tm-btn-submit tm-btn ml-auto">Submit</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 tm-contact-col">
                            <div class="tm-address-box">
                                <p>In case you have any burning questions, feel free to contact us😁</p>
                                <p>Don't forget to rate us! Thank you!</p>
                                <address>
                                    Strathmore University<br>
                                    Nairobi County<br>
                                    Kenya
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>	<!-- .tm-content -->
        <footer class="footer-link">
            <p class="tm-copyright-text">Copyright &copy; 2021 Microsoft Team 3.</p>
        </footer>
    </div>	<!-- row -->
</div>
<div id="preload-01"></div>
<div id="preload-02"></div>
<div id="preload-03"></div>
<div id="preload-04"></div>

<script type="text/javascript" src="{{asset('assets/assets2/js/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/assets2/js/jquery.magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/assets2/js/jquery.backstretch.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/assets2/slick/slick.min.js')}}"></script> <!-- Slick Carousel -->

<script>

    var sidebarVisible = false;
    var currentPageID = "#tm-section-1";

    // Setup Carousel
    function setupCarousel() {

        // If current page isn't Carousel page, don't do anything.
        if($('#tm-section-2').css('display') == "none") {
        }
        else {	// If current page is Carousel page, set up the Carousel.

            var slider = $('.tm-img-slider');
            var windowWidth = $(window).width();

            if (slider.hasClass('slick-initialized')) {
                slider.slick('destroy');
            }

            if(windowWidth < 640) {
                slider.slick({
                    dots: true,
                    infinite: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                });
            }
            else if(windowWidth < 992) {
                slider.slick({
                    dots: true,
                    infinite: false,
                    slidesToShow: 2,
                    slidesToScroll: 1
                });
            }
            else {
                // Slick carousel
                slider.slick({
                    dots: true,
                    infinite: false,
                    slidesToShow: 3,
                    slidesToScroll: 2
                });
            }

            // Init Magnific Popup
            $('.tm-img-slider').magnificPopup({
                delegate: 'a', // child items selector, by clicking on it popup will open
                type: 'image',
                gallery: {enabled:true}
                // other options
            });
        }
    }

    // Setup Nav
    function setupNav() {
        // Add Event Listener to each Nav item
        $(".tm-main-nav a").click(function(e){
            e.preventDefault();

            var currentNavItem = $(this);
            changePage(currentNavItem);

            setupCarousel();
            setupFooter();

            // Hide the nav on mobile
            $("#tmSideBar").removeClass("show");
        });
    }

    function changePage(currentNavItem) {
        // Update Nav items
        $(".tm-main-nav a").removeClass("active");
        currentNavItem.addClass("active");

        $(currentPageID).hide();

        // Show current page
        currentPageID = currentNavItem.data("page");
        $(currentPageID).fadeIn(1000);

        // Change background image
        var bgImg = currentNavItem.data("bgImg");
        $.backstretch("{{asset('assets/assets2/img/')}}" + bgImg);
    }

    // Setup Nav Toggle Button
    function setupNavToggle() {

        $("#tmMainNavToggle").on("click", function(){
            $(".sidebar").toggleClass("show");
        });
    }

    // If there is enough room, stick the footer at the bottom of page content.
    // If not, place it after the page content
    function setupFooter() {

        var padding = 100;
        var footerPadding = 40;
        var mainContent = $("section"+currentPageID);
        var mainContentHeight = mainContent.outerHeight(true);
        var footer = $(".footer-link");
        var footerHeight = footer.outerHeight(true);
        var totalPageHeight = mainContentHeight + footerHeight + footerPadding + padding;
        var windowHeight = $(window).height();

        if(totalPageHeight > windowHeight){
            $(".tm-content").css("margin-bottom", footerHeight + footerPadding + "px");
            footer.css("bottom", footerHeight + "px");
        }
        else {
            $(".tm-content").css("margin-bottom", "0");
            footer.css("bottom", "20px");
        }
    }

    // Everything is loaded including images.
    $(window).on("load", function(){

        // Render the page on modern browser only.
        if(renderPage) {
            // Remove loader
            $('body').addClass('loaded');

            // Page transition
            var allPages = $(".tm-section");

            // Handle click of "Continue", which changes to next page
            // The link contains data-nav-link attribute, which holds the nav item ID
            // Nav item ID is then used to access and trigger click on the corresponding nav item
            var linkToAnotherPage = $("a.tm-btn[data-nav-link]");

            if(linkToAnotherPage != null) {

                linkToAnotherPage.on("click", function(){
                    var navItemToHighlight = linkToAnotherPage.data("navLink");
                    $("a" + navItemToHighlight).click();
                });
            }

            // Hide all pages
            allPages.hide();

            $("#tm-section-1").fadeIn();

            // Set up background first page
            var bgImg = $("#tmNavLink1").data("bgImg");

            $.backstretch("{{asset('assets/assets2/img/')}}" + bgImg, {fade: 500});

            // Setup Carousel, Nav, and Nav Toggle
            setupCarousel();
            setupNav();
            setupNavToggle();
            setupFooter();

            // Resize Carousel upon window resize
            $(window).resize(function() {
                setupCarousel();
                setupFooter();
            });
        }
    });

</script>
</body>
</html>

@endsection

