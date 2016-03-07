<html>
<head>
    <meta charset="UTF-8">
    <title>ToDo Application</title>

    {{--Stylesheets--}}
    <link href="/styles/styles.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    <script src="/js/vendor.js"></script>

    @stack('scripts')
</body>
</html>