@extends('dashboard.layouts.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item ">درخواست های لینک دانلود</li>
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
                        <h4 class="mt-0 header-title">لیست درخواست های لینک دانلود</h4>
                        <p class="text-muted mb-4 font-13">تمامی فایل های فروشگاه شما تنها یکبار قابلیت دانلود شدن توسط مشتری را دارند.در صورت دانلود مجدد مشتری درخواست تولید لینک جدید را ارسال میکند که در زیر لیست آن ها را میتوانید مشخص نمایید و در صورت صلاحدید لینک جدید برای مشتریان بسازید.</p>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="searchBox bg-dark"  style="margin-top: -15px;">
                                        <input type="text" id="myInputTextField" class="searchInput">
                                        <button class="searchButton" href="#">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                    <div class="table-responsive">

                                    <table id="datatable" class="table table-bordered dt-responsive dataTable no-footer font-16" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                      aria-describedby="datatable_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">شناسه
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">نام فایل
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">نام مشتری
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">ایمیل مشتری
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">تاریخ خرید فایل
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">تاریخ دانلود فایل
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">تاریخ ارسال درخواست لینک دانلود
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="iranyekan">
                                          @php
                                            $id = 1;
                                          @endphp
                                            @foreach($requests as $request)
                                            <tr role="row" class="odd icon-hover hover-color">
                                                <td>{{ $id }}</td>
                                                <td>{{ $request->product->title }}</td>
                                                <td>{{ $request->purchase->user->firstName . ' '. $request->purchase->user->lastName }}
                                                <td>{{ $request->purchase->user->email }}
                                                  <td>{{ $request->purchase->created_at }}
                                                <td>{{ $request->purchase->cart()->withTrashed()->get()->first()->cartProduct()->where('product_id', $requests[0]->product_id)->get()->first()->updated_at }}
                                                  <td>{{ $request->created_at }}
                                                  <div style="display:inline-flex!important">
                                                      <a href="" id="acceptRequest" data-name="{{ $request->product->title }}" data-id="{{ $request->id }}" class="p-3" title="ارسال لینک دانلود جدید"><i style="color: #03c9a9;" class="fa fa-check"></i></a>
                                                      @if($request->deleted_at != null)
                                                            <a href="" id="restoreStatus" title="بازگردانی" data-id="{{ $request->id }}" data-name="{{ $request->product->title }}"><i class="fas fa-undo text-success pt-3"></i></a>
                                                      @else
                                                        <a href="" data-id="{{ $request->id }}" data-name="{{ $request->product->title }}" id="rejectRequest" class="p-3" title="رد درخواست"><i style="color: #db0a5b" class="fa fa-times"></i>
                                                        </a>
                                                       @endif
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
            </div>
            <!-- end col -->
        </div>
    </div>
    <!-- Attachment Modal -->
    @endsection
    @section('pageScripts')
      <script src="{{ asset('/dashboard/assets/js/admin-download-link-status.js') }}"></script>

      @if(session()->has('flashModal'))
          <script>
              $('#AddProductCategoryModal').modal('show');
          </script>
          @endif
        @stop
