<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-profile">
                    <!--<div class="card-avatar">
                        <img title="{name}" alt="{name}" class="img" src="{avatar}">
                    </div>-->
                    <input hidden id="link_avatar" value="{avatar}">
                        <span class="profile-picture">
													<img id="show_avatar"
                                                         title="{name}" alt="{name}" src="{avatar}">
												</span>
                    <div class="content">
                        <!--<h6 class="category text-gray">CEO / Co-Founder</h6>-->
                        <h4 class="card-title name_profile">{name} - <span style="color: red">{user_code}</span></h4>
                        <div class="col-xs-12" style="text-align: left">
                            <table class="table table-responsive">
                                <tr>
                                    <td>Email</td>
                                    <td>{email}</td>
                                </tr>
                                <tr>
                                    <td>Điện thoại</td>
                                    <td>{phone}</td>
                                </tr>
                                <tr>
                                    <td>Di động</td>
                                    <td>{mobi}</td>
                                </tr>
                                <tr>
                                    <td>Số tài khoản</td>
                                    <td>{account_number_bank}</td>
                                </tr>
                                <tr>
                                    <td>Ngân hàng</td>
                                    <td>{bank}</td>
                                </tr>
                                <tr>
                                    <td>Chi nhánh</td>
                                    <td>{open_bank}</td>
                                </tr>
                            </table>
                        </div>

                        <p class="card-content">
                            <a rel="tooltip" data-original-title="Tiền hoa hồng bạn đang có" href=""
                               style="background-color: #ffffff; box-shadow: none !important;">
                                <b style=" font-size: 18px;font-weight: bold;; color: #e53935">
                                    <h3>Tiền hoa hồng</h3>
                                    <img style="width: 60px"
                                         src="{SITE-NAME}/view/default/themes/assets/img/hoa_hong.png">
                                    {hoa_hong}
                                </b>
                            </a>
                        </p>
                        <a href="#pablo" class="btn btn-primary btn-round">Rút tiền</a>
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
                                            <div class="form-group label-floating is-empty">
                                                <label>Mã thành viên</label>
                                                <input type="text" class="form-control" disabled value="{user_code}">
                                                <span class="material-input"></span></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group label-floating is-empty">
                                                <label>Email</label>
                                                <input type="text" class="form-control" disabled value="{email}">
                                                <span class="material-input"></span></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-floating is-empty">
                                                <label>Họ tên <span class="required_label">*</span></label>
                                                <input type="text" class="form-control" name="full_name"
                                                       id="input_full_name" value="{name}">
                                                <span class="material-input error-color  error-color-size"
                                                      id="error_full_name">Bạn vui lòng nhập họ tên</span></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group label-floating is-empty">
                                                <label>Ngày sinh <span class="required_label">*</span></label>
                                                <input type="text" class="form-control datepicker" name="birthday"
                                                       id="input_birthday">
                                                <span class="material-input error-color  error-color-size"
                                                      id="error_birthday">Bạn vui lòng nhập ngày tháng năm sinh</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group label-floating is-empty">
                                                <label>Điện thoại <span class="required_label">*</span></label>
                                                <input type="text" class="form-control" name="user_phone"
                                                       id="input_user_phone" value="{phone}">
                                                <span class="material-input error-color  error-color-size"
                                                      id="error_user_phone">Bạn vui lòng nhập số điện thoại</span></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating is-empty">
                                                <label>Di động</label>
                                                <input type="text" class="form-control" name="mobi" id="input_mobi"
                                                       value="{mobi}">
                                                <span class="material-input"></span></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating is-empty">
                                                <label>Giới tính </label>
                                                <select class="form-control" name="gender" id="input_gender">
                                                    {gender}
                                                </select>
                                                <span class="material-input"></span></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group label-floating is-empty">
                                                <label>Skype</label>
                                                <input type="text" class="form-control valid" name="skype"
                                                       id="input_skype" value="{skype}">
                                                <span class="material-input error-color  error-color-size"></span></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating is-empty">
                                                <label>Facebook</label>
                                                <input type="text" class="form-control valid" name="facebook"
                                                       id="input_facebook" value="{facebook}">
                                                <span class="material-input"></span></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating is-empty">
                                                <label>Địa chỉ <span class="required_label">*</span></label>
                                                <input type="text" class="form-control" name="address_user"
                                                       id="input_address_user" value="{address}">
                                                <span class="material-input error-color  error-color-size"
                                                      id="error_address_user">Bạn vui lòng nhập địa chỉ</span></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group label-floating is-empty">
                                                <label>CMTND</label>
                                                <input type="text" class="form-control valid " name="cmnd"
                                                       id="input_cmnd" value="{cmnd}">
                                                <span class="material-input error-color  error-color-size"></span></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating is-empty">
                                                <label>Ngày cấp CMTND</label>
                                                <input type="text" class="form-control valid datepicker"
                                                       name="date_range_cmnd" id="input_date_range_cmnd"
                                                       value="{date_range_cmnd}">
                                                <span class="material-input"></span></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating is-empty">
                                                <label>Nơi cấp</label>
                                                <input type="text" class="form-control valid" name="issued_by_cmnd"
                                                       id="input_issued_by_cmnd" value="{issued_by_cmnd}">
                                                <span class="material-input"></span></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group label-floating is-empty">
                                                <label>Số tài khoản</label>
                                                <input type="text" class="form-control valid" name="account_number_bank"
                                                       id="input_account_number_bank" value="{account_number_bank}">
                                                <span class="material-input error-color  error-color-size"></span></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating is-empty">
                                                <label>Ngân hàng</label>
                                                <input type="text" class="form-control valid" name="bank"
                                                       id="input_bank" value="{bank}">
                                                <span class="material-input"></span></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating is-empty">
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
                                                <div class="form-group label-floating is-empty">
                                                    <textarea class="form-control valid" rows="5" name="note"
                                                              id="input_note"></textarea>
                                                    <span class="material-input"></span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary pull-right">Cập nhật</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <div class="" style="float: left;width: 100%; padding-bottom: 20px">
                                <div class="col-md-3 com-sm-3 col-xs-12 hidden-xs"></div>
                                <div class="col-xs-12 col-md-6 col-sm-6">
                                    <h3>Thay đổi ảnh đại diện</h3>
                                    <form id="form_avatar">
                                        <div class="input-group">
                                        <span class="input-group-btn" style="padding-left: 0px; padding-right: 0px;">
                                            <span class="btn btn-default btn-file" style="background-color: #0091ea">
                                                Browse… <input accept=".jepg,.png,.svg,.gif,.jpg,.PNG,.JPG,.JEPG"
                                                               type="file" name="avatar"
                                                               id="imgInp">
                                            </span>
                                        </span>
                                            <input style="background-color: #eee;background-image: inherit; height: 37px;padding-left: 10px"
                                                   type="text" class="form-control" readonly>
                                        </div>
                                        <img id='img-upload' class="img_border" src="{avatar}" title="">
                                    </form>
                                </div>
                                <div class="col-md-3 com-sm-3 col-xs-12 hidden-xs"></div>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h3>Đổi mật khẩu</h3>
                                <div class="form-group label-floating is-empty"><label>Mật khẩu hiện tại <span
                                                class="required_label">*</span></label>
                                    <input name="password_old" type="password" id="input_password_old"
                                           class="form-control" required="">
                                         <span class="material-input error-color  error-color-size"
                                               id="error_password_old">Mật khẩu không đúng</span></div>
                                <div class="form-group label-floating is-empty"><label>Mật khẩu mới <span
                                                class="required_label">*</span></label>
                                    <input name="password_old" type="password" id="input_password_old"
                                           class="form-control" required="">
                                         <span class="material-input error-color  error-color-size"
                                               id="error_password_old">Mật khẩu không đúng</span></div>
                                <div class="form-group label-floating is-empty"><label>Mật khẩu mới <span
                                                class="required_label">*</span></label>
                                    <input name="password_old" type="password" id="input_password_old"
                                           class="form-control" required="">
                                         <span class="material-input error-color  error-color-size"
                                               id="error_password_old">Mật khẩu không đúng</span></div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h3>Xác minh 2 bước</h3>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem aperiam.</p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

