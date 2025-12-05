<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ $title }}</title>
    <link rel="icon" href="{{ asset(iconsLoad()['favicon']) }}">
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/patient.css') }}">
  <script src="{{ asset('js/jquery.min.js') }}"></script>
</head>

<body class="bg-gray-100">
    <div >

        @include('partials.patient.header')
        <div class="container mx-auto my-5 p-5">
            <div class="md:flex no-wrap md:-mx-2 ">
                <div class="md:w-3/12 md:mx-4">
                    @include('partials.patient.sidebar')
                </div>
                @yield('content')
            </div>
        </div>

    </div>

    <script src="{{ asset('js/alpine.js') }}" defer></script>

    <script src="{{ asset('js/sweetalert.min.js') }}"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                text: "{{ session('success') }}",
                icon: "success",
                button: "ok",
            });
        </script>
    @endif
    @if ($errors->any())
        <script>
            Swal.fire({
                text: "{{ $errors->first() }}",
                icon: "error",
                button: "ok",
            });
        </script>
    @endif
    @if (session('info'))
        <script>
            Swal.fire({
                text: "{{ session('info') }}",
                icon: "info",
                button: "ok",
            });
        </script>
    @endif
    @if (session('warning'))
        <script>
            Swal.fire({
                text: "{{ session('warning') }}",
                icon: "warning",
                button: "ok",
            });
        </script>
    @endif
</body>
