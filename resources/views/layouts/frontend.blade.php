<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('components.head')

 <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('assets/themes/css/app.css') }}">
</head>

<body>
    @include('components.header')
    <main>
        @yield('content')
    </main>
    @include('components.footer')

     <!-- jQuery (Required) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('assets/themes/js/app.js') }}"></script>
    @include('components.google-analytics')

</body>

</html>