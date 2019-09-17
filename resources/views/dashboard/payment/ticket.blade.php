@extends('dashboard.layouts.master')




@section('content')
    <link href="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!--  Modal content for the above example -->
    @foreach ($tickets as $ticket)
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="ticketDetail{{$ticket->id}}" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myLargeModalLabel">جرییات درخواست</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data" action="http://127.0.0.1:8000/dashboard/gateway">
                            <input type="hidden" name="_token" value="L5DDm7dHVVSgGVE546lymi8zQYCSwBgeodSzU8TO">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title pb-3">عنوان درخواست: {{$ticket->title}}</h4>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label for="example-text-input"
                                                               class="col-sm-2 col-form-label text-center">حوزه</label>
                                                        <div class="col-sm-10">
                                                            <input disabled class="form-control" type="text" name="name" value="{{ $ticket->scope }}" id="example-text-input">
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label style="text-align: center" for="example-email-input"
                                                               class="col-sm-2 col-form-label text-center"> وضعیت </label>
                                                        <div class="col-sm-10">
                                                            <input disabled class="form-control" type="text" name="name" value="{{ $ticket->status }}" id="example-text-input">
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label for="example-search-input" class="col-sm-2 col-form-label text-center">آخرین تغییر </label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" name="url" disabled value="{{ $ticket->updated_at }}" id="example-search-input">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-ld-12">



                                                <div class="form-group row">
                                                    <label for="example-url-input" class="col-sm-2 col-form-label text-center">توضیحات</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" name="description" id="description" cols="30" rows="3">{{$ticket->description}}</textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!--end card-body-->
                                    </div>
                                    <!--end card-->
                                </div>
                                <!--end col-->
                            </div>



                            <div class="form-actions text-center  pb-3  ">
                                <button style="font-family: iranyekan!important;" type="submit" class="btn btn-success">
                                    <i class="fa fa-check-square-o"></i> ارسال اطلاعات
                                </button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endforeach





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
                        <h3 class="font-weight-bold"> {{ $tickets->count() }} </h3><i class="dripicons-user-group card-eco-icon text-pink align-self-center"></i></div>
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
                        <h3 class="font-weight-bold">{{ $tickets->where('status', 'باز')->count() }}</h3><i class="dripicons-cart card-eco-icon text-secondary align-self-center"></i></div>
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
                        <h3 class="font-weight-bold"> {{ $tickets->where('status', 'در انتظار پاسخ')->count() }} </h3><i class="dripicons-jewel card-eco-icon text-warning align-self-center"></i></div>
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
                        <h3 class="font-weight-bold"> {{ $tickets->where('status', 'بسته شده')->count() }} </h3><i class="dripicons-wallet card-eco-icon text-success align-self-center"></i></div>
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
                    @include('dashboard.layouts.errors')
                    <div class="card-body">
                        <div class="card-text">
                            <p>در این قسمت میتوانید مشکلات و درخواست های خودرا برای مدیریت ارسال نمایید.</p>
                        </div>
                        <form style="font-family:Byekan" action="{{ route('ticket.store') }}"
                              enctype="multipart/form-data" method="post" class="form">
                            @csrf
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">عنوان:</label>
                                            <input class="form-control" type="text"
                                                   placeholder="مثال: سوال پیرامون فرآيند تسویه حساب" value="{{ old('title') }}" name="title" id="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">حوزه:</label>
                                            <select class="form-control" name="scope">
                                                <option value="">یک مورد را انتخاب نمایید</option>

                                                <option {{ old('scope') == 'پرداخت یاری' ? 'selected' : '' }} value="پرداخت یاری">
                                                    پرداخت یاری
                                                </option>
                                                <option {{ old('scope') == 'فروشگاه ساز' ? 'selected' : '' }} value="فروشگاه ساز">
                                                    فروشگاه ساز
                                                </option>
                                                <option {{ old('scope') == 'باشگاه مشتریان' ? 'selected' : '' }} value="باشگاه مشتریان">
                                                    باشگاه مشتریان
                                                </option>
                                                <option {{ old('scope') == 'فروش شارژ' ? 'selected' : '' }} value="فروش شارژ">
                                                    فروش شارژ
                                                </option>
                                                <option {{ old('scope') == 'پرداخت قبوض' ? 'selected' : '' }} value="پرداخت قبوض">
                                                    پرداخت قبوض
                                                </option>
                                                <option {{ old('scope') == 'پرداخت عوارض و فروش بلیط' ? 'selected' : '' }} value="پرداخت عوارض و فروش بلیط">
                                                    پرداخت عوارض و فروش بلیط
                                                </option>
                                                <option {{ old('scope') == 'شارژ ساختمان' ? 'selected' : '' }} value="شارژ ساختمان">
                                                    شارژ ساختمان
                                                </option>
                                                <option {{ old('scope') == 'استعلام چک' ? 'selected' : '' }} value="استعلام چک">
                                                    استعلام چک
                                                </option>
                                                <option {{ old('scope') == 'پرداخت تلفنی' ? 'selected' : '' }} value="پرداخت تلفنی">
                                                    پرداخت تلفنی
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

                            <div class="form-actions text-center p-5">
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
                <div class="card-body">
                    <h4 class="mt-0 header-title">لیست تیکت های شما</h4>
                    <p class="text-muted mb-3">در این قسمت، میتوانید تیکت های ثبت شده توسط خودرا مشاهده و با استفاده از گزینه پاسخ، پاسخ آنرا در سیستم ثبت نمایید.</p>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;text-align: center">
                        <thead>
                        <tr>
                            <th>عنوان</th>
                            <th>حوزه</th>
                            <th>وضعیت</th>
                            <th>تاریخ آخرین تغییر</th>
                            <th>جزییات</th>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach ($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->title }}</td>
                                <td>{{ $ticket->description }}</td>
                                <td>{{ $ticket->scope }}</td>
                                <td style="font-family: BYekan; direction: ltr">{{ jdate($ticket->updated_at) }}</td>
                               <td><button type="button" class="btn btn-dark waves-effect success" data-toggle="modal" data-animation="bounce" data-target="#ticketDetail{{$ticket->id}}">مشاهده جزییات</button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>



    <!--end row-->

@endsection


@section('pageScripts')

    <script src="/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/jquery.datatable.init.js"></script>


@stop
