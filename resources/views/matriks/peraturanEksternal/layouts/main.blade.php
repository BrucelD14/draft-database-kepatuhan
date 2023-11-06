<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap"
        rel="stylesheet">
    <link href="/css/landing/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap icons --}}
    <link href="/css/landing/templatemo-topic-listing.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">

    {{-- my CSS --}}
    <link rel="stylesheet" href="/css/style.css">

    <title>JDIH | {{ $title }}</title>
</head>

<body>

    <main>
        @include('partials.navbar')

        @yield('container')
    </main>

    {{-- FOOTER START --}}
    @include('partials.footer')
    {{-- FOOTER END --}}



    <script src="/js/landing/jquery.min.js"></script>
    <script src="/js/landing/bootstrap.bundle.min.js"></script>
    <script src="/js/landing/jquery.sticky.js"></script>
    <script src="/js/landing/click-scroll.js"></script>
    <script src="/js/landing/custom.js"></script>
    @include('matriks.peraturanEksternal.layouts.footer')

</body>

</html>
