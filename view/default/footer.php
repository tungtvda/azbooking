<?php
require_once DIR . '/view/default/public.php';
function view_footer($data = array())
{
    $asign = array();
    $asign['Logo'] = $data['config'][0]->Logo;
    $asign['Name'] = $data['config'][0]->Name;

    $asign['Address'] = $data['config'][0]->Address;
    $asign['Phone'] = $data['config'][0]->Phone;
    $asign['Hotline'] = $data['config'][0]->Hotline;
    $asign['Email'] = $data['config'][0]->Email;
    $asign['Fax'] = $data['config'][0]->fax;

    $asign['Address_hcm'] = $data['config'][0]->Address_hcm;
    $asign['Phone_hcm'] = $data['config'][0]->Phone_hcm;
    $asign['Hotline_hcm'] = $data['config'][0]->Hotline_hcm;
    $asign['Fax_hcm'] = $data['config'][0]->fax_hcm;
    $asign['Email_hcm'] = $data['config'][0]->Email_hcm;

    $asign['twitter'] = $data['mangxahoi'][0]->twitter;
    $asign['youtube'] = $data['mangxahoi'][0]->youtube;
    $asign['facebook'] = $data['mangxahoi'][0]->facebook;
    $asign['google'] = $data['mangxahoi'][0]->google;
    $asign['rss'] = $data['mangxahoi'][0]->rss;

    $asign['quydinh'] = $data['info'][0]->name;
    $asign['baomat'] = $data['info'][1]->name;
    $asign['thanhtoan'] = $data['info'][2]->name;
    $asign['doitra'] = $data['info'][3]->name;
    $asign['khieunai'] = $data['info'][4]->name;
    $asign['giaonhan'] = $data['info'][5]->name;
    $asign['site_name_manage'] = SITE_NAME_MANAGE;

    $asign['danhmuc_menu_footer'] ='';
    if(count($data['danhmuc_menu_footer'])>0){

        foreach($data['danhmuc_menu_footer'] as $row){
            $link_dm1=link_dm_tour1($row);
            $data_danhmuc2=danhmuc_2_getByTop('','id!=1 and danhmuc1_id='.$row->id,'position asc');
            if(count($data_danhmuc2)>0){
                $asign['danhmuc_menu_footer'] .=' <div class="Domestic"> <ul>';
                $asign['danhmuc_menu_footer'] .=' <li><a style="font-weight: bold" href="'.$link_dm1.'">'.$row->name.'</a></li>';
                foreach($data_danhmuc2 as $row2){
                    $link_dm2=link_dm_tour2($row2,$row->name_url,$row->tour_quoc_te);
                    $asign['danhmuc_menu_footer'] .=' <li><a href="'.$link_dm2.'">'.$row2->name.'</a></li>';
                }
                $asign['danhmuc_menu_footer'] .='</ul></div>';
            }
        }
    }
    $data_session=checkSession('', 1);
    $asign['form_']='';
    $count_un_read=0;
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
        $count_noti=count($data_list_noti['data_noti']);
        if(isset($data_list_noti['count_active'])&& $data_list_noti['count_active']>0){
            if($data_list_noti['count_active']>100){
                $data_list_noti['count_active']='100+';
            }
            $count_noti_string='<span class="badge badge-important" id="count_notification">'.$data_list_noti['count_active'].'</span>';
            $asign['coutn_mes_noti']='<span class="badge_noti badge-important" id="count_mes_noti">'.$data_list_noti['count_active'].'</span>';
        }else{
            $count_noti_string='<span hidden class="badge badge-important" id="count_notification"></span>';
            $asign['coutn_mes_noti']='';
        }
        if(isset($data_list_noti['count_un_read'])&& $data_list_noti['count_un_read']>0){
            $count_un_read=' <i class="ace-icon fa fa-exclamation-triangle"></i> <span id="count_un_read"> '.$data_list_noti['count_un_read'].' Thông báo chưa đọc</span> ';
        }else{
            if($count_noti>0){
                $count_un_read='<span id="count_un_read">Bạn không có thông báo nào</span>';
            }else{
                $count_un_read='<span id="count_un_read">Tất cả thông báo đã được đọc</span>';
            }
        }
        $hidden_div='';
        $list_notification='';
        if($count_noti>0){
            foreach($data_list_noti['data_noti'] as $row_noti){
                $row_color='';
                if($row_noti['status']!=1){
                    $row_color='background-color: #edf2fa;';
                }
//                $date_noti = date("d-m-Y H:i:s", strtotime($row_noti['created']));
                $date_noti =timeAgo($row_noti['created']);
                $list_notification.='
                            <li style="'.$row_color.'">
                                <a href="'.SITE_NAME.'/'.$row_noti['link'].'">
												<span class="msg-body">
													<span class="msg-title">
														'.$row_noti['name'].'
													</span>
													<span class="msg-time timeago">
														<i class="ace-icon fa fa-clock-o"></i> <span> '.$date_noti.' </span>
													</span>
												</span>
                                </a>`
                                <a title="Chi tiết thông báo"
                                   href="'.SITE_NAME.'/'.$row_noti['link'].'"
                                   style="position: absolute;right: 0%;bottom: 5%; "><i
                                            style="color:#4a96d9 !important;"
                                            class="ace-icon fa fa-hand-o-right"></i></a>
                            </li>
                            ';
            }
        }else{
            $hidden_div='hidden';
        }
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
                                    <a href="'.SITE_NAME.'/tiep-thi-lien-ket/thong-bao/"> Xem tất cả <i class="ace-icon fa fa-arrow-right"></i></a></p>
                            </div>
                        </div>';
        $avatar=$data_session['avatar'];
        $asign['content_user'].='<div class="dropdown">
                            <a class="user_profile" data-toggle="dropdown">
                                <img class="nav-user-photo" title="'.$data_session['name'].'" alt="'.$data_session['name'].'"
                                     src="'.$avatar.'"><span
                                        class="user-info"><small>Xin chào,</small>'.$data_session['name'].'</span><i
                                        class="ace-icon fa fa-caret-down color_white" style="margin-left: 10px"></i></a>
                            <div class="dropdown-content">
                            <a href="'.SITE_NAME.'/tiep-thi-lien-ket/ho-so/"><i class="fa fa-cogs "></i> Cài đặt tài khoản</a>
                            <a href="'.SITE_NAME.'/tiep-thi-lien-ket/"><i class="fa fa-share-alt "></i> Tiếp thị liên kết</a>
                            <a href="'.SITE_NAME.'/tiep-thi-lien-ket/dang-xuat/"><i class="fa fa-sign-out "></i> Đăng xuất</a>
                            </div>
                        </div>
                    </div>';
    }else{
        $asign['avatar']='<img title="Tài khoản tiếp thị liên kết" alt="Tài khoản tiếp thị liên kết" class="facebook-messenger-avatar" src="'.SITE_NAME.'/view/default/themes/images/tiepthi/tiepthi3.png">';
        $asign['content_user']='
                    <p>
                        <a  href="'.SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/?type=dang-ky"><i class="fa fa-user"></i> Đăng ký</a>
                        <span style="color: #2b2b2b"> | </span>
                        <a href="'.SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/"><i class="fa fa-sign-in"></i> Đăng nhập</a>
                    </p>
                     <p><a href="'.SITE_NAME.'"><label style="color: red;">(Tài khoản tiếp thị liên kết)</label></a></p>
        ';
    }


    print_template($asign, 'footer');
}

function _ago($tm,$rcs = 0) {
    $cur_tm = time();
    $dif = $cur_tm-$tm;
    $pds = array('second','minute','hour','day','week','month','year','decade');
    $lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);

    for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--); if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);
    $no = floor($no);
    if($no <> 1)
        $pds[$v] .='s';
    $x = sprintf("%d %s ",$no,$pds[$v]);
    if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm) > 0))
        $x .= time_ago($_tm);
    return $x;
}