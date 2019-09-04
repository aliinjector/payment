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
                                    <li class="breadcrumb-item ">محصول</li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">محصول</h4></div>
                    <!--end page-title-box-->
                </div>
                <!--end col-->
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6"><img src="/dashboard/assets/images/product2.png" alt="" class=" d-block" height="400"></div>
                                <!--end col-->
                                <div class="col-lg-6 align-self-center">
                                    <div class="single-pro-detail">
                                        <div class="custom-border mb-3"></div>
                                        <h3 class="pro-title iranyekan">محصول شماره 1</h3>
                                        <p class="text-muted mb-0">توضیحات محصول شماره 1</p>
                                        {{-- <ul class="list-inline mb-2 product-review">
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                            <li class="list-inline-item"><i class="mdi mdi-star-half text-warning"></i></li>
                                            <li class="list-inline-item">4.5 (30 reviews)</li>
                                        </ul> --}}
                                        <h2 class="pro-price">9000 تومان </h2>
                                        <h6 class="text-muted font-13">ویژگی ها :</h6>
                                        <ul class="list-unstyled pro-features border-0">
                                            <li>ویژگی شماره یک.</li>
                                            <li>ویژگی شماره دو.</li>
                                            <li>ویژگی شماره سه.</li>
                                        </ul>
                                        <h5 class="text-muted d-inline-block align-middle mr-2">رنگ :</h5>
                                        <div class="radio2 radio-info2 form-check-inline ml-2">
                                            <input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked="">
                                            <label for="inlineRadio1"></label>
                                        </div>
                                        <div class="radio2 radio-dark2 form-check-inline">
                                            <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
                                            <label for="inlineRadio2"></label>
                                        </div>
                                        <div class="radio2 radio-danger2 form-check-inline">
                                            <input type="radio" id="inlineRadio3" value="option3" name="radioInline">
                                            <label for="inlineRadio3"></label>
                                        </div>
                                        <div class="radio2 radio-purple2 form-check-inline">
                                            <input type="radio" id="inlineRadio4" value="option4" name="radioInline">
                                            <label for="inlineRadio4"></label>
                                        </div>
                                        <div class="quantity mt-3">
                                            <input class="form-control" type="number" min="0" value="0" id="example-number-input"> <a href="#" class="btn btn-primary text-white px-4 d-inline-block"><i class="mdi mdi-cart mr-2"></i>اضافه به سبد خرید</a></div>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
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
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="pro-order-box"><i class="mdi mdi-truck-fast text-success"></i>
                                    <h4 class="header-title">ارسال سریع</h4>
                                    <p class="text-muted mb-0">امکان ارسال در سریع ترین زمان ممکن پس از ثبت سفارش در سامانه.</p>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-3">
                                <div class="pro-order-box"><i class="mdi mdi-refresh text-danger"></i>
                                    <h4 class="header-title">تضمین بازگشت وجه</h4>
                                    <p class="text-muted mb-0">درصورت عدم رضایت از محصول وجه دریافتی بازگشت داده میشود.</p>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-3">
                                <div class="pro-order-box"><i class="mdi mdi-headset text-warning"></i>
                                    <h4 class="header-title">پشتیبانی 24 ساعته</h4>
                                    <p class="text-muted mb-0">تیم پشتیبانی مجموعه به صورت 24 ساعته آماده پاسخگویی به سوالات شما میباشند.</p>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-3">
                                <div class="pro-order-box mb-0"><i class="mdi mdi-wallet text-purple"></i>
                                    <h4 class="header-title">پرداخت امن</h4>
                                    <p class="text-muted mb-0">امکان پرداخت امن در سامانه و تجربه پرداخت امن.</p>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="card bg-newsletters">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="newsletters-text">
                                    <h4>ثبت نام در خبرنامه</h4>
                                    <p class="text-muted mb-0">برای دریافت اخرین اخبار سامانه میتوانید در خبرنامه ثبت نام کنید.</p>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-6 align-self-center">
                                <div class="newsletters-input">
                                    <form class="position-relative">
                                        <input type="email" placeholder="ایمیل خود را وارد کنید" required="">
                                        <button type="submit" class="btn btn-success">دنبال کردن</button>
                                    </form>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 align-self-center"><img src="../assets/images/products/2.jpg" alt="" height="250" class="d-block mx-auto"></div>
                            <div class="col-lg-9"><span class="bg-soft-success rounded-pill px-3 py-1 font-weight-bold">موجود</span>
                                <h5 class="mt-3">توضیحات محصول :</h5>
                                <p class="text-muted mb-4">استفاده از بهترین و با کیفیت ترین مواد اولیه و ترکیبات مناسب در جهت آسیب نرساندن به محیط زیست و شرایط سخت اب و هوایی در جهت ارسال سریع تر در جهت ساخت و مشارکت در نهایت با کیفیت ترین محصول</p>
                                <ul class="list-unstyled mb-4">
                                    <li class="mb-2 font-13 text-muted"><i class="mdi mdi-checkbox-marked-circle-outline text-success mr-2"></i>سازگار با محیط.</li>
                                    <li class="mb-2 font-13 text-muted"><i class="mdi mdi-checkbox-marked-circle-outline text-success mr-2"></i>عدم نیاز به سرویس اولیه.</li>
                                    <li class="mb-2 font-13 text-muted"><i class="mdi mdi-checkbox-marked-circle-outline text-success mr-2"></i>استفاده طولانی مدت.</li>
                                    <li class="mb-2 font-13 text-muted"><i class="mdi mdi-checkbox-marked-circle-outline text-success mr-2"></i>صرفه جویی در هزینه ها.</li>
                                </ul>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="pro-order-box mb-2 mb-lg-0"><i class="mdi mdi-white-balance-sunny text-warning"></i>
                                            <h4 class="header-title">استفاده از انرژی نورانی</h4>
                                            <p class="text-muted mb-0">قابلیت شارژ توسط نور خورشید.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="pro-order-box mb-2 mb-lg-0"><i class="mdi mdi-fire text-danger"></i>
                                            <h4 class="header-title">ضد حریق</h4>
                                            <p class="text-muted mb-0">قابلیت ضد حریق بودن محصول.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="pro-order-box mb-2 mb-lg-0"><i class="mdi mdi-glass-wine text-success"></i>
                                            <h4 class="header-title">ضد آب بودن</h4>
                                            <p class="text-muted mb-0">قابلیت آب گریز بودن محصول .</p>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="review-box text-center align-item-center">
                            <h1 class="byekan">48</h1>
                            <h4 class="header-title">مجموع فروش این محصول</h4>
                            {{-- <ul class="list-inline mb-0 product-review">
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star-half text-warning"></i></li>
                                <li class="list-inline-item"><small class="text-muted">Total Review (700)</small></li>
                            </ul> --}}
                        </div>
                        {{-- <ul class="list-unstyled mt-3">
                            <li class="mb-2"><span class="text-info">5 Star</span> <small class="float-right text-muted ml-3 font-14">593</small>
                                <div class="progress mt-2" style="height:5px;">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 80%; border-radius:5px;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li class="mb-2"><span class="text-info">4 Star</span> <small class="float-right text-muted ml-3 font-14">99</small>
                                <div class="progress mt-2" style="height:5px;">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 18%; border-radius:5px;" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li class="mb-2"><span class="text-info">3 Star</span> <small class="float-right text-muted ml-3 font-14">6</small>
                                <div class="progress mt-2" style="height:5px;">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 10%; border-radius:5px;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li class="mb-2"><span class="text-info">2 Star</span> <small class="float-right text-muted ml-3 font-14">2</small>
                                <div class="progress mt-2" style="height:5px;">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 1%; border-radius:5px;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li><span class="text-info">1 Star</span> <small class="float-right text-muted ml-3 font-14">0</small>
                                <div class="progress mt-2" style="height:5px;">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%; border-radius:5px;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                        </ul> --}}
                        <div class="review-box text-center align-item-center">
                            <h3>100%</h3>
                            <h4 class="header-title">رضایت مشتری</h4>
                            <p class="text-muted mb-0">درصد  عدم استرداد کالا توسط مشتری.</p>
                        </div>
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
