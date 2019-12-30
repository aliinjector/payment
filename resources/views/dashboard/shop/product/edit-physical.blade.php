@extends('dashboard.layouts.master')

@section('content')
  <link href="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <link href="/dashboard/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <link href="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
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
        <form method="post" action="{{ route('product-list.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mt-0 header-title">ویرایش محصول فیزیکی</h3>
                            <p class="text-muted mb-3">در این بخش میتوانید محصول فیزیکی فروشگاه خود را ویرایش کنید.</p><br>

                            <div class="row">
                                <div class="form-group mb-0 col-12">
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
                                            <option style="font-family: BYekan!important;" value="{{ $product->productCategory->id }}">{{ $product->productCategory->name }}
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
                                        <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">حداقل موجودی در انبار :</span></div>
                                        <input type="text" class="form-control inputfield" name="min_amount" placeholder="مثال: 3" value="{{ $product->min_amount }}">
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
                                        <div class="input-group-append"><a class="test1 icon-hover"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                    امکانات
                                                </span></a></div>

                                    </div>
                                    <div class="input-group mt-3 @if($product->feature_2 == null) d-none @endif feature_2">
                                        <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">امکانات محصول :</span></div>
                                        <input type="text" class="form-control inputfield" name="feature_2" placeholder=" مثال: ضد آب " value="{{ $product->feature_2 }}">
                                        <div class="input-group-append"><a class="test2 icon-hover"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                    امکانات
                                                </span></a></div>

                                    </div>
                                    <div class="input-group mt-3 @if($product->feature_3 == null) d-none @endif feature_3">
                                        <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                        <input type="text" class="form-control inputfield" name="feature_3" placeholder=" مثال: ضد آب " value="{{ $product->feature_3 }}">
                                        <div class="input-group-append"><a class="test3 icon-hover"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                    امکانات
                                                </span></a></div>

                                    </div>
                                    <div class="input-group mt-3 @if($product->feature_4 == null) d-none @endif feature_4">
                                        <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                        <input type="text" class="form-control inputfield" name="feature_4" placeholder=" مثال: ضد آب " value="{{ $product->feature_4 }}">
                                        <div class="input-group-append"><a class="test4 icon-hover"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                    امکانات
                                                </span></a></div>

                                    </div>
                                    <div class="input-group mt-3 @if($product->feature_5 == null) d-none @endif feature_5">
                                        <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                        <input type="text" class="form-control inputfield" name="feature_5" placeholder=" مثال: ضد آب " value="{{ $product->feature_5 }}">
                                        <div class="input-group-append"><a class="test5 icon-hover"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                    امکانات
                                                </span></a></div>

                                    </div>
                                    <div class="input-group mt-3 @if($product->feature_6 == null) d-none @endif feature_6">
                                        <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                        <input type="text" class="form-control inputfield" name="feature_6" placeholder=" مثال: ضد آب " value="{{ $product->feature_6 }}">
                                        <div class="input-group-append"><a class="test6 icon-hover"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                    امکانات
                                                </span></a></div>

                                    </div>
                                    <div class="input-group mt-3 @if($product->feature_7 == null) d-none @endif feature_7">
                                        <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                        <input type="text" class="form-control inputfield" name="feature_7" placeholder=" مثال: ضد آب " value="{{ $product->feature_7 }}">
                                        <div class="input-group-append"><a class="test7 icon-hover"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                    امکانات
                                                </span></a></div>

                                    </div>
                                    <div class="input-group mt-3 @if($product->feature_8 == null) d-none @endif feature_8">
                                        <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                        <input type="text" class="form-control inputfield" name="feature_8" placeholder=" مثال: ضد آب " value="{{ $product->feature_8 }}">
                                        <div class="input-group-append"><a class="test8 icon-hover"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                    امکانات
                                                </span></a></div>

                                    </div>
                                  <div class="input-group mt-3 @if($product->feature_9 == null) d-none @endif feature_9">
                                      <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                      <input type="text" class="form-control inputfield" name="feature_9" placeholder=" مثال: ضد آب " value="{{ $product->feature_9 }}">
                                      <div class="input-group-append"><a class="test9 icon-hover"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
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

                            </div>

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
  <script src="/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="/dashboard/assets/plugins/datatables/dataTables.buttons.min.js"></script>
  <script src="/dashboard/assets/plugins/datatables/dataTables.responsive.min.js"></script>
  <script src="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
  <script src="/dashboard/assets/plugins/datatables/jquery.datatable.init.js"></script>
  <script src="/dashboard/assets/plugins/dropify/js/dropify.min.js"></script>
  <script src="/dashboard/assets/pages/jquery.form-upload.init.js"></script>
  <script type="text/javascript">
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
  </script>
  <script>
      $(window).on("load", function() {
          $('.show-tick').addClass("col-lg-10");
          $('.filter-option-inner-inner').addClass("d-flex");
          $('.bs-placeholder').removeClass("btn-light");
          $('.show-tick').addClass("p-1");
          $('.show-tick').addClass("border");
          if ($(".filter-option-inner-inner").text() == "Nothing selected") {
            $(".filter-option-inner-inner").text("لطفا رنگ محصول را انتخاب کنید");
          }

      });
  </script>
@stop
