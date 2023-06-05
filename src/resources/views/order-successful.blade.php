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
                        <h2>Order</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section container p-5 mt-5 border border-secondary rounded">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('status') }}
            </div>
        @elseif(session('failed'))
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('failed') }}
            </div>
        @endif
        <a class="btn btn-primary" href="{{ route('home') }}">Back to homepage</a>
    </section>
@endsection
