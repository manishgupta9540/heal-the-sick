    <html lang="en">
      <head>
        <base href="./">
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
        <meta name="author" content="Łukasz Holeczek">
        <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
        <title>@yield('title','Admin | Chudats')</title> 
        <link rel="manifest" href="{{asset('admin/assets/favicon/manifest.json')}}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{asset('admin/assets/favicon/ms-icon-144x144.png')}}">
        <meta name="theme-color" content="#ffffff">
        <!-- Vendors styles-->
        <link rel="stylesheet" href="{{asset('admin/vendors/simplebar/css/simplebar.css')}}">
        <link rel="stylesheet" href="{{asset('admin/css/vendors/simplebar.css')}}">
        <!-- Main styles for this application-->
        <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
        <!-- We use those styles to show code examples, you should remove them in your application.-->
        <link href="{{asset('admin/css/examples.css')}}" rel="stylesheet">
        <link href="{{asset('admin/vendors/@coreui/chartjs/css/coreui-chartjs.css')}}" rel="stylesheet">
        {{-- toastr css --}}
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
       
        <!-- sweetalert css-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
       
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
      </head>
      <body>

        @include('admin.layouts.include.sidebar')

        <div class="wrapper d-flex flex-column min-vh-100 bg-light">
          @include('admin.layouts.include.header')

          @yield('content')

         @include('admin.layouts.include.footer')
        </div>
        <!-- CoreUI and necessary plugins-->
        <script src="{{asset('admin/vendors/@coreui/coreui/js/coreui.bundle.min.js')}}"></script>
        <script src="{{asset('admin/vendors/simplebar/js/simplebar.min.js')}}"></script>
        <!-- Plugins and scripts required by this view-->
        <script src="{{asset('admin/vendors/chart.js/js/chart.min.js')}}"></script>
        <script src="{{asset('admin/vendors/@coreui/chartjs/js/coreui-chartjs.js')}}"></script>
        <script src="{{asset('admin/vendors/@coreui/utils/js/coreui-utils.js')}}"></script>
        <script src="{{asset('admin/js/main.js')}}"></script>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script> 

        {{-- toastr js --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        <!-- sweetalert jsss-->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>

      

        @stack('customjs')
      </body>
    </html>