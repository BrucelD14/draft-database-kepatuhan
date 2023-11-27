<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>JDIH | {{ $title }}</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap"
        rel="stylesheet">
    <link href="/css/landing/bootstrap.min.css" rel="stylesheet">

    {{-- <link href="css/landing/bootstrap-icons.css" rel="stylesheet"> --}}

    <link href="/css/landing/templatemo-topic-listing.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}



</head>

<body id="top">

    <main>

        {{-- NAVBAR START --}}
        @include('partials.navbar')
        {{-- NAVBAR END --}}

        @yield('container')
    </main>

    {{-- FOOTER START --}}
    @include('partials.footer')
    {{-- FOOTER END --}}

    <!-- JAVASCRIPT FILES -->
    <script src="/js/landing/jquery.min.js"></script>
    <script src="/js/landing/bootstrap.bundle.min.js"></script>
    <script src="/js/landing/jquery.sticky.js"></script>
    <script src="/js/landing/click-scroll.js"></script>
    <script src="/js/landing/custom.js"></script>

</body>

</html>
