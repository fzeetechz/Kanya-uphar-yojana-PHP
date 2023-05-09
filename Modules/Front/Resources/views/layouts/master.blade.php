<!DOCTYPE html>
<html class="no-js">
    @include('front::layouts.includes.head')
    <body>
        @include('front::layouts.includes.header')
        @yield('content')
        @include('front::layouts.includes.footer')
    </body>
</html>
