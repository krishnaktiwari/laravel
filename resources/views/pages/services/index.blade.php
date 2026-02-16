@extends('layouts.frontend')
@section('content')
    <section class="hero overlay py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="text-white mb-4">Welcome to Kshititech</h1>
                    <p class="text-white mb-4">Your trusted partner in technology solutions. We provide innovative and
                        reliable IT services to help your business thrive in the digital age.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('assets/images/hero-image.png') }}" alt="Hero Image" class="img-fluid">
                </div>
            </div>
        </div>

    </section>
@endsection