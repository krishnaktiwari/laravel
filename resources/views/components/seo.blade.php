{{-- Character Encoding --}}
<meta charset="UTF-8">

{{-- Viewport --}}
<meta name="viewport" content="width=device-width, initial-scale=1.0">

{{-- DNS Prefetch & Preconnect --}}
<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
<link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
<link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
<link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">

{{-- Title --}}
<title>@yield('title', $seo['title'] ?? config('app.title', config('app.name')))</title>

{{-- Primary SEO Meta Tags --}}
<meta name="description" content="{{ $seo['description'] ?? config('app.description', '') }}">
<meta name="author" content="{{ config('app.name') }}">

@if(isset($seo['keywords']) && !empty($seo['keywords']))
    <meta name="keywords" content="{{ $seo['keywords'] }}">
@endif

<meta name="robots"
    content="{{ $seo['robots'] ?? 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' }}">

{{-- Canonical URL --}}
<link rel="canonical" href="{{ $seo['canonical'] ?? url()->current() }}">

{{-- Alternate Language Versions --}}
@if(isset($seo['alternate_languages']) && !empty($seo['alternate_languages']))
    @foreach($seo['alternate_languages'] as $lang => $url)
        <link rel="alternate" hreflang="{{ $lang }}" href="{{ $url }}">
    @endforeach
    <link rel="alternate" hreflang="x-default" href="{{ $seo['canonical'] ?? url()->current() }}">
@endif

{{-- Default OG Image Same as Favicon Path --}}
@php
    $defaultOgImage = asset('assets/' . config('app.assets') . '/images/og.png');
    $imageAlt = $seo['image_alt'] ?? $seo['title'] ?? config('app.name');
@endphp

{{-- Open Graph Meta Tags --}}
<meta property="og:type" content="{{ $seo['og_type'] ?? 'website' }}">
<meta property="og:site_name" content="{{ config('app.name') }}">
<meta property="og:title" content="{{ $seo['title'] ?? config('app.title', config('app.name')) }}">
<meta property="og:description" content="{{ $seo['description'] ?? config('app.description', '') }}">
<meta property="og:url" content="{{ $seo['canonical'] ?? url()->current() }}">
<meta property="og:locale" content="{{ $seo['locale'] ?? 'en_US' }}">

<meta property="og:image" content="{{ $seo['image'] ?? $defaultOgImage }}">
<meta property="og:image:secure_url" content="{{ $seo['image'] ?? $defaultOgImage }}">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="512">
<meta property="og:image:height" content="512">
<meta property="og:image:alt" content="{{ $imageAlt }}">

@if(isset($seo['article_published_time']) && !empty($seo['article_published_time']))
    <meta property="article:published_time" content="{{ $seo['article_published_time'] }}">
@endif

@if(isset($seo['article_modified_time']) && !empty($seo['article_modified_time']))
    <meta property="article:modified_time" content="{{ $seo['article_modified_time'] }}">
@endif

@if(isset($seo['article_author']) && !empty($seo['article_author']))
    <meta property="article:author" content="{{ $seo['article_author'] }}">
@endif

{{-- Twitter Card Meta Tags --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seo['title'] ?? config('app.title', config('app.name')) }}">
<meta name="twitter:description" content="{{ $seo['description'] ?? config('app.description', '') }}">
<meta name="twitter:image" content="{{ $seo['image'] ?? $defaultOgImage }}">
<meta name="twitter:image:alt" content="{{ $imageAlt }}">

@if(isset($seo['twitter_handle']) && !empty($seo['twitter_handle']))
    <meta name="twitter:site" content="{{ $seo['twitter_handle'] }}">
    <meta name="twitter:creator" content="{{ $seo['twitter_handle'] }}">
@endif

{{-- Additional SEO Meta Tags --}}
<meta name="referrer" content="strict-origin-when-cross-origin">
<meta http-equiv="x-ua-compatible" content="ie=edge">

{{-- Geo Tags --}}
@if(isset($seo['geo_region']) && !empty($seo['geo_region']))
    <meta name="geo.region" content="{{ $seo['geo_region'] }}">
    <meta name="geo.placename" content="{{ $seo['geo_placename'] }}">
    <meta name="geo.position" content="{{ $seo['geo_position'] }}">
    <meta name="ICBM" content="{{ $seo['geo_position'] }}">
@endif

{{-- Theme & Mobile App Meta Tags --}}
<meta name="theme-color" content="#ffffff">
<meta name="format-detection" content="telephone=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="{{ config('app.name') }}">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage"
    content="{{ asset('assets/' . config('app.assets') . '/images/favicon/mstile-150x150.png') }}">

{{-- Favicons --}}
<link rel="icon" href="{{ asset('assets/' . config('app.assets') . '/images/favicon/favicon.ico') }}" sizes="any">
<link rel="icon" type="image/png" sizes="32x32"
    href="{{ asset('assets/' . config('app.assets') . '/images/favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16"
    href="{{ asset('assets/' . config('app.assets') . '/images/favicon/favicon-16x16.png') }}">
<link rel="apple-touch-icon" sizes="180x180"
    href="{{ asset('assets/' . config('app.assets') . '/images/favicon/apple-touch-icon.png') }}">
<link rel="mask-icon"
    href="{{ asset('assets/' . config('app.assets') . '/images/favicon/safari-pinned-tab.svg') }}"
    color="#0f766e">
<link rel="manifest"
    href="{{ asset('assets/' . config('app.assets') . '/images/favicon/site.webmanifest') }}">

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

