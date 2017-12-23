<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!--<div class="card-header" data-background-color="purple">
                        <h4 class="title">{title_table}</h4>
                    </div>-->
                    <!-- Modal -->

                    <div class="card-content table-responsive">
                        <ul  class="nav nav-pills">
                            <li class="{all}">
                                <a  href="{SITE-NAME}/tiep-thi-lien-ket/users" >Tất cả thành viên</a>
                            </li>
                            <li class="{3_sao}">
                                <a  href="{SITE-NAME}/tiep-thi-lien-ket/users?type=0" >Thanh viên 3 sao</a>
                            </li>
                            <li class="{4_sao}">
                                <a  href="{SITE-NAME}/tiep-thi-lien-ket/users?type=1" >Thành viên 4 sao</a>
                            </li>
                            <li class="{5_sao}">
                                <a  href="{SITE-NAME}/tiep-thi-lien-ket/users?type=2" >Thành viên 5 sao</a>
                            </li>
                            <li class="active" style="float: right; ">
                                <a id="create_user"  data-toggle="modal" data-target="#myModal" style="background: green; cursor: pointer;"><label style="font-size: 16px;color: #ffffff" class="fa fa-user-plus "></label> Tạo thành viên
                                </a>
                            </li>
                        </ul>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th >Stt</th>
                                <th >Avatar</th>
                                <th >Họ tên</th>
                                <th >Liên hệ</th>
                                <th >Thứ hạng</th>
                                <th>Tình trạng</th>
                                <th>Ngày tạo</th>
                            </tr>
                            </thead>
                            <tbody id="list-user">
                            {danhsach}
                            </tbody>
                        </table>
                        <div class="col-xs-12" style="text-align: center">
                            {mess_null}
                            <ul class="pagination">
                                {PAGING}
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .lienhe_thanhvien i{
        width: 20px;
        color: #0091ea;
    }
    .modal-backdrop{
        display: none;
    }
</style>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <input type="password" hidden  id="mail_create" name="mail_create" value="{message_dangky}>">
        <input type="password" hidden  id="user_tiep_thi" name="user_tiep_thie" value="{user_tiep_thi}>">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tạo thành viên</h4>
            </div>
            <div class="modal-body">
                <form id="signup-form">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 item_form_create">
                            <div class="form-group">
                                <label>Họ tên <span class="red_color">*</span></label>
                                <input type="text" class="form-control valid-input" name="name" id="input_name" data-valid="required"  placeholder="Tên thành viên...">
                                <small id="error_name" class="hidden_error form-text text-muted red_color">Bạn vui lòng nhập tên thành viên</small>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 item_form_create">
                            <div class="form-group">
                                <label>Email <span class="red_color">*</span></label>
                                <input type="email" class="form-control valid-input" name="email" id="input_email" data-valid="required"  placeholder="Địa chỉ email...">
                                <small id="error_email" class="hidden_error form-text text-muted red_color">Bạn vui lòng nhập email</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 item_form_create">
                            <div class="form-group">
                                <label>Điện thoại <span class="red_color">*</span></label>
                                <input type="text" class="form-control valid-input" name="phone" id="input_phone" data-valid="required" placeholder="Số điện thoại thành viên...">
                                <small id="error_phone" class="hidden_error form-text text-muted red_color">Bạn vui lòng nhập số điện thoại</small>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 item_form_create">
                            <div class="form-group">
                                <label for="">Địa chỉ <span class="red_color">*</span></label>
                                <input type="text" class="form-control valid-input" name="address" id="input_address"  data-valid="required" placeholder="Địa chỉ thành viên...">
                                <small id="error_address" class="hidden_error form-text text-muted red_color">Bạn vui lòng nhập địa chỉ</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <small id="error_submit" class="hidden_error form-text text-muted red_color">Đăng ký thất bạn, bạn vui lòng Ctrl+f5 và thử lại</small>
                        </div>

                    </div>
                </form>

            </div>
            <div class="modal-footer" >
                <button style="background-color: #337ab7;border-color: #2e6da4;" type="button" class="btn btn-info save_dangky" data-value="0">Lưu</button>
                <button style="background-color: #337ab7;border-color: #2e6da4;" type="button" class="btn btn-info save_dangky" data-value="1">Lưu & tạo mới</button>
                <button style="background-color: #337ab7;border-color: #2e6da4;display: none" type="button" class="btn btn-info" id="loading_save">Đang gửi ...</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
            </div>
        </div>

    </div>
</div>



