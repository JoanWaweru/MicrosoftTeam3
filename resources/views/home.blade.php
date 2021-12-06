{{--@extends('layouts.app')--}}
@extends('layouts.profile')

@section('content')

<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>


<!-- Page Content -->
<div class="container-fluid tm-main">
    <div class="row tm-main-row">

        <!-- Sidebar -->
        @include('patient.sidebar')
<<<<<<< HEAD
        
=======

>>>>>>> 2ce49e4adfe3a4e90f05cf7547cf80feb034c125
        <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 tm-content">

            <!-- section 1 -->
            <section id="tm-section-1" class="tm-section" data-nav-link="#tmNavLink1">
                <div class="ml-auto">
                    <header class="mb-4"><h1 class="tm-text-shadow">Microsoft Team 3</h1></header>
                    <p class="mb-5 tm-font-big">Welcome to our application.</p>
                    <a href="{{route('myprofile')}}" class="btn tm-btn tm-font-big">My Profile</a>
                    <a href="{{route('medicalHistory')}}" class="btn tm-btn tm-font-big">Medical History</a>
<<<<<<< HEAD
                    <a href="{{route('logout')}}" class="btn tm-btn tm-font-big">Log Out</a>
=======
{{--                    <a href="{{route('logout')}}" class="btn tm-btn tm-font-big">Log Out</a>--}}
                    <a class="btn tm-btn tm-font-big" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Log Out') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
>>>>>>> 2ce49e4adfe3a4e90f05cf7547cf80feb034c125
                    <!-- data-nav-link holds the ID of nav item, which means this link should behave the same as that nav item  -->
                </div>
            </section>

            <!-- section 2 -->
            <section id="tm-section-2" class="tm-section tm-section-carousel" data-nav-link="#tmNavLink2">
                <div>
                    <header class="mb-4"><h2 class="tm-text-shadow">My Profile</h2></header>
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



@endsection

