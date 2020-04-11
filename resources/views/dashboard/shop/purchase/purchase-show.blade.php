@extends('dashboard.layouts.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row my-4">
          <div class="col-lg-4">
             <div class="card card-eco">
                <a href="{{ route('product-list.index') }}">
                <div class="card-body">
                   <h4 class="title-text mt-0">هزینه ارسال</h4>
                   <div class="d-flex justify-content-between">
                      <h3 class="font-weight-bold byekan">{{ $purchase->shipping_price }}</h3>
                      <i class="fa fa-truck card-eco-icon text-primary align-self-center"></i>
                   </div>
                </div>
                </a>
                <!--end card-body-->
             </div>
             <!--end card-->
          </div>
          <div class="col-lg-4">
             <div class="card card-eco">
                <a href="{{ route('product-list.index') }}">
                <div class="card-body">
                   <h4 class="title-text mt-0">جمع کل</h4>
                   <div class="d-flex justify-content-between">
                      <h3 class="font-weight-bold byekan">{{ number_format($purchase->total_price) }}</h3>
                      <i class="fa fa-file card-eco-icon text-pink align-self-center"></i>
                   </div>
                </div>
                </a>
                <!--end card-body-->
             </div>
             <!--end card-->
          </div>
          <div class="col-lg-4">
             <div class="card card-eco">
                <a href="{{ route('product-list.index') }}">
                <div class="card-body">
                   <h4 class="title-text mt-0">جمع مبلغ سفارش</h4>
                   <div class="d-flex justify-content-between">
                      <h3 class="font-weight-bold byekan">{{ number_format($purchase->total_price + $purchase->shipping_price) }}</h3>
                      <i class="fa fa-clone card-eco-icon text-success align-self-center"></i>
                   </div>
                </div>
                </a>
                <!--end card-body-->
             </div>
             <!--end card-->
          </div>
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
                                <h4 class="mt-0 header-title mb-3">اطلاعات سفارش</h4>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="searchBox bg-dark"  style="margin-top: -15px;">
                                                <input type="text" id="myInputTextField" class="searchInput">
                                                <button class="searchButton" href="#">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                            <div class="table-responsive">

                                                <table id="datatable" class="table table-bordered dt-responsive dataTable no-footer font-16" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid">
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

                                                      </tr>
                                                    </thead>
                                                    <tbody class="iranyekan">
                                                      @php
                                                        $id = 1;
                                                      @endphp

                                                      @foreach ($purchase->cart()->withTrashed()->where('status' , 1)->get()->first()->cartProduct as $product)

                                                        <tr role="row" class="odd icon-hover hover-color">
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



                                                          <div class="d-none icon-show">
                                                              <a href="" id="removeCartProduct" title="حذف" data-name="{{ $product->product->title }}" data-purchaseid="{{ $purchase->id }}" data-id="{{ $product->id }}"><i class="far fa-trash-alt text-danger font-15"></i></a>

                                                          </div>
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
                    <!-- end col -->
                </div>
    </div>
    <!-- Attachment Modal -->
    @endsection
    @section('pageScripts')
      <script src="{{ asset('/dashboard/assets/js/admin-users-index.js') }}"></script>
      <script type="text/javascript">
      $(document).on('click', '#removeCartProduct', function(e) {
          e.preventDefault();
          var id = $(this).data('id');
          var name = $(this).data('name');
          var purchaseid = $(this).data('purchaseid');
          swal(` ${'حذف محصول:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
                  dangerMode: true,
                  icon: "warning",
                  buttons: ["انصراف", "حذف"],
              }).then(function(isConfirm) {
                  if (isConfirm) {
                      $.ajax({
                          type: "post",
                          url: "/admin-panel/shop/purchases-managment/purchases/{{ $purchase->id }}/delete/"+id,
                          data: {
                              id: id,
                              purchaseid: purchaseid,
                              "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                          },
                          success: function(data) {
                            window.location.reload()
                          }
                      });
                  } else {
                      toastr.warning('لغو شد.', '', []);
                  }
              });
      });
      </script>

@stop
