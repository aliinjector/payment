@extends('app.shop.3.layouts.master')
@section('content')


<!-- Page item Area -->
<div id="page_item_area">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 text-left">
        <h3>Contact</h3>
      </div>

      <div class="col-sm-6 text-right">
        <ul class="p_items">
          <li><a href="#">home</a></li>
          <li><span>Contact</span></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Contact Page -->
<div class="contact_page_area fix">
  <div class="container">
    <div class="row">
      <div class="contact_info col-lg-6 col-md-12 col-xs-12">
        <h3>اطلاعات تماس</h3>

        <div class="single_info">
          <div class="con_icon"><i class="fa fa-map-marker"></i></div>
            آدرس: {{ $shop->shopContact->address }}
        </div>
        <div class="single_info">
          <div class="con_icon"><i class="fa fa-phone"></i></div>
          <p>  شماره تماس: {{ $shop->shopContact->tel}}</p>
        </div>
        <div class="single_info">
          <div class="con_icon"><i class="fa fa-envelope"></i></div>
              ایمیل: {{ $shop->shopContact->shop_email}}

        </div>

      </div>

      <div class="contact_frm_area text-left col-lg-6 col-md-12 col-xs-12">
        <h3>Get in Touch</h3>
        <form action="#">
          <div class="form-row">
            <div class="form-group col-sm-6"><input type="text" class="form-control" placeholder="Name*" /></div>
            <div class="form-group col-sm-6"><input type="text" class="form-control" placeholder="Email*" /></div>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" placeholder="Subject" />
          </div>

          <div class="form-group">
            <textarea name="message" class="form-control" placeholder="Message"></textarea>
          </div>

          <div class="input-area submit-area"><button class="btn border-btn" type="submit" >Send Message</button></div>

        </form>
      </div>


    </div>
  </div>


  <div class="fix">
    <div id="contact_map_area"></div>
  </div>

</div>



  @endsection
