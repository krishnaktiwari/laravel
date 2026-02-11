<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

        <title>{{ $seo['title'] ?? config('app.name') }}</title>

        <meta name="description" content="{{ $seo['description'] ?? '' }}">
        <meta name="keywords" content="{{ $seo['keywords'] ?? '' }}">
        <meta name="author" content="{{ $seo['author'] ?? '' }}">

        <!-- Open Graph (Facebook / LinkedIn) -->
        <meta property="og:title" content="{{ $seo['title'] ?? '' }}">
        <meta property="og:description" content="{{ $seo['description'] ?? '' }}">
        <meta property="og:image" content="{{ $seo['image'] ?? '' }}">
        <meta property="og:url" content="{{ $seo['url'] ?? '' }}">
        <meta property="og:type" content="website">

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $seo['title'] ?? '' }}">
        <meta name="twitter:description" content="{{ $seo['description'] ?? '' }}">
        <meta name="twitter:image" content="{{ $seo['image'] ?? '' }}">

        <!-- ✅ Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- ✅ FontAwesome Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

        <!-- ✅ Swiper Slider CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    </head>
    <body >
        <!-- ✅ Include Navbar -->
        @include("components.navbar")
        <main class="main-container">
            @yield("content")
        </main>

        <!-- ✅ Include Navbar -->
        @include("components.footer")

        <!-- ✅ Bootstrap JS Bundle -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <!-- ✅ Swiper Slider JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <!-- ✅ Swiper Init -->
        <script>
var swiper = new Swiper(".mySwiper", {
    loop: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
        </script>

    </body>
</html>
