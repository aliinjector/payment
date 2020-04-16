@extends('dashboard.layouts.master')
@section('content')
  <link rel="stylesheet" href="{{ asset('/dashboard/assets/css/bootstrap-select.css') }}" />
  <link href="{{ asset('/dashboard/assets/css/jquery.tagsinput.min.css') }}" rel="stylesheet">
  <script src="{{ asset('/dashboard/assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/dashboard/assets/js/bootstrap-select.min.js') }}"></script>
  <link href="{{ asset('/dashboard/assets/css/admin-product-edit-file.css') }}" rel="stylesheet">
  <script type="text/javascript">
      $(document).ready(function() {
          $('.start-field-example-file').persianDatepicker({
              altField: '.start-alt-field-file',
              timePicker: {
                enabled: true,
                }
          });
          $('.expire-field-example-file').persianDatepicker({
              altField: '.expire-alt-field-file',
              timePicker: {
                enabled: true,
                }
          });
          $('.expire-alt-field-file').persianDatepicker({
            initialValue: false,
              formatter: function(unix) {
                  return unix;
              }
          });
          $('.start-alt-field-file').persianDatepicker({
            initialValue: false,
              formatter: function(unix) {
                  return unix;
              }
          });
      });
  </script>
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
      <form method="post" action="{{ route('product-list.update', ['id' => $product->id, 'shop' => $shop->english_name]) }}" enctype="multipart/form-data">
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
                                      <input type="text" class="form-control inputfield" name="title"  value="{{ old('title', $product->title) }}">
                                      <input name="type" type="hidden" value="file">

                                  </div>

                                  <div class="input-group mt-3">
                                      <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">توضیحات فایل :</span></div>
                                      <textarea class="form-control" id="description" name="description">{{ old('description', $product->description) }}</textarea>
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

                                  @foreach($product->features as $feature)
                                  <div class="input-group mt-3 old">
                                      <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ $feature->name }} :</span></div>
                                      <input type="text" class="form-control inputfield" name="value[{{ $feature->id }}]" value="{{ $feature->pivot->value }}">
                                  </div>
                                @endforeach
                                  <div class="border border-info input-group mt-3 pb-3 rounded d-none physicalFeatures">

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
                                      <input type="text" class="form-control inputfield" name="price"  value="{{ old('price', $product->price) }}">
                                      <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> تومان</span></div>

                                  </div>
                                  <div class="input-group mt-3">
                                      <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">قیمت بعد از تخفیف:</span></div>
                                      <input type="text" class="form-control inputfield" name="off_price"  value="{{ old('off_price', $product->off_price) }}">
                                      <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> تومان</span></div>
                                  </div>
                                  <div class="form-group row">
                                      <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">
                                          <button type="button" class="btn btn-outline-pink btn-sm mt-2" data-toggle="collapse" data-target="#timing-file">اختصاص بازه زمانی</button>
                                      </label>
                                      <div class="col-sm-10">
                                          <div id="timing-file" class="collapse mt-2">
                                            <div class="input-group mt-3">
                                                <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-voucher.addModalItem6') }}:</span></div>
                                                <input type="hidden" class="start-alt-field-file col h-50px" name="off_price_started_at" />
                                                <input class="start-field-example-file col h-50px" name="" value="{{ $product->off_price_started_at }}" />

                                            </div>
                                            <div class="input-group mt-3">
                                                <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-voucher.addModalItem7') }}:</span></div>
                                                <input type="hidden" class="expire-alt-field-file col h-50px" name="off_price_expired_at" />
                                                <input class="expire-field-example-file col h-50px" name=""  value="{{ $product->off_price_expired_at }}" />
                                            </div>

                                          </div>

                                      </div>
                                  </div>


                                  <div class="input-group mt-3">
                                      <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">برچسب های محصول :</span></div>
                                      <input value="{{ $tags }}" type="text" id="input-tags" name="tags" class="form-control" />

                                  </div>
                                  @forelse( $product->facilities as $facility)
                                    <div class="input-group mt-3">
                                        <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                        <input type="text" class="form-control inputfield" name="facility[{{ $facility->id }}]" value="{{ $facility->name }}">
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
                                      <div class="custom-control custom-switch switch-blue mr-5 py-3">
                                          <input type="checkbox" class="custom-control-input" id="supportFileUpdate{{ $product->id }}" name="support" @if($product->support == 'on') checked @endif>
                                              <label class="custom-control-label iranyekan font-15" for="supportFileUpdate{{ $product->id }}">پشتیبانی</label>
                                      </div>
                                      <div class="custom-control custom-switch switch-blue mr-5 py-3">
                                          <input type="checkbox" class="custom-control-input" id="money_backFileUpdate{{ $product->id }}" name="money_back" @if($product->money_back == 'on') checked @endif>
                                              <label class="custom-control-label iranyekan font-15" for="money_backFileUpdate{{ $product->id }}">بازگشت وجه
                                              </label>
                                      </div>
                                      <div class="custom-control custom-switch switch-blue mr-5 py-3">
                                          <input type="checkbox" class="custom-control-input" id="fast_sendingFileUpdate{{ $product->id }}" name="fast_sending" @if($product->fast_sending == 'on') checked @endif>
                                              <label class="custom-control-label iranyekan font-15" for="fast_sendingFileUpdate{{ $product->id }}">ارسال سریع
                                              </label>
                                      </div>
                                      <div class="custom-control custom-switch switch-blue mr-5 py-3">
                                          <input type="checkbox" class="custom-control-input" id="secure_paymentFileUpdate{{ $product->id }}" name="secure_payment" @if($product->secure_payment == 'on') checked @endif>
                                              <label class="custom-control-label iranyekan font-15" for="secure_paymentFileUpdate{{ $product->id }}">پرداخت امن
                                              </label>
                                      </div>

                                      <div class="custom-control custom-switch switch-blue mr-5 py-3">
                                          <input type="checkbox" class="custom-control-input" id="discount_statusFileUpdate{{ $product->id }}" name="discount_status" @if($product->discount_status == 'enable') checked @endif>
                                              <label class="custom-control-label iranyekan font-15" for="discount_statusFileUpdate{{ $product->id }}">قابلیت اعمال شدن کد تخفیف
                                              </label>
                                      </div>


                                  </div>

                                  <div class="card mt-3">
                                      <div class="card-body">
                                          <h4 class="mt-0 header-title">تصویر محصول</h4>
                                          <p class="text-danger my-1">حداقل ابعاد : 300px × 300px</p>
                                          <p class="text-danger">حداکثر ابعاد : 1000px × 1000px</p>
                                          <a class="mr-2 font-15" href="" id="icon-delete" title="حذف آیکون" data-name="{{ $product->name }}" data-id="{{ $product->id }}"><i class="far fa-trash-alt text-danger font-18 pl-2"></i>حذف</a>

                                          <input type="file" id="input-file-now" name="image" class="dropify" data-default-file="{{ $product->image['original'] }}">
                                      </div>

                                  </div>

                                  <div class="card">
                                      <div class="card-body">
                                          <h4 class="mt-0 header-title">اپلود فایل</h4>
                                          <p class="text-muted mb-3">فایل شما میتواند از نوع pdf یا docs باشد
                                          </p>
                                          @php
                                          if($product->attachment != null){
                                            $fileName = explode("_", $product->attachment, 3);
                                          }else {
                                            $fileName = null;
                                          }
                                          @endphp

                                          <input type="file" id="input-file-now" name="attachment" class="dropify" data-default-file="{{ $product->attachment }}">
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
  <script src="{{ asset('/dashboard/assets/js/jquery.tagsinput.min.js') }}"></script>
  <script src="{{ asset('/dashboard/assets/js/feature.js') }}"></script>
  <script src="{{ asset('/dashboard/assets/js/admin-product-file-edit.js') }}"></script>
  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
  <script src="/dashboard/assets/js/persian-date.js"></script>
  <script src="/dashboard/assets/js/persian-datepicker.js"></script>
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
