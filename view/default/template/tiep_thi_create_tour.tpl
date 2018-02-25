
        <style>
            .modal-backdrop{
                display: none;
            }
            legend{
                width: inherit !important;
                color: #337ab7;
                margin-bottom: 0px;
                font-size: 15px;
                font-weight: bold;
            }
        </style>
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog" style="    margin-top: 20px;">
                <input type="password" hidden  id="user_tiep_thi" name="user_tiep_thi" value="{user_tiep_thi}>">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tạo tour theo yêu cầu</h4>
                    </div>
                    <div class="modal-body">
                        <form id="create-tour-form">
                            <fieldset style="margin-bottom: 20px">
                                <legend><i class="fa fa-user"></i> Thông tin khách hàng</legend>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6 item_form_create">
                                        <div class="form-group">
                                            <label>Họ tên <span class="red_color">*</span></label>
                                            <input type="text" class="form-control valid-input" name="name" id="input_name" data-valid="required"  placeholder="Tên khách hàng...">
                                            <small id="error_name" class="hidden_error form-text text-muted red_color">Bạn vui lòng nhập tên khách hàng</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6 item_form_create">
                                        <div class="form-group">
                                            <label>Email <span class="red_color">*</span></label>
                                            <input type="email" class="form-control valid-input" name="email" data-check-unique="0" id="input_email" data-valid="required"  placeholder="Địa chỉ email khách hàng...">
                                            <small id="error_email" class="hidden_error form-text text-muted red_color">Bạn vui lòng nhập email khách hàng</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6 item_form_create" style="margin-bottom: 0px">
                                        <div class="form-group">
                                            <label>Điện thoại <span class="red_color">*</span></label>
                                            <input type="text" class="form-control valid-input" name="phone" id="input_phone" data-valid="required" placeholder="Số điện thoại khách hàng...">
                                            <small id="error_phone" class="hidden_error form-text text-muted red_color">Bạn vui lòng nhập số điện thoại khách hàng</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6 item_form_create" style="margin-bottom: 0px">
                                        <div class="form-group">
                                            <label for="">Địa chỉ </label>
                                            <input type="text" class="form-control valid" name="address" id="input_address"  data-valid="required" placeholder="Địa chỉ khách hàng...">
                                            <!--<small id="error_address" class="hidden_error form-text text-muted red_color">Bạn vui lòng nhập địa chỉ</small>-->
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend><i class="fa fa-plane"></i> Thông tin tour</legend>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6 item_form_create">
                                        <div class="form-group">
                                            <label>Tên tour - điểm đến <span class="red_color">*</span></label>
                                            <input type="text" class="form-control valid-input" name="name_tour" id="input_name_tour" data-valid="required"  placeholder="Tên tour, điểm đến...">
                                            <small id="error_name_tour" class="hidden_error form-text text-muted red_color">Bạn vui lòng nhập tên tour</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6 item_form_create">
                                        <div class="form-group">
                                            <label>Thời gian <span class="red_color">*</span> <span style="font-size: 12px;">(VD: 3 ngày 2 đêm )</span></label>
                                            <input type="text" class="form-control valid-input" name="time_tour" id="input_time_tour" data-valid="required" placeholder="Thời gian 3 ngày 2 đêm...">
                                            <small id="error_time_tour" class="hidden_error form-text text-muted red_color">Bạn vui lòng nhập thời gian</small>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6 item_form_create">
                                        <div class="form-group">
                                            <label>Ngày khởi hành dự kiến <span class="red_color">*</span></label>
                                            <input type="text" class="form-control valid-input datepicker_tour" name="khoi_hanh_date" id="input_khoi_hanh_date" data-valid="required"  placeholder="Ngày khởi hành...">
                                            <small id="error_khoi_hanh_date" class="hidden_error form-text text-muted red_color">Bạn vui lòng nhập nhập ngày khởi hành</small>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6 item_form_create">
                                        <div class="form-group">
                                            <label for="">Điểm khởi hành <span class="red_color">*</span></label>
                                            <input type="text" class="form-control valid-input" name="khoi_hanh_address" id="input_khoi_hanh_address"  data-valid="required" placeholder="Điểm khởi hành...">
                                            <small id="error_khoi_hanh_address" class="hidden_error form-text text-muted red_color">Bạn vui lòng nhập điểm khởi hành</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 item_form_create" style="margin-bottom: 0px">
                                        <div class="form-group">
                                            <label for="">Chương trình + phương tiện + khách sạn + ghi chú khác</label>
                                            <div class="form-group label-floating ">
                                                    <textarea placeholder="Thông tin chi tiết chương trình tour, phương tiện, khách sạn, ghi chú khác..." class="form-control valid" rows="2" name="note"
                                                              id="input_note"></textarea>
                                                <span class="material-input"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <small id="error_submit" class="hidden_error form-text text-muted red_color">Tạo tour thất bại, bạn vui lòng Ctrl+f5 và thử lại</small>
                                    </div>
                                </div>
                            </fieldset>

                        </form>

                    </div>
                    <div class="modal-footer" >
                        <button style="background-color: #337ab7;border-color: #2e6da4;" type="button" class="btn btn-info save_create_tour" data-value="0">Lưu</button>
                        <button style="background-color: #337ab7;border-color: #2e6da4;" type="button" class="btn btn-info save_create_tour" data-value="1">Lưu & tạo mới</button>
                        <button style="background-color: #337ab7;border-color: #2e6da4;display: none" type="button" class="btn btn-info" id="loading_save">Đang gửi ...</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    </div>
                </div>

            </div>
        </div>