<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Basic Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Dynamic Title -->
    <title>{{ $seo['title'] ?? config('app.name') }}</title>

    <!-- Meta Description -->
    <meta name="description" content="{{ $seo['description'] ?? 'Default website description' }}">

    <!-- Robots -->
    <meta name="robots" content="{{ $seo['robots'] ?? 'index, follow' }}">

    <!-- Author -->
    <meta name="author" content="{{ config('app.name') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph -->
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:title" content="{{ $seo['title'] ?? config('app.name') }}">
    <meta property="og:description" content="{{ $seo['description'] ?? 'Default website description' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="{{ $seo['type'] ?? 'website' }}">

    <!-- OG Image -->
    <meta property="og:image" content="{{ $seo['image'] ?? asset('assets/images/og-image.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seo['title'] ?? config('app.name') }}">
    <meta name="twitter:description" content="{{ $seo['description'] ?? 'Default website description' }}">
    <meta name="twitter:image" content="{{ $seo['image'] ?? asset('assets/images/og-image.png') }}">

    <!-- Schema JSON-LD -->
    @if (!empty($seo['schema']))
        <script type="application/ld+json">
            {
                !!json_encode($seo['schema'], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!
            }
            </script>
    @endif

    <!-- Extra Meta -->
    @stack('meta')

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <!-- ✅ Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ✅ Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('assets/themes/css/app.css') }}">
</head>

<body>
    @php
        $current = request()->segment(1);
    @endphp


    <header class="bg-white sticky-top shadow-sm">

        <nav class="navbar navbar-expand-lg bg-white sticky-top">
            <div class="container">
                <a class="navbar-brand" href="https://sarva.one/">property<span>.</span>sarva<span>.</span>one</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">



                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Main Content -->
    <main class="container py-4">
        @yield('content')
    </main>
    @include('components.footer')
    <!-- ✅ Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/themes/js/app.js') }}"></script>
    <!-- Google Analytics -->
    @include('components.google-analytics')
    <!-- Extra Scripts -->
    @stack('scripts')
</body>

</html>