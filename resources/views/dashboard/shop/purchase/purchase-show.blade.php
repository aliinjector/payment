@extends('dashboard.layouts.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row my-4">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item ">سفارش کاربر</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                        </ol>
                    </div>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>

        @include('dashboard.layouts.errors')



                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">{{ __('dashboard-shop-users-index.ListKarbaranTitle') }}</h4>
                                <p class="text-muted mb-4 font-13">{{ __('dashboard-shop-users-index.ListKarbaranDesc') }}</p>
                                <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="searchBox bg-dark"  style="margin-top: -15px;">
                                                <input type="text" id="myInputTextField" class="searchInput">
                                                <button class="searchButton" href="#">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                            <div class="table-responsive">

                                                <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer font-16" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid">
                                                    <thead style="text-align: center">
                                                      <tr role="row">
                                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">شناسه
                                                          </th>
                                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">نام محصول
                                                          </th>
                                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">قیمت
                                                          </th>
                                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">تعداد
                                                          </th>
                                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">رنگ
                                                          </th>
                                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">خصوصیات
                                                          </th>
                                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">قیمت خصوصیت
                                                          </th>
                                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">قیمت جمع کالا
                                                          </th>
                                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">خریدار
                                                          </th>

                                                      </tr>
                                                    </thead>
                                                    <tbody class="iranyekan">
                                                      @php
                                                        $id = 1;
                                                      @endphp

                                                      @foreach ($purchase->cart()->withTrashed()->where('status' , 1)->get()->first()->cartProduct as $product)

                                                        <tr role="row" class="odd">
                                                          <td>{{ $id }}</td>
                                                            <td><a href="{{ route('product', ['shop'=>$purchase->shop->english_name, 'slug'=>$product->product()->withTrashed()->get()->first()->slug, 'id'=>$product->product()->withTrashed()->get()->first()->id]) }}">{{ $product->product()->withTrashed()->get()->first()->title }}</a></td>
                                                            <td>{{ number_format($product->total_price / $product->quantity ) }} تومان</td>
                                                            <td>{{ $product->quantity }}</td>
                                                            @if($product->color)
                                                            <td>{{ $product->color->name }}</td>
                                                            @else
                                                              <td>-</td>
                                                          @endif
                                                          @if ($product->specification != null)
                                                            <td>
                                                          @foreach($product->specification as $specificationId)
                                                            @foreach($specificationItems->where('id', $specificationId)->unique('id') as $specificationItem)

                                                            {{ $specificationItem->specification()->withTrashed()->get()->first()->name }} :  {{ $specificationItem->name }} <br>
                                                            @endforeach
                                                          @endforeach
                                                        </td>
                                                      @else
                                                        <td>-</td>
                                                        @endif
                                                        <td>{{ number_format($product->specification_price) }}</td>
                                                        <td>{{ number_format($product->total_price + $product->specification_price)}} تومان

                                                        </td>
                                                        <td>
                                                          <a href="{{ route('purchases.show', ['id' => $purchase->id]) }}">
                                                              <button class="btn btn-dropbox">
                                                                اطلاعات خریدار
                                                              </button>
                                                          </a>
                                                        </td>
                                                        </tr>
                                                        @php
                                                          $id ++
                                                        @endphp
                                                      @endforeach

                                                    </tbody>
                                                  </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
    </div>
    <!-- Attachment Modal -->
    @endsection
    @section('pageScripts')
      <script src="{{ asset('/dashboard/assets/js/admin-users-index.js') }}"></script>

@stop
