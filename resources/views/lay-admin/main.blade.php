<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <title>Dashboard {{ (isset($page)) ? $page : '' }} - {{ mine()['longTitle'] }}</title>
        <meta name="author" content="Dion Zebua">
        <meta property="og:description" content="Dashboard {{ (isset($page)) ? $page : '' }} - {{ mine()['longTitle'] }}" />
        <meta property="og:title" content="Dashboard {{ (isset($page)) ? $page : '' }} - {{ mine()['longTitle'] }}" />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:image" content="{{ asset('assets/img/icons/logo.jpeg') }}" />
        <meta name="keywords" content="Dashboard {{ (isset($page)) ? $page : '' }} - {{ mine()['longTitle'] }}">
        <meta name="description" content="Dashboard {{ (isset($page)) ? $page : '' }} - {{ mine()['longTitle'] }}">

        <link rel="apple-touch-icon" href="{{ asset('assets/img/icons/logo.jpeg') }}">
        <link rel="icon" size="16x16" href="{{ asset('assets/img/icons/logo.jpeg') }}">
        <link rel="icon" size="32x32" href="{{ asset('assets/img/icons/logo.jpeg') }}">
        <link rel="icon" size="180x180" href="{{ asset('assets/img/icons/logo.jpeg') }}">
        <link rel="shortcut icon" href="{{ asset('assets/img/icons/logo.jpeg') }}">
        <link href="{{ asset('assets/img/icons/logo.jpeg') }}" rel="icon">

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
      @yield('admin')
        

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('admin/js/scripts.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>
        <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    </body>
</html>