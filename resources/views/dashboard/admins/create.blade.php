@extends('layouts.dashboard.app')

@section('title', __('اضف') . ' ' . __('مشرف') )

@section('css')
    <link rel="stylesheet" href="{{ asset('dashboard/assets/plugins/dropify/dist/css/dropify.min.css') }}">
@endsection

@section('breadcrumb')

    @include('layouts.dashboard._breadcrumb', [
        'title'=> trans('المشرفين'),
        'breadcrumb'=>[trans('الرئيسية') => route('dashboard.index'), trans('المشرفين') => route('dashboard.admins.index'), trans('إضافة') => '']
    ])

@endsection



@section('content')


    @include('partials._errors')

    <form action="{{ route('dashboard.admins.store') }}" method="post"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('post') }}
        <div class="card">

            <div class="card-body">
                <h3 class="card-title mb-4">@lang('إضافة')
                </h3>
                <div class="row">
                    <div class="col-md-7">

                        <div class="form-group">
                            <label for="name">@lang('الاسم')</label>
                            <input required type="text" id="name" name="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">@lang(' الإيميل')</label>
                            <input required type="text" id="email" name="email" class="form-control">
                        </div>


                        <div class="form-group">
                            <label for="password">@lang('كلمة المرور')</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>


                    </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{__('الصوة الشخصية')}}</h4>

                                <input type="file" id="input-file-now-custom-1" class="dropify"
                                       name="image_path"
                                       data-height="300"
                                       data-default-file="{{ asset('uploads/admin_images/default.png') }}"/>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info"><i class="fa fa-plus"></i> @lang('أضافة')
                    </button>
                </div>
            </div>

        </div>


    </form>

@endsection
@section('js')
    <script src="{{ asset('dashboard/assets/plugins/dropify/dist/js/dropify.min.js') }}"></script>
    <script !src="">

        $(document).ready(function () {
            // Basic
            $('.dropify').dropify();
        });

    </script>
@endsection
