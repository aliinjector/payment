@extends('dashboard.layouts.master')
@section('content')
    <link href="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">

<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "> دسته بندی </li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">لیست محصولات دسته بندی شماره یک</h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>

        <div class="text-right">
            <a href="#" data-toggle="modal" data-target="#AddProductCategoryModal" class="btn btn-primary text-white d-inline-block text-right mb-3 font-weight-bold"><i class="fa fa-plus mr-2"></i>اضافه کردن دسته بندی</a>
        </div>


        @include('dashboard.layouts.errors')

        <div class="modal fade bd-example-modal-xl" id="AddProductCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">افزودن خدمت جدید</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal-scroll">
                        <form action="{{ route('product-category.store') }}" method="post" class="form-horizontal">
                            @csrf
                            <div class="form-group mb-0">
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">عنوان دسته بندی :</span></div>
                                    <input type="text" class="form-control inputfield" name="name" placeholder="مثال: ورزشی">
                                </div>

                                <div class="input-group mt-3">
                                    <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">توضیحات دسته بندی :</span></div>
                                    <input type="text" class="form-control inputfield" name="description" placeholder="مثال: توضیحات مختصری درمورد دسته بندی">
                                </div>
                            </div>
                            <!--end form-group-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">بستن</button>
                        <button type="submit" class="btn btn-primary">ثبت درخواست</button>
                    </div>

                    </form>

                </div>
            </div>
        </div>

        <!-- end page title end breadcrumb -->
         {{--  <div class="row">
                    <div class="col-lg-3">
                        <div class="card e-co-product">
                            <a href="/dashboard/product-detail"><img src="/dashboard/assets/images/product2.png" alt="" class="img-fluid"></a>
                            <div class="card-body product-info"><a href="/dashboard/product-detail" class="product-title">محصول شماره 1</a>
                                <div class="d-flex justify-content-between my-2 byekan">
                                    <p class="product-price byekan">30000 تومان  <span class="ml-2 byekan"><del>60000 تومان</del></span></p>

                                </div>
                                <button class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i> اضافه کردن به سبد خرید</button>
                                <button class="btn btn-wishlist btn-sm waves-effect waves-light wishlist" data-toggle="tooltip" data-placement="top" title="" data-original-title="موردعلاقه"><i class="mdi mdi-heart"></i></button>
                                <button class="btn btn-quickview btn-sm waves-effect waves-light quickview" data-toggle="tooltip" data-placement="top" title="" data-original-title="نمایش سریع"><i class="mdi mdi-magnify"></i></button>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-3">
                        <div class="card e-co-product">
                            <a href="/dashboard/product-detail"><img src="/dashboard/assets/images/product2.png" alt="" class="img-fluid"></a>
                            <div class="card-body product-info"><a href="/dashboard/product-detail" class="product-title">محصول شماره 2</a>
                                <div class="d-flex justify-content-between my-2">
                                    <p class="product-price byekan">60000 تومان <span class="ml-2 byekan"><del>60000 تومان</del></span></p>

                                </div>
                                <button class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i> اضافه کردن به سبد خرید</button>
                                <button class="btn btn-wishlist btn-sm waves-effect waves-light wishlist" data-toggle="tooltip" data-placement="top" title="" data-original-title="موردعلاقه"><i class="mdi mdi-heart"></i></button>
                                <button class="btn btn-quickview btn-sm waves-effect waves-light quickview" data-toggle="tooltip" data-placement="top" title="" data-original-title="نمایش سریع"><i class="mdi mdi-magnify"></i></button>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-3">
                        <div class="card e-co-product">
                            <a href="/dashboard/product-detail"><img src="/dashboard/assets/images/product2.png" alt="" class="img-fluid"></a>
                            <div class="card-body product-info"><a href="/dashboard/product-detail" class="product-title">محصول شماره 3</a>
                                <div class="d-flex justify-content-between my-2">
                                    <p class="product-price byekan">58000 تومان <span class="ml-2 byekan"><del>60000 تومان</del></span></p>

                                </div>
                                <button class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i> اضافه کردن به سبد خرید</button>
                                <button class="btn btn-wishlist btn-sm waves-effect waves-light wishlist" data-toggle="tooltip" data-placement="top" title="" data-original-title="موردعلاقه"><i class="mdi mdi-heart"></i></button>
                                <button class="btn btn-quickview btn-sm waves-effect waves-light quickview" data-toggle="tooltip" data-placement="top" title="" data-original-title="نمایش سریع"><i class="mdi mdi-magnify"></i></button>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-3">
                        <div class="card e-co-product">
                            <a href="/dashboard/product-detail"><img src="/dashboard/assets/images/product2.png" alt="" class="img-fluid"></a>
                            <div class="ribbon ribbon-pink"><span class="byekan">50% تخفیف</span></div>
                            <div class="card-body product-info"><a href="/dashboard/product-detail" class="product-title">محصول شماره 4</a>
                                <div class="d-flex justify-content-between my-2">
                                    <p class="product-price byekan">30000 تومان <span class="ml-2 byekan"><del>60000 تومان</del></span></p>

                                </div>
                                <button class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i> اضافه کردن به سبد خرید</button>
                                <button class="btn btn-wishlist btn-sm waves-effect waves-light wishlist" data-toggle="tooltip" data-placement="top" title="" data-original-title="موردعلاقه"><i class="mdi mdi-heart"></i></button>
                                <button class="btn btn-quickview btn-sm waves-effect waves-light quickview" data-toggle="tooltip" data-placement="top" title="" data-original-title="نمایش سریع"><i class="mdi mdi-magnify"></i></button>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>
        <!-- end row -->
    </div>
    -- <div class="row">
                <div class="col-12">
                    <div class="card offer-box">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mx-auto">
                                    <div class="offer-content text-center justify-content-center">
                                        <p class="text-muted">پیشنهاد ویژه</p>
                                        <h3 class="mb-3">50% صرفه جویی در هزینه ها</h3>
                                        <hr class="thick">
                                        <h5 class="text-muted iranyekan">با خرید از سامانه آنلاین</h5></div>
                                </div>
                            </div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <div class="row">
                    <div class="col-lg-3">
                        <div class="card e-co-product">
                            <a href="/dashboard/product-detail"><img src="/dashboard/assets/images/product2.png" alt="" class="img-fluid"></a>
                            <div class="card-body product-info"><a href="/dashboard/product-detail" class="product-title">محصول شماره 5 <small class="text-muted">size-04</small></a>
                                <div class="d-flex justify-content-between my-2">
                                    <p class="product-price byekan">30000 تومان<span class="ml-2 byekan"><del>60000 تومان</del></span></p>

                                </div>
                                <button class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i> اضافه کردن به سبد خرید</button>
                                <button class="btn btn-wishlist btn-sm waves-effect waves-light wishlist" data-toggle="tooltip" data-placement="top" title="" data-original-title="موردعلاقه"><i class="mdi mdi-heart"></i></button>
                                <button class="btn btn-quickview btn-sm waves-effect waves-light quickview" data-toggle="tooltip" data-placement="top" title="" data-original-title="نمایش سریع"><i class="mdi mdi-magnify"></i></button>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-3">
                        <div class="card e-co-product">
                            <a href="/dashboard/product-detail"><img src="/dashboard/assets/images/product2.png" alt="" class="img-fluid"></a>
                            <div class="ribbon ribbon-secondary"><span>جدید</span></div>
                            <div class="card-body product-info"><a href="/dashboard/product-detail" class="product-title">محصول شماره 6</a>
                                <div class="d-flex justify-content-between my-2">
                                    <p class="product-price byekan">10000 تومان <span class="ml-2 byekan"><del>60000 تومان</del></span></p>

                                </div>
                                <button class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i> اضافه کردن به سبد خرید</button>
                                <button class="btn btn-wishlist btn-sm waves-effect waves-light wishlist" data-toggle="tooltip" data-placement="top" title="" data-original-title="موردعلاقه"><i class="mdi mdi-heart"></i></button>
                                <button class="btn btn-quickview btn-sm waves-effect waves-light quickview" data-toggle="tooltip" data-placement="top" title="" data-original-title="نمایش سریع"><i class="mdi mdi-magnify"></i></button>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-3">
                        <div class="card e-co-product">
                            <a href="/dashboard/product-detail"><img src="/dashboard/assets/images/product2.png" alt="" class="img-fluid"></a>
                            <div class="card-body product-info"><a href="/dashboard/product-detail" class="product-title">محصول شماره 7</a>
                                <div class="d-flex justify-content-between my-2">
                                    <p class="product-price byekan">7800 تومان <span class="ml-2 byekan"><del>60000 تومان</del></span></p>

                                </div>
                                <button class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i> اضافه کردن به سبد خرید</button>
                                <button class="btn btn-wishlist btn-sm waves-effect waves-light wishlist" data-toggle="tooltip" data-placement="top" title="" data-original-title="موردعلاقه"><i class="mdi mdi-heart"></i></button>
                                <button class="btn btn-quickview btn-sm waves-effect waves-light quickview" data-toggle="tooltip" data-placement="top" title="" data-original-title="نمایش سریع"><i class="mdi mdi-magnify"></i></button>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-3">
                        <div class="card e-co-product">
                            <a href="/dashboard/product-detail"><img src="/dashboard/assets/images/product2.png" alt="" class="img-fluid"></a>
                            <div class="card-body product-info"><a href="/dashboard/product-detail" class="product-title">محصول شماره 8</a>
                                <div class="d-flex justify-content-between my-2">
                                    <p class="product-price byekan">45000 تومان <span class="ml-2 byekan"><del>60000 تومان</del></span></p>

                                </div>
                                <button class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i> اضافه کردن به سبد خرید</button>
                                <button class="btn btn-wishlist btn-sm waves-effect waves-light wishlist" data-toggle="tooltip" data-placement="top" title="" data-original-title="موردعلاقه"><i class="mdi mdi-heart"></i></button>
                                <button class="btn btn-quickview btn-sm waves-effect waves-light quickview" data-toggle="tooltip" data-placement="top" title="" data-original-title="نمایش سریع"><i class="mdi mdi-magnify"></i></button>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div> --
    <!-- container -->  --}}


  <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">لیست محصولات</h4>


                    <p class="text-muted mb-4 font-13">لیست تمامی محصولات شما</p>
                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                        <div class="row">
                            <div class="col-sm-12">



                                <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 405px;">نام
                                                محصول
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">توضیحات</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 123px;">تنظیمات</th>
                                        </tr>
                                    </thead>
                                    <tbody class="byekan">
                                        @foreach($categoires as $category)
                                        <tr role="row" class="odd">
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->description }}</td>
                                            <td>
                                                <a><i class="far fa-edit text-info mr-1 button"></i>
                                                </a>
                                                <a href="" id="ttttt" data-id="{{ $category->id }}" data-test="{{ $category->name }}"><i class="far fa-trash-alt text-danger"></i></a>
                                            </td>
                                        </tr>
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
@endsection


@section('pageScripts')

        <script src="/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="/dashboard/assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="/dashboard/assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
        <script src="/dashboard/assets/plugins/datatables/jquery.datatable.init.js"></script>



        <script>
    $(document).on('click', '#ttttt', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var test = $(this).data('test');
        $.ajax({
            type: "post",
            url: "{{url('dashboard/shop/product-category/delete')}}",
            data: {
                id: id,
                test: test,
                "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
            },
            success: function(data) {
                var url = document.location.origin + "/dashboard/shop/product-category";
                location.href = url;
            }
        });
    });
</script>
@stop
