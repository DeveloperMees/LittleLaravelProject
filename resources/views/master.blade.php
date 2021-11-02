<!doctype html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body>
@include('partials.header')
<div id="app">
    @yield('content')
</div>
<div id="footer">
    <script src="{{mix('/js/app.js')}}"></script>
</div>
</body>
</html>
