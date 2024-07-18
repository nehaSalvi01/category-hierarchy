<!DOCTYPE html>
<html lang="en">
<head>
    <title>Benam</title>
    <meta name="robots" content="noindex">
    <META NAME="robots" CONTENT="nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/asset/css/bootstrap.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('/asset/css/datatables.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('/asset/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('/asset/css/custom.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('/asset/css/datepicker.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('/asset/css/datepicker_style.css') }}" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="{{asset('/asset/css/font-awesome.min.css')}}"  />

    {{-- Page specific css --}}
    @stack('pageSpecificCss') 
</head>
<body class="bg-gradient-primary">
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 
    @yield('content')    
    {{-- Page specific scripts --}}
  
    <script src="{{ asset('/asset/js/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('/asset/js/popper.min.js') }}"></script>
    <script src="{{ asset('/asset/js/bootstrap.js') }}"></script>

    <script src="{{ asset('/asset/js/datatables.min.js') }}"></script>
    <script src="{{ asset('/asset/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('/asset/js/common.js') }}"></script>
    @include('success')
    @stack('pageSpecificJs') 
    
</body>
<script>
    function closeChildBox() {
    $('.carousel__button').trigger('click');
}
    <?php if (@Session::get('success')) { ?>
setTimeout(function() {
    window.parent.location.reload(1);
}, 1000);
<?php } ?>
    </script>
</html>