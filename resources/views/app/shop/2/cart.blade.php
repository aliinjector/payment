@extends('app.shop.2.layouts.master')

@section('headerScripts')

@endsection

@section('content')

    <div id="tt-pageContent">
        <div class="container-indent">
            <div class="container">
                <h1 class="tt-title-subpages noborder">سبد خرید</h1>
                <div class="tt-shopcart-table-02">
                    <table>
                        <tbody>


                            <tr>
                                <td>
                                    <div class="tt-product-img"><img src="images/loader.svg" data-src="images/product/product-03.jpg" alt=""></div>
                                </td>
                                <td>
                                    <h2 class="tt-title"><a href="#">Flared Shift Dress</a></h2>
                                    <ul class="tt-list-description">
                                        <li>Size: 22</li>
                                        <li>Color: Green</li>
                                    </ul>
                                    <ul class="tt-list-parameters">
                                        <li>
                                            <div class="tt-price">$317</div>
                                        </li>
                                        <li>
                                            <div class="detach-quantity-mobile"></div>
                                        </li>
                                        <li>
                                            <div class="tt-price subtotal">$317</div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="tt-price">$317</div>
                                </td>
                                <td>
                                    <div class="detach-quantity-desctope">
                                        <div class="tt-input-counter style-01"><span class="minus-btn"></span>
                                            <input type="text" value="1" size="5"> <span class="plus-btn"></span></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="tt-price subtotal">$317</div>
                                </td>
                                <td>
                                    <a href="#" class="tt-btn-close"></a>
                                </td>
                            </tr>



                        </tbody>
                    </table>
                    <div class="tt-shopcart-btn">
                        <div class="col-left"><a class="btn-link" href="#"><i class="icon-e-19"></i>بازگشت به فروشگاه</a></div>
                        <div class="col-right"><a class="btn-link" href="#"><i class="icon-h-02"></i>حدف تمامی موارد از سب خرید</a> <a class="btn-link" href="#"><i class="icon-h-48"></i>بروزرسانی سبد خرید</a></div>
                    </div>
                </div>
                <div class="tt-shopcart-col">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="tt-shopcart-box">
                                <h4 class="tt-title">محاسبه هزینه ارسال و مالیات</h4>
                                <p>مقصد و روش ارسال خودرا وارد نمایید</p>
                                <form class="form-default">
                                    <div class="form-group">
                                        <label for="address_country">کشور <sup>*</sup></label>
                                        <select id="address_country" class="form-control">
                                            <option>Austria</option>
                                            <option>Belgium</option>
                                            <option>Cyprus</option>
                                            <option>Croatia</option>
                                            <option>Czech Republic</option>
                                            <option>Denmark</option>
                                            <option>Finland</option>
                                            <option>France</option>
                                            <option>Germany</option>
                                            <option>Greece</option>
                                            <option>Hungary</option>
                                            <option>Ireland</option>
                                            <option>France</option>
                                            <option>Italy</option>
                                            <option>Luxembourg</option>
                                            <option>Netherlands</option>
                                            <option>Poland</option>
                                            <option>Portugal</option>
                                            <option>Slovakia</option>
                                            <option>Slovenia</option>
                                            <option>Spain</option>
                                            <option>United Kingdom</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="address_province">شهر <sup>*</sup></label>
                                        <select id="address_province" class="form-control">
                                            <option>State/Province</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="address_zip">کد پستی <sup>*</sup></label>
                                        <input type="text" name="name" class="form-control" id="address_zip" placeholder="Zip/Postal Code">
                                    </div><a href="#" class="btn btn-border">محاسبه هزینه</a>
                                    <ul class="tt-list-dot list-dot-large">
                                        <li><a href="#">هزینه ارسال پیک در تهران: 15 هزار تومان</a></li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="tt-shopcart-box">
                                <h4 class="tt-title">یادداشت</h4>
                                <p>درصورتی که توضیحاتی جهت ارسال سفارش دارید اینجا وارد نمایید</p>
                                <form class="form-default">
                                    <textarea class="form-control" rows="7"></textarea>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="tt-shopcart-box tt-boredr-large">
                                <table class="tt-shopcart-table01">
                                    <tbody>
                                        <tr>
                                            <th>جمع</th>
                                            <td>$324</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>جمع کل</th>
                                            <td>$324</td>
                                        </tr>
                                    </tfoot>
                                </table><a href="#" class="btn btn-lg"><span class="icon icon-check_circle"></span>تسویه حساب</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

		@endsection

		@section('footerScripts')

		@endsection
