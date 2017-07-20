<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">{title_table}</h4>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th >Stt</th>
                                <th >Mã đơn hàng</th>
                                <th >Tên tour</th>
                                <th >Hoa hồng</th>
                                <th>Tình trạng đơn hàng</th>
                                <th>Ngày đặt</th>
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



