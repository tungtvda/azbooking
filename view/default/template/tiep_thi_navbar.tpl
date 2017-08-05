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
                <a style="    color: #085394;font-weight: bold;" class="navbar-brand" href="javascript:void(0)">{name_module}</a>
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
                        <div class="content_ul_li scroll_noti " >
                            <ul class="dropdown-menu">
                                {list_notification}
                            </ul>
                        </div>

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
                    <i class="ace-icon fa fa-home home-icon"></i> <a href="{SITE-NAME}/tiep-thi-lien-ket/"> Dashboard</a>
                </li>
                {breadcrumb}
            </ul><!-- /.breadcrumb -->
        </div>
    </nav>
