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
                                <a  href="{SITE-NAME}/tiep-thi-lien-ket/don-hang" >Danh sách đơn hàng</a>
                            </li>
                            <li class="{dang_giao_dich}">
                                <a  href="{SITE-NAME}/tiep-thi-lien-ket/don-hang?type=1" >Đơn hàng đang giao dịch</a>
                            </li>
                            <li class="{da_giao_dich}">
                                <a  href="{SITE-NAME}/tiep-thi-lien-ket/don-hang?type=2" >Đơn hàng đã giao dịch</a>
                            </li>
                            <li class="{da_huy}">
                                <a  href="{SITE-NAME}/tiep-thi-lien-ket/don-hang?type=3" >Đơn hàng đã hủy</a>
                            </li>
                        </ul>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th >Stt</th>
                                <th >Mã đơn hàng</th>
                                <th >Tên tour</th>
                                <th >Hoa hồng</th>
                                <th >Hình thức hoa hồng</th>
                                <th >Xác nhận</th>
                                <th>Tình trạng</th>
                                <th>Ngày đặt</th>
                                <th>Chi tiết</th>

                            </tr>
                            </thead>
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



