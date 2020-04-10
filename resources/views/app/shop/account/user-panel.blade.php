@extends('app.shop.account.layouts.master')
@section('content')



<div id="">
    <div class="container-indent">
        <div class="container container-fluid-custom-mobile-padding">
            <h1 class="mb-5">حساب کاربری</h1>
            <div class="">
                <div class="">
                    <h3 class="mb-3">اطلاعات پروفایل کاربری</h3>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive dataTable no-footer font-16" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">آواتار
                                    </th>

                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">نام
                                    </th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">نام خانوادگی
                                    </th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">ایمیل
                                    </th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">موبایل
                                    </th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">عملیات
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <td><img src="{{ $user->avatar }}" alt="" width="50" height="50"></td>
                                <td>{{ $user->firstName }}</td>
                                <td>{{ $user->lastName }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->mobile }}</td>
                                <td>
                                    <div class="icon-show row">
                                        <a href="{{ route('user-panel.edit', $user->id) }}" title="ویرایش اطلاعات" id="edit"><i class="fas fa-edit text-warning mx-1"></i>
                                        </a>
                                        <a href="{{ route('user-panel.change-password') }}" title="تغییر رمز عبور" id="edit"><i class="fas fa-key text-danger mx-1"></i>
                                        </a>
                                        <a href="{{ route('user-address.index') }}" title="آدرس ها" id="edit"><i class="fas fa-address-card mx-1"></i>
                                        </a>
                                        <a href="{{ route('user.purchased.list') }}" title="لیست سفارشات" id="edit"><i class="fas fa-shopping-cart text-success mx-1"></i>
                                        </a>
                                    </div>
                                </td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="section no-pdy section-contact bg-transparent mt-5">



    <div class="nk-ovm ovm-top ovm-h-60 bg-light"></div><!-- .nk-ovm -->
</section>
<script src="/app/shop/1/assets/js/sweetalert.min.js"></script>
<link rel="stylesheet" href="/app/shop/2/css/rtl.css">
<link rel="stylesheet" href="/app/shop/2/css/custom.css">
@toastr_js
@toastr_render
@include('sweet::alert')
@yield('footerScripts')
<script type="text/javascript">
    $(window).ready(function() {
        setInterval(function() {
            $('.col-md-6').addClass("d-none")
            $('.pagination').addClass("d-none")
        }, 100);
    });
</script>
@endsection
