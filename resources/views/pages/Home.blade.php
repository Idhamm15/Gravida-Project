@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    @include('component.landing_pages.partials.carousel_home')
    @include('component.landing_pages.partials.appoinment')
    {{-- @include('component.landing_pages.partials.team') --}}
    @include('component.landing_pages.partials.contact_us')
@endsection
