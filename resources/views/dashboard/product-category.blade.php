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
                                    <li class="breadcrumb-item ">لیست محصولات دسته بندی </li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">لیست محصولات دسته بندی شماره یک</h4></div>
                    <!--end page-title-box-->
                </div>
                <!--end col-->
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
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
        <div class="row">
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
                </div>
        <!-- container -->
    </div>
@endsection


@section('pageScripts')
@stop
