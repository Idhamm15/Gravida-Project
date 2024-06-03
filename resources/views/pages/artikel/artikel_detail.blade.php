@extends('layouts.app')

@section('title', 'Artikel Detail Page')


@section('content')
<div class="container" style="margin-top: 20px;">
    <div class="row">
            <img src="{{ url('images/'.$artikel->image) }}" class="img-fluid" alt="">
            <h1 style="margin-top: 20px;">{{ $artikel->name }}</h1>
            <p>{{ $artikel->description }}</p>
            <p>{{ $artikel->description2 }}</p>
            <p>{{ $artikel->description3 }}</p>
    </div>
</div>
@endsection
