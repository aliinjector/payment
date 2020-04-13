@extends('dashboard.layouts.master')




@section('content')
    <link href="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!--  Modal content for the above example -->
    @foreach ($fastPays as $fastPay)
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="fastPayDetail{{$fastPay->id}}" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myLargeModalLabel">جرییات لینک</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data" action="{{ route('fast-pay.update', $fastPay->id ) }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title pb-3">عنوان لینک: {{$fastPay->title}}</h4>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label for="example-text-input"
                                                               class="col-sm-2 col-form-label text-center">مبلغ (تومان)</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="number" name="price" value="{{ $fastPay->price }}" id="example-text-input">
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label style="text-align: center" for="example-email-input"
                                                               class="col-sm-2 col-form-label text-center"> وضعیت </label>
                                                        <div class="col-sm-10">
                                                            <input disabled class="form-control" type="text" name="name" value="{{ $fastPay->status }}" id="example-text-input">
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label for="example-search-input" class="col-sm-2 col-form-label text-center">آخرین تغییر </label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" name="url" disabled value="{{ $fastPay->updated_at }}" id="example-search-input">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="example-search-input" class="col-sm-2 col-form-label text-center">تعداد پرداخت </label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" name="buy_count" disabled value="{{ $fastPay->buy_count }}" id="example-search-input">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-ld-12">



                                                <div class="form-group row">
                                                    <label for="example-url-input" class="col-sm-2 col-form-label text-center">ثبت تغییرات</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" name="description" id="description" cols="30" rows="3">{{$fastPay->description}}</textarea>
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
                        <li class="breadcrumb-item"><a href=""> لینک پرداخت آنی</a></li>
                        <li class="breadcrumb-item active">داشبورد امید شاپ</li>
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">ثبت لینک پرداخت آنی جدید </h4>
                </div>
                <div class="card-content collapse show">
                    @include('dashboard.layouts.errors')
                    <div class="card-body">
                        <div class="card-text">
                            <p>در این قسمت میتوانید لینک پرداخت آنی ایجاد نمایید.</p>
                        </div>
                        <form style="font-family:Byekan" action="{{ route('fast-pay.store') }}"
                              enctype="multipart/form-data" method="post" class="form">
                            @csrf
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">عنوان:</label>
                                            <input class="form-control" type="text"
                                                   placeholder="مثال: لینک واریز وجه" value="{{ old('title') }}" name="title" id="">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">مبلغ (تومان):</label>
                                            <input class="form-control" type="number"
                                                    value="{{ old('price') }}" name="price" id="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description">توضیحات مربوط به لینک:</label>
                                    <textarea id="description" rows="3" class="form-control"
                                              name="description"
                                              placeholder="توضیحات">{{old('description')}}</textarea>
                                </div>




                            </div>

                            <div class="form-actions text-center p-5">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check-square-o"></i> ایجاد لینک پرداخت آنی
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
                    <h4 class="mt-0 header-title">لیست لینک های پرداخت آنی شما</h4>
                    <p class="text-muted mb-3">در این قسمت، میتوانید لینک های پرداخت آنی ایجاد شده را مشاهده نمایید.</p>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;text-align: center">
                        <thead>
                        <tr>
                            <th>عنوان</th>
                            <th>توضیحات</th>
                            <th>مبلغ (تومان)</th>
                            <th>تعداد خرید</th>
                            <th>مشاهده لینک</th>
                            <th>تاریخ آخرین تغییر</th>
                            <th>جزییات</th>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach ($fastPays as $fastPay)
                            <tr>
                                <td>{{ $fastPay->title }}</td>
                                <td>{{ $fastPay->description }}</td>
                                <td>{{ number_format($fastPay->price) }}</td>
                                <td>{{ $fastPay->buy_count }}</td>
                                <td><a target="_blank" href="{{ route('fast-pay.show', $fastPay->id ) }}"><i class="fas fa-link"></i></a></td>
                                <td style="font-family: BYekan; direction: ltr">{{ jdate($fastPay->updated_at) }}</td>
                               <td><button type="button" class="btn btn-dark waves-effect success" data-toggle="modal" data-animation="bounce" data-target="#fastPayDetail{{$fastPay->id}}">مشاهده جزییات</button></td>
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
