@extends('dashboard.layouts.master')
@section('content')
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
                <div class="text-right">
                    <a href="#" data-toggle="modal" data-target="#AddSelectModal" class="btn btn-primary text-white d-inline-block text-right mb-3 font-weight-bold"><i class="fa fa-plus mr-2"></i>اضافه کردن محصول</a>
                </div>

                <div class="modal fade bd-example-modal-xl" id="AddSelectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-18" id="exampleModalLabel">لطفا نوع محصول خود را انتخاب کنید</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('card.store') }}" method="post" class="form-horizontal">
                                    @csrf
                                    <div class="form-group mb-0">
                                        <a data-dismiss="modal" data-toggle="modal" href="#AddProductModal">
                                            <div class="input-group mt-3 border">
                                                <div class="p-4">
                                                    <span class="sett-card-icon set-icon-purple"><i class="fa fa-boxes f-em5"></i></span>
                                                </div>
                                                <div class="">
                                                    <p class="f-em1-5 m-5 mr-4 iranyekan">کالایی که حجم فیزیکی دارد و باید برای خریدار ارسال شود</p>
                                                </div>
                                            </div>
                                        </a>


                                        <a data-dismiss="modal" data-toggle="modal" href="#AddFileModal">
                                            <div class="input-group mt-3 border">
                                                <div class="p-4">
                                                    <span class="sett-card-icon set-icon-purple"><i class="fa fa-download f-em5"></i></span>
                                                </div>
                                                <div class="">
                                                    <p class="f-em1-5 m-5 mr-4 iranyekan"> محصولی که به صورت لینک دانلود برای خریدار ارسال می‌شود </p>
                                                </div>
                                            </div>
                                        </a>


                                        <a data-dismiss="modal" data-toggle="modal" href="#AddServiceModal">
                                            <div class="input-group mt-3 border">
                                                <div class="p-4">
                                                    <span class="sett-card-icon set-icon-purple"><i class="fa fa-user-friends f-em5"></i></span>
                                                </div>
                                                <div class="">
                                                    <p class="f-em1-5 m-5 mr-4 iranyekan">یک خدمت باید به خریدار ارائه شود و هزینه ارسال ندارد</p>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                    <!--end form-group-->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">بستن</button>
                                {{-- <button type="submit" class="btn btn-primary">ثبت درخواست</button> --}}
                                {{-- <a data-dismiss="modal" data-toggle="modal" href="#AddProductModal1">Click</a> --}}

                            </div>
                            </form>

                        </div>
                    </div>
                </div>


                <div class="modal fade bd-example-modal-xl " id="AddProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">افزودن کالای  </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body modal-scroll">
                                <form action="{{ route('Product.storeProduct') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-0">
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">عنوان محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="title" placeholder="مثال: جاروبرقی">
                                            <input name="type" type="hidden" value="product">
                                        </div>

                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">توضیحات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="description" placeholder="مثال: توضیحات مختصری درمورد محصول">
                                        </div>


                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light inputfield min-width-140" id="basic-addon7">دسته بندی محصول :</span></div>
                                            @if (\Auth::user()->shop()->first()->categories()->get()->count() == 0)
                                            <select class="form-control inputfield" name="productCat_id" id="" disabled>
                                                <option style="font-family: BYekan!important;">دسته بندی وجود ندارد لطفا ابتدا دسته بندی ایجاد کنید</option>
                                            </select>
                                            <a href="{{ route('product-category.index') }}" class="align-self-center">
                                                <div class="input-group-append"><span class="h-50px input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن دسته بندی</span></div>
                                            </a>
                                            @else
                                            <select class="form-control inputfield" name="productCat_id" id="">
                                                <option style="font-family: BYekan!important;">انتخاب دسته بندی</option>
                                                @foreach($productCategories as $productCategory)
                                                <option style="font-family: BYekan!important;" value="{{ $productCategory->id }}">{{ $productCategory->name }}</option>
                                            </select>
                                            @endforeach
                                            @endif


                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">قیمت محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="price" placeholder="مثال: 30000">
                                            <div class="input-group-append"><span class="input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"> ریال</span></div>

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">موجودی در انبار :</span></div>
                                            <input type="text" class="form-control inputfield" name="amount" placeholder="مثال: 3">
                                            <div class="input-group-append"><span class="input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8">عدد</span></div>

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">وزن محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="weight" placeholder="2مثال: 30">
                                            <div class="input-group-append"><span class="input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8">گرم</span></div>

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">رنگ محصول :</span></div>
                                            <input class="form-control h-50px" type="color" placeholder="#122272" id="example-color-input" name="color_1">
                                            <div class="input-group-append"><a href="#" class="color1"><span class="h-50px input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن رنگ  </span></a></div>
                                        </div>
                                        <div class="input-group mt-3 d-none color_1">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">رنگ محصول :</span></div>
                                            <input class="form-control h-50px" type="color" value="#a89d8e" id="example-color-input" name="color_2">
                                            <div class="input-group-append"><a href="#" class="color2"><span class="h-50px input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن رنگ  </span></a></div>
                                        </div>
                                        <div class="input-group mt-3 d-none color_2">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">رنگ محصول :</span></div>
                                            <input class="form-control h-50px" type="color" value="#a89d8e" id="example-color-input" name="color_3">
                                            <div class="input-group-append"><a href="#" class="color3"><span class="h-50px input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن رنگ  </span></a></div>
                                        </div>
                                        <div class="input-group mt-3 d-none color_3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">رنگ محصول :</span></div>
                                            <input class="form-control h-50px" type="color" value="#a89d8e" id="example-color-input" name="color_4">
                                            <div class="input-group-append"><a href="#" class="color4"><span class="h-50px input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن رنگ  </span></a></div>
                                        </div>
                                        <div class="input-group mt-3 d-none color_4">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">رنگ محصول :</span></div>
                                            <input class="form-control h-50px" type="color" value="#a89d8e" id="example-color-input" name="color_5">

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_1" placeholder=" مثال: ضد آب ">
                                            <div class="input-group-append"><a href="#" class="test1"><span class="h-50px input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن امکانات
                                                         </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_2">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">امکانات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_2" placeholder=" مثال: ضد آب ">
                                            <div class="input-group-append"><a href="#" class="test2"><span class="h-50px input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن امکانات
                                                         </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_3" placeholder=" مثال: ضد آب ">
                                            <div class="input-group-append"><a href="#" class="test3"><span class="h-50px input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن امکانات
                                                         </span></a></div>

                                        </div>
                                        <div class="input-group mt-3 d-none feature_4">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                            <input type="text" class="form-control inputfield" name="feature_4" placeholder=" مثال: ضد آب ">
                                        </div>

                                        <div class="input-group mt-3 bg-white">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">امکانات ویژه محصول :</span></div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-2">
                                                <input type="checkbox" class="custom-control-input" id="support" name="support">
                                                <label class="custom-control-label iranyekan font-15" for="support">پشتیبانی</label>
                                            </div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-2">
                                                <input type="checkbox" class="custom-control-input" id="money_back" name="money_back">
                                                <label class="custom-control-label iranyekan font-15" for="money_back">بازگشت وجه</label>
                                            </div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-2">
                                                <input type="checkbox" class="custom-control-input" id="fast_sending" name="fast_sending">
                                                <label class="custom-control-label iranyekan font-15" for="fast_sending">ارسال سریع</label>
                                            </div>
                                            <div class="custom-control custom-switch switch-blue mr-5 p-3 col-2">
                                                <input type="checkbox" class="custom-control-input" id="secure_payment" name="secure_payment">
                                                <label class="custom-control-label iranyekan font-15" for="secure_payment">پرداخت امن</label>
                                            </div>

                                        </div>


                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">وضعیت محصول :</span></div>
                                            <div class="btn-group btn-group-toggle col-10" data-toggle="buttons">
                                                <label class="btn btn-outline-success iranyekan mr-5">
                                                    <input type="radio" name="enable" id="option1"> فعال
                                                </label>
                                                <label class="btn btn-outline-danger iranyekan mr-5">
                                                    <input type="radio" id="option3"> غیرفعال
                                                </label>
                                            </div>
                                        </div>

                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <h4 class="mt-0 header-title">تصویر محصول</h4>
                                                <div class="dropify-wrapper has-preview h-280px">
                                                    <div class="dropify-message"><span class="file-icon"></span>
                                                        <p>با استفاده از درگ دراپ ویا کلیک برروی کادر زیر فایل را آپلود نمایید.</p>
                                                        <p class="dropify-error">خطا</p>
                                                    </div>
                                                    <div class="dropify-loader" style="display: none;"></div>
                                                    <div class="dropify-errors-container">
                                                        <ul></ul>
                                                    </div>
                                                    <input name="image" type="file" id="input-file-now-custom-1" class="dropify" data-default-file="/dashboard/assets/images/BrandNameHere.jpg">
                                                    <button type="button" class="dropify-clear">حذف</button>
                                                    <div class="dropify-preview" style="display: block;"><span class="dropify-render"><img src="/dashboard/assets/images/labtop.jpg"></span>
                                                        <div class="dropify-infos">
                                                            <div class="dropify-infos-inner">
                                                                <p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner">نمونه لوگو</span></p>
                                                                <p class="dropify-infos-message">با استفاده از درگ دراپ ویا کلیک برروی کادر زیر فایل را آپلود نمایید</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


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

                <div class="modal fade bd-example-modal-xl" id="AddFileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">افزودن فایل  </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body modal-scroll">
                                <form action="{{ route('Product.storeFile') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-0">
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">عنوان فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="title" placeholder="مثال: کتاب آموزش زبان">
                                            <input name="type" type="hidden" value="file">

                                        </div>

                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">توضیحات فایل :</span></div>
                                            <input type="text" class="form-control inputfield" name="description" placeholder="مثال: توضیحات مختصری درمورد فایل">
                                        </div>


                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light inputfield min-width-140" id="basic-addon7">دسته بندی محصول :</span></div>
                                            @if (\Auth::user()->shop()->first()->categories()->get()->count() == 0)
                                            <select class="form-control inputfield" name="productCat_id" id="" disabled>
                                                <option style="font-family: BYekan!important;">دسته بندی وجود ندارد لطفا ابتدا دسته بندی ایجاد کنید</option>
                                            </select>
                                            <a href="{{ route('product-category.index') }}" class="align-self-center">
                                                <div class="input-group-append"><span class="h-50px input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن دسته بندی</span></div>
                                            </a>

                                            @else
                                            <select class="form-control inputfield" name="productCat_id" id="">
                                                <option style="font-family: BYekan!important;">انتخاب دسته بندی</option>
                                                @foreach($productCategories as $productCategory)
                                                <option style="font-family: BYekan!important;" value="{{ $productCategory->id }}">{{ $productCategory->name }}</option>
                                            </select>
                                            @endforeach
                                            @endif


                                        </div>
                                    </div>
                                    <div class="input-group mt-3">
                                        <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">قیمت فایل :</span></div>
                                        <input type="text" class="form-control inputfield" name="price" placeholder="مثال: 30000">
                                        <div class="input-group-append"><span class="input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"> ریال</span></div>

                                    </div>
                                    <div class="input-group mt-3">
                                        <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">حجم فایل :</span></div>
                                        <input type="text" class="form-control inputfield" name="file_size" placeholder="مثال: 45">
                                        <div class="input-group-append"><span class="input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8">مگابایت</span></div>

                                    </div>
                                    <div class="input-group mt-3">
                                        <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> موجودی فایل :</span></div>
                                        <input type="text" class="form-control inputfield" name="price" placeholder=" مثال: 100">
                                        <div class="input-group-append"><span class="input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"> عدد</span></div>

                                    </div>
                                    <div class="input-group mt-3">
                                        <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات فایل :</span></div>
                                        <input type="text" class="form-control inputfield" name="price" placeholder=" مثال: کیفیت بالا ">
                                        <div class="input-group-append"><a href="#" class="test1"><span class="h-50px input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن امکانات
                                                     </span></a></div>

                                    </div>
                                    <div class="input-group mt-3 d-none feature_2">
                                        <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">امکانات فایل :</span></div>
                                        <input type="text" class="form-control inputfield" name="price" placeholder=" مثال: کیفیت بالا ">
                                        <div class="input-group-append"><a href="#" class="test2"><span class="h-50px input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن امکانات
                                                     </span></a></div>

                                    </div>
                                    <div class="input-group mt-3 d-none feature_3">
                                        <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات فایل :</span></div>
                                        <input type="text" class="form-control inputfield" name="price" placeholder=" مثال: کیفیت بالا ">
                                        <div class="input-group-append"><a href="#" class="test3"><span class="h-50px input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن امکانات
                                                     </span></a></div>

                                    </div>
                                    <div class="input-group mt-3 d-none feature_4">
                                        <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات فایل :</span></div>
                                        <input type="text" class="form-control inputfield" name="price" placeholder=" مثال: کیفیت بالا ">


                                    </div>

                                    <div class="input-group mt-3">
                                        <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">وضعیت فایل :</span></div>
                                        <div class="btn-group btn-group-toggle col-10" data-toggle="buttons">
                                            <label class="btn btn-outline-success iranyekan mr-5">
                                                <input type="radio" name="enable" id="option1"> فعال
                                            </label>
                                            <label class="btn btn-outline-danger iranyekan mr-5">
                                                <input type="radio" id="option3"> غیرفعال
                                            </label>
                                        </div>
                                    </div>

                                    <div class="card mt-3">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">تصویر محصول</h4>
                                            <div class="dropify-wrapper has-preview h-280px">
                                                <div class="dropify-message"><span class="file-icon"></span>
                                                    <p>با استفاده از درگ دراپ ویا کلیک برروی کادر زیر فایل را آپلود نمایید.</p>
                                                    <p class="dropify-error">خطا</p>
                                                </div>
                                                <div class="dropify-loader" style="display: none;"></div>
                                                <div class="dropify-errors-container">
                                                    <ul></ul>
                                                </div>
                                                <input name="image" type="file" id="input-file-now-custom-1" class="dropify" data-default-file="/dashboard/assets/images/BrandNameHere.jpg">
                                                <button type="button" class="dropify-clear">حذف</button>
                                                <div class="dropify-preview" style="display: block;"><span class="dropify-render"><img src="/dashboard/assets/images/english.jpg"></span>
                                                    <div class="dropify-infos">
                                                        <div class="dropify-infos-inner">
                                                            <p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner">نمونه تصویر محصول</span></p>
                                                            <p class="dropify-infos-message">با استفاده از درگ دراپ ویا کلیک برروی کادر زیر فایل را آپلود نمایید</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">اپلود فایل</h4>
                                            <p class="text-muted mb-3">فایل شما میتواند از نوع pdf یا docs باشد</p>
                                            <div class="dropify-wrapper">
                                                <div class="dropify-message"><span class="file-icon"></span>
                                                    <p>با استفاده از درگ دراپ ویا کلیک برروی کادر زیر فایل را آپلود نمایید.</p>
                                                    <p class="dropify-error">خطا</p>
                                                </div>
                                                <div class="dropify-loader"></div>
                                                <div class="dropify-errors-container">
                                                    <ul></ul>
                                                </div>
                                                <input type="file" id="input-file-now" class="dropify" name="attachment">
                                                <button type="button" class="dropify-clear">حذف</button>




                                                <div class="dropify-preview"><span class="dropify-render"></span>
                                                    <div class="dropify-infos">
                                                        <div class="dropify-infos-inner">
                                                            <p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>
                                                            <p class="dropify-infos-message">با استفاده از درگ دراپ ویا کلیک برروی کادر زیر فایل را آپلود نمایید</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end card-body-->
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

            <div class="modal fade bd-example-modal-xl" id="AddServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">افزودن خدمت  </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body modal-scroll">
                            <form action="{{ route('Product.storeService') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-0">
                                    <div class="input-group mt-3">
                                        <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">عنوان خدمت :</span></div>
                                        <input type="text" class="form-control inputfield" name="title" placeholder="مثال: تدریس خصوصی">
                                        <input name="type" type="hidden" value="service">

                                    </div>

                                    <div class="input-group mt-3">
                                        <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">توضیحات خدمت :</span></div>
                                        <input type="text" class="form-control inputfield" name="description" placeholder="مثال: توضیحات مختصری درمورد خدمت">
                                    </div>


                                    <div class="input-group mt-3">
                                        <div class="input-group-prepend"><span class="input-group-text bg-light inputfield min-width-140" id="basic-addon7">دسته بندی محصول :</span></div>
                                        @if (\Auth::user()->shop()->first()->categories()->get()->count() == 0)
                                        <select class="form-control inputfield" name="productCat_id" id="" disabled>
                                            <option style="font-family: BYekan!important;">دسته بندی وجود ندارد لطفا ابتدا دسته بندی ایجاد کنید</option>
                                        </select>
                                        <a href="{{ route('product-category.index') }}" class="align-self-center">
                                            <div class="input-group-append"><span class="h-50px input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن دسته بندی</span></div>
                                        </a>

                                        @else
                                        <select class="form-control inputfield" name="productCat_id" id="">
                                            <option style="font-family: BYekan!important;">انتخاب دسته بندی</option>
                                            @foreach($productCategories as $productCategory)
                                            <option style="font-family: BYekan!important;" value="{{ $productCategory->id }}">{{ $productCategory->name }}</option>
                                        </select>
                                        @endforeach
                                        @endif


                                    </div>
                                    <div class="input-group mt-3">
                                        <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">قیمت خدمت :</span></div>
                                        <input type="text" class="form-control inputfield" name="price" placeholder="مثال: 30000">
                                        <div class="input-group-append"><span class="input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"> ریال</span></div>

                                    </div>
                                    <div class="input-group mt-3">
                                        <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> موجودی خدمت :</span></div>
                                        <input type="text" class="form-control inputfield" name="price" placeholder=" مثال: 100">
                                        <div class="input-group-append"><span class="input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"> عدد</span></div>

                                    </div>
                                    <div class="input-group mt-3">
                                        <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات خدمت :</span></div>
                                        <input type="text" class="form-control inputfield" name="price" placeholder=" مثال: ضد آب ">
                                        <div class="input-group-append"><a href="#" class="test1"><span class="h-50px input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن امکانات
                                                     </span></a></div>

                                    </div>
                                    <div class="input-group mt-3 d-none feature_2">
                                        <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">امکانات خدمت :</span></div>
                                        <input type="text" class="form-control inputfield" name="price" placeholder=" مثال: ضد آب ">
                                        <div class="input-group-append"><a href="#" class="test2"><span class="h-50px input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن امکانات
                                                     </span></a></div>

                                    </div>
                                    <div class="input-group mt-3 d-none feature_3">
                                        <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات خدمت :</span></div>
                                        <input type="text" class="form-control inputfield" name="price" placeholder=" مثال: ضد آب ">
                                        <div class="input-group-append"><a href="#" class="test3"><span class="h-50px input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن امکانات
                                                     </span></a></div>

                                    </div>
                                    <div class="input-group mt-3 d-none feature_4">
                                        <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات خدمت :</span></div>
                                        <input type="text" class="form-control inputfield" name="price" placeholder=" مثال: ضد آب ">


                                    </div>

                                    <div class="input-group mt-3 bg-white">
                                        <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">امکانات ویژه محصول :</span></div>
                                        <div class="custom-control custom-switch switch-blue mr-5 p-3 col-2">
                                            <input type="checkbox" class="custom-control-input" id="support" name="support">
                                            <label class="custom-control-label iranyekan font-15" for="support">پشتیبانی</label>
                                        </div>
                                        <div class="custom-control custom-switch switch-blue mr-5 p-3 col-2">
                                            <input type="checkbox" class="custom-control-input" id="money_back" name="money_back">
                                            <label class="custom-control-label iranyekan font-15" for="money_back">بازگشت وجه</label>
                                        </div>
                                        <div class="custom-control custom-switch switch-blue mr-5 p-3 col-2">
                                            <input type="checkbox" class="custom-control-input" id="fast_sending" name="fast_sending">
                                            <label class="custom-control-label iranyekan font-15" for="fast_sending">ارسال سریع</label>
                                        </div>
                                        <div class="custom-control custom-switch switch-blue mr-5 p-3 col-2">
                                            <input type="checkbox" class="custom-control-input" id="secure_payment" name="secure_payment">
                                            <label class="custom-control-label iranyekan font-15" for="secure_payment">پرداخت امن</label>
                                        </div>

                                    </div>

                                    <div class="input-group mt-3 bg-white">
                                        <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">وضعیت خدمت :</span></div>
                                        <div class="btn-group btn-group-toggle col-10 p-1" data-toggle="buttons">
                                            <label class="btn btn-outline-success iranyekan mr-5">
                                                <input type="radio" name="enable" id="option1"> فعال
                                            </label>
                                            <label class="btn btn-outline-danger iranyekan mr-5">
                                                <input type="radio" id="option3"> غیرفعال
                                            </label>
                                        </div>
                                    </div>

                                    <div class="card mt-3">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">تصویر خدمت</h4>
                                            <div class="dropify-wrapper has-preview h-280px">
                                                <div class="dropify-message"><span class="file-icon"></span>
                                                    <p>با استفاده از درگ دراپ ویا کلیک برروی کادر زیر فایل را آپلود نمایید.</p>
                                                    <p class="dropify-error">خطا</p>
                                                </div>
                                                <div class="dropify-loader" style="display: none;"></div>
                                                <div class="dropify-errors-container">
                                                    <ul></ul>
                                                </div>
                                                <input name="image" type="file" id="input-file-now-custom-1" class="dropify" data-default-file="/dashboard/assets/images/teacher.jpg">
                                                <button type="button" class="dropify-clear">حذف</button>
                                                <div class="dropify-preview" style="display: block;"><span class="dropify-render"><img class="col-12" src="/dashboard/assets/images/teacher.jpg"></span>
                                                    <div class="dropify-infos">
                                                        <div class="dropify-infos-inner">
                                                            <p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner">نمونه تصویر از خدمت</span></p>
                                                            <p class="dropify-infos-message">با استفاده از درگ دراپ ویا کلیک برروی کادر زیر فایل را آپلود نمایید</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 405px;">نام
                                                محصول
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 148px;">دسته بندی</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 104px;">قیمت</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">وضعیت</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 123px;">تنظیمات</th>
                                        </tr>
                                    </thead>
                                    <tbody class="byekan">
                                        @foreach($products as $product)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1 w-25 "><img src="{{ $product->image }}" class="rounded" alt="" height="52" width="52">
                                                <p class="d-inline-block align-middle mb-0 mr-2"><a href="{{ route('product-list.show',$product->id) }}" class="d-inline-block align-middle mb-0 product-name">{{ $product->title }}</a>
                                            </td>
                                            <td>{{ $product->category()->first()->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            @if ($product->status == 1)
                                            <td><span class="badge badge-soft-success">
                                                    فعال
                                                </span></td>
                                            @else
                                            <td><span class="badge badge-soft-pink">
                                                    غیرفعال
                                                </span></td>

                                            @endif
                                            <td>

                                                <a><i class="far fa-edit text-info mr-1 button"></i>
                                                </a>

                                                <a href="" id="aaa" data-id="{{ $product->id }}"><i class="far fa-trash-alt text-danger"></i></a>

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
<script>
    $(document).ready(function() {
        $(".test1").click(function() {
            $(".feature_2").removeClass("d-none");
            $(".test1").addClass("d-none");
        });
    });
    $(document).ready(function() {
        $(".test2").click(function() {
            $(".feature_3").removeClass("d-none");
            $(".test2").addClass("d-none");

        });
    });
    $(document).ready(function() {
        $(".test3").click(function() {
            $(".feature_4").removeClass("d-none");
            $(".test3").addClass("d-none");

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

    $(document).on('click', '#aaa', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            type: "post",
            url: "{{url('/dashboard/product-list/delete')}}",
            data: {
                id: id,
                "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
            },
            success: function(data) {
                console.log(data)
                var url = document.location.origin + "/dashboard/product-list";
                location.href = url;
            }
        });
    });
</script>
@stop
