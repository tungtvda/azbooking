<section class="filter-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
                                <li id="step_tab_1" data-step="1" class=" hidden_tab_step" complete_value="">
                                    <span style="color: #c6699f" class="step"><i class="fa fa-edit"></i></span>
                                    <span class="title">1. Nhập thông tin đơn hàng</span>
                                </li>

                                <li id="step_tab_2" data-step="2" class="active hidden_tab_step" complete_value="">
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
                                        <p class="product-email"><i class="fa fa-thumbs-o-up"></i> <a>Azbooking.vn xin cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi!</a></p>

                                    </div>

                                    <div class="checkout-page__content">
                                        <div style="padding: 10px;" class="yourcart-content">
                                            <div class="content-title"><h2><i class="awe-icon fa fa-plane"></i>Thông tin tour
                                                </h2></div>
                                            <div style="background-color: #fff;padding: 10px;margin-bottom: 10px;"
                                                 class="product-detail__info">
                                                <div class="product-title"><h2>{name}</h2></div>
                                                <style>
                                                    .with_td_left{
                                                        padding-left: 0px;
                                                        width: 200px;
                                                    }
                                                </style>
                                                <table>
                                                    <tr>
                                                        <td class="with_td_left"><i class="fa fa-barcode"></i> Mã tour: </td>
                                                        <td style="font-weight: bold"><a >{code}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="with_td_left"><i class="fa fa-clock-o"></i> Thời gian: </td>
                                                        <td style="font-weight: bold"><a >{durations}</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="with_td_left"><i class="fa fa-calendar"></i> Ngày khởi hành:</td>
                                                        <td style="font-weight: bold"><a >{ngay_khoi_hanh}</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="with_td_left"><i class="fa fa-calendar"></i> Ngày về: </td>
                                                        <td style="font-weight: bold"><a >{ngay_ket_thuc}</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="with_td_left"> <i class="fa fa-map-marker"></i>Nơi khởi hành:</td>
                                                        <td style="font-weight: bold"><a >{khoihanh}</a></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="content-title"><h2><i class="awe-icon fa fa-shopping-cart "></i>Chi tiết đơn hàng
                                                </h2></div>
                                            <div style="background-color: #fff;padding: 10px;margin-bottom: 10px;"
                                                 class="product-detail__info">
                                                <table>
                                                    <tr>
                                                        <td class="with_td_left"><i class="fa fa-barcode"></i> Mã đơn hàng: </td>
                                                        <td style="font-weight: bold"><a >{code_booking}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="with_td_left"><i class="fa fa-dollar"></i> Trị giá đơn hàng: </td>
                                                        <td style="font-weight: bold"><a style="color: red">{total_price}</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="with_td_left"><i class="fa fa-calendar"></i> Ngày đặt tour: </td>
                                                        <td style="font-weight: bold"><a >{ngay_tao}</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="with_td_left"><i class="fa fa-credit-card"></i> Hình thức thanh toán: </td>
                                                        <td style="font-weight: bold"><a >{httt_name}</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="with_td_left"><i class="fa fa-check-square-o "></i> Trạng thái đơn hàng: </td>
                                                        <td style="font-weight: bold"><a >{ttdh_name}</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="with_td_left"><i class="fa fa-calendar"></i> Hạn thanh toán: </td>
                                                        <td style="font-weight: bold"><a >{han_thanh_toan}</a></td>
                                                    </tr>

                                                </table>
                                            </div>
                                            <div class="content-title"><h2><i class="awe-icon fa fa-info-circle"></i>Thông tin liên lạc
                                                </h2></div>
                                            <div style="background-color: #fff;padding: 10px;margin-bottom: 10px;"
                                                 class="product-detail__info">
                                                <table>
                                                    <tr>
                                                        <td class="with_td_left"><i class="fa fa-user"></i> Họ tên: </td>
                                                        <td style="font-weight: bold"><a >{name_cus}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="with_td_left"><i class="fa fa-map-marker"></i> Địa chỉ: </td>
                                                        <td style="font-weight: bold"><a style="color: red">{address_cus}</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="with_td_left"><i class="fa fa-envelope"></i> Email: </td>
                                                        <td style="font-weight: bold"><a >{email_cus}</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="with_td_left"><i class="fa fa-phone"></i> Điện thoại: </td>
                                                        <td style="font-weight: bold"><a >{phone_cus}</a></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="with_td_left"><i class="fa fa-pencil-square-o"></i> Ghi chú: </td>
                                                        <td style="font-weight: bold"><a >{note_cus}</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="with_td_left"><i class="fa fa-pencil-square-o"></i> Tổng số khách: </td>
                                                        <td style="font-weight: bold"><a >{total_cus}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{name_price}: {num_nguoi_lon} - {name_price_2}: {num_tre_em} - {name_price_3}: {num_tre_em_5}</td>
                                                    </tr>

                                                </table>
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
                                                            <th>Ngày sinh</th>
                                                            <th>Email</th>
                                                            <th>Điện thoại</th>
                                                            <th>Địa chỉ</th>
                                                            <th>Độ tuổi</th>
                                                            <th>Số Passport</th>
                                                            <th>Ngày hết hạn</th>
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
                                                                <input style="height: 30px" name="birthday_customer[]"
                                                                       id="input_birthday_customer_sub_1" type="text"
                                                                       class="valid input_table datepicker">
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
                                                                       name="tuoi_customer[]" value="{name_price}" data-date-format="dd/mm/yyyy"
                                                                       id="input_tuoi_customer_1" type="text"
                                                                       class="valid input_table"><span
                                                                        style="font-size: 12px">{name_price}</span>
                                                            </td>
                                                            <td>
                                                                <input  style="height: 30px" name="passport_customer[]"
                                                                       id="input_passport_customer_1" type="text"
                                                                       class="valid input_table">
                                                            </td>

                                                            <td>
                                                                <input style="height: 30px" name="date_passport_customer[]" data-date-format="dd/mm/yyyy"
                                                                       id="input_date_passport_customer_1" type="text"
                                                                       class="valid input_table datepicker">
                                                            </td>
                                                            <td style="width: 130px">
                                                              <span  style="color: red; font-size: 12px">{price_format}</span>
                                                            </td>
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
        </div>
    </div>
</section>