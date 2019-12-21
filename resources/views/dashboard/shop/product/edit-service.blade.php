@extends('dashboard.layouts.master')
@section('content')
<link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right">
                <ol style="direction: ltr" class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">داشبورد</a></li>
                    <li class="breadcrumb-item active">ویژگی های دسته بندی ها</li>
                </ol>
            </div>
            <h4 class="page-title">ویرایش ویژگی ها</h4>
        </div>
        <!--end page-title-box-->
    </div>
    <!--end col-->
</div>
@include('dashboard.layouts.errors')




<div class="tab-content">

    <div class="tab-pane fade in show active" id="info" role="tabpanel">
        <form method="post" action="{{ route('feature.update', $productCategory->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                {{-- <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mt-0 header-title">ویرایش ویژگی ها</h3>
                            <p class="text-muted mb-3">در این بخش میتوانید ویژگی های دسته بندی مورد نظر خود را ویرایش نمایید.</p><br>
                            <div class="row">


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
                                                          <select class="form-control inputfield" name="productCat_id" id="">
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
                                                          <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light inputfield min-width-140" id="basic-addon7">برند محصول :</span></div>
                                                          <select class="form-control inputfield" name="brand_id" id="">
                                                              <option style="font-family: BYekan!important;" value="null">فاقد برند
                                                              </option>
                                                              @foreach($brands as $brand)
                                                              <option {{ $brand->id == $product->brand_id ? 'selected' : ''}} value="{{ $brand->id }}">{{ $brand->name }}
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

                                                          <select class="selectpicker" multiple data-live-search="true" name="color[]">
                                                              @foreach($colors as $color)
                                                              <option @if($product->colors->count() != 0) @foreach($product->colors as $selectedColor) {{ $color->id == $selectedColor->id ? 'selected' : ''}}
                                                                      @endforeach
                                                                      @endif value="{{ $color->id }}">{{ $color->name }}</option>
                                                              @endforeach
                                                          </select>
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
                                                              <a class="mr-2 font-15" href="" id="icon-delete" title="حذف آیکون" data-name="{{ $product->name }}" data-id="{{ $product->id }}"><i class="far fa-trash-alt text-danger font-18 pl-2"></i>حذف</a>

                                                              <input type="file" id="input-file-now" name="image" class="dropify" data-default-file="{{ $product->image['original'] }}">
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
                                                          <select class="form-control inputfield" name="productCat_id" id="">
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
                                                          <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light inputfield min-width-140" id="basic-addon7">برند محصول :</span></div>
                                                          <select class="form-control inputfield" name="brand_id" id="">
                                                              <option style="font-family: BYekan!important;" value="null">فاقد برند
                                                              </option>
                                                              @foreach($brands as $brand)
                                                              <option {{ $brand->id == $product->brand_id ? 'selected' : ''}} value="{{ $brand->id }}">{{ $brand->name }}
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
                                                              <a class="mr-2 font-15" href="" id="icon-delete" title="حذف آیکون" data-name="{{ $product->name }}" data-id="{{ $product->id }}"><i class="far fa-trash-alt text-danger font-18 pl-2"></i>حذف</a>

                                                              <input type="file" id="input-file-now" name="attachment" class="dropify" data-default-file="{{ $product->image['original'] }}">
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
                                                          <select class="form-control inputfield" name="productCat_id" id="">
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
                                                          <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light inputfield min-width-140" id="basic-addon7">برند محصول :</span></div>
                                                          <select class="form-control inputfield" name="brand_id" id="">
                                                              <option style="font-family: BYekan!important;" value="null">فاقد برند
                                                              </option>
                                                              @foreach($brands as $brand)
                                                              <option {{ $brand->id == $product->brand_id ? 'selected' : ''}} value="{{ $brand->id }}">{{ $brand->name }}
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
                                                              <a class="mr-2 font-15" href="" id="icon-delete" title="حذف آیکون" data-name="{{ $product->name }}" data-id="{{ $product->id }}"><i class="far fa-trash-alt text-danger font-18 pl-2"></i>حذف</a>

                                                              <input type="file" id="input-file-now" name="image" class="dropify" data-default-file="{{ $product->image['original'] }}">
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
                              @endforeach --}}



                            </div>

                        </div>

                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->

                <!--end col-->
            </div>


            <div class="text-right mb-3">
                <button data-toggle="modal" data-target="#AddWalletModal" type="submit" class="btn btn-success px-5 py-2  iranyekan rounded ">ثبت تغییرات</button><br>
            </div>
        </form>
    </div>
</div>

@endsection


@section('pageScripts')
<script src="/dashboard/assets/plugins/dropify/js/dropify.min.js"></script>
<script src="/dashboard/assets/pages/jquery.form-upload.init.js"></script>
@stop
