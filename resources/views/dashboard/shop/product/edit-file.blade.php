@extends('dashboard.layouts.master')
@section('content')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.css" rel="stylesheet">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  <style media="screen">
      #input-tags_tagsinput {
          width: 88% !important;
          height: 50px !important;
          min-height: 50px !important;
          font-size: 13px;
          border: 1px solid #e8ebf3;
          height: calc(2.3rem + 2px);
          color: #2f5275;
      }

      #input-tags_addTag {
          float: right !important;
      }
  </style><div class="row">
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
                            <h3 class="mt-0 header-title">ویرایش ویژگی ها</h3>
                            <p class="text-muted mb-3">در این بخش میتوانید ویژگی های دسته بندی مورد نظر خود را ویرایش نمایید.</p><br>
                            <div class="row">

                              <div class="form-group mb-0 col-12">
                                  <div class="input-group mt-3">
                                      <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">عنوان فایل :</span></div>
                                      <input type="text" class="form-control inputfield" name="title" placeholder="مثال: کتاب آموزش زبان" value="{{ $product->title }}">
                                      <input name="type" type="hidden" value="file">

                                  </div>

                                  <div class="input-group mt-3">
                                      <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">توضیحات فایل :</span></div>
                                      <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
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
                                      <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">برچسب های محصول :</span></div>
                                      <input value="{{ $tags }}" type="text" id="input-tags" name="tags" class="form-control" />

                                  </div>
                                  @forelse( $product->facilities as $facility)
                                    <div class="input-group mt-3">
                                        <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                        <input type="text" class="form-control inputfield" name="facility[]" value="{{ $facility->name }}">
                                    </div>
                                  @empty
                                  @endforelse
                                  <div class="facility">
                                <div class="input-group mt-3">
                                    <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                    <input type="text" class="form-control inputfield" name="facility[]" value="">
                                    <div class="input-group-append"><a class="addFacility icon-hover"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i> افزودن
                                                امکانات
                                            </span></a></div>
                                </div>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.js"></script>
  <script src="{{ asset('/dashboard/assets/js/feature.js') }}"></script>
  <script src="{{ asset('/dashboard/assets/js/admin-product-file-edit.js') }}"></script>
  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
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
              <script>
                  CKEDITOR.replace('description', {
                      language: 'fa',
                      uiColor: '#F3F6F7'
                  });
              </script>
              <script>
  $(document).ready(function() {
     $(".addFacility").click(function() {
         $("div.facility").append('<div class="input-group mt-3"><div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> {{ __('dashboard-shop-product-index.addMahsoolFizikiItem11') }} :</span></div><input value="{{ old('facility[]') }}" type="text" class="form-control inputfield" name="facility[]" placeholder="{{ __('dashboard-shop-product-index.addMahsoolFizikiItem11ex') }} "></div>');
     });
     });
  </script>

@stop
