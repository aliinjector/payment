@extends('dashboard.layouts.master')

<style>

</style>


@section('content')


    <link href="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">



    <!--  Modal content for the above example -->


    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol style="direction: ltr" class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">لیست درخواست های تسویه حساب شما</a></li>
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

    <!--end row-->
    <div class="row">
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">مجموع تراکنش ها</h4>
                    <div class="d-flex justify-content-between">

                        <h3 class="font-weight-bold">300,000 تومان </h3></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>

        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0"> درگاه ها</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">1</h3><i class="dripicons-cart card-eco-icon text-secondary align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0"> آخرین تسویه </h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">1398/05/29 </h3><i class="dripicons-jewel card-eco-icon text-warning align-self-center"></i></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-lg-3">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">مجموع تسویه ها </h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">    100,300,000 تومان </h3></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">لیست درخواست های تسویه حساب شما</h4>
                    <p class="text-muted mb-3">در این قسمت، میتوانید لیست درخواست های تسویه ثبت شده توسط خودرا مشاهده نمایید.</p>
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;text-align: center">
                        <thead>
                        <tr>
                            <th>شماره کارت</th>
                            <th>نام کیف پول</th>
                            <th>مقدار</th>
                            <th>وضعیت</th>
                            <th>تاریخ ثبت درخواست</th>
                            <th>تاریخ آخرین تغییر</th>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach ($checkouts as $checkout)
                            <tr>
                                <td>{{ $checkout->card->number }}</td>
                                <td>{{ $checkout->wallet->name }}</td>
                                <td>{{ $checkout->amount }}</td>
                                <td>{{ $checkout->status }}</td>
                                <td style="font-family: BYekan; direction: ltr">{{ jdate($checkout->created_at) }}</td>
                                <td style="font-family: BYekan; direction: ltr">{{ jdate($checkout->updated_at) }}</td>
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
    <!-- Responsive examples -->
    <script src="/dashboard/assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/jszip.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="/dashboard/assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="/dashboard/assets/plugins/datatables/buttons.colVis.min.js"></script>

{{--        <script src="/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>--}}
{{--        <script src="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>--}}
{{--        <script src="/dashboard/assets/plugins/datatables/dataTables.buttons.min.js"></script>--}}
{{--        <script src="/dashboard/assets/plugins/datatables/dataTables.responsive.min.js"></script>--}}
{{--        <script src="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>--}}
{{--        <script src="/dashboard/assets/plugins/datatables/jquery.datatable.init.js"></script>--}}

@stop
