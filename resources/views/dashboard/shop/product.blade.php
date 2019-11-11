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
                            <li class="breadcrumb-item ">لیست محصولات</li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">لیست محصولات</h4>
                </div>
                @include('dashboard.layouts.errors')

                <div class="text-right">
                    <a href="#" data-toggle="modal" data-target="#AddSelectModal" class="btn btn-primary text-white d-inline-block text-right mb-3 font-weight-bold rounded"><i class="fa fa-plus mr-2"></i>اضافه کردن محصول</a>
                </div>

                <div class="modal fade bd-example-modal-xl" id="AddSelectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-18" id="exampleModalLabel">لطفا نوع محصول خود را انتخاب
                                    کنید</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('card.store') }}" method="post" class="form-horizontal">
                                    @csrf
                                    <div class="form-group mb-0">
                                        <a data-dismiss="modal" data-toggle="modal" href="#AddProductModal">
                                            <div class="input-group mt-3 border rounded">
                                                <div class="p-4">
                                                    <span class="sett-card-icon set-icon-purple"><i class="fa fa-boxes f-em5"></i></span>
                                                </div>
                                                <div class="">
                                                    <p class="f-em1-5 m-5 mr-4 iranyekan">کالایی که حجم فیزیکی دارد و باید برای خریدار ارسال شود</p>
                                                </div>
                                            </div>
                                        </a>

                                        <a data-dismiss="modal" data-toggle="modal" href="#AddFileModal">
                                            <div class="input-group mt-3 border rounded">
                                                <div class="p-4">
                                                    <span class="sett-card-icon set-icon-purple"><i class="fa fa-download f-em5"></i></span>
                                                </div>
                                                <div class="">
                                                    <p class="f-em1-5 m-5 mr-4 iranyekan"> محصولی که به صورت لینک دانلود برای خریدار ارسال می‌شود </p>
                                                </div>
                                            </div>
                                        </a>

                                        <a data-dismiss="modal" data-toggle="modal" href="#AddServiceModal">
                                            <div class="input-group mt-3 border rounded">
                                                <div class="p-4">
                                                    <span class="sett-card-icon set-icon-purple"><i class="fa fa-user-friends f-em5"></i></span>
                                                </div>
                                                <div class="">
                                                    <p class="f-em1-5 m-5 mr-4 iranyekan">یک خدمت باید به خریدار ارائه شود و هزینه ارسال ندارد</p>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-danger rounded" data-dismiss="modal">انصراف
                                </button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="modal fade bd-example-modal-xl " id="AddProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">افزودن کالای فیزیکی </h5>
                                <button type="button" class="close rounded" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body modal-scroll" style="background-color:#fbfcfd">
                                <form action="{{ route('Product.storeProduct') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-0">
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">عنوان محصول :</span></div>
                                            <input type="text" class="form-control inputfield rounded" name="title" placeholder="مثال: جاروبرقی">
                                            <input name="type" type="hidden" value="product">
                                        </div>

                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">توضیحات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="description" placeholder="مثال: توضیحات مختصری درمورد محصول">
                                        </div>

                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light inputfield min-width-140" id="basic-addon7">دسته بندی محصول :</span></div>
                                            @if (\Auth::user()->shop()->first()->ProductCategories()->get()->count() == 0)
                                            <select class="form-control inputfield" name="product_category" id="" disabled>
                                                <option style="font-family: BYekan!important;">دسته بندی وجود ندارد لطفا ابتدا دسته بندی ایجاد کنید
                                                </option>
                                            </select>
                                            <a href="{{ route('product-category.index') }}" class="align-self-center">
                                                <div class="input-group-append"><span class="h-50px input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن دسته بندی</span>
                                                </div>
                                            </a>
                                            @else
                                            <select class="form-control inputfield" name="product_category" id="">
                                                <option style="font-family: BYekan!important;">انتخاب دسته بندی
                                                </option>
                                                @foreach($productCategories as $productCategory)
                                                <option style="font-family: BYekan!important;" value="{{ $productCategory->id }}">
                                                    @if($productCategory->parent()->exists()) {{ $productCategory->parent()->get()->first()->name }} >
                                                        @endif {{ $productCategory->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @endif

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">قیمت محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="price" placeholder="مثال: 30000" Lang="en">
                                            <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> تومان</span></div>

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> قیمت بعد از تخفیف :</span></div>
                                            <input type="text" class="form-control inputfield" name="off_price" placeholder="مثال: 30000" Lang="en">
                                            <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> تومان</span></div>

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">موجودی در انبار :</span></div>
                                            <input type="text" class="form-control inputfield" name="amount" placeholder="مثال: 3">
                                            <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8">عدد</span></div>

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">وزن محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="weight" placeholder="مثال: 30">
                                            <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8">گرم</span></div>

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">رنگ محصول :</span></div>
                                            <input class="form-control h-50px" type="color" placeholder="#122272" id="example-color-input" name="color_1">
                                            <div class="input-group-append"><a href="#" class="color1"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن رنگ
                                                    </span></a></div>
                                        </div>
                                        <div class="input-group mt-3 d-none color_1">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">رنگ محصول :</span></div>
                                            <input class="form-control h-50px" type="color" value="#a89d8e" id="example-color-input" name="color_2">
                                            <div class="input-group-append"><a href="#" class="color2"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن رنگ
                                                    </span></a></div>
                                        </div>
                                        <div class="input-group mt-3 d-none color_2">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">رنگ محصول :</span></div>
                                            <input class="form-control h-50px" type="color" value="#a89d8e" id="example-color-input" name="color_3">
                                            <div class="input-group-append"><a href="#" class="color3"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن رنگ
                                                    </span></a></div>
                                        </div>
                                        <div class="input-group mt-3 d-none color_3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">رنگ محصول :</span></div>
                                            <input class="form-control h-50px" type="color" value="#a89d8e" id="example-color-input" name="color_4">
                                            <div class="input-group-append"><a href="#" class="color4"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن رنگ
                                                    </span></a></div>
                                        </div>
                                        <div class="input-group mt-3 d-none color_4">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">رنگ محصول :</span></div>
                                            <input class="form-control h-50px" type="color" value="#a89d8e" id="example-color-input" name="color_5">

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_1" placeholder=" مثال: ضد آب ">
                                            <div class="input-group-append"><a href="#" class="test1"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_2">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">امکانات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_2" placeholder=" مثال: ضد آب ">
                                            <div class="input-group-append"><a href="#" class="test2"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_3" placeholder=" مثال: ضد آب ">
                                            <div class="input-group-append"><a href="#" class="test3"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>

                                        <div class="input-group mt-3 d-none feature_4">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_4" placeholder=" مثال: ضد آب ">
                                            <div class="input-group-append"><a href="#" class="test4"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_5">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_5" placeholder=" مثال: ضد آب ">
                                            <div class="input-group-append"><a href="#" class="test5"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_6">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_6" placeholder=" مثال: ضد آب ">
                                            <div class="input-group-append"><a href="#" class="test6"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_7">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_7" placeholder=" مثال: ضد آب ">
                                            <div class="input-group-append"><a href="#" class="test7"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_8">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_8" placeholder=" مثال: ضد آب ">
                                            <div class="input-group-append"><a href="#" class="test8"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_9">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_9" placeholder=" مثال: ضد آب ">
                                            <div class="input-group-append"><a href="#" class="test9"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_10">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_10" placeholder=" مثال: ضد آب ">
                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> برچسب های محصول :</span></div>
                                            <input type="text" name="tags" class="form-control" />
                                        </div>
                                        <div class="input-group mt-3 bg-white">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">امکانات ویژه محصول :</span></div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-1">
                                                <input type="checkbox" class="custom-control-input" id="supportProduct" name="support">
                                                <label class="custom-control-label iranyekan font-15" for="supportProduct">پشتیبانی</label>
                                            </div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                                <input type="checkbox" class="custom-control-input" id="money_backProduct" name="money_back">
                                                <label class="custom-control-label iranyekan font-15" for="money_backProduct">بازگشت وجه</label>
                                            </div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                                <input type="checkbox" class="custom-control-input" id="fast_sendingProduct" name="fast_sending">
                                                <label class="custom-control-label iranyekan font-15" for="fast_sendingProduct">ارسال سریع</label>
                                            </div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                                <input type="checkbox" class="custom-control-input" id="secure_paymentProduct" name="secure_payment">
                                                <label class="custom-control-label iranyekan font-15" for="secure_paymentProduct">پرداخت امن</label>
                                            </div>

                                        </div>

                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <h4 class="mt-0 header-title">تصویر اصلی محصول</h4>
                                                <input type="file" id="input-file-now" name="image" class="dropify">
                                            </div>
                                        </div>

                                    </div>
                                    <!--end form-group-->
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-danger rounded" data-dismiss="modal">انصراف
                                </button>
                                <div class="group">
                                    <button type="submit" name="action" value="justSave" class="btn btn-primary rounded">ثبت درخواست
                                    </button>
                                    <button type="submit" name="action" value="saveAndContinue" class="btn btn-primary rounded">ثبت درخواست و ادامه
                                    </button>
                                </div>
                            </div>

                            </form>

                        </div>
                    </div>
                </div>

                @foreach($products as $product)

                <div class="modal fade bd-example-modal-xl " id="UpdateProductModalProduct{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ویرایش کالای فیزیکی </h5>
                                <button type="button" class="close rounded" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body modal-scroll" style="background-color:#fbfcfd">
                                <form action="{{ route('product-list.update', $product->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf {{ method_field('PATCH') }}

                                    <div class="form-group mb-0">
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">عنوان محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="title" placeholder="مثال: جاروبرقی" value="{{ $product->title }}">
                                            <input name="type" type="hidden" value="product">
                                        </div>

                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">توضیحات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="description" placeholder="مثال: توضیحات مختصری درمورد محصول" value="{{ $product->description }}">
                                        </div>

                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light inputfield min-width-140" id="basic-addon7">دسته بندی محصول :</span></div>
                                            <select class="form-control inputfield" name="product_category" id="">
                                                <option style="font-family: BYekan!important;" value="{{ $productCategory->id }}">{{ $productCategory->name }}
                                                </option>
                                                @foreach($productCategories as $productCategory)
                                                <option style="font-family: BYekan!important;" value="{{ $productCategory->id }}">
                                                    @if($productCategory->parent()->exists()) {{ $productCategory->parent()->get()->first()->name }} >
                                                        @endif {{ $productCategory->name }}
                                                </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">قیمت محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="price" placeholder="مثال: 30000" Lang="en" value="{{ $product->price }}">
                                            <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> تومان</span></div>

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> قیمت بعد از تخفیف :</span></div>
                                            <input type="text" class="form-control inputfield" name="off_price" placeholder="مثال: 30000" Lang="en" value="{{ $product->off_price }}">
                                            <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> تومان</span></div>

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">موجودی در انبار :</span></div>
                                            <input type="text" class="form-control inputfield" name="amount" placeholder="مثال: 3" value="{{ $product->amount }}">
                                            <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8">عدد</span></div>

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">وزن محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="weight" placeholder="مثال: 30" value="{{ $product->weight }}">
                                            <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8">گرم</span></div>

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">رنگ محصول :</span></div>
                                            <input class="form-control h-50px" type="color" placeholder="#122272" id="example-color-input" name="color_1" value="{{ $product->color_1 }}">
                                            <div class="input-group-append"><a href="#" class="color1"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن رنگ
                                                    </span></a></div>
                                        </div>
                                        <div class="input-group mt-3 @if($product->color_2 == null) d-none @endif color_1">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">رنگ محصول :</span></div>
                                            <input class="form-control h-50px" type="color" @if($product->color_2 == null) value="#a89d8e"
                                            @endif id="example-color-input" name="color_2" value="{{ $product->color_2 }}">
                                            <div class="input-group-append"><a href="#" class="color2"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن رنگ
                                                    </span></a></div>
                                        </div>
                                        <div class="input-group mt-3 @if($product->color_3 == null) d-none @endif color_2">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">رنگ محصول :</span></div>
                                            <input class="form-control h-50px" type="color" @if($product->color_3 == null) value="#a89d8e"
                                            @endif id="example-color-input" name="color_3" value="{{ $product->color_3 }}">
                                            <div class="input-group-append"><a href="#" class="color3"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن رنگ
                                                    </span></a></div>
                                        </div>
                                        <div class="input-group mt-3 @if($product->color_4 == null) d-none @endif color_3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">رنگ محصول :</span></div>
                                            <input class="form-control h-50px" type="color" @if($product->color_4 == null) value="#a89d8e"
                                            @endif id="example-color-input" name="color_4" value="{{ $product->color_4 }}">
                                            <div class="input-group-append"><a href="#" class="color4"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن رنگ
                                                    </span></a></div>
                                        </div>
                                        <div class="input-group mt-3 @if($product->color_5 == null) d-none @endif color_4">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">رنگ محصول :</span></div>
                                            <input class="form-control h-50px" type="color" @if($product->color_5 == null) value="#a89d8e"
                                            @endif id="example-color-input" name="color_5" value="{{ $product->color_5 }}">

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_1" placeholder=" مثال: ضد آب " value="{{ $product->feature_1 }}">
                                            <div class="input-group-append"><a href="#" class="test1"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_2 == null) d-none @endif feature_2">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">امکانات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_2" placeholder=" مثال: ضد آب " value="{{ $product->feature_2 }}">
                                            <div class="input-group-append"><a href="#" class="test2"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_3 == null) d-none @endif feature_3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_3" placeholder=" مثال: ضد آب " value="{{ $product->feature_3 }}">
                                            <div class="input-group-append"><a href="#" class="test3"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_4 == null) d-none @endif feature_4">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_4" placeholder=" مثال: ضد آب " value="{{ $product->feature_4 }}">
                                            <div class="input-group-append"><a href="#" class="test4"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_5 == null) d-none @endif feature_5">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_5" placeholder=" مثال: ضد آب " value="{{ $product->feature_5 }}">
                                            <div class="input-group-append"><a href="#" class="test5"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_6 == null) d-none @endif feature_6">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_6" placeholder=" مثال: ضد آب " value="{{ $product->feature_6 }}">
                                            <div class="input-group-append"><a href="#" class="test6"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_7 == null) d-none @endif feature_7">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_7" placeholder=" مثال: ضد آب " value="{{ $product->feature_7 }}">
                                            <div class="input-group-append"><a href="#" class="test7"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_8 == null) d-none @endif feature_8">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_8" placeholder=" مثال: ضد آب " value="{{ $product->feature_8 }}">
                                            <div class="input-group-append"><a href="#" class="test8"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_9 == null) d-none @endif feature_9">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_9" placeholder=" مثال: ضد آب " value="{{ $product->feature_9 }}">
                                            <div class="input-group-append"><a href="#" class="test9"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_10 == null) d-none @endif feature_10">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_10" placeholder=" مثال: ضد آب " value="{{ $product->feature_10 }}">
                                        </div>

                                        <div class="input-group mt-3 bg-white">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">امکانات ویژه محصول :</span></div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-1">
                                                <input type="checkbox" class="custom-control-input" id="supportProductUpdate{{ $product->id }}" name="support" @if($product->support == 1) checked @endif>
                                                    <label class="custom-control-label iranyekan font-15" for="supportProductUpdate{{ $product->id }}">پشتیبانی</label>
                                            </div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                                <input type="checkbox" class="custom-control-input" id="money_backProductUpdate{{ $product->id }}" name="money_back" @if($product->money_back == 1) checked @endif>
                                                    <label class="custom-control-label iranyekan font-15" for="money_backProductUpdate{{ $product->id }}">بازگشت وجه
                                                    </label>
                                            </div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                                <input type="checkbox" class="custom-control-input" id="fast_sendingProductUpdate{{ $product->id }}" name="fast_sending" @if($product->fast_sending == 1) checked @endif>
                                                    <label class="custom-control-label iranyekan font-15" for="fast_sendingProductUpdate{{ $product->id }}">ارسال سریع
                                                    </label>
                                            </div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                                <input type="checkbox" class="custom-control-input" id="secure_paymentProductUpdate{{ $product->id }}" name="secure_payment" @if($product->secure_payment == 1) checked @endif>
                                                    <label class="custom-control-label iranyekan font-15" for="secure_paymentProductUpdate{{ $product->id }}">پرداخت امن
                                                    </label>
                                            </div>

                                        </div>

                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <h4 class="mt-0 header-title">تصویر محصول</h4>
                                                <input type="file" id="input-file-now" name="image" class="dropify">
                                            </div>

                                        </div>

                                    </div>
                                    <!--end form-group-->
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-danger rounded" data-dismiss="modal">
                                    انصراف
                                </button>
                                <button type="submit" class="btn btn-primary rounded">ثبت درخواست</button>
                            </div>

                            </form>

                        </div>
                    </div>
                </div>
                @endforeach
                @foreach($products as $product)

                <div class="modal fade bd-example-modal-xl " id="UpdateProductModalFile{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ویرایش فایل </h5>
                                <button type="button" class="close rounded" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body modal-scroll" style="background-color:#fbfcfd">
                                <form action="{{ route('product-list.update', $product->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf {{ method_field('PATCH') }}

                                    <div class="form-group mb-0">
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">عنوان فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="title" placeholder="مثال: کتاب آموزش زبان" value="{{ $product->title }}">
                                            <input name="type" type="hidden" value="file">

                                        </div>

                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">توضیحات فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="description" placeholder="مثال: توضیحات مختصری درمورد فایل" value="{{ $product->description }}">
                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light inputfield min-width-140" id="basic-addon7">دسته بندی محصول :</span></div>
                                            <select class="form-control inputfield" name="product_category" id="">
                                                <option style="font-family: BYekan!important;" value="{{ $productCategory->id }}">{{ $productCategory->name }}
                                                </option>
                                                @foreach($productCategories as $productCategory)
                                                <option style="font-family: BYekan!important;" value="{{ $productCategory->id }}">
                                                    @if($productCategory->parent()->exists()) {{ $productCategory->parent()->get()->first()->name }} >
                                                        @endif {{ $productCategory->name }}
                                                </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">قیمت فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="price" placeholder="مثال: 30000" value="{{ $product->price }}">
                                            <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> تومان</span></div>

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">قیمت بعد از تخفیف:</span></div>
                                            <input type="text" class="form-control inputfield" name="off_price" placeholder="مثال: 30000" value="{{ $product->off_price }}">
                                            <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> تومان</span></div>

                                        </div>

                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_1" placeholder=" مثال: کیفیت بالا " value="{{ $product->feature_1 }}">
                                            <div class="input-group-append"><a href="#" class="test1"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_2 == null) d-none @endif feature_2">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">امکانات فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_2" placeholder=" مثال: کیفیت بالا " value="{{ $product->feature_2 }}">
                                            <div class="input-group-append"><a href="#" class="test2"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_3 == null) d-none @endif feature_3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_3" placeholder=" مثال: کیفیت بالا " value="{{ $product->feature_3 }}">
                                            <div class="input-group-append"><a href="#" class="test3"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_4 == null) d-none @endif feature_4">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_4" placeholder=" مثال: کیفیت بالا " value="{{ $product->feature_4 }}">
                                            <div class="input-group-append"><a href="#" class="test4"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_5 == null) d-none @endif feature_5">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_5" placeholder=" مثال: کیفیت بالا " value="{{ $product->feature_5 }}">
                                            <div class="input-group-append"><a href="#" class="test5"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_6 == null) d-none @endif feature_6">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_6" placeholder=" مثال: کیفیت بالا " value="{{ $product->feature_6 }}">
                                            <div class="input-group-append"><a href="#" class="test6"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_7 == null) d-none @endif feature_7">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_7" placeholder=" مثال: کیفیت بالا " value="{{ $product->feature_7 }}">
                                            <div class="input-group-append"><a href="#" class="test7"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_8 == null) d-none @endif feature_8">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_8" placeholder=" مثال: کیفیت بالا " value="{{ $product->feature_8 }}">
                                            <div class="input-group-append"><a href="#" class="test8"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_9 == null) d-none @endif feature_9">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_9" placeholder=" مثال: کیفیت بالا " value="{{ $product->feature_9 }}">
                                            <div class="input-group-append"><a href="#" class="test9"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_10 == null) d-none @endif feature_10">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_10" placeholder=" مثال: کیفیت بالا " value="{{ $product->feature_10 }}">

                                        </div>

                                        <div class="input-group mt-3 bg-white">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">امکانات ویژه محصول :</span></div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-1">
                                                <input type="checkbox" class="custom-control-input" id="supportFileUpdate{{ $product->id }}" name="support" @if($product->support == 1) checked @endif>
                                                    <label class="custom-control-label iranyekan font-15" for="supportFileUpdate{{ $product->id }}">پشتیبانی</label>
                                            </div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                                <input type="checkbox" class="custom-control-input" id="money_backFileUpdate{{ $product->id }}" name="money_back" @if($product->money_back == 1) checked @endif>
                                                    <label class="custom-control-label iranyekan font-15" for="money_backFileUpdate{{ $product->id }}">بازگشت وجه
                                                    </label>
                                            </div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                                <input type="checkbox" class="custom-control-input" id="fast_sendingFileUpdate{{ $product->id }}" name="fast_sending" @if($product->fast_sending == 1) checked @endif>
                                                    <label class="custom-control-label iranyekan font-15" for="fast_sendingFileUpdate{{ $product->id }}">ارسال سریع
                                                    </label>
                                            </div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                                <input type="checkbox" class="custom-control-input" id="secure_paymentFileUpdate{{ $product->id }}" name="secure_payment" @if($product->secure_payment == 1) checked @endif>
                                                    <label class="custom-control-label iranyekan font-15" for="secure_paymentFileUpdate{{ $product->id }}">پرداخت امن
                                                    </label>
                                            </div>

                                        </div>

                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <h4 class="mt-0 header-title">تصویر محصول</h4>
                                                <input type="file" id="input-file-now" name="attachment" class="dropify">
                                            </div>

                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="mt-0 header-title">اپلود فایل</h4>
                                                <p class="text-muted mb-3">فایل شما میتواند از نوع pdf یا docs باشد
                                                </p>
                                                <input type="file" id="input-file-now" name="image" class="dropify">
                                            </div>
                                            <!--end card-body-->
                                        </div>

                                    </div>
                                    <!--end form-group-->
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-danger rounded" data-dismiss="modal">
                                    انصراف
                                </button>
                                <button type="submit" class="btn btn-primary rounded">ثبت درخواست</button>
                            </div>

                            </form>

                        </div>
                    </div>
                </div>
                @endforeach
                @foreach($products as $product)

                <div class="modal fade bd-example-modal-xl " id="UpdateProductModalService{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ویرایش خدمت </h5>
                                <button type="button" class="close rounded" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body modal-scroll" style="background-color:#fbfcfd">
                                <form action="{{ route('product-list.update', $product->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf {{ method_field('PATCH') }}
                                    <div class="form-group mb-0">
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">عنوان خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="title" placeholder="مثال: تدریس خصوصی" value="{{ $product->title }}">
                                            <input name="type" type="hidden" value="service">

                                        </div>

                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">توضیحات خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="description" placeholder="مثال: توضیحات مختصری درمورد خدمت" value="{{ $product->description }}">
                                        </div>

                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light inputfield min-width-140" id="basic-addon7">دسته بندی محصول :</span></div>
                                            <select class="form-control inputfield" name="product_category" id="">
                                                <option style="font-family: BYekan!important;" value="{{ $productCategory->id }}">{{ $productCategory->name }}
                                                </option>
                                                @foreach($productCategories as $productCategory)
                                                <option style="font-family: BYekan!important;" value="{{ $productCategory->id }}">
                                                    @if($productCategory->parent()->exists()) {{ $productCategory->parent()->get()->first()->name }} >
                                                        @endif {{ $productCategory->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">قیمت خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="price" placeholder="مثال: 30000" value="{{ $product->price }}">
                                            <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> ریال</span></div>

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">قیمت بعد از تخفیف :</span></div>
                                            <input type="text" class="form-control inputfield" name="off_price" placeholder="مثال: 30000" value="{{ $product->off_price }}">
                                            <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> ریال</span></div>

                                        </div>

                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_1" placeholder=" مثال: ضد آب " value="{{ $product->feature_1 }}">
                                            <div class="input-group-append"><a href="#" class="test1"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_2 == null) d-none @endif feature_2">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">امکانات خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_2" placeholder=" مثال: ضد آب " value="{{ $product->feature_2 }}">
                                            <div class="input-group-append"><a href="#" class="test2"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_3 == null) d-none @endif feature_3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_3" placeholder=" مثال: ضد آب " value="{{ $product->feature_3 }}">
                                            <div class="input-group-append"><a href="#" class="test3"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_4 == null) d-none @endif feature_4">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_4" placeholder=" مثال: ضد آب " value="{{ $product->feature_4 }}">
                                            <div class="input-group-append"><a href="#" class="test4"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_5 == null) d-none @endif feature_5">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_5" placeholder=" مثال: ضد آب " value="{{ $product->feature_5 }}">
                                            <div class="input-group-append"><a href="#" class="test5"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_6 == null) d-none @endif feature_6">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_6" placeholder=" مثال: ضد آب " value="{{ $product->feature_6 }}">
                                            <div class="input-group-append"><a href="#" class="test6"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_7 == null) d-none @endif feature_7">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_7" placeholder=" مثال: ضد آب " value="{{ $product->feature_7 }}">
                                            <div class="input-group-append"><a href="#" class="test7"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_8 == null) d-none @endif feature_8">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_8" placeholder=" مثال: ضد آب " value="{{ $product->feature_8 }}">
                                            <div class="input-group-append"><a href="#" class="test8"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_9 == null) d-none @endif feature_9">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_9" placeholder=" مثال: ضد آب " value="{{ $product->feature_9 }}">
                                            <div class="input-group-append"><a href="#" class="test9"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 @if($product->feature_10 == null) d-none @endif feature_10">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_10" placeholder=" مثال: ضد آب " value="{{ $product->feature_10 }}">

                                        </div>

                                        <div class="input-group mt-3 bg-white">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">امکانات ویژه خدمت :</span></div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-1">
                                                <input type="checkbox" class="custom-control-input" id="supportServiceUpdate{{ $product->id }}" name="support" @if($product->support == 1) checked @endif>
                                                    <label class="custom-control-label iranyekan font-15" for="supportServiceUpdate{{ $product->id }}">پشتیبانی</label>
                                            </div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                                <input type="checkbox" class="custom-control-input" id="money_backServiceUpdate{{ $product->id }}" name="money_back" @if($product->money_back == 1) checked @endif>
                                                    <label class="custom-control-label iranyekan font-15" for="money_backServiceUpdate{{ $product->id }}">بازگشت وجه
                                                    </label>
                                            </div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                                <input type="checkbox" class="custom-control-input" id="fast_sendingServiceUpdate{{ $product->id }}" name="fast_sending" @if($product->fast_sending == 1) checked @endif>
                                                    <label class="custom-control-label iranyekan font-15" for="fast_sendingServiceUpdate{{ $product->id }}">ارسال سریع
                                                    </label>
                                            </div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                                <input type="checkbox" class="custom-control-input" id="secure_paymentServiceUpdate{{ $product->id }}" name="secure_payment" @if($product->secure_payment == 1) checked @endif>
                                                    <label class="custom-control-label iranyekan font-15" for="secure_paymentServiceUpdate{{ $product->id }}">پرداخت امن
                                                    </label>
                                            </div>

                                        </div>

                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <h4 class="mt-0 header-title">تصویر خدمت</h4>
                                                <input type="file" id="input-file-now" name="image" class="dropify">
                                            </div>
                                        </div>
                                    </div>
                                    <!--end form-group-->
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-danger rounded" data-dismiss="modal">
                                    انصراف
                                </button>
                                <button type="submit" class="btn btn-primary rounded">ثبت درخواست</button>
                            </div>

                            </form>

                        </div>
                    </div>
                </div>
                @endforeach

                <div class="modal fade bd-example-modal-xl" id="AddFileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">افزودن فایل </h5>
                                <button type="button" class="close rounded" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body modal-scroll" style="background-color:#fbfcfd">
                                <form action="{{ route('Product.storeProduct') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-0">
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">عنوان فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="title" placeholder="مثال: کتاب آموزش زبان">
                                            <input name="type" type="hidden" value="file">

                                        </div>

                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">توضیحات فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="description" placeholder="مثال: توضیحات مختصری درمورد فایل">
                                        </div>

                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light inputfield min-width-140" id="basic-addon7">دسته بندی محصول :</span></div>
                                            @if (\Auth::user()->shop()->first()->ProductCategories()->get()->count() == 0)
                                            <select class="form-control inputfield" name="product_category" id="" disabled>
                                                <option style="font-family: BYekan!important;">دسته بندی وجود ندارد لطفا ابتدا دسته بندی ایجاد کنید
                                                </option>
                                            </select>
                                            <a href="{{ route('product-category.index') }}" class="align-self-center">
                                                <div class="input-group-append"><span class="h-50px input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن دسته بندی</span>
                                                </div>
                                            </a>
                                            @else
                                            <select class="form-control inputfield" name="product_category" id="">
                                                <option style="font-family: BYekan!important;">انتخاب دسته بندی
                                                </option>
                                                @foreach($productCategories as $productCategory)
                                                <option style="font-family: BYekan!important;" value="{{ $productCategory->id }}">
                                                    @if($productCategory->parent()->exists()) {{ $productCategory->parent()->get()->first()->name }} >
                                                        @endif {{ $productCategory->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @endif

                                        </div>

                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">قیمت فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="price" placeholder="مثال: 30000">
                                            <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> تومان</span></div>

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">قیمت بعد از تخفیف :</span></div>
                                            <input type="text" class="form-control inputfield" name="off_price" placeholder="مثال: 30000">
                                            <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> تومان</span></div>

                                        </div>

                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_1" placeholder=" مثال: کیفیت بالا ">
                                            <div class="input-group-append"><a href="#" class="test1"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_2">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">امکانات فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_2" placeholder=" مثال: کیفیت بالا ">
                                            <div class="input-group-append"><a href="#" class="test2"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_3" placeholder=" مثال: کیفیت بالا ">
                                            <div class="input-group-append"><a href="#" class="test3"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_4">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_4" placeholder=" مثال: کیفیت بالا ">
                                            <div class="input-group-append"><a href="#" class="test4"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_5">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_5" placeholder=" مثال: کیفیت بالا ">
                                            <div class="input-group-append"><a href="#" class="test5"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_6">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_6" placeholder=" مثال: کیفیت بالا ">
                                            <div class="input-group-append"><a href="#" class="test6"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_7">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_7" placeholder=" مثال: کیفیت بالا ">
                                            <div class="input-group-append"><a href="#" class="test7"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_8">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_8" placeholder=" مثال: کیفیت بالا ">
                                            <div class="input-group-append"><a href="#" class="test8"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_9">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_9" placeholder=" مثال: کیفیت بالا ">
                                            <div class="input-group-append"><a href="#" class="test9"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_10">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_10" placeholder=" مثال: کیفیت بالا ">
                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> برچسب های محصول :</span></div>
                                            <input type="text" name="tags" class="form-control" />
                                        </div>

                                        <div class="input-group mt-3 bg-white">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">امکانات ویژه محصول :</span></div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-1">
                                                <input type="checkbox" class="custom-control-input" id="supportFile" name="support">
                                                <label class="custom-control-label iranyekan font-15" for="supportFile">پشتیبانی</label>
                                            </div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                                <input type="checkbox" class="custom-control-input" id="money_backFile" name="money_back">
                                                <label class="custom-control-label iranyekan font-15" for="money_backFile">بازگشت وجه</label>
                                            </div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                                <input type="checkbox" class="custom-control-input" id="fast_sendingFile" name="fast_sending">
                                                <label class="custom-control-label iranyekan font-15" for="fast_sendingFile">ارسال سریع</label>
                                            </div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                                <input type="checkbox" class="custom-control-input" id="secure_paymentFile" name="secure_payment">
                                                <label class="custom-control-label iranyekan font-15" for="secure_paymentFile">پرداخت امن</label>
                                            </div>

                                        </div>

                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <h4 class="mt-0 header-title">تصویر محصول</h4>
                                                <input type="file" id="input-file-now" name="image" class="dropify">
                                            </div>

                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="mt-0 header-title">اپلود فایل</h4>
                                                <p class="text-muted mb-3">فایل شما میتواند از نوع pdf یا docs باشد
                                                </p>
                                                <input type="file" id="input-file-now" name="image" class="dropify">
                                            </div>
                                            <!--end card-body-->
                                        </div>

                                    </div>
                                    <!--end form-group-->
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-danger rounded" data-dismiss="modal">انصراف
                                </button>
                                <div class="group">
                                    <button type="submit" name="action" value="justSave" class="btn btn-primary rounded">ثبت درخواست
                                    </button>
                                    <button type="submit" name="action" value="saveAndContinue" class="btn btn-primary rounded">ثبت درخواست و ادامه
                                    </button>
                                </div>
                            </div>

                            </form>

                        </div>
                    </div>
                </div>

                <div class="modal fade bd-example-modal-xl" id="AddServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">افزودن خدمت </h5>
                                <button type="button" class="close rounded" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body modal-scroll" style="background-color:#fbfcfd">
                                <form action="{{ route('Product.storeProduct') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-0">
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">عنوان خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="title" placeholder="مثال: تدریس خصوصی">
                                            <input name="type" type="hidden" value="service">

                                        </div>

                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">توضیحات خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="description" placeholder="مثال: توضیحات مختصری درمورد خدمت">
                                        </div>

                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light inputfield min-width-140" id="basic-addon7">دسته بندی محصول :</span></div>
                                            @if (\Auth::user()->shop()->first()->ProductCategories()->get()->count() == 0)
                                            <select class="form-control inputfield" name="product_category" id="" disabled>
                                                <option style="font-family: BYekan!important;">دسته بندی وجود ندارد لطفا ابتدا دسته بندی ایجاد کنید
                                                </option>
                                            </select>
                                            <a href="{{ route('product-category.index') }}" class="align-self-center">
                                                <div class="input-group-append"><span class="h-50px input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن دسته بندی</span>
                                                </div>
                                            </a>
                                            @else
                                            <select class="form-control inputfield" name="product_category" id="">
                                                <option style="font-family: BYekan!important;">انتخاب دسته بندی
                                                </option>
                                                @foreach($productCategories as $productCategory)
                                                <option style="font-family: BYekan!important;" value="{{ $productCategory->id }}">
                                                    @if($productCategory->parent()->exists()) {{ $productCategory->parent()->get()->first()->name }} >
                                                        @endif {{ $productCategory->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @endif

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">قیمت خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="price" placeholder="مثال: 30000">
                                            <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> ریال</span></div>

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">قیمت بعد از تخفیف :</span></div>
                                            <input type="text" class="form-control inputfield" name="off_price" placeholder="مثال: 30000">
                                            <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> ریال</span></div>

                                        </div>

                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_1" placeholder=" مثال: ضد آب ">
                                            <div class="input-group-append"><a href="#" class="test1"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_2">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">امکانات خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_2" placeholder=" مثال: ضد آب ">
                                            <div class="input-group-append"><a href="#" class="test2"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_3" placeholder=" مثال: ضد آب ">
                                            <div class="input-group-append"><a href="#" class="test3"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_4">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_4" placeholder=" مثال: ضد آب ">
                                            <div class="input-group-append"><a href="#" class="test4"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_5">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_5" placeholder=" مثال: ضد آب ">
                                            <div class="input-group-append"><a href="#" class="test5"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_6">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_6" placeholder=" مثال: ضد آب ">
                                            <div class="input-group-append"><a href="#" class="test6"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_7">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_7" placeholder=" مثال: ضد آب ">
                                            <div class="input-group-append"><a href="#" class="test7"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_8">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_8" placeholder=" مثال: ضد آب ">
                                            <div class="input-group-append"><a href="#" class="test8"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_9">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_9" placeholder=" مثال: ضد آب ">
                                            <div class="input-group-append"><a href="#" class="test9"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                        امکانات
                                                    </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_10">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات خدمت :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_10" placeholder=" مثال: ضد آب ">
                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> برچسب های محصول :</span></div>
                                            <input type="text" name="tags" class="form-control" />
                                        </div>

                                        <div class="input-group mt-3 bg-white">
                                            <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">امکانات ویژه خدمت :</span></div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-1">
                                                <input type="checkbox" class="custom-control-input" id="supportService" name="support">
                                                <label class="custom-control-label iranyekan font-15" for="supportService">پشتیبانی</label>
                                            </div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                                <input type="checkbox" class="custom-control-input" id="money_backService" name="money_back">
                                                <label class="custom-control-label iranyekan font-15" for="money_backService">بازگشت وجه</label>
                                            </div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                                <input type="checkbox" class="custom-control-input" id="fast_sendingService" name="fast_sending">
                                                <label class="custom-control-label iranyekan font-15" for="fast_sendingService">ارسال سریع</label>
                                            </div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                                <input type="checkbox" class="custom-control-input" id="secure_paymentService" name="secure_payment">
                                                <label class="custom-control-label iranyekan font-15" for="secure_paymentService">پرداخت امن</label>
                                            </div>

                                        </div>

                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <h4 class="mt-0 header-title">تصویر خدمت</h4>
                                                <input type="file" id="input-file-now" name="image" class="dropify">
                                            </div>
                                        </div>
                                    </div>
                                    <!--end form-group-->
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
                                <div class="group">
                                    <button type="submit" name="action" value="justSave" class="btn btn-primary rounded">ثبت درخواست
                                    </button>
                                    <button type="submit" name="action" value="saveAndContinue" class="btn btn-primary rounded">ثبت درخواست و ادامه
                                    </button>
                                </div>
                            </div>

                            </form>

                        </div>
                    </div>
                </div>

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

                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer rounded font-16" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                      aria-describedby="datatable_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">شناسه
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 405px;">نام محصول
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 148px;">دسته بندی
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 104px;">قیمت
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 104px;">قیمت بعد از تخفیف
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">وضعیت
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">نوع محصول
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody class="byekan">
                                            @foreach($products as $product)
                                            <tr role="row" class="odd icon-hover hover-color" id="{{ $product->id }}">
                                                <td class="sorting_1" style="width:5%">{{ $product->id }}</td>
                                                <td class="sorting_1 w-25 "><img src="{{ $product->image['80,80'] }}" class="rounded" alt="">
                                                    <p class="d-inline-block align-middle mb-0 mr-2"><a href="{{ route('product-list.show',$product->id) }}" class="d-inline-block align-middle mb-0 product-name">{{ $product->title }}</a>
                                                </td>
                                                <td>{{ $product->productCategory()->first()->name }}</td>
                                                <td>{{ number_format($product->price) }}</td>
                                                <td>{{ $product->off_price }}</td>

                                                <td>
                                                    @csrf {{ method_field('put') }}
                                                    <button class="btn btn-link change" type="submit" data-id="{{ $product->id }}">
                                                        @if($product->status == 1)
                                                            <i class="fa fa-toggle-on text-success show{{ $product->id }}"></i>
                                                            <i class="fa fa-toggle-off text-muted d-none {{ $product->id }}"></i>
                                                            @else
                                                            <i class="fa fa-toggle-on text-success d-none {{ $product->id }}"></i>
                                                            <i class="fa fa-toggle-off text-muted show{{ $product->id }}"></i>
                                                            @endif
                                                    </button>
                                                    @if ($product->status == 1)
                                                    <span class="badge badge-soft-success show{{ $product->id }}">
                                                        فعال
                                                    </span>
                                                    <span class="badge badge-soft-pink d-none {{ $product->id }}">
                                                        غیرفعال
                                                    </span>
                                                    @else
                                                    <span class="badge badge-soft-success d-none {{ $product->id }}">
                                                        فعال
                                                    </span>
                                                    <span class="badge badge-soft-pink show{{ $product->id }}">
                                                        غیرفعال
                                                    </span>
                                                    @endif

                                                </td>

                                                <td class="d-flex justify-content-between">
                                                    @if ($product->type == 'service') خدمت @elseif($product->type == 'file') فایل
                                                        @else فیزیکی
                                                        @endif
                                                        <div class="d-none icon-show">

                                                            @if($product->type == 'product')
                                                                <a href="{{ $product->id }}" id="editProduct" data-toggle="modal" data-target="#UpdateProductModalProduct{{ $product->id }}"><i class="far fa-edit text-info mr-1 button font-15"></i>
                                                                </a>
                                                                @elseif($product->type == 'file')
                                                                    <a href="{{ $product->id }}" id="editProduct" data-toggle="modal" data-target="#UpdateProductModalFile{{ $product->id }}"><i class="far fa-edit text-info mr-1 button font-15"></i>
                                                                    </a>
                                                                    @else
                                                                    <a href="{{ $product->id }}" id="editProduct" data-toggle="modal" data-target="#UpdateProductModalService{{ $product->id }}"><i class="far fa-edit text-info mr-1 button font-15"></i>
                                                                    </a>
                                                                    @endif

                                                                    </a>

                                                                    <a href="" id="removerProduct" data-id="{{ $product->id }}" data-name="{{ $product->title }}">
                                                                        <i class="far fa-trash-alt text-danger font-15"></i></a>

                                                                    <a href="{{ route('galleries.index', $product->id ) }}"><i class="fa fa-image text-info mr-1 button font-15"></i></a>

                                                        </div>

                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite"></div>
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
<script src="/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
<script src="/dashboard/assets/plugins/datatables/jquery.datatable.init.js"></script>
<script src="/dashboard/assets/plugins/dropify/js/dropify.min.js"></script>
<script src="/dashboard/assets/pages/jquery.form-upload.init.js"></script>

<script>
    $(".change").click(function() {
        var id = $(this).data("id");
        $.ajax({
            url: "product-list/change-status/" + id,
            type: 'put',
            dataType: "JSON",
            data: {
                "id": id,
                "_method": 'put',
                "_token": "{{ csrf_token() }}",
            }

        });
        $("i." + id).toggleClass("d-none");
        $("span." + id).toggleClass("d-none");
        $("i.show" + id).toggleClass("d-none");
        $("span.show" + id).toggleClass("d-none");
        toastr.success('انجام شد.', '', [])
    });
</script>
<script>
    $(document).ready(function() {
        $(".test1").click(function() {
            $(".feature_2").removeClass("d-none");
            $(".test1").addClass("d-none");
        });
        $(".test2").click(function() {
            $(".feature_3").removeClass("d-none");
            $(".test2").addClass("d-none");
        });
        $(".test3").click(function() {
            $(".feature_4").removeClass("d-none");
            $(".test3").addClass("d-none");
        });
        $(".test4").click(function() {
            $(".feature_5").removeClass("d-none");
            $(".test4").addClass("d-none");
        });
        $(".test5").click(function() {
            $(".feature_6").removeClass("d-none");
            $(".test5").addClass("d-none");
        });
        $(".test6").click(function() {
            $(".feature_7").removeClass("d-none");
            $(".test6").addClass("d-none");
        });
        $(".test7").click(function() {
            $(".feature_8").removeClass("d-none");
            $(".test7").addClass("d-none");
        });
        $(".test8").click(function() {
            $(".feature_9").removeClass("d-none");
            $(".test8").addClass("d-none");
        });
        $(".test9").click(function() {
            $(".feature_10").removeClass("d-none");
            $(".test9").addClass("d-none");
        });
            });
    $(document).ready(function() {
        $(".color1").click(function() {
            $(".color_1").removeClass("d-none");
            $(".color1").addClass("d-none");
        });
    });
    $(document).ready(function() {
        $(".color2").click(function() {
            $(".color_2").removeClass("d-none");
            $(".color2").addClass("d-none");
        });
    });
    $(document).ready(function() {
        $(".color3").click(function() {
            $(".color_3").removeClass("d-none");
            $(".color3").addClass("d-none");
        });
    });
    $(document).ready(function() {
        $(".color4").click(function() {
            $(".color_4").removeClass("d-none");
            $(".color4").addClass("d-none");
        });
    });
    $(document).on('click', '#removerProduct', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var name = $(this).data('name');
        console.log(name)
        swal(` ${'حذف محصول:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
                dangerMode: true,
                icon: "warning",
                buttons: ["انصراف", "حذف"],
            })
            .then(function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: "post",
                        url: "{{url('/dashboard/shop/product-list/delete')}}",
                        data: {
                            id: id,
                            "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                        },
                        success: function(data) {
                            var url = document.location.origin + "/dashboard/shop/product-list";
                            location.href = url;
                        }
                    });
                } else {
                    toastr.warning('لغو شد.', '', []);
                }
            });
    });
</script>
@if(session()->has('flashModalProduct'))
    <script>
        $('#AddProductModal').modal('show');
    </script>
    @elseif(session()->has('flashModalFile'))
        <script>
            $('#AddFileModal').modal('show');
        </script>
        @elseif(session()->has('flashModalService'))
            <script>
                $('#AddServiceModal').modal('show');
            </script>
            @endif
            @stop
