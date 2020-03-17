@extends('layouts.dashboard.app')

@section('title', __('الحساب الشخصي'))

@section('css')
    <link rel="stylesheet" href="{{ asset('dashboard/assets/plugins/dropify/dist/css/dropify.min.css') }}">
@endsection
@section('breadcrumb')
    @include('layouts.dashboard._breadcrumb', [
        'title'=> trans('الحساب الشخصي'),
        'breadcrumb'=>[trans('الحساب الشخصي') => '']
    ])
@endsection

@section('content')

    @include('partials._errors')

    <form action="{{ route('dashboard.updateProfile') }}" method="post"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
        <div class="card">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-7">

                        <div class="form-group">
                            <label for="name">@lang('الاسم')</label>
                            <input type="text" id="name" name="name" class="form-control"
                                   value="{{ admin()->user()->name }}">
                        </div>

                        <div class="form-group">
                            <label for="email">@lang('الإيميل')</label>
                            <input type="email" id="email" name="email" class="form-control"
                                   value="{{ admin()->user()->email }}">
                        </div>

                        <div class="form-group">
                            <label for="password">@lang('كلمة المرور')</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>


                    </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{__('الصورة الشخصية')}}</h4>

                                <input type="file" id="input-file-now-custom-1" class="dropify"
                                       name="image"
                                       data-height="300"
                                       data-default-file="{{ admin()->user()->image_path }}"/>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> @lang('حفظ')
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
