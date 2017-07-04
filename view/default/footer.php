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
    $asign['count_noti_string']='';
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
        $list_noti= returnCURL($array_check_noti, SITE_NAME_MANAGE.'/return-list-notification.html');
        $data_list_noti=json_decode($list_noti,true);
        if(isset($data_list_noti['count_active'])&& $data_list_noti['count_active']>0){
            $asign['count_noti_string']='<span class="badge badge-important" id="count_notification">'.$data_list_noti['count_active'].'</span>';
        }
        $avatar=$data_session['avatar'];
        $asign['avatar']='<img class="img_border" title="'.$data_session['name'].'" alt="'.$data_session['name'].'" class="facebook-messenger-avatar" src="'.$avatar.'">';
        $asign['content_user']='
            <p><a href="'.SITE_NAME.'/tiep-thi-lien-ket/ho-so/">'.$asign['avatar'].' Hi! '.$data_session['name'].'</a></p>
            <p><a href="'.SITE_NAME.'/tiep-thi-lien-ket/ho-so/"><i class="fa fa-cogs "></i> Cài đặt tài khoản</a></p>
            <p><a href="'.SITE_NAME.'/tiep-thi-lien-ket/"><i class="fa fa-share-alt "></i> Tiếp thị liên kết</a></p>
            <p><a href="'.SITE_NAME.'/tiep-thi-lien-ket/dang-xuat/"><i class="fa fa-sign-out "></i> Đăsite_name_manageng xuất</a></p>
        ';
        if(isset($data_list_noti['count_un_read'])&& $data_list_noti['count_un_read']>0){
            $count_un_read=$data_list_noti['count_un_read'];
        }
        $asign['form_']='<form style="display: none" action="" method="" id="form_noti"><input name="noti_name" value="'._return_mc_encrypt(json_encode($array_check_noti)).'"></form>';
        if(count($data_list_noti)>0){
            $list_notification='<p style="border-bottom: none; margin-bottom: 0px;">
                        <a style="color: #eea236 !important;"><i class="ace-icon fa fa-exclamation-triangle"></i> <span  id="count_un_read">'.$count_un_read.'</span> Thông báo chưa đọc</a>
                    </p>
                      <div class="dropdown-noti">
                        <div class="dropdown-content-noti" style="margin-top: 0px;">
                            <ul style="display: block; position: relative;padding: 0px 0; height: 240px; overflow: scroll;" class="dropdown-menu dropdown-navbar navbar-pink ul_noti">';
            foreach($data_list_noti['data_noti'] as $row_noti){
                $row_color='';
                if($row_noti['status']!=1){
                    $row_color='background-color: #edf2fa;';
                }
                $date_noti = date("d-m-Y H:i:s", strtotime($row_noti['created']));
                $list_notification.='
                            <li style="'.$row_color.'">
                                <a href="'.SITE_NAME.'/'.$row_noti['link'].'" class="clearfix">
												<span class="msg-body">
													<span class="msg-title">
														'.$row_noti['name'].'
													</span>
													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i> <span> '.$date_noti.' </span>
													</span>
												</span>
                                </a>
                                <a title="Chi tiết thông báo"
                                   href="'.SITE_NAME.'/'.$row_noti['link'].'"
                                   style="position: absolute;right: 0%;bottom: 5%; "><i
                                            style="color:#4a96d9 !important;"
                                            class="ace-icon fa fa-hand-o-right"></i></a>
                            </li>
                            ';
            }
            $list_notification.=' </ul>
                            <ul style="display: block; position: relative;padding: 0px 0;width: 100%" class="dropdown-menu dropdown-navbar navbar-pink ul_noti">
                                <li class="dropdown-footer"><a href="'.SITE_NAME.'/tiep-thi-lien-ket/thong-bao/"> Xem tất cả <i
                                                class="ace-icon fa fa-arrow-right"></i></a></li>
                            </ul>
                        </div>
                    </div>';
            $asign['content_user'].=$list_notification;
        }

    }else{
        $asign['avatar']='<img title="Tài khoản tiếp thị liên kết" alt="Tài khoản tiếp thị liên kết" class="facebook-messenger-avatar" src="'.SITE_NAME.'/view/default/themes/images/tiepthi/tiepthi3.png">';
        $asign['content_user']='
                    <p>
                        <a  href="'.SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/?type=dang-ky"><i class="fa fa-user"></i> Đăng ký</a>
                        <span style="color: #2b2b2b"> | </span>
                        <a href="'.SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/"><i class="fa fa-sign-in"></i> Đăng nhập</a>
                    </p>
                     <a href="'.SITE_NAME.'"><label style="color: red;">(Tài khoản tiếp thị liên kết)</label></a>
        ';
    }


    print_template($asign, 'footer');
}
