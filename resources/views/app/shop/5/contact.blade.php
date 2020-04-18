@extends('app.shop.5.layouts.master')
@section('content')

    <!-- main-search start -->
    <div class="main-search-active">
        <div class="sidebar-search-icon">
            <button class="search-close"><span class="icon-close"></span></button>
        </div>
        <div class="sidebar-search-input">
            <form>
                <div class="form-search">
                    <input id="search" class="input-text" value="" placeholder="Search entire store here ..." type="search">
                    <button class="search-btn" type="button">
                        <i class="icon-magnifier"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- main-search start -->

    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area section-ptb">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="breadcrumb-title">تماس باما</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <!-- main-content-wrap start -->
    <div class="main-content-wrap section-ptb contact-us-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-info-wrapper">
                      <h3>اطلاعات تماس</h3>
                        <ul class="contact-info-list">
                            <li> <strong>  آدرس: </strong>{{ $shop->shopContact->address }}</li>
                            <li><strong> شماره تماس: </strong> {{ $shop->shopContact->tel}}</li>
                            <li><strong>  ایمیل: </strong> <a href="#">{{ $shop->shopContact->shop_email}}</a></li>
                        </ul>
                        <div class="contact-form-warp">
                            <form id="contact-form" action="https://demo.hasthemes.com/fusta/mail.php" method="post">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <input type="text" name="name" placeholder="* نام و نام خانوادگی">
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="email" name="email" placeholder="* آدرس ایمیل">
                                    </div>
                                    <div class="col-lg-10">
                                        <textarea name="message" placeholder="* متن پیام"></textarea>
                                    </div>
                                </div>
                                <div class="contact-submit-btn">
                                    <button type="submit" class="submit-btn">ارسال پیام</button>
                                    <p class="form-messege"></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="google-map-area">
                        <div id="map-inner" class="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->
@endsection
