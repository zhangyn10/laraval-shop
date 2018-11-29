<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- csrf_token -->
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>@yield('title', 'shop') - shop</title>
    <!-- 样式 -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div id="app" class="{{ route_class() }}-page">
        @include('layouts._header')
        <div class="container">
            @yield('content')
        </div>
        @include('layouts._footer')
    </div>
    <!-- js脚本 -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>