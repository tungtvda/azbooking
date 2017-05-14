<section class="filter-page">
    <div class="container">
        <div class="row">
            <div>
                <h3 style="color: #0091EA;">
                    {name}
                    <div class="headerright">


                        <div class="dropdown userinfo open">
                            <a class="dropdown-toggle" id="show_log_out" href="javascript:void(0)">Xin
                                chào, {name_admin} <b class="caret"></b></a>
                            <ul class="dropdown-menu menu_hover">
                                <li><a href="{SITE-NAME}/dang-xuat-tour/"><span class="icon-share"></span> Đăng xuất</a>
                                </li>
                            </ul>
                        </div>
                        <!--dropdown-->
                    </div>
                </h3>
                <table class="table table-responsive table-bordered dataTable" id="dyntable"
                       aria-describedby="dyntable_info">
                    <colgroup>
                        <col class="con0" style="align: center; width: 4%">
                        <col class="con1">
                        <col class="con0">
                        <col class="con1">
                        <col class="con0">
                        <col class="con1">
                    </colgroup>
                    <thead>
                    <tr role="row">
                        <th>Loại tour</th>
                        <th>Khu vực</th>
                        <th>Quốc gia- Vùng miền</th>
                        <th>Tên tour</th>
                        <th>Đơn giá</th>
                        <th style="font-weight: bold; color: #0091EA;"
                        "">Số chỗ</th>
                        <th>Ngày khởi hành</th>
                    </tr>
                    </thead>

                    <tbody>
                    {tour_list}
                    </tbody>
                </table>
            </div>
            <script src="{SITE-NAME}/view/default/themes/js/bootstrap-number-input.js"></script>
            <script>
                // Remember set you events before call bootstrapSwitch or they will fire after bootstrapSwitch's events
                $("[name='checkbox2']").change(function () {
                    if (!confirm('Do you wanna cancel me!')) {
                        this.checked = true;
                    }
                });
                $(document).on("click", function(event){
                    var $trigger = $("#show_log_out");
                    var check =event.target.toString();
                    console.log(check);
                    if(check!='javascript:void(0)'){
                        $(".menu_hover").slideUp("fast");

                    }
                });
                $("#show_log_out").click(function () {
                    $('.menu_hover').slideToggle();
                });
                $('#after').bootstrapNumber();
                $('.colorful').bootstrapNumber({
                    upClass: 'success',
                    downClass: 'danger'
                });

                $(".tang").click(function () {
                    var count_id = $(this).attr('countId');
                    var value = $('#so_cho_' + count_id).val();
                    if (value == '') {
                        $('#so_cho_' + count_id).val(1);
                    }
                });
                $(".giam").click(function () {
                    var count_id = $(this).attr('countId');
                    var value = $('#so_cho_' + count_id).val();
                    if (value == '') {
                        $('#so_cho_' + count_id).val(0);
                    }
                });
            </script>
            <style>
                .input-group {
                    width: 50%;
                    float: left;
                }

                .headerright {
                    float: right;
                    padding: 7px 10px 0 0;
                }

                .headerright .dropdown {
                    display: inline-block;
                    margin-left: 7px;
                }

                .notification .dropdown-toggle, .userinfo .dropdown-toggle {
                    display: inline-block;
                    /*background: #0b4073;*/
                    padding: 0px 10px;
                    font-size: 14px;
                    color: #0b4073;
                }

                .userinfo .caret {
                    border-top-color: #ccc;
                    margin-left: 10px;
                }

                .dropdown .caret {
                    margin-top: 21px;
                    margin-left: 2px;
                }

                .caret {
                    display: inline-block;
                    width: 0;
                    height: 0;
                    vertical-align: top;
                    border-top: 4px solid #000;
                    border-right: 4px solid transparent;
                    border-left: 4px solid transparent;
                    content: "";
                }

                .dropdown-menu {
                    left: auto;
                    right: 0;
                }

                .dropdown-menu li > a {
                    padding-left: 15px;
                    display: block;
                    padding: 3px 20px;
                    clear: both;
                    font-weight: normal;
                    line-height: 20px;
                    color: #333;
                    white-space: nowrap;
                }

                .open > .dropdown-menu {
                    display: none;
                }

                .dropdown-toggle:hover .dropdown-menu {
                    display: block !important;
                }
            </style>