<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Microsoft</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel="stylesheet">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="{{asset('assets/assets2/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/assets2/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/assets2/css/magnific-popup.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/assets2/slick/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/assets2/slick/slick-theme.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/assets2/css/tooplate-style.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
    <script type="text/javascript" src="{{asset('assets/assets2/js/jquery-3.2.1.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{asset('assets/assets2/js/jquery.magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/assets2/js/jquery.backstretch.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/assets2/slick/slick.min.js')}}"></script> <!-- Slick Carousel -->
    <title>Constructive HTML Template</title>
    
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
      @include("partials.nav")

      @yield('content')

  </body>
  
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
  
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  </html>
