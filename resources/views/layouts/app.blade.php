<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
@include('partials.head')

</head>

<div class="container">
    <body>
        @include('partials.nav')
        
        <main class="py-4">
            @yield('content')
        </main>
        
    
    @include('partials.footer')
    <script src="{{ asset('js/country.js') }}"></script>
    </body>

</div>

</html>
