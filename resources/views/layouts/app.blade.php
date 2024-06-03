<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Gravida - Menuju Persalinan Jadi Lebih Tenang</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        {{-- Title --}}
        <title>@yield('title')</title>

        <!-- Style -->
        @stack('prepend-style')
        @include('component.landing_pages.css.index')
        @stack('addon-style') 

    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->

        {{-- Header --}}
        @include('component.landing_pages.navbar')


        {{-- content --}}
        <div class="content">
            @yield('content')
        </div>

        
        <!-- Footer -->
        @include('component.landing_pages.footer')


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   
        
        <!-- Script -->
        @stack('prepend-script')
        @include('component.landing_pages.js.index')
        @stack('addon-script')

    </body>

</html>