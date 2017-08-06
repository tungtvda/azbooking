<link rel='stylesheet' id='dt-main-css' href='{SITE-NAME}/view/default/themes/assets/css/build.css' type='text/css'
      media='all'/>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-profile">

                    <input hidden id="link_avatar" value="{avatar}">
                    <input hidden id="site_name_manage" value="{site_name_manage}">
                    <input hidden id="site_name" value="{site_name}">

                    <div class="content">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Tiền hoa hồng</h4>
                        </div>
                        <p class="card-content">
                            <a rel="tooltip" data-original-title="Tiền hoa hồng bạn đang có" href=""
                               style="background-color: #ffffff; box-shadow: none !important;">
                                <b style=" font-size: 18px;font-weight: bold;; color: #e53935">
                                    <img style="width: 60px"
                                         src="{SITE-NAME}/view/default/themes/assets/img/hoa_hong.png">
                                    {hoa_hong}
                                </b>
                            </a>
                        </p>
                        <form id="form_rut_tien" style="text-align: left">
                            <div class="col-xs-12">
                                <div class="form-group label-floating "><label>Số tiền cần rút <span
                                                class="required_label">*</span> <b><span style="    color: #e53935;font-size: 15px" id="price_format_rut"></span></b></label>
                                    <input placeholder="Số tiền rút tối đa của bạn là {hoa_hong}" style="padding-right: 10px" type="number" class="form-control" name="price" id="input_price"
                                           value="">
                                    <span class="material-input error-color error-color-size" id="error_price">Bạn vui lòng kiểm tra số tiền cần rút</span>
                                </div>
                            </div>
                            <div class="col-xs-12" style="padding-left: 15px;">
                                <div class="form-group"><label>Yêu cầu</label>
                                    <div class="form-group label-floating">
                                    <textarea class="form-control valid" placeholder="Bàn có yêu cầu gì không?"
                                              rows="3" name="yeu_cau"
                                              id="input_yeu_cau"></textarea><span
                                                class="material-input"></span><span class="material-input"></span></div>
                                </div>
                            </div>
                        </form>
                        <button type="button" class="btn btn-primary" id="submit_form_rut_tien">Rút tiền</button>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <!--<div class="card-header" data-background-color="purple">
                        <h4 class="title">Edit Profile</h4>
                        <p class="category">Complete your profile</p>
                    </div>-->
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home"><i
                                        class="blue ace-icon fa fa-inbox bigger-130"></i> Cập nhật hồ sơ</a></li>
                        <li><a data-toggle="tab" href="#menu1">Avatar</a></li>
                        <li><a data-toggle="tab" href="#menu2"><i class="red ace-icon fa fa-key bigger-130"></i> Mật
                                khẩu</a></li>
                    </ul>

                    <div class="tab-content col-xs-12">
                        <div id="home" class="tab-pane fade in active">
                            <div class="card-content">
                                <form id="form_hoso">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-floating ">
                                                <label>Mã thành viên</label>
                                                <input type="text" class="form-control" disabled value="{user_code}">
                                                <span class="material-input"></span></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group label-floating ">
                                                <label>Email</label>
                                                <input type="text" class="form-control" disabled value="{email}">
                                                <span class="material-input"></span></div>
                                        </div>
                                    </div>

                                    <div class="row" id="full_name">
                                        <div class="col-md-6">
                                            <div class="form-group label-floating ">
                                                <label>Họ tên <span class="required_label">*</span></label>
                                                <input type="text" class="form-control {name_valid}" name="full_name"
                                                       id="input_full_name" value="{name}">
                                                <span class="material-input error-color  error-color-size"
                                                      id="error_full_name">Bạn vui lòng nhập họ tên</span></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group label-floating ">
                                                <label>Ngày sinh <span class="required_label">*</span></label>
                                                <input type="text" class="form-control datepicker {date_valid}"
                                                       name="birthday" value="{birthday}"
                                                       id="input_birthday">
                                                <span class="material-input error-color  error-color-size"
                                                      id="error_birthday">Bạn vui lòng nhập ngày tháng năm sinh</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group label-floating ">
                                                <label>Điện thoại <span class="required_label">*</span></label>
                                                <input type="text" class="form-control {phone_valid}" name="user_phone"
                                                       id="input_user_phone" value="{phone}">
                                                <span class="material-input error-color  error-color-size"
                                                      id="error_user_phone">Bạn vui lòng nhập số điện thoại</span></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating ">
                                                <label>Di động</label>
                                                <input type="text" class="form-control valid" name="mobi"
                                                       id="input_mobi"
                                                       value="{mobi}">
                                                <span class="material-input"></span></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating ">
                                                <label>Giới tính </label>
                                                <select class="form-control valid" name="gender" id="input_gender">
                                                    {gender}
                                                </select>
                                                <span class="material-input"></span></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group label-floating ">
                                                <label>Skype</label>
                                                <input type="text" class="form-control valid" name="skype"
                                                       id="input_skype" value="{skype}">
                                                <span class="material-input error-color  error-color-size"></span></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating ">
                                                <label>Facebook</label>
                                                <input type="text" class="form-control valid" name="facebook"
                                                       id="input_facebook" value="{facebook}">
                                                <span class="material-input"></span></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating ">
                                                <label>Địa chỉ <span class="required_label">*</span></label>
                                                <input type="text" class="form-control {address_valid}"
                                                       name="address_user"
                                                       id="input_address_user" value="{address}">
                                                <span class="material-input error-color  error-color-size"
                                                      id="error_address_user">Bạn vui lòng nhập địa chỉ</span></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group label-floating ">
                                                <label>CMTND</label>
                                                <input type="text" class="form-control valid " name="cmnd"
                                                       id="input_cmnd" value="{cmnd}">
                                                <span class="material-input error-color  error-color-size"></span></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating ">
                                                <label>Ngày cấp CMTND</label>
                                                <input type="text" class="form-control valid datepicker"
                                                       name="date_range_cmnd" id="input_date_range_cmnd"
                                                       value="{date_range_cmnd}">
                                                <span class="material-input"></span></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating ">
                                                <label>Nơi cấp</label>
                                                <input type="text" class="form-control valid" name="issued_by_cmnd"
                                                       id="input_issued_by_cmnd" value="{issued_by_cmnd}">
                                                <span class="material-input"></span></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group label-floating ">
                                                <label>Số tài khoản</label>
                                                <input type="text" class="form-control valid" name="account_number_bank"
                                                       id="input_account_number_bank" value="{account_number_bank}">
                                                <span class="material-input error-color  error-color-size"></span></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating ">
                                                <label>Ngân hàng</label>
                                                <input type="text" class="form-control valid" name="bank"
                                                       id="input_bank" value="{bank}">
                                                <span class="material-input"></span></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating ">
                                                <label>Chi nhánh</label>
                                                <input type="text" class="form-control valid" name="open_bank"
                                                       id="input_open_bank" value="{open_bank}">
                                                <span class="material-input"></span></div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Mô tả bản thân</label>
                                                <div class="form-group label-floating ">
                                                    <textarea class="form-control valid" rows="5" name="note"
                                                              id="input_note"></textarea>
                                                    <span class="material-input"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <span hidden class="required_label" id="error_submit_hoso"></span>
                                    <button type="button" class="btn btn-primary pull-right" id="submit_form_hoso">Cập
                                        nhật
                                    </button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <div class="" style="float: left;width: 100%; padding-bottom: 20px">
                                <div class="col-md-2 com-sm-2 col-xs-12 hidden-xs"></div>
                                <div class="col-xs-12 col-md-8 col-sm-8">
                                    <h3>Thay đổi ảnh đại diện</h3>
                                    <form id="form_avatar" enctype="multipart/form-data">
                                        {div_noti}
                                        <div class="input-group">
                                        <span class="input-group-btn" style="padding-left: 0px; padding-right: 0px;">
                                            <span class="btn btn-default btn-file" style="background-color: #0091ea">
                                                Browse… <input accept=".jepg,.png,.svg,.gif,.jpg,.PNG,.JPG,.JEPG"
                                                               type="file" name="avatar" style="padding-right: 100px"
                                                               id="imgInp">
                                            </span>
                                        </span>

                                            <input style="background-color: #eee;background-image: inherit; height: 37px;padding-left: 10px"
                                                   type="text" class="form-control" readonly>
                                        </div>
                                        <button style="position: absolute; right: 14px;top: 58px; z-index: 111;"
                                                type="button" class="btn btn-primary" id="submit_form_avatar">Cập
                                            nhật
                                        </button>
                                        <img id='img-upload' class="img_border" src="{avatar}" title="">
                                    </form>
                                </div>
                                <div class="col-md-2 com-sm-2 col-xs-12 hidden-xs"></div>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h3>Đổi mật khẩu</h3>
                                <form id="submit_chang_pass">
                                    <div class="form-group label-floating "><label>Mật khẩu hiện tại <span
                                                    class="required_label">*</span></label>
                                        <input name="password_old" type="password" id="input_password_old"
                                               class="form-control" required="">
                                         <span class="material-input error-color  error-color-size"
                                               id="error_password_old">Bạn vui lòng kiểm tra mật khẩu cũ</span></div>
                                    <div style="margin-top: 20px" class="form-group label-floating "><label>Mật khẩu mới <span
                                                    class="required_label">*</span></label>
                                        <input name="password" type="password" id="input_password"
                                               class="form-control" required="">
                                         <span class="material-input error-color  error-color-size"
                                               id="error_password">Bạn vui lòng kiểm tra mật khẩu mới</span></div>
                                    <div style="margin-top: 20px" class="form-group label-floating "><label>Mật khẩu mới <span
                                                    class="required_label">*</span></label>
                                        <input name="password_confirm" type="password"
                                               id="input_password_confirm" class="form-control" required="">
                                         <span class="material-input error-color  error-color-size"
                                               id="error_password_confirm">Bạn vui lòng xác nhận mật khẩu mới</span>
                                    </div>
                                    <button type="button" class="btn btn-primary pull-right" id="submit_form_password">
                                        Cập
                                        nhật
                                    </button>
                                </form>

                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h3>Xác minh 2 bước</h3>
                                <div class="checkbox checkbox-primary">
                                    <input id="xacminh_2b" class="xac_minh_2_buoc" type="checkbox" {login_two_steps}>
                                    <label for="xacminh_2b" class="">
                                        Kích hoạt chức năng đăng nhập 2 bước
                                    </label>
                                </div>
                                <div class="well">
                                    <p><label>Mỗi khi bạn đăng nhập vào Tài khoản AZBOOKING.VN của mình, bạn sẽ cần mật
                                            khẩu và mã xác minh.</label></p>
                                    <div class="space-8"></div>
                                    <div class="media search-media">
                                        <div class="media-left">
                                            <a>
                                                <img class="media-object" data-src="holder.js/72x72" alt=""
                                                     src="{SITE-NAME}/view/default/themes/assets/img/email-security.png"
                                                     data-holder-rendered="true" style="width: 70px; ">
                                            </a>
                                        </div>

                                        <div class="media-body">
                                            <div>
                                                <h4 class="media-heading">
                                                    <a class="blue">Thêm lớp bảo mật bổ xung</a>
                                                </h4>
                                            </div>
                                            <p><label>Nhập mật khẩu và mã xác minh duy nhất được gửi đến email đăng ký
                                                    của bạn.</label></p>
                                        </div>
                                    </div>
                                    <div class="space-6"></div>
                                    <div class="media search-media">
                                        <div class="media-left">
                                            <a>
                                                <img class="media-object" data-src="holder.js/72x72" alt=""
                                                     src="{SITE-NAME}/view/default/themes/assets/img/hacker.png"
                                                     style="width: 70px; ">
                                            </a>
                                        </div>

                                        <div class="media-body">
                                            <div>
                                                <h4 class="media-heading">
                                                    <a class="red">Tránh những kẻ xấu ra</a>
                                                </h4>
                                            </div>
                                            <p><label>Kể cả nếu ai đó lấy được mật khẩu của bạn thì cũng sẽ không đủ để
                                                    đăng nhập vào tài khoản của bạn.</label></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

