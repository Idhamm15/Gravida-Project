@extends('layouts.app')

@section('title', 'Contact Page')

@section('content')
    <div class="container-fluid bg-breadcrumb py-5">
        <div class="container text-center py-5">
            <h3 class="text-white display-3 mb-4">Contact Us</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Contact Us</li>
            </ol>    
        </div>
    </div>
    @include('component.landing_pages.partials.contact_us')
@endsection
