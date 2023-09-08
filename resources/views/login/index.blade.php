<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.112.5">
    <title>Kepatuhan | {{ $title }}</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- My CSS --}}
    <link rel="stylesheet" href="/css/style.css">

</head>

<body>

    <div class="container">
        <div class="hero text-center mt-4 p-2 border border-start-0 border-end-0 border-2">
            <h4>JARINGAN DOKUMENTASI DAN INFORMASI HUKUM (JDIH)</h4>
            <h2>PT INDUSTRI KERETA API (PERSERO)</h2>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">

                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <main class="form-signin text-center">
                    <h1 class="h3 mb-3 fw-normal">Please login</h1>
                    <form action="/" method="post">
                        @csrf
                        <div class="form-floating">
                            <input type="number" name="nip" class="form-control @error('nip') is-invalid @enderror"
                                id="nip" placeholder="nip" autofocus required value="{{ old('nip') }}">
                            <label for="nip">NIP</label>
                            @error('nip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>
                        <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
                    </form>
                </main>
            </div>
        </div>
    </div>




    {{-- Boostrap script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
