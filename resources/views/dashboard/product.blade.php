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
                                <h5 class="modal-title" id="exampleModalLabel">افزودن کالای جدید</h5>
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
                                            <input type="text" value="{{ old('title') }}" class="form-control inputfield" name="title" placeholder="مثال: جاروبرقی">
                                            <input name="type" type="hidden" value="product">
                                        </div>

                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">توضیحات محصول :</span></div>
                                            <input type="text" value="{{ old('description') }}" class="form-control inputfield" name="description" placeholder="مثال: توضیحات مختصری درمورد محصول">
                                        </div>


                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light inputfield min-width-140" id="basic-addon7">دسته بندی محصول :</span></div>

                                            <select class="form-control inputfield" name="productCat_id" id="">
                                                <option style="font-family: BYekan!important;">انتخاب دسته بندی</option>
                                                <option style="font-family: BYekan!important;" value="{{ $productCategory->id }}">{{ $productCategory->name }}</option>
                                            </select>

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">قیمت محصول :</span></div>
                                            <input type="text" value="{{ old('price') }}" class="form-control inputfield" name="price" placeholder="مثال: 30000">
                                            <div class="input-group-append"><span class="input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"> ریال</span></div>

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">موجودی در انبار :</span></div>
                                            <input type="text" value="{{ old('amount') }}" class="form-control inputfield" name="amount" placeholder="مثال: 3">
                                            <div class="input-group-append"><span class="input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8">عدد</span></div>

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">وزن محصول :</span></div>
                                            <input type="text" value="{{ old('weight') }}" class="form-control inputfield" name="weight" placeholder="2مثال: 30">
                                            <div class="input-group-append"><span class="input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8">گرم</span></div>

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">رنگ محصول :</span></div>
                                            <input class="form-control" type="color" value="#122272" id="example-color-input" name="color">
                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">وضعیت محصول :</span></div>
                                            <div class="btn-group btn-group-toggle col-10" data-toggle="buttons">
                                                <label class="btn btn-outline-success active iranyekan mr-5">
                                                    <input type="radio" name="enable" id="option1" checked=""> فعال
                                                </label>
                                                <label class="btn btn-outline-danger iranyekan mr-5">
                                                    <input type="radio" name="disable" id="option3"> غیرفعال
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
                                <h5 class="modal-title" id="exampleModalLabel">افزودن فایل جدید</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body modal-scroll">
                                <form action="{{ route('card.store') }}" method="post" class="form-horizontal">
                                    @csrf
                                    <div class="form-group mb-0">
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">عنوان فایل :</span></div>
                                            <input type="text" value="{{ old('number') }}" class="form-control inputfield" name="number" placeholder="مثال: کتاب آموزش زبان">
                                            <input name="type" type="hidden" value="file">

                                        </div>

                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">توضیحات فایل :</span></div>
                                            <input type="text" value="{{ old('number') }}" class="form-control inputfield" name="number" placeholder="مثال: توضیحات مختصری درمورد فایل">
                                        </div>


                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light inputfield min-width-140" id="basic-addon7">دسته بندی فایل :</span></div>

                                            <select class="form-control inputfield" name="month" id="">
                                                <option style="font-family: BYekan!important;">انتخاب دسته بندی</option>
                                                <option style="font-family: BYekan!important;" value="1">1</option>
                                                <option style="font-family: BYekan!important;" value="2">2</option>
                                                <option style="font-family: BYekan!important;" value="3">3</option>
                                                <option style="font-family: BYekan!important;" value="4">4</option>
                                                <option style="font-family: BYekan!important;" value="5">5</option>
                                                <option style="font-family: BYekan!important;" value="6">6</option>
                                                <option style="font-family: BYekan!important;" value="7">7</option>
                                                <option style="font-family: BYekan!important;" value="8">8</option>
                                                <option style="font-family: BYekan!important;" value="9">9</option>
                                                <option style="font-family: BYekan!important;" value="10">10</option>
                                                <option style="font-family: BYekan!important;" value="11">11</option>
                                                <option style="font-family: BYekan!important;" value="12">12</option>
                                            </select>

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">قیمت فایل :</span></div>
                                            <input type="text" value="{{ old('number') }}" class="form-control inputfield" name="number" placeholder="مثال: 30000">
                                            <div class="input-group-append"><span class="input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"> ریال</span></div>

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">حجم فایل :</span></div>
                                            <input type="text" value="{{ old('number') }}" class="form-control inputfield" name="number" placeholder="مثال: 45">
                                            <div class="input-group-append"><span class="input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8">مگابایت</span></div>

                                        </div>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">وضعیت محصول :</span></div>
                                            <div class="btn-group btn-group-toggle col-10" data-toggle="buttons">
                                                <label class="btn btn-outline-success active iranyekan mr-5">
                                                    <input type="radio" name="options" id="option1" checked=""> فعال
                                                </label>
                                                <label class="btn btn-outline-danger iranyekan mr-5">
                                                    <input type="radio" name="options" id="option3"> غیرفعال
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
                                                    <input name="logo" type="file" id="input-file-now-custom-1" class="dropify" data-default-file="/dashboard/assets/images/BrandNameHere.jpg">
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
                                                    <input type="file" id="input-file-now" class="dropify">
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
                              <h5 class="modal-title" id="exampleModalLabel">افزودن خدمت جدید</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body modal-scroll">
                              <form action="{{ route('card.store') }}" method="post" class="form-horizontal">
                                  @csrf
                                  <div class="form-group mb-0">
                                      <div class="input-group mt-3">
                                          <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">عنوان خدمت :</span></div>
                                          <input type="text" value="{{ old('number') }}" class="form-control inputfield" name="number" placeholder="مثال: تدریس خصوصی">
                                          <input name="type" type="hidden" value="service">

                                      </div>

                                      <div class="input-group mt-3">
                                          <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">توضیحات خدمت :</span></div>
                                          <input type="text" value="{{ old('number') }}" class="form-control inputfield" name="number" placeholder="مثال: توضیحات مختصری درمورد خدمت">
                                      </div>


                                      <div class="input-group mt-3">
                                          <div class="input-group-prepend"><span class="input-group-text bg-light inputfield min-width-140" id="basic-addon7">دسته بندی خدمت :</span></div>

                                          <select class="form-control inputfield" name="month" id="">
                                              <option style="font-family: BYekan!important;">انتخاب دسته بندی</option>
                                              <option style="font-family: BYekan!important;" value="1">1</option>
                                              <option style="font-family: BYekan!important;" value="2">2</option>
                                              <option style="font-family: BYekan!important;" value="3">3</option>
                                              <option style="font-family: BYekan!important;" value="4">4</option>
                                              <option style="font-family: BYekan!important;" value="5">5</option>
                                              <option style="font-family: BYekan!important;" value="6">6</option>
                                              <option style="font-family: BYekan!important;" value="7">7</option>
                                              <option style="font-family: BYekan!important;" value="8">8</option>
                                              <option style="font-family: BYekan!important;" value="9">9</option>
                                              <option style="font-family: BYekan!important;" value="10">10</option>
                                              <option style="font-family: BYekan!important;" value="11">11</option>
                                              <option style="font-family: BYekan!important;" value="12">12</option>
                                          </select>

                                      </div>
                                      <div class="input-group mt-3">
                                          <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">قیمت خدمت :</span></div>
                                          <input type="text" value="{{ old('number') }}" class="form-control inputfield" name="number" placeholder="مثال: 30000">
                                          <div class="input-group-append"><span class="input-group-text bg-primary text-white font-weight-bold iranyekan" id="basic-addon8"> ریال</span></div>

                                      </div>
                                      <div class="input-group mt-3">
                                          <div class="input-group-prepend"><span class="input-group-text bg-light min-width-140" id="basic-addon7">وضعیت خدمت :</span></div>
                                          <div class="btn-group btn-group-toggle col-10" data-toggle="buttons">
                                              <label class="btn btn-outline-success active iranyekan mr-5">
                                                  <input type="radio" name="options" id="option1" checked=""> فعال
                                              </label>
                                              <label class="btn btn-outline-danger iranyekan mr-5">
                                                  <input type="radio" name="options" id="option3"> غیرفعال
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
                                                  <input name="logo" type="file" id="input-file-now-custom-1" class="dropify" data-default-file="/dashboard/assets/images/teacher.jpg">
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
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 405px;">نام محصول
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending" style="width: 148px;">دسته بندی</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 104px;">قیمت</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 115px;">وضعیت</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 123px;">تنظیمات</th>
                                            </tr>
                                        </thead>
                                        <tbody class="byekan">
                                            <tr role="row" class="odd">
                                                <td class="sorting_1 w-25 "><img src="/dashboard/assets/images/product2.png" class="rounded" alt="" height="52">
                                                    <p class="d-inline-block align-middle mb-0 mr-2"><a href="/dashboard/product-detail" class="d-inline-block align-middle mb-0 product-name">محصول شماره 1</a>
                                                </td>
                                                <td>ورزشی</td>
                                                <td>39تومان</td>
                                                <td><span class="badge badge-soft-pink">غیرفعال</span></td>
                                                <td><a href="/dashboard/product-detail"><i class="far fa-edit text-info mr-1"></i></a> <a href="#"><i class="far fa-trash-alt text-danger"></i></a></td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1"><img src="/dashboard/assets/images/product2.png" class="rounded" alt="" height="52">
                                                    <p class="d-inline-block align-middle mb-0  mr-2"><a href="/dashboard/product-detail" class="d-inline-block align-middle mb-0 product-name">محصول شماره 2</a>
                                                </td>
                                                <td>الکتریکی</td>
                                                <td>39تومان</td>
                                                <td><span class="badge badge-soft-success">فعال</span></td>
                                                <td><a href="#"><i class="far fa-edit text-info mr-1"></i></a> <a href="#"><i class="far fa-trash-alt text-danger"></i></a></td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"><img src="/dashboard/assets/images/product2.png" class="rounded" alt="" height="52">
                                                    <p class="d-inline-block align-middle mb-0  mr-2"><a href="/dashboard/product-detail" class="d-inline-block align-middle mb-0 product-name">محصول شماره 3</a>
                                                </td>
                                                <td>ورزشی</td>
                                                <td>39تومان</td>
                                                <td><span class="badge badge-soft-pink">غیرفعال</span></td>
                                                <td><a href="#"><i class="far fa-edit text-info mr-1"></i></a> <a href="#"><i class="far fa-trash-alt text-danger"></i></a></td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1"><img src="/dashboard/assets/images/product2.png" class="rounded" alt="" height="52">
                                                    <p class="d-inline-block align-middle mb-0 mr-2"><a href="/dashboard/product-detail" class="d-inline-block align-middle mb-0 product-name">محصول شماره 4</a>
                                                </td>
                                                <td>پوشاک</td>
                                                <td>39تومان</td>
                                                <td><span class="badge badge-soft-success">فعال</span></td>
                                                <td><a href="#"><i class="far fa-edit text-info mr-1"></i></a> <a href="#"><i class="far fa-trash-alt text-danger"></i></a></td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"><img src="/dashboard/assets/images/product2.png" class="rounded" alt="" height="52">
                                                    <p class="d-inline-block align-middle mb-0 mr-2"><a href="/dashboard/product-detail" class="d-inline-block align-middle mb-0 product-name">محصول شماره 5</a>
                                                </td>
                                                <td>ورزشی</td>
                                                <td>39تومان</td>
                                                <td><span class="badge badge-soft-success">فعال</span></td>

                                                <td><a href="#"><i class="far fa-edit text-info mr-1"></i></a> <a href="#"><i class="far fa-trash-alt text-danger"></i></a></td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1"><img src="/dashboard/assets/images/product2.png" class="rounded" alt="" height="52">
                                                    <p class="d-inline-block align-middle mb-0 mr-2"><a href="/dashboard/product-detail" class="d-inline-block align-middle mb-0 product-name">محصول شماره 6</a>
                                                </td>
                                                <td>خوراک</td>
                                                <td>39تومان</td>
                                                <td><span class="badge badge-soft-pink">غیرفعال</span></td>

                                                <td><a href="#"><i class="far fa-edit text-info mr-1"></i></a> <a href="#"><i class="far fa-trash-alt text-danger"></i></a></td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"><img src="/dashboard/assets/images/product2.png" class="rounded" alt="" height="52">
                                                    <p class="d-inline-block align-middle mb-0 mr-2"><a href="/dashboard/product-detail" class="d-inline-block align-middle mb-0 product-name">محصول شماره 7</a>
                                                </td>
                                                <td>الکتریکی</td>
                                                <td>39تومان</td>
                                                <td><span class="badge badge-soft-success">فعال</span></td>

                                                <td><a href="#"><i class="far fa-edit text-info mr-1"></i></a> <a href="#"><i class="far fa-trash-alt text-danger"></i></a></td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1"><img src="/dashboard/assets/images/product2.png" class="rounded" alt="" height="52">
                                                    <p class="d-inline-block align-middle mb-0 mr-2"><a href="/dashboard/product-detail" class="d-inline-block align-middle mb-0 product-name">محصول شماره 8</a>
                                                </td>
                                                <td>ورزشی</td>
                                                <td>39تومان</td>
                                                <td><span class="badge badge-soft-success">فعال</span></td>

                                                <td><a href="#"><i class="far fa-edit text-info mr-1"></i></a> <a href="#"><i class="far fa-trash-alt text-danger"></i></a></td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"><img src="/dashboard/assets/images/product2.png" class="rounded" alt="" height="52">
                                                    <p class="d-inline-block align-middle mb-0 mr-2"><a href="/dashboard/product-detail" class="d-inline-block align-middle mb-0 product-name">محصول شماره 9</a>
                                                </td>
                                                <td>پوشاک</td>
                                                <td>39تومان</td>
                                                <td><span class="badge badge-soft-success">فعال</span></td>

                                                <td><a href="#"><i class="far fa-edit text-info mr-1"></i></a> <a href="#"><i class="far fa-trash-alt text-danger"></i></a></td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="sorting_1"><img src="/dashboard/assets/images/product2.png" class="rounded" alt="" height="52">
                                                    <p class="d-inline-block align-middle mb-0 mr-2"><a href="/dashboard/product-detail" class="d-inline-block align-middle mb-0 product-name">محصول شماره 10</a>
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
