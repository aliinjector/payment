@extends('app.new-shop.01.master')

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
                                <h6 class="tt-title">شماره تماس:</h6><address>021-22322323:<br>09201010328</address></div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="tt-contact-info"><i class="tt-icon icon-f-24"></i>
                                <h6 class="tt-title">آدرس:</h6><address>میدان تست,<br>خیابان تست,<br>تهران</address></div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="tt-contact-info"><i class="tt-icon icon-f-92"></i>
                                <h6 class="tt-title">ساعات کاری</h6><address>همه روزه <br>8 صبح تا 18 عصر</address></div>
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
                        <button type="submit" class="btn">ارسال پیام</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

		@endsection

		@section('footerScripts')

		@endsection
