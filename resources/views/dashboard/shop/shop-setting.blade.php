@extends('dashboard.layouts.master')
@section('content')
<link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">
<style type="text/css">
  #map{ width:500px; height: 300px; }
</style>
<style media="screen">
    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        background-color: #122272 !important;
        color: white;
    }

    .img-wrapper {
        overflow: hidden;
        position: relative;
        float: left;
        height: 250px;
        width: 400px;
        border: 2px solid #122272;
        border-radius: 5px 5px 5px 5px;
    }

    .extrem-height-image {
        position: absolute;
        top: 0;
        width: 400px;
        height: auto;
        transition: top 2s ease-out 0s;
    }

    .extrem-height-image:hover {
        top: -300px;
    }
</style>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right">
                <ol style="direction: ltr" class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">فروشگاه</a></li>
                    <li class="breadcrumb-item active">تنظیمات فروشگاه</li>
                </ol>
            </div>
            <h4 class="page-title">تنظیمات فروشگاه</h4>
        </div>
        <!--end page-title-box-->
    </div>
    <!--end col-->
</div>
@include('dashboard.layouts.errors')

<ul class="nav nav-tabs md-tabs nav-justified primary-color" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#info" role="tab">
            <i class="fas fa-info-circle m-1"></i>اطلاعات فروشگاه</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#theme" role="tab">
            <i class="fa fa-cog pr-2 m-1"></i>تنظیمات قالب فروشگاه</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#contact" role="tab">
            <i class="fas fa-address-book m-1"></i>اطلاعات تماس فروشگاه</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#invoice" role="tab">
            <i class="fa fa-receipt m-1"></i>فاکتور فروشگاه</a>
    </li>
</ul>


<div class="tab-content">

    <div class="tab-pane fade in show active" id="info" role="tabpanel">
        <form method="post" action="{{ route('shop-setting.update', \Auth::user()->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mt-0 header-title">اطلاعات فروشگاه</h3>
                            <p class="text-muted mb-3">در این بخش میتوانید اطلاعات اصلی فروشگاه خود را مشاهده و در صورت نیاز آن ها را ویرایش نمایید. توجه داشته باشید که نام فروشگاه شما به عنوان نام اصلی فروشگاه و نام لاتین به عنوان آدرس فروشگاه در نظر گرفته خواهد شد . همچنین دسته بندی فروشگاه شما از اهمیت بالایی برخوردار میباشید زیرا قالب های پیشنهادی بر اساس دسته بندی فروشگاه شما ارائه خواهد شد.</p><br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label text-center">نام</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="firstName" disabled value="{{ \Auth::user()->firstName }}" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نام خانوادگی</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="lastName" disabled value="{{ \Auth::user()->lastName }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نام فروشگاه</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="name" placeholder="مثال: پایان پی" value="{{ old('title', $shopInformation->name) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row  mb-0">
                                        <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نام فروشگاه(لاتین)
                                            <p class="text-muted mt-1" style="font-size: 11px;">این نام به عنوان آدرس اینترنتی شما انتخاب خواهد شد </p>
                                        </label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="english_name" value="{{ old('english_name', $shopInformation->english_name) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">دسته بندی فروشگاه </label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="category_id">
                                                @if($shopInformation->category_id != null)
                                                    <option value="">یک مورد را انتخاب نمایید</option>
                                                    @endif
                                                    @foreach ($shopCategories as $shopCategory)
                                                    <option {{ $shopCategory->id == $shopInformation->category_id ? 'selected' : ''}} value="{{ $shopCategory->id }}">{{ $shopCategory->name }}</option>
                                                    @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">توضیحات فروشگاه </label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="description" placeholder="مثال: فروش و توضیع محصولات با کیفیت" value="{{ old('description', $shopInformation->description) }}">
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-4 border-left p-3">
                                    <div class="media setting-card"><span class="sett-card-icon set-icon-purple"><i class="fa fa-shipping-fast"></i></span>
                                        <div class="media-body align-self-center">
                                            <div class="setting-detail">
                                                <h3 class="mb-0 mt-0 iranyekan">ارسال سریع</h3>
                                                <p class="text-muted mb-0">
                                                    حداقل مبلغ سبد خرید فقط برای تهران ۰ تومان.</p>
                                            </div>
                                            <div class="mt-3 row">
                                                <div class="custom-control custom-switch switch-blue mr-5 p-3 col-2">
                                                    <input type="checkbox" class="custom-control-input" id="quick_way_on" name="quick_way" @if($shopInformation->quick_way == 'enable') checked @endif>
                                                        <label class="custom-control-label iranyekan font-15" for="quick_way_on">فعال</label>
                                                </div>

                                            </div>
                                            <!--end /div-->
                                        </div>
                                        <!--end media body-->
                                    </div>
                                    <!--end media-->

                                </div>
                                <!--end col-->
                                <div class="col-lg-4 border-left p-3">
                                    <div class="media setting-card"><span class="sett-card-icon set-icon-success"><i class="fa fa-truck"></i></span>
                                        <div class="media-body align-self-center">
                                            <div class="setting-detail">
                                                <h3 class="mb-0 mt-0 iranyekan"> ارسال پستی</h3>
                                                <p class="text-muted mb-0">

                                                    هزینه ارسال برای تهران ۵٫۰۰۰ تومان.</p>
                                            </div>
                                            <div class="mt-3 row">
                                                <div class="custom-control custom-switch switch-blue mr-5 p-3 col-2">
                                                    <input type="checkbox" class="custom-control-input" id="posting_way_on" name="posting_way" @if($shopInformation->posting_way == 'enable') checked @endif>
                                                        <label class="custom-control-label iranyekan font-15" for="posting_way_on">فعال</label>
                                                </div>

                                            </div>
                                            <!--end /div-->
                                        </div>
                                        <!--end media body-->
                                    </div>
                                    <!--end media-->

                                </div>
                                <!--end col-->
                                <div class="col-lg-4  p-3">
                                    <div class="media setting-card"><span class="sett-card-icon set-icon-danger"><i class="fas fa-people-carry"></i></span>
                                        <div class="media-body align-self-center">
                                            <div class="setting-detail">
                                                <h3 class="mb-0 mt-0 iranyekan">دریافت حضوری</h3>
                                                <p class="text-muted mb-0">

                                                    امکان دریافت حضوری محصولات فروشگاه.</p>
                                            </div>
                                            <div class="mt-3 row">
                                                <div class="custom-control custom-switch switch-blue mr-5 p-3 col-2">
                                                    <input type="checkbox" class="custom-control-input" id="person_way_on" name="person_way" @if($shopInformation->person_way == 'enable') checked @endif>
                                                        <label class="custom-control-label iranyekan font-15" for="person_way_on">فعال</label>
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
                            <h4 class="mt-0 header-title">آیکون فروشگاه</h4>
                            <p class="text-muted mb-3">لطفا آیکون فروشگاه خود را آپلود نمایید.</p>
                            <a class="mr-2 font-15" href="" id="icon-delete" title="حذف آیکون" data-type="icon" data-name="{{ \Auth::user()->shop()->first()->english_name }}" data-id="{{ \Auth::user()->shop()->first()->id }}"><i
                                  class="far fa-trash-alt text-danger font-18 pl-2"></i>حذف</a>
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
                            <h4 class="mt-0 header-title">لوگوی فروشگاه</h4>
                            <p class="text-muted mb-3">لطفا لوگوی فروشگاه خود را آپلود نمایید.</p>
                            <a class="mr-2 font-15" href="" id="icon-delete" title="حذف لوگو" data-type="logo" data-name="{{ \Auth::user()->shop()->first()->english_name }}" data-id="{{ \Auth::user()->shop()->first()->id }}"><i
                                  class="far fa-trash-alt text-danger font-18 pl-2"></i>حذف</a>
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
                            <h4 class="mt-0 header-title">اطلاعات حساب جهت تسویه</h4>
                            <p class="text-muted mb-3">لطفا شماره شبای حسابی که تمایل دارید درآمد شما از فروشگاه به آن واریز شود را وارد کنید. در صورتی که شماره شبای حساب خود را ندارید، می‌توانید از سایت بانکی که در آن حساب باز کرده‌اید اقدام به
                                دریافت شماره
                                شبا نمایید.

                                توجه کنید که شماره شبای وارد شده باید به نام صاحب فروشگاه باشد. در صورت وجود هرگونه مغایرت تسویه انجام نخواهد شد.<p>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">شماره شبا</label>

                                <input type="text" class="form-control" placeholder="مثال: 49489415618941894125649653">
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
                <button data-toggle="modal" data-target="#AddWalletModal" type="submit" class="btn btn-success px-5 py-2  iranyekan rounded ">ثبت تغییرات</button><br>
            </div>
        </form>
    </div>

    <div class="tab-pane fade" id="theme" role="tabpanel">
        <form method="post" action="{{ route('shop-setting.setting-update', \Auth::user()->shop()->first()->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">تنظیمات صفحه فروشگاه</h4>
                            <p class="text-muted mb-3">در این بخش میتوانید تنظیمات قالب فعلی فروشگاه خود را مشاهده نمایید و در صورت نیاز آن را ویرایش نمایید. همچنین میتوانید قبل از انتخاب قالب جدید آن را در بخش پیش نمایش مشاهده کرده و سپس به انتخاب آن بپردازید.<p>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نمایش دسته بندی های سایت</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="menu_show">
                                    <option value="nestead_menu">منوی تو در تو در هدر فروشگاه</option>
                                    <option value="nestead_box" @if(\Auth::user()->shop()->first()->menu_show == 'nestead_box') selected @endif>باکس تو در تو در صفحه نمایش محصولات</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">واترمارک روی تصویر محصولات
                                <br /><button type="button" class="btn btn-outline-pink btn-sm mt-2" data-toggle="collapse" data-target="#watermark">ویرایش تصویر</button>
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="watermark_status">
                                    <option value="enable">فعال</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->watermark_status == 'disable') selected @endif>غیر فعال</option>
                                </select>
                            </div>
                            <div class="card mt-1 col-10 mr-8 collapse" id="watermark">
                                <div class="card-body">
                                    <h4 class="header-title"> تصویر واترمارک</h4>
                                    <input type="file" id="input-file-now" name="watermark" class="dropify" data-default-file="{{ \Auth::user()->shop()->first()->watermark }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">محاسبه درصد مالیات بر ارزش افزوده</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="VAT">
                                    <option value="enable">فعال</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->VAT == 'disable') selected @endif>غیرفعال</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نمایش تعداد فروش های هر محصول به کاربران</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="buyCount_show">
                                    <option value="enable">فعال</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->buyCount_show == 'disable') selected @endif>غیرفعال</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نمایش پیغام پیشنهاد ویژه در بالای تمامی صفحات
                                <br /><button type="button" class="btn btn-outline-pink btn-sm" data-toggle="collapse" data-target="#demo">ویرایش پیغام</button>
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="special_offer">
                                    <option value="enable">فعال</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->special_offer == 'disable') selected @endif>غیرفعال</option>
                                    <input type="hidden" name="special_offer_text" value="{{ \Auth::user()->shop()->first()->special_offer_text }}">
                                </select>
                                <div id="demo" class="collapse mt-2">

                                    <a href="#" id="inline-username" class="editable editable-click editable-unsaved font-18" style="background-color: rgba(0, 0, 0, 0);">{{ \Auth::user()->shop()->first()->special_offer_text }}</a>
                                </div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">تم وبسایت</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="template_id" id="AgencyDetails">
                                    <option {{ $templates[0]->id == \Auth::user()->shop()->first()->template->id ? 'selected' : ''}} value="{{ $templates[0]->id }}" data-type='<div class="img-wrapper m-5">
                                        <img class="extrem-height-image" src="{{ asset('dashboard/assets/images/theme-default.png') }}"/>
                                    </div>'>{{ $templates[0]->name }}</option>
                                    <option {{ $templates[1]->id == \Auth::user()->shop()->first()->template->id ? 'selected' : ''}} value="{{ $templates[1]->id }}" data-type='<div class="img-wrapper m-5">
                                        <img class="extrem-height-image" src="{{ asset('dashboard/assets/images/theme-1.png') }}"/>
                                    </div>'>{{ $templates[1]->name }}</option>
                                </select>
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
            <div class="text-right mb-3">
                <button data-toggle="modal" data-target="#AddWalletModal" type="submit" class="btn btn-success px-5 py-2  iranyekan rounded ">ثبت تغییرات</button><br>
            </div>
        </form>
    </div>

    <div class="tab-pane fade" id="contact" role="tabpanel">
        <form method="post" action="{{ route('shop.setting.update-contact', \Auth::user()->shop()->first()->id) }}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title"> اطلاعات ارتباطی فروشگاه</h4>
                            <p class="text-muted mb-3">در این بخش میتوانید اطلاعات ارتباطی فروشگاه را مشاهده و یا آن ها را ویرایش نمایید . لازم بذکر میباشد که این اطلاعات در صفحه ی تماس با ما برای خریداران به نمایش در خواهد آمد.<p>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-password-input" class="col-sm-2 col-form-label text-center">ایمیل فروشگاه</label>
                                <input class="form-control" type="email" name="shop_email" style="direction: ltr" id="example-password-input" value="{{ old('shop_email', $shopContactInformation->shop_email) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fas fa-envelope text-dark font-18"></i></span></div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-password-input" class="col-sm-2 col-form-label text-center">تلفن ثابت فروشگاه</label>
                                <input class="form-control" type="text" name="tel" placeholder="مثال: 22657485-021" id="example-password-input" value="{{ old('tel', $shopContactInformation->tel) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fas fa-phone text-dark font-18"></i></span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-tel-input" class="col-sm-2 col-form-label text-center">تلفن همراه</label>
                                <input class="form-control" type="text" name="phone" disabled value="{{ \Auth::user()->mobile }}" id="example-tel-input">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fas fa-mobile-alt text-dark font-18"></i></span></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-week-input" class="col-sm-2 col-form-label text-center">استان فروشگاه</label>
                                <input class="form-control" type="text" name="province" placeholder=" مثال: تهران" id="example-week-input" value="{{ old('province', $shopContactInformation->province) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fas fa-map text-dark font-18"></i></span></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-week-input" class="col-sm-2 col-form-label text-center">شهر فروشگاه</label>
                                <input class="form-control" type="text" name="city" placeholder=" مثال: تهران" id="example-week-input" value="{{ old('city', $shopContactInformation->city) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fas fa-city text-dark font-18"></i></span></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">آدرس فروشگاه</label>
                                <input class="form-control" type="text" name="address" placeholder="مثال: خیابان پاسداران - گلستان چهارم - پلاک ۲۱ - واحد ۱۱" id="example-datetime-local-input"
                                  value="{{ old('address', $shopContactInformation->address) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fas fa-address-card text-dark font-18"></i></span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">تلگرام</label>
                                <input type="text" class="form-control" name="telegram_url" placeholder="مثال: tg://msg?text = www.example.com?t=12" value="{{ old('telegram_url', $shopContactInformation->telegram_url) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fab fa-telegram text-dark font-18"></i></span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">اینستاگرام</label>
                                <input type="text" class="form-control" name="instagram_url" placeholder="مثال: https://www.instagram.com/john_doe" value="{{ old('instagram_url', $shopContactInformation->instagram_url) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fab fa-instagram text-dark font-18"></i></span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">فیسبوک</label>
                                <input type="text" class="form-control" name="facebook_url" placeholder="مثال: https://www.facebook.com/ZambianWatchdog" value="{{ old('facebook_url', $shopContactInformation->facebook_url) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fab fa-facebook-f text-dark font-18"></i></span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">سروش</label>
                                <input type="text" class="form-control" name="soroush_url" value="{{ old('soroush_url', $shopContactInformation->soroush_url) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fa fa-bullseye text-dark font-18"></i></span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">بیسفون</label>
                                <input type="text" class="form-control" name="bisphone_url"  value="{{ old('bisphone_url', $shopContactInformation->bisphone_url) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fa fa-certificate	 text-dark font-18"></i></span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">آی گپ</label>
                                <input type="text" class="form-control" name="Igap_url" value="{{ old('Igap_url', $shopContactInformation->Igap_url) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fa fa-check-circle text-dark font-18"></i></span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">گپ</label>
                                <input type="text" class="form-control" name="gap_url" value="{{ old('gap_url', $shopContactInformation->gap_url) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fa fa-comment	 text-dark font-18"></i></span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">ویسپی</label>
                                <input type="text" class="form-control" name="wispi_url" value="{{ old('wispi_url', $shopContactInformation->wispi_url) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fa fa-hashtag	 text-dark font-18"></i></span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-center">بله</label>
                                <input type="text" class="form-control" name="bale_url" value="{{ old('bale_url', $shopContactInformation->bale_url) }}">
                                <div class="input-group-append"><span class="input-group-text bg-ligh text-white font-weight-bold" id="basic-addon8"> <i class="fa fa-envelope-open	 text-dark font-18"></i></span></div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-12 input-group">
                                <label for="example-password-input" class="col-sm-2 col-form-label text-center">آدرس در نقشه</label>
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
        <form method="post" action="{{ route('invoice.update', \Auth::user()->shop()->first()->invoice) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">تنظیمات فاکتور فروشگاه</h4>
                            <p class="text-muted mb-3">در این بخش میتوانید فاکتور فروشگاه را شخصی سازی نمایید . توجه داشته باشید که هر بخشی که فعال باشد در فاکتور کاربر درج خواهد شد . همچنین شما میتوانید مواردی که قابلیت ویرایش در این بخش را دارند ویرایش نمایید.<p>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نمایش محل امضا</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="sign">
                                    <option value="enable">فعال</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->sign == 'disable') selected @endif>غیرفعال</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نمایش لوگو</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="logo">
                                    <option value="enable">فعال</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->logo == 'disable') selected @endif>غیرفعال</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نمایش تاریخ</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="date">
                                    <option value="enable">فعال</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->date == 'disable') selected @endif>غیرفعال</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نمایش شماره فاکتور</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="number">
                                    <option value="enable">فعال</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->number == 'disable') selected @endif>غیرفعال</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نمایش اطلاعات خریدار</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="custom_info">
                                    <option value="enable">فعال</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->custom_info == 'disable') selected @endif>غیرفعال</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نمایش اطلاعات فروشنده</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="seller_info">
                                    <option value="enable">فعال</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->seller_info == 'disable') selected @endif>غیرفعال</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نمایش مهر تایید بر روی فاکتور</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="approved">
                                    <option value="enable">فعال</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->approved == 'disable') selected @endif>غیرفعال</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نمایش آدرس فروشنده</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="address">
                                    <option value="enable">فعال</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->address == 'disable') selected @endif>غیرفعال</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نمایش شماره فروشنده</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="tel">
                                    <option value="enable">فعال</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->tel == 'disable') selected @endif>غیرفعال</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نمایش ایمیل فروشنده</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="email">
                                    <option value="enable">فعال</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->email == 'disable') selected @endif>غیرفعال</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نمایش کد اقتصادی
                                <br /><button type="button" class="btn btn-outline-pink btn-sm mt-2" data-toggle="collapse" data-target="#economic_code_number">ویرایش کد اقتصادی</button>
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="economic_code">
                                    <option value="enable">فعال</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->economic_code == 'disable') selected @endif>غیرفعال</option>
                                </select>
                                <div id="economic_code_number" class="collapse mt-2">
                                    <input class="form-control border-custom" type="text" name="economic_code_number" value="{{ \Auth::user()->shop()->first()->invoice->economic_code_number }}">
                                </div>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نمایش شماره ثبت
                                <br /><button type="button" class="btn btn-outline-pink btn-sm mt-2" data-toggle="collapse" data-target="#registration_number‌_number">ویرایش شماره ثبت</button>
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control" name=" registration_number">
                                    <option value="enable">فعال</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->registration_number == 'disable') selected @endif>غیرفعال</option>
                                </select>
                                <div id="registration_number‌_number" class="collapse mt-2">
                                    <input class="form-control border-custom" type="text" name="registration_number‌_number" value="{{ \Auth::user()->shop()->first()->invoice->registration_number‌_number }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نمایش مالیات بر ارزش افزوده</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="vat">
                                    <option value="enable">فعال</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->vat == 'disable') selected @endif>غیرفعال</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نمایش توضیحات در فاکتور
                                <br /><button type="button" class="btn btn-outline-pink btn-sm mt-2" data-toggle="collapse" data-target="#description">ویرایش متن توضیحات</button>
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="description_status">
                                    <option value="enable">فعال</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->description_status == 'disable') selected @endif>غیرفعال</option>
                                </select>
                                <div id="description" class="collapse mt-2">
                                    <input class="form-control border-custom" type="text" name="description" value="{{ \Auth::user()->shop()->first()->invoice->description }}">
                                </div>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">نمایش شعار ( پند ) در فاکتور
                                <br /><button type="button" class="btn btn-outline-pink btn-sm mt-2" data-toggle="collapse" data-target="#motto_text">ویرایش متن شعار ( پند )</button>
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="motto">
                                    <option value="enable">فعال</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->invoice->motto == 'disable') selected @endif>غیرفعال</option>
                                </select>
                                <div id="motto_text" class="collapse mt-2">
                                    <input class="form-control border-custom" type="text" name="motto_text" value="{{ \Auth::user()->shop()->first()->invoice->motto_text }}">
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
<script type="text/javascript">
    $('#AgencyDetails').on('change', function() {
        $('#result').html($(this).find('option:selected').data('type'));
    });
</script>
<script src="/dashboard/assets/plugins/dropify/js/dropify.min.js"></script>
<script src="/dashboard/assets/pages/jquery.form-upload.init.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".dropify-clear").remove();
    });
</script>
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
                        url: "{{url('dashboard/shop/managment/shop-setting/image/delete')}}",
                        data: {
                            id: id,
                            type: type,
                            "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
                        },
                        success: function(data) {
                            var url = document.location.origin + "/dashboard/shop/managment/shop-setting";
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
@stop
