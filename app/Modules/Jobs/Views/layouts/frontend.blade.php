<!DOCTYPE html>
<html lang="{{ $seo['locale'] ?? 'en' }}">

<head>

    {{-- Basic Meta --}}
    <meta charset="UTF-8">


    <title>@yield('title', $seo['title'] ?? config('app.title', config('app.name')))</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Primary SEO --}}

    <meta name="title" content="{{ $seo['title'] ?? config('app.title', config('app.name')) }}">
    <meta name="description" content="{{ $seo['description'] ?? config('app.description', '') }}">

    @if(!empty($seo['keywords']))
        <meta name="keywords" content="{{ $seo['keywords'] }}">
    @endif


    {{-- Open Graph --}}
    <meta jobs="og:type" content="{{ $seo['og_type'] ?? 'website' }}">
    <meta jobs="og:site_name" content="{{ config('app.name') }}">
    <meta jobs="og:title" content="{{ $seo['title'] ?? config('app.title', config('app.name')) }}">
    <meta jobs="og:description" content="{{ $seo['description'] ?? config('app.description', '') }}">
    <meta jobs="og:url" content="{{ $seo['canonical'] ?? url()->current() }}">
    <meta jobs="og:locale" content="{{ $seo['locale'] ?? 'en_US' }}">

    <meta jobs="og:image:type" content="image/jpeg">
    <meta jobs="og:image" content="{{ $seo['image'] ?? asset('default-og.jpg') }}">
    <meta jobs="og:image:width" content="1200">
    <meta jobs="og:image:height" content="630">
    <meta jobs="og:image:alt" content="{{ $seo['title'] ?? config('app.name') }}">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seo['title'] ?? config('app.title', config('app.name')) }}">
    <meta name="twitter:description" content="{{ $seo['description'] ?? config('app.description', '') }}">
    <meta name="twitter:image" content="{{ $seo['image'] ?? asset('default-og.jpg') }}">

    @if(!empty($seo['twitter_handle']))
        <meta name="twitter:site" content="{{ $seo['twitter_handle'] }}">
        <meta name="twitter:creator" content="{{ $seo['twitter_handle'] }}">
    @endif

    <meta name="robots" content="{{ $seo['robots'] ?? 'index, follow, max-image-preview:large' }}">
    <meta name="author" content="{{ config('app.name') }}">

    {{-- Theme & Mobile --}}
    <meta name="theme-color" content="#10184f">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="referrer" content="strict-origin-when-cross-origin">

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage"
        content="{{ asset('assets/' . config('app.assets') . '/images/favicon/mstile-150x150.png') }}">



    <link rel="canonical" href="{{ $seo['canonical'] ?? url()->current() }}">
    {{-- Favicon --}}
    <!-- Favicons -->
    <link rel="icon" href="{{ asset('assets/' . config('app.assets') . '/images/favicon/favicon.ico') }}">

    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('assets/' . config('app.assets') . '/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('assets/' . config('app.assets') . '/images/favicon/favicon-16x16.png') }}">

    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('assets/' . config('app.assets') . '/images/favicon/apple-touch-icon.png') }}">

    <link rel="mask-icon" href="{{ asset('assets/' . config('app.assets') . '/images/favicon/safari-pinned-tab.svg') }}"
        color="#0f766e">

    <link rel="manifest" href="{{ asset('assets/' . config('app.assets') . '/images/favicon/site.webmanifest') }}">


    {{-- JSON-LD Schema --}}
    @if(!empty($seo['schema']))
        <script type="application/ld+json">
                                                                                            {!! json_encode($seo['schema'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
                                                                                                    </script>
    @endif

    @if(!empty($seo['additional_schema']))
        @foreach($seo['additional_schema'] as $schema)
            <script type="application/ld+json">
                                                                                                                                                                                    {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
                                                                                                                                                                                                </script>
        @endforeach
    @endif

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('assets/kshititech/themes/css/app.css') }}" />


</head>

<body>
    @php
        $current = request()->segment(1);
    @endphp

    <div class="preloader" id="preloader">
        <img src="/assets/logo?size=75" />

    </div>

    <div class="wrapper">


        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="/assets/logo?size=75" alt="Logo" height="40" class="me-2">
                    <span class="mb-0 h2">{{ config('app.name', 'Shubhkamna') }}</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavDropdown"
                    aria-controls="mainNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

                <div id="mainNavDropdown" class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ $current == null ? 'active' : '' }}" href="{{ url('/') }}">
                                Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ $current == 'about-us' ? 'active' : '' }}"
                                href="{{ url('about-us') }}">
                                About
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ $current == 'services' ? 'active' : '' }}"
                                href="{{ url('services') }}">
                                Services
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ $current == 'contact-us' ? 'active' : '' }}"
                                href="{{ url('contact-us') }}">
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main>
            @yield("content")
        </main>

        <footer class="main-footer bg-primary">
            <section class="py-5">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-3">
                            <h5>About Us</h5>
                            <p>
                                Kshiti Technologies is a technology solutions company delivering
                                modern, scalable, and innovative digital services.
                            </p>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <h5>Services</h5>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="{{ url('/services/web-designing-development') }}" class="footer-link">
                                        Web Designing & Development
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/services/mobile-app-development') }}" class="footer-link">
                                        Mobile App Development
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/services/enterprise-software-solutions') }}" class="footer-link">
                                        Enterprise Software Solutions
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/services/digital-marketing') }}" class="footer-link">
                                        Digital Marketing
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/services/technology-consulting') }}" class="footer-link">
                                        Technology Consulting
                                    </a>
                                </li>
                            </ul>

                        </div>

                        <div class="col-md-6 col-lg-3">
                            <h5>Quick Links</h5>
                            <ul class="list-unstyled">
                                <li><a href="{{ url('/about-us') }}" class="footer-link">About Us</a></li>
                                <li><a href="{{ url('/portfolio') }}" class="footer-link">Portfolio</a></li>
                                <li><a href="{{ url('/careers') }}" class="footer-link">Careers</a></li>
                                <li><a href="{{ url('/privacy-policy') }}" class="footer-link">Privacy Policy</a></li>
                                <li><a href="{{ url('/terms-conditions') }}" class="footer-link">Terms & Conditions</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <h5>Contact Info</h5>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="mailto:info@jobs.com" class="footer-link">
                                        <i class="fa fa-envelope me-2"></i>info[at]jobs.com
                                    </a>
                                </li>
                                <li>
                                    <a href="tel:+917470822468" class="footer-link">
                                        <i class="fa fa-phone me-2"></i>+91 7470822468
                                    </a>
                                </li>
                            </ul>

                            <div class="d-flex">
                                <a href="https://www.facebook.com/jobs" class="footer-link me-2"
                                    aria-label="Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://www.instagram.com/jobs/" class="footer-link me-2"
                                    aria-label="Instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="https://www.linkedin.com/company/jobs" class="footer-link me-2"
                                    aria-label="LinkedIn">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="https://x.com/jobs" class="footer-link" aria-label="Twitter">
                                    <i class="fab fa-x-twitter"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="footer-bottom py-3 text-center border-top border-secondary">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center">
                        <small>All rights reserved.</small>

                        <a href="https://jobs.com/" target="_blank" class="footer-link">
                            <small>KSHITITECH</small>
                        </a>
                    </div>
                </div>
            </section>


        </footer>

    </div>

    <a href="https://wa.me/917470822468?text=I’m interested in your services — please share more details....."
        target="_blank">
        <i class="fa-brands fa-whatsapp whatsapp-float"></i>
    </a>

    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <!-- Bootstrap JS (Bundle includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>


    <script src="{{ asset('assets/kshititech/themes/js/app.js') }}"></script>

    @include('components.google-analytics')
</body>

</html>