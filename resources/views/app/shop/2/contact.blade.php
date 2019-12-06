@extends('app.shop.2.layouts.master')

@section('headerScripts')

@endsection

@section('content')


    <div id="tt-pageContent">
        <div class="container-indent">
            <div class="container">
                <div class="contact-map">
                    <div id="map"></div>
                </div>
            </div>
        </div>


				<div class="container-indent">
						<div class="container">
								<p>درباره ما</p>
						</div>
				</div>




        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
                <div class="tt-contact02-col-list">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 ml-sm-auto mr-sm-auto">
                            <div class="tt-contact-info"><i class="tt-icon icon-f-93"></i>
                                <h6 class="tt-title">شماره تماس:</h6>{{ $shop->shopContact->tel}}</div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="tt-contact-info"><i class="tt-icon icon-f-24"></i>
                                <h6 class="tt-title">آدرس:</h6><address>{{ $shop->shopContact->address }}</address></div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="tt-contact-info"><i class="tt-icon icon-f-93"></i>
                                <h6 class="tt-title">ایمیل: </h6>{{ $shop->shopContact->shop_email}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
                <form id="contactform" class="contact-form form-default" method="post" novalidate="novalidate" action="#">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="inputName" placeholder="نام">
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" id="inputEmail" placeholder="آدرس ایمیل">
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" id="inputSubject" placeholder="عنوان">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea name="message" class="form-control" rows="7" placeholder="متن" id="textareaMessage"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button style="color: blue" type="submit" class="btn btn-success">ارسال پیام</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

		@endsection

		@section('footerScripts')

		@endsection
