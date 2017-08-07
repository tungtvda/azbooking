<link rel='stylesheet' id='dt-main-css' href='{SITE-NAME}/view/default/themes/assets/css/build.css' type='text/css'
      media='all'/>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-profile" style="margin-top: 25px;">

                    <input hidden id="link_avatar" value="{avatar}">
                    <input hidden id="site_name_manage" value="{site_name_manage}">
                    <input hidden id="site_name" value="{site_name}">

                    <div class="content">
                        <div class="card-header" style="margin-top: 15px;" data-background-color="purple">
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
                    <div class="card-content table-responsive">
                        <ul  class="nav nav-pills">
                            <li class="{all}">
                                <a  href="{SITE-NAME}/tiep-thi-lien-ket/rut-tien/" >Tất cả yêu cầu</a>
                            </li>
                            <li class="{xac_nhan}">
                                <a  href="{SITE-NAME}/tiep-thi-lien-ket/rut-tien/?type=1" >Yêu cầu đã xác nhận</a>
                            </li>
                            <li class="{cho_xac_nhan}">
                                <a  href="{SITE-NAME}/tiep-thi-lien-ket/rut-tien/?type=2" >Yêu cầu đang chờ</a>
                            </li>
                        </ul>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Số tiền</th>
                                <th>Số tiền xác nhận</th>
                                <th>Trạng thái</th>
                                <th>Ngày gửi</th>
                                <th>Ngày xác nhận</th>
                                <th>Yêu cầu</th>
                                <th>Xác nhận</th>
                            </tr></thead>
                            <tbody>
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

