<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-style-mode" content="1"> <!-- 0 == light, 1 == dark -->

    <title></title>
    <!-- Favicon -->
    @include('frontend.default.inc.css')
</head>

<body>


@yield('content')
<!-- JS
============================================ -->
@include('frontend.default.inc.scripts')
</body>

</html>
