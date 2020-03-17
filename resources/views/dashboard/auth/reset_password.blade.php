
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Samir Abboud">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/dashboard/assets/images/favicon.png')}}">
    <title>Admin Press Admin Template - Blank Page</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('/dashboard/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->

        <link href="{{asset('/dashboard/rtl/css/style.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
        <style>
            body, h1, h2, h3, h4, h5, h6 {
                font-family: 'Cairo', sans-serif !important;
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

<body>

@include('layouts.dashboard._preloader')

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<section id="wrapper">
    <div class="login-register"
         style="background-image: url({{asset('/dashboard/assets/images/background/login-register.jpg')}});">
        <div class="login-box card">
            <div class="card-body">

                @include('partials._errors')

                <form action="{{ route('dashboard.submitResetPassword', $data->token) }}" method="post" class="form-horizontal form-material">
                    <h3 class="box-title m-b-20">@lang('site.recover_password')</h3>

                    {{ csrf_field() }}
                    {{ method_field('post') }}

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input required class="form-control" type="password" name="password"  placeholder="@lang('site.text_type_password')">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input required class="form-control" type="password" name="password_confirmation" placeholder="@lang('site.text_type_password_confirmation')">
                        </div>
                    </div>


                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">@lang('site.change')</button>
                    </div>

                </form><!-- end of form -->
            </div>
        </div>
    </div>
</section>
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

<!--Custom JavaScript -->
@if (app()->getLocale() == 'ar')
    <script src="{{asset('/dashboard/rtl/js/custom.min.js')}}"></script>
@else
    <script src="{{asset('/dashboard/ltr/js/custom.min.js')}}"></script>
@endif
</body>

</html>
