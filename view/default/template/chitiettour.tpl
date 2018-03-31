<link rel="stylesheet"
      href="{SITE-NAME}/view/default/themes/css/review.css"/>
<section class="filter-page">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="col-md-12 row" style="margin-top: 60px">
                    <div class="product">
                        <div style="padding: 0px" class="images col-md-6 col-sm-12">
                            <a itemprop="image" class="woocommerce-main-image zoom"
                               title="{name}"
                               data-rel="prettyPhoto[product-gallery]"><img style="width: 100%"
                                                                            src="{img}"
                                                                            class="attachment-shop_single wp-post-image "
                                                                            alt="{name}"
                                                                            title="{name}"></a>
                        </div>
                        <div class="summary entry-summary col-md-6 col-sm-12">
                            <!--<h1 itemprop="name" class="product_title entry-title">Bora Bora</h1>-->
                            <div itemprop="offers" class="detail_font">
                                {code_user}
                                <p class="price"><i class="icon-dollar"></i> Giá:
                                    <ins><span class="amount"> {price_format}</span> {vnd}</ins>
                                </p>
                                <!--<p class="price"><i class="icon-dollar"></i> Mã tour:
                                    <ins><span class="parameter"> {code}</span></ins>
                                </p>-->
                                <p class="price"><i class="icon-dollar"></i> Điểm khởi hành:
                                    <ins><span class="parameter"> {khoihanh}</span></ins>
                                </p>
                                <p class="price"><i class="icon-dollar"></i> Khởi hành:
                                    <ins><span class="parameter"> {departure_time}</span></ins>
                                </p>
                                <p class="price"><i class="icon-calendar"></i> Thời gian:
                                    <ins><span class="parameter"> {durations}</span></ins>
                                </p>
                                <!--<p class="price"><i class="icon-logout"></i> Departure: <ins><span class="parameter">Hanoi</span></ins></p>-->
                                <p class="price"><i class="icon-login"></i> Điểm đến:
                                    <ins><span class="parameter"> {destination}</span></ins>
                                </p>
                                <p class="price"><i class="icon-home"></i> Khách sạn:
                                    <ins>{start}</ins>
                                </p>
                                <p class="price" style="margin-bottom: 10px"><i class="icon-plane"></i> Phương tiện:
                                    <ins><span class="parameter"> {vehicle}</span></ins>
                                </p>
                            </div>
                            <div itemprop="description"><p></p></div>
                            <div itemprop="description">
                                <div style="float: left;width: 100%;" class="booking_detail_div grid grid_2">
                                    <a href="{link_booking}{id_user}" class="booking_detail btn btn-danger">ĐẶT
                                        NGAY </a>
                                    <div style="float: left;margin-top: 10px;margin-left: 10px;" class="social-share">
                                        <ul>
                                            <li><a href="https://www.facebook.com/sharer/sharer.php?u={link}"
                                                   target="_blank"><i style="background-color: #ffffff"
                                                                      class="fa fa-facebook"></i></a></li>
                                            <li><a href="https://twitter.com/intent/tweet?source=webclient&text={link}"
                                                   target="_blank"><i style="background-color: #ffffff"
                                                                      class="fa fa-twitter"></i></a></li>
                                            <li><a href="https://plus.google.com/share?url={link}"
                                                   onclick='javascript:window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600");return false;'
                                                   target="_blank"><i style="background-color: #ffffff"
                                                                      class="fa fa-google-plus"></i></a></li>
                                            <li><a href="http://pinterest.com/pin/create/button/?url={link}"
                                                   onclick="window.open(this.href); return false;" title="Pinterest"
                                                   target="_blank"><i style="background-color: #ffffff"
                                                                      class="fa fa-pinterest"></i></a></li>
                                            <li><a href="mailto:?Subject={name}?&amp;body={name}:{content_short}"
                                                   target="_blank"><i
                                                            class="fa fa-envelope"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="social_div grid grid_10"></div>
                            </div>
                        </div>
                    </div>
                    {div_tiep_thi}
                    <div class="package-details-content" style="float: left; width: 100%">
                        <h3 {hidden_summary} class="title">Tóm tắt</h3>
                        <p>{summary}
                        </p>

                        <h3 {hidden_summary} class="title">Nổi bật</h3>
                        <p>{highlights}
                        </p>
                        {quocgia}
                    </div>
                </div>
                <div class="product-tabs tabs col-md-12" style="border-bottom: 1px solid #D4D4D4;
    overflow: hidden;
    padding-bottom: 20px;">

                    <ul>
                        <li><a href="#tabs-1">Lịch trình</a></li>
                        <li hidden><a href="#tabs-2">Bao gồm</a></li>
                        <li hidden><a href="#tabs-3">Không bao gồm</a></li>
                        <li hidden><a href="#tabs-4">Bảng giá</a></li>
                    </ul>
                    <div class="product-tabs__content">
                        <div id="tabs-1">
                            <div class="initiative">
                                {schedule}
                            </div>
                        </div>
                        <div id="tabs-2">
                            <div class="services-on-flight">
                                {inclusion}
                            </div>
                        </div>
                        <div id="tabs-3">
                            <div class="initiative">
                                {exclusion}
                            </div>
                        </div>
                        <div id="tabs-4">
                            <div id="reviews">
                                {price_list}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-tabs tabs col-md-12" style="border-bottom: 1px solid #D4D4D4;
    overflow: hidden;
    padding-bottom: 20px;">

                    <ul>
                        <li><a href="#tabs-1">Bảng giá</a></li>
                    </ul>
                    <div class="product-tabs__content">
                        <div id="tabs-1">
                            <div class="initiative">
                                {price_list}
                            </div>
                        </div>

                    </div>

                </div>
                <div {hidden_inclusion} class="product-tabs tabs col-md-12" style="border-bottom: 1px solid #D4D4D4;
    overflow: hidden;
    padding-bottom: 20px;">
                    <ul>
                        <li><a href="#tabs-1">Bao gồm</a></li>
                    </ul>
                    <div class="product-tabs__content">
                        <div id="tabs-1">
                            <div class="initiative">
                                {inclusion}
                            </div>
                        </div>

                    </div>
                </div>
                <div {hidden_exclusion} class="product-tabs tabs col-md-12" style="border-bottom: 1px solid #D4D4D4;
    overflow: hidden;
    padding-bottom: 20px;;">
                    <ul>
                        <li><a href="#tabs-1">Không bao gồm</a></li>
                    </ul>
                    <div class="product-tabs__content">
                        <div id="tabs-1">
                            <div class="initiative">
                                {exclusion}
                            </div>
                        </div>

                    </div>
                </div>
                <div class="product-tabs tabs col-md-12" style="border-bottom: 1px solid #D4D4D4;
    overflow: hidden;
    padding-bottom: 20px;;">
                    <ul>
                        <li><a href="#tabs-1">Bình luận</a></li>
                    </ul>
                    <div class="product-tabs__content">
                        <div id="tabs-1">
                            <div class="initiative">
                                <div class="fb-comments"
                                     data-href="{link}"
                                     data-numposts="5"></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="related-post col-md-12 row"><h4>Có thể bạn quan tâm</h4>
                    <div class="related-slider">
                        {tour_lienquan}
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div id="booking" class="detail-sidebar">
                    <div class="call-to-book"><i class="awe-icon awe-icon-phone"></i> <em>Gọi ngay cho chúng tôi</em>
                        <span><a href="tel:{Hotline}">{Hotline}</a></span>
                        <span><a href="tel:{Hotline_hcm}">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{Hotline_hcm}</a></span>
                    </div>
                    <div class="booking-info"><h3>Chương trình tour</h3>
                        <p style="font-size: 12px">
                            {hanh_trinh}
                        </p>
                        <div style="text-align: center" class="price">
                            <a href="{link_booking}{id_user}" class=" btn btn-danger">ĐẶT
                                NGAY </a>
                        </div>
                        <div style="padding: 5px" class="price">
                            <h3 style="margin-top: 20px; margin-bottom: 0px">Du lịch giá tốt</h3>
                            <style>
                                .tour-sales {
                                    padding-left: 0px;
                                }

                                .tour-sales li {
                                    clear: both;
                                    overflow: hidden;
                                    position: relative;
                                    /* height: 118px; */
                                    border-bottom: 1px solid #e9e9f3;
                                    padding: 5px 0;
                                    margin-bottom: 10px;
                                }

                                .spring .block .title {
                                    /* background-color: #be0500; */
                                    padding-left: 0px;
                                }

                                .tdItem .title {
                                    clear: both;
                                    padding: 5px 0;

                                }

                                .block .title {
                                    margin-bottom: 2px;
                                }

                                .spring .block .title_left a {
                                    /* color: white; */
                                    color: black;
                                    font-size: 18px;
                                }

                                .tdItem .title_left a {
                                    color: #035a9d !important;
                                    font-weight: bold;
                                    font-size: 10pt !important;
                                    text-overflow: ellipsis;
                                    overflow: hidden;
                                    white-space: nowrap;
                                    display: block;
                                }

                                .tdItem .priceT span {
                                    color: #DD3B1F;
                                    font-size: 9pt;
                                    font-weight: bold;
                                }

                                .tdItem .priceT span {
                                    color: #DD3B1F;
                                    font-size: 10pt;
                                    font-weight: bold;
                                }

                                .tdItem .priceT strong {
                                    color: #A5A5A5;
                                    font-size: 9pt;
                                    text-decoration: line-through;
                                }

                                .tdItem .deal {
                                    color: #7a7b7d;
                                }

                                .tdItem .deal strong {
                                    color: #000;
                                    font-size: 9pt;
                                }

                                .tdItem .departure {
                                    position: absolute;
                                    right: 0;
                                    top: 53px;
                                    text-align: right;
                                    color: #4e525e;

                                }

                                .booking-info .awe-icon, .booking-info .fa {
                                    background-color: #ffffff;
                                }
                            </style>
                            <ul class="tour-sales">
                                {tour_sales}

                            </ul>
                        </div>
                        <div hidden class="calender"></div>
                        <input id="date_input" hidden value="{date_now}">
                        <input id="date_get_now" hidden value="{date_now}">
                        <input id="id_input" hidden value="{id}">
                        <input id="name_url_input" hidden value="{name_url}">

                        <input id="price_adults" value="{price}" hidden>
                        <input id="price_2" value="{price_2}" hidden>
                        <input id="price_3" value="{price_3}" hidden>
                        <input id="price_4" value="{price_4}" hidden>
                        <input id="price_5" value="{price_5}" hidden>
                        <input id="price_6" value="{price_6}" hidden>

                        <p hidden>Thời gian khởi hành</p>
                        <select hidden style="width: 100%;     padding: 0px;" id="date_select"
                                name="date_select">
                            {date_select}
                        </select>
                        <!--<div style="margin-top: 30px" class="form-group">
                            <div class="form-elements form-adult"><label>Adult</label>
                                <div class="form-item"><select class="awe-select">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select></div>
                                <span>12 yo and above</span></div>
                            <div class="form-elements form-kids"><label>Kids</label>
                                <div class="form-item"><select class="awe-select">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select></div>
                                <span>11 and under</span></div>
                        </div>-->
                        <div style="margin-top: 20px; display: none" class="back_detail">
                            <div class="form-group">
                                <label>Số người lớn</label>
                                <div class="form-item">
                                    <input onkeyup="myFunction()" onchange="myFunction()" min="1" type="number"
                                           id="num_price_adults" id="price_adults" value="">
                                </div>
                            </div>
                            <div class="form-baggage-weight">
                                <label>Trẻ em</label>
                                <div class="form-item">
                                    <input onkeyup="myFunction()" onchange="myFunction()" min="0" type="number"
                                           id="num_price_children_val" placeholder="Số trẻ em" value="0">
                                </div>
                            </div>
                            <div class="form-baggage-weight">
                                <label>Trẻ em dưới 5 tuổi</label>
                                <div class="form-item">
                                    <input style="width: 100%;padding: 5px;" onkeyup="myFunction()"
                                           onchange="myFunction()" min="0" type="number" id="num_price_children_5_val"
                                           placeholder="Trẻ em dưới 5 tuổi" value="0">
                                    <input hidden class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle"
                                           id="total_input">
                                </div>
                            </div>
                            <div style="display: none" id="hidden_total" class="price"><em>Tổng tiền đặt tour</em> <span
                                        class="amount" id="amount_total"></span></div>
                            <div class="form-submit">
                                <div class="add-to-cart">
                                    <a style=" display: none;" href="javascript:void(0);" id="next_booking_tour"> Tiếp
                                        tục <i style="    background-color: #0086cd;" class="fa fa-arrow-right"></i></a>
                                    <!--<button type="submit"><i class="awe-icon awe-icon-cart"></i>Add this to Cart
                                    </button>-->
                                </div>
                            </div>
                        </div>
                        <div class="next_detail"
                             style="display: none;margin-top: 20px; margin-bottom: 20px;float: left;">
                            <table class="nicdark_table extrabig nicdark_bg_yellow">

                                <tbody class="nicdark_bg_grey nicdark_border_grey table_booking"
                                       style="background-color: #f9f9f9 !important; border: none">
                                <tr>
                                    <td>
                                        Ngày khởi hành:
                                    </td>
                                    <td>
                                        <span id="date_table">{date_now_vn}</span>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        Người lớn:
                                    </td>
                                    <td>
                                        <span id="no_adults">0</span>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        Trẻ em
                                    </td>
                                    <td>
                                        <span id="no_children">N/A</span>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        Trẻ em dưới 5t
                                    </td>
                                    <td>
                                        <span id="no_children_5">N/A</span>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        Tổng tiền:
                                    </td>
                                    <td>
                                        <span id="total_fee"></span>
                                    </td>

                                </tr>
                                </tbody>
                            </table>
                            <h3 class=" title left lienquan"></h3>
                            <p style="color: red;margin-top: 10px; display: none; float: left;" id="full_name_er">Vui
                                lòng nhập họ tên</p>
                            <input class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle input_booking"
                                   type="text" placeholder="Họ tên" id="name_booking" style="width:100%">
                            <p style="color: red ; display: none" id="email_er">Vui lòng nhập email</p>
                            <input style="width:100%"
                                   class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle input_booking"
                                   type="text" placeholder="Email" id="email_booking">
                            <p style="color: red; display: none" id="phone_er">Vui lòng nhập số điện thoại</p>
                            <input style="width:100%"
                                   class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle input_booking"
                                   type="text" placeholder="Điện thoại" id="phone_booking">
                            <p style="color: red; display: none" id="address_er">Vui lòng nhập địa chỉ</p>
                            <input class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle input_booking"
                                   type="text" placeholder="Địa chỉ" id="address_booking">
                                                        <textarea style="height:90px; width:100%; margin-bottom: 20px"
                                                                  placeholder="Yêu cầu..."
                                                                  class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle input_booking"
                                                                  id="request_booking">

                                                        </textarea>

                            <a style="width: 45%;  background-color: #ed1c27; float: left" id="back_booking"
                               href="javascript:void(0);"
                               class="nicdark_btn nicdark_btn_filter fullwidth nicdark_bg_green calculate_bt"><i
                                        style="background-color: #ed1c27;" class="fa fa-arrow-left"></i> Trở lại</a>
                            <img id="loading_booking" style="width: 45px; display: none"
                                 src="{SITE-NAME}/view/default/themes/images/loading.gif">
                            <a class="calculate_bt"
                               style="float: right;text-align: center;padding: 2px 10px; color:#ffffff;"
                               id="booking_ajax" href="javascript:void(0);"> Đặt tour <i
                                        style="background-color: #0086cd;" class="fa fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div id="blockdisplay4" data-tab="reviews" class="pagination_scroll_top">
    <div data-component="core/sliding-panel-core-a11y" data-id="hp-reviews-sliding" id="hp-reviews-sliding"
         aria-hidden="false" class="sliding-panel-widget is-shown" tabindex="0" style="">
        <div data-component="core/et-scroll-observer" data-scrollable="" class="sliding-panel-widget-scrollable ">
            <div class="sliding-panel-widget-close-button" data-close-button="" role="button" tabindex="0"
                 aria-label="Close">
                <i class="bicon-aclose fa fa-angle-double-right fa-2x" aria-hidden="true"></i>
            </div>
            <div class="sliding-panel-widget-content review_list_block one_col" data-content="">
                <div>
                </div>
                <div class=" review-policy reviews-new-title--fix-top clearfix review-policy-fix ">
                    <img class="review-policy__icon" src="{SITE-NAME}/view/default/themes/images/review/checklist.png">
                    <div class="review-policy__header-group">
                        <h2 class="review-policy__header">
                            100% đánh giá đã được xác minh
                        </h2>

                    </div>
                </div>
                <div id="review_list_score_container" class="review_list_outer_container clearfix">
                    <div id="review_list_score" class=" review_list_score_container lang_ltr scores_full_layout">
                        <div class="reviews_panel_header_score">
<span class=" review-score-widget review-score-widget__very_good  review-score-widget__inline   review-score-widget__20      ">
<span class="review-score-badge" role="link" aria-label="Scored 8.2 ">
8.2
</span>
<span class="review-score-widget__text" role="link" aria-label="Rated very good">
Rất tốt
</span>
<span class="review-score-widget__subtext" role="link" aria-label=" from 3,824 reviews">
  3,824 đánh giá
</span>
</span>
<span class="reviews_panel_header_score--arrow js-fly-content-tooltip" aria-hidden="true"
      data-content-tooltip-element="#tooltip_score_distribution"
      data-extra-class-tooltip="fly-content-tooltip fly-content-tooltip--review-distribution"
      data-require-tooltip-class="js-fly-content-tooltip">
<svg class="bk-icon -fonticon-triangledown" height="5" width="12" viewBox="0 0 65 32">
    <path d="M0 0l32.32 32L64.64 0z"></path>
</svg>
</span>
                        </div>
                        <div id="tooltip_score_distribution" style="display: none">
                            <div class="review_list_block one_col">
                                <div class="scores_full_layout">
                                    <ul id="review_list_score_distribution"
                                        class="review_score_breakdown_list list_tighten clearfix">
                                        <li class="clearfix" data-question="review_adj_superb">
                                            <p class="review_score_name">
                                                Wonderful: 9+
                                            </p>
                                            <div class="score_bar">
                                                <div class="score_bar_value" data-score="36" style="width: 36%;"></div>
                                            </div>
                                            <p class="review_score_value">1372</p>
                                        </li>
                                        <li class="clearfix" data-question="review_adj_good">
                                            <p class="review_score_name">
                                                Good: 7 – 9
                                            </p>
                                            <div class="score_bar">
                                                <div class="score_bar_value" data-score="49" style="width: 49%;"></div>
                                            </div>
                                            <p class="review_score_value">1871</p>
                                        </li>
                                        <li class="clearfix" data-question="review_adj_average_okay">
                                            <p class="review_score_name">
                                                Okay: 5 – 7
                                            </p>
                                            <div class="score_bar">
                                                <div class="score_bar_value" data-score="12" style="width: 12%;"></div>
                                            </div>
                                            <p class="review_score_value">451</p>
                                        </li>
                                        <li class="clearfix" data-question="review_adj_poor">
                                            <p class="review_score_name">
                                                Poor: 3 – 5
                                            </p>
                                            <div class="score_bar">
                                                <div class="score_bar_value" data-score="2" style="width: 2%;"></div>
                                            </div>
                                            <p class="review_score_value">88</p>
                                        </li>
                                        <li class="clearfix" data-question="review_adj_very_poor">
                                            <p class="review_score_name">
                                                Very Poor: 1 – 3
                                            </p>
                                            <div class="score_bar">
                                                <div class="score_bar_value" data-score="1" style="width: 1%;"></div>
                                            </div>
                                            <p class="review_score_value">41</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="review_list_score_breakdown">
                            <div class="review_list_score_breakdown_left">
                                <ul class="review_score_breakdown_list list_tighten clearfix">
                                    <li class="clearfix" data-question="hotel_clean">
                                        <p class="review_score_name">Chương trình</p>
                                        <div class="score_bar">
                                            <div class="score_bar_value" data-score="83" style="width: 83%;"></div>
                                        </div>
                                        <p class="review_score_value">8.3</p>
                                    </li>
                                    <li class="clearfix" data-question="hotel_comfort">
                                        <p class="review_score_name">Hướng dẫn viên suốt tuyến</p>
                                        <div class="score_bar">
                                            <div class="score_bar_value" data-score="82" style="width: 82%;"></div>
                                        </div>
                                        <p class="review_score_value">8.2</p>
                                    </li>
                                    <li class="clearfix" data-question="hotel_services">
                                        <p class="review_score_name">Hướng dẫn viên địa phương</p>
                                        <div class="score_bar">
                                            <div class="score_bar_value" data-score="82" style="width: 82%;"></div>
                                        </div>
                                        <p class="review_score_value">8.2</p>
                                    </li>

                                </ul>
                            </div>
                            <div class="review_list_score_breakdown_right">
                                <ul class="review_score_breakdown_list list_tighten clearfix">
                                    <li class="clearfix" data-question="hotel_value">
                                        <p class="review_score_name">Khách sạn</p>
                                        <div class="score_bar">
                                            <div class="score_bar_value" data-score="81" style="width: 81%;"></div>
                                        </div>
                                        <p class="review_score_value">8.1</p>
                                    </li>
                                    <li class="clearfix" data-question="hotel_wifi">
                                        <p class="review_score_name">Nhà hàng</p>
                                        <div class="score_bar">
                                            <div class="score_bar_value" data-score="81" style="width: 81%;"></div>
                                        </div>
                                        <p class="review_score_value">8.1</p>
                                    </li>
                                    <li class="clearfix" data-question="hotel_location">
                                        <p class="review_score_name">Phương tiện vận chuyển</p>
                                        <div class="score_bar">
                                            <div class="score_bar_value" data-score="78" style="width: 78%;"></div>
                                        </div>
                                        <p class="review_score_value">7.8</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div data-et-view="adUAVGHCcZbFDEOIGO:1"></div>
                    <div class="review_list_container review-list--clean">

                        <div id="review_list_page_container" style="display: block;">

                            <div data-et-view="adUAVGZaZfLLIMLaUJeaILYJO:1"></div>
                            <div class="review-list-topic-filter">
                                <p class="review-list-topic-filter__heading">
                                    Lọc đánh giá theo các chủ đề
                                </p>
                                <ul class="review-list-topic-filter__list clearfix">
                                    <li class="review-list-topic-filter__list-item"><a
                                                href="javascript:void(0)"
                                                class="review-list-topic-filter__item-link js-review-list-topic-filter__item-link"
                                                data-category-id="4" data-category-name="food_beverage">
                                            Chương trình
                                        </a>
                                    </li>
                                    <li class="review-list-topic-filter__list-item"><a
                                                href="javascript:void(0)"
                                                class="review-list-topic-filter__item-link js-review-list-topic-filter__item-link"
                                                data-category-id="3" data-category-name="staff">
                                            Hướng dẫn viên suốt tuyến
                                        </a>
                                    </li>
                                    <li class="review-list-topic-filter__list-item"><a
                                                href="javascript:void(0)"
                                                class="review-list-topic-filter__item-link js-review-list-topic-filter__item-link"
                                                data-category-id="6" data-category-name="location">
                                            Hướng dẫn viên địa phương
                                        </a>
                                    </li>
                                    <li class="review-list-topic-filter__list-item"><a
                                                href="javascript:void(0)"
                                                class="review-list-topic-filter__item-link js-review-list-topic-filter__item-link"
                                                data-category-id="5" data-category-name="breakfast">
                                            Khách sạn
                                        </a>
                                    </li>
                                    <li class="review-list-topic-filter__list-item"><a
                                                href="javascript:void(0)"
                                                class="review-list-topic-filter__item-link js-review-list-topic-filter__item-link"
                                                data-category-id="13" data-category-name="spa_gym">
                                            Nhà hàng
                                        </a>
                                    </li>
                                    <li class="review-list-topic-filter__list-item"><a
                                                href="javascript:void(0)"
                                                class="review-list-topic-filter__item-link js-review-list-topic-filter__item-link"
                                                data-category-id="19" data-category-name="views_surroundings">
                                            Phương tiện vận chuyển
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <ul class="review_list" data-et-view="HDDHQDSJPXaFWDaXe:1">
                                <li class="review_item clearfix featured_review_item ">
                                    <div class="featured_review_item__header_block featured_review-scout_review"
                                         data-et-view="adUAVGZaeaPDERXSEJCLfeKe:1 adUAVGZaeaPDERXSEJCLfeKe:2">
                                        <div class="featured_review_item__icon_container"><img
                                                    src="./Sunland Hotel, Ho Chi Minh City – Updated 2018 Prices_files/04ffbb1883a9aaa70bf2ef642b336af431abe595.png"
                                                    alt="Property Scout Review"></div>
                                        <div class="featured_review_item__header featured_review_item__no_votes">
                                            Danh sách đánh giá
                                        </div>
                                    </div>
                                    <div class="featured_review-scout_review-subheader">
                                        Property Scouts are guests just like you. They're dedicated
                                        to reporting back the full story with detailed reviews.
                                    </div>
                                    <p class="review_item_date">
                                        Reviewed: April 30, 2017
                                    </p>
                                    <div data-et-view="aRDPNZJKSXe:2"></div>
                                    <div class="review_item_reviewer">
                                        <div>
                                            <img class="avatar-mask ava-pad-bottom ava-default"
                                                 src="./Sunland Hotel, Ho Chi Minh City – Updated 2018 Prices_files/8103dfb0481c4cedc201d849f5666a270512f538.png"
                                                 alt="Bronwyn"
                                                 onerror="this.onerror = null;this.src = 'https://q.bstatic.com/static/img/review/avatars/ava-b/8103dfb0481c4cedc201d849f5666a270512f538.png';">
                                        </div>
                                        <h4>
                                            Bronwyn
                                        </h4>
<span class="reviewer_country">
<span class="reviewer_country_flag sflag slang-nz  ">
</span>
New Zealand
</span>
                                        <div class="user_age_group">
                                        </div>
                                        <div class="user_badge_list">
                                            <img width="
20
" src="./Sunland Hotel, Ho Chi Minh City – Updated 2018 Prices_files/4822f6159864de18c772c164f31f32245e03af23.png"
                                                 class="js-fly-content-tooltip "
                                                 data-content-tooltip="<p><strong>Status: Wordsmith Level 2</strong><br><br>Wordsmiths love to write about their trips and keep coming back to tell us more!</p>"
                                                 data-extra-class-tooltip="fly-content-tooltip r-badge-tooltip"
                                                 alt="Status: Wordsmith Level 2">
                                            <img width="
20
" src="./Sunland Hotel, Ho Chi Minh City – Updated 2018 Prices_files/07e68b71cb9ff9d7520e8df11e9e3429dd77073b.png"
                                                 class="js-fly-content-tooltip "
                                                 data-content-tooltip="<p><strong>Status: Photo Enthusiast Level 3</strong><br><br>Photo Enthusiasts are photo fanatics who share lots of pictures with their reviews.</p>"
                                                 data-extra-class-tooltip="fly-content-tooltip r-badge-tooltip"
                                                 alt="Status: Photo Enthusiast Level 3">
                                        </div>
                                        <div class="review_item_user_review_count">
                                            25 Reviews
                                        </div>
                                        <div class="review_item_user_helpful_count">
                                            1 helpful vote
                                        </div>
                                    </div><!-- .review_item_reviewer -->
                                    <div class="review_item_review">
                                        <div class="review_item_review_container lang_ltr">
                                            <div class="review_item_review_header">
                                                <div class="
review_item_header_score_container
">

<span class=" review-score-widget review-score-widget__superb review-score-widget__score-only      review-score-widget__no-subtext    ">
<span class="review-score-badge" role="link" aria-label="Scored 9.2 ">
9.2
</span>
</span>
                                                </div>
                                                <div class="review_item_header_content_container">
                                                    <div class="review_item_header_content
 review_item_header_scoreword
">
                                                        Wonderful
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review_item_review_content">
                                                <p class="review_neg "><i class="review_item_icon"
                                                                          data-et-click="customGoal:HDDHQDSJPXaFWDaXe:1">눉</i>wifi
                                                    was unreliable. pool ohotos make it look bigger
                                                    than it is. they charge laundry by the piece
                                                    rather than weight which was super expensive.
                                                </p>
                                                <p class="review_pos "><i class="review_item_icon"
                                                                          data-et-click="customGoal:HDDHQDSJPXaFWDaXe:2">눇</i>location
                                                    is a wee but away from the hub but nice being on
                                                    the river and possibly a little quieter for
                                                    this. staff were great and great breakfast.</p>
                                                <div class="ABbDSFbDdPOdCYO_view_tracking_div"
                                                     data-room-id="71978203"></div>
                                                <p class="review_staydate  reviews-no-room-stayed-71978203">
                                                    Stayed in April 2017
                                                </p>
                                                <p class="review_staydate reviews-room-stayed-71978203 g-hidden ">
                                                    Stayed in
                                                    <a href="https://www.booking.com/hotel/vn/sunland.html?label=gen173nr-1FCAEoggJCAlhYSDNYBGj0AYgBAZgBMcIBCndpbmRvd3MgMTDIAQzYAQHoAQH4AQKSAgF5qAID;sid=6dd10b3e0aa84c24063f161f676684c6;dest_id=-3730078;dest_type=city;dist=0;hapos=1;hpos=1;room1=A%2CA;sb_price_type=total;srepoch=1522467934;srfid=5f6d57ef4fb9d43024d06a3f9d548ae7b1e9115fX1;srpvid=4c6c1a6f19d5021d;type=total;ucfs=1&amp;#RD71978203"
                                                       style="color: #0077CC; text-decoration: underline;"
                                                       data-title="View availability for Two-Bedroom Suite with Living Room">
                                                        Two-Bedroom Suite with Living Room
                                                    </a>
                                                    (April 2017)
                                                </p>
                                                <script>
                                                    (function () {
                                                        /*
                                                         This approach is the best way to not show the links for non-available or soldout roms,
                                                         and I'm sorry for doing it this way.
                                                         If this experiment goes full-on I'll do a technical experiment to do it in a better
                                                         way.
                                                         */
                                                        var room_id = 71978203,
                                                                $room_links,
                                                                $view_untracked_links,
                                                                $group_untracked_links,
                                                                et_view_tracking_tag = 'ABbDSFbDdPOdCYO:2',
                                                                et_group_tracking_tag = 'ABbDSFbDdPOdCYO:5';
                                                        if (B.env.b_available_rooms_by_room_id && B.env.b_available_rooms_by_room_id[room_id]) {
                                                            $room_links = $('.reviews-room-stayed-' + room_id + '.g-hidden');
                                                            $view_untracked_links = $('.ABbDSFbDdPOdCYO_view_tracking_div[data-room-id="' + room_id + '"]').filter(function () {
                                                                var et_view = $(this).attr('data-et-view') || '';
                                                                return et_view.indexOf(et_view_tracking_tag) < 0;
                                                            });
                                                            $view_untracked_links.attr('data-et-view', ($view_untracked_links.attr('data-et-view') || '') + ' ' + et_view_tracking_tag);
                                                            B.et.initAttributesTracking($view_untracked_links);
                                                            if (B.env.b_is_group_search && B.env.b_is_group_search === '1') {
                                                                $group_untracked_links = $('.ABbDSFbDdPOdCYO_view_tracking_div[data-room-id="' + room_id + '"]').filter(function () {
                                                                    var et_view = $(this).attr('data-et-view') || '';
                                                                    return et_view.indexOf(et_group_tracking_tag) < 0;
                                                                });
                                                                $group_untracked_links.attr('data-et-view', ($group_untracked_links.attr('data-et-view') || '') + ' ' + et_group_tracking_tag);
                                                                B.et.initAttributesTracking($group_untracked_links);
                                                            }
                                                            if (B.et.track('ABbDSFbDdPOdCYO') > 1) {
                                                                $room_links.removeClass('g-hidden');
                                                                $('.reviews-no-room-stayed-71978203')
                                                                        .filter(function () {
                                                                            return !$(this).hasClass('g-hidden');
                                                                        })
                                                                        .addClass('g-hidden');
                                                            }
                                                        }
                                                    })();
                                                </script>
                                            </div>
                                            <div class="review-helpful__container"
                                                 data-component="reviews/review-helpful" data-current-count="0">
                                                <form class="review-helpful__form clearfix"
                                                      action="https://www.booking.com/vote_review" method="post">
                                                    <input type="hidden" name="hotel_id" value="719782">
                                                    <input type="hidden" name="review_url" value="eb2bb14b428df5fe">
                                                    <input type="hidden" name="review_id" value="0">
                                                    <input type="hidden" name="vote_type" value="1">
                                                    <input type="hidden" name="vote_value" value="1">
                                                    <button type="submit"
                                                            class="review-helpful__form-submit review-helpful-heart-submit">
                                                        Helpful
                                                    </button>
                                                </form>
                                                <p class="review-helpful__vote-feedback-message review-helpful-heart-vote-feedback-message">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="review_item clearfix ">
                                    <p class="review_item_date" data-et-view="bLTLRZYGaQDDFWJcXe:1">
                                        Reviewed: March 30, 2018
                                    </p>
                                    <div data-et-view="aRDPNZJKSXe:2"></div>
                                    <div class="review_item_reviewer">
                                        <div>
                                            <img class="avatar-mask ava-pad-bottom ava-default"
                                                 src="./Sunland Hotel, Ho Chi Minh City – Updated 2018 Prices_files/2c7be68fb3f987f1352e7b289d4b24137e1a283d.png"
                                                 alt="Ahmed"
                                                 onerror="this.onerror = null;this.src = 'https://r.bstatic.com/static/img/review/avatars/ava-a/2c7be68fb3f987f1352e7b289d4b24137e1a283d.png';">
                                        </div>
                                        <h4>
                                            Ahmed
                                        </h4>
<span class="reviewer_country">
<span class="reviewer_country_flag sflag slang-gb  ">
</span>
United Kingdom
</span>
                                        <div class="user_age_group">
                                        </div>
                                        <div class="user_badge_list">
                                            <img width="
20
" src="./Sunland Hotel, Ho Chi Minh City – Updated 2018 Prices_files/f11fbfff4efab774acb19f9ad27422c9ed2fe154.png"
                                                 class="js-fly-content-tooltip "
                                                 data-content-tooltip="<p><strong>Status: Wordsmith Level 1</strong><br><br>Wordsmiths love to write about their trips and keep coming back to tell us more!</p>"
                                                 data-extra-class-tooltip="fly-content-tooltip r-badge-tooltip"
                                                 alt="Status: Wordsmith Level 1">
                                        </div>
                                        <div class="review_item_user_review_count">
                                            23 Reviews
                                        </div>
                                    </div><!-- .review_item_reviewer -->
                                    <div class="review_item_review">
                                        <div class="review_item_review_container lang_ltr">
                                            <div class="review_item_review_header">
                                                <div class="
review_item_header_score_container
">

<span class=" review-score-widget review-score-widget__good review-score-widget__score-only      review-score-widget__no-subtext    jq_tooltip  ">
<span class="review-score-badge" role="link" aria-label="Scored 7.9 ">
7.9
</span>
</span>
                                                </div>
                                                <div class="review_item_header_content_container">
                                                    <div class="review_item_header_content
">
                                                        “Fantastic hotel in middle of everywhere,
                                                        the top deck view is breathtaking”
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review_item_review_content">
                                                <p class="review_neg "><i class="review_item_icon"
                                                                          data-et-click="customGoal:HDDHQDSJPXaFWDaXe:1">눉</i>Room
                                                    service did not answer the phone after 12:00</p>
                                                <p class="review_pos "><i class="review_item_icon"
                                                                          data-et-click="customGoal:HDDHQDSJPXaFWDaXe:2">눇</i>Top
                                                    deck view is amazing</p>
                                                <div class="ABbDSFbDdPOdCYO_view_tracking_div"
                                                     data-room-id="71978204"></div>
                                                <p class="review_staydate  reviews-no-room-stayed-71978204">
                                                    Stayed in March 2018
                                                </p>
                                                <p class="review_staydate reviews-room-stayed-71978204 g-hidden ">
                                                    Stayed in
                                                    <a href="https://www.booking.com/hotel/vn/sunland.html?label=gen173nr-1FCAEoggJCAlhYSDNYBGj0AYgBAZgBMcIBCndpbmRvd3MgMTDIAQzYAQHoAQH4AQKSAgF5qAID;sid=6dd10b3e0aa84c24063f161f676684c6;dest_id=-3730078;dest_type=city;dist=0;hapos=1;hpos=1;room1=A%2CA;sb_price_type=total;srepoch=1522467934;srfid=5f6d57ef4fb9d43024d06a3f9d548ae7b1e9115fX1;srpvid=4c6c1a6f19d5021d;type=total;ucfs=1&amp;#RD71978204"
                                                       style="color: #0077CC; text-decoration: underline;"
                                                       data-title="View availability for Superior Double or Twin Room with Window">
                                                        Superior Double or Twin Room with Window
                                                    </a>
                                                    (March 2018)
                                                </p>
                                                <script>
                                                    (function () {
                                                        /*
                                                         This approach is the best way to not show the links for non-available or soldout roms,
                                                         and I'm sorry for doing it this way.
                                                         If this experiment goes full-on I'll do a technical experiment to do it in a better
                                                         way.
                                                         */
                                                        var room_id = 71978204,
                                                                $room_links,
                                                                $view_untracked_links,
                                                                $group_untracked_links,
                                                                et_view_tracking_tag = 'ABbDSFbDdPOdCYO:2',
                                                                et_group_tracking_tag = 'ABbDSFbDdPOdCYO:5';
                                                        if (B.env.b_available_rooms_by_room_id && B.env.b_available_rooms_by_room_id[room_id]) {
                                                            $room_links = $('.reviews-room-stayed-' + room_id + '.g-hidden');
                                                            $view_untracked_links = $('.ABbDSFbDdPOdCYO_view_tracking_div[data-room-id="' + room_id + '"]').filter(function () {
                                                                var et_view = $(this).attr('data-et-view') || '';
                                                                return et_view.indexOf(et_view_tracking_tag) < 0;
                                                            });
                                                            $view_untracked_links.attr('data-et-view', ($view_untracked_links.attr('data-et-view') || '') + ' ' + et_view_tracking_tag);
                                                            B.et.initAttributesTracking($view_untracked_links);
                                                            if (B.env.b_is_group_search && B.env.b_is_group_search === '1') {
                                                                $group_untracked_links = $('.ABbDSFbDdPOdCYO_view_tracking_div[data-room-id="' + room_id + '"]').filter(function () {
                                                                    var et_view = $(this).attr('data-et-view') || '';
                                                                    return et_view.indexOf(et_group_tracking_tag) < 0;
                                                                });
                                                                $group_untracked_links.attr('data-et-view', ($group_untracked_links.attr('data-et-view') || '') + ' ' + et_group_tracking_tag);
                                                                B.et.initAttributesTracking($group_untracked_links);
                                                            }
                                                            if (B.et.track('ABbDSFbDdPOdCYO') > 1) {
                                                                $room_links.removeClass('g-hidden');
                                                                $('.reviews-no-room-stayed-71978204')
                                                                        .filter(function () {
                                                                            return !$(this).hasClass('g-hidden');
                                                                        })
                                                                        .addClass('g-hidden');
                                                            }
                                                        }
                                                    })();
                                                </script>
                                            </div>
                                            <div class="review-helpful__container"
                                                 data-component="reviews/review-helpful" data-current-count="0">
                                                <form class="review-helpful__form clearfix"
                                                      action="https://www.booking.com/vote_review" method="post">
                                                    <input type="hidden" name="hotel_id" value="719782">
                                                    <input type="hidden" name="review_url" value="3df616acde06389a">
                                                    <input type="hidden" name="review_id" value="0">
                                                    <input type="hidden" name="vote_type" value="1">
                                                    <input type="hidden" name="vote_value" value="1">
                                                    <button type="submit"
                                                            class="review-helpful__form-submit review-helpful-heart-submit">
                                                        Helpful
                                                    </button>
                                                </form>
                                                <p class="review-helpful__vote-feedback-message review-helpful-heart-vote-feedback-message">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="review_item clearfix ">
                                    <p class="review_item_date" data-et-view="bLTLRZYGaQDDFWJcXe:1">
                                        Reviewed: March 30, 2018
                                    </p>
                                    <div data-et-view="aRDPNZJKSXe:2"></div>
                                    <div class="review_item_reviewer">
                                        <div>
                                            <img class="avatar-mask ava-pad-bottom ava-default"
                                                 src="./Sunland Hotel, Ho Chi Minh City – Updated 2018 Prices_files/315f92289c481a16de5ee7737aa1b5fd531afcce.png"
                                                 alt="Corneilous"
                                                 onerror="this.onerror = null;this.src = 'https://r.bstatic.com/static/img/review/avatars/ava-c/315f92289c481a16de5ee7737aa1b5fd531afcce.png';">
                                        </div>
                                        <h4>
                                            Corneilous
                                        </h4>
<span class="reviewer_country">
<span class="reviewer_country_flag sflag slang-au  ">
</span>
Australia
</span>
                                        <div class="user_age_group">
                                        </div>
                                        <div class="user_badge_list">
                                            <img width="
20
" src="./Sunland Hotel, Ho Chi Minh City – Updated 2018 Prices_files/f11fbfff4efab774acb19f9ad27422c9ed2fe154.png"
                                                 class="js-fly-content-tooltip "
                                                 data-content-tooltip="<p><strong>Status: Wordsmith Level 1</strong><br><br>Wordsmiths love to write about their trips and keep coming back to tell us more!</p>"
                                                 data-extra-class-tooltip="fly-content-tooltip r-badge-tooltip"
                                                 alt="Status: Wordsmith Level 1">
                                        </div>
                                        <div class="review_item_user_review_count">
                                            8 Reviews
                                        </div>
                                    </div><!-- .review_item_reviewer -->
                                    <div class="review_item_review">
                                        <div class="review_item_review_container lang_ltr">
                                            <div class="review_item_review_header">
                                                <div class="
review_item_header_score_container
">

<span class=" review-score-widget review-score-widget__good review-score-widget__score-only      review-score-widget__no-subtext    jq_tooltip  ">
<span class="review-score-badge" role="link" aria-label="Scored 7.9 ">
7.9
</span>
</span>
                                                </div>
                                                <div class="review_item_header_content_container">
                                                    <div class="review_item_header_content
">
                                                        “Reasonable overall”
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review_item_review_content">
                                                <p class="review_neg "><i class="review_item_icon"
                                                                          data-et-click="customGoal:HDDHQDSJPXaFWDaXe:1">눉</i>The
                                                    breakfast wasn’t up to expectations
                                                    The unsuite was pretty transparent</p>
                                                <p class="review_pos "><i class="review_item_icon"
                                                                          data-et-click="customGoal:HDDHQDSJPXaFWDaXe:2">눇</i>Location
                                                    was good
                                                    Rooftop bar was excellent</p>
                                                <div class="ABbDSFbDdPOdCYO_view_tracking_div"
                                                     data-room-id="71978202"></div>
                                                <p class="review_staydate  reviews-no-room-stayed-71978202">
                                                    Stayed in March 2018
                                                </p>
                                                <p class="review_staydate reviews-room-stayed-71978202 g-hidden ">
                                                    Stayed in
                                                    <a href="https://www.booking.com/hotel/vn/sunland.html?label=gen173nr-1FCAEoggJCAlhYSDNYBGj0AYgBAZgBMcIBCndpbmRvd3MgMTDIAQzYAQHoAQH4AQKSAgF5qAID;sid=6dd10b3e0aa84c24063f161f676684c6;dest_id=-3730078;dest_type=city;dist=0;hapos=1;hpos=1;room1=A%2CA;sb_price_type=total;srepoch=1522467934;srfid=5f6d57ef4fb9d43024d06a3f9d548ae7b1e9115fX1;srpvid=4c6c1a6f19d5021d;type=total;ucfs=1&amp;#RD71978202"
                                                       style="color: #0077CC; text-decoration: underline;"
                                                       data-title="View availability for Deluxe Double Room with River View">
                                                        Deluxe Double Room with River View
                                                    </a>
                                                    (March 2018)
                                                </p>
                                                <script>
                                                    (function () {
                                                        /*
                                                         This approach is the best way to not show the links for non-available or soldout roms,
                                                         and I'm sorry for doing it this way.
                                                         If this experiment goes full-on I'll do a technical experiment to do it in a better
                                                         way.
                                                         */
                                                        var room_id = 71978202,
                                                                $room_links,
                                                                $view_untracked_links,
                                                                $group_untracked_links,
                                                                et_view_tracking_tag = 'ABbDSFbDdPOdCYO:2',
                                                                et_group_tracking_tag = 'ABbDSFbDdPOdCYO:5';
                                                        if (B.env.b_available_rooms_by_room_id && B.env.b_available_rooms_by_room_id[room_id]) {
                                                            $room_links = $('.reviews-room-stayed-' + room_id + '.g-hidden');
                                                            $view_untracked_links = $('.ABbDSFbDdPOdCYO_view_tracking_div[data-room-id="' + room_id + '"]').filter(function () {
                                                                var et_view = $(this).attr('data-et-view') || '';
                                                                return et_view.indexOf(et_view_tracking_tag) < 0;
                                                            });
                                                            $view_untracked_links.attr('data-et-view', ($view_untracked_links.attr('data-et-view') || '') + ' ' + et_view_tracking_tag);
                                                            B.et.initAttributesTracking($view_untracked_links);
                                                            if (B.env.b_is_group_search && B.env.b_is_group_search === '1') {
                                                                $group_untracked_links = $('.ABbDSFbDdPOdCYO_view_tracking_div[data-room-id="' + room_id + '"]').filter(function () {
                                                                    var et_view = $(this).attr('data-et-view') || '';
                                                                    return et_view.indexOf(et_group_tracking_tag) < 0;
                                                                });
                                                                $group_untracked_links.attr('data-et-view', ($group_untracked_links.attr('data-et-view') || '') + ' ' + et_group_tracking_tag);
                                                                B.et.initAttributesTracking($group_untracked_links);
                                                            }
                                                            if (B.et.track('ABbDSFbDdPOdCYO') > 1) {
                                                                $room_links.removeClass('g-hidden');
                                                                $('.reviews-no-room-stayed-71978202')
                                                                        .filter(function () {
                                                                            return !$(this).hasClass('g-hidden');
                                                                        })
                                                                        .addClass('g-hidden');
                                                            }
                                                        }
                                                    })();
                                                </script>
                                            </div>
                                            <div class="review-helpful__container"
                                                 data-component="reviews/review-helpful" data-current-count="0">
                                                <form class="review-helpful__form clearfix"
                                                      action="https://www.booking.com/vote_review" method="post">
                                                    <input type="hidden" name="hotel_id" value="719782">
                                                    <input type="hidden" name="review_url" value="87ca6be1ca816163">
                                                    <input type="hidden" name="review_id" value="0">
                                                    <input type="hidden" name="vote_type" value="1">
                                                    <input type="hidden" name="vote_value" value="1">
                                                    <button type="submit"
                                                            class="review-helpful__form-submit review-helpful-heart-submit">
                                                        Helpful
                                                    </button>
                                                </form>
                                                <p class="review-helpful__vote-feedback-message review-helpful-heart-vote-feedback-message">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="review_item clearfix ">
                                    <p class="review_item_date" data-et-view="bLTLRZYGaQDDFWJcXe:1">
                                        Reviewed: March 30, 2018
                                    </p>
                                    <div data-et-view="aRDPNZJKSXe:2"></div>
                                    <div class="review_item_reviewer">
                                        <div>
                                            <img class="avatar-mask ava-pad-bottom ava-default"
                                                 src="./Sunland Hotel, Ho Chi Minh City – Updated 2018 Prices_files/0e43c9b9a23d334b52510a328641c048847226bc.png"
                                                 alt="Melanie"
                                                 onerror="this.onerror = null;this.src = 'https://r.bstatic.com/static/img/review/avatars/ava-m/0e43c9b9a23d334b52510a328641c048847226bc.png';">
                                        </div>
                                        <h4>
                                            Melanie
                                        </h4>
<span class="reviewer_country">
<span class="reviewer_country_flag sflag slang-au  ">
</span>
Australia
</span>
                                        <div class="user_age_group">
                                        </div>
                                        <div class="review_item_user_review_count">
                                            5 Reviews
                                        </div>
                                    </div><!-- .review_item_reviewer -->
                                    <div class="review_item_review">
                                        <div class="review_item_review_container lang_ltr">
                                            <div class="review_item_review_header">
                                                <div class="
review_item_header_score_container
">

<span class=" review-score-widget review-score-widget__pleasant review-score-widget__low review-score-widget__score-only      review-score-widget__no-subtext    jq_tooltip  ">
<span class="review-score-badge" role="link" aria-label="Scored 6.7 ">
6.7
</span>
</span>
                                                </div>
                                                <div class="review_item_header_content_container">
                                                    <div class="review_item_header_content
">
                                                        “Average. Loved the roof top bar.”
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review_item_review_content">
                                                <p class="review_neg "><i class="review_item_icon"
                                                                          data-et-click="customGoal:HDDHQDSJPXaFWDaXe:1">눉</i>Location
                                                    wasn't great. Quite dirty in the surrounding
                                                    streets and sadly river is very dirty as well.
                                                    Staying closer to the Market Ben Thanh is
                                                    better.</p>
                                                <p class="review_pos "><i class="review_item_icon"
                                                                          data-et-click="customGoal:HDDHQDSJPXaFWDaXe:2">눇</i>The
                                                    staff were really what made this property.
                                                    It's ok with maintaince but photos are better
                                                    than reality.</p>
                                                <div class="ABbDSFbDdPOdCYO_view_tracking_div"
                                                     data-room-id="71978204"></div>
                                                <p class="review_staydate  reviews-no-room-stayed-71978204">
                                                    Stayed in March 2018
                                                </p>
                                                <p class="review_staydate reviews-room-stayed-71978204 g-hidden ">
                                                    Stayed in
                                                    <a href="https://www.booking.com/hotel/vn/sunland.html?label=gen173nr-1FCAEoggJCAlhYSDNYBGj0AYgBAZgBMcIBCndpbmRvd3MgMTDIAQzYAQHoAQH4AQKSAgF5qAID;sid=6dd10b3e0aa84c24063f161f676684c6;dest_id=-3730078;dest_type=city;dist=0;hapos=1;hpos=1;room1=A%2CA;sb_price_type=total;srepoch=1522467934;srfid=5f6d57ef4fb9d43024d06a3f9d548ae7b1e9115fX1;srpvid=4c6c1a6f19d5021d;type=total;ucfs=1&amp;#RD71978204"
                                                       style="color: #0077CC; text-decoration: underline;"
                                                       data-title="View availability for Superior Double or Twin Room with Window">
                                                        Superior Double or Twin Room with Window
                                                    </a>
                                                    (March 2018)
                                                </p>
                                                <script>
                                                    (function () {
                                                        /*
                                                         This approach is the best way to not show the links for non-available or soldout roms,
                                                         and I'm sorry for doing it this way.
                                                         If this experiment goes full-on I'll do a technical experiment to do it in a better
                                                         way.
                                                         */
                                                        var room_id = 71978204,
                                                                $room_links,
                                                                $view_untracked_links,
                                                                $group_untracked_links,
                                                                et_view_tracking_tag = 'ABbDSFbDdPOdCYO:2',
                                                                et_group_tracking_tag = 'ABbDSFbDdPOdCYO:5';
                                                        if (B.env.b_available_rooms_by_room_id && B.env.b_available_rooms_by_room_id[room_id]) {
                                                            $room_links = $('.reviews-room-stayed-' + room_id + '.g-hidden');
                                                            $view_untracked_links = $('.ABbDSFbDdPOdCYO_view_tracking_div[data-room-id="' + room_id + '"]').filter(function () {
                                                                var et_view = $(this).attr('data-et-view') || '';
                                                                return et_view.indexOf(et_view_tracking_tag) < 0;
                                                            });
                                                            $view_untracked_links.attr('data-et-view', ($view_untracked_links.attr('data-et-view') || '') + ' ' + et_view_tracking_tag);
                                                            B.et.initAttributesTracking($view_untracked_links);
                                                            if (B.env.b_is_group_search && B.env.b_is_group_search === '1') {
                                                                $group_untracked_links = $('.ABbDSFbDdPOdCYO_view_tracking_div[data-room-id="' + room_id + '"]').filter(function () {
                                                                    var et_view = $(this).attr('data-et-view') || '';
                                                                    return et_view.indexOf(et_group_tracking_tag) < 0;
                                                                });
                                                                $group_untracked_links.attr('data-et-view', ($group_untracked_links.attr('data-et-view') || '') + ' ' + et_group_tracking_tag);
                                                                B.et.initAttributesTracking($group_untracked_links);
                                                            }
                                                            if (B.et.track('ABbDSFbDdPOdCYO') > 1) {
                                                                $room_links.removeClass('g-hidden');
                                                                $('.reviews-no-room-stayed-71978204')
                                                                        .filter(function () {
                                                                            return !$(this).hasClass('g-hidden');
                                                                        })
                                                                        .addClass('g-hidden');
                                                            }
                                                        }
                                                    })();
                                                </script>
                                            </div>
                                            <div class="review-helpful__container"
                                                 data-component="reviews/review-helpful" data-current-count="0">
                                                <form class="review-helpful__form clearfix"
                                                      action="https://www.booking.com/vote_review" method="post">
                                                    <input type="hidden" name="hotel_id" value="719782">
                                                    <input type="hidden" name="review_url" value="1a5dd68113d1fe47">
                                                    <input type="hidden" name="review_id" value="0">
                                                    <input type="hidden" name="vote_type" value="1">
                                                    <input type="hidden" name="vote_value" value="1">
                                                    <button type="submit"
                                                            class="review-helpful__form-submit review-helpful-heart-submit">
                                                        Helpful
                                                    </button>
                                                </form>
                                                <p class="review-helpful__vote-feedback-message review-helpful-heart-vote-feedback-message">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="review_item clearfix ">
                                    <p class="review_item_date" data-et-view="bLTLRZYGaQDDFWJcXe:1">
                                        Reviewed: March 30, 2018
                                    </p>
                                    <div data-et-view="aRDPNZJKSXe:2"></div>
                                    <div class="review_item_reviewer">
                                        <div>
                                            <img class="avatar-mask ava-pad-bottom ava-default"
                                                 src="./Sunland Hotel, Ho Chi Minh City – Updated 2018 Prices_files/29593820.jpg"
                                                 alt="Matt &amp; Jen"
                                                 onerror="this.onerror = null;this.src = 'https://r.bstatic.com/static/img/review/avatars/ava-m/0e43c9b9a23d334b52510a328641c048847226bc.png';">
                                        </div>
                                        <h4>
                                            Matt &amp; Jen
                                        </h4>
<span class="reviewer_country">
<span class="reviewer_country_flag sflag slang-au  ">
</span>
Australia
</span>
                                        <div class="user_age_group">
                                            Age group: 45 – 54
                                        </div>
                                        <div class="user_badge_list">
                                            <img width="
20
" src="./Sunland Hotel, Ho Chi Minh City – Updated 2018 Prices_files/63e9e334e01e464597b0a70eb553abf1672e2808.png"
                                                 class="js-fly-content-tooltip "
                                                 data-content-tooltip="<p><strong>Status: Photo Enthusiast Level 1</strong><br><br>Photo Enthusiasts are photo fanatics who share lots of pictures with their reviews.</p>"
                                                 data-extra-class-tooltip="fly-content-tooltip r-badge-tooltip"
                                                 alt="Status: Photo Enthusiast Level 1">
                                            <img width="
20
" src="./Sunland Hotel, Ho Chi Minh City – Updated 2018 Prices_files/f11fbfff4efab774acb19f9ad27422c9ed2fe154.png"
                                                 class="js-fly-content-tooltip "
                                                 data-content-tooltip="<p><strong>Status: Wordsmith Level 1</strong><br><br>Wordsmiths love to write about their trips and keep coming back to tell us more!</p>"
                                                 data-extra-class-tooltip="fly-content-tooltip r-badge-tooltip"
                                                 alt="Status: Wordsmith Level 1">
                                        </div>
                                        <div class="review_item_user_review_count">
                                            9 Reviews
                                        </div>
                                    </div><!-- .review_item_reviewer -->
                                    <div class="review_item_review">
                                        <div class="review_item_review_container lang_ltr">
                                            <div class="review_item_review_header">
                                                <div class="
review_item_header_score_container
">

<span class=" review-score-widget review-score-widget__very_good review-score-widget__score-only      review-score-widget__no-subtext    jq_tooltip  ">
<span class="review-score-badge" role="link" aria-label="Scored 8.3 ">
8.3
</span>
</span>
                                                </div>
                                                <div class="review_item_header_content_container">
                                                    <div class="review_item_header_content
">
                                                        “Great lication, near Russian Markets and 26
                                                        DE Tham Restaurant.”
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review_item_review_content">
                                                <p class="review_neg "><i class="review_item_icon"
                                                                          data-et-click="customGoal:HDDHQDSJPXaFWDaXe:1">눉</i>Wifi
                                                    inconsistent</p>
                                                <p class="review_pos "><i class="review_item_icon"
                                                                          data-et-click="customGoal:HDDHQDSJPXaFWDaXe:2">눇</i>Great
                                                    Breakfast, clean, rooftop bar is excellent</p>
                                                <div class="ABbDSFbDdPOdCYO_view_tracking_div"
                                                     data-room-id="71978203"></div>
                                                <p class="review_staydate  reviews-no-room-stayed-71978203">
                                                    Stayed in March 2018
                                                </p>
                                                <p class="review_staydate reviews-room-stayed-71978203 g-hidden ">
                                                    Stayed in
                                                    <a href="https://www.booking.com/hotel/vn/sunland.html?label=gen173nr-1FCAEoggJCAlhYSDNYBGj0AYgBAZgBMcIBCndpbmRvd3MgMTDIAQzYAQHoAQH4AQKSAgF5qAID;sid=6dd10b3e0aa84c24063f161f676684c6;dest_id=-3730078;dest_type=city;dist=0;hapos=1;hpos=1;room1=A%2CA;sb_price_type=total;srepoch=1522467934;srfid=5f6d57ef4fb9d43024d06a3f9d548ae7b1e9115fX1;srpvid=4c6c1a6f19d5021d;type=total;ucfs=1&amp;#RD71978203"
                                                       style="color: #0077CC; text-decoration: underline;"
                                                       data-title="View availability for Two-Bedroom Suite with Living Room">
                                                        Two-Bedroom Suite with Living Room
                                                    </a>
                                                    (March 2018)
                                                </p>
                                                <script>
                                                    (function () {
                                                        /*
                                                         This approach is the best way to not show the links for non-available or soldout roms,
                                                         and I'm sorry for doing it this way.
                                                         If this experiment goes full-on I'll do a technical experiment to do it in a better
                                                         way.
                                                         */
                                                        var room_id = 71978203,
                                                                $room_links,
                                                                $view_untracked_links,
                                                                $group_untracked_links,
                                                                et_view_tracking_tag = 'ABbDSFbDdPOdCYO:2',
                                                                et_group_tracking_tag = 'ABbDSFbDdPOdCYO:5';
                                                        if (B.env.b_available_rooms_by_room_id && B.env.b_available_rooms_by_room_id[room_id]) {
                                                            $room_links = $('.reviews-room-stayed-' + room_id + '.g-hidden');
                                                            $view_untracked_links = $('.ABbDSFbDdPOdCYO_view_tracking_div[data-room-id="' + room_id + '"]').filter(function () {
                                                                var et_view = $(this).attr('data-et-view') || '';
                                                                return et_view.indexOf(et_view_tracking_tag) < 0;
                                                            });
                                                            $view_untracked_links.attr('data-et-view', ($view_untracked_links.attr('data-et-view') || '') + ' ' + et_view_tracking_tag);
                                                            B.et.initAttributesTracking($view_untracked_links);
                                                            if (B.env.b_is_group_search && B.env.b_is_group_search === '1') {
                                                                $group_untracked_links = $('.ABbDSFbDdPOdCYO_view_tracking_div[data-room-id="' + room_id + '"]').filter(function () {
                                                                    var et_view = $(this).attr('data-et-view') || '';
                                                                    return et_view.indexOf(et_group_tracking_tag) < 0;
                                                                });
                                                                $group_untracked_links.attr('data-et-view', ($group_untracked_links.attr('data-et-view') || '') + ' ' + et_group_tracking_tag);
                                                                B.et.initAttributesTracking($group_untracked_links);
                                                            }
                                                            if (B.et.track('ABbDSFbDdPOdCYO') > 1) {
                                                                $room_links.removeClass('g-hidden');
                                                                $('.reviews-no-room-stayed-71978203')
                                                                        .filter(function () {
                                                                            return !$(this).hasClass('g-hidden');
                                                                        })
                                                                        .addClass('g-hidden');
                                                            }
                                                        }
                                                    })();
                                                </script>
                                            </div>
                                            <div class="review-helpful__container"
                                                 data-component="reviews/review-helpful" data-current-count="0">
                                                <form class="review-helpful__form clearfix"
                                                      action="https://www.booking.com/vote_review" method="post">
                                                    <input type="hidden" name="hotel_id" value="719782">
                                                    <input type="hidden" name="review_url" value="e1e5d0aaf86e739d">
                                                    <input type="hidden" name="review_id" value="0">
                                                    <input type="hidden" name="vote_type" value="1">
                                                    <input type="hidden" name="vote_value" value="1">
                                                    <button type="submit"
                                                            class="review-helpful__form-submit review-helpful-heart-submit">
                                                        Helpful
                                                    </button>
                                                </form>
                                                <p class="review-helpful__vote-feedback-message review-helpful-heart-vote-feedback-message">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="review_item clearfix ">
                                    <p class="review_item_date" data-et-view="bLTLRZYGaQDDFWJcXe:1">
                                        Reviewed: March 26, 2018
                                    </p>
                                    <div data-et-view="aRDPNZJKSXe:2"></div>
                                    <div class="review_item_reviewer">
                                        <div>
                                            <img class="avatar-mask ava-pad-bottom ava-default"
                                                 src="./Sunland Hotel, Ho Chi Minh City – Updated 2018 Prices_files/d2bf46fbe4c12e06481303d85f49f125e18fbd39.png"
                                                 alt="Guillaume Gobeil"
                                                 onerror="this.onerror = null;this.src = 'https://q.bstatic.com/static/img/review/avatars/ava-g/d2bf46fbe4c12e06481303d85f49f125e18fbd39.png';">
                                        </div>
                                        <h4>
                                            Guillaume Gobeil
                                        </h4>
<span class="reviewer_country">
<span class="reviewer_country_flag sflag slang-ca  ">
</span>
Canada
</span>
                                        <div class="user_age_group">
                                            Age group: 25 – 34
                                        </div>
                                        <div class="review_item_user_review_count">
                                            4 Reviews
                                        </div>
                                    </div><!-- .review_item_reviewer -->
                                    <div class="review_item_review">
                                        <div class="review_item_review_container lang_ltr">
                                            <div class="review_item_review_header">
                                                <div class="
review_item_header_score_container
">

<span class=" review-score-widget review-score-widget__exceptional review-score-widget__score-only      review-score-widget__no-subtext    jq_tooltip high_score_tooltip  ">
<span class="review-score-badge" role="link" aria-label="Scored 9.6 ">
9.6
</span>
</span>
                                                </div>
                                                <div class="review_item_header_content_container">
                                                    <div class="review_item_header_content
">
                                                        “Nice place to stay in Ho Chi Minh.”
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review_item_review_content">
                                                <p class="review_pos "><i class="review_item_icon"
                                                                          data-et-click="customGoal:HDDHQDSJPXaFWDaXe:2">눇</i>Nice
                                                    rooftop bar/restaurant with good price!</p>
                                                <div class="ABbDSFbDdPOdCYO_view_tracking_div"
                                                     data-room-id="71978204"></div>
                                                <p class="review_staydate  reviews-no-room-stayed-71978204">
                                                    Stayed in March 2018
                                                </p>
                                                <p class="review_staydate reviews-room-stayed-71978204 g-hidden ">
                                                    Stayed in
                                                    <a href="https://www.booking.com/hotel/vn/sunland.html?label=gen173nr-1FCAEoggJCAlhYSDNYBGj0AYgBAZgBMcIBCndpbmRvd3MgMTDIAQzYAQHoAQH4AQKSAgF5qAID;sid=6dd10b3e0aa84c24063f161f676684c6;dest_id=-3730078;dest_type=city;dist=0;hapos=1;hpos=1;room1=A%2CA;sb_price_type=total;srepoch=1522467934;srfid=5f6d57ef4fb9d43024d06a3f9d548ae7b1e9115fX1;srpvid=4c6c1a6f19d5021d;type=total;ucfs=1&amp;#RD71978204"
                                                       style="color: #0077CC; text-decoration: underline;"
                                                       data-title="View availability for Superior Double or Twin Room with Window">
                                                        Superior Double or Twin Room with Window
                                                    </a>
                                                    (March 2018)
                                                </p>
                                                <script>
                                                    (function () {
                                                        /*
                                                         This approach is the best way to not show the links for non-available or soldout roms,
                                                         and I'm sorry for doing it this way.
                                                         If this experiment goes full-on I'll do a technical experiment to do it in a better
                                                         way.
                                                         */
                                                        var room_id = 71978204,
                                                                $room_links,
                                                                $view_untracked_links,
                                                                $group_untracked_links,
                                                                et_view_tracking_tag = 'ABbDSFbDdPOdCYO:2',
                                                                et_group_tracking_tag = 'ABbDSFbDdPOdCYO:5';
                                                        if (B.env.b_available_rooms_by_room_id && B.env.b_available_rooms_by_room_id[room_id]) {
                                                            $room_links = $('.reviews-room-stayed-' + room_id + '.g-hidden');
                                                            $view_untracked_links = $('.ABbDSFbDdPOdCYO_view_tracking_div[data-room-id="' + room_id + '"]').filter(function () {
                                                                var et_view = $(this).attr('data-et-view') || '';
                                                                return et_view.indexOf(et_view_tracking_tag) < 0;
                                                            });
                                                            $view_untracked_links.attr('data-et-view', ($view_untracked_links.attr('data-et-view') || '') + ' ' + et_view_tracking_tag);
                                                            B.et.initAttributesTracking($view_untracked_links);
                                                            if (B.env.b_is_group_search && B.env.b_is_group_search === '1') {
                                                                $group_untracked_links = $('.ABbDSFbDdPOdCYO_view_tracking_div[data-room-id="' + room_id + '"]').filter(function () {
                                                                    var et_view = $(this).attr('data-et-view') || '';
                                                                    return et_view.indexOf(et_group_tracking_tag) < 0;
                                                                });
                                                                $group_untracked_links.attr('data-et-view', ($group_untracked_links.attr('data-et-view') || '') + ' ' + et_group_tracking_tag);
                                                                B.et.initAttributesTracking($group_untracked_links);
                                                            }
                                                            if (B.et.track('ABbDSFbDdPOdCYO') > 1) {
                                                                $room_links.removeClass('g-hidden');
                                                                $('.reviews-no-room-stayed-71978204')
                                                                        .filter(function () {
                                                                            return !$(this).hasClass('g-hidden');
                                                                        })
                                                                        .addClass('g-hidden');
                                                            }
                                                        }
                                                    })();
                                                </script>
                                            </div>
                                            <div class="review-helpful__container"
                                                 data-component="reviews/review-helpful" data-current-count="0">
                                                <form class="review-helpful__form clearfix"
                                                      action="https://www.booking.com/vote_review" method="post">
                                                    <input type="hidden" name="hotel_id" value="719782">
                                                    <input type="hidden" name="review_url" value="87f2d1c0228f2a05">
                                                    <input type="hidden" name="review_id" value="0">
                                                    <input type="hidden" name="vote_type" value="1">
                                                    <input type="hidden" name="vote_value" value="1">
                                                    <button type="submit"
                                                            class="review-helpful__form-submit review-helpful-heart-submit">
                                                        Helpful
                                                    </button>
                                                </form>
                                                <p class="review-helpful__vote-feedback-message review-helpful-heart-vote-feedback-message">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="review_item clearfix ">
                                    <p class="review_item_date" data-et-view="bLTLRZYGaQDDFWJcXe:1">
                                        Reviewed: March 26, 2018
                                    </p>
                                    <div data-et-view="aRDPNZJKSXe:2"></div>
                                    <div class="review_item_reviewer">
                                        <div>
                                            <img class="avatar-mask ava-pad-bottom ava-default"
                                                 src="./Sunland Hotel, Ho Chi Minh City – Updated 2018 Prices_files/f69a0f45af414641ac0371c1f139c49637969c6c.png"
                                                 alt="Joan"
                                                 onerror="this.onerror = null;this.src = 'https://r.bstatic.com/static/img/review/avatars/ava-j/f69a0f45af414641ac0371c1f139c49637969c6c.png';">
                                        </div>
                                        <h4>
                                            Joan
                                        </h4>
<span class="reviewer_country">
<span class="reviewer_country_flag sflag slang-ca  ">
</span>
Canada
</span>
                                        <div class="user_age_group">
                                        </div>
                                        <div class="review_item_user_review_count">
                                            1 review
                                        </div>
                                    </div><!-- .review_item_reviewer -->
                                    <div class="review_item_review">
                                        <div class="review_item_review_container lang_ltr">
                                            <div class="review_item_review_header">
                                                <div class="
review_item_header_score_container
">

<span class=" review-score-widget review-score-widget__good review-score-widget__score-only      review-score-widget__no-subtext    jq_tooltip  ">
<span class="review-score-badge" role="link" aria-label="Scored 7.1 ">
7.1
</span>
</span>
                                                </div>
                                                <div class="review_item_header_content_container">
                                                    <div class="review_item_header_content
">
                                                        “Enjoyed our tours, seeing the city and
                                                        meeting the people. Rooms were comfortable.”
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review_item_review_content">
                                                <p class="review_neg "><i class="review_item_icon"
                                                                          data-et-click="customGoal:HDDHQDSJPXaFWDaXe:1">눉</i>The
                                                    location of the hotel was disappointing, and the
                                                    view from our room was depressing. These are
                                                    major issues and things the hotel staff is not
                                                    responsible for and cannot solve.
                                                    In addition, the air in Ho Chi Minh is awful and
                                                    we both had scratchy throats and coughs. I would
                                                    assume your tourist traffic would increase if
                                                    something was done about the city’s air quality.
                                                    Another issue for us was the noise pollution
                                                    mainly from the traffic. It is mind boggling;
                                                    and, at times, we just went back to our rooms to
                                                    get away from it. We missed a place to take
                                                    evening walks after dinner. Lastly, the garbage
                                                    in the streets was disturbing to us. Your
                                                    country and it’s people are lovely, and it is so
                                                    sad to see it ruined by plastic and styrofoam
                                                    everywhere.</p>
                                                <p class="review_pos "><i class="review_item_icon"
                                                                          data-et-click="customGoal:HDDHQDSJPXaFWDaXe:2">눇</i>People
                                                    were friendly and helpful. Place was clean and
                                                    we regret forgetting to leave a tip for the
                                                    cleaning ladies.</p>
                                                <div class="ABbDSFbDdPOdCYO_view_tracking_div"
                                                     data-room-id="71978204"></div>
                                                <p class="review_staydate  reviews-no-room-stayed-71978204">
                                                    Stayed in March 2018
                                                </p>
                                                <p class="review_staydate reviews-room-stayed-71978204 g-hidden ">
                                                    Stayed in
                                                    <a href="https://www.booking.com/hotel/vn/sunland.html?label=gen173nr-1FCAEoggJCAlhYSDNYBGj0AYgBAZgBMcIBCndpbmRvd3MgMTDIAQzYAQHoAQH4AQKSAgF5qAID;sid=6dd10b3e0aa84c24063f161f676684c6;dest_id=-3730078;dest_type=city;dist=0;hapos=1;hpos=1;room1=A%2CA;sb_price_type=total;srepoch=1522467934;srfid=5f6d57ef4fb9d43024d06a3f9d548ae7b1e9115fX1;srpvid=4c6c1a6f19d5021d;type=total;ucfs=1&amp;#RD71978204"
                                                       style="color: #0077CC; text-decoration: underline;"
                                                       data-title="View availability for Superior Double or Twin Room with Window">
                                                        Superior Double or Twin Room with Window
                                                    </a>
                                                    (March 2018)
                                                </p>
                                                <script>
                                                    (function () {
                                                        /*
                                                         This approach is the best way to not show the links for non-available or soldout roms,
                                                         and I'm sorry for doing it this way.
                                                         If this experiment goes full-on I'll do a technical experiment to do it in a better
                                                         way.
                                                         */
                                                        var room_id = 71978204,
                                                                $room_links,
                                                                $view_untracked_links,
                                                                $group_untracked_links,
                                                                et_view_tracking_tag = 'ABbDSFbDdPOdCYO:2',
                                                                et_group_tracking_tag = 'ABbDSFbDdPOdCYO:5';
                                                        if (B.env.b_available_rooms_by_room_id && B.env.b_available_rooms_by_room_id[room_id]) {
                                                            $room_links = $('.reviews-room-stayed-' + room_id + '.g-hidden');
                                                            $view_untracked_links = $('.ABbDSFbDdPOdCYO_view_tracking_div[data-room-id="' + room_id + '"]').filter(function () {
                                                                var et_view = $(this).attr('data-et-view') || '';
                                                                return et_view.indexOf(et_view_tracking_tag) < 0;
                                                            });
                                                            $view_untracked_links.attr('data-et-view', ($view_untracked_links.attr('data-et-view') || '') + ' ' + et_view_tracking_tag);
                                                            B.et.initAttributesTracking($view_untracked_links);
                                                            if (B.env.b_is_group_search && B.env.b_is_group_search === '1') {
                                                                $group_untracked_links = $('.ABbDSFbDdPOdCYO_view_tracking_div[data-room-id="' + room_id + '"]').filter(function () {
                                                                    var et_view = $(this).attr('data-et-view') || '';
                                                                    return et_view.indexOf(et_group_tracking_tag) < 0;
                                                                });
                                                                $group_untracked_links.attr('data-et-view', ($group_untracked_links.attr('data-et-view') || '') + ' ' + et_group_tracking_tag);
                                                                B.et.initAttributesTracking($group_untracked_links);
                                                            }
                                                            if (B.et.track('ABbDSFbDdPOdCYO') > 1) {
                                                                $room_links.removeClass('g-hidden');
                                                                $('.reviews-no-room-stayed-71978204')
                                                                        .filter(function () {
                                                                            return !$(this).hasClass('g-hidden');
                                                                        })
                                                                        .addClass('g-hidden');
                                                            }
                                                        }
                                                    })();
                                                </script>
                                            </div>
                                            <div class="review-helpful__container"
                                                 data-component="reviews/review-helpful" data-current-count="0">
                                                <form class="review-helpful__form clearfix"
                                                      action="https://www.booking.com/vote_review" method="post">
                                                    <input type="hidden" name="hotel_id" value="719782">
                                                    <input type="hidden" name="review_url" value="30708e749339be35">
                                                    <input type="hidden" name="review_id" value="0">
                                                    <input type="hidden" name="vote_type" value="1">
                                                    <input type="hidden" name="vote_value" value="1">
                                                    <button type="submit"
                                                            class="review-helpful__form-submit review-helpful-heart-submit">
                                                        Helpful
                                                    </button>
                                                </form>
                                                <p class="review-helpful__vote-feedback-message review-helpful-heart-vote-feedback-message">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="review_item clearfix ">
                                    <p class="review_item_date" data-et-view="bLTLRZYGaQDDFWJcXe:1">
                                        Reviewed: March 26, 2018
                                    </p>
                                    <div data-et-view="aRDPNZJKSXe:2"></div>
                                    <div class="review_item_reviewer">
                                        <div>
                                            <img class="avatar-mask ava-pad-bottom ava-default"
                                                 src="./Sunland Hotel, Ho Chi Minh City – Updated 2018 Prices_files/866dca38dcc31cb6fa2e9b4c475bd32e681b0080.png"
                                                 alt="Pamela"
                                                 onerror="this.onerror = null;this.src = 'https://r.bstatic.com/static/img/review/avatars/ava-p/866dca38dcc31cb6fa2e9b4c475bd32e681b0080.png';">
                                        </div>
                                        <h4>
                                            Pamela
                                        </h4>
<span class="reviewer_country">
<span class="reviewer_country_flag sflag slang-um  ">
</span>
United States Minor Outlying Islands
</span>
                                        <div class="user_age_group">
                                        </div>
                                        <div class="review_item_user_review_count">
                                            1 review
                                        </div>
                                    </div><!-- .review_item_reviewer -->
                                    <div class="review_item_review">
                                        <div class="review_item_review_container lang_ltr">
                                            <div class="review_item_review_header">
                                                <div class="
review_item_header_score_container
">

<span class=" review-score-widget review-score-widget__good review-score-widget__score-only      review-score-widget__no-subtext    jq_tooltip  ">
<span class="review-score-badge" role="link" aria-label="Scored 7.9 ">
7.9
</span>
</span>
                                                </div>
                                                <div class="review_item_header_content_container">
                                                    <div class="review_item_header_content
">
                                                        “The breakfast buffet was good”
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review_item_review_content">
                                                <p class="review_neg "><i class="review_item_icon"
                                                                          data-et-click="customGoal:HDDHQDSJPXaFWDaXe:1">눉</i>It
                                                    was a challenge charging phones etc. there
                                                    should be more outlets at the bedstand.</p>
                                                <p class="review_pos "><i class="review_item_icon"
                                                                          data-et-click="customGoal:HDDHQDSJPXaFWDaXe:2">눇</i>The
                                                    front desk staff was very helpful and kind.
                                                    The daytime staff the day we checked out of the
                                                    Sunland is in reference.</p>
                                                <div class="ABbDSFbDdPOdCYO_view_tracking_div"
                                                     data-room-id="71978204"></div>
                                                <p class="review_staydate  reviews-no-room-stayed-71978204">
                                                    Stayed in March 2018
                                                </p>
                                                <p class="review_staydate reviews-room-stayed-71978204 g-hidden ">
                                                    Stayed in
                                                    <a href="https://www.booking.com/hotel/vn/sunland.html?label=gen173nr-1FCAEoggJCAlhYSDNYBGj0AYgBAZgBMcIBCndpbmRvd3MgMTDIAQzYAQHoAQH4AQKSAgF5qAID;sid=6dd10b3e0aa84c24063f161f676684c6;dest_id=-3730078;dest_type=city;dist=0;hapos=1;hpos=1;room1=A%2CA;sb_price_type=total;srepoch=1522467934;srfid=5f6d57ef4fb9d43024d06a3f9d548ae7b1e9115fX1;srpvid=4c6c1a6f19d5021d;type=total;ucfs=1&amp;#RD71978204"
                                                       style="color: #0077CC; text-decoration: underline;"
                                                       data-title="View availability for Superior Double or Twin Room with Window">
                                                        Superior Double or Twin Room with Window
                                                    </a>
                                                    (March 2018)
                                                </p>
                                                <script>
                                                    (function () {
                                                        /*
                                                         This approach is the best way to not show the links for non-available or soldout roms,
                                                         and I'm sorry for doing it this way.
                                                         If this experiment goes full-on I'll do a technical experiment to do it in a better
                                                         way.
                                                         */
                                                        var room_id = 71978204,
                                                                $room_links,
                                                                $view_untracked_links,
                                                                $group_untracked_links,
                                                                et_view_tracking_tag = 'ABbDSFbDdPOdCYO:2',
                                                                et_group_tracking_tag = 'ABbDSFbDdPOdCYO:5';
                                                        if (B.env.b_available_rooms_by_room_id && B.env.b_available_rooms_by_room_id[room_id]) {
                                                            $room_links = $('.reviews-room-stayed-' + room_id + '.g-hidden');
                                                            $view_untracked_links = $('.ABbDSFbDdPOdCYO_view_tracking_div[data-room-id="' + room_id + '"]').filter(function () {
                                                                var et_view = $(this).attr('data-et-view') || '';
                                                                return et_view.indexOf(et_view_tracking_tag) < 0;
                                                            });
                                                            $view_untracked_links.attr('data-et-view', ($view_untracked_links.attr('data-et-view') || '') + ' ' + et_view_tracking_tag);
                                                            B.et.initAttributesTracking($view_untracked_links);
                                                            if (B.env.b_is_group_search && B.env.b_is_group_search === '1') {
                                                                $group_untracked_links = $('.ABbDSFbDdPOdCYO_view_tracking_div[data-room-id="' + room_id + '"]').filter(function () {
                                                                    var et_view = $(this).attr('data-et-view') || '';
                                                                    return et_view.indexOf(et_group_tracking_tag) < 0;
                                                                });
                                                                $group_untracked_links.attr('data-et-view', ($group_untracked_links.attr('data-et-view') || '') + ' ' + et_group_tracking_tag);
                                                                B.et.initAttributesTracking($group_untracked_links);
                                                            }
                                                            if (B.et.track('ABbDSFbDdPOdCYO') > 1) {
                                                                $room_links.removeClass('g-hidden');
                                                                $('.reviews-no-room-stayed-71978204')
                                                                        .filter(function () {
                                                                            return !$(this).hasClass('g-hidden');
                                                                        })
                                                                        .addClass('g-hidden');
                                                            }
                                                        }
                                                    })();
                                                </script>
                                            </div>
                                            <div class="review-helpful__container"
                                                 data-component="reviews/review-helpful" data-current-count="0">
                                                <form class="review-helpful__form clearfix"
                                                      action="https://www.booking.com/vote_review" method="post">
                                                    <input type="hidden" name="hotel_id" value="719782">
                                                    <input type="hidden" name="review_url" value="da79f93d2f85ad0e">
                                                    <input type="hidden" name="review_id" value="0">
                                                    <input type="hidden" name="vote_type" value="1">
                                                    <input type="hidden" name="vote_value" value="1">
                                                    <button type="submit"
                                                            class="review-helpful__form-submit review-helpful-heart-submit">
                                                        Helpful
                                                    </button>
                                                </form>
                                                <p class="review-helpful__vote-feedback-message review-helpful-heart-vote-feedback-message">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="review_item clearfix ">
                                    <p class="review_item_date" data-et-view="bLTLRZYGaQDDFWJcXe:1">
                                        Reviewed: March 26, 2018
                                    </p>
                                    <div data-et-view="aRDPNZJKSXe:2"></div>
                                    <div class="review_item_reviewer">
                                        <div>
                                            <img class="avatar-mask ava-pad-bottom ava-default"
                                                 src="./Sunland Hotel, Ho Chi Minh City – Updated 2018 Prices_files/8103dfb0481c4cedc201d849f5666a270512f538.png"
                                                 alt="Bruce"
                                                 onerror="this.onerror = null;this.src = 'https://q.bstatic.com/static/img/review/avatars/ava-b/8103dfb0481c4cedc201d849f5666a270512f538.png';">
                                        </div>
                                        <h4>
                                            Bruce
                                        </h4>
<span class="reviewer_country">
<span class="reviewer_country_flag sflag slang-au  ">
</span>
Australia
</span>
                                        <div class="user_age_group">
                                        </div>
                                        <div class="review_item_user_review_count">
                                            1 review
                                        </div>
                                    </div><!-- .review_item_reviewer -->
                                    <div class="review_item_review">
                                        <div class="review_item_review_container lang_ltr">
                                            <div class="review_item_review_header">
                                                <div class="
review_item_header_score_container
">

<span class=" review-score-widget review-score-widget__good review-score-widget__score-only      review-score-widget__no-subtext    jq_tooltip  ">
<span class="review-score-badge" role="link" aria-label="Scored 7.1 ">
7.1
</span>
</span>
                                                </div>
                                                <div class="review_item_header_content_container">
                                                    <div class="review_item_header_content
">
                                                        “Rundown but cheap for the city, so good
                                                        value overall I suppose.”
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review_item_review_content">
                                                <p class="review_neg "><i class="review_item_icon"
                                                                          data-et-click="customGoal:HDDHQDSJPXaFWDaXe:1">눉</i>Rooms
                                                    and hotel needs a major facelift. Exposed
                                                    plaster on walls, plumbing fixtures falling off
                                                    walls and overall rundown feeling. Bed was
                                                    really really hard and tea kettle has a 2 inch
                                                    cord and outlet was 7 inches up so we had to
                                                    build a hill with books etc to boil water.</p>
                                                <p class="review_pos "><i class="review_item_icon"
                                                                          data-et-click="customGoal:HDDHQDSJPXaFWDaXe:2">눇</i>Breakfast
                                                    was good, pool was small but ok and location was
                                                    good. View from rooftop bar is excellent.</p>
                                                <div class="ABbDSFbDdPOdCYO_view_tracking_div"
                                                     data-room-id="71978214"></div>
                                                <p class="review_staydate  reviews-no-room-stayed-71978214">
                                                    Stayed in March 2018
                                                </p>
                                                <p class="review_staydate reviews-room-stayed-71978214 g-hidden ">
                                                    Stayed in
                                                    <a href="https://www.booking.com/hotel/vn/sunland.html?label=gen173nr-1FCAEoggJCAlhYSDNYBGj0AYgBAZgBMcIBCndpbmRvd3MgMTDIAQzYAQHoAQH4AQKSAgF5qAID;sid=6dd10b3e0aa84c24063f161f676684c6;dest_id=-3730078;dest_type=city;dist=0;hapos=1;hpos=1;room1=A%2CA;sb_price_type=total;srepoch=1522467934;srfid=5f6d57ef4fb9d43024d06a3f9d548ae7b1e9115fX1;srpvid=4c6c1a6f19d5021d;type=total;ucfs=1&amp;#RD71978214"
                                                       style="color: #0077CC; text-decoration: underline;"
                                                       data-title="View availability for River View Double Deluxe">
                                                        River View Double Deluxe
                                                    </a>
                                                    (March 2018)
                                                </p>
                                                <script>
                                                    (function () {
                                                        /*
                                                         This approach is the best way to not show the links for non-available or soldout roms,
                                                         and I'm sorry for doing it this way.
                                                         If this experiment goes full-on I'll do a technical experiment to do it in a better
                                                         way.
                                                         */
                                                        var room_id = 71978214,
                                                                $room_links,
                                                                $view_untracked_links,
                                                                $group_untracked_links,
                                                                et_view_tracking_tag = 'ABbDSFbDdPOdCYO:2',
                                                                et_group_tracking_tag = 'ABbDSFbDdPOdCYO:5';
                                                        if (B.env.b_available_rooms_by_room_id && B.env.b_available_rooms_by_room_id[room_id]) {
                                                            $room_links = $('.reviews-room-stayed-' + room_id + '.g-hidden');
                                                            $view_untracked_links = $('.ABbDSFbDdPOdCYO_view_tracking_div[data-room-id="' + room_id + '"]').filter(function () {
                                                                var et_view = $(this).attr('data-et-view') || '';
                                                                return et_view.indexOf(et_view_tracking_tag) < 0;
                                                            });
                                                            $view_untracked_links.attr('data-et-view', ($view_untracked_links.attr('data-et-view') || '') + ' ' + et_view_tracking_tag);
                                                            B.et.initAttributesTracking($view_untracked_links);
                                                            if (B.env.b_is_group_search && B.env.b_is_group_search === '1') {
                                                                $group_untracked_links = $('.ABbDSFbDdPOdCYO_view_tracking_div[data-room-id="' + room_id + '"]').filter(function () {
                                                                    var et_view = $(this).attr('data-et-view') || '';
                                                                    return et_view.indexOf(et_group_tracking_tag) < 0;
                                                                });
                                                                $group_untracked_links.attr('data-et-view', ($group_untracked_links.attr('data-et-view') || '') + ' ' + et_group_tracking_tag);
                                                                B.et.initAttributesTracking($group_untracked_links);
                                                            }
                                                            if (B.et.track('ABbDSFbDdPOdCYO') > 1) {
                                                                $room_links.removeClass('g-hidden');
                                                                $('.reviews-no-room-stayed-71978214')
                                                                        .filter(function () {
                                                                            return !$(this).hasClass('g-hidden');
                                                                        })
                                                                        .addClass('g-hidden');
                                                            }
                                                        }
                                                    })();
                                                </script>
                                            </div>
                                            <div class="review-helpful__container"
                                                 data-component="reviews/review-helpful" data-current-count="0">
                                                <form class="review-helpful__form clearfix"
                                                      action="https://www.booking.com/vote_review" method="post">
                                                    <input type="hidden" name="hotel_id" value="719782">
                                                    <input type="hidden" name="review_url" value="612b88c05d0e7c98">
                                                    <input type="hidden" name="review_id" value="0">
                                                    <input type="hidden" name="vote_type" value="1">
                                                    <input type="hidden" name="vote_value" value="1">
                                                    <button type="submit"
                                                            class="review-helpful__form-submit review-helpful-heart-submit">
                                                        Helpful
                                                    </button>
                                                </form>
                                                <p class="review-helpful__vote-feedback-message review-helpful-heart-vote-feedback-message">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="review_item clearfix ">
                                    <p class="review_item_date" data-et-view="bLTLRZYGaQDDFWJcXe:1">
                                        Reviewed: March 25, 2018
                                    </p>
                                    <div data-et-view="aRDPNZJKSXe:2"></div>
                                    <div class="review_item_reviewer">
                                        <div>
                                            <img class="avatar-mask ava-pad-bottom ava-default"
                                                 src="./Sunland Hotel, Ho Chi Minh City – Updated 2018 Prices_files/picture"
                                                 alt="Mahendra"
                                                 onerror="this.onerror = null;this.src = 'https://r.bstatic.com/static/img/review/avatars/ava-m/0e43c9b9a23d334b52510a328641c048847226bc.png';">
                                        </div>
                                        <h4>
                                            Mahendra
                                        </h4>
<span class="reviewer_country">
<span class="reviewer_country_flag sflag slang-in  ">
</span>
India
</span>
                                        <div class="user_age_group">
                                        </div>
                                        <div class="review_item_user_review_count">
                                            1 review
                                        </div>
                                    </div><!-- .review_item_reviewer -->
                                    <div class="review_item_review">
                                        <div class="review_item_review_container lang_ltr">
                                            <div class="review_item_review_header">
                                                <div class="
review_item_header_score_container
">

<span class=" review-score-widget review-score-widget__good review-score-widget__score-only      review-score-widget__no-subtext    ">
<span class="review-score-badge" role="link" aria-label="Scored 7.5 ">
7.5
</span>
</span>
                                                </div>
                                                <div class="review_item_header_content_container">
                                                    <div class="review_item_header_content
 review_item_header_scoreword
">
                                                        Good
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review_item_review_content">
                                                <p class="review_neg "><i class="review_item_icon"
                                                                          data-et-click="customGoal:HDDHQDSJPXaFWDaXe:1">눉</i>Entrance
                                                    is narrow</p>
                                                <p class="review_pos "><i class="review_item_icon"
                                                                          data-et-click="customGoal:HDDHQDSJPXaFWDaXe:2">눇</i>Clean,n
                                                    value for money</p>
                                                <div class="ABbDSFbDdPOdCYO_view_tracking_div"
                                                     data-room-id="71978204"></div>
                                                <p class="review_staydate  reviews-no-room-stayed-71978204">
                                                    Stayed in March 2018
                                                </p>
                                                <p class="review_staydate reviews-room-stayed-71978204 g-hidden ">
                                                    Stayed in
                                                    <a href="https://www.booking.com/hotel/vn/sunland.html?label=gen173nr-1FCAEoggJCAlhYSDNYBGj0AYgBAZgBMcIBCndpbmRvd3MgMTDIAQzYAQHoAQH4AQKSAgF5qAID;sid=6dd10b3e0aa84c24063f161f676684c6;dest_id=-3730078;dest_type=city;dist=0;hapos=1;hpos=1;room1=A%2CA;sb_price_type=total;srepoch=1522467934;srfid=5f6d57ef4fb9d43024d06a3f9d548ae7b1e9115fX1;srpvid=4c6c1a6f19d5021d;type=total;ucfs=1&amp;#RD71978204"
                                                       style="color: #0077CC; text-decoration: underline;"
                                                       data-title="View availability for Superior Double or Twin Room with Window">
                                                        Superior Double or Twin Room with Window
                                                    </a>
                                                    (March 2018)
                                                </p>
                                                <script>
                                                    (function () {
                                                        /*
                                                         This approach is the best way to not show the links for non-available or soldout roms,
                                                         and I'm sorry for doing it this way.
                                                         If this experiment goes full-on I'll do a technical experiment to do it in a better
                                                         way.
                                                         */
                                                        var room_id = 71978204,
                                                                $room_links,
                                                                $view_untracked_links,
                                                                $group_untracked_links,
                                                                et_view_tracking_tag = 'ABbDSFbDdPOdCYO:2',
                                                                et_group_tracking_tag = 'ABbDSFbDdPOdCYO:5';
                                                        if (B.env.b_available_rooms_by_room_id && B.env.b_available_rooms_by_room_id[room_id]) {
                                                            $room_links = $('.reviews-room-stayed-' + room_id + '.g-hidden');
                                                            $view_untracked_links = $('.ABbDSFbDdPOdCYO_view_tracking_div[data-room-id="' + room_id + '"]').filter(function () {
                                                                var et_view = $(this).attr('data-et-view') || '';
                                                                return et_view.indexOf(et_view_tracking_tag) < 0;
                                                            });
                                                            $view_untracked_links.attr('data-et-view', ($view_untracked_links.attr('data-et-view') || '') + ' ' + et_view_tracking_tag);
                                                            B.et.initAttributesTracking($view_untracked_links);
                                                            if (B.env.b_is_group_search && B.env.b_is_group_search === '1') {
                                                                $group_untracked_links = $('.ABbDSFbDdPOdCYO_view_tracking_div[data-room-id="' + room_id + '"]').filter(function () {
                                                                    var et_view = $(this).attr('data-et-view') || '';
                                                                    return et_view.indexOf(et_group_tracking_tag) < 0;
                                                                });
                                                                $group_untracked_links.attr('data-et-view', ($group_untracked_links.attr('data-et-view') || '') + ' ' + et_group_tracking_tag);
                                                                B.et.initAttributesTracking($group_untracked_links);
                                                            }
                                                            if (B.et.track('ABbDSFbDdPOdCYO') > 1) {
                                                                $room_links.removeClass('g-hidden');
                                                                $('.reviews-no-room-stayed-71978204')
                                                                        .filter(function () {
                                                                            return !$(this).hasClass('g-hidden');
                                                                        })
                                                                        .addClass('g-hidden');
                                                            }
                                                        }
                                                    })();
                                                </script>
                                            </div>
                                            <div class="review-helpful__container"
                                                 data-component="reviews/review-helpful" data-current-count="0">
                                                <form class="review-helpful__form clearfix"
                                                      action="https://www.booking.com/vote_review" method="post">
                                                    <input type="hidden" name="hotel_id" value="719782">
                                                    <input type="hidden" name="review_url" value="d88fc39cd027bba9">
                                                    <input type="hidden" name="review_id" value="0">
                                                    <input type="hidden" name="vote_type" value="1">
                                                    <input type="hidden" name="vote_value" value="1">
                                                    <button type="submit"
                                                            class="review-helpful__form-submit review-helpful-heart-submit">
                                                        Helpful
                                                    </button>
                                                </form>
                                                <p class="review-helpful__vote-feedback-message review-helpful-heart-vote-feedback-message">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="review_item clearfix ">
                                    <p class="review_item_date" data-et-view="bLTLRZYGaQDDFWJcXe:1">
                                        Reviewed: March 24, 2018
                                    </p>
                                    <div data-et-view="aRDPNZJKSXe:2"></div>
                                    <div class="review_item_reviewer">
                                        <div>
                                            <img class="avatar-mask ava-pad-bottom ava-default"
                                                 src="./Sunland Hotel, Ho Chi Minh City – Updated 2018 Prices_files/f69a0f45af414641ac0371c1f139c49637969c6c.png"
                                                 alt="Janet"
                                                 onerror="this.onerror = null;this.src = 'https://r.bstatic.com/static/img/review/avatars/ava-j/f69a0f45af414641ac0371c1f139c49637969c6c.png';">
                                        </div>
                                        <h4>
                                            Janet
                                        </h4>
<span class="reviewer_country">
<span class="reviewer_country_flag sflag slang-nl  ">
</span>
Netherlands
</span>
                                        <div class="user_age_group">
                                        </div>
                                        <div class="review_item_user_review_count">
                                            16 Reviews
                                        </div>
                                    </div><!-- .review_item_reviewer -->
                                    <div class="review_item_review">
                                        <div class="review_item_review_container lang_ltr">
                                            <div class="review_item_review_header">
                                                <div class="
review_item_header_score_container
">

<span class=" review-score-widget review-score-widget__good review-score-widget__score-only      review-score-widget__no-subtext    ">
<span class="review-score-badge" role="link" aria-label="Scored 7.9 ">
7.9
</span>
</span>
                                                </div>
                                                <div class="review_item_header_content_container">
                                                    <div class="review_item_header_content
 review_item_header_scoreword
">
                                                        Good
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review_item_review_content">
                                                <p class="review_neg "><i class="review_item_icon"
                                                                          data-et-click="customGoal:HDDHQDSJPXaFWDaXe:1">눉</i>The
                                                    beds in the capsules where hard not too
                                                    comfortable plus the aircon was too cold for me.
                                                    It would be nice if you could set the temp
                                                    yourself</p>
                                                <p class="review_pos "><i class="review_item_icon"
                                                                          data-et-click="customGoal:HDDHQDSJPXaFWDaXe:2">눇</i>I
                                                    loved the whole futeristic space vibe in the
                                                    capsule corridor!
                                                    The pool was great and the rooftopbar had a nice
                                                    view</p>
                                                <div class="ABbDSFbDdPOdCYO_view_tracking_div"
                                                     data-room-id="71978212"></div>
                                                <p class="review_staydate  reviews-no-room-stayed-71978212">
                                                    Stayed in March 2018
                                                </p>
                                                <p class="review_staydate reviews-room-stayed-71978212 g-hidden ">
                                                    Stayed in
                                                    <a href="https://www.booking.com/hotel/vn/sunland.html?label=gen173nr-1FCAEoggJCAlhYSDNYBGj0AYgBAZgBMcIBCndpbmRvd3MgMTDIAQzYAQHoAQH4AQKSAgF5qAID;sid=6dd10b3e0aa84c24063f161f676684c6;dest_id=-3730078;dest_type=city;dist=0;hapos=1;hpos=1;room1=A%2CA;sb_price_type=total;srepoch=1522467934;srfid=5f6d57ef4fb9d43024d06a3f9d548ae7b1e9115fX1;srpvid=4c6c1a6f19d5021d;type=total;ucfs=1&amp;#RD71978212"
                                                       style="color: #0077CC; text-decoration: underline;"
                                                       data-title="View availability for Business Male or Female Capsule with Shared Bathroom">
                                                        Business Male or Female Capsule with Shared
                                                        Bathroom
                                                    </a>
                                                    (March 2018)
                                                </p>
                                                <script>
                                                    (function () {
                                                        /*
                                                         This approach is the best way to not show the links for non-available or soldout roms,
                                                         and I'm sorry for doing it this way.
                                                         If this experiment goes full-on I'll do a technical experiment to do it in a better
                                                         way.
                                                         */
                                                        var room_id = 71978212,
                                                                $room_links,
                                                                $view_untracked_links,
                                                                $group_untracked_links,
                                                                et_view_tracking_tag = 'ABbDSFbDdPOdCYO:2',
                                                                et_group_tracking_tag = 'ABbDSFbDdPOdCYO:5';
                                                        if (B.env.b_available_rooms_by_room_id && B.env.b_available_rooms_by_room_id[room_id]) {
                                                            $room_links = $('.reviews-room-stayed-' + room_id + '.g-hidden');
                                                            $view_untracked_links = $('.ABbDSFbDdPOdCYO_view_tracking_div[data-room-id="' + room_id + '"]').filter(function () {
                                                                var et_view = $(this).attr('data-et-view') || '';
                                                                return et_view.indexOf(et_view_tracking_tag) < 0;
                                                            });
                                                            $view_untracked_links.attr('data-et-view', ($view_untracked_links.attr('data-et-view') || '') + ' ' + et_view_tracking_tag);
                                                            B.et.initAttributesTracking($view_untracked_links);
                                                            if (B.env.b_is_group_search && B.env.b_is_group_search === '1') {
                                                                $group_untracked_links = $('.ABbDSFbDdPOdCYO_view_tracking_div[data-room-id="' + room_id + '"]').filter(function () {
                                                                    var et_view = $(this).attr('data-et-view') || '';
                                                                    return et_view.indexOf(et_group_tracking_tag) < 0;
                                                                });
                                                                $group_untracked_links.attr('data-et-view', ($group_untracked_links.attr('data-et-view') || '') + ' ' + et_group_tracking_tag);
                                                                B.et.initAttributesTracking($group_untracked_links);
                                                            }
                                                            if (B.et.track('ABbDSFbDdPOdCYO') > 1) {
                                                                $room_links.removeClass('g-hidden');
                                                                $('.reviews-no-room-stayed-71978212')
                                                                        .filter(function () {
                                                                            return !$(this).hasClass('g-hidden');
                                                                        })
                                                                        .addClass('g-hidden');
                                                            }
                                                        }
                                                    })();
                                                </script>
                                            </div>
                                            <div class="review-helpful__container"
                                                 data-component="reviews/review-helpful" data-current-count="0">
                                                <form class="review-helpful__form clearfix"
                                                      action="https://www.booking.com/vote_review" method="post">
                                                    <input type="hidden" name="hotel_id" value="719782">
                                                    <input type="hidden" name="review_url" value="7f89553242672ad0">
                                                    <input type="hidden" name="review_id" value="0">
                                                    <input type="hidden" name="vote_type" value="1">
                                                    <input type="hidden" name="vote_value" value="1">
                                                    <button type="submit"
                                                            class="review-helpful__form-submit review-helpful-heart-submit">
                                                        Helpful
                                                    </button>
                                                </form>
                                                <p class="review-helpful__vote-feedback-message review-helpful-heart-vote-feedback-message">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div id="review_photo_lightbox"></div>
                            <div class="review_list_pagination">
                                <p class="page_link review_previous_page">
                                    Previous page
                                </p>
                                <p class="page_link review_next_page">
                                    <a href="https://www.booking.com/reviewlist.html?aid=304142;label=gen173nr-1FCAEoggJCAlhYSDNYBGj0AYgBAZgBMcIBCndpbmRvd3MgMTDIAQzYAQHoAQH4AQKSAgF5qAID;sid=6dd10b3e0aa84c24063f161f676684c6;cc1=vn;dist=1;pagename=sunland;r_lang=en;roomtype=-1;type=total;upsort_photo=0&amp;;offset=10;rows=10"
                                       id="review_next_page_link">
                                        Next page
                                    </a>
                                </p>
                                <p class="page_showing">
                                    Showing
                                    1 - 10
                                </p>
                            </div>
                        </div>
                        <div class="review-tab-other-properties " style="display: block;">
                            <h4>More properties recommended for you:</h4>
                            <div class="prev-property" style="display: none;"><i class="bicon-">낞</i></div>
                            <div class="review-tab-slider-container">
                                <div class="slider-track">
                                    <ul style="width: 1024px; left: 0px;">
                                        <li>
                                            <a href="https://www.booking.com/hotel/vn/alagon-saigon.html?label=gen173nr-1FCAEoggJCAlhYSDNYBGj0AYgBAZgBMcIBCndpbmRvd3MgMTDIAQzYAQHoAQH4AQKSAgF5qAID;sid=6dd10b3e0aa84c24063f161f676684c6;fs=1;shid=719782&amp;"
                                               target="_blank" data-et-click="customGoal:ZOOTdCMPXKIHYTJXceZVCRT:1">
                                                <img src="./Sunland Hotel, Ho Chi Minh City – Updated 2018 Prices_files/108122755.jpg"
                                                     alt="Alagon Saigon Hotel &amp; Spa">
                                                <div class="review-tab-other-property-name">Alagon
                                                    Saigon Hotel &amp; Spa
                                                </div>
                                                <i class="
bk-icon-wrapper
bk-icon-stars
star_track
" title="3-star hotel">
                                                    <svg class="bk-icon -sprite-ratings_stars_3" height="12" width="39"
                                                         viewBox="0 0 39 12">
                                                        <path fill="#FEBA02"
                                                              d="M13 4.6c0-.1-.1-.2-.2-.2l-4.5-.3-1.5-4c-.1-.1-.5-.1-.5 0l-1.5 4-4.6.3c-.1 0-.2.1-.2.2s0 .2.1.3l3.5 2.5-1.2 4.3c0 .1 0 .2.1.3h.3l3.7-2.6 3.7 2.6H10.5c.1-.1.1-.2.1-.3L9.4 7.3l3.5-2.5c.1 0 .1-.1.1-.2zM26 4.6c0-.1-.1-.2-.2-.2l-4.5-.3-1.5-4c-.1-.2-.4-.2-.5 0l-1.5 4-4.5.3c-.1 0-.2.1-.2.2s0 .2.1.3l3.5 2.5-1.2 4.3c0 .1 0 .2.1.3.1.1.2.1.3 0l3.7-2.6 3.7 2.6H23.6c.1-.1.1-.2.1-.3l-1.2-4.3L26 4.9v-.3zM39 4.6c0-.1-.1-.2-.2-.2l-4.5-.3-1.5-4c-.1-.2-.4-.2-.5 0l-1.5 4-4.5.3c-.1 0-.2.1-.2.2s0 .2.1.3l3.5 2.5-1.2 4.3c0 .1 0 .2.1.3.1.1.2.1.3 0l3.7-2.6 3.7 2.6H36.6c.1-.1.1-.2.1-.3l-1.2-4.3L39 4.9v-.3z"></path>
                                                    </svg>
                                                    <span class="invisible_spoken">3-star hotel</span></i>

<span class=" review-score-widget review-score-widget__very_good    review-score-widget__12      ">
<span class="review-score-badge" role="link" aria-label="Scored 8.3 ">
8.3
</span>
<span class="review-score-widget__body">
<span class="review-score-widget__text" role="link" aria-label="Rated very good">
Very Good
</span>
<span class="review-score-widget__subtext" role="link" aria-label=" from 2,584 reviews">
2,584 reviews
</span>
</span>
</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.booking.com/hotel/vn/eden-saigon.html?label=gen173nr-1FCAEoggJCAlhYSDNYBGj0AYgBAZgBMcIBCndpbmRvd3MgMTDIAQzYAQHoAQH4AQKSAgF5qAID;sid=6dd10b3e0aa84c24063f161f676684c6;fs=2;shid=719782&amp;"
                                               target="_blank" data-et-click="customGoal:ZOOTdCMPXKIHYTJXceZVCRT:1">
                                                <img src="./Sunland Hotel, Ho Chi Minh City – Updated 2018 Prices_files/74943412.jpg"
                                                     alt="EdenStar Saigon Hotel &amp; Spa">
                                                <div class="review-tab-other-property-name">EdenStar
                                                    Saigon Hotel &amp; Spa
                                                </div>
                                                <i class="
bk-icon-wrapper
bk-icon-stars
star_track
" title="4-star hotel">
                                                    <svg class="bk-icon -sprite-ratings_stars_4" height="12" width="52"
                                                         viewBox="0 0 52 12">
                                                        <path fill="#FEBA02"
                                                              d="M13 4.6c0-.1-.1-.2-.2-.2l-4.5-.3-1.5-4c-.1-.1-.5-.1-.5 0l-1.5 4-4.6.3c-.1 0-.2.1-.2.2s0 .2.1.3l3.5 2.5-1.2 4.3c0 .1 0 .2.1.3h.3l3.7-2.6 3.7 2.6H10.5c.1-.1.1-.2.1-.3L9.4 7.3l3.5-2.5c.1 0 .1-.1.1-.2zM26 4.6c0-.1-.1-.2-.2-.2l-4.5-.3-1.5-4c-.1-.2-.4-.2-.5 0l-1.5 4-4.5.3c-.1 0-.2.1-.2.2s0 .2.1.3l3.5 2.5-1.2 4.3c0 .1 0 .2.1.3.1.1.2.1.3 0l3.7-2.6 3.7 2.6H23.6c.1-.1.1-.2.1-.3l-1.2-4.3L26 4.9v-.3zM39 4.6c0-.1-.1-.2-.2-.2l-4.5-.3-1.5-4c-.1-.2-.4-.2-.5 0l-1.5 4-4.5.3c-.1 0-.2.1-.2.2s0 .2.1.3l3.5 2.5-1.2 4.3c0 .1 0 .2.1.3.1.1.2.1.3 0l3.7-2.6 3.7 2.6H36.6c.1-.1.1-.2.1-.3l-1.2-4.3L39 4.9v-.3zM52 4.6c0-.1-.1-.2-.2-.2l-4.5-.3-1.5-4c-.1-.2-.4-.2-.5 0l-1.5 4-4.5.3c-.1 0-.2.1-.2.2s0 .2.1.3l3.5 2.5-1.2 4.3c0 .1 0 .2.1.3.1.1.2.1.3 0l3.7-2.6 3.7 2.6H49.6c.1-.1.1-.2.1-.3l-1.2-4.3L52 4.9v-.3z"></path>
                                                    </svg>
                                                    <span class="invisible_spoken">4-star hotel</span></i>

<span class=" review-score-widget review-score-widget__very_good    review-score-widget__12      ">
<span class="review-score-badge" role="link" aria-label="Scored 8.3 ">
8.3
</span>
<span class="review-score-widget__body">
<span class="review-score-widget__text" role="link" aria-label="Rated very good">
Very Good
</span>
<span class="review-score-widget__subtext" role="link" aria-label=" from 1,680 reviews">
1,680 reviews
</span>
</span>
</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.booking.com/hotel/vn/alagon-central-hotel-and-spa.html?label=gen173nr-1FCAEoggJCAlhYSDNYBGj0AYgBAZgBMcIBCndpbmRvd3MgMTDIAQzYAQHoAQH4AQKSAgF5qAID;sid=6dd10b3e0aa84c24063f161f676684c6;fs=3;shid=719782&amp;"
                                               target="_blank" data-et-click="customGoal:ZOOTdCMPXKIHYTJXceZVCRT:1">
                                                <img src="./Sunland Hotel, Ho Chi Minh City – Updated 2018 Prices_files/118289410.jpg"
                                                     alt="Alagon Central Hotel &amp; Spa">
                                                <div class="review-tab-other-property-name">Alagon
                                                    Central Hotel &amp; Spa
                                                </div>
                                                <i class="
bk-icon-wrapper
bk-icon-stars
star_track
" title="3-star hotel">
                                                    <svg class="bk-icon -sprite-ratings_stars_3" height="12" width="39"
                                                         viewBox="0 0 39 12">
                                                        <path fill="#FEBA02"
                                                              d="M13 4.6c0-.1-.1-.2-.2-.2l-4.5-.3-1.5-4c-.1-.1-.5-.1-.5 0l-1.5 4-4.6.3c-.1 0-.2.1-.2.2s0 .2.1.3l3.5 2.5-1.2 4.3c0 .1 0 .2.1.3h.3l3.7-2.6 3.7 2.6H10.5c.1-.1.1-.2.1-.3L9.4 7.3l3.5-2.5c.1 0 .1-.1.1-.2zM26 4.6c0-.1-.1-.2-.2-.2l-4.5-.3-1.5-4c-.1-.2-.4-.2-.5 0l-1.5 4-4.5.3c-.1 0-.2.1-.2.2s0 .2.1.3l3.5 2.5-1.2 4.3c0 .1 0 .2.1.3.1.1.2.1.3 0l3.7-2.6 3.7 2.6H23.6c.1-.1.1-.2.1-.3l-1.2-4.3L26 4.9v-.3zM39 4.6c0-.1-.1-.2-.2-.2l-4.5-.3-1.5-4c-.1-.2-.4-.2-.5 0l-1.5 4-4.5.3c-.1 0-.2.1-.2.2s0 .2.1.3l3.5 2.5-1.2 4.3c0 .1 0 .2.1.3.1.1.2.1.3 0l3.7-2.6 3.7 2.6H36.6c.1-.1.1-.2.1-.3l-1.2-4.3L39 4.9v-.3z"></path>
                                                    </svg>
                                                    <span class="invisible_spoken">3-star hotel</span></i>

<span class=" review-score-widget review-score-widget__good    review-score-widget__12      ">
<span class="review-score-badge" role="link" aria-label="Scored 7.8 ">
7.8
</span>
<span class="review-score-widget__body">
<span class="review-score-widget__text" role="link" aria-label="Rated good">
Good
</span>
<span class="review-score-widget__subtext" role="link" aria-label=" from 1,145 reviews">
1,145 reviews
</span>
</span>
</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.booking.com/hotel/vn/somerset-ho-chi-minh-city.html?label=gen173nr-1FCAEoggJCAlhYSDNYBGj0AYgBAZgBMcIBCndpbmRvd3MgMTDIAQzYAQHoAQH4AQKSAgF5qAID;sid=6dd10b3e0aa84c24063f161f676684c6;fs=4;shid=719782&amp;"
                                               target="_blank" data-et-click="customGoal:ZOOTdCMPXKIHYTJXceZVCRT:1">
                                                <img src="./Sunland Hotel, Ho Chi Minh City – Updated 2018 Prices_files/63297322.jpg"
                                                     alt="Somerset Ho Chi Minh City">
                                                <div class="review-tab-other-property-name">Somerset
                                                    Ho Chi Minh City
                                                </div>
                                                <i class="
bk-icon-wrapper
bk-icon-stars
star_track
" title="5 stars">
                                                    <svg class="bk-icon -sprite-ratings_stars_5" height="12" width="65"
                                                         viewBox="0 0 65 12">
                                                        <path fill="#FEBA02"
                                                              d="M13 4.6c0-.1-.1-.2-.2-.2l-4.5-.3-1.5-4c-.1-.1-.5-.1-.5 0l-1.5 4-4.6.3c-.1 0-.2.1-.2.2s0 .2.1.3l3.5 2.5-1.2 4.3c0 .1 0 .2.1.3h.3l3.7-2.6 3.7 2.6H10.5c.1-.1.1-.2.1-.3L9.4 7.3l3.5-2.5c.1 0 .1-.1.1-.2zM26 4.6c0-.1-.1-.2-.2-.2l-4.5-.3-1.5-4c-.1-.2-.4-.2-.5 0l-1.5 4-4.5.3c-.1 0-.2.1-.2.2s0 .2.1.3l3.5 2.5-1.2 4.3c0 .1 0 .2.1.3.1.1.2.1.3 0l3.7-2.6 3.7 2.6H23.6c.1-.1.1-.2.1-.3l-1.2-4.3L26 4.9v-.3zM39 4.6c0-.1-.1-.2-.2-.2l-4.5-.3-1.5-4c-.1-.2-.4-.2-.5 0l-1.5 4-4.5.3c-.1 0-.2.1-.2.2s0 .2.1.3l3.5 2.5-1.2 4.3c0 .1 0 .2.1.3.1.1.2.1.3 0l3.7-2.6 3.7 2.6H36.6c.1-.1.1-.2.1-.3l-1.2-4.3L39 4.9v-.3zM52 4.6c0-.1-.1-.2-.2-.2l-4.5-.3-1.5-4c-.1-.2-.4-.2-.5 0l-1.5 4-4.5.3c-.1 0-.2.1-.2.2s0 .2.1.3l3.5 2.5-1.2 4.3c0 .1 0 .2.1.3.1.1.2.1.3 0l3.7-2.6 3.7 2.6H49.6c.1-.1.1-.2.1-.3l-1.2-4.3L52 4.9v-.3zM65 4.6c0-.1-.1-.2-.2-.2l-4.5-.3-1.5-4c-.1-.2-.4-.2-.5 0l-1.5 4-4.5.3c-.1 0-.2.1-.2.2s0 .2.1.3l3.5 2.5-1.2 4.3c0 .1 0 .2.1.3.1.1.2.1.3 0l3.7-2.6 3.7 2.6H62.6c.1-.1.1-.2.1-.3l-1.2-4.3L65 4.9v-.3z"></path>
                                                    </svg>
                                                    <span class="invisible_spoken">5 stars</span></i>

<span class=" review-score-widget review-score-widget__fabulous    review-score-widget__12      ">
<span class="review-score-badge" role="link" aria-label="Scored 8.8 ">
8.8
</span>
<span class="review-score-widget__body">
<span class="review-score-widget__text" role="link" aria-label="Rated excellent">
Excellent
</span>
<span class="review-score-widget__subtext" role="link" aria-label=" from 828 reviews">
828 reviews
</span>
</span>
</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="next-property" style="display: block;"><i class="bicon-">낝</i></div>
                        </div>
                    </div>
                    <div style="clear: both;" data-et-view="customGoal:HDDPKSHLWbOTCGVTbXNbBMPMKdSODAAC:2"></div>
                </div><!-- /#review_list_score_container -->
                <span data-js-uhrcpo="3," style="position:absolute;width:1px;height:1px;opacity:0;"></span>
            </div><!-- /.sliding-panel-widget-content -->
        </div><!-- /.sliding-panel-widget-scrollable -->
        <div tabindex="0"></div>
        <div tabindex="0"></div>
    </div><!-- /.sliding-panel-widget -->
</div>