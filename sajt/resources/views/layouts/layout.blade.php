{{--korisnicki layout koji nasledjuje promenljivi deo stranice--}}
    <!DOCTYPE html>
<html>
@include('fixed.head')
<body>
@include('fixed.nav')

@yield('content')

@include('fixed.footer')
</body>
</html>
