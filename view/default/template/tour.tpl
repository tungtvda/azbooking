<section>
    <div class="container">
        <div class=" col-sm-12 col-md-12 " style="padding: 0px;text-align: center;margin-top: 20px;">
            <h3 class="title-box_primary">Dịch vụ của chúng tôi</h3>
            <div class="col-md-3 col-sm-6 col-xs-12 item_dich_vu">
                <a href="">
                    <img src="{SITE-NAME}/view/default/themes/images/icon_dichvu/tour.png">
                    <h5>Đặt tour du lịch</h5>
                    <p hidden>AZbooking.vn là trang bán dịch vụ du lịch ( tour du lịch, phòng khách sạn, vé máy bay…)</p>
                </a>

            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 item_dich_vu">
                <a href="{SITE-NAME}/khach-san/">
                    <img src="{SITE-NAME}/view/default/themes/images/icon_dichvu/hotel.png">
                    <h5>Đặt phòng khách sạn</h5>
                    <p hidden>AZbooking.vn là trang bán dịch vụ du lịch ( tour du lịch, phòng khách sạn, vé máy bay…)</p>
                </a>

            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 item_dich_vu">
                <a target="_blank" href="http://vemaybay.azbooking.vn/">
                    <img src="{SITE-NAME}/view/default/themes/images/icon_dichvu/maybay.png">
                    <h5>Đặt vé máy bay</h5>
                    <p hidden>AZbooking.vn là trang bán dịch vụ du lịch ( tour du lịch, phòng khách sạn, vé máy bay…)</p>
                </a>

            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 item_dich_vu">
                <a href="">
                    <img src="{SITE-NAME}/view/default/themes/images/icon_dichvu/car.png">
                    <h5>Thuê xe du lịch</h5>
                    <p hidden>AZbooking.vn là trang bán dịch vụ du lịch ( tour du lịch, phòng khách sạn, vé máy bay…)</p>
                </a>

            </div>
        </div>
    </div>
</section>

<section {hidden_count_down} >
    <div class="container">
        <div class=" col-sm-12 col-md-12 " style="padding: 0px">
            <h3 class="title_index">tour giờ chót <a style="float: right; margin-top: 10px; color: red; font-weight: bold;font-size: 14px;" href="{SITE-NAME}/tour-gio-chot/">Xem thêm...</a></h3>
            <div class="" style="height: auto !important;">
                <div class="tourGioChot">
                    <div class="contentGioChot">
                        <div class="contentGioChotOver">
                            <div class="wrapper">
                               {tour_count_down}
                                {tour_count_down_js}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--<section class="masonry-section-demo">
    <div class="container">
        <div class="destination-grid-content">
            <div class="section-title"></div>
            <div class="">
                <h3 class="title_index">Khách sạn giảm giá</h3>
                <div class="awe-masonry">

                </div>
            </div>
            <div class="more-destination"><a href="{SITE-NAME}/khach-san/">Xem thêm</a></div>
        </div>
    </div>
</section>-->
<section  class="sale-flights-section-demo">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="sale-flights-tabs tabs">
                    <ul>
                        <li><a href="#sale-flights-tabs-1">Tour giảm giá</a></li>
                        <li><a href="#sale-flights-tabs-2">Tour nổi bật</a></li>
                    </ul>
                    <div class="sale-flights-tabs__content tabs__content">
                        <div id="sale-flights-tabs-1">
                            {tour_sales}
                        </div>
                        <div id="sale-flights-tabs-2">

                            {tour_PROMOTIONS}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="awe-services"><h2><a href="{SITE-NAME}/cam-nang/">Tin tức</a> </h2>
                    <ul class="awe-services__list">
                        {tintuc_index}
                    </ul>
                    <div class="video-wrapper embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item"
                                src="{link_video}" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="awe-services"><h2>Fanpage</h2>
                    <div class="fb-page" data-href="https://www.facebook.com/azbooking.vietnam/" style="width: 100% !important;"
                         data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                         data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/azbooking.vietnam/" class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/azbooking.vietnam/">AZBOOKING.VN</a></blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section hidden class="masonry-section-demo" style="    background: #1897e9;">
    <div class="container">
            <div id="mda-why" class="clearfix">
                <div class="mda-content">
                    <div class="mda-item-title-icon clearfix">
                        <div class="lb">
                            VÌ SAO CHỌN AZBOOKING.VN ?
                        </div>
                    </div>
                    <div class="mda-why-box">
                       {tieuchi}

                    </div>
                </div>
            </div>
    </div>
</section>