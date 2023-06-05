@extends('layouts.app')
@section('content')
    <section class="section section-bg" id="call-to-action"
        style="background-image: url({{ asset('images/banner-image-1-1920x500.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Learn more <em>About Us</em></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Our Classes Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <br>
            <br>
            <br>
            <div class="row" id="tabs">
                <div class="col-lg-4">
                    <ul>
                        <li><a href='#tabs-1'><i class="fa fa-automobile"></i> Our Services</a></li>
                        <li><a href='#tabs-2'><i class="fa fa-automobile"></i> Our Cars</a></li>
                    </ul>
                </div>
                <div class="col-lg-8">
                    <section class='tabs-content'>
                        <article id='tabs-1'>
                            <img src="{{ asset('images/about-image-1-940x460.jpg') }}" alt="">
                            <h4>Our Services</h4>

                            <p>SportCar Rental is an expert in prestigious luxury car rental! We have an extensive fleet of
                                models from the legendary world brands.</p>

                            <p>Here you will find the most current modifications and new items. In SportCar Rental you can
                                order a car rental in any city in Europe, and at the most attractive rates.</p>
                        </article>
                        <article id='tabs-2'>
                            <img src="{{ asset('images/blog-image-2-940x460.jpg') }}" alt="">
                            <h4>Our Cars</h4>
                            <p>In the SportCar fleet you will find any model according to your taste and preferences.
                                Here you can rent elegant executive sedans, super-tech sports cars, stylish convertibles,
                                luxury SUVs, luxury minivans.

                                Our brands include such well-known names as Ferrari, Bentley, Maserati, Porsche, Rolls-Royce
                                and many other world legends. Our fleet is constantly expanding and updated with new
                                exclusive samples and new products, because our mission is the best service and maximum
                                comfort for each client!</p>
                        </article>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Our Classes End ***** -->
@endsection
