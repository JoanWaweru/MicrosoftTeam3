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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background: #2f3037;">
                    <div class="card-header">{{ __('Update Profile') }}</div>

                    <div class="card-body">
                        <form method="POST" action={{ route('myprofileUpdate', $user) }} enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value={{ $user->name}} required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control @error('name') is-invalid @enderror" name="city" value={{ $user->city}}>

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="text" class="form-control @error('name') is-invalid @enderror" name="phone_number" value={{ $user->phone_number}}  >

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value={{ $user->email }} required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="profile_photo" class="col-md-4 col-form-label text-md-right">{{ __('Upload new profile') }}</label>

                                <div class="col-md-6">
                                    <input id="formFileSm" type="file" class="form-control-sm" name="profile_photo" value={{ $user->profile_photo }}>
                                </div>
                            </div>


                            <div class="form-group row mb-0">

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                    <a href={{ route('myprofile')}} class="btn btn-primary" type="button" >Back to My Profile</a>                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
@endsection
