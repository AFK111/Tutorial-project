<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>{{ env('APP_NAME','BestBlog') }}</title>  <!-- {{}} these nested brackets used to read variables in laravel -->
    <!-- CSRF Token -->



  </head>
  <body>
    @include('includes.navbar')
    <br/  >
    <div class="container">
    @include('includes.messages')
    @yield('content')
    </div>

  </body>
</html>
