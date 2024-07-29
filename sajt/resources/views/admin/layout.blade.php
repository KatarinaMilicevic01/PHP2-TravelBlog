<!DOCTYPE html>
<html>
@include('admin.fixed.head')
<body class="sidebar-mini sidebar-open dark-mode" style="height: auto; position: relative">
@include('admin.fixed.nav')
@yield('content')
@include('admin.fixed.footer')
@include('admin.fixed.scripts')
</body>
</html>
