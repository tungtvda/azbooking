<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-profile">
                    <!--<div class="card-avatar">
                        <img title="{name}" alt="{name}" class="img" src="{avatar}">
                    </div>-->
                        <span class="profile-picture">
													<img class="editable img-responsive editable-click editable-empty" title="{name}" alt="{name}" class="img" src="{avatar}">
												</span>
                    <div class="content">
                        <!--<h6 class="category text-gray">CEO / Co-Founder</h6>-->
                        <h4 class="card-title">{name}</h4>
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
                            <img style="width: 60px" src="{SITE-NAME}/view/default/themes/assets/img/hoa_hong.png">
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
                        <li class="active"><a data-toggle="tab" href="#home"><i class="blue ace-icon fa fa-inbox bigger-130"></i> Cập nhật hồ sơ</a></li>
                        <li><a data-toggle="tab" href="#menu1">Avatar</a></li>
                        <li><a data-toggle="tab" href="#menu2"><i class="red ace-icon fa fa-key bigger-130"></i> Mật khẩu</a></li>
                    </ul>

                    <div class="tab-content col-xs-12">
                        <div id="home" class="tab-pane fade in active">
                            <div class="card-content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-floating is-empty">
                                                <label>Mã nhân viên</label>
                                                <input type="text" class="form-control" disabled  value="{user_code}">
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
                                                <input type="text" class="form-control" name="full_name" id="input_full_name" value="{name}">
                                                <span class="material-input error-color  error-color-size" id="error_full_name">Bạn vui lòng nhập họ tên</span></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group label-floating is-empty">
                                                <label>Ngày sinh <span class="required_label">*</span></label>
                                                <input type="text" class="form-control datepicker" name="birthday" id="input_birthday">
                                                <span class="material-input error-color  error-color-size" id="error_birthday">Bạn vui lòng nhập ngày tháng năm sinh</span></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group label-floating is-empty">
                                                <label >Điện thoại <span class="required_label">*</span></label>
                                                <input type="text" class="form-control" name="user_phone" id="input_user_phone" value="{phone}">
                                                <span class="material-input error-color  error-color-size" id="error_user_phone">Bạn vui lòng nhập số điện thoại</span></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating is-empty">
                                                <label>Di động</label>
                                                <input type="text" class="form-control" name="mobi" id="input_mobi" value="{mobi}">
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
                                        <div class="col-md-12">
                                            <div class="form-group label-floating is-empty">
                                                <label >Địa chỉ <span class="required_label">*</span></label>
                                                <input type="text" class="form-control" name="address_user" id="input_address_user" value="{address}">
                                                <span class="material-input error-color  error-color-size" id="error_address_user">Bạn vui lòng nhập địa chỉ</span></div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"> Lamborghini Mercy, Your chick she so thirsty,
                                                        I'm in that two seat Lambo.</label>
                                                    <textarea class="form-control" rows="5"></textarea>
                                                    <span class="material-input"></span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <h3>Menu 1</h3>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <h3>Menu 2</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                        </div>
                        <div id="menu3" class="tab-pane fade">
                            <h3>Menu 3</h3>
                            <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

