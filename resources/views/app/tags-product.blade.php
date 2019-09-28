@yield('headerStyles')


        <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>پایان پی - داشبورد اصلی</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta content="پایان پی - داشبورد اصلی" name="description">
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

    <style>
        .main-icon-menu{
            overflow: scroll!important;
        }
        .dataTables_info{
            font-family: BYekan!important;
        }
        .custom-select{
            font-family: BYekan!important;
        }
        .page-link{
            font-family: BYekan!important;
        }
        h1 {
  overflow: hidden;
  text-align: center;
}
h2 {
    width: 80%;
    text-align: center;
    border-bottom: 1px solid #50649C;
    line-height: 0.1em;
    margin: 8px 11% 20px;
    font-size: 23px!important;

}

 h2 span {
     background:#EAF0F7;
     padding:0 17px;
 }
    </style>
</head>

<body>@section('content')
<link href="/dashboard/assets/css/dropify.min.css" rel="stylesheet" type="text/css">

<nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto mr-2">
                <li class="nav-item">
                        <a class="nav-link iranyekan f-em1-5 mr-4 menu-shop" href="{{ route('show.shop', $shop->first()->english_name) }}" tabindex="-1" aria-disabled="true">صفحه اصلی</a>
                      </li>
              @foreach ($shopCategories as $shopCategorie)

            <li class="nav-item">
              <a class="nav-link iranyekan f-em1-5 mr-4 menu-shop" href="{{ route('shop.show.category', ['shop'=>$shop->english_name, 'categroyId'=>$shopCategorie->id]) }}" tabindex="-1" aria-disabled="true">{{ $shopCategorie->name }}</a>
            </li>
            @endforeach
          </ul>
          <ul class="navbar-nav ml-2">
                <li class="nav-item">
                        <a href="{{ route('show.shop', $shop->first()->english_name) }}">
                        <img src="{{ $shop->logo['200,100'] }}" alt="">
                      </a>
                    </li>
          </ul>
        </div>
      </nav>
<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    {{--  <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "> دسته بندی </li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">فروشگاه</a></li>
                        </ol>
                    </div>  --}}
                    <h4 class="page-title iranyekan">فروشگاه {{ $shop->name }}</h4>
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>

</div>
@if(isset($products[0]))
        <h2><span>اخرین محصولات دسته بندی {{ $products[0]->productCategory()->get()->first()->name }}</span></h2>
        @else
<div class="d-flex justify-content-center align-items-center" style="height:80vh">
<h4>
    هیچ محصولی در این دسته بندی وجود ندارد

</h4>
</div>
        @endif
         <div class="row p-5">
                @foreach ($products as $product)

                    <div class="col-lg-2">
                        <div class="card e-co-product">
                            <a href="{{ route('shop.show.product', ['shop'=>$shop->english_name, 'id'=>$product->id]) }}"><img src="{{ $product->image['250,250'] }}" alt="" class="img-fluid"></a>
                            <div class="card-body product-info"><a href="{{ route('shop.show.product', ['shop'=>$shop->english_name, 'id'=>$product->id]) }}" class="product-title">{{ $product->title }}</a>
                                <div class="d-flex justify-content-between my-2 byekan">
                                    <p class="product-price byekan">{{  number_format($product->price) }} تومان  <span class="ml-2 byekan"></span></p>

                                </div>
                                <a href="{{ route('shop.show.product', ['shop'=>$shop->english_name, 'id'=>$product->id]) }}">
                                <button class="btn btn-cart btn-sm waves-effect waves-light iranyekan"><i class="mdi mdi-cart mr-1"></i> خرید </button>
                            </a>

                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    @endforeach

                </div>

    <!-- container -->



</div>
@endsection


@section('pageScripts')
<script>
    $(document).on('click', '#ttttt', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var test = $(this).data('test');
        $.ajax({
            type: "post",
            url: "{{url('dashboard/product-category/delete')}}",
            data: {
                id: id,
                test: test,
                "_token": $('#csrf-token')[0].content //pass the CSRF_TOKEN()
            },
            success: function(data) {
                var url = document.location.origin + "/dashboard/product-category";
                location.href = url;
            }
        });
    });
</script>
@stop
<!-- Page Content-->
<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        @yield('content')

    <!--end row-->
    </div>
    <!-- container -->
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
@include('sweet::alert')
@yield('pageScripts')

<script>
$(window).on('load', function() {

    // if (window.location.href.indexOf("wallet") == -1) {
    //     $('#PardakhtYari').removeClass("active");
    //     $("a[href$='PardakhtYari']").removeClass("active");
    //
    // }
    // if (window.location.href.indexOf("card") == -1) {
    //     $('#PardakhtYari').removeClass("active");
    //     $("a[href$='PardakhtYari']").removeClass("active");
    // }
    //
    //
    //
    // if (window.location.href.indexOf("wallet") > -1) {
    //     $('#PardakhtYari').addClass("active");
    //     $("a[href$='PardakhtYari']").addClass("active");
    //
    // }
    // if (window.location.href.indexOf("card") > -1) {
    //     $('#PardakhtYari').addeClass("active");
    //     $("a[href$='PardakhtYari']").addClass("active");
    // }



    });

</script>
</body>

</html>
