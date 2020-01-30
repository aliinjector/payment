<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ __('app-shop-2-layouts-master.pageTitle') }}</title>
    <link rel="shortcut icon" href="favicon.ico">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" href="/app/shop/2/css/style.css">
    <link href="/app/shop/2/font/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/app/shop/2/css/pagination.css" rel="stylesheet">
    <link rel="stylesheet" href="/app/shop/1/assets/css/jquery-ui.css" />
    <script src="/app/shop/1/assets/js/jquery.min.js"></script>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    @yield('headerScripts')
    <link rel="stylesheet" href="{{ asset('/app/shop/2/css/master.css') }}" />
    <style media="screen">
    </style>
    @toastr_css
</head>

<body class="p-5">

<div id="tt-pageContent">
    <div class="container-indent">
        <div class="container container-fluid-custom-mobile-padding">
            <h1 class="tt-title-subpages noborder">آدرس ها</h1>
            <div class="tt-shopping-layout">
                <h2 class="tt-title">آدرس های شما</h2>
                <div class="tt-wrapper"><a href="{{ route('user-address.create') }}" class="btn">اضافه کردن آدرس جدید</a>
                    @php $i = 1;
                    @endphp
                    @foreach ($user_addresses as $user_addresse)
                    <div class="tt-wrapper">
                        <h3 class="tt-title">آدرس شماره {{ $i }}</h3>
                        <div class="tt-table-responsive">
                            <table class="tt-table-shop-02">
                                <tbody>
                                    <tr>
                                        <td class="iranyekan font-weight-bold">شهر :</td>
                                        <td>{{ $user_addresse->city }}</td>
                                    </tr>
                                    <tr>
                                        <td class="iranyekan font-weight-bold">استان :</td>
                                        <td>{{ $user_addresse->province }}</td>
                                    </tr>
                                    <tr>
                                        <td class="iranyekan font-weight-bold">کد پستی :</td>
                                        <td>{{ $user_addresse->zip_code }}</td>
                                    </tr>
                                    <tr>
                                        <td class="iranyekan font-weight-bold">نشانی :</td>
                                        <td>{{ $user_addresse->address }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tt-shop-btn">
                            <a class="btn-link" href="{{ route('user-address.edit', $user_addresse->id) }}">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 22 22" style="enable-background:new 0 0 22 22;" xml:space="preserve">
                                    <g>
                                        <path d="M2.3,20.4C2.3,20.4,2.3,20.4,2.3,20.4C2.2,20.4,2.2,20.4,2.3,20.4c-0.2,0-0.2,0-0.3,0c-0.1,0-0.1-0.1-0.2-0.1
									c-0.1-0.1-0.1-0.2-0.1-0.3c0-0.1,0-0.2,0-0.3l0.6-5c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0-0.1,0-0.1
									c0,0,0-0.1,0.1-0.1L14.6,2.1C15,1.7,15.4,1.6,16,1.6c0.5,0,1,0.2,1.3,0.5l2.6,2.6c0.4,0.4,0.5,0.8,0.5,1.3c0,0.5-0.2,1-0.5,1.3
									L7.7,19.6c0,0-0.1,0-0.1,0.1c0,0-0.1,0-0.1,0c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0L2.3,20.4z M2.9,19.1l2.9-0.4
									l-2.6-2.6L2.9,19.1z M3.7,14.8L5,16.1l9.7-9.7L13.5,5L3.7,14.8z M7.2,18.3L17,8.5l-1.3-1.3L5.9,17L7.2,18.3z M15.5,3l-1.2,1.2
									l3.5,3.5L19,6.5c0.1-0.1,0.2-0.3,0.2-0.4c0-0.2-0.1-0.3-0.2-0.4L16.4,3c-0.1-0.1-0.3-0.2-0.4-0.2C15.8,2.8,15.6,2.8,15.5,3z" />
                                    </g>
                                </svg> ویرایش </a>

                            <a class="btn-link" href="" id="removeBrand" data-name="{{ $user_addresse->address }}" data-id="{{ $user_addresse->id }}"><i class="far fa-trash-alt  font-15"><i class="icon-h-02"></i>حذف</a></div>

                    </div>
                    @php $i++;
                    @endphp

                    @endforeach


                </div>
            </div>
        </div>
    </div>
  </body>
  <link rel="stylesheet" href="/app/shop/2/css/rtl.css">
  <link rel="stylesheet" href="/app/shop/2/css/custom.css">
  @toastr_js
  @toastr_render
  @include('sweet::alert')
  @yield('footerScripts')
  <script src="{{url('stats/script.js')}}"></script>
  </html>
