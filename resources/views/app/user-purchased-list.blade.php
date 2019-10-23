@yield('headerStyles')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>لیست سفارشات شما</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta content="لیست سفارشات شما" name="description">
    <meta name="author" content="Setareh Nooran Co. Ali Rahmani">
    <!-- App favicon -->
    <link href="/dashboard/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
    <!-- App css -->
    <link href="/dashboard/assets/css/jquery.steps.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/metisMenu.min.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="/dashboard/assets/css/custom.css" rel="stylesheet" type="text/css">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

    <style media="screen">
        body {
            font-size: 18px!important;
        }

        .blink_me {
            animation: blinker 1s linear infinite;
        }

        @keyframes blinker {
            50% {
                background-color: #ebffec;
            }
        }
    </style>
</head>

<body>@section('content')
    <link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="float-right">
                            <ol style="direction: ltr" class="breadcrumb">
                                <li class="breadcrumb-item active mb-3 ml-lg-4">
                                    <a href="{{ route('logout') }}">
                                        <button class="btn-sm small btn-primary">
                                            خروج از حساب کاربری
                                        </button>
                                    </a>
                                </li>
                            </ol>
                        </div>
                        <h4 class="page-title mr-4">لیست سفارشات شما</h4></div>
                    <!--end page-title-box-->
                </div>
                <!--end col-->
            </div>
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Page-Title -->
                    {{--
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
                                                <tr class="byekan @if(now() <= $purchase->created_at->addMinutes(1) )blink_me @endif">

                                                    <td><img class="product-img" src="{{ $purchase->product()->withTrashed()->first()->image['80,80']}}" alt="user"></td>
                                                    <td>{{ $purchase->product()->withTrashed()->first()->title}}</td>
                                                    <td>{{ jdate($purchase->created_at) }}</td>
                                                    <td>{{ $purchase->total_price }} تومان</td>
                                                    <td class="d-flex justify-content-between align-items-center h-25vh"><span class="badge badge-boxed badge-soft-success">@if($purchase->status == 0 ) تایید شده @endif</span> @if($purchase->product()->get()->first()->type == 'file')
                                                        <div class="icon-show">
                                                            <a href="{{ route('download.file', ['shop'=>$purchase->product()->first()->shop()->first()->english_name, 'id'=>$purchase->product()->first()->id]) }}" id="editCat"><i class="fa fa-download text-success mr-1 button font-15"></i>
                                            </a>
                                                        </div>
                                                        @endif
                                                    </td>

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
                    </div> --}}
                    <div class="card">
                        <div class="card-body">
                          @php $i=0 @endphp
                          @foreach ($purchases as $purchase)
                            <div class="accordion" id="accordionExample{{$purchase->id}}">
                                <div class="card border mb-0 shadow-none">
                                    <div class="card-header p-0" id="headingOne{{$purchase->id}}">
                                        <h5 class="my-1">
                                                <button class="btn btn-link text-dark collapsed" type="button" data-toggle="collapse" data-target="#collapseOne{{$purchase->id}}" aria-expanded="false" aria-controls="collapseOne">
                                                سفارش شماره @php echo $i @endphp
                                                </button>
                                            </h5>
                                    </div>

                                    <div id="collapseOne{{$purchase->id}}" class="collapse" aria-labelledby="headingOne{{$purchase->id}}" data-parent="#accordionExample{{$purchase->id}}" style="">
                                        <div class="card-body">
                                          <table class="table table-hover mb-0">
                                              <thead class="thead-light">
                                                  <tr class="byekan">
                                                      <th class="border-top-0">محصول</th>
                                                      <th class="border-top-0">نام</th>
                                                      <th class="border-top-0">زمان سفارش</th>
                                                  </tr>
                                                  <!--end tr-->
                                              </thead>
                                              <tbody
                                                @foreach ($purchase->cart()->withTrashed()->where('status' , 1)->get()->first()->products() as $product)
                                                  <tr class="byekan">
                                                      <td><img class="product-img" src="{{ $product->image['80,80']}}" alt="user"></td>
                                                      <td>{{ $product->title }}</td>
                                                      <td class="d-flex justify-content-between align-items-center h-25vh">{{ jdate($purchase->created_at) }} @if($product->type == 'file')
                                                          <div class="icon-show">
                                                              <a href="{{ route('download.file', ['shop'=>$purchase->product()->first()->shop()->first()->english_name, 'id'=>$purchase->product()->first()->id]) }}" id="downloadFile"><i class="fa fa-download text-success mr-1 button font-15"></i>
                                                              </a>
                                                          </div>
                                                          @endif
                                                      </td>
                                                  </tr>
                                                @endforeach

                                                  <!--end tr-->
                                              </tbody>
                                          </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @php $i++ @endphp
                            @endforeach
                        </div>
                        <!--end card-body-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <!-- end row -->
                </div>
                <!-- container -->
            </div>

            <footer class="footer text-center text-sm-left">&copy; ۱۳۹۸ - کلیه حقوق محفوظ است. <span class="text-muted d-none d-sm-inline-block float-right">طراحی و توسعه در دپارتمان فناوری اطلاعات شرکت فناور ستاره نوران</span></footer>
            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->
    <!-- jQuery  -->
    <script src="/dashboard/assets/js/jquery.min.js"></script>
    <script src="/dashboard/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/dashboard/assets/js/metisMenu.min.js"></script>
    <script src="/dashboard/assets/js/waves.min.js"></script>
    <script src="/dashboard/assets/js/jquery.slimscroll.min.js"></script>
    <script src="/dashboard/assets/plugins/moment/moment.js"></script>
    <script src="/dashboard/assets/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="/dashboard/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/dashboard/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/dashboard/assets/pages/jquery.eco_dashboard.init.js"></script>
    <script src="/dashboard/assets/js/jquery.form-wizard.init.js"></script>
    <script src="/dashboard/assets/js/jquery.steps.min.js"></script>
    <!-- App js -->
    <script src="/dashboard/assets/js/app.js"></script>
    <script src="/dashboard/assets/js/sweetalert.min.js"></script>
    @include('sweet::alert') @yield('pageScripts')


</body>

</html>
