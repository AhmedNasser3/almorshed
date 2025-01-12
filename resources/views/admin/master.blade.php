<!DOCTYPE html>
<html lang="en" {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('images/الشعار.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/admin/home.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    {{--  fontAwesome  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{--  header css  --}}
    <link rel="stylesheet" href="{{ asset('css/admin/header.css') }}">
    {{--  sidebar css  --}}
    <link rel="stylesheet" href="{{ asset('css/admin/sidebar.css') }}">
    {{--  adminsCreate css  --}}
    <link rel="stylesheet" href="{{ asset('css/admin/createUsers/admins.css') }}">
    <title>Almorshed</title>
</head>
<body>
    @include('admin.layouts.header')
    <div class="master" style="background-color: #f2f8ff;min-height:100vh;">
        @yield('AdminContent')
    </div>
    @include('admin.layouts.sidebar')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/categories.js') }}"></script>
    <script src="{{ asset('js/notify.js') }}"></script>
</body>
</html>
