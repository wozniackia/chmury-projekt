@extends('layouts.app')
@section('content')
    
<!-- ***** Main Banner Area Start ***** -->
<div class="main-banner" id="top">
    <video autoplay muted loop id="bg-video">
        <source src="{{asset('images/video.mp4')}}" type="video/mp4" />
    </video>

    <div class="video-overlay header-text">
        <div class="caption">
            <h2><em>Rent a sports car</em> at low prices</h2>
            <div class="main-button">
                <a href="{{ route('contact') }}">Contact Us</a>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<!-- ***** Offers Starts ***** -->
<section class="section" id="trainers">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2>Check our <em>Offers</em></h2>
                    <img src="{{asset('images/line-dec.png')}}" alt="">
                    <p>From exotic sports cars to luxury sedans and SUVs, the SportCar Rental offers an exceptional selection and the trusted, personalized service.</p>
                </div>
            </div>
        </div>
        

        <br>

        <div class="main-button text-center">
            <a href="{{ route('fleet') }}">View Offers</a>
        </div>
    </div>
</section>
<!-- ***** Offers Ends ***** -->

<section class="section section-bg" id="schedule" style="background-image: url({{asset('images/about-fullscreen-1-1920x700.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading dark-bg">
                    <h2>Read <em>About Us</em></h2>
                    <img src="{{asset('images/line-dec.png')}}" alt="">
                    <p>We have prepared for you the most simple and convenient rental conditions. To do this, we need only your passport and driver's license.
                        In addition, we value your time - it takes just a few minutes to arrange a rental.
                        
                        Our fleet will satisfy even the most demanding car enthusiast.
                        All cars are serviceable, regularly undergo maintenance and are in perfect condition.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection