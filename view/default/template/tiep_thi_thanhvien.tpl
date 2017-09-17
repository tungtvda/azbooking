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
<style>
    .lienhe_thanhvien i{
        width: 20px;
        color: #0091ea;
    }
</style>



