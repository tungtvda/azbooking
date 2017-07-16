
    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Trang chủ </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">notifications</i>
                                <span class="notification">5</span>
                                <p class="hidden-lg hidden-md">Notifications</p>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Mike John responded to your email</a></li>
                                <li><a href="#">You have 5 new tasks</a></li>
                                <li><a href="#">You're now friend with Andrew</a></li>
                                <li><a href="#">Another Notification</a></li>
                                <li><a href="#">Another One</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">person</i>
                                <p class="hidden-lg hidden-md">Profile</p>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-cogs "></i> Cài đặt tài khoản</a></li>
                                <li><a href="#"><i class="fa fa-sign-out "></i> Đăng xuất</a></li>
                            </ul>
                        </li>
                    </ul>

                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group  is-empty">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="material-input"></span>
                        </div>
                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                            <i class="material-icons">search</i>
                            <div class="ripple-container"></div>
                        </button>
                    </form>
                </div>
            </div>
            <div class="breadcrumbs" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="http://localhost/manage_mix">Trang chủ</a>
                    </li>
                    <li><a href="">Trang chủ</a></li><li class="active">List</li>
                </ul><!-- /.breadcrumb -->
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="orange">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            <div class="card-content">
                                <h3 class="title">400</h3>
                            </div>
                            <div class="card-footer">
                                <div style="color: #fb8c00" class="stats">
                                    <a href="" style="color: #fb8c00"> <i class="fa fa-exclamation-triangle"></i> Đơn hàng chờ phê duyệt...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="green">
                                <i class="fa fa-cart-plus"></i>
                            </div>
                            <div class="card-content">
                                <h3 class="title">1000</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <a href="" style="color:#43a047;"><i class="fa fa-check-square-o"></i> Đơn hàng đã giao dịch</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="red">
                                <i class="fa fa-cart-arrow-down "></i>
                            </div>
                            <div class="card-content">
                                <h3 class="title">75</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <a href="" style="color: #e53935"><i class="fa fa-window-close-o "></i> Đơn hàng đã hủy</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="blue">
                                <i class="fa fa-plane"></i>
                            </div>
                            <div class="card-content">
                                <h3 class="title">+245</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <a href="" style="color: #00acc1">  <i class="fa fa-usd "></i> Tour tiếp thị liên kết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header card-chart" data-background-color="green">
                                <div class="ct-chart" id="dailySalesChart"></div>
                            </div>
                            <div class="card-content">

                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <a href=""><h4 class="title"><i class="fa fa-plus-square-o"></i> Tour mới <span class="count_right">42</span></h4></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header card-chart" data-background-color="red">
                                <div class="ct-chart" id="completedTasksChart"></div>
                            </div>
                            <div class="card-content">
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <a href=""> <h4 class="title"><i class="fa fa-arrow-circle-o-down"></i> Tour giảm giá <span class="count_right">42</span></h4></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header card-chart" data-background-color="orange">
                                <div class="ct-chart" id="emailsSubscriptionChart"></div>
                            </div>
                            <div class="card-content">
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <a href=""> <h4 class="title"><i class="fa fa-check-square-o"></i> Tour nổi bật <span class="count_right">42</span></h4></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy;
                    <a href="http://azbooking.vn/">AZBOOKING.VN</a>
                </p>
            </div>
        </footer>
    </div>
</div>

<div hidden class="fixed-plugin">
    <div class="dropdown show-dropdown">
        TIỀN HOA HỒNG
    </div>
</div>

</body>

<!--   Core JS Files   -->
<script src="{SITE-NAME}/view/default/themes/assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
<script src="{SITE-NAME}/view/default/themes/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{SITE-NAME}/view/default/themes/assets/js/material.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="{SITE-NAME}/view/default/themes/assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="{SITE-NAME}/view/default/themes/assets/js/bootstrap-notify.js"></script>

<!-- Material Dashboard javascript methods -->
<script src="{SITE-NAME}/view/default/themes/assets/js/material-dashboard.js"></script>

<!--   Sharrre Library    -->
<script src="{SITE-NAME}/view/default/themes/assets/js/jquery.sharrre.js"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{SITE-NAME}/view/default/themes/assets/js/demo.js"></script>


<!-- Mirrored from demos.creative-tim.com/material-dashboard/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Jul 2017 03:43:31 GMT -->
</html>
