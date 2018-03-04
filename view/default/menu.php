<?php
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/locdautiengviet.php';

function view_menu($data = array())
{
    $asign = array();
    $asign['email']=$data['config'][0]->Email;
    $asign['Logo']=$data['config'][0]->Logo;
    $asign['Name']=$data['config'][0]->Name;
    $asign['Hotline']=$data['config'][0]->Hotline;

    $asign['trangchu']=$data['menu'][0]->name;
    $asign['tour']=$data['menu'][1]->name;
    $asign['khachsan']=$data['menu'][2]->name;
    $asign['tintuc']=$data['menu'][3]->name;
    $asign['lienhe']=$data['menu'][4]->name;


    // active menu
    $asign['trangchu_mn'] = ($data['active'] == 'trangchu') ? 'current-menu-parent' : '';
    $asign['tour_trong_nuoc_mn'] = ($data['active'] == 'tour_trong_nuoc') ? 'current-menu-parent' : '';
    $asign['tour_nuoc_ngoai_mn'] = ($data['active'] == 'tour_nuoc_ngoai') ? 'current-menu-parent' : '';
    $asign['tour_chu_de_mn'] = ($data['active'] == 'tour_chu_de') ? 'current-menu-parent' : '';
//    $asign['tour_mn'] = ($data['active'] == 'tour') ? 'current-menu-parent' : '';
    $asign['khachsan_mn'] = ($data['active'] == 'khachsan') ? 'current-menu-parent' : '';
    $asign['tintuc_mn'] = ($data['active'] == 'tintuc') ? 'current-menu-parent' : '';
    $asign['lienhe_mn'] = ($data['active'] == 'lienhe') ? 'current-menu-parent' : '';

    $asign['danhmuc_menu'] ='';
    if(count($data['danhmuc_menu'])>0){
        $asign['danhmuc_menu'] .='<ul class="sub-menu">';
        foreach($data['danhmuc_menu'] as $row){
            $link_dm1=link_dm_tour1($row);
            $asign['danhmuc_menu'] .='<li class="menu-item-has-children"><a href="'.$link_dm1.'">'.$row->name.'</a>';
            $data_danhmuc2=danhmuc_2_getByTop('','id!=1 and danhmuc1_id='.$row->id,'position asc');
            if(count($data_danhmuc2)>0){
                $asign['danhmuc_menu'] .='<ul class="sub-menu">';
                foreach($data_danhmuc2 as $row2){
                    $link_dm2=link_dm_tour2($row2,$row->name_url);
                    $asign['danhmuc_menu'] .='<li><a href="'.$link_dm2.'">'.$row2->name.'</a></li>';
                }
                $asign['danhmuc_menu'] .='</ul>';
            }
            $asign['danhmuc_menu'] .='</li>';
        }
        $asign['danhmuc_menu'] .='</ul>';
    }
    $asign['danhmuc_chude'] ='';
    if(count($data['danhmuc_chude'])>0){
        $asign['danhmuc_chude'] .='<ul class="sub-menu">';
        foreach($data['danhmuc_chude'] as $row){
            $link_dm1=link_dm_chude($row);
            $asign['danhmuc_chude'] .='<li class="menu-item-has-children"><a href="'.$link_dm1.'">'.$row->name.'</a>';
            $asign['danhmuc_chude'] .='</li>';
        }
        $asign['danhmuc_chude'] .='</ul>';
    }

    $asign['danhmuc_menu_quocte'] ='';
    if(count($data['danhmuc_menu_quocte'])>0){
        $asign['danhmuc_menu_quocte'] .='<ul class="sub-menu">';
        foreach($data['danhmuc_menu_quocte'] as $row){
            $link_dm1=link_dm_tour1($row);
            $asign['danhmuc_menu_quocte'] .='<li class="menu-item-has-children"><a href="'.$link_dm1.'">'.$row->name.'</a>';
            $data_danhmuc2=danhmuc_2_getByTop('','id!=1 and danhmuc1_id='.$row->id,'position asc');
            if(count($data_danhmuc2)>0){
                $asign['danhmuc_menu_quocte'] .='<ul class="sub-menu">';
                foreach($data_danhmuc2 as $row2){
                    $link_dm2=link_dm_tour2($row2,$row->name_url,1);
                    $asign['danhmuc_menu_quocte'] .='<li><a href="'.$link_dm2.'">'.$row2->name.'</a></li>';
                }
                $asign['danhmuc_menu_quocte'] .='</ul>';
            }
            $asign['danhmuc_menu_quocte'] .='</li>';
        }
        $asign['danhmuc_menu_quocte'] .='</ul>';
    }

    $asign['danhmuc_khachsan'] ='';
    if(count($data['danhmuc_khachsan'])>0)
    {
//        $asign['danhmuc_khachsan'] = print_item('menu_item', $data['danhmuc_khachsan']);
        $asign['danhmuc_khachsan'] .='<ul class="sub-menu">';
        foreach($data['danhmuc_khachsan'] as $row){
            $link_dm1=link_danhmuc_khachsan($row);
            $asign['danhmuc_khachsan'] .='<li class="menu-item-has-children"><a href="'.$link_dm1.'">'.$row->name.'</a>';
            $data_danhmuc2=danhmuc_khachsan_2_getByTop('','id!=1 and danhmuc_id='.$row->id,'position asc');
            if(count($data_danhmuc2)>0){
                $asign['danhmuc_khachsan'] .='<ul class="sub-menu">';
                foreach($data_danhmuc2 as $row2){
                    $link_dm2=link_danhmuc_khachsan_2($row2,$row->name_url);
                    $asign['danhmuc_khachsan'] .='<li><a href="'.$link_dm2.'">'.$row2->name.'</a></li>';
                }
                $asign['danhmuc_khachsan'] .='</ul>';
            }
            $asign['danhmuc_khachsan'] .='</li>';
        }
        $asign['danhmuc_khachsan'] .='</ul>';
    }

    $asign['danhmuc_tintuc'] ='';
    if(count($data['danhmuc_tintuc'])>0)
    {
        $asign['danhmuc_tintuc'] = print_item('menu_item', $data['danhmuc_tintuc']);
    }
    print_template($asign, 'menu');
}

function view_sidebar_tiep_thi($data = array())
{
    $asign = array();
    $asign['name']=$data['config'][0]->Name;
    $asign['Logo']=$data['config'][0]->Logo;

    // active menu
    $asign['trangchu_mn'] = ($data['active'] == 'trangchu') ? 'active' : '';
    $asign['hoso_mn'] = ($data['active'] == 'hoso') ? 'active' : '';
    $asign['donhang_mn'] = ($data['active'] == 'donhang') ? 'active' : '';
    $asign['tour_mn'] = ($data['active'] == 'tour') ? 'active' : '';
    $asign['thongbao_mn'] = ($data['active'] == 'thongbao') ? 'active' : '';
    $asign['thanhvien_mn'] = ($data['active'] == 'thanhvien') ? 'active' : '';
    $asign['lienhe_mn'] = ($data['active'] == 'lienhe') ? 'active' : '';
    $data_session=checkSession('', 1);
    $array_check_noti = array(
        'id'=>_return_mc_encrypt($data_session['id']),
        'name'=>_return_mc_encrypt($data_session['name']),
        'user_email'=>_return_mc_encrypt($data_session['user_email']),
        'user_code'=>_return_mc_encrypt($data_session['user_code']),
        'created'=>_return_mc_encrypt($data_session['created']),
        'avatar'=>_return_mc_encrypt($data_session['avatar']),
        'token_code'=>_return_mc_encrypt($data_session['token_code']),
        'time_token'=>_return_mc_encrypt($data_session['time_token']),
        'top_5'=>1,
    );
    $asign['key_id']=_return_mc_encrypt($data_session['id']);
    $asign['name_share']=_return_mc_encrypt($data_session['name']);
    $list_noti= returnCURL($array_check_noti, SITE_NAME_MANAGE.'/return-hoa-hong.html');
    $data_list_hoahong=json_decode($list_noti,true);
    if(isset($data_list_hoahong['success'])&&$data_list_hoahong['success']==1){
        if(isset($data_list_hoahong['hoa_hong'])){
            $asign['hoa_hong']=number_format((int)$data_list_hoahong['hoa_hong'],0,",",".").' vnđ';
        }else{
            $asign['hoa_hong']="0 vnđ";
        }
    }else{
        redict(SITE_NAME.'/tiep-thi-lien-ket/dang-xuat/');
    }

    print_template($asign, 'tiep_thi_sidebar');
}

function view_navbar_tiep_thi($data = array())
{
    $asign = array();
    $asign['name_module']=$data['name_module'];
    $data_session=checkSession('', 1);
    $asign['form_']='';
    $count_un_read=0;
    $asign['user-info']='';
    if(count($data_session)>0){
        $array_check_noti = array(
            'id'=>_return_mc_encrypt($data_session['id']),
            'name'=>_return_mc_encrypt($data_session['name']),
            'user_email'=>_return_mc_encrypt($data_session['user_email']),
            'user_code'=>_return_mc_encrypt($data_session['user_code']),
            'created'=>_return_mc_encrypt($data_session['created']),
            'avatar'=>_return_mc_encrypt($data_session['avatar']),
            'token_code'=>_return_mc_encrypt($data_session['token_code']),
            'time_token'=>_return_mc_encrypt($data_session['time_token']),
            'top_5'=>1,
        );
        $asign['form_']='<form style="display: none" action="" method="" id="form_noti">
        <input name="noti_name" value="'._return_mc_encrypt(json_encode($array_check_noti)).'">
        <input name="id" value="'._return_mc_encrypt($data_session['id']).'">
        <input name="name" value="'._return_mc_encrypt($data_session['name']).'">
        <input name="user_email" value="'._return_mc_encrypt($data_session['user_email']).'">
        <input name="user_code" value="'._return_mc_encrypt($data_session['user_code']).'">
        <input name="created" value="'._return_mc_encrypt($data_session['created']).'">
        <input name="avatar" value="'._return_mc_encrypt($data_session['avatar']).'">
        <input name="token_code" value="'._return_mc_encrypt($data_session['token_code']).'">
        <input name="time_token" value="'._return_mc_encrypt($data_session['time_token']).'">
        <input id="top_5" name="top_5" value="1">
        <input id="page_noti" name="page" value="1">
        </form>';
        $list_noti= returnCURL($array_check_noti, SITE_NAME_MANAGE.'/return-list-notification.html');
        $data_list_noti=json_decode($list_noti,true);
        if($data_list_noti['success']==0){
            redict(SITE_NAME.'/tiep-thi-lien-ket/dang-xuat/');
        }
        $count_noti=count($data_list_noti['data_noti']);
        if(isset($data_list_noti['count_active'])&& $data_list_noti['count_active']>0){
            if($data_list_noti['count_active']>100){
                $data_list_noti['count_active']='100+';
            }
            $count_noti_string='<span class="notification">'.$data_list_noti['count_active'].'</span>';
            $asign['coutn_mes_noti']='<span class="notification" id="count_notification">'.$data_list_noti['count_active'].'</span>';
        }else{
            $count_noti_string='<span hidden class="notification" id="count_notification"></span>';
            $asign['coutn_mes_noti']='';
        }
        if(isset($data_list_noti['count_un_read'])&& $data_list_noti['count_un_read']>0){
            $count_un_read=' <i class="ace-icon fa fa-exclamation-triangle"></i> <span id="count_un_read"> '.$data_list_noti['count_un_read'].' Thông báo chưa đọc</span> ';
        }else{
            if($count_noti>0){
                $count_un_read='<span id="count_un_read">Tất cả thông báo đã được đọc</span>';
            }else{
                $count_un_read='<span id="count_un_read">Bạn không có thông báo nào</span>';

            }
        }
        $asign['count_un_read']=$count_un_read;
        $hidden_div='';
        $asign['view_all']='';
        $list_notification='';
        $hidden_noti='';
        $asign['list_notifications']='';
        if($count_noti>0){
            foreach($data_list_noti['data_noti'] as $row_noti){
                $row_color='';
                $row_title_status='Đã đọc';
                $row_icon_status='fa-check';
                if($row_noti['status']!=1){
                    $row_color='background-color: #edf2fa;';
                    $row_icon_status='fa-sun-o';
                    $row_title_status='Chưa đọc';
                }
                $date_show = date("d-m-Y H:i:s", strtotime($row_noti['created']));
                $date_noti =timeAgo($row_noti['created']);
                $list_notification.='<li class="menu-item" style="'.$row_color.'"><a
                                                        style="color: #4F99C6!important;"
                                                       href="'.SITE_NAME.'/'.$row_noti['link'].'&id_noti='._return_mc_encrypt($row_noti['id']).'"
                                                        class="clearfix"><span class="msg-body"><span
                                                                class="msg-title">'.$row_noti['name'].'</span><span
                                                                 class="msg-time"><i
                                                                    class="ace-icon fa fa-clock-o"></i> <span title="'.$date_show.'"> '.$date_noti.' </span><span
                                                                    style="float: right;color: #4F99C6!important;"><i title="'.$row_title_status.'" class="ace-icon fa '.$row_icon_status.'"></i> </span></span></span></a>
                                            </li>';
            }
            if($count_noti>=1){
                $asign['view_all'].=' <p class="dropdown-footer" style="margin-bottom: 0px; padding: 10px; text-align: center;"><a style="color: #0091ea;" class="view_all_noti"
                                                href="'.SITE_NAME.'/tiep-thi-lien-ket/thong-bao"> Xem tất cả <i class="ace-icon fa fa-arrow-right"></i></a></p>';
            }
        }else{
            $hidden_noti='hidden';
//            $list_notification=' <li class="item_list_noti" style="">
//                                    <a >Bạn không có thông báo nào</a>
//                                </li>';
        }
        $asign['list_notifications']=$list_notification;
        $asign['hidden_noti']=$hidden_noti;
        $scroll='';
        if($count_noti>=3){
            $scroll='scroll_noti';
        }

        $asign['content_user']='<div class="div_content_noti">
                        <div class="dropdown-noti">
                            <a class="notification_menu" data-toggle="dropdown-noti">
                                <i class="icon_glo_noti ace-icon fa fa-globe icon-animated-bell color_white fa-2x"></i>
                                '.$count_noti_string.'
                            </a>
                            <div class="dropdown-content-noti">
                                <p class="dropdown-header">'.$count_un_read.'</p>
                                <div '.$hidden_div.' class="content_ul_li '.$scroll.'">
                                    <ul style="    padding: 0px;" class=" dropdown-navbar navbar-pink ul_noti">';
        $asign['content_user'].= $list_notification;
        $asign['content_user'].='</ul> </div>
                                <p '.$hidden_div.' class="dropdown-footer">
                                    <a href="'.SITE_NAME.'/tiep-thi-lien-ket/thong-bao"> Xem tất cả <i class="ace-icon fa fa-arrow-right"></i></a></p>
                            </div>
                        </div>';
        $avatar=$data_session['avatar'];
        $asign['user_info']='<li> <a href="#pablo" style="padding-top: 1px; padding-bottom: 1px"
                           class="user_profile dropdown-toggle" data-toggle="dropdown">
                            <img class="nav-user-photo" title="'.$data_session['name'].'" alt="'.$data_session['name'].'"
                                 src="'.$avatar.'"><span
                                    class="user-info"><small>Xin chào,</small>'.$data_session['name'].'</span><i
                                    class="ace-icon fa fa-caret-down color_white"
                                    style="margin-left: 10px; float:none"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="'.SITE_NAME.'/tiep-thi-lien-ket/ho-so/"><i class="fa fa-cogs "></i> Cài đặt tài khoản</a></li>
                            <li><a href="'.SITE_NAME.'/tiep-thi-lien-ket/dang-xuat/"><i class="fa fa-sign-out "></i> Đăng xuất</a></li>
                        </ul>
                    </li>';

    }
    $asign['breadcrumb']='';
    if(isset($data['breadcrumb'])){
        $asign['breadcrumb']=$data['breadcrumb'];
    }
    $asign['breadcrumb']='';
    if(isset($data['breadcrumb'])){
        $asign['breadcrumb']=$data['breadcrumb'];
    }
    print_template($asign, 'tiep_thi_navbar');
}

