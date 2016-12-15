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
                                <p class="price"><i class="icon-dollar"></i> Giá:
                                    <ins><span class="amount"> {price_format}</span> {vnd}</ins>
                                </p>
                                <p class="price"><i class="icon-dollar"></i> Mã tour:
                                    <ins><span class="parameter"> {code}</span></ins>
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
                                    <a href="#booking" class="booking_detail">BOOK NOW </a>
                                    <div style="float: left;margin-top: 10px;margin-left: 10px;" class="social-share">
                                        <ul>
                                            <li><a href="https://www.facebook.com/sharer/sharer.php?u={link}" target="_blank"><i style="background-color: #ffffff"
                                                            class="fa fa-facebook"></i></a></li>
                                            <li><a href="https://twitter.com/intent/tweet?source=webclient&text={link}" target="_blank"><i style="background-color: #ffffff"
                                                            class="fa fa-twitter"></i></a></li>
                                            <li><a href="https://plus.google.com/share?url={link}" onclick='javascript:window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600");return false;' target="_blank"><i style="background-color: #ffffff"
                                                            class="fa fa-google-plus"></i></a></li>
                                            <li><a href="http://pinterest.com/pin/create/button/?url={link}" onclick="window.open(this.href); return false;" title="Pinterest" target="_blank"><i style="background-color: #ffffff"
                                                            class="fa fa-pinterest"></i></a></li>
                                            <li><a  href="mailto:?Subject={name}?&amp;body={name}:{content_short}" target="_blank"><i
                                                            class="fa fa-envelope"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="social_div grid grid_10"></div>
                            </div>
                        </div>
                    </div>
                    <div class="package-details-content" style="float: left; width: 100%">
                        <h3 class="title">Tóm tắt</h3>
                        <p>{summary}
                        </p>

                        <h3 class="title">Nổi bật</h3>
                        <p>{highlights}
                        </p>
                    </div>
                </div>
                <div class="product-tabs tabs col-md-12">

                    <ul>
                        <li><a href="#tabs-1">Lịch trình</a></li>
                        <li><a href="#tabs-2">Bao gồm</a></li>
                        <li><a href="#tabs-3">Không bao gồm</a></li>
                        <li><a href="#tabs-4">Bảng giá</a></li>
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
            </div>

            <div class="col-md-3">
                <div id="booking" class="detail-sidebar">
                    <div class="call-to-book"><i class="awe-icon awe-icon-phone"></i> <em>Gọi ngay cho chúng tôi</em>
                        <span>+1-888-8765-1234</span>
                    </div>
                    <div class="booking-info"><h3>Đặt tour</h3>
                        <div class="calender"></div>
                        <input id="date_input" hidden value="{date_now}">
                        <input id="id_input" hidden value="{id}">
                        <input id="name_url_input" hidden value="{name_url}">

                        <input id="price_adults" value="{price}" hidden>
                        <input id="price_2" value="{price_2}" hidden>
                        <input id="price_3" value="{price_3}" hidden>
                        <input id="price_4" value="{price_4}" hidden>
                        <input id="price_5" value="{price_5}" hidden>
                        <input id="price_6" value="{price_6}" hidden>
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
                        <div style="margin-top: 30px" class="form-group">
                            <label>Số người lớn</label>
                            <div class="form-item">
                                <input   onkeyup="myFunction()" onchange="myFunction()" min="1" type="number" id="num_price_adults"   id="price_adults" value="">
                            </div>
                        </div>
                        <div class="form-baggage-weight">
                            <label>Trẻ em</label>
                            <div class="form-item">
                                <input  onkeyup="myFunction()" onchange="myFunction()"  min="0" type="number" id="num_price_children_val"  placeholder="Số trẻ em"  value="0">
                            </div>
                        </div>
                        <div class="form-baggage-weight">
                            <label>Trẻ em dưới 5 tuổi</label>
                            <div class="form-item">
                                <input style="width: 100%;padding: 5px;"  onkeyup="myFunction()" onchange="myFunction()" min="0" type="number" id="num_price_children_5_val"  placeholder="Trẻ em dưới 5 tuổi"  value="0">
                                <input hidden class="nicdark_bg_greydark2 nicdark_border_none grey medium subtitle" id="total_input"   >
                            </div>
                        </div>
                        <div style="display: none" id="hidden_total" class="price"><em>Tổng tiền đặt tour</em> <span  class="amount" id="amount_total"></span></div>
                        <div  class="form-submit">
                            <div class="add-to-cart">
                                <a style=" display: none;" href="javascript:void(0);"  id="next_booking"> Tiếp tục <i style="    background-color: #0086cd;" class="fa fa-arrow-right"></i></a>
                                <!--<button type="submit"><i class="awe-icon awe-icon-cart"></i>Add this to Cart
                                </button>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>