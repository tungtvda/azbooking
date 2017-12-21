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
                                <a href="javascript:void(0)" type="button" data-toggle="modal" data-target="#myModal" style="background: green"><label style="font-size: 16px;color: #ffffff" class="fa fa-user-plus "></label> Tạo thành viên
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
    .modal-backdrop{
        display: none;
    }
</style>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>



