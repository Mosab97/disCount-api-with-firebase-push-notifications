@extends('layouts.dashboard.app')

@section('title', __('المتاجر'))

@section('css')
    <!-- Footable CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/assets/plugins/footable/css/footable.core.css')}}">
@endsection

@section('breadcrumb')

    @include('layouts.dashboard._breadcrumb', [
        'title'=> trans('المتاجر'),
        'breadcrumb'=>[trans('الرئيسية') => route('dashboard.index'), trans('المتاجر') => '']
    ])

@endsection


@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">@lang('المتاجر')
                        <small>( {{ $markets->total()}} )</small>
                    </h3>

                    <form action="{{ route('dashboard.markets.index') }}" method="get">

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
                        @if ($markets->count() > 0)
                            <table id="clients"
                                   class="table m-t-30 table-hover contact-list"
                                   data-page-size="7">
                                <thead class="align-content-center">
                                <tr>
                                    <th data-sort-initial="true"> # </th>
                                    <th data-toggle="true">@lang('صورة المتجر') </th>
                                    <th data-toggle="true">@lang('الاسم') </th>
                                    <th data-toggle="true">@lang('الكبون') </th>
                                    <th data-toggle="true">@lang('نسبة الخصم') </th>
                                    <th data-toggle="true">@lang('القسم') </th>
                                    <th>@lang('تعديل') </th>
                                    <th>@lang('حذف') </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($markets as $index => $market)
                                    <tr >
                                        <td> {{ $index + 1 }} </td>
                                        <td> <img width="70" src="/images/{{ $market->image}}"> </td>
                                        <td> {{ $market->name }} </td>
                                        <td> {{ $market->coupon }} </td>
                                        <td> {{ $market->discount }} </td>
                                        <td> {{ $market->CategoryName[0]}}  </td>

                                        <td>
                                            <a href="{{ route('dashboard.markets.edit', $market->id) }}"
                                               class="btn btn-outline-info"><i
                                                    class="fa fa-edit"></i>
                                            </a>

                                        </td>
                                        <td>
                                                <form action="{{ route('dashboard.markets.destroy', $market->id) }}"
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
                                @include('partials._paginator', ['paginator' => $markets])
                              </ul>
                            </nav>
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

    <!-- Footable -->
    <script src="{{asset('dashboard/assets/plugins/footable/js/footable.all.min.js')}}"
            type="text/javascript"></script>

    <script>
        $(function () {

            let addrow = $('#clients');

            addrow.footable().on('footable_row_expanded', function (e) {
                $('#clients tbody tr.footable-detail-show').not(e.row).each(function () {
                    $('#clients').data('footable').toggleDetail(this);
                });
            });

        });
    </script>

@endsection
