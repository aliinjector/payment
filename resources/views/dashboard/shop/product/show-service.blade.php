@extends('dashboard.layouts.master')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right">
                <ol style="direction: ltr" class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">داشبورد</a></li>
                    <li class="breadcrumb-item active">محصول خدماتی</li>
                </ol>
            </div>
            <h4 class="page-title">خدماتی</h4>
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
                            <h3 class="mt-0 header-title">محصول خدماتی</h3>
                            <div class="row">

                              <div class="form-group mb-0 col-12">
                                  <div class="input-group mt-3">
                                      <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">عنوان خدمت :</span></div>
                                      <input type="text" class="form-control inputfield" readonly value="{{ $product->title }}">
                                      <input name="type" type="hidden" value="service">

                                  </div>

                                  <div class="input-group mt-3">
                                      <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">توضیحات خدمت :</span></div>
                                      <textarea class="form-control" id="description" readonly>{{ $product->description }}</textarea>
                                  </div>

                                  <div class="input-group mt-3">
                                      <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light inputfield min-width-140" id="basic-addon7">دسته بندی محصول :</span></div>
                                      <input type="text" class="form-control inputfield" readonly value="{{ $product->productCategory->name }}">

                                  </div>

                                  <div class="input-group mt-3">
                                      <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light inputfield min-width-140" id="basic-addon7">برند محصول :</span></div>
                                      <input type="text" class="form-control inputfield"  readonly value="{{ $product->brand != null ? $product->brand->name : '' }}">

                                  </div>


                                  <div class="input-group mt-3">
                                      <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">قیمت خدمت :</span></div>
                                      <input type="text" class="form-control inputfield" readonly value="{{ $product->price }}">
                                      <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> ریال</span></div>

                                  </div>
                                  <div class="input-group mt-3">
                                      <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">قیمت بعد از تخفیف :</span></div>
                                      <input type="text" class="form-control inputfield" readonly value="{{ $product->off_price }}">
                                      <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> ریال</span></div>

                                  </div>

                                  <div class="input-group mt-3">
                                      <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> خصوصیات انتخابی :</span></div>
                                      @forelse ($product->specifications as $selectedSpecification)
                                        <input type="text" class="form-control inputfield" readonly value="{{ $selectedSpecification->name }}">
                                      @empty
                                        <input type="text" class="form-control inputfield" readonly value="">

                                      @endforelse
                                  </div>

                                  <div class="facility">
                                    <div class="input-group mt-3">
                                        <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> امکانات محصول :</span></div>
                                    @forelse( $product->facilities as $facility)

                                        <input type="text" class="form-control inputfield" readonly value="{{ $facility->name }}">
                                    @empty
                                      <input type="text" class="form-control inputfield" readonly value="">

                                    @endforelse
                                  </div>
                              </div>

                              <div class="input-group mt-3">
                                <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">برچسب های محصول :</span></div>
                                @forelse( $product->tags as $tag)
                                    <input type="text" class="form-control inputfield" readonly value="{{ $tag->name }}">
                                @empty
                                  <input type="text" class="form-control inputfield" readonly value="">
                                @endforelse

                            </div>

                                  <div class="input-group mt-3 bg-white">
                                      <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">امکانات ویژه خدمت :</span></div>
                                      <div class="custom-control custom-switch switch-blue mr-5 py-3">
                                          <input type="checkbox" class="custom-control-input" readonly @if($product->support == 'on') checked @endif>
                                              <label class="custom-control-label iranyekan font-15" for="supportServiceUpdate{{ $product->id }}">پشتیبانی</label>
                                      </div>
                                      <div class="custom-control custom-switch switch-blue mr-5 py-3">
                                          <input type="checkbox" class="custom-control-input" readonly @if($product->money_back == 'on') checked @endif>
                                              <label class="custom-control-label iranyekan font-15" for="money_backServiceUpdate{{ $product->id }}">بازگشت وجه
                                              </label>
                                      </div>
                                      <div class="custom-control custom-switch switch-blue mr-5 py-3">
                                          <input type="checkbox" class="custom-control-input" readonly @if($product->fast_sending == 'on') checked @endif>
                                              <label class="custom-control-label iranyekan font-15" for="fast_sendingServiceUpdate{{ $product->id }}">ارسال سریع
                                              </label>
                                      </div>
                                      <div class="custom-control custom-switch switch-blue mr-5 py-3">
                                          <input type="checkbox" class="custom-control-input" readonly @if($product->secure_payment == 'on') checked @endif>
                                              <label class="custom-control-label iranyekan font-15" for="secure_paymentServiceUpdate{{ $product->id }}">پرداخت امن
                                              </label>
                                      </div>

                                      <div class="custom-control custom-switch switch-blue mr-5 py-3">
                                          <input type="checkbox" class="custom-control-input" readonly @if($product->discount_status == 'enable') checked @endif>
                                              <label class="custom-control-label iranyekan font-15" for="discount_statusServiceUpdate{{ $product->id }}">قابلیت تخفیف
                                              </label>
                                      </div>

                                  </div>

                                  <div class="card mt-3 border">
                                      <div class="card-body">
                                          <h4 class="mt-0 header-title">تصویر خدمت</h4>
                                          <input  id="input-file-now" name="image" class="dropify" data-default-file="{{ $product->image['original'] }}">
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
        </form>
    </div>
</div>

@endsection


@section('pageScripts')
  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
  <script>
      CKEDITOR.replace('description', {
          language: 'fa',
          uiColor: '#F3F6F7',
      });
  </script>
  <script type="text/javascript">
  $(document).ready(function() {
  $(".dropify-clear").addClass("d-none");
  $(".dropify-infos").addClass("d-none");

  });

  </script>
@stop
