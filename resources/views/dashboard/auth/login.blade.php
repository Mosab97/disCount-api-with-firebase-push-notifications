
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Samir Abboud">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/dashboard/assets/images/favicon.png')}}">
    <title>{{ trans('تسجيل الدخول الى لوحة التحكم') }}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('/dashboard/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('dashboard/assets/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard/assets/plugins/noty/noty.min.js') }}"></script>

    <!-- Custom CSS -->

        <link href="{{asset('/dashboard/rtl/css/style.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
        <style>
            body, h1, h2, h3, h4, h5, h6 {
                font-family: 'Cairo', sans-serif !important;
            }
        </style>

    <link href="{{asset('/dashboard/rtl/css/colors/blue-dark.css')}}" id="theme" rel="stylesheet">
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
                @include('partials._session')

                <form action="{{ route('dashboard.doLogin') }}" method="post" class="form-horizontal form-material">
                    <h3 class="box-title m-b-20">@lang('تسجيل دخول')</h3>

                    {{ csrf_field() }}
                    {{ method_field('post') }}


                    <div class="form-group has-feedback">
                        <input type="email" name="email" class="form-control" placeholder="@lang('الإيميل')">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control"
                               placeholder="@lang('كلمة السر')">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 font-14">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox" name="remember">
                                <label for="checkbox-signup">@lang('تذكرني')</label>
                            </div>
                            <a href="{{route('dashboard.forgot')}}" class="text-dark pull-right">
                                <i class="fa fa-lock m-r-5"></i> @lang(' فقدت كلمة المرور')</a>
                        </div>
                    </div>

                    <button type="submit"
                            class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light">@lang('تسجيل دخول')</button>

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
