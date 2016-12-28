<section >
    <div class="container">
        <div class=" col-sm-12 col-md-12 " style="padding: 0px">
            <h3 class="title_index">tour giờ chót</h3>
            <div class="" style="height: auto !important;">
                <div class="tourGioChot">
                    <div class="contentGioChot">
                        <div class="contentGioChotOver">
                            <div class="wrapper">
                               {tour_count_down}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="masonry-section-demo">
    <div class="container">
        <div class="destination-grid-content">
            <div class="section-title"></div>
            <div class="">
                <h3 class="title_index">Khách sạn</h3>
                <div class="awe-masonry">
                    {khachsan_index}
                </div>
            </div>
            <div class="more-destination"><a href="{SITE-NAME}/khach-san/">Xem thêm</a></div>
        </div>
    </div>
</section>
<section class="sale-flights-section-demo">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="sale-flights-tabs tabs">
                    <ul>
                        <li><a href="#sale-flights-tabs-1">Tour nổi bật</a></li>
                        <li><a href="#sale-flights-tabs-2">Tour giảm giá</a></li>
                    </ul>
                    <div class="sale-flights-tabs__content tabs__content">
                        <div id="sale-flights-tabs-1">
                            {tour_PROMOTIONS}
                        </div>
                        <div id="sale-flights-tabs-2">
                            {tour_sales}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="awe-services"><h2>Tin tức</h2>
                    <ul class="awe-services__list">
                        {tintuc_index}
                    </ul>
                    <div class="video-wrapper embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item"
                                src="{link_video}" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>