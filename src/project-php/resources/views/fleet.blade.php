@extends('layouts.app')
@section('content')
<!-- ***** Call to Action Start ***** -->
<section class="section section-bg" id="call-to-action" style="background-image: url({{asset('images/banner-image-1-1920x500.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2>Our <em>Fleet</em></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Call to Action End ***** -->


<!-- ***** Fleet Starts ***** -->
<section class="section" id="trainers">
    <div class="container">
        <br>
        <br>
        <div class="row">
            @foreach ($fleetList as $vehicle)
                
            <div class="col-lg-4 col-md-4">
                <div class="trainer-item">
                    <div class="image-thumb">
                        <img src="{{ asset( str_replace(' ', '_', strtolower('images/'.($vehicle->manufacture).'_'.($vehicle->model).'_'.($vehicle->version).'.jpg'))) }}" alt="">
                    </div>
                    <div class="down-content">
                        <span>from <sup>$</sup>{{$vehicle->pricePerHour}} per weekend</span>
                        <h4>{{$vehicle->manufacture}} {{$vehicle->model}}</h4>
                        <p>{{$vehicle->version}}</p>
                        <p>
                            <i class="fa fa-user" title="passegengers"></i> {{$vehicle->seats}} &nbsp;&nbsp;&nbsp;
                        </p>
                        @if (Auth::check())
                        <ul class="social-icons">
                            <li><a href="{{ route('order', $vehicle->id) }}">+ Book Now</a></li>
                        </ul>
                        @endif
                    </div>
                </div>
            </div>

            @endforeach
        </div>

        <br>

    </div>
</section>
<!-- ***** Fleet Ends ***** -->
@endsection