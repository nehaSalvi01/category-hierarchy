<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo @$metatitle; ?></title>
    <meta name="description" content="newproject">
    <meta name="author" content="newproject">
    <meta name="robots" content="noindex">
    <META NAME="robots" CONTENT="nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- 
    <link href="{{ asset('/asset/css/bootstrap.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('/asset/js/bootstrap.bundle.min.js') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('/asset/css/bootstrap.min.css') }}" rel="stylesheet" media="screen"> 
     -->
    <link href="{{ asset('/asset/css/custom.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.7/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.7/datatables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<body class="bg-gradient-primary">

    <?php echo view('layout.partial.navbar'); ?>

    <div class="container-fluid"style="min-height:85vh;">
        <main class="col-md-12 col-lg-12">
            @yield('content')
        </main>
    </div>
    </div>

    <?php echo view('layout.partial._footer'); ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="{{ asset('/asset/js/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('/asset/js/popper.min.js') }}"></script>

    <script src="{{ asset('/asset/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/asset/js/bootstrap.min.js') }}"></script>

    {{-- <script src="{{ asset('/asset/js/font-awesome.min.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="{{ asset('/asset/js/datatables.min.js') }}"></script>
    <script src="{{ asset('/asset/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('/asset/js/common.js') }}"></script>
</body>

</html>