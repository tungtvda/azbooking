<div class="col-md-3 col-md-pull-9">
    <div class="page-sidebar">
        <div class="sidebar-title">
            <div class="clear-filter">
                <a class="{tab_tour_title}" href="javascript:void(0)" id="tab_tour_title"><i class="awe-icon awe-icon-briefcase"></i> Tìm tour</a> &nbsp;&nbsp;
                <a class="{tab_khachsan_title}" href="javascript:void(0)" id="tab_khachsan_title"><i class="awe-icon awe-icon-hotel"></i> Tìm khách sạn</a> &nbsp;&nbsp;
                <a class="{tab_tintuc_title}" href="javascript:void(0)" id="tab_tintuc_title"><i class="awe-icon fa fa-newspaper-o"></i> Tin tức</a>
            </div>
        </div>
        <div {tab_tour} id="tab_tour" class="widget widget_has_radio_checkbox_text"><h3>Tìm kiếm tour</h3>
            <div class="widget_content search_left">
                <form action="{SITE-NAME}/tim-kiem-tour" method="get">
                    <label class="from"> <span class="form-item db">
                            <i class="awe-icon awe-icon-key"></i>
                            <input type="text" name="key_timkiem" placeholder="Từ khóa tìm kiếm...">
                        </span>
                    </label>
                    <label class="to"> <span class="form-item db">
                          <select style="width: 100%"  name="danhmuc_tour_1" id="DanhMuc1Id" class="awe-select">
                              <option value="">Chọn loại tour</option>
                              {danhmuc_1_timkiem}
                          </select>
                        </span>
                    </label>
                    <label class="to"> <span class="form-item db">
                          <select style="width: 100%" name="danhmuc_tour_2" id="DanhMuc2Id" class="awe-select">
                              <option value="">Danh mục cấp 2</option>
                          </select>
                        </span>
                    </label>
                    <label class="to"> <span class="form-item db">
                          <select name="gia_timkiem" class="awe-select">
                              <option value="">Giá tiền</option>
                              {price_timkiem}
                          </select>
                        </span>
                    </label>
                    <label class="to"> <span class="form-item db">
                          <select name="thoigian_timkiem" class="awe-select">
                              <option value="">Thời gian</option>
                              {list_Durations}
                          </select>
                        </span>
                    </label>
                    <div class="form-actions">
                        <div class="add-to-cart">
                            <button type="submit"><i class="awe-icon awe-icon-search"></i> Tìm kiếm
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div {tab_khachsan} id="tab_khachsan" class="widget widget_has_radio_checkbox_text"><h3>Tìm kiếm khách sạn</h3>
            <div class="widget_content search_left">
                <form action="{SITE-NAME}/tim-kiem-khach-san" method="get">
                    <label class="from"> <span class="form-item db">
                            <i class="awe-icon awe-icon-key"></i>
                            <input type="text" name="key_timkiem" placeholder="Từ khóa tìm kiếm...">
                        </span>
                    </label>
                    <label class="to"> <span class="form-item db">
                          <select name="danhmuc_id" class="awe-select">
                              <option value="">Chọn danh mục</option>
                              {danhmuc_khachsan_timkiem}

                          </select>
                        </span>
                    </label>
                    <label class="to"> <span class="form-item db">
                         <select name="sao_timkiem" class="awe-select">
                             <option value="">Loại khách sạn</option>
                             <option value="0">0 Sao</option>
                             <option value="1">1 Sao</option>
                             <option value="2">2 Sao</option>
                             <option value="3">3 Sao</option>
                             <option value="4">4 Sao</option>
                             <option value="5">5 Sao</option>
                         </select>
                        </span>
                    </label>
                    <label class="to"> <span class="form-item db">
                         <select class="awe-select" name="gia_timkiem">
                             <option value="">Giá tiền</option>
                             {price_khachsan}
                         </select>
                        </span>
                    </label>
                    <div class="form-actions">
                        <div class="add-to-cart">
                            <button type="submit"><i class="awe-icon awe-icon-search"></i> Tìm kiếm
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div {tab_tintuc} id="tab_tintuc" class="widget widget_has_radio_checkbox_text"><h3>Tìm kiếm tin tức</h3>
            <div class="widget_content search_left">
                <form action="{SITE-NAME}/tim-kiem-khach-san" method="get">
                    <label class="from"> <span class="form-item db">
                            <i class="awe-icon awe-icon-key"></i>
                            <input type="text" name="key_timkiem" placeholder="Từ khóa tìm kiếm...">
                        </span>
                    </label>
                    <label class="to"> <span class="form-item db">
                         <select name="danhmuc_id" class="awe-select">
                             <option value="">Chọn danh mục</option>
                             {danhmuc_tintuc_timkiem}

                         </select>
                        </span>
                    </label>
                    <div class="form-actions">
                        <div class="add-to-cart">
                            <button type="submit"><i class="awe-icon awe-icon-search"></i> Tìm kiếm
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="widget widget_price_filter"><h3>Fanpage</h3>
            <div class="price-slider-wrapper">
                <div class="price-slider"></div>
                <div class="price_slider_amount">
                    <div class="price_label"><span class="from"></span> - <span class="to"></span></div>
                </div>
            </div>
        </div>
        <div class="widget widget_has_radio_checkbox"><h3>Văn phòng Hà Nội</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14898.1817374241!2d105.80953!3d21.010851!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4be5d76ac6ba18d3!2zQ2h1bmcgQ8awIDEzNyBOZ3V54buFbiBOZ-G7jWMgVsWp!5e0!3m2!1svi!2sus!4v1480583836972"
                    width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="widget widget_has_radio_checkbox"><h3>Văn phòng Hồ Chí Minh</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15676.344842857752!2d106.699668!3d10.804709!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528c759b1f9f5%3A0xa1fe866799a22c83!2zMiBOZ3V54buFbiBUaGnhu4duIFRodeG6rXQsIFBoxrDhu51uZyAyNCwgQsOsbmggVGjhuqFuaCwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2sus!4v1480583873869"
                    width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="widget widget_has_radio_checkbox"><h3>Tin tức nổi bật</h3>
            <ul>
                {tintuc_left}
            </ul>
        </div>

        <!--<div class="widget widget_has_thumbnail"><h3>Tin tức nổi bật</h3>
            <ul>
                {tintuc_left}
            </ul>
        </div>-->
        <div class="widget widget_product_tag_cloud"><h3>Tags</h3>
            <div class="tagcloud">{tag_left}</div>
        </div>
    </div>
</div>
</div>
</div>
</section>