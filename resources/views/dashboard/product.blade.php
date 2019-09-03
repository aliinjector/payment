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
                                    <li class="breadcrumb-item ">لیست محصولات</li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">لیست محصولات</h4></div>
                    <!--end page-title-box-->
                </div>
                <!--end col-->
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">لیست محصولات</h4>
                            <p class="text-muted mb-4 font-13">لیست تمامی محصولات شما</p>
                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="datatable_length">
                                            <label>نمایش
                                                <select name="datatable_length" aria-controls="datatable" class="custom-select custom-select-sm form-control form-control-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> ورودی ها</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="datatable_filter" class="dataTables_filter">
                                            <label class="text-left">جستوجو:
                                                <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 405px;">نام محصول</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 148px;">دسته بندی</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 104px;">قیمت</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">وضعیت</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 123px;">تنظیمات</th>
                                                </tr>
                                            </thead>
                                            <tbody class="byekan">
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1 w-25"><img src="/dashboard/assets/images/product.jpg" alt="" height="52">
                                                        <p class="d-inline-block align-middle mb-0 mr-2"><a href="#" class="d-inline-block align-middle mb-0 product-name">محصول شماره 1</a>
                                                    </td>
                                                    <td>ورزشی</td>
                                                   <td>39تومان</td>
                                                   <td><span class="badge badge-soft-pink">غیرفعال</span></td>
                                                   <td><a href="#"><i class="far fa-edit text-info mr-1"></i></a> <a href="#"><i class="far fa-trash-alt text-danger"></i></a></td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td class="sorting_1"><img src="/dashboard/assets/images/product.jpg" alt="" height="52">
                                                        <p class="d-inline-block align-middle mb-0  mr-2"><a href="#" class="d-inline-block align-middle mb-0 product-name">محصول شماره 2</a>
                                                    </td>
                                                    <td>الکتریکی</td>
                                                   <td>39تومان</td>
                                                    <td><span class="badge badge-soft-success">فعال</span></td>
                                                                                                        <td><a href="#"><i class="far fa-edit text-info mr-1"></i></a> <a href="#"><i class="far fa-trash-alt text-danger"></i></a></td>
                                                </tr>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1"><img src="/dashboard/assets/images/product.jpg" alt="" height="52">
                                                        <p class="d-inline-block align-middle mb-0  mr-2"><a href="#" class="d-inline-block align-middle mb-0 product-name">محصول شماره 3</a>
                                                    </td>
                                                    <td>ورزشی</td>
                                                    <td>39تومان</td>
                                                    <td><span class="badge badge-soft-pink">غیرفعال</span></td>
                                                                                                        <td><a href="#"><i class="far fa-edit text-info mr-1"></i></a> <a href="#"><i class="far fa-trash-alt text-danger"></i></a></td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td class="sorting_1"><img src="/dashboard/assets/images/product.jpg" alt="" height="52">
                                                        <p class="d-inline-block align-middle mb-0 mr-2"><a href="#" class="d-inline-block align-middle mb-0 product-name">محصول شماره 4</a>
                                                    </td>
                                                    <td>پوشاک</td>
                                                   <td>39تومان</td>
                                                    <td><span class="badge badge-soft-success">فعال</span></td>
                                                                                                       <td><a href="#"><i class="far fa-edit text-info mr-1"></i></a> <a href="#"><i class="far fa-trash-alt text-danger"></i></a></td>
                                                </tr>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1"><img src="/dashboard/assets/images/product.jpg" alt="" height="52">
                                                        <p class="d-inline-block align-middle mb-0 mr-2"><a href="#" class="d-inline-block align-middle mb-0 product-name">محصول شماره 5</a>
                                                    </td>
                                                    <td>ورزشی</td>
                                                    <td>39تومان</td>
                                                    <td><span class="badge badge-soft-success">فعال</span></td>

                                                    <td><a href="#"><i class="far fa-edit text-info mr-1"></i></a> <a href="#"><i class="far fa-trash-alt text-danger"></i></a></td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td class="sorting_1"><img src="/dashboard/assets/images/product.jpg" alt="" height="52">
                                                        <p class="d-inline-block align-middle mb-0 mr-2"><a href="#" class="d-inline-block align-middle mb-0 product-name">محصول شماره 6</a>
                                                    </td>
                                                    <td>خوراک</td>
                                                    <td>39تومان</td>
                                                    <td><span class="badge badge-soft-pink">غیرفعال</span></td>

                                                    <td><a href="#"><i class="far fa-edit text-info mr-1"></i></a> <a href="#"><i class="far fa-trash-alt text-danger"></i></a></td>
                                                </tr>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1"><img src="/dashboard/assets/images/product.jpg" alt="" height="52">
                                                        <p class="d-inline-block align-middle mb-0 mr-2"><a href="#" class="d-inline-block align-middle mb-0 product-name">محصول شماره 7</a>
                                                    </td>
                                                    <td>الکتریکی</td>
                                                    <td>39تومان</td>
                                                    <td><span class="badge badge-soft-success">فعال</span></td>

                                                    <td><a href="#"><i class="far fa-edit text-info mr-1"></i></a> <a href="#"><i class="far fa-trash-alt text-danger"></i></a></td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td class="sorting_1"><img src="/dashboard/assets/images/product.jpg" alt="" height="52">
                                                        <p class="d-inline-block align-middle mb-0 mr-2"><a href="#" class="d-inline-block align-middle mb-0 product-name">محصول شماره 8</a>
                                                    </td>
                                                    <td>ورزشی</td>
                                                    <td>39تومان</td>
                                                    <td><span class="badge badge-soft-success">فعال</span></td>

                                                    <td><a href="#"><i class="far fa-edit text-info mr-1"></i></a> <a href="#"><i class="far fa-trash-alt text-danger"></i></a></td>
                                                </tr>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1"><img src="/dashboard/assets/images/product.jpg" alt="" height="52">
                                                        <p class="d-inline-block align-middle mb-0 mr-2"><a href="#" class="d-inline-block align-middle mb-0 product-name">محصول شماره 9</a>
                                                    </td>
                                                    <td>پوشاک</td>
                                                    <td>39تومان</td>
                                                    <td><span class="badge badge-soft-success">فعال</span></td>

                                                    <td><a href="#"><i class="far fa-edit text-info mr-1"></i></a> <a href="#"><i class="far fa-trash-alt text-danger"></i></a></td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td class="sorting_1"><img src="/dashboard/assets/images/product.jpg" alt="" height="52">
                                                        <p class="d-inline-block align-middle mb-0 mr-2"><a href="#" class="d-inline-block align-middle mb-0 product-name">محصول شماره 10</a>
                                                    </td>
                                                    <td>ورزشی</td>
                                                    <td>39تومان</td>
                                                    <td><span class="badge badge-soft-success">فعال</span></td>

                                                    <td><a href="#"><i class="far fa-edit text-info mr-1"></i></a> <a href="#"><i class="far fa-trash-alt text-danger"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite"></div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0" class="page-link">قبلی</a></li>
                                                <li class="paginate_button page-item active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                <li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                <li class="paginate_button page-item next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0" class="page-link">بعدی</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- container -->
    </div>
@endsection


@section('pageScripts')
@stop
