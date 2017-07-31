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
                                <a  href="{SITE-NAME}/tiep-thi-lien-ket/thong-bao" >Danh sách thông báo</a>
                            </li>
                            <li class="{chua_doc}">
                                <a  href="{SITE-NAME}/tiep-thi-lien-ket/thong-bao?type=1" >Thông báo chưa đọc</a>
                            </li>
                            <li class="{da_doc}">
                                <a  href="{SITE-NAME}/tiep-thi-lien-ket/thong-bao?type=2" >Thông báo đã đọc</a>
                            </li>
                        </ul>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th >Stt</th>
                                <th >Tên thông báo</th>
                                <th >Thời gian</th>
                                <th >Trạng thái</th>
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



