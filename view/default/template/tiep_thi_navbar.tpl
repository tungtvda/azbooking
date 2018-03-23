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
                <a style="    color: #085394;font-weight: bold;" class="navbar-brand"
                   href="javascript:void(0)">{name_module}</a>
            </div>
            {form_}
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle notification_menu" data-toggle="dropdown">
                            <i class="fa fa-globe"></i>
                            {coutn_mes_noti}
                            <p class="hidden-lg hidden-md">Thông báo</p>
                        </a>
                        <ul class="dropdown-menu" style="padding-top: 0px;">
                            <li class="menu-item menu-item-has-children dropdown-noti submenu hover">
                                <div class="dropdown-content-noti">
                                    <p class="dropdown-header">{count_un_read}</p>
                                    <div {hidden_noti} class="content_ul_li scroll_noti">
                                        <ul style="background:#ffffff" class="sub-menu sub-menu-noti ul_noti">
                                            <!--{list_notifications}-->
                                        </ul>
                                    </div>
                                    <p class="dropdown-footer view_all_notification"
                                       style="margin-bottom: 0px; padding: 10px; text-align: center;"><a
                                                style="color: #0091ea;" class="view_all_noti"
                                                href="{SITE-NAME}/tiep-thi-lien-ket/thong-bao"> Xem tất cả <i
                                                    class="ace-icon fa fa-arrow-right"></i></a></p>
                                </div>
                                <span class="menu-toggle"></span><span class="menu-arr-bottom"></span><span
                                        class="menu-arr-top"></span></li>
                            <!--{list_notification}-->
                        </ul>

                    </li>
                    {user_info}
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
                    <i class="ace-icon fa fa-home home-icon"></i> <a href="{SITE-NAME}/tiep-thi-lien-ket/">
                        Dashboard</a>
                </li>
                {breadcrumb}
            </ul><!-- /.breadcrumb -->
        </div>
    </nav>
