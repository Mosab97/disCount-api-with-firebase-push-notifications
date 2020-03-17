@extends('layouts.dashboard.app')

@section('title', __('المشرفين'))

@section('css')
    <!-- Footable CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/assets/plugins/footable/css/footable.core.css')}}">
@endsection

@section('breadcrumb')

    @include('layouts.dashboard._breadcrumb', [
        'title'=> trans('المشرفين'),
        'breadcrumb'=>[trans('الرئيسية') => route('dashboard.index'), trans('المشرفين') => '']
    ])

@endsection


@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">@lang('المشرفين')
                        <small>( {{ $admins->total()}} )</small>
                    </h3>

                    <form action="{{ route('dashboard.admins.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('البحث')"
                                       value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-info"><i
                                            class="fa fa-search"></i> @lang('البحث')</button>
                                    <a href="{{ route('dashboard.admins.create') }}" class="btn btn-info"><i
                                                class="fa fa-plus"></i> @lang('إضافة')</a>
                            </div>

                        </div>
                    </form><!-- end of form -->

                    <h6 class="card-subtitle mt-4"></h6>
                    <div class="table-responsive">
                        @if ($admins->count() > 0)
                            <table id="admins"
                                   class="table m-t-30 table-hover contact-list"
                                   data-page-size="7">
                                <thead class="align-content-center">
                                <tr>
                                    <th data-sort-initial="true"> # </th>
                                    <th>@lang('الاسم') </th>
                                    <th>@lang('رقم الهاتف') </th>
                                    <th data-sort-ignore="true"> @lang('تعديل') </th>
                                    <th data-sort-ignore="true"> @lang('حذف') </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($admins as $index => $admin)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td><img src="/images/{{ $admin->image_path }}" alt="user" width="40"
                                                 class="img-circle"> {{ $admin->name }}</td>
                                        </td>
                                        <td>{{ $admin->mobile }}</td>
                                        <td>
                                                <a href="{{ route('dashboard.admins.edit', $admin->id) }}"
                                                   class="btn btn-outline-info"><i
                                                            class="fa fa-edit"></i>
                                                </a>

                                        </td>
                                        <td>
                                                <form action="{{ route('dashboard.admins.destroy', $admin->id) }}"
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
                            <nav aria-label="Page navigation example">
                              <ul class="pagination justify-content-center">
                                @include('partials._paginator', ['paginator' => $admins])
                              </ul>
                            </nav>

                        @else

                            <h2>@lang('site.no_data_found')</h2>

                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')

    <!-- Footable -->
    <script src="{{asset('dashboard/assets/plugins/footable/js/footable.all.min.js')}}"
            type="text/javascript"></script>

    <script>
        $(function () {

            let addrow = $('#admins');

            addrow.footable().on('footable_row_expanded', function (e) {
                $('#admins tbody tr.footable-detail-show').not(e.row).each(function () {
                    $('#admins').data('footable').toggleDetail(this);
                });
            });

        });
    </script>

@endsection
