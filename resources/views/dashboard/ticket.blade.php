@extends('dashboard.layouts.master')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol style="direction: ltr" class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">پشتیبانی و تیکتینگ</a></li>
                        <li class="breadcrumb-item active">داشبورد پین پی</li>
                    </ol>
                </div>
                <h4 class="page-title">داشبورد اصلی</h4></div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">تعداد تیکت های ثبت شده شما</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">۲۶ </h3><i class="dripicons-user-group card-eco-icon text-pink align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">تعداد تیکت های باز شما</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">۴</h3><i class="dripicons-cart card-eco-icon text-secondary align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">تعداد تیکت های در انتظار پاسخ </h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">۳ </h3><i class="dripicons-jewel card-eco-icon text-warning align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">تعداد تیکت های در بسته شده </h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">۱۹</h3><i class="dripicons-wallet card-eco-icon text-success align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">ثبت تیکت و درخواست پشتیبانی </h4>
                </div>
                <div class="card-content collapse show">
                    @if ($errors->any())
                        <div style="font-family: byekan; color: white!important;"
                             class="alert alert-danger">
                            <ul style="font-family: byekan;color: white!important;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="card-text">
                            <p>در این قسمت میتوانید مشکلات و درخواست های خودرا برای مدیریت ارسال نمایید.</p>
                        </div>
                        <form style="font-family:Byekan" action="/requisitions"
                              enctype="multipart/form-data" method="post" class="form">
                            @csrf
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">عنوان:</label>
                                            <input class="form-control" type="text"
                                                   placeholder="مثال: سوال پیرامون فرآيند تسویه حساب" value="{{old('title')}}" name="title" id="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">حوزه:</label>
                                            <select class="form-control" name="scope">
                                                <option {{ old('scope') == 'شارژ' ? 'selected' : '' }} value="شارژ">
                                                    شارژ
                                                </option>
                                                <option {{ old('scope') == 'نظافت' ? 'selected' : '' }} value="نظافت">
                                                    نظافت
                                                </option>
                                                <option {{ old('scope') == 'نگهبانی' ? 'selected' : '' }} value="نگهبانی">
                                                    نگهبانی
                                                </option>
                                                <option {{ old('scope') == 'فضای سبز' ? 'selected' : '' }} value="فضای سبز">
                                                    فضای سبز
                                                </option>
                                                <option {{ old('scope') == 'امنیت و ایمنی' ? 'selected' : '' }} value="امنیت و ایمنی">
                                                    امنیت و ایمنی
                                                </option>
                                                <option {{ old('scope') == 'تاسیسات' ? 'selected' : '' }} value="تاسیسات">
                                                    تاسیسات
                                                </option>
                                                <option {{ old('scope') == 'آسانسور' ? 'selected' : '' }} value="آسانسور">
                                                    آسانسور
                                                </option>
                                                <option {{ old('scope') == 'پیمانکاران' ? 'selected' : '' }} value="پیمانکاران">
                                                    پیمانکاران
                                                </option>
                                                <option {{ old('scope') == 'سایر' ? 'selected' : '' }} value="سایر">
                                                    سایر
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <h4 class="form-section"><i class="fa fa-paperclip"></i> شرح درخواست</h4>

                                <div class="form-group">
                                    <label for="description">توضیحات مربوط به درخواست:</label>
                                    <textarea id="description" rows="3" class="form-control"
                                              name="description"
                                              placeholder="توضیحات">{{old('description')}}</textarea>
                                </div>

                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <label for="attachment">ضمیمه فایل:</label>
                                        <div class="custom-file">
                                            <input type="file" name="attachment" {{old('attachment')}} class="custom-file-input"
                                                   id="attachment">
                                            <label class="custom-file-label"  for="attachment">جهت ضمیمه فایل
                                                یا تصویر کلیک کنید</label>
                                        </div>
                                    </fieldset>
                                </div>


                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check-square-o"></i> ثبت درخواست
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">لیست درخواست های شما</h4>
            </div>
            <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                    <table style="font-family: Byekan;text-align: center"
                           class="table display nowrap table-striped table-bordered scroll-horizontal">
                        <thead style="text-align:center">
                        <tr style="text-align:center">
                            <th>عنوان درخواست</th>
                            <th>درخواست شده از</th>
                            <th>درخواست توسط</th>
                            <th>حوزه درخواست</th>
                            <th>آخرین وضعیت</th>
                            <th>فایل ضمیمه</th>
                            <th>تاریخ ایجاد</th>
                            <th>تاریخ آخرین بازنگری</th>
                            <th>مشاهده جزییات</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>تست</td>
                                <td>تست</td>
                                <td>تست</td>
                                <td>تست</td>
                                <td>تست</td>
                                <td>تست</td>
                                <td>تست</td>
                                <td>تست</td>
                                <td>تست</td>
                            </tr>
                        <tfoot>
                        <tr>
                            <th>عنوان درخواست</th>
                            <th>درخواست شده از</th>
                            <th>درخواست توسط</th>
                            <th>حوزه درخواست</th>
                            <th>آخرین وضعیت</th>
                            <th>فایل ضمیمه</th>
                            <th>تاریخ ایجاد</th>
                            <th>تاریخ آخرین بازنگری</th>
                            <th>مشاهده جزییات</th>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>


    <!--end row-->

@endsection


@section('pageScripts')
@stop
