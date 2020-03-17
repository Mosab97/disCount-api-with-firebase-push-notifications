<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Samir Abboud">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/dashboard/assets/images/favicon.png')}}">
    <title>@yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('/dashboard/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('dashboard/assets/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard/assets/plugins/noty/noty.min.js') }}"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons 2.0.0 -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">

    @yield('css')

    <!-- Custom CSS -->

            <link href="{{asset('/dashboard/rtl/css/style.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
        <style>
            body, h1, h2, h3, h4, h5, h6 {
                font-family: 'Cairo', sans-serif !important;
            }

            .badge-notify{
                background-color: red;
                position: relative;
                top: -17px;
                right: -30px;
            }

            .notify {
                position: relative;
                top: -22px;
                right: 9px;
            }
        </style>

<!-- You can change the theme colors from here -->
    <link href="{{asset('/dashboard/ltr/css/colors/blue-dark.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">

@include('layouts.dashboard._preloader')

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">


@include('layouts.dashboard._header')

@include('layouts.dashboard._sidebar')
<!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

    @yield('breadcrumb')

    <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->

        @yield('content')
        @include('partials._session')
        <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        @include('layouts.dashboard._footer')
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('/dashboard/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('/dashboard/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('/dashboard/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('/dashboard/ltr/js/jquery.slimscroll.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('/dashboard/ltr/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('/dashboard/ltr/js/sidebarmenu.js')}}"></script>
<!--stickey kit -->
<script src="{{asset('/dashboard/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
<script src=".{{ asset('dashboard/assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

<!--Custom JavaScript -->
@if (app()->getLocale() == 'ar')
    <script src="{{asset('/dashboard/rtl/js/custom.min.js')}}"></script>
@else
    <script src="{{asset('/dashboard/ltr/js/custom.min.js')}}"></script>
@endif

<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
@yield('js')

<script>
    $(document).ready(function () {
        //delete
        $('.delete').click(function (e) {

            var that = $(this)

            e.preventDefault();

            var n = new Noty({
                text: "@lang('تأكيد الحذف')",
                type: "warning",
                killer: true,
                buttons: [
                    Noty.button("@lang('نعم')", 'btn btn-success mr-2', function () {
                        that.closest('form').submit();
                    }),

                    Noty.button("@lang('لا')", 'btn btn-primary mr-2', function () {
                        n.close();
                    })
                ]
            });

            n.show();

        });//end of delete

        let bg = '#fff';


        $('.notice').hover(function () {
            bg = $(this).css('background');
            $(this).css({
               'cursor': 'pointer',
                'background': '#ebf3f5'
            });
        }, function () {
            $(this).css({
                'background': bg
            });
        })


        $('.notice').on('click', function () {

            let noti = $(this).data('noti');

            window.location.href = "/dashboard/notifications/" + noti;
        })

    })


</script>

</body>

</html>

