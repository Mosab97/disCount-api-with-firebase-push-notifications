@extends('layouts.dashboard.app')

@section('title', __('إضافة قسم'))

@section('css')
    <link rel="stylesheet" href="{{ asset('dashboard/assets/plugins/jstree/themes/default/style.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/plugins/dropify/dist/css/dropify.min.css') }}">

    {{-- select 2 --}}
    <link rel="stylesheet" href="{{ asset('dashboard/assets/plugins/select2/dist/css/select2.min.css') }}">
@endsection

@section('breadcrumb')

    @include('layouts.dashboard._breadcrumb', [
            'title'=> trans('المتاجر'),
            'breadcrumb'=>[trans('الرئيسية') => route('dashboard.index'), trans('المتاجر') => route('dashboard.markets.index'), trans('إضافة') => '']
        ])

@endsection

@section('content')

    @include('partials._errors')

    <form action="{{ route('dashboard.markets.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('post') }}
        <div class="card">

            <div class="card-body">
                <h3 class="card-title mb-4">@lang('أضف')
                </h3>
                <div class="row">
                    <div class="col-md-7">


                        <div class="form-group">
                            <label>إضافة اسم المتجر</label>
                            <input name="name" type="text" placeholder="الأسم" required="required" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label>إضافة  الكبون</label>
                            <input name="coupon" type="text" placeholder="الكبون" required="required" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label>إضافة نسبة الخصم</label>
                            <input name="discount" type="number" placeholder="الخصم" required="required" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label>إضافة رابط المتجر</label>
                            <input name="url" type="text" placeholder="رابط المتجر" required="required" class="form-control" />
                        </div>


                        <div class="form-group">
                            <label >  إختيار القسم: </label>
                            <select
                                class="category form-control "
                                required="required"
                                id="category_id"
                                name="category_id">
                                <option value="0" disabled="true" selected="true">اختيار القسم</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>
                    <div class="col-md-5" >
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{__('أضف صورة المتجر')}}</h4>

                                <input type="file" id="input-file-now-custom-1" class="dropify"
                                       name="image"
                                       data-height="300"
                                       data-default-file="{{ asset('uploads/advertisements_images/default.png') }}"/>


                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info"><i class="fa fa-plus"></i> @lang('أضف')
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

