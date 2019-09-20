@extends('dashboard.layouts.master')
@section('content')
<link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">

<div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol style="direction: ltr" class="breadcrumb">
                        <li class="breadcrumb-item active">  وضعیت سفارش</li>
                    </ol>
                </div>
                <h4 class="page-title">لیست سفارشات شما</h4></div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body order-list">
                            <h4 class="header-title mt-0 mb-3">لیست سفارشات</h4>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="thead-light">
                                        <tr class="byekan">
                                            <th class="border-top-0">محصول</th>
                                            <th class="border-top-0">نام</th>
                                            <th class="border-top-0">زمان سفارش</th>
                                            <th class="border-top-0">مبلغ (تومان)</th>
                                            <th class="border-top-0">وضعیت</th>
                                        </tr>
                                        <!--end tr-->
                                    </thead>
                                    <tbody>
                                        @foreach($purchases as $purchase)
                                        <tr class="byekan">
                                            <td><img class="product-img" src="{{ $purchase->product()->first()->image}}" alt="user"></td>
                                            <td>{{ $purchase->product()->first()->title}}</td>
                                            <td>{{ jdate($purchase->created_at) }}</td>
                                            <td>{{ $purchase->product()->first()->price }}تومان</td>
                                            <td><span class="badge badge-boxed badge-soft-success">{{ $purchase->status}}</span></td>
                                        </tr>
                                        @endforeach
                                        <!--end tr-->
                                    </tbody>
                                </table>
                                <!--end table-->
                            </div>
                            <!--end /div-->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
        <!-- end page title end breadcrumb -->
<!-- end row -->
</div>
<!-- container -->
</div>

@endsection
@section('pageScripts')
<script>
    $(document).ready(function() {
        $(".test1").click(function() {
            $(".feature_2").removeClass("d-none");
            $(".test1").addClass("d-none");
        });
    });
    $(document).ready(function() {
        $(".test2").click(function() {
            $(".feature_3").removeClass("d-none");
            $(".test2").addClass("d-none");

        });
    });
    $(document).ready(function() {
        $(".test3").click(function() {
            $(".feature_4").removeClass("d-none");
            $(".test3").addClass("d-none");

        });
    });
    $(document).ready(function() {
        $(".color1").click(function() {
            $(".color_1").removeClass("d-none");
            $(".color1").addClass("d-none");

        });
    });
    $(document).ready(function() {
        $(".color2").click(function() {
            $(".color_2").removeClass("d-none");
            $(".color2").addClass("d-none");

        });
    });
    $(document).ready(function() {
        $(".color3").click(function() {
            $(".color_3").removeClass("d-none");
            $(".color3").addClass("d-none");

        });
    });
    $(document).ready(function() {
        $(".color4").click(function() {
            $(".color_4").removeClass("d-none");
            $(".color4").addClass("d-none");

        });
    });

    $(document).on('click', '#aaa', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            type: "post",
            url: "{{url('/dashboard/product-list/delete')}}",
            data: {
                id: id,
                "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
            },
            success: function(data) {
                console.log(data)
                var url = document.location.origin + "/dashboard/product-list";
                location.href = url;
            }
        });
    });
</script>
@stop
