<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    {{-- css bootstrap --}}
    @include('frontend.layouts.cssfront')
    {{-- js header --}}
    @include('frontend.layouts.jsfront')
</head>

<body>
    {{-- @include('frontend.partials.nav') --}}
    {{-- @include('frontend.partials.banner') --}}

    @include('frontend.partials.nav')

    @include('frontend.partials.navup')

    @yield('container')

    @include('frontend.partials.footer1')

    @include('frontend.partials.footer2')

</body>
{{-- js footer --}}
@include('frontend.layouts.jsfrontfooter')

</html>
