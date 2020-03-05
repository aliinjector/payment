@extends('app.shop.account.layouts.master')
@section('content')


    <div id="">
        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
                <h1 class="">حساب کاربری</h1>
                <div class="">
                    <div class="">
                        <h3 class="">سوابق سفارشات</h3>
                        <div class="">
                            <table class="">
                              <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer font-16" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                aria-describedby="datatable_info">
                                  <thead>
                                      <tr role="row">
                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">شناسه
                                          </th>

                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">وضعیت سفارش
                                          </th>
                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">نحوه پرداخت
                                          </th>
                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">نحوه ارسال
                                          </th>
                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">هزینه ارسال
                                          </th>
                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">مبلغ کل
                                          </th>
                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">تاریخ ثبت
                                          </th>
                                          <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">عملیات
                                          </th>
                                      </tr>
                                  </thead>
                                <tbody>
                                    @php
                                    $id = 1;
                                    @endphp
                                    @foreach ($purchases as $purchase)
                                    <tr>
                                        <td class="byekan"><a href="{{ route('user.purchased.list.show', $purchase->id) }}">{{ $id }}</a></td>
                                        <td>{{ $purchase->status == 0 ? "انجام نشده" : "تکمیل شده" }}</td>
                                        <td>{{ $purchase->payment_method == "online_payment" ? "پرداخت آنلاین" : "پرداخت نقدی ( حضوری )" }}</td>
                                        <td>@if($purchase->cart()->withTrashed()->where('status' , 1)->get()->first()->products[0]->type == 'file') -  @else <span>
                                                                   @if($purchase->shipping =="quick_way")
                                                                     ارسال سریع
                                                                   @elseif($purchase->shipping =="posting_way")
                                                                     ارسال پستی
                                                                   @else
                                                                     دریافت حضوری
                                                                   @endif
                                                                 @endif</span></td>
                                        <td>@if($purchase->cart()->withTrashed()->where('status' , 1)->get()->first()->products[0]->type == 'file') -  @else{{ $purchase->shipping_price }} @endif</td>
                                        <td>{{ number_format($purchase->total_price + $purchase->shipping_price) }} تومان</td>
                                        <td>{{ jdate($purchase->created_at) }}</td>
                                        <td>
                                            <a href="{{ route('user.purchased.list.show', $purchase->id) }}" title="مشاهده سفارش"3778><i class="far fa-eye text-primary font-15"></i></a>
                                            <a href="{{ route('user.purchased.list.show.invoice', $purchase->id) }}" title="فاکتور"><i class="fas fa-file-invoice text-danger"></i></a>

                                        </td>
                                    </tr>
                                    @php
                                    $id ++
                                    @endphp
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="section no-pdy section-contact bg-transparent mt-5">

            <div class="container">
                <!-- Block @s -->
                <div class="nk-block block-contact animated" data-animate="fadeInUp" data-delay=".9" id="contact">
                    <div class="row justify-content-center no-gutters">
                        <div class="col-lg-6">
                            <div class="contact-wrap split split-left split-lg-left bg-white">
                                <h1 class="title title-md">اطلاعات حساب</h1>

                                    <div class="field-item">
                                    <div style="font-size: 0.94rem;color: rgba(65,80,118,0.6);">
                                      نام :
                                    </div>
                                    <div class="">

                                    {{ \auth::user()->firstName }}
                                  </div>

                                    </div>
                                    <div class="field-item">
                                    <div style="font-size: 0.94rem;color: rgba(65,80,118,0.6);">
                                      نام خانوادگی :
                                    </div>
                                    <div class="">

                                  {{ \auth::user()->lastName}}
                                  </div>

                                    </div>


                            </div>
                        </div><!-- .col -->
                        <div class="col-lg-4">
                            <div class="contact-wrap split split-right split-lg-right bg-genitian bg-theme tc-light">
                                <div class="d-flex flex-column justify-content-between h-100">
                                    <ul class="contact-list">

                                        <li>
                                            <em class="contact-icon fas fa-phone"></em>
                                            <div class="contact-text">
                                                <span class="byekan">{{ \auth::user()->mobile }}</span>
                                            </div>
                                        </li>
                                        <li>
                                            <em class="contact-icon fas fa-envelope"></em>
                                            <div class="contact-text">
                                                <span>{{ \auth::user()->email }}</span>
                                            </div>
                                        </li>

                                    </ul>

                                </div>
                            </div>
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .block @e -->
            </div>

            <div class="nk-ovm ovm-top ovm-h-60 bg-light"></div><!-- .nk-ovm -->
        </section>
        <link rel="stylesheet" href="/app/shop/2/css/rtl.css">
        <link rel="stylesheet" href="/app/shop/2/css/custom.css">
        @toastr_js
        @toastr_render
        @include('sweet::alert')
        @yield('footerScripts')
      @endsection
