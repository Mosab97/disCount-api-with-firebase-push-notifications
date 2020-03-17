@extends('layouts.dashboard.app')

@section('title', __('إرسال إشعار'))

@section('css')
    <link rel="stylesheet" href="{{ asset('dashboard/assets/plugins/jstree/themes/default/style.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/plugins/dropify/dist/css/dropify.min.css') }}">

    {{-- select 2 --}}
    <link rel="stylesheet" href="{{ asset('dashboard/assets/plugins/select2/dist/css/select2.min.css') }}">
@endsection

@section('breadcrumb')

    @include('layouts.dashboard._breadcrumb', [
            'title'=> trans('الإشعارات'),
            'breadcrumb'=>[trans('الرئيسية') => route('dashboard.index'), trans('الإشعارات') => route('dashboard.categories.index'), trans('إضافة') => '']
        ])

@endsection

@section('content')

    @include('partials._errors')

    <form action="{{ route('dashboard.notifications.send') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('post') }}
        <div class="card">

            <div class="card-body">
                <h3 class="card-title mb-4">@lang('أرسل إشعار')
                </h3>
                <div class="row">
                    <div class="col-md-7">


                        <div class="form-group">
                            <label>إضافة  العنوان الرئيسي</label>
                            <input name="title" type="text" placeholder="العنوان الرئيسي" required="required" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label>إضافة  العنوان الفرعي</label>
                            <input name="title" type="text" placeholder=" العنوان الفرعي" required="required" class="form-control" />
                        </div>



                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info"><i class="fa fa-plus"></i> @lang('أرسل')
                    </button>
                </div>
            </div>

        </div>


    </form>

@endsection


@section('js')
    <script src="{{ asset('dashboard/assets/plugins/jstree/jstree.js') }}"></script>
    <script src="{{ asset('dashboard/assets/plugins/jstree/jstree.wholerow.js') }}"></script>
    <script src="{{ asset('dashboard/assets/plugins/jstree/jstree.checkbox.js') }}"></script>

    {{--Ckeditor--}}
    <script src="{{ asset('dashboard/assets/plugins/ckeditor/ckeditor.js') }}"></script>

    <script src="{{ asset('dashboard/assets/plugins/dropify/dist/js/dropify.min.js') }}"></script>



    {{-- select 2 --}}
    <script src="{{ asset('dashboard/assets/plugins/select2/dist/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $('.dropify').dropify();


    </script>


@endsection

