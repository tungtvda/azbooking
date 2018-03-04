


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
                                        <a  href="{SITE-NAME}/tiep-thi-lien-ket/tour-yeu-cau" >Danh sách tour</a>
                                    </li>
                                    <li class="{type_0}">
                                        <a  href="{SITE-NAME}/tiep-thi-lien-ket/tour-yeu-cau?type=0" >Đang đợi xác nhận</a>
                                    </li>
                                    <li class="{type_1}">
                                        <a  href="{SITE-NAME}/tiep-thi-lien-ket/tour-yeu-cau?type=1" >Đã xác nhận</a>
                                    </li>
                                    <li class="{type_2}">
                                        <a  href="{SITE-NAME}/tiep-thi-lien-ket/tour-yeu-cau?type=2" >Đã hủy</a>
                                    </li>
                                    <li class="active" style="float: right; ">
                                        <a id="create_tour"  data-toggle="modal" data-target="#myModal" style="background: green; cursor: pointer;">
                                            <label style="font-size: 16px;color: #ffffff" class="fa fa-plane "></label> Tạo tour theo yêu cầu
                                        </a>
                                    </li>
                                </ul>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th class="hidden-xs">Stt</th>
                                        <th>Thông tin tour</th>
                                        <th>Thông tin khách hàng</th>
                                        <th>Ngày tạo</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr></thead>
                                    <tbody id="list-tour-user">
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