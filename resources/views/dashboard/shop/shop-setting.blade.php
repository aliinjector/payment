@extends('dashboard.layouts.master')
@section('content')
<link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">
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
        height: 300px;
        width: 400px;
        border: 5px solid #BBB;
        border-radius: 5px 5px 5px 5px;
    }

    .extrem-height-image {
        position: absolute;
        top: 0;
        width: 400px;
        height: auto;
        transition: top 5s ease-out 0s;
    }

    .extrem-height-image:hover {
        top: -300px;
    }
</style>
<div class="row">
  <div class="img-wrapper">
    <img class="extrem-height-image" src="{{ asset('dashboard/assets/images/theme-1.png') }}"/>
</div>

    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right">
                <ol style="direction: ltr" class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">احراز هویت</a></li>
                    <li class="breadcrumb-item active">داشبورد پین پی</li>
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
                            <p class="text-muted mb-3">در این قسمت اطلاعات فروشگاه خود وارد نموده و موارد درخواستی را آپلود نمایید سپس منتظر تایید اطلاعات توسط تیم پایان پی باشید.</p><br>
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
                                                        <label class="custom-control-label iranyekan font-15" for="quick_way_on">رفعال</label>
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
        <form method="post" action="{{ route('shop-setting.setting-update', \Auth::user()->shop()->first()->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">تنظیمات صفحه فروشگاه</h4>
                            <p class="text-muted mb-3">در این بخش میتوانید تنظیمات کلی صفحه اختصاصی فروشگاه خود را مدیریت کنید<p>
                        </div>
                        <div class="form-group row">
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">تم وبسایت</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="menu_show">
                                    <option value="nestead_menu">قالب پیشفرض</option>
                                    <option value="nestead_box">قالب فروشگاه امید شاپ</option>
                                </select>
                            </div>
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
                            <label style="text-align: center" for="example-email-input" class="col-sm-2 col-form-label text-center">محاسبه درصد مالیات بر ارزش افزوده</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="VAT">
                                    <option value="enable">فعال</option>
                                    <option value="disable" @if(\Auth::user()->shop()->first()->VAT == 'disable') selected @endif>غیرفعال</option>
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
                            <p class="text-muted mb-3">در این بخش میتوانید اطلاعات ارتباط فروشگاه خود را وارد کنید.<p>
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

</div>






@endsection


@section('pageScripts')
<script src="/dashboard/assets/plugins/dropify/js/dropify.min.js"></script>
<script src="/dashboard/assets/pages/jquery.form-upload.init.js"></script>
@stop
