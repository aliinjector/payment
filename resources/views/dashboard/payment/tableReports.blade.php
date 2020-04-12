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
                        <li class="breadcrumb-item"><a href="">گزارشات</a></li>
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

    <!--end row-->



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">لیست گزارش</h4>
                    <p class="text-muted mb-3">در این قسمت، میتوانید گزارش ثبت شده توسط خودرا مشاهده نمایید.</p>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;text-align: center">
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

        <script src="/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/dashboard/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="/dashboard/assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="/dashboard/assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="/dashboard/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
        <script src="/dashboard/assets/plugins/datatables/jquery.datatable.init.js"></script>

@stop
