<section class="filter-page">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="filter-item-wrapper" style="margin-top: 13px;">
                    <div class=" col-md-12 row" style="
    padding-bottom: 35px;
    margin-bottom: 35px;">
                        <form class="form-horizontal" id="submit_form" role="form" action="" method="post"
                              enctype="multipart/form-data">
                            <style>
                                .steps {
                                    list-style: none;
                                    display: table;
                                    width: 100%;
                                    padding: 0;
                                    margin: 0;
                                    position: relative;
                                    border-bottom: 1px solid #D4D4D4;
                                    margin-bottom: 20px;
                                }

                                .steps li {
                                    display: table-cell;
                                    text-align: center;
                                    width: 1%;
                                }

                                .steps li.active:before, .steps li.complete:before, .steps li.active .step, .steps li.complete .step {
                                    border-color: #5293c4;
                                }

                                .steps li:first-child:before {
                                    max-width: 51%;
                                    left: 50%;
                                }

                                .steps li:before {
                                    display: block;
                                    content: "";
                                    width: 100%;
                                    height: 1px;
                                    font-size: 0;
                                    overflow: hidden;
                                    border-top: 4px solid #CED1D6;
                                    position: relative;
                                    top: 21px;
                                    z-index: 1;
                                }

                                .steps li.active:before, .steps li.complete:before, .steps li.active .step, .steps li.complete .step {
                                    border-color: #5293c4;
                                }

                                .steps li .step {
                                    border: 5px solid #ced1d6;
                                    color: #546474;
                                    font-size: 15px;
                                    border-radius: 100%;
                                    background-color: #FFF;
                                    position: relative;
                                    z-index: 2;
                                    display: inline-block;
                                    width: 40px;
                                    height: 40px;
                                    line-height: 30px;
                                    text-align: center;
                                }

                                .steps li.complete .title, .steps li.active .title {
                                    color: #5293c4;
                                    font-weight: bold;
                                }

                                .steps li .title {
                                    display: block;
                                    margin-top: 4px;
                                    max-width: 100%;
                                    color: #949ea7;
                                    font-size: 14px;
                                    z-index: 104;
                                    text-align: center;
                                    table-layout: fixed;
                                    word-wrap: break-word;
                                }

                                .steps li:last-child:before {
                                    max-width: 50%;
                                    width: 50%;
                                }

                                .product-detail__info .product-title h2 {
                                    font-size: 18px;
                                }

                                th, td, .table > tbody > tr > td {
                                    border: none;
                                    padding: 10px;
                                }

                                table {
                                    border: none;
                                }

                                .cart-footer .shipping-handling {
                                    padding: 0px;
                                    padding-top: 0px;
                                }

                                .checkout-page__content .yourcart-content {
                                    min-width: 100%;
                                }

                                .checkout-page__content {
                                    overflow: hidden;
                                    overflow-x: hidden;
                                }

                                .checkout-page__content .content-title {
                                    border-bottom: 1px dashed #D4D4D4;
                                    margin-bottom: 0px;
                                }

                                .contact-form .form-item {
                                    width: 50%;
                                    padding: 10px;
                                    float: left;
                                }

                                .contact-form {
                                    margin-left: 0px;
                                    margin-right: 0px;
                                    overflow: hidden;
                                }

                                .contact-form .form-item input {
                                    width: 100%;
                                    border: 1px solid #b5afaf;
                                    background-color: #ffffff;
                                    height: 35px;
                                }

                                .so_nguoi {
                                    width: 25% !important;
                                }

                                .error_booking {
                                    color: red;
                                    font-size: 12px;
                                    font-weight: normal;
                                    display: none;
                                }

                                textarea {
                                    height: 70px;
                                }

                                .input_table {
                                    width: 100%;
                                }
                            </style>
                            <ul class="steps">
                                <li id="step_tab_1" data-step="1" class="active hidden_tab_step" complete_value="">
                                    <span style="color: #c6699f" class="step"><i class="fa fa-edit"></i></span>
                                    <span class="title">1. Nhập thông tin đơn hàng</span>
                                </li>

                                <li id="step_tab_2" data-step="2" class="hidden_tab_step" complete_value="">
                                    <span class="step "><i class="fa fa-check-square-o"></i></span>
                                    <span class="title">2. Azbooking xác nhận</span>
                                </li>

                                <li id="step_tab_3" data-step="3" class="hidden_tab_step" complete_value="">
                                    <span class="step"><i class="fa fa-cc-visa"></i></span>
                                    <span class="title">3. Thanh toán</span>
                                </li>

                            </ul>
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="background-color: #fff;padding: 10px;margin-bottom: 10px;"
                                         class="product-detail__info">
                                        <div class="product-title"><h2>{name}</h2></div>

                                        <p class="product-email"><i class="fa fa-barcode"></i> <a href="#">Mã tour:
                                                {code}</a></p>
                                        <p class="product-email"><i class="fa fa-clock-o"></i> <a href="#">Thời gian:
                                                {durations}</a></p>
                                        <p class="product-email"><i class="fa fa-dollar"></i> <a
                                                    href="#">Giá: {price_format}</a>
                                        </p>
                                        <p class="product-email"><i class="fa fa-calendar"></i> <a href="#">Ngày khởi
                                                hành:
                                                {departure_time}</a></p>
                                        <p class="product-email"><i class="fa fa-map-marker"></i> <a href="#">Nơi khởi
                                                hành:
                                                {khoihanh}</a></p>
                                        {so_cho}
                                    </div>
                                    <div class="checkout-page__content">
                                        <div style="padding: 10px;" class="yourcart-content">
                                            <div class="content-title"><h2><i class="awe-icon fa fa-dollar"></i>Bảng giá
                                                </h2></div>
                                            <div class="cart-content">
                                                <table class="cart-table">
                                                    <thead>
                                                    <tr>
                                                        <th class="product-name">Loại khách</th>
                                                        <th class="">Đơn giá</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td class=""><span>{name_price}</span></td>
                                                        <td class=""><span style="color: red"
                                                                           class="amount">{price_format}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class=""><span>{name_price_2}</span></td>
                                                        <td class=""><span style="color: red"
                                                                           class="amount">{price_2_format}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class=""><span>{name_price_3}</span></td>
                                                        <td class=""><span style="color: red"
                                                                           class="amount">{price_3_format}</span></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <input hidden type="text" id="input_price" value="{price}" name="price"
                                                       class="valid">
                                                <input hidden type="text" id="input_price_2" value="{price_2}"
                                                       name="price_2" class="valid">
                                                <input hidden type="text" id="input_price_3" value="{price_3}"
                                                       name="price_3" class="valid">
                                                <input hidden type="text" id="input_price_4" value="{price_4}"
                                                       name="price_4" class="valid">
                                                <input hidden type="text" id="input_price_5" value="{price_5}"
                                                       name="price_5" class="valid">
                                                <input hidden type="text" id="input_price_6" value="{price_6}"
                                                       name="price_6" class="valid">
                                                {list_price_nguoi_lon}
                                                {list_price_tre_em_511}
                                                {list_price_tre_em_5}
                                            </div>
                                            <div class="content-title"><h2><i class="awe-icon fa fa-info-circle "></i>Thông
                                                    tin
                                                    liên lạc</h2></div>
                                            <div class="cart-content">
                                                <div class="cart-footer contact-form">
                                                    <div style="width: 100%; float: left;">
                                                        <div class="form-item">
                                                            <label>Họ tên <span style="color: red">*</span></label>
                                                            <input required="" type="text" id="input_name_customer"
                                                                   name="name_customer">
                                                            <label class="error_booking" id="error_name_customer">Bạn
                                                                vui
                                                                lòng kiểm tra họ tên</label>
                                                        </div>
                                                        <div class="form-item">
                                                            <label>Email <span style="color: red">*</span></label>
                                                            <input required="" type="email" id="input_email"
                                                                   name="email">
                                                            <label class="error_booking" id="error_email">Bạn vui lòng
                                                                kiểm
                                                                tra email</label>
                                                        </div>
                                                    </div>
                                                    <div style="width: 100%;float: left;">
                                                        <div class="form-item">
                                                            <label>Điện thoại <span style="color: red">*</span></label>
                                                            <input required="" type="text" id="input_phone"
                                                                   name="phone">
                                                            <label id="error_phone" class="error_booking">Bạn vui lòng
                                                                kiểm
                                                                tra điện thoại</label>
                                                        </div>
                                                        <div class="form-item">
                                                            <label>Địa chỉ <span style="color: red">*</span></label>
                                                            <input required="" type="text" id="input_address"
                                                                   name="address">
                                                            <label id="error_address" class="error_booking">Bạn vui lòng
                                                                kiểm tra địa chỉ</label>
                                                        </div>
                                                    </div>
                                                    <div style="width: 100%;float: left;">
                                                        <div class="form-item so_nguoi">
                                                            <label>{name_price} <span
                                                                        style="color: red">*</span></label>
                                                            <input id_title="1" name_title="{name_price}" required=""
                                                                   value="1" min="1" type="number" class="valid"
                                                                   id="input_num_nguoi_lon" name="num_nguoi_lon">
                                                        </div>
                                                        <div class="form-item so_nguoi">
                                                            <label>{name_price_2} </label>
                                                            <input id_title="2" name_title="{name_price_2}" required=""
                                                                   value="0" min="0" type="number" class="valid"
                                                                   id="input_num_tre_em" name="num_tre_em">
                                                        </div>
                                                        <div class="form-item so_nguoi">
                                                            <label>{name_price_3}</label>
                                                            <input id_title="3" name_title="{name_price_3}" required=""
                                                                   value="0" min="0" type="number" class="valid"
                                                                   id="input_num_tre_em_5" name="num_tre_em_5">
                                                            {so_cho_input}
                                                        </div>

                                                        <div class="form-item so_nguoi">
                                                            <label>Tổng số người</label>
                                                            <input style="background-color: #eee;" disabled required=""
                                                                   value="1" min="1"
                                                                   type="number" placeholder="" name="total_num"
                                                                   class="valid"
                                                                   id="input_total_num">

                                                        </div>
                                                        <label style="padding-left: 10px;" id="error_total_num"
                                                               class="error_booking">Bạn vui lòng kiểm tra số lượng
                                                            người</label>
                                                    </div>
                                                    <div style="width: 100%; float: left;">
                                                       {date_select}
                                                    </div>
                                                    <div class="form-textarea-wrapper" style="width: 100%">
                                                        <label>Ghi chú</label>
                                                    <textarea style="background-color: #ffffff" name="note"
                                                              id="input_note"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="content-title"><h2><i class="awe-icon fa fa-users"></i>Danh sách
                                                    đoàn đi tour</h2></div>
                                            <div class="cart-content">
                                                <div class="cart-footer contact-form">
                                                    <table style="width: 100%" class="table_add_customer">
                                                        <thead>
                                                        <tr>
                                                            <th class="center">#</th>
                                                            <th>Họ tên</th>
                                                            <th>Email</th>
                                                            <th>Điện thoại</th>
                                                            <th>Địa chỉ</th>
                                                            <th>Độ tuổi</th>
                                                            <th>Đơn giá <i class="fa fa-sort-amount-desc "></i></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="show_hide_table">
                                                        <tr class="row_customer_1">
                                                            <td class="center stt_cus">1</td>
                                                            <td>
                                                                <input style="height: 30px" name="name_customer_sub[]"
                                                                       id="input_name_customer_sub_1" type="text"
                                                                       class="valid input_table">
                                                            </td>
                                                            <td>
                                                                <input style="height: 30px" name="email_customer[]"
                                                                       id="input_email_customer_1" type="text"
                                                                       class="valid input_table">
                                                            </td>
                                                            <td>
                                                                <input style="height: 30px" name="phone_customer[]"
                                                                       id="input_phone_customer_1" type="text"
                                                                       class="valid input_table">
                                                            </td>
                                                            <td>
                                                                <input style="height: 30px" name="address_customer[]"
                                                                       id="input_address_customer_1" type="text"
                                                                       class="valid input_table">
                                                            </td>
                                                            <td>
                                                                <input hidden style="height: 30px"
                                                                       name="tuoi_customer[]" value="1"
                                                                       id="input_tuoi_customer_1" type="text"
                                                                       class="valid input_table"><span
                                                                        style="font-size: 12px">{name_price}</span>
                                                            </td>
                                                            <td style="width: 130px">
                                                                <input hidden style="height: 30px"
                                                                       name="tuoi_customer[]" value="1"
                                                                       id="input_tuoi_customer_1" type="text"
                                                                       class="valid input_table"><span
                                                                        style="color: red; font-size: 12px">{price_format} (<i class="fa fa-long-arrow-down"></i>09%)</span>
                                                            </td>
                                                            <!--<td><a id="stt_custommer_1" deleteid="1" title="Xóa khách hàng"
                                                                   class="red btn_remove_customer" href="javascript:void()"><i
                                                                            class="ace-icon fa fa-trash-o bigger-130"></i></a>
                                                            </td>-->
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="cart-footer">
                                                <div class="order-total"><h4 class="title">Tổng tiền</h4><span
                                                            class="amount" id="amount_total">{price_format}</span>
                                                </div>
                                                <div class="content-title"><h2><i
                                                                class="awe-icon fa fa-credit-card "></i>Hình
                                                        thức thanh toán
                                                        </br><label id="error_check_httt"
                                                                               class="error_booking">Bạn vui lòng chọn
                                                            hình thức thanh toán</label></h2>

                                                </div>
                                                <div class="cart-content">
                                                    <div class="cart-footer contact-form">
                                                        <div class="widget widget_has_radio_checkbox">
                                                            <ul>
                                                                {httt}
                                                            </ul>
                                                            <div>
                                                                {httt_content}
                                                            </div>
                                                            <input name="check_httt" id="input_check_httt" value=""
                                                                   hidden>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="content-title" style="margin-top: 20px"><h2><i
                                                                class="awe-icon fa fa-check "></i>Điều khoản bắt buộc khi đăng ký online
                                                        </br>
                                                        <label id="error_check_dieu_khoan"
                                                               class="error_booking">Bạn vui lòng đồng ý với điều khoản và dịch vụ cảu chúng tôi</label>
                                                    </h2></div>
                                                <div class="cart-content">
                                                    <div class="cart-footer contact-form">
                                                        <div class="widget widget_has_radio_checkbox">

                                                            <div class="text"
                                                                 style="height: 150px;width: auto;overflow: scroll;margin-bottom: 20px">
                                                                <p>
                                                                    {content_dk}
                                                                </p>
                                                            </div>
                                                            <ul>
                                                                <li><label>
                                                                        <input type="checkbox" name="dieu_khoan"
                                                                               id="input_dieu_khoan">
                                                                        <i class="awe-icon awe-icon-check"></i>Đồng ý
                                                                        điểu khoản
                                                                        và dịch vụ của chúng tôi</label>
                                                                    <input name="check_dieu_khoan" id="input_check_dieu_khoan" value=""
                                                                           hidden>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cart-footer">
                                                    <div class="cart-submit">
                                                        <img id="loading" style="width: 150px; display: none" src="{SITE-NAME}/view/default/themes/images/loading.gif">
                                                        <input type="button" value="ĐẶT TOUR" id="submit_form_action"
                                                               class="checkout">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>