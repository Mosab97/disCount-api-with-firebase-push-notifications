@extends('layouts.dashboard.app')

@section('title', __('الأقسام'))

@section('css')
    <link rel="stylesheet" href="{{ asset('dashboard/assets/plugins/jstree/themes/default/style.css') }}">
@endsection

@section('breadcrumb')
    @include('layouts.dashboard._breadcrumb', [
        'title'=> trans('الأقسام'),
        'breadcrumb'=>[trans('الرئيسية') => route('dashboard.index'), trans('الأقسام') => '']
    ])
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">@lang('الأقسام')
                        <small></small>
                    </h3>

                    <form action="{{ route('dashboard.categories.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('البحث')"
                                       value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-info"><i
                                        class="fa fa-search"></i> @lang('البحث')</button>
                            </div>

                        </div>
                    </form><!-- end of form -->

                    <h6 class="card-subtitle mt-4"></h6>
                    <div class="table-responsive">
                        @if ($categories->count() > 0)
                            <table id="clients"
                                   class="table m-t-30 table-hover contact-list"
                                   data-page-size="7">
                                <thead class="align-content-center">
                                <tr>
                                    <th data-sort-initial="true"> # </th>
                                    <th data-toggle="true">@lang('اسم القسم ') </th>
                                    <th>@lang('تعديل') </th>
                                    <th>@lang('حذف') </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($categories as $index => $categorie)
                                    <tr >
                                        <td> {{ $index + 1 }} </td>
                                        <td> {{ $categorie->name}}  </td>

                                        <td>
                                            <a href="{{ route('dashboard.categories.edit', $categorie->id) }}"
                                               class="btn btn-outline-info"><i
                                                    class="fa fa-edit"></i>
                                            </a>

                                        </td>


                                        <td>
                                            <form action="{{ route('dashboard.categories.destroy', $categorie->id) }}"
                                                  method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-outline-danger delete"><i
                                                        class="fa fa-trash"></i></button>
                                            </form><!-- end of form -->

                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="text-right">
                                            <ul class="pagination" style="display: none;"></ul>
                                        </div>
                                    </td>
                                </tr>
                                </tfoot>
                            </table> <!-- end of table -->

                        @else

                            <h2>@lang('لا يوجد بيانات')</h2>

                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('dashboard/assets/plugins/jstree/jstree.js') }}"></script>
    <script src="{{ asset('dashboard/assets/plugins/jstree/jstree.wholerow.js') }}"></script>
    <script src="{{ asset('dashboard/assets/plugins/jstree/jstree.checkbox.js') }}"></script>

@endsection
