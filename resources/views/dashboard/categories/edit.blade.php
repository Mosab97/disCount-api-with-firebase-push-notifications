@extends('layouts.dashboard.app')

@section('title', __('تعديل') . ' ' . __('قسم'))

@section('css')
    <link rel="stylesheet" href="{{ asset('dashboard/assets/plugins/jstree/themes/default/style.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/plugins/dropify/dist/css/dropify.min.css') }}">

    {{-- select 2 --}}
    <link rel="stylesheet" href="{{ asset('dashboard/assets/plugins/select2/dist/css/select2.min.css') }}">
@endsection

@section('breadcrumb')

    @include('layouts.dashboard._breadcrumb', [
            'title'=> trans('الأقسام'),
            'breadcrumb'=>[trans('الرئيسية') => route('dashboard.index'), trans('الأقسام') => route('dashboard.categories.index'), trans('تعديل') => '']
        ])

@endsection

@section('content')

    @include('partials._errors')

    <form action="{{ route('dashboard.categories.update', $category) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
        <div class="card">

            <div class="card-body">
                <h3 class="card-title mb-4">@lang('تعديل')
                </h3>
                <div class="row">
                    <div class="col-md-7">



                        <div class="form-group">
                            <label>إضافة اسم القسم</label>
                            <input name="name" type="text" placeholder="الأسم" value="{{$category->name}}" class="form-control" />
                        </div>



                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info"><i class="fa fa-edit"></i> @lang('تعديل')
                    </button>
                </div>
            </div>

{{-- in_header --}}       </div>


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

    <script !src="">
            $('.dropify').dropify();

    </script>
@endsection

