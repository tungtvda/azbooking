<section class="blog-page">
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
                                <p class="price"><i class="icon-dollar"></i> Giá:
                                    <ins><span class="amount"> {price_format}</span> {vnd}</ins>
                                </p>
                                <p class="price"><i class="icon-dollar"></i>Loại phòng:
                                    <ins><span class="parameter"> {room_type}</span></ins>
                                </p>
                                <p class="price"><i class="icon-home"></i> Khách sạn:
                                    <ins>{start}</ins>
                                </p>
                            </div>
                            <div itemprop="description">
                                <div class="entry-header">
                                    <div class="addthis_toolbox addthis_default_style "><a
                                                class="addthis_button_facebook_like"
                                                fb:like:layout="button_count"></a> <a
                                                class="addthis_button_tweet"></a> <a
                                                class="addthis_button_pinterest_pinit"
                                                pi:pinit:layout="horizontal"></a> <a
                                                class="addthis_counter addthis_pill_style"></a></div>
                                    <script type="text/javascript"
                                            src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-5254127c1833f872"></script>
                                </div>
                            </div>
                            <div itemprop="description">
                                <div style="float: left;width: 100%;" class="booking_detail_div grid grid_2">
                                    <a href="#booking" class="booking_detail">Đặt phòng </a>
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
                    <div class="package-details-content" style="float: left; width: 100%">
                        <h3 class="title">&nbsp;</h3>
                        <p>{content}
                        </p>
                        <h3 class="title">&nbsp;</h3>
                    </div>
                </div>
                <div class="related-post col-md-12 row"><h4>Có thể bạn quan tâm</h4>
                    <div class="related-slider">
                        {tour_lienquan}
                    </div>
                </div>
            </div>

            <div class="col-md-3 ">
                <form id="booking_hotel" action="" method="post">
                <div id="booking" class="detail-sidebar">
                    <div class="call-to-book"><i class="awe-icon awe-icon-phone"></i> <em>Gọi ngay cho chúng tôi</em>
                        <span><a href="tel:{Hotline}">{Hotline}</a></span>
                        <span><a href="tel:{Hotline_hcm}">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{Hotline_hcm}</a></span>
                    </div>
                    <div class="booking-info"><h3>Đặt phòng</h3>
                        <div class="calender"></div>
                        <input name="date_input" id="date_input" hidden value="{date_now}">
                        <input name="date_get_now" id="date_get_now" hidden value="{date_now}">
                        <input name="id_input" id="id_input" hidden value="{id}">
                        <input name="name_url_input" id="name_url_input" hidden value="{name_url}">

                        <input id="price" value="{price}" hidden>
                        <div style="margin-top: 20px" class="back_detail">
                            <div class="form-group">
                                <div class="widget widget_has_radio_checkbox">
                                    <table class="booking_hotel">
                                        <tr>
                                        <th>Chọn loại phòng</th>
                                        <th>Số phòng</th>
                                        </tr>
                                        {string_zoom_type}
                                    </table>
                                </div>
                                <label>Số người</label>
                                <div class="form-item">
                                    <input   min="1"
                                           type="number" id="num_member" name="num_member" value="">
                                </div>
                            </div>

                            <div style="display: none" id="hidden_total" class="price"><em>Tổng tiền đặt phòng</em> <span
                                        class="amount" id="amount_total"></span></div>
                            <div class="form-submit">
                                <div class="add-to-cart">
                                    <a  style="background-color: #f96d01 " href="javascript:void(0);" id="tinhtien"> Tính tiền <i
                                                style="    background-color: #f96d01"
                                                class="fa fa-dollar"></i></a>
                                    <a style=" display: none" href="javascript:void(0);" id="next_booking"> Tiếp tục <i
                                                style="    background-color: #0086cd;"
                                                class="fa fa-arrow-right"></i></a>
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
                                        Ngày đặt:
                                    </td>
                                    <td>
                                        <span id="date_table">{date_now_vn}</span>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        Loại phòng:
                                    </td>
                                    <td>
                                        <span id="rest_room_type"></span>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        Số người:
                                    </td>
                                    <td>
                                        <span id="num_member_table"></span>
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
                                   type="text" placeholder="Họ tên" id="name_booking" name="name_booking" style="width:100%">
                            <p style="color: red ; display: none" id="email_er">Vui lòng nhập email</p>
                            <input style="width:100%"
                                   class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle input_booking"
                                   type="text" placeholder="Email" id="email_booking" name="email_booking">
                            <p style="color: red; display: none" id="phone_er">Vui lòng nhập số điện thoại</p>
                            <input style="width:100%"
                                   class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle input_booking"
                                   type="text" placeholder="Điện thoại" id="phone_booking" name="phone_booking">
                            <p style="color: red; display: none" id="address_er">Vui lòng nhập địa chỉ</p>
                            <input class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle input_booking"
                                   type="text" placeholder="Địa chỉ" id="address_booking" name="address_booking">
                                                        <textarea style="height:90px; width:100%; margin-bottom: 20px"
                                                                  placeholder="Yêu cầu..."
                                                                  class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle input_booking"
                                                                  id="request_booking" name="request_booking">
                                                        </textarea>

                            <a style="width: 45%;  background-color: #ed1c27; float: left" id="back_booking"
                               href="javascript:void(0);"
                               class="nicdark_btn nicdark_btn_filter fullwidth nicdark_bg_green calculate_bt"><i
                                        style="background-color: #ed1c27;" class="fa fa-arrow-left"></i> Trở lại</a>
                            <img id="loading_booking" style="width: 45px; display: none"
                                 src="{SITE-NAME}/view/default/themes/images/loading.gif">
                            <a class="calculate_bt"
                               style="float: right;text-align: center;padding: 2px 10px; color:#ffffff;"
                               id="booking_hotel_ajax" href="javascript:void(0);"> Đặt tour <i
                                        style="background-color: #0086cd;" class="fa fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>