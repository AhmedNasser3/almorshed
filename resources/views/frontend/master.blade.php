<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('images/الشعار.png') }}" type="image/x-icon">
    {{--  header css  --}}
    <link rel="stylesheet" href="{{ asset('css/frontend/header.css') }}">
    {{--  home css  --}}
    <link rel="stylesheet" href="{{ asset('css/frontend/home.css') }}">
    {{--  category css  --}}
    <link rel="stylesheet" href="{{ asset('css/frontend/category.css') }}">
    {{--  banner css  --}}
    <link rel="stylesheet" href="{{ asset('css/frontend/banner.css') }}">
    {{--  hero css  --}}
    <link rel="stylesheet" href="{{ asset('css/frontend/hero.css') }}">
    {{--  cards css  --}}
    <link rel="stylesheet" href="{{ asset('css/frontend/cards.css') }}">
     {{--  fontAwesome  --}}
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Almorshed</title>
</head>
<body>
    @include('frontend.include.header')
    <div>
        @yield('frontendContent')
    </div>
</body>
</html>
