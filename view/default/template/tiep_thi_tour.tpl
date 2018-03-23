


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <!--<div class="card-header" data-background-color="purple">
                                <h4 class="title">{title_table}</h4>
                            </div>-->
                            <div class="card-content table-responsive">
                                <ul  class="nav nav-pills">
                                    <li class="{all}">
                                        <a  href="{SITE-NAME}/tiep-thi-lien-ket/tour" >Danh sách tour</a>
                                    </li>
                                    <li class="{noi_bat}">
                                        <a  href="{SITE-NAME}/tiep-thi-lien-ket/tour?type=1" >Tour nổi bật</a>
                                    </li>
                                    <li class="{giam_gia}">
                                        <a  href="{SITE-NAME}/tiep-thi-lien-ket/tour?type=2" >Tour giảm giá</a>
                                    </li>
                                    <li class="{quoc_te}">
                                        <a  href="{SITE-NAME}/tiep-thi-lien-ket/tour?type=3" >Tour quốc tế</a>
                                    </li>
                                    <li class="{trong_nuoc}">
                                        <a  href="{SITE-NAME}/tiep-thi-lien-ket/tour?type=4" >Tour trong nước</a>
                                    </li>
                                    <li class="active" style="float: right; ">
                                        <a id="create_tour"  data-toggle="modal" data-target="#myModalCreateTour" style="background: green; cursor: pointer;">
                                            <label style="font-size: 16px;color: #ffffff" class="fa fa-plane "></label> Tạo tour theo yêu cầu
                                        </a>
                                    </li>
                                </ul>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th class="hidden-xs">Stt</th>
                                        <th class="hidden-xs">Loại tour</th>
                                        <th class="hidden-xs">Hình ảnh</th>
                                        <th class="hidden-xs">Mã tour</th>
                                        <th>Tên tour</th>
                                        <th>Đơn giá</th>
                                        <th>Hoa hồng</th>
                                        <th>Chia sẻ</th>
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