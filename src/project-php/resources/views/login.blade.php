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
                        <h2>Log In</h2>
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
        @endif
        @if (session('failed'))
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('status') }}
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ $errors->first() }}
            </div>
        @endif
        <form method="POST">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <button type="submit" class="btn btn-primary">Log In</button>
        </form>
        <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
    </section>
@endsection
