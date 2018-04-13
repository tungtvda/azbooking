<link rel="stylesheet"
      href="{SITE-NAME}/view/default/themes/css/review.css"/>
<input value="{SITE_NAME_MANAGE}" id="site_name_manage" hidden>
<input value="" id="url_tab_review" >
<div id="tab_review" data-tab="reviews" class="pagination_scroll_top">
    <div data-component="core/sliding-panel-core-a11y" data-id="hp-reviews-sliding" id="hp-reviews-sliding"
         aria-hidden="false" class="sliding-panel-widget " tabindex="0" style="">
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
                        {percent_access}
                        </h2>
                    </div>
                </div>
                <div id="review_list_score_container" class="review_list_outer_container clearfix">
                    <div id="review_list_score" class=" review_list_score_container lang_ltr scores_full_layout">
                        <div class="reviews_panel_header_score">
<span class=" review-score-widget review-score-widget__very_good  review-score-widget__inline   review-score-widget__20 " style="font-size: 18px; ">
<span class="review-score-badge" role="link" aria-label="Scored 8.2 ">
8.2
</span>
<span style="margin-left: 10px" class="review-score-widget__text" role="link" aria-label="Rated very good">
Rất tốt
</span>
<span style="margin-left: 10px" class="review-score-widget__subtext" role="link" aria-label=" from 3,824 reviews">
  3,824 đánh giá
</span>
</span>
<a id="show_hide_statis" href="javascript:void(0)" style="font-style: italic;margin-left: 10px; color:#ed1c24">(Xem chi tiết thống kê)</a>
                        </div>
                        <div id="tooltip_score_distribution" style="display: none" >
                            <div class="review_list_block one_col">
                                <div class="scores_full_layout border-review-score">
                                    <ul id="review_list_score_distribution"
                                        class="review_score_breakdown_list list_tighten clearfix">
                                        <li class="clearfix" data-question="review_adj_superb">
                                            <p class="review_score_name">
                                                Tuyệt vời: 9+
                                            </p>
                                            <div class="score_bar">
                                                <div class="score_bar_value" data-score="36" style="width: 36%;"></div>
                                            </div>
                                            <p class="review_score_value">1372</p>
                                        </li>
                                        <li class="clearfix" data-question="review_adj_good">
                                            <p class="review_score_name">
                                                Tốt : 7 – 9
                                            </p>
                                            <div class="score_bar">
                                                <div class="score_bar_value" data-score="49" style="width: 49%;"></div>
                                            </div>
                                            <p class="review_score_value">1871</p>
                                        </li>
                                        <li class="clearfix" data-question="review_adj_average_okay">
                                            <p class="review_score_name">
                                                Trung bình: 5 – 7
                                            </p>
                                            <div class="score_bar">
                                                <div class="score_bar_value" data-score="12" style="width: 12%;"></div>
                                            </div>
                                            <p class="review_score_value">451</p>
                                        </li>
                                        <li class="clearfix" data-question="review_adj_poor">
                                            <p class="review_score_name">
                                                Kém: 3 – 5
                                            </p>
                                            <div class="score_bar">
                                                <div class="score_bar_value" data-score="2" style="width: 2%;"></div>
                                            </div>
                                            <p class="review_score_value">88</p>
                                        </li>
                                        <li class="clearfix" data-question="review_adj_very_poor">
                                            <p class="review_score_name">
                                                Rất kém: 1 – 3
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
                                        <p class="review_score_name">Ăn uống</p>
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
                            <ul class="review_list" style="margin-bottom: 0px">
                                <li class="review_item clearfix featured_review_item ">
                                    <div class="featured_review_item__header_block featured_review-scout_review"
                                         data-et-view="adUAVGZaeaPDERXSEJCLfeKe:1 adUAVGZaeaPDERXSEJCLfeKe:2">
                                        <div class="featured_review_item__icon_container"><img
                                                    src="{SITE-NAME}/view/default/themes/images/review/icon_review.png"
                                                    alt="Property Scout Review"></div>
                                        <div class="featured_review_item__header featured_review_item__no_votes">
                                            Form Đánh giá <a class="icon_show_hide_form_review" href="javascript:void(0)"><i class=" fa fa-align-justify"></i></a>
                                        </div>
                                    </div>
                                    <div id="form_review_show_hide" class="featured_review-scout_review-subheader widget_has_radio_checkbox_text">
                                        <div class="form_review widget_content" style="margin-bottom: 0px">
                                            <form id="form_submit_review">
                                                <input type="text" value="{code_check_send_email}" id="input_code_check_send_email" name="code_check_send_email" hidden class="valid">
                                                <input type="text" value="{tour_id}" id="input_tour_id" name="tour_id" hidden class="valid">
                                                <input type="text" value="{name}" id="input_tour_name" name="tour_name" hidden class="valid">
                                                <input type="text" value="{code}" id="input_tour_code" name="tour_code" hidden class="valid">
                                                <input type="text" value="azbooking.vn" id="input_domain" name="domain" hidden class="valid">
                                            <fieldset style="margin-bottom: 15px">
                                                <legend><i class="fa fa-sliders"></i> Điểm dịch vụ</legend>
                                                <div class="row_slide">
                                                    <p class="review_score_name">Chương trình tour</p>
                                                    <div class="slidecontainer">
                                                        <input type="range" min="0" max="10" value="5" class="slider valid" name="program"
                                                               id="program_slide">
                                                    </div>
                                                    <div class="point_slide">
                                                        <span id="program_point" class="review_score_value">0</span>
                                                    </div>
                                                </div>
                                                <div class="row_slide">
                                                    <p class="review_score_name">Hướng dẫn viên suốt tuyến</p>
                                                    <div class="slidecontainer">
                                                        <input type="range" min="0" max="10" value="5" class="slider valid" name="tour_guide_full"
                                                               id="tour_guide_full_slide">
                                                    </div>
                                                    <div class="point_slide">
                                                        <span id="tour_guide_full_point"
                                                              class="review_score_value">5</span>
                                                    </div>
                                                </div>
                                                <div class="row_slide">
                                                    <p class="review_score_name">Hướng dẫn viên địa phương</p>
                                                    <div class="slidecontainer">
                                                        <input type="range" min="0" max="10" value="5" class="slider valid" name="tour_guide_local"
                                                               id="tour_guide_local_slide">
                                                    </div>
                                                    <div class="point_slide">
                                                        <span id="tour_guide_local_point"
                                                              class="review_score_value">5</span>
                                                    </div>
                                                </div>
                                                <div class="row_slide">
                                                    <p class="review_score_name">Khách sạn</p>
                                                    <div class="slidecontainer">
                                                        <input type="range" min="0" max="10" value="5" class="slider valid" name="hotel"
                                                               id="hotel_slide">
                                                    </div>
                                                    <div class="point_slide">
                                                        <span id="hotel_point" class="review_score_value">5</span>
                                                    </div>
                                                </div>
                                                <div class="row_slide">
                                                    <p class="review_score_name">Ăn uống</p>
                                                    <div class="slidecontainer">
                                                        <input type="range" min="0" max="10" value="5" class="slider valid" name="restaurant"
                                                               id="restaurant_slide">
                                                    </div>
                                                    <div class="point_slide">
                                                        <span id="restaurant_point" class="review_score_value">5</span>
                                                    </div>
                                                </div>
                                                <div class="row_slide">
                                                    <p class="review_score_name">Phương tiện vận chuyển</p>
                                                    <div class="slidecontainer">
                                                        <input type="range" min="0" max="10" value="5" class="slider valid"  name="transportation"
                                                               id="transportation_slide">
                                                    </div>
                                                    <div class="point_slide">
                                                        <span id="transportation_point"
                                                              class="review_score_value">5</span>
                                                    </div>
                                                </div>
                                            </fieldset>
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-12 col-sm-12">
                                                        <p class="review_score_name">Đánh giá tổng quan <span
                                                                    style="color: red">*</span></p>
                                                        <label class="from" style="margin-top: 0px; padding-top: 0px">
                                                <span class="form-item db" style="margin-top: 0px">
                                                    <i class="awe-icon  fa fa-comment"></i>
                                                    <input required="required"  class="valid_input" type="text" name="content_review" id="input_content_review"
                                                           placeholder="Đánh giá ngắn gọn về chuyến đi của bạn...">
                                                </span>
                                                        </label>
                                                        <p class="error_submit_review" id="error_content_review">Bạn vui lòng nhập đánh giá tổng quan</p>
                                                    </div>
                                                </div>

                                            <div class="row">
                                                <div class="col-xs-12 col-md-6 col-sm-12">
                                                    <p class="review_score_name">Họ tên <span
                                                                style="color: red">*</span></p>
                                                    <label class="from" style="margin-top: 0px; padding-top: 0px">
                                                <span class="form-item db" style="margin-top: 0px">
                                                    <i class="awe-icon  fa fa-user"></i>
                                                    <input required="required"  class="valid_input" type="text" name="name_cus_review" id="input_name_cus_review"
                                                           placeholder="Họ tên khách hàng...">
                                                </span>
                                                    </label>
                                                    <p class="error_submit_review" id="error_name_cus_review">Bạn vui lòng nhập họ tên</p>
                                                </div>
                                                <div class="col-xs-12 col-md-6 col-sm-12">
                                                    <p class="review_score_name">Email <span style="color: red">*</span>
                                                    </p>
                                                    <label class="from" style="margin-top: 0px; padding-top: 0px">
                                                <span class="form-item db" style="margin-top: 0px">
                                                    <i class="awe-icon fa fa-envelope"></i>
                                                    <input required="required"  class="valid_input" type="email" name="email_cus_review" id="input_email_cus_review"
                                                           placeholder="Email khách hàng...">
                                                </span>
                                                    </label>
                                                    <p class="error_submit_review" id="error_email_cus_review">Bạn vui lòng kiểm tra email</p>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12 col-md-6 col-sm-12">
                                                    <p class="review_score_name">Điện thoại <span
                                                                style="color: red">*</span></p>
                                                    <label class="from" style="margin-top: 0px; padding-top: 0px">
                                                <span class="form-item db" style="margin-top: 0px">
                                                    <i class="awe-icon fa fa-phone"></i>
                                                    <input required="required"  class="valid_input" type="text" name="phone_cus_review" id="input_phone_cus_review"
                                                           placeholder="Điện thoại...">
                                                </span>
                                                    </label>
                                                    <p class="error_submit_review" id="error_phone_cus_review">Bạn vui lòng nhập số điện thoại</p>
                                                </div>
                                                <div class="col-xs-12 col-md-6 col-sm-12">
                                                    <p class="review_score_name">Ngày khởi hành</p>
                                                    <label class="from" style="margin-top: 0px; padding-top: 0px">
                                                <span class="form-item db" style="margin-top: 0px">
                                                    <i class="awe-icon fa fa-calendar"></i>
                                                    <input type="text" id="input_ngay_khoi_hanh"  class="datepicker_review valid" name="ngay_khoi_hanh_review" placeholder="Ngày khởi hành...">
                                                </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12 col-md-12 col-sm-12">
                                                    <p class="review_score_name">Ý kiến khác / Đề xuất khác</p>
                                                    <label class="from" style="margin-top: 0px; padding-top: 0px">
                                                <span class="form-item db" style="margin-top: 0px">
                                                    <textarea rows="2" id="input_comment_review" name="comment_review" class="text-area-review valid"
                                                              placeholder="Ý kiến..."></textarea>
                                                </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12 col-md-12 col-sm-12">
                                                    <p class="review_score_name">Quý khách có dự định đi du lịch trong
                                                        thời gian sắp tới không? </p>
                                                    <label class="from" style="margin-top: 0px; padding-top: 0px">
                                                <span class="form-item db" style="margin-top: 0px">
                                                   <textarea rows="2" id="input_comment_upcoming" name="comment_upcoming" class="text-area-review valid"
                                                             placeholder="Quý khách có dự định đi du lịch trong thời gian sắp tới không?..."></textarea>
                                                </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12 col-md-12 col-sm-12">
                                                <div class="form-actions">
                                                    <div class="add-to-cart">
                                                        <button class="submit_review" type="button">
                                                            <i class="awe-icon fa fa-check-square-o"></i>  Đánh giá
                                                        </button>
                                                        <div id="show_mess" class="alert  fade in alert-dismissible">
                                                            <a href="javascript:void(0)" id="hidden_mess_review" class="close"  title="Tắt thông báo">×</a>
                                                            <strong id="show_mess_content">Danger!</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>


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
                            <div class="featured_review_item__header_block featured_review-scout_review title_list_review">
                                <div class="featured_review_item__icon_container"><img
                                            src="{SITE-NAME}/view/default/themes/images/review/icon_review.png"
                                            alt="Property Scout Review"></div>
                                <div class="featured_review_item__header featured_review_item__no_votes">
                                    Danh sách đánh giá
                                </div>
                            </div>
                            <ul class="review_list" >
                                {list_reivew}
                              <!--  <li class="review_item clearfix review_featured  ">
                                    <p class="review_item_date">
                                        Reviewed: April 30, 2017
                                    </p>
                                    <div data-et-view="aRDPNZJKSXe:2"></div>
                                    <div class="review_item_reviewer" style="text-align: center">
                                        <div>
                                            <img data-toggle="tooltip" data-placement="top" title=" Trần Văn Tùng" style="display: initial;" class="avatar-mask ava-pad-bottom ava-default" src="https://cdn.iconscout.com/public/images/icon/free/png-512/avatar-user-teacher-312a499a08079a12-512x512.png" alt="">
                                        </div>
                                        <a  href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title=" Trần Văn Tùng" class="reviewer_country name_cus_list">
                                        Trần Văn Tùng df fsd sd dfa dfs sdf dsf
                                        </a>
                                    </div>
                                    <div class="review_item_review">
                                        <div class="review_item_review_container lang_ltr">
                                            <div class="review_item_review_header">
                                                <div class="review_item_header_score_container">
                                                    <span class=" review-score-widget review-score-widget__superb review-score-widget__score-only  review-score-widget__no-subtext    ">
                                                        <span class="review-score-badge" role="link" aria-label="Scored 9.2 ">
                                                            9.2
                                                         </span>
                                                    </span>
                                                </div>
                                                <div class="review_item_header_content_container">
                                                    <div class="review_item_header_content review_item_header_scoreword">
                                                       Một chuyến đi tuyệt vời
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review_item_review_content">
                                                <p class="review_neg">
                                                    <a href=""><i class="review_item_icon review_item_icon_default fa fa-plus-square" ></i></a>
                                                    was unreliable. pool ohotos make it look bigger
                                                    than it is. they charge laundry by the piece
                                                    rather than weight which was super expensive.
                                                <b class="icon_review_list">
                                                    <a data-toggle="tooltip" data-placement="left" title="Chương trình tour: 10" href="javascript:void(0)"><i class="fa fa-plane "></i></a>
                                                    <a data-toggle="tooltip" data-placement="left" title="Hướng dẫn viên suốt tuyến: 10" href="javascript:void(0)"><i class="fa fa-users"></i></a>
                                                    <a data-toggle="tooltip" data-placement="left" title="Hướng dẫn viên địa phương: 10" href="javascript:void(0)"><i class="fa fa-user "></i></a>
                                                    <a data-toggle="tooltip" data-placement="left" title="Khách sạn: 10" href="javascript:void(0)"><i class="fa fa-building"></i></a>
                                                    <a data-toggle="tooltip" data-placement="left" title="Ăn uống: 10" href="javascript:void(0)"><i class="fa fa-cutlery  "></i></a>
                                                    <a data-toggle="tooltip" data-placement="left" title="Vận chuyển: 10" href="javascript:void(0)"><i class="fa fa-car  "></i></a>
                                                </b>
                                                </p>


                                            </div>
                                        </div>
                                    </div>
                                </li>-->
                            </ul>

                            <div id="review_photo_lightbox"></div>
                            <div hidden class="review_list_pagination">
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
                    </div>
                </div><!-- /#review_list_score_container -->
                <span data-js-uhrcpo="3," style="position:absolute;width:1px;height:1px;opacity:0;"></span>
            </div><!-- /.sliding-panel-widget-content -->
        </div><!-- /.sliding-panel-widget-scrollable -->
        <div tabindex="0"></div>
        <div tabindex="0"></div>
    </div><!-- /.sliding-panel-widget -->
</div>