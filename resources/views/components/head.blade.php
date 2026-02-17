<!-- Basic Meta -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="index, follow">
<meta name="author" content="{{ config('app.name') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">

@php
    $title = $seo['title'] ?? config('app.name');
    $description = $seo['description'] ?? config('app.description');

    $ogImage = $seo['image']
        ?? config('app.og_image')
        ?? route('assets.logo', ['size' => 300]);
@endphp

<title>{{ $title }}</title>

<!-- Title & Description -->
<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">
<link rel="canonical" href="{{ url()->current() }}">

<!-- Favicon -->
<link rel="icon" type="image/png" sizes="32x32" href="{{ route('assets.logo', ['size' => 32]) }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ route('assets.logo', ['size' => 180]) }}">

<!-- Open Graph -->
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ $ogImage }}">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $ogImage }}">