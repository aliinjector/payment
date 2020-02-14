@extends('dashboard.layouts.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<link href="{{ asset('/dashboard/assets/css/admin-product-index.css') }}" rel="stylesheet">
<div class="page-content">
<div class="container-fluid">
   <!-- Page-Title -->
   <div class="row">
      <div class="col-sm-12">
         <div class="page-title-box">
            <div class="float-right">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item ">{{ __('dashboard-shop-product-index.leftCurrentPage1') }}</li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('dashboard-shop-product-index.leftCurrentPage2') }}</a></li>
               </ol>
            </div>
            <h4 class="page-title">{{ __('dashboard-shop-product-index.pageTitle') }}</h4>
         </div>
         @include('dashboard.layouts.errors')
         <div class="text-right">
            <a href="#" data-toggle="modal" data-target="#AddSelectModal" class="btn btn-primary text-white d-inline-block text-right mb-3 font-weight-bold rounded"><i
               class="fa fa-plus mr-2"></i>{{ __('dashboard-shop-product-index.addBtn') }}</a>
         </div>
         <div class="modal fade bd-example-modal-xl" id="AddSelectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title font-18" id="exampleModalLabel">{{ __('dashboard-shop-product-index.addTitle') }}</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                        @csrf
                        <div class="form-group mb-0">
                           <a data-dismiss="modal" data-toggle="modal" href="#AddProductModal">
                              <div class="input-group mt-3 border rounded">
                                 <div class="p-4">
                                    <span class="sett-card-icon set-icon-purple"><i class="fa fa-boxes f-em5"></i></span>
                                 </div>
                                 <div class="">
                                    <p class="f-em1-5 m-5 mr-4 iranyekan">{{ __('dashboard-shop-product-index.addItem1') }}</p>
                                 </div>
                              </div>
                           </a>
                           <a data-dismiss="modal" data-toggle="modal" href="#AddFileModal">
                              <div class="input-group mt-3 border rounded">
                                 <div class="p-4">
                                    <span class="sett-card-icon set-icon-purple"><i class="fa fa-download f-em5"></i></span>
                                 </div>
                                 <div class="">
                                    <p class="f-em1-5 m-5 mr-4 iranyekan">{{ __('dashboard-shop-product-index.addItem2') }} </p>
                                 </div>
                              </div>
                           </a>
                           <a data-dismiss="modal" data-toggle="modal" href="#AddServiceModal">
                              <div class="input-group mt-3 border rounded">
                                 <div class="p-4">
                                    <span class="sett-card-icon set-icon-purple"><i class="fa fa-user-friends f-em5"></i></span>
                                 </div>
                                 <div class="">
                                    <p class="f-em1-5 m-5 mr-4 iranyekan">{{ __('dashboard-shop-product-index.addItem3') }}</p>
                                 </div>
                              </div>
                           </a>
                        </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-danger rounded" data-dismiss="modal">{{ __('dashboard-shop-product-index.addEnseraf') }}
                  </button>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal fade bd-example-modal-xl " id="AddProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard-shop-product-index.addMahsoolFizikiTitle') }} </h5>
                     <button type="button" class="close rounded" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body modal-scroll" style="background-color:#fbfcfd">
                     <form action="{{ route('Product-list.storeProduct', ['shop' => $shop->english_name]) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-0">
                           <div class="input-group mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i
                                 class="fas fa-star required-star mr-1"></i>{{ __('dashboard-shop-product-index.addMahsoolFizikiItem1') }} :</span></div>
                              <input type="text" class="form-control inputfield rounded" name="title" value="{{ old('title') }}" placeholder="{{ __('dashboard-shop-product-index.addMahsoolFizikiItem1ex') }}">
                              <input name="type" type="hidden" value="product">
                           </div>
                           <div class="input-group mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i class="fas fa-star required-star mr-1"></i>
                                 {{ __('dashboard-shop-product-index.addMahsoolFizikiItem2') }} :</span>
                              </div>
                              <textarea class="form-control" id="description" name="description"></textarea>
                           </div>
                           <div class="input-group mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light inputfield min-width-140" id="basic-addon7"><i class="fas fa-star required-star mr-1"></i>
                                 {{ __('dashboard-shop-product-index.addMahsoolFizikiItem3') }} :</span>
                              </div>
                              <select class="form-control inputfield selectPhysical" name="productCat_id">
                                 <option style="font-family: iranyekan!important;" value="null">{{ __('dashboard-shop-product-index.addMahsoolFizikiItem3Select') }}
                                 </option>
                                 @foreach($productCategories as $productCategory)
                                 <option style="font-family: iranyekan!important;" data-id="{{ $productCategory->id }}" value="{{ $productCategory->id }}">
                                    @if($productCategory->parent()->exists()) {{ $productCategory->parent()->get()->first()->name }} >
                                    @endif {{ $productCategory->name }}
                                 </option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="border border-info input-group mt-3 pb-3 rounded d-none physicalFeatures">
                           </div>
                           <div class="input-group mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light inputfield min-width-140" id="basic-addon7">{{ __('dashboard-shop-product-index.addMahsoolFizikiItem4') }} :</span>
                              </div>
                              <select class="form-control inputfield" name="brand_id" id="">
                                 <option style="font-family: iranyekan!important;" value="null">{{ __('dashboard-shop-product-index.addMahsoolFizikiItem4No') }}
                                 </option>
                                 @foreach($brands as $brand)
                                 <option style="font-family: iranyekan!important;" value="{{ $brand->id }}">
                                    {{ $brand->name }}
                                 </option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="input-group mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i
                                 class="fas fa-star required-star mr-1"></i>{{ __('dashboard-shop-product-index.addMahsoolFizikiItem5') }}:</span></div>
                              <input value="{{ old('price') }}" type="text" class="form-control inputfield" name="price" placeholder="{{ __('dashboard-shop-product-index.addMahsoolFizikiItem5ex') }}" Lang="en">
                              <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> {{ __('dashboard-shop-product-index.addMahsoolFizikiItem5Left') }}</span>
                              </div>
                           </div>
                           <div class="input-group mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-product-index.addMahsoolFizikiItem6') }} :</span></div>
                              <input value="{{ old('off_price') }}" type="text" class="form-control inputfield" name="off_price" placeholder="{{ __('dashboard-shop-product-index.addMahsoolFizikiItem6ex') }}" Lang="en">
                              <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> {{ __('dashboard-shop-product-index.addMahsoolFizikiItem6Left') }}</span>
                              </div>
                           </div>
                           <div class="input-group mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i class="fas fa-star required-star mr-1"></i>
                                 {{ __('dashboard-shop-product-index.addMahsoolFizikiItem7') }} :</span>
                              </div>
                              <input value="{{ old('amount') }}" type="text" class="form-control inputfield" name="amount" placeholder="{{ __('dashboard-shop-product-index.addMahsoolFizikiItem7ex') }}">
                              <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8">{{ __('dashboard-shop-product-index.addMahsoolFizikiItem7Left') }}</span></div>
                           </div>
                           <div class="input-group mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i class="fas fa-star required-star mr-1"></i>
                                 {{ __('dashboard-shop-product-index.addMahsoolFizikiItem8') }}:</span>
                              </div>
                              <input value="{{ old('min_amount') }}" type="text" class="form-control inputfield" name="min_amount" placeholder="{{ __('dashboard-shop-product-index.addMahsoolFizikiItem8ex') }}">
                              <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8">{{ __('dashboard-shop-product-index.addMahsoolFizikiItem8Left') }}</span></div>
                           </div>
                           <div class="input-group mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i class="fas fa-star required-star mr-1"></i>
                                 واحد شمارش کالا:</span>
                              </div>
                              <input value="{{ old('measure') }}" type="text" class="form-control inputfield" name="measure" placeholder="مثال : لیتر">
                           </div>
                           <div class="input-group mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-product-index.addMahsoolFizikiItem9') }} :</span></div>
                              <input value="{{ old('weight') }}" type="text" class="form-control inputfield" name="weight" placeholder="{{ __('dashboard-shop-product-index.addMahsoolFizikiItem9ex') }}">
                              <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8">{{ __('dashboard-shop-product-index.addMahsoolFizikiItem9Left') }}</span></div>
                           </div>
                           <div class="input-group color-dot mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-product-index.addMahsoolFizikiItem10') }} :</span></div>
                              <select class="selectpicker" multiple data-live-search="true" name="color[]" title="{{ __('dashboard-shop-product-index.addMahsoolFizikiItem10ex') }}">
                                 @foreach($colors as $color)
                                 <option class="" style="background:linear-gradient(#{{ $color->code }} , #{{ $color->code }})bottom right/ 15% 2px;background-repeat:no-repeat;" value="{{ $color->id }}">{{ $color->name }}</option>
                                 @endforeach
                              </select>
                           </div>
                             <div class="input-group color-dot mt-3">
                                <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">خصوصیات انتخابی :</span></div>
                                <select class="selectpicker" multiple data-live-search="true" name="specifications[]" title="{{ __('dashboard-shop-product-index.addMahsoolFizikiItem10ex') }}">
                                   @foreach($shop->specifications as $specification)
                                   <option class="" value="{{ $specification->id }}">{{ $specification->name }}</option>
                                   @endforeach
                                </select>
                             </div>
                           <div class="facility">
                              <div class="input-group mt-3">
                                 <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> {{ __('dashboard-shop-product-index.addMahsoolFizikiItem11') }} :</span></div>
                                 <input value="{{ old('facility[]') }}" type="text" class="form-control inputfield" name="facility[]" placeholder="{{ __('dashboard-shop-product-index.addMahsoolFizikiItem11ex') }} ">
                                 <div class="input-group-append">
                                    <a href="#" class="addFacility"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i>
                                    {{ __('dashboard-shop-product-index.addMahsoolFizikiItem11Left') }}
                                    </span></a>
                                 </div>
                              </div>
                           </div>
                           <div class="input-group mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> {{ __('dashboard-shop-product-index.addMahsoolFizikiItem12') }} :</span></div>
                              <input value="{{ old('tags') }}" type="text" id="input-tags" name="tags" class="form-control" />
                           </div>
                           <div class="input-group mt-3 bg-white">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-product-index.addMahsoolFizikiItem13') }} :</span></div>
                              <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-1">
                                 <input type="checkbox" class="custom-control-input" id="supportProduct" name="support">
                                 <label class="custom-control-label iranyekan font-15" for="supportProduct">{{ __('dashboard-shop-product-index.addMahsoolFizikiItem13Item1') }}</label>
                              </div>
                              <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                 <input type="checkbox" class="custom-control-input" id="money_backProduct" name="money_back">
                                 <label class="custom-control-label iranyekan font-15" for="money_backProduct">{{ __('dashboard-shop-product-index.addMahsoolFizikiItem13Item2') }}</label>
                              </div>
                              <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                 <input type="checkbox" class="custom-control-input" id="fast_sendingProduct" name="fast_sending">
                                 <label class="custom-control-label iranyekan font-15" for="fast_sendingProduct">{{ __('dashboard-shop-product-index.addMahsoolFizikiItem13Item3') }}</label>
                              </div>
                              <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                 <input type="checkbox" class="custom-control-input" id="secure_paymentProduct" name="secure_payment">
                                 <label class="custom-control-label iranyekan font-15" for="secure_paymentProduct">{{ __('dashboard-shop-product-index.addMahsoolFizikiItem13Item4') }}</label>
                              </div>
                           </div>
                           <div class="card mt-3">
                              <div class="card-body">
                                 <h4 class="mt-0 header-title"><i class="fas fa-star required-star mr-1"></i>{{ __('dashboard-shop-product-index.addMahsoolFizikiItem14') }}</h4>
                                 <input type="file" id="input-file-now" name="image" class="dropify">
                              </div>
                           </div>
                        </div>
                        <!--end form-group-->
                  </div>
                  <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-danger rounded" data-dismiss="modal">{{ __('dashboard-shop-product-index.addMahsoolFizikiItem15') }}
                  </button>
                  <div class="group">
                  <button type="submit" name="action" value="justSave" class="btn btn-primary rounded">{{ __('dashboard-shop-product-index.addMahsoolFizikiItem16') }}
                  </button>
                  <button type="submit" name="action" value="saveAndContinue" class="btn btn-primary rounded">{{ __('dashboard-shop-product-index.addMahsoolFizikiItem17') }}
                  </button>
                  </div>
                  </div>
                  </form>
               </div>
            </div>
         </div>
         <div class="modal fade bd-example-modal-xl" id="AddFileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard-shop-product-index.addMahsoolFileTitle') }} </h5>
                     <button type="button" class="close rounded" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body modal-scroll" style="background-color:#fbfcfd">
                     <form action="{{ route('Product-list.storeProduct' , ['shop' => $shop->english_name]) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-0">
                           <div class="input-group mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i class="fas fa-star required-star mr-1"></i>
                                 {{ __('dashboard-shop-product-index.addMahsoolFileItem1') }} :</span>
                              </div>
                              <input value="{{ old('title') }}" type="text" class="form-control inputfield" name="title" placeholder="{{ __('dashboard-shop-product-index.addMahsoolFileItem1ex') }}">
                              <input name="type" type="hidden" value="file">
                           </div>
                           <div class="input-group mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i class="fas fa-star required-star mr-1"></i>
                                 {{ __('dashboard-shop-product-index.addMahsoolFileItem2') }} :</span>
                              </div>
                              <textarea class="form-control" id="description2" name="description"></textarea>

                           </div>
                           <div class="input-group mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light inputfield min-width-140" id="basic-addon7"><i class="fas fa-star required-star mr-1"></i>
                                 {{ __('dashboard-shop-product-index.addMahsoolFileItem3') }}ل :</span>
                              </div>
                              <select class="form-control inputfield selectFile" name="productCat_id">
                                 <option style="font-family: iranyekan!important;" value="null">{{ __('dashboard-shop-product-index.addMahsoolFileItem3Select') }}
                                 </option>
                                 @foreach($productCategories as $productCategory)
                                 <option style="font-family: iranyekan!important;" data-id="{{ $productCategory->id }}" value="{{ $productCategory->id }}">
                                    @if($productCategory->parent()->exists()) {{ $productCategory->parent()->get()->first()->name }} >
                                    @endif {{ $productCategory->name }}
                                 </option>
                                 @endforeach
                              </select>
                           </div>
                           <div class=" border border-info input-group mt-3 pb-3 rounded d-none fileFeatures">
                           </div>
                           <div class="input-group mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light inputfield min-width-140" id="basic-addon7">{{ __('dashboard-shop-product-index.addMahsoolFileItem4') }} :</span></div>
                              <select class="form-control inputfield" name="brand_id" id="">
                                 <option style="font-family: iranyekan!important;" value="null">{{ __('dashboard-shop-product-index.addMahsoolFileItem4No') }}
                                 </option>
                                 @foreach($brands as $brand)
                                 <option style="font-family: iranyekan!important;" value="{{ $brand->id }}">
                                    {{ $brand->name }}
                                 </option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="input-group mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i
                                 class="fas fa-star required-star mr-1"></i>{{ __('dashboard-shop-product-index.addMahsoolFileItem5') }} :</span></div>
                              <input value="{{ old('price') }}" type="text" class="form-control inputfield" name="price" placeholder="{{ __('dashboard-shop-product-index.addMahsoolFileItem5ex') }}">
                              <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> {{ __('dashboard-shop-product-index.addMahsoolFileItem5Left') }}</span></div>
                           </div>
                           <div class="input-group mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-product-index.addMahsoolFileItem6') }} :</span></div>
                              <input value="{{ old('off_price') }}" type="text" class="form-control inputfield" name="off_price" placeholder="{{ __('dashboard-shop-product-index.addMahsoolFileItem6ex') }}">
                              <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> {{ __('dashboard-shop-product-index.addMahsoolFileItem6Left') }}</span></div>
                           </div>

                           <div class="input-group color-dot mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">خصوصیات انتخابی :</span></div>
                              <select class="selectpicker" multiple data-live-search="true" name="specifications[]" title="{{ __('dashboard-shop-product-index.addMahsoolFizikiItem10ex') }}">
                                 @foreach($shop->specifications as $specification)
                                 <option class="" value="{{ $specification->id }}">{{ $specification->name }}</option>
                                 @endforeach
                              </select>
                           </div>

                           <div class="facility">
                              <div class="input-group mt-3">
                                 <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> {{ __('dashboard-shop-product-index.addMahsoolFizikiItem11') }} :</span></div>
                                 <input value="{{ old('facility[]') }}" type="text" class="form-control inputfield" name="facility[]" placeholder="{{ __('dashboard-shop-product-index.addMahsoolFizikiItem11ex') }} ">
                                 <div class="input-group-append">
                                    <a href="#" class="addFacility"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i>
                                    {{ __('dashboard-shop-product-index.addMahsoolFizikiItem11Left') }}
                                    </span></a>
                                 </div>
                              </div>
                           </div>
                           <div class="input-group mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> {{ __('dashboard-shop-product-index.addMahsoolFileItem77') }} :</span></div>
                              <input value="{{ old('tags') }}" type="text" id="input-tags" name="tags" class="form-control" />
                           </div>
                           <div class="input-group mt-3 bg-white">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-product-index.addMahsoolFileItem8') }} :</span></div>
                              <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-1">
                                 <input type="checkbox" class="custom-control-input" id="supportFile" name="support">
                                 <label class="custom-control-label iranyekan font-15" for="supportFile">{{ __('dashboard-shop-product-index.addMahsoolFileItem9Item1') }}</label>
                              </div>
                              <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                 <input type="checkbox" class="custom-control-input" id="money_backFile" name="money_back">
                                 <label class="custom-control-label iranyekan font-15" for="money_backFile">{{ __('dashboard-shop-product-index.addMahsoolFileItem9Item2') }}</label>
                              </div>
                              <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                 <input type="checkbox" class="custom-control-input" id="fast_sendingFile" name="fast_sending">
                                 <label class="custom-control-label iranyekan font-15" for="fast_sendingFile">{{ __('dashboard-shop-product-index.addMahsoolFileItem9Item3') }}</label>
                              </div>
                              <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                 <input type="checkbox" class="custom-control-input" id="secure_paymentFile" name="secure_payment">
                                 <label class="custom-control-label iranyekan font-15" for="secure_paymentFile">{{ __('dashboard-shop-product-index.addMahsoolFileItem9Item4') }}</label>
                              </div>
                           </div>
                           <div class="card mt-3">
                              <div class="card-body">
                                 <h4 class="mt-0 header-title"><i class="fas fa-star required-star mr-1"></i> {{ __('dashboard-shop-product-index.addMahsoolFileItem10') }}</h4>
                                 <input type="file" id="input-file-now" name="image" class="dropify">
                              </div>
                           </div>
                           <div class="card">
                              <div class="card-body">
                                 <h4 class="mt-0 header-title"><i class="fas fa-star required-star mr-1"></i> {{ __('dashboard-shop-product-index.addMahsoolFileItem11') }}</h4>
                                 <p class="text-muted mb-3"> {{ __('dashboard-shop-product-index.addMahsoolFileItem11Desc') }}
                                 </p>
                                 <input type="file" id="input-file-now" name="attachment" class="dropify">
                              </div>
                              <!--end card-body-->
                           </div>
                        </div>
                        <!--end form-group-->
                  </div>
                  <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-danger rounded" data-dismiss="modal"> {{ __('dashboard-shop-product-index.addMahsoolFileItem12') }}
                  </button>
                  <div class="group">
                  <button type="submit" name="action" value="justSave" class="btn btn-primary rounded"> {{ __('dashboard-shop-product-index.addMahsoolFileItem13') }}
                  </button>
                  <button type="submit" name="action" value="saveAndContinue" class="btn btn-primary rounded"> {{ __('dashboard-shop-product-index.addMahsoolFileItem14') }}
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
                     <h5 class="modal-title" id="exampleModalLabel"> {{ __('dashboard-shop-product-index.addMahsoolServiceTitle') }} </h5>
                     <button type="button" class="close rounded" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body modal-scroll" style="background-color:#fbfcfd">
                     <form action="{{ route('Product-list.storeProduct', ['shop' => $shop->english_name]) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-0">
                           <div class="input-group mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i
                                 class="fas fa-star required-star mr-1"></i>{{ __('dashboard-shop-product-index.addMahsoolServiceItem1') }} :</span></div>
                              <input value="{{ old('title') }}" type="text" class="form-control inputfield" name="title" placeholder="{{ __('dashboard-shop-product-index.addMahsoolServiceItem1ex') }}">
                              <input name="type" type="hidden" value="service">
                           </div>
                           <div class="input-group mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i class="fas fa-star required-star mr-1"></i>
                                 {{ __('dashboard-shop-product-index.addMahsoolServiceItem2') }}:</span>
                              </div>
                              <textarea class="form-control" id="description3" name="description"></textarea>

                           </div>
                           <div class="input-group mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light inputfield min-width-140" id="basic-addon7"><i class="fas fa-star required-star mr-1"></i>
                                 {{ __('dashboard-shop-product-index.addMahsoolServiceItem3') }}ل :</span>
                              </div>
                              <select class="form-control inputfield selectService" name="productCat_id">
                                 <option style="font-family: iranyekan!important;" value="null">
                                    {{ __('dashboard-shop-product-index.addMahsoolServiceItem3Select') }}
                                 </option>
                                 @foreach($productCategories as $productCategory)
                                 <option style="font-family: iranyekan!important;" data-id="{{ $productCategory->id }}" value="{{ $productCategory->id }}">
                                    @if($productCategory->parent()->exists()) {{ $productCategory->parent()->get()->first()->name }} >
                                    @endif {{ $productCategory->name }}
                                 </option>
                                 @endforeach
                              </select>
                           </div>
                           <div class=" border border-info input-group mt-3 pb-3 rounded d-none serviceFeatures">
                           </div>
                           <div class="input-group mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light inputfield min-width-140" id="basic-addon7">{{ __('dashboard-shop-product-index.addMahsoolServiceItem4') }} :</span>
                              </div>
                              <select class="form-control inputfield" name="brand_id" id="">
                                 <option style="font-family: iranyekan!important;" value="null">{{ __('dashboard-shop-product-index.addMahsoolServiceItem4No') }}
                                 </option>
                                 @foreach($brands as $brand)
                                 <option style="font-family: iranyekan!important;" value="{{ $brand->id }}">
                                    {{ $brand->name }}
                                 </option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="input-group mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"><i class="fas fa-star required-star mr-1"></i>
                                 {{ __('dashboard-shop-product-index.addMahsoolServiceItem5') }} :</span>
                              </div>
                              <input value="{{ old('price') }}" type="text" class="form-control inputfield" name="price" placeholder="{{ __('dashboard-shop-product-index.addMahsoolServiceItem5ex') }}">
                              <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> {{ __('dashboard-shop-product-index.addMahsoolServiceItem5Left') }}</span>
                              </div>
                           </div>
                           <div class="input-group mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-product-index.addMahsoolServiceItem6') }} :</span></div>
                              <input value="{{ old('off_price') }}" type="text" class="form-control inputfield" name="off_price" placeholder="{{ __('dashboard-shop-product-index.addMahsoolServiceItem6ex') }}">
                              <div class="input-group-append"><span class="input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"> {{ __('dashboard-shop-product-index.addMahsoolServiceItem6Left') }}</span>
                              </div>
                           </div>

                           <div class="input-group color-dot mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">خصوصیات انتخابی :</span></div>
                              <select class="selectpicker" multiple data-live-search="true" name="specifications[]" title="{{ __('dashboard-shop-product-index.addMahsoolFizikiItem10ex') }}">
                                 @foreach($shop->specifications as $specification)
                                 <option class="" value="{{ $specification->id }}">{{ $specification->name }}</option>
                                 @endforeach
                              </select>
                           </div>

                           <div class="facility">
                              <div class="input-group mt-3">
                                 <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> {{ __('dashboard-shop-product-index.addMahsoolFizikiItem11') }} :</span></div>
                                 <input value="{{ old('facility[]') }}" type="text" class="form-control inputfield" name="facility[]" placeholder="{{ __('dashboard-shop-product-index.addMahsoolFizikiItem11ex') }} ">
                                 <div class="input-group-append">
                                    <a href="#" class="addFacility"><span class="h-50px input-group-text bg-light text-dark font-weight-bold iranyekan" id="basic-addon8"><i class="fa fa-plus mr-2"></i>
                                    {{ __('dashboard-shop-product-index.addMahsoolFizikiItem11Left') }}
                                    </span></a>
                                 </div>
                              </div>
                           </div>
                           <div class="input-group mt-3">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> {{ __('dashboard-shop-product-index.addMahsoolServiceItem8') }}:</span></div>
                              <input value="{{ old('tags') }}" type="text" id="input-tags" name="tags" class="form-control" />
                           </div>
                           <div class="input-group mt-3 bg-white">
                              <div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7">{{ __('dashboard-shop-product-index.addMahsoolServiceItem9') }} :</span></div>
                              <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-1">
                                 <input type="checkbox" class="custom-control-input" id="supportService" name="support">
                                 <label class="custom-control-label iranyekan font-15" for="supportService">{{ __('dashboard-shop-product-index.addMahsoolServiceItem9Item1') }}</label>
                              </div>
                              <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                 <input type="checkbox" class="custom-control-input" id="money_backService" name="money_back">
                                 <label class="custom-control-label iranyekan font-15" for="money_backService">{{ __('dashboard-shop-product-index.addMahsoolServiceItem9Item2') }}</label>
                              </div>
                              <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                 <input type="checkbox" class="custom-control-input" id="fast_sendingService" name="fast_sending">
                                 <label class="custom-control-label iranyekan font-15" for="fast_sendingService">{{ __('dashboard-shop-product-index.addMahsoolServiceItem9Item3') }}</label>
                              </div>
                              <div class="custom-control custom-switch switch-blue mr-5 p-3 col-lg-2">
                                 <input type="checkbox" class="custom-control-input" id="secure_paymentService" name="secure_payment">
                                 <label class="custom-control-label iranyekan font-15" for="secure_paymentService">{{ __('dashboard-shop-product-index.addMahsoolServiceItem9Item4') }}</label>
                              </div>
                           </div>
                           <div class="card mt-3">
                              <div class="card-body">
                                 <h4 class="mt-0 header-title"><i class="fas fa-star required-star mr-1"></i> {{ __('dashboard-shop-product-index.addMahsoolServiceItem10') }}</h4>
                                 <input type="file" id="input-file-now" name="image" class="dropify">
                              </div>
                           </div>
                        </div>
                        <!--end form-group-->
                  </div>
                  <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"> {{ __('dashboard-shop-product-index.addMahsoolServiceItem11') }}</button>
                  <div class="group">
                  <button type="submit" name="action" value="justSave" class="btn btn-primary rounded"> {{ __('dashboard-shop-product-index.addMahsoolServiceItem12') }}
                  </button>
                  <button type="submit" name="action" value="saveAndContinue" class="btn btn-primary rounded"> {{ __('dashboard-shop-product-index.addMahsoolServiceItem13') }}
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
               <h4 class="mt-0 header-title">{{ __('dashboard-shop-product-index.ListMahsoolatTitle') }}</h4>
               <p class="text-muted mb-4 font-13">{{ __('dashboard-shop-product-index.ListMahsoolatDesc') }}</p>
               <div class="searchBox bg-dark"  style="margin-top: -15px;">
                  <input type="text" id="myInputTextField" class="searchInput iranyekan">
                  <button class="searchButton border" href="#">
                  <i class="fa fa-search"></i>
                  </button>
               </div>
               <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                  <div class="row">

                     <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer font-16" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid">
                           <thead>
                              <tr role="row">
                                 <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">
                                    {{ __('dashboard-shop-product-index.ListMahsoolatTableItem1') }}
                                 </th>
                                 <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 705px;">
                                    {{ __('dashboard-shop-product-index.ListMahsoolatTableItem2') }}
                                 </th>
                                 <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">
                                    {{ __('dashboard-shop-product-index.ListMahsoolatTableItem3') }}
                                 </th>
                                 <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">{{ __('dashboard-shop-product-index.ListMahsoolatTableItem7') }}
                                 </th>

                                 <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">{{ __('dashboard-shop-product-index.ListMahsoolatTableItem5') }}
                                 </th>
                                 <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width:150px;">
                                    {{ __('dashboard-shop-product-index.ListMahsoolatTableItem6') }}
                                 </th>
                                 <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">{{ __('dashboard-shop-product-index.ListMahsoolatTableItem4') }}
                                 </th>
                                 <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">{{ __('dashboard-shop-product-index.ListMahsoolatTableItem8') }}
                                 </th>
                              </tr>
                           </thead>
                           <tbody class="byekan">
                              @php
                              $id = 1;
                              @endphp
                              @foreach($products as $product)
                              <tr role="row" class="odd icon-hover hover-color" id="{{ $product->id }}">
                                 <td class="sorting_1" style="width:5%">{{ $id }}</td>
                                 <td class="sorting_1 w-25 ">
                                    <img src="{{ $product->image['80,80'] }}" class="rounded" alt="">
                                    <p class="d-inline-block align-middle mb-0 mr-2"><a href="{{ route('product', ['shop'=>\Auth::user()->shop()->first()->english_name, 'id'=>$product->id]) }}" target="_blank"
                                       class="d-inline-block align-middle mb-0 product-name">{{ $product->title }}</a>
                                 </td>
                                 <td>{{ $product->productCategory()->first()->name }}</td>
                                 <td>
                                    @csrf {{ method_field('put') }}
                                    <button class="btn btn-link change" type="submit" data-id="{{ $product->id }}">
                                    @if($product->status == "enable")
                                    <i class="fa fa-toggle-on text-success show{{ $product->id }}"></i>
                                    <i class="fa fa-toggle-off text-muted d-none {{ $product->id }}"></i>
                                    @else
                                    <i class="fa fa-toggle-on text-success d-none {{ $product->id }}"></i>
                                    <i class="fa fa-toggle-off text-muted show{{ $product->id }}"></i>
                                    @endif
                                    </button>
                                    @if ($product->status == "enable")
                                    <span class="badge badge-soft-success show{{ $product->id }}">
                                    {{ __('dashboard-shop-product-index.ListMahsoolatTableStatusEnable') }}
                                    </span>
                                    <span class="badge badge-soft-pink d-none {{ $product->id }}">
                                    {{ __('dashboard-shop-product-index.ListMahsoolatTableStatusDisable') }}
                                    </span>
                                    @else
                                    <span class="badge badge-soft-success d-none {{ $product->id }}">
                                    {{ __('dashboard-shop-product-index.ListMahsoolatTableStatusEnable') }}
                                    </span>
                                    <span class="badge badge-soft-pink show{{ $product->id }}">
                                    {{ __('dashboard-shop-product-index.ListMahsoolatTableStatusDisable') }}
                                    </span>
                                    @endif
                                 </td>

                                 <td>{{ number_format($product->price) }}</td>
                                 @if($product->off_price != null)
                                 <td>{{ number_format($product->off_price) }}</td>
                               @else
                                 <td></td>
                               @endif

                                 <td>
                                    <div class="tt-collapse-content" style="display: block;">
                                       <ul class="tt-options-swatch options-middle">
                                          @foreach($product->colors as $color)
                                          <li>
                                             <a class="options-color tt-border tt-color-bg-08" href="#" style="background-color:#{{ $color->code }}"></a>
                                          </li>
                                          @endforeach
                                       </ul>
                                    </div>
                                 </td>
                                 <td>
                                    @if ($product->type == 'service') {{ __('dashboard-shop-product-index.ListMahsoolatTableTypeItem2') }}
                                    @elseif($product->type == 'file') {{ __('dashboard-shop-product-index.ListMahsoolatTableTypeItem3') }}
                                    @else {{ __('dashboard-shop-product-index.ListMahsoolatTableTypeItem1') }}
                                    @endif
                                    <div class="d-none icon-show">
                                       @if($product->type == 'product')
                                       <a href="{{ route('product-list.edit-physical', $product->id ) }}" title="ویرایش" id="editProduct"><i class="far fa-edit text-info mr-1 button font-15"></i>
                                       </a>
                                       @elseif($product->type == 'file')
                                       <a href="{{ route('product-list.edit-file', $product->id ) }}" title="ویرایش" id="editProduct"><i class="far fa-edit text-info mr-1 button font-15"></i>
                                       </a>
                                       @else
                                       <a href="{{ route('product-list.edit-service', $product->id ) }}" title="ویرایش" id="editProduct"><i class="far fa-edit text-info mr-1 button font-15"></i>
                                       </a>
                                       @endif
                                       </a>
                                       <a href="" title="حذف" id="removerProduct" data-id="{{ $product->id }}" data-name="{{ $product->title }}">
                                       <i class="far fa-trash-alt text-danger font-15"></i></a>
                                       <a href="{{ route('galleries.index', $product->id ) }}" title="گالری"><i class="fa fa-image text-info mr-1 button font-15"></i></a>
                                    </div>
                                 </td>
                              </tr>
                              @php
                              $id ++
                              @endphp
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
         <!-- end col -->
      </div>
      <!-- end row -->
   </div>
   <!-- container -->
</div>
@endsection
@section('pageScripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.js"></script>
<script src="{{ asset('/dashboard/assets/js/feature.js') }}"></script>
<script src="{{ asset('/dashboard/assets/js/admin-product-index.js') }}"></script>
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
<script type="text/javascript">
   $(document).ready(function() {
      $(".addFacility").click(function() {
          $("div.facility").append('<div class="input-group mt-3"><div class="input-group-prepend min-width-180"><span class="input-group-text bg-light min-width-140" id="basic-addon7"> {{ __('dashboard-shop-product-index.addMahsoolFizikiItem11') }} :</span></div><input value="{{ old('facility[]') }}" type="text" class="form-control inputfield" name="facility[]" placeholder="{{ __('dashboard-shop-product-index.addMahsoolFizikiItem11ex') }} "></div>');
      });
      });
</script>
<script type="text/javascript">
   CKEDITOR.replace('description', {
       language: 'fa',
       uiColor: '#F3F6F7'
   });
   CKEDITOR.replace('description2', {
       language: 'fa',
       uiColor: '#F3F6F7'
   });
   CKEDITOR.replace('description3', {
       language: 'fa',
       uiColor: '#F3F6F7'
   });
</script>
@stop
