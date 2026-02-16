<!DOCTYPE html>
<html lang="en">

<head>

    {{-- Structured Data --}}
    @include('components.seo')


    {{-- External Stylesheets --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    {{-- Custom Stylesheets --}}
    <link rel="stylesheet" href="{{ asset('assets/sarvaone/themes/css/app.css') }}">

    @stack('styles')
</head>

<body>
    @include("jobs::components.navbar")

    <main class="main-container">
        @yield("content")
    </main>
@include("jobs::components.footer")
    @include("components.footer")

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/sarvaone/themes/js/app.js') }}"></script>

    @stack('scripts')

    @include('components.google-analytics')

</body>

</html>