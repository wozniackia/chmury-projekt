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
                        <h2>Hi {{ Auth::user()->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section container mt-5">
        <a class="btn btn-primary" href="{{ route('logout.perform') }}">Logout</a>
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
        <h3>Orders</h3>
        <div>
            <div class="p-3 border rounded">
                <ul>
                    @if (count($orders) > 0)
                        @foreach ($orders as $order)
                            <li>
                                <div class="row p-3">
                                    <div class="col-5 col-md-5">{{ $order->manufacture }} {{ $order->model }}
                                        {{ $order->version }}</div>
                                    <div class="col-5 col-md-5">Booked:
                                        {{ $order->booked_at }} For: {{ $order->duration_in_days }}
                                        @if ($order->duration_in_days > 1)
                                            days
                                        @else
                                            day
                                        @endif
                                    </div>
                                    <div class="col-1 col-md-1"><a href="{{ route('order.edit', $order->order_id) }}"><i class="fa fa-edit"></i></a></div>
                                    <div class="col-1 col-md-1"><a href="{{ route('order.delete', $order->order_id) }}"><i class="fa fa-trash"></i></a></div>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <span>No orders</span>
                    @endif
                </ul>
            </div>
        </div>
    </section>
@endsection
