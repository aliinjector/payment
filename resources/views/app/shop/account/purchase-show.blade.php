@extends('app.shop.account.layouts.master')
@section('content')
  <link rel="stylesheet" href="/app/shop/2/css/style.css">

    <div id="">
      <div class="container-indent">
          <div class="container container-fluid-custom-mobile-padding">
              <div class="">
                <h1 class="">سفارش شما</h1>
                <div class="py-3">
                    <a href="{{ route('user.purchased.list') }}" style="color:#CE2A40" class=""><i class="icon-e-20"></i>بازگشت به صفحه لیست سفارشات</a>
                    <div class="mb-3">{{ jdate($purchase->created_at) }}</div>
                </div>
            </div>
            <div class="table-responsive">

            <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer font-16" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
              aria-describedby="datatable_info">
                <thead>
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
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">قیمت جمع کالا
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">عملیات
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
                        <td><a href="{{ route('product', ['shop'=>$purchase->shop->english_name, 'id'=>$product->product()->withTrashed()->get()->first()->slug]) }}">{{ $product->product()->withTrashed()->get()->first()->title }}</a></td>
                        <td>{{ number_format($product->total_price / $product->quantity ) }}</td>
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
                        {{ $specificationItem->specification->name }} :  {{ $specificationItem->name }} <br>
                        @endforeach
                      @endforeach
                    </td>
                  @else
                    <td>-</td>
                    @endif

                          <td>{{ number_format($product->total_price + $product->specification_price)}}</td>
                        <td>
                          @if($product->product()->withTrashed()->get()->first()->type == 'file')
                              <div class="icon-show row">
                                  <a href="{{ route('file-download', ['shop'=>$product->product()->withTrashed()->get()->first()->shop()->first()->english_name, 'id'=>$product->product()->withTrashed()->get()->first()->id, 'purchaseId'=>$purchase->id]) }}" id="downloadFile"><i class="fa fa-download text-success p-3 button font-18 "></i>
                                  </a>
                                  @if($product->download_status == 1)
                                  <form action="{{ route('downloadLinkRequest',['product_id'=>$product->product()->withTrashed()->get()->first()->id, 'user_purchase_id' => $purchase->id]) }}" method="post" id="link" class="p-3">
                                      @csrf
                                    <a href="javascript:$('#link').submit();" title="درخواست لینک دانلود جدید"><i class="fa fa-repeat" aria-hidden="true"></i></a>
                                    </form>
                                  @endif
                              </div>
                              @else
                                -
                              @endif
                        </td>

                    </tr>
                  @endforeach
                    @php
                      $id ++
                    @endphp
                </tbody>
            </table>
          </div>
        </div>
    </div>
  </div>
  <link rel="stylesheet" href="/app/shop/2/css/rtl.css">
  <link rel="stylesheet" href="/app/shop/2/css/custom.css">
  @toastr_js
  @toastr_render
  @include('sweet::alert')
  @yield('footerScripts')
@endsection
