<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>


    
@include('partials.headadmin')
    <link rel="stylesheet" href="{{ asset('css/styles.css')}}">
</head>
<body>

<div class="container">
        @include('partials.navadmin')
        
        <main class="py-4">
            @yield('content')
        </main>
    
    
    @include('partials.footeradmin')


    </div>
</body>

</html>
