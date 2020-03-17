@extends('layouts.dashboard.app')

@section('title', __('الرئيسيه'))

@section('css')
    <link rel="stylesheet" href="{{ asset('dashboard/assets/plugins/morrisjs/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/plugins/Magnific-Popup-master/dist/magnific-popup.css') }}">

@endsection

@section('breadcrumb')
    @include('layouts.dashboard._breadcrumb', [
        'title'=> trans('الرئيسيه'),
        'breadcrumb'=>[trans('الرئيسيه') => '']
    ])
@endsection


@section('content')

    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi-widgets"></i></h2>
                        <h3 class="">{{$count_category}}</h3>
                        <h6 class="card-subtitle text-capitalize">{{ trans('الأقسام') }}</h6></div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 85%; height: 6px;"
                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi-briefcase-check text-info"></i></h2>
                        <h3 class="">{{$count_subCategory}}</h3>
                        <h6 class="card-subtitle text-capitalize">{{ trans('المتاجر') }}</h6></div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 40%; height: 6px;"
                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi-alert-circle text-success"></i></h2>
                        <h3 class="">{{$total}}</h3>
                        <h6 class="card-subtitle text-capitalize">{{ trans('الطلبات') }}</h6></div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 56%; height: 6px;"
                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi-buffer text-warning"></i></h2>
                        <h3 class="">{{$count_user}}</h3>
                        <h6 class="card-subtitle">{{ trans('مستخدم') }}</h6></div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 26%; height: 6px;"
                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection




@section('js')

    <script src="{{ asset('dashboard/assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup-init.js') }}"></script>
    <script src="{{ asset('dashboard/assets/plugins/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/plugins/morrisjs/morris.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('dashboard/ltr/js/dashboard4.js') }}"></script>

@endsection
