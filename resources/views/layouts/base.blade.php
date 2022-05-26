<html>

<head>
    <title>@yield('title')</title>
    {{-- BootStrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        html {
            width: 90vw;
            margin: 0 auto;
        }

    </style>
</head>

<body>
    {{-- ヘッダー--}}
    @component('header.header')
    @endcomponent
    {{-- メイン --}}
    @section('content')
        <div class="container">
            <h2>@yield('title')</h2>
            <p>{{ $datetime }}</p>
            <p>{{ $company }}</p>
        @show
    </div>
</body>

</html>
