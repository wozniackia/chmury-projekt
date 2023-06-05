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
        <div class="section container mb-3">
            <p>{{ $vehicle->manufacture }} {{ $vehicle->model }} {{ $vehicle->version }}</p>
        </div>
        <form method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
            <div class="form-group">
                <label>Start date</label>
                <input type="date" id="start" name="book-start" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}"
                    max="{{ date('Y-m-d', strtotime('+90 Days')) }}">
            </div>
            <div class="form-group">
                <label>Duration</label>
                <input id="duration" type="number" name="duration" required pattern="[1-9][0-9]" min="1"
                    max="30" value="1" step="1" title="Write a duration in days">
            </div>
            <div class="form-group">
                <label>Payment Method</label>
                <div class="form-group">
                <label><input type="radio" name="payment" value="EuroCard" required> EuroCard</label>
                <label><input type="radio" name="payment" value="Visa"> Visa</label>
                <label><input type="radio" name="payment" value="Bank Transfer"> Bank Transfer</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Order now</button>
        </form>
    </section>
@endsection
