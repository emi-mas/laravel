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

        .search-box {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }

        .align-left {
            text-align: left;
        }

        .align-right {
            text-align: right;
        }

        .btn-container {
            width: 100%;
        }

        .btn-group {
            /* width: 30%; */
        }

        .btn-group .btn {
            flex: none;
            margin: 5px;
        }

        .btn-group>.btn:not(:last-child):not(.dropdown-toggle) {
            border-top-right-radius: 0.25rem;
            border-bottom-right-radius: 0.25rem;
        }

        .btn-group>:not(.btn-check)+.btn {
            border-top-left-radius: 0.25rem;
            border-bottom-left-radius: 0.25rem;
        }

    </style>
</head>

<body>
    {{-- ヘッダー --}}
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
