@extends('dashboard.layouts.master')
@section('content')
<link rel="stylesheet" href="/dashboard/assets/css/bootstrap-select.css" />
<link href="{{ asset('/dashboard/assets/css/admin-shop-setting.css') }}" rel="stylesheet">
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right">
                <ol style="direction: ltr" class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">{{ __('dashboard-shop-shop-setting.leftCurrentPage1') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('dashboard-shop-shop-setting.leftCurrentPage2') }}</li>
                </ol>
            </div>
            <h4 class="page-title">{{ __('dashboard-shop-shop-setting.pageTitle') }}</h4>
        </div>
        <!--end page-title-box-->
    </div>
    <!--end col-->
</div>
@include('dashboard.layouts.errors')

<ul class="nav nav-tabs md-tabs nav-justified primary-color" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#info" role="tab">
            <i class="fas fa-info-circle m-1"></i>{{ __('dashboard-shop-shop-setting.boxTitle1') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#template" role="tab">
          <i class="fa fa-file m-1" aria-hidden="true"></i>انتخاب قالب فروشگاه</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#theme" role="tab">
            <i class="fa fa-cog pr-2 m-1"></i>{{ __('dashboard-shop-shop-setting.boxTitle2') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#contact" role="tab">
            <i class="fas fa-address-book m-1"></i>{{ __('dashboard-shop-shop-setting.boxTitle3') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#invoice" role="tab">
            <i class="fa fa-receipt m-1"></i>{{ __('dashboard-shop-shop-setting.boxTitle4') }}</a>
    </li>
</ul>


<div class="tab-content">

    <div class="tab-pane fade in show active" id="info" role="tabpanel">
        <form method="post" action="{{ route('shop-setting.update', ['id' => \Auth::user()->id, 'shop' => \Auth::user()->shop->english_name]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mt-0 header-title">مشخصات صاحب فروشگاه</h3>
                            <p class="text-muted mb-3">در این بخش مشخصات صاحب فروشگاه قابل مشاهده میباشد.</p><br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.etelaatForooshgahItem1') }}</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="firstName" disabled value="{{ old('firstName', \Auth::user()->firstName) }}" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.etelaatForooshgahItem2') }}</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="lastName" disabled value="{{ old('lastName', \Auth::user()->lastName) }}">
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mt-0 header-title">{{ __('dashboard-shop-shop-setting.etelaatForooshgahTitle') }}</h3>
                            <p class="text-muted mb-3">{{ __('dashboard-shop-shop-setting.etelaatForooshgahDesc') }}.</p><br>
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.etelaatForooshgahItem3') }}</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="name" placeholder="{{ __('dashboard-shop-shop-setting.etelaatForooshgahItem3ex') }}" value="{{ old('name', $shopInformation->name) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row  mb-0">
                                        <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.etelaatForooshgahItem4') }}
                                            <p class="text-muted mt-1" style="font-size: 11px;">{{ __('dashboard-shop-shop-setting.etelaatForooshgahItem4Desc') }}</p>
                                        </label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="english_name" value="{{ old('english_name', $shopInformation->english_name) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.etelaatForooshgahItem5') }}</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="category_id">
                                                @if($shopInformation->category_id != null)
                                                    <option value="">{{ __('dashboard-shop-shop-setting.etelaatForooshgahItem5Select') }}</option>
                                                    @endif
                                                    @foreach ($shopCategories as $shopCategory)
                                                    <option {{ $shopCategory->id == $shopInformation->category_id ? 'selected' : ''}} value="{{ $shopCategory->id }}">{{ $shopCategory->name }}</option>
                                                    @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.etelaatForooshgahItem6') }} </label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="description" placeholder="{{ __('dashboard-shop-shop-setting.etelaatForooshgahItem6ex') }}" value="{{ old('description', $shopInformation->description) }}">
                                        </div>
                                    </div>

                                </div>

                            </div>


                        </div>

                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mt-0 header-title">تنظیمات دامین فروشگاه</h3>
                            <p class="text-muted mb-3">درصورت نیاز، میتوانید دامین خود را ثبت نمایید. پس از تکمیل این قیمت میبایسب nameserver دامین خودرا به ns1.omidshop.net و ns2.omidshop.net تغییر دهید تا دامنه برروی سیستم امیدشاپ متصل شود. لازم به ذکر است که دامنه اینترنتی خودرا باید بدون www و بدون http ویا https وارد نمایید. مثال: google.com </p><br>
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">دامین فروشگاه</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="url" placeholder="مثال : omidshop.net" value="{{ old('url', $shopInformation->url) }}">
                                            <p class="text-danger mt-2">دامنه اینترنتی خودرا بدون www و بدون http ویا https وارد نمایید. مثال: google.com</p><br>
                                        </div>
                                    </div>


                                </div>

                            </div>


                        </div>

                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mt-0 header-title">تنظیمات ثبت سفارش</h3>
                            <p class="text-muted mb-3">در این بخش میتوانید روش های ارسال کالا توسط فروشگاه خود را انتخاب کنید همچنین میتوانید روش های پرداختی را میتوانید فعال و یا غیر فعال کنید . توجه داشته باشید که با فعال کردن هر آیتم هنگام سفارش کاربر میتواند یکی از روش ها را انتخاب کند.</p><br>
                            <div class="row col-12 mt-4">
                                <div class="col-3 border-left p-3 m-4">
                                    <div class="media setting-card"><span class="sett-card-icon set-icon-purple" style="align-self: start;"><i class="fa fa-shipping-fast"></i></span>
                                        <div class="media-body align-self-center">
                                            <div class="setting-detail">
                                                <h3 class="mb-0 mt-0 iranyekan">{{ __('dashboard-shop-shop-setting.etelaatForooshgahItem7') }}</h3>
                                                <p class="text-muted mb-0">
                                                    {{ __('dashboard-shop-shop-setting.etelaatForooshgahItem7Desc') }}.</p>
                                            </div>
                                            <div class="mt-3">
                                              <div class="row">
                                                <div class="custom-control custom-switch switch-blue mr-5 p-3 col-2">
                                                    <input type="checkbox" class="custom-control-input" id="quick_way_on" name="quick_way" @if($shopInformation->quick_way == 'enable') checked @endif>
                                                        <label class="custom-control-label iranyekan font-15" for="quick_way_on">{{ __('dashboard-shop-shop-setting.etelaatForooshgahItem7Enable') }}</label>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <button type="button" class="btn btn-outline-pink btn-sm mt-2" data-toggle="collapse" data-target="#quick_way_price">تعیین مبلغ (تومان)</button>
                                              </div>
                                              <div class="row">
                                                  <div id="quick_way_price" class="collapse mt-2 ml-2">
                                                      <input class="form-control border-custom" type="number" name="quick_way_price" value="{{ old('quick_way_price', $shopInformation->quick_way_price) }}" style="position: relative;left: 9px;width: 116px;height: 32px;">
                                                  </div>
                                                </div>

                                            </div>
                                            <!--end /div-->
                                        </div>
                                        <!--end media body-->
                                    </div>
                                    <!--end media-->

                                </div>
                                <!--end col-->
                                <div class="col-3 border-left p-3 m-4">
                                    <div class="media setting-card"><span class="sett-card-icon set-icon-success" style="align-self: start;"><i class="fa fa-truck"></i></span>
                                        <div class="media-body align-self-center">
                                            <div class="setting-detail">
                                                <h3 class="mb-0 mt-0 iranyekan"> {{ __('dashboard-shop-shop-setting.etelaatForooshgahItem8') }}</h3>
                                                <p class="text-muted mb-0">

                                                {{ __('dashboard-shop-shop-setting.etelaatForooshgahItem8Desc') }}.</p>
                                            </div>
                                            <div class="mt-3">
                                              <div class="row">

                                                <div class="custom-control custom-switch switch-blue mr-5 p-3 col-2">
                                                    <input type="checkbox" class="custom-control-input" id="posting_way_on" name="posting_way" @if($shopInformation->posting_way == 'enable') checked @endif>
                                                        <label class="custom-control-label iranyekan font-15" for="posting_way_on">{{ __('dashboard-shop-shop-setting.etelaatForooshgahItem8Enable') }}</label>
                                                </div>
                                              </div>
                                              <div class="row">

                                                <button type="button" class="btn btn-outline-pink btn-sm mt-2" data-toggle="collapse" data-target="#posting_way_price">تعیین مبلغ (تومان) </button>
                                              </div>
                                                  <div id="posting_way_price" class="collapse mt-2">
                                                      <input class="form-control border-custom" type="number" name="posting_way_price" value="{{ old('posting_way_price', $shopInformation->posting_way_price) }}" style="position: relative;left: 9px;width: 116px;height: 32px;">
                                                  </div>

                                            </div>
                                            <!--end /div-->
                                        </div>
                                        <!--end media body-->
                                    </div>
                                    <!--end media-->

                                </div>
                                <!--end col-->
                                <div class="col-3 border-left p-3 m-4">
                                    <div class="media setting-card"><span class="sett-card-icon set-icon-danger" style="align-self: start;"><i class="fas fa-people-carry"></i></span>
                                        <div class="media-body align-self-center">
                                            <div class="setting-detail">
                                                <h3 class="mb-0 mt-0 iranyekan">{{ __('dashboard-shop-shop-setting.etelaatForooshgahItem9') }}</h3>
                                                <p class="text-muted mb-0">

                                                    {{ __('dashboard-shop-shop-setting.etelaatForooshgahItem9Desc') }}.</p>
                                            </div>
                                            <div class="mt-3">
                                              <div class="row">

                                                <div class="custom-control custom-switch switch-blue mr-5 p-3 col-2">
                                                    <input type="checkbox" class="custom-control-input" id="person_way_on" name="person_way" @if($shopInformation->person_way == 'enable') checked @endif>
                                                        <label class="custom-control-label iranyekan font-15" for="person_way_on">{{ __('dashboard-shop-shop-setting.etelaatForooshgahItem9Enable') }}</label>
                                                </div>
                                              </div>
                                              <div class="row">


                                              </div>
                                                  <div id="person_way_price" class="collapse mt-2">
                                                      <input class="form-control border-custom" type="number" name="person_way_price" value="{{ old('person_way_price', $shopInformation->person_way_price) }}" style="position: relative;left: 9px;width: 116px;height: 32px;">
                                                  </div>

                                            </div>
                                            <!--end /div-->
                                        </div>
                                        <!--end media body-->
                                    </div>
                                    <!--end media-->
                                </div>
                                <div class="col-3 border-left p-3 m-4">
                                    <div class="media setting-card"><span class="sett-card-icon set-icon-blue" style="align-self: start;"><i class="far fa-credit-card"></i></i></span>
                                        <div class="media-body align-self-center">
                                            <div class="setting-detail">
                                                <h3 class="mb-0 mt-0 iranyekan">پرداخت آنلاین</h3>
                                                <p class="text-muted mb-0">

                                                  میتوانید با دریافت درگاه مستقیم اقدام به دریافت وجه بصورت آنلاین کنید.</p>
                                            </div>
                                            <div class="mt-3 row">
                                                <div class="custom-control custom-switch switch-blue mr-5 p-3 col-2">
                                                    <input type="checkbox" class="custom-control-input" id="online_payment_on" name="online_payment" @if($shopInformation->online_payment == 'enable') checked @endif>
                                                        <label class="custom-control-label iranyekan font-15" for="online_payment_on">{{ __('dashboard-shop-shop-setting.etelaatForooshgahItem9Enable') }}</label>
                                                </div>

                                            </div>
                                            <!--end /div-->
                                        </div>
                                        <!--end media body-->
                                    </div>
                                    <!--end media-->
                                </div>
                                <div class="col-3 m-4 p-3">
                                    <div class="media setting-card"><span class="sett-card-icon set-icon-lightpurple" style="align-self: start;"><i class="fas fa-money-bill-alt"></i></span>
                                        <div class="media-body align-self-center">
                                            <div class="setting-detail">
                                                <h3 class="mb-0 mt-0 iranyekan">پرداخت نقدی</h3>
                                                <p class="text-muted mb-0">

                                                    کاربر شما میتواند پس از دریافت کالا وجه را پرداخت کند.</p>
                                            </div>
                                            <div class="mt-3 row">
                                                <div class="custom-control custom-switch switch-blue mr-5 p-3 col-2">
                                                    <input type="checkbox" class="custom-control-input" id="cash_payment_on" name="cash_payment" @if($shopInformation->cash_payment == 'enable') checked @endif>
                                                        <label class="custom-control-label iranyekan font-15" for="cash_payment_on">{{ __('dashboard-shop-shop-setting.etelaatForooshgahItem9Enable') }}</label>
                                                </div>

                                            </div>
                                            <!--end /div-->
                                        </div>
                                        <!--end media body-->
                                    </div>
                                    <!--end media-->
                                </div>
                            </div>

                        </div>

                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">{{ __('dashboard-shop-shop-setting.etelaatForooshgahItem10') }}</h4>
                            <p class="text-muted mb-3">{{ __('dashboard-shop-shop-setting.etelaatForooshgahItem10Desc') }}.</p>
                            <a class="mr-2 font-15" href="" id="icon-delete" title="{{ __('dashboard-shop-shop-setting.etelaatForooshgahItem10Delete') }}" data-type="icon" data-name="{{ \Auth::user()->shop()->first()->english_name }}" data-id="{{ \Auth::user()->shop()->first()->id }}"><i
                                  class="far fa-trash-alt text-danger font-18 pl-2"></i>{{ __('dashboard-shop-shop-setting.etelaatForooshgahDelete') }}</a>
                            <input type="file" id="input-file-now" name="icon" class="dropify" data-default-file="{{ \Auth::user()->shop()->first()->icon['original'] }}">
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">{{ __('dashboard-shop-shop-setting.etelaatForooshgahItem11') }}</h4>
                            <p class="text-muted mb-3">{{ __('dashboard-shop-shop-setting.etelaatForooshgahItem11Desc') }}.</p>
                            <a class="mr-2 font-15" href="" id="icon-delete" title="{{ __('dashboard-shop-shop-setting.etelaatForooshgahItem11Delete') }}" data-type="logo" data-name="{{ \Auth::user()->shop()->first()->english_name }}" data-id="{{ \Auth::user()->shop()->first()->id }}"><i
                                  class="far fa-trash-alt text-danger font-18 pl-2"></i>{{ __('dashboard-shop-shop-setting.etelaatForooshgahDelete') }}</a>
                            <input type="file" id="input-file-now" name="logo" class="dropify" data-default-file="{{ \Auth::user()->shop()->first()->logo['original'] }}">
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
            </div>

            <div class="row comming-soon">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">{{ __('dashboard-shop-shop-setting.tasvieHesabTitle') }}</h4>
                            <p class="text-muted mb-3">{{ __('dashboard-shop-shop-setting.tasvieHesabDesc') }}<p>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.tasvieHesabShomareSheba') }}</label>

                                <input type="text" class="form-control" placeholder="{{ __('dashboard-shop-shop-setting.tasvieHesabShomareShebaex') }}">
                                <div class="input-group-append"><span class="input-group-text bg-secondary text-white font-weight-bold" id="basic-addon8"> IR</span></div>
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
                <button data-toggle="modal" data-target="#AddWalletModal" type="submit" class="btn btn-success px-5 py-2  iranyekan rounded ">{{ __('dashboard-shop-shop-setting.sabt') }}</button><br>
            </div>
        </form>
    </div>

    <div class="tab-pane fade" id="theme" role="tabpanel">
        <form method="post" action="{{ route('shop-setting.setting-update',['id' => \Auth::user()->shop()->first()->id, 'shop' => \Auth::user()->shop->english_name]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">{{ __('dashboard-shop-shop-setting.tanzimateGhalebeForooshgahTitle') }}</h4>
                            <p class="text-muted mb-3">{{ __('dashboard-shop-shop-setting.tanzimateGhalebeForooshgahDesc') }}.<p>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.tanzimateGhalebeForooshgahItem1') }}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="menu_show">
                                    <option value="nestead_menu">{{ __('dashboard-shop-shop-setting.tanzimateGhalebeForooshgahItem1Item1') }}</option>
                                    <option value="nestead_box" @if(\Auth::user()->shop()->first()->menu_show == 'nestead_box') selected @endif>{{ __('dashboard-shop-shop-setting.tanzimateGhalebeForooshgahItem1Item2') }}</option>
                                    <option value="mega_menu" @if(\Auth::user()->shop()->first()->menu_show == 'mega_menu') selected @endif>مگا منو (MegaMenu)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">تعداد دسته بندی های منو</label>
                            <div class="col-sm-10">
                              <input class="form-control" type="number" name="menu_show_count" id="example-password-input" value="{{ old('menu_show_count', \Auth::user()->shop()->first()->menu_show_count) }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">دسته بندی های قابل نمایش در اسلاید <i class="fa fa-question-circle" aria-hidden="true" title="در این بخش میتوانید سه دسته بندی را انتخاب نمایید تا در صفحه ی اول فروشگاه شما به نمایش در بیاید. توجه داشته باشید که تعداد انتخابی دسته بندی ها باید سه دسته بندی باشد در غیر این صورت موردی به نمایش در نخواهد آمد . لازم به ذکر میباشد که عکس اسلاید این دسته بندی همان عکس هایی میباشد که در هنگام ساخت دسته بندی به عنوان آیکون میتوانید برای دسته بندی های خود در نظر بگیرید"></i>
                            </label>
                            <div class="col-sm-10">
                                <select data-maximum-selection-length="3" multiple="multiple" class="selectpicker form-control" id="exampleFormControlSelect2" name="slide_category[]" multiple data-live-search="true" title="موردی انتخاب نشده است">
                                    @foreach(\Auth::user()->shop()->first()->productCategories as $category)
                                    <option>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <p class="text-muted mt-1" style="font-size: 11px;margin-right: 2.2rem;">میتوایند سه دسته بندی را انتخاب کنید</p>
                        </div>


                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نمایش آیکون دسته بندی ها</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="cat_image_status">
                                    <option value="enable">فعال</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->cat_image_status == 'disable') selected @endif>غیرفعال</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">تعداد دسته بندی های منو</label>
                            <div class="col-sm-10">
                              <input type="color" class="form-control inputfield" id="favcolor" name="color_1" value="{{ old('color_1', $shopInformation->color_1) }}"><br><br>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.tanzimateGhalebeForooshgahItem2') }}
                                <br /><button type="button" class="btn btn-outline-pink btn-sm mt-2" data-toggle="collapse" data-target="#watermark">{{ __('dashboard-shop-shop-setting.tanzimateGhalebeForooshgahItem2Edit') }}</button>
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="watermark_status">
                                    <option value="enable">{{ __('dashboard-shop-shop-setting.tanzimateGhalebeForooshgahItem2Enable') }}</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->watermark_status == 'disable') selected @endif>{{ __('dashboard-shop-shop-setting.tanzimateGhalebeForooshgahItem2Disable') }}</option>
                                </select>
                            </div>
                            <div class="card mt-1 col-10 mr-8 collapse" id="watermark">
                                <div class="card-body">
                                    <h4 class="header-title"> {{ __('dashboard-shop-shop-setting.tanzimateGhalebeForooshgahItem3') }}</h4>
                                    <input type="file" id="input-file-now" name="watermark" class="dropify" data-default-file="{{ \Auth::user()->shop()->first()->watermark }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center"> {{ __('dashboard-shop-shop-setting.tanzimateGhalebeForooshgahItem4') }}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="VAT">
                                    <option value="enable">{{ __('dashboard-shop-shop-setting.tanzimateGhalebeForooshgahItem4Enable') }}</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->VAT == 'disable') selected @endif>{{ __('dashboard-shop-shop-setting.tanzimateGhalebeForooshgahItem4Disable') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.tanzimateGhalebeForooshgahItem5') }}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="buyCount_show">
                                    <option value="enable">{{ __('dashboard-shop-shop-setting.tanzimateGhalebeForooshgahItem5Enable') }}</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->buyCount_show == 'disable') selected @endif>{{ __('dashboard-shop-shop-setting.tanzimateGhalebeForooshgahItem5Disable') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.tanzimateGhalebeForooshgahItem6') }}
                                <br /><button type="button" class="btn btn-outline-pink btn-sm" data-toggle="collapse" data-target="#demo">{{ __('dashboard-shop-shop-setting.tanzimateGhalebeForooshgahItem6Edit') }}</button>
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="special_offer">
                                    <option value="enable">{{ __('dashboard-shop-shop-setting.tanzimateGhalebeForooshgahItem6Enable') }}</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->special_offer == 'disable') selected @endif>{{ __('dashboard-shop-shop-setting.tanzimateGhalebeForooshgahItem6Disable') }}</option>
                                    <input type="hidden" name="special_offer_text" value="{{ old('special_offer_text', \Auth::user()->shop()->first()->special_offer_text) }}">
                                </select>
                                <div id="demo" class="collapse mt-2">

                                    <a href="#" id="inline-username" class="editable editable-click editable-unsaved font-18" style="background-color: rgba(0, 0, 0, 0);">{{ \Auth::user()->shop()->first()->special_offer_text }}</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->

                <!--end col-->
            </div>
            <div class="text-right mb-3">
                <button data-toggle="modal" data-target="#AddWalletModal" type="submit" class="btn btn-success px-5 py-2  iranyekan rounded ">{{ __('dashboard-shop-shop-setting.sabt') }}</button><br>
            </div>
        </form>
    </div>

    <div class="tab-pane fade" id="template" role="tabpanel">
        <form method="post" action="{{ route('shop.setting.update-template',['id' => \Auth::user()->shop()->first()->id, 'shop' => \Auth::user()->shop->english_name]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">{{ __('dashboard-shop-shop-setting.tanzimateGhalebeForooshgahTitle') }}</h4>
                            <p class="text-muted mb-3">در این بخش میوانید قالب مورد نظر خود را انتخاب نمایید.<p>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                              <div class="img-wrapper m-5 test">
                                  <input type="radio" name="template_id" id="choose-1" value="1" {{ $templates[0]->id == \Auth::user()->shop()->first()->template->id ? 'checked' : ''}}/>
                                  <label for="choose-1">
                                      <img class="extrem-height-image" src="{{ asset('dashboard/assets/images/theme-default.png') }}" />
                                  </label>

                              </div>
                              <div class="img-wrapper m-5 test">
                                  <input type="radio" name="template_id" id="choose-2" value="2" {{ $templates[1]->id == \Auth::user()->shop()->first()->template->id ? 'checked' : ''}}/>
                                  <label for="choose-2">
                                      <img class="extrem-height-image" src="{{ asset('dashboard/assets/images/theme-1.png') }}" />
                                  </label>
                              </div>
                            <div id="result"></div>

                        </div>

                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->

                <!--end col-->
            </div>
          </div>
            <div class="justify-content-end row">
              <div class="text-right mb-3 ">
                  <button data-toggle="modal" data-target="#AddWalletModal" type="submit" class="btn btn-success px-5 py-2  iranyekan rounded ">{{ __('dashboard-shop-shop-setting.sabt') }}</button><br>
              </div>
            </div>
        </form>
      </div>

    <div class="tab-pane fade" id="contact" role="tabpanel">
        <form method="post" action="{{ route('shop.setting.update-contact', ['id' => \Auth::user()->shop()->first()->id, 'shop' => \Auth::user()->shop->english_name]) }}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title"> {{ __('dashboard-shop-shop-setting.etelaateTamaseForooshgahTitle') }}</h4>
                            <p class="text-muted mb-3">{{ __('dashboard-shop-shop-setting.etelaateTamaseForooshgahDesc') }}.<p>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-password-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.etelaateTamaseForooshgahItem1') }}</label>
                                <input class="form-control" type="email" name="shop_email" style="direction: ltr" id="example-password-input" value="{{ old('shop_email', $shopContactInformation->shop_email) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fas fa-envelope text-dark font-18"></i></span></div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-password-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.etelaateTamaseForooshgahItem2') }}</label>
                                <input class="form-control" type="text" name="tel" placeholder="{{ __('dashboard-shop-shop-setting.etelaateTamaseForooshgahItem2ex') }}" id="example-password-input" value="{{ old('tel', $shopContactInformation->tel) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fas fa-phone text-dark font-18"></i></span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-tel-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.etelaateTamaseForooshgahItem3') }}</label>
                                <input class="form-control" type="text" name="phone" disabled value="{{ old('phone', \Auth::user()->mobile) }}" id="example-tel-input">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fas fa-mobile-alt text-dark font-18"></i></span></div>
                            </div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">شبکه های اجتماعی</h4>
                            <p class="text-muted mb-3">در این بخش میتوانید شبکه های اجتماعی فروشگاه خود را ویرایش کنید . این شبکه های اجتماعی در صورت فعال بودن در صفحه ی اول فروشگاه برای کابران به نمایش در خواهد آمد.<p>
                        </div>




                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.etelaateTamaseForooshgahItem7') }}</label>
                                <input type="text" class="form-control" name="telegram_url" placeholder="{{ __('dashboard-shop-shop-setting.etelaateTamaseForooshgahItem6ex') }}" value="{{ old('telegram_url', $shopContactInformation->telegram_url) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fab fa-telegram text-dark font-18"></i></span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.etelaateTamaseForooshgahItem8') }}</label>
                                <input type="text" class="form-control" name="instagram_url" placeholder="{{ __('dashboard-shop-shop-setting.etelaateTamaseForooshgahItem8ex') }}" value="{{ old('instagram_url', $shopContactInformation->instagram_url) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fab fa-instagram text-dark font-18"></i></span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.etelaateTamaseForooshgahItem9') }}</label>
                                <input type="text" class="form-control" name="facebook_url" placeholder="{{ __('dashboard-shop-shop-setting.etelaateTamaseForooshgahItem9ex') }}" value="{{ old('facebook_url', $shopContactInformation->facebook_url) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fab fa-facebook-f text-dark font-18"></i></span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.etelaateTamaseForooshgahItem10') }}</label>
                                <input type="text" class="form-control" name="soroush_url" value="{{ old('soroush_url', $shopContactInformation->soroush_url) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fa fa-bullseye text-dark font-18"></i></span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.etelaateTamaseForooshgahItem11') }}</label>
                                <input type="text" class="form-control" name="bisphone_url"  value="{{ old('bisphone_url', $shopContactInformation->bisphone_url) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fa fa-certificate	 text-dark font-18"></i></span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.etelaateTamaseForooshgahItem12') }}</label>
                                <input type="text" class="form-control" name="Igap_url" value="{{ old('Igap_url', $shopContactInformation->Igap_url) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fa fa-check-circle text-dark font-18"></i></span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.etelaateTamaseForooshgahItem13') }}</label>
                                <input type="text" class="form-control" name="gap_url" value="{{ old('gap_url', $shopContactInformation->gap_url) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fa fa-comment	 text-dark font-18"></i></span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.etelaateTamaseForooshgahItem14') }}</label>
                                <input type="text" class="form-control" name="wispi_url" value="{{ old('wispi_url', $shopContactInformation->wispi_url) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fa fa-hashtag	 text-dark font-18"></i></span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.etelaateTamaseForooshgahItem15') }}</label>
                                <input type="text" class="form-control" name="bale_url" value="{{ old('bale_url', $shopContactInformation->bale_url) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fa fa-envelope-open	 text-dark font-18"></i></span></div>
                            </div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">موقعیت فروشگاه</h4>
                            <p class="text-muted mb-3">در این بخش میتوانید موقعیت مکانی فروشگاه خود را به صورت دقیق مشخص نمایید.<p>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-week-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.etelaateTamaseForooshgahItem4') }}</label>
                                <input class="form-control" type="text" name="province" placeholder="{{ __('dashboard-shop-shop-setting.etelaateTamaseForooshgahItem4ex') }}" id="example-week-input" value="{{ old('province', $shopContactInformation->province) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fas fa-map text-dark font-18"></i></span></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-week-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.etelaateTamaseForooshgahItem5') }}</label>
                                <input class="form-control" type="text" name="city" placeholder="{{ __('dashboard-shop-shop-setting.etelaateTamaseForooshgahItem5ex') }}" id="example-week-input" value="{{ old('city', $shopContactInformation->city) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fas fa-city text-dark font-18"></i></span></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.etelaateTamaseForooshgahItem6') }}</label>
                                <input class="form-control" type="text" name="address" placeholder="{{ __('dashboard-shop-shop-setting.etelaateTamaseForooshgahItem6ex') }}" id="example-datetime-local-input"
                                  value="{{ old('address', $shopContactInformation->address) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fas fa-address-card text-dark font-18"></i></span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-password-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.etelaateTamaseForooshgahItem16') }}</label>
                                @if($shopContactInformation->lat >= 5)
                                <label style="color: red" for="example-password-input" class="col-sm-2 col-form-label text-center">لوکیشن در نقشه ثبت شده است. درصورت نیاز آنرا تغییر دهید:</label>
                                @endif

                                <div class="input-group-append">
                                    <div id="map"></div>
                                    <input name="lat" value="{{ $shopContactInformation->lat ? $shopContactInformation->lat : '35.6969331' }}" type="hidden" id="lat"><br>
                                    <input name="lng" value="{{ $shopContactInformation->lng ? $shopContactInformation->lng : '51.2796073' }}" type="hidden" id="lng">
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
                <button data-toggle="modal" data-target="#AddWalletModal" type="submit" class="btn btn-success px-5 py-2  iranyekan rounded">ثبت تغییرات</button><br>
            </div>
        </form>
    </div>

    <div class="tab-pane fade" id="invoice" role="tabpanel">
        <form method="post" action="{{ route('invoice.update', ['Invoice' => \Auth::user()->shop()->first()->invoice, 'shop' => \Auth::user()->shop->english_name]) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahTitle') }}</h4>
                            <p class="text-muted mb-3">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahDesc') }}.<p>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItem1') }}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="sign">
                                    <option value="enable">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemEnable') }}</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->sign == 'disable') selected @endif>{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemDisable') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItem2') }}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="logo">
                                    <option value="enable">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemEnable') }}</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->logo == 'disable') selected @endif>{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemDisable') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItem3') }}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="date">
                                    <option value="enable">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemEnable') }}</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->date == 'disable') selected @endif>{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemDisable') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItem4') }}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="number">
                                    <option value="enable">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemEnable') }}</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->number == 'disable') selected @endif>{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemDisable') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItem5') }}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="custom_info">
                                    <option value="enable">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemEnable') }}</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->custom_info == 'disable') selected @endif>{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemDisable') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItem6') }}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="seller_info">
                                    <option value="enable">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemEnable') }}</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->seller_info == 'disable') selected @endif>{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemDisable') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItem8') }}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="address">
                                    <option value="enable">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemEnable') }}</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->address == 'disable') selected @endif>{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemDisable') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItem9') }}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="tel">
                                    <option value="enable">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemEnable') }}</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->tel == 'disable') selected @endif>{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemDisable') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItem10') }}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="email">
                                    <option value="enable">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemEnable') }}</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->email == 'disable') selected @endif>{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemDisable') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItem11') }}
                                <br /><button type="button" class="btn btn-outline-pink btn-sm mt-2" data-toggle="collapse" data-target="#economic_code_number">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItem11Edit') }}</button>
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="economic_code">
                                    <option value="enable">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemEnable') }}</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->economic_code == 'disable') selected @endif>{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemDisable') }}</option>
                                </select>
                                <div id="economic_code_number" class="collapse mt-2">
                                    <input class="form-control border-custom" type="text" name="economic_code_number" value="{{ old('economic_code_number', \Auth::user()->shop()->first()->invoice->economic_code_number) }}">
                                </div>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItem12') }}
                                <br /><button type="button" class="btn btn-outline-pink btn-sm mt-2" data-toggle="collapse" data-target="#registration_number‌_number">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItem12Edit') }}</button>
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control" name=" registration_number">
                                    <option value="enable">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemEnable') }}</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->registration_number == 'disable') selected @endif>{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemDisable') }}</option>
                                </select>
                                <div id="registration_number‌_number" class="collapse mt-2">
                                    <input class="form-control border-custom" type="text" name="registration_number‌_number" value="{{ old('registration_number‌_number', \Auth::user()->shop()->first()->invoice->registration_number‌_number) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItem13') }}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="vat">
                                    <option value="enable">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemEnable') }}</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->vat == 'disable') selected @endif>{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemDisable') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItem14') }}
                                <br /><button type="button" class="btn btn-outline-pink btn-sm mt-2" data-toggle="collapse" data-target="#description">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItem14Edit') }}</button>
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="description_status">
                                    <option value="enable">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemEnable') }}</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->description_status == 'disable') selected @endif>{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemDisable') }}</option>
                                </select>
                                <div id="description" class="collapse mt-2">
                                    <input class="form-control border-custom" type="text" name="description" value="{{ old('description', \Auth::user()->shop()->first()->invoice->description) }}">
                                </div>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItem15') }}
                                <br /><button type="button" class="btn btn-outline-pink btn-sm mt-2" data-toggle="collapse" data-target="#motto_text">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItem15Edit') }}</button>
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="motto">
                                    <option value="enable">{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemEnable') }}</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->motto == 'disable') selected @endif>{{ __('dashboard-shop-shop-setting.tanzimaateFactoreForooshgahItemDisable') }}</option>
                                </select>
                                <div id="motto_text" class="collapse mt-2">
                                    <input class="form-control border-custom" type="text" name="motto_text" value="{{ old('motto_text', \Auth::user()->shop()->first()->invoice->motto_text) }}">
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
  <script src="{{ asset('/dashboard/assets/js/bootstrap.bundle.min-2.js') }}"></script>
  <script src="{{ asset('/dashboard/assets/js/bootstrap-select.min.js') }}"></script>
  <script src="{{ asset('/dashboard/assets/js/admin-shop-setting.js') }}"></script>

  <script>
      $(document).on('click', '#icon-delete', function(e) {
          e.preventDefault();
          var id = $(this).data('id');
          var name = $(this).data('name');
          var type = $(this).data('type');
          swal(` ${'حذف لوگو یا آیکون:'} ${name} | ${'آیا اطمینان دارید؟'}`, {
                  dangerMode: true,
                  icon: "warning",
                  buttons: ["انصراف", "حذف"],
              })
              .then(function(isConfirm) {
                  if (isConfirm) {
                      $.ajax({
                          type: "post",
                          url: "{{url('admin-panel/shop/managment/shop-setting/image/delete')}}",
                          data: {
                              id: id,
                              type: type,
                              "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                          },
                          success: function(data) {
                              var url = document.location.origin + "/admin-panel/shop/managment/shop-setting";
                              location.href = url;
                          }
                      });
                  } else {
                      toastr.warning('لغو شد.', '', []);
                  }
              });
      });



      //map//Set up some of our variables.
      var map; //Will contain map object.
      var marker = false; ////Has the user plotted their location marker?

      //Function called to initialize / create the map.
      //This is called when the page has loaded.
      function initMap() {

          //The center location of our map.
          var centerOfMap = new google.maps.LatLng({{ $shopContactInformation->lat ? $shopContactInformation->lat : '35.6969331' }}, {{ $shopContactInformation->lng ? $shopContactInformation->lng : '51.2796073' }});

          //Map options.
          var options = {
            center: centerOfMap, //Set center.
            zoom: 15 //The zoom value.
          };

          //Create the map object.
          map = new google.maps.Map(document.getElementById('map'), options);

          //Listen for any clicks on the map.
          google.maps.event.addListener(map, 'click', function(event) {
              //Get the location that the user clicked.
              var clickedLocation = event.latLng;
              //If the marker hasn't been added.
              if(marker === false){
                  //Create the marker.
                  marker = new google.maps.Marker({
                      position: clickedLocation,
                      map: map,
                      draggable: true //make it draggable
                  });
                  //Listen for drag events!
                  google.maps.event.addListener(marker, 'dragend', function(event){
                      markerLocation();
                  });
              } else{
                  //Marker has already been added, so just change its location.
                  marker.setPosition(clickedLocation);
              }
              //Get the marker's location.
              markerLocation();
          });
      }

      //This function will get the marker's current location and then add the lat/long
      //values to our textfields so that we can save the location.
      function markerLocation(){
          //Get location.
          var currentLocation = marker.getPosition();
          //Add lat and lng values to a field that we can save.
          document.getElementById('lat').value = currentLocation.lat(); //latitude
          document.getElementById('lng').value = currentLocation.lng(); //longitude
      }


      //Load the map when the page has finished loading.
      google.maps.event.addDomListener(window, 'load', initMap);

  </script>
  <script type="text/javascript">
  $(document).ready(function(){

      if ($(".radio").attr("checked") == "checked") {
        $(".radio").parent().parent().addClass("outline")
      }
    });

  </script>
  <script type="text/javascript">
  $('.radio').click(function() {
    $(this).parent().parent().toggleClass("outline")

});
  </script>
@stop
