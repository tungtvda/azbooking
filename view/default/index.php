<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_index($data = array())
{
    $asign = array();
    $title=$data['menu'][0]->title;
    $description=$data['menu'][0]->description;
    $keyword=$data['menu'][0]->keyword;
    $asign['title']=($title)?$title:'Azbooking.vn';
    $asign['description']=($description)?$description:'Azbooking.vn';
    $asign['keywords']=($keyword)?$keyword:'Azbooking.vn';
    $asign['icon']=$data['config'][0]->Icon;
    $asign['logo']=$data['config'][0]->Logo;
    $asign['Name']=$data['config'][0]->Name;
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


    $asign['map_hn'] = $data['config'][0]->Map;
    $asign['map_hcm'] = $data['config'][0]->Map_hcm;

    $asign['quydinh'] = 'Chính sách và quy định chung';
    $asign['baomat'] = 'Chính sách bảo mật thông tin';
    $asign['thanhtoan'] = 'Hình thức thanh toán';
    $asign['doitra'] = 'Quy định đổi trả - hoàn tiền';
    $asign['khieunai'] = 'Chính sách quy trình xử lý khiếu nại';
    $asign['giaonhan'] = 'Chính sách vận chuyển và giao nhận';
    $data['info']=info_mix_getByTop('','','id asc');
    if($data['info']){
        $asign['quydinh'] = $data['info'][0]->name;
        $asign['baomat'] = $data['info'][1]->name;
        $asign['thanhtoan'] = $data['info'][2]->name;
        $asign['doitra'] = $data['info'][3]->name;
        $asign['khieunai'] = $data['info'][4]->name;
        $asign['giaonhan'] = $data['info'][5]->name;
    }


    $data['link_anh']=SITE_NAME.$data['config'][0]->Logo;
    if(strstr($data['link_anh'],SITE_NAME)!=''){
        $asign['link_anh']=$data['link_anh'];
    }else{
        $asign['link_anh']=SITE_NAME.$data['link_anh'];
    }
    $asign['link_url']=SITE_NAME.$_SERVER["REQUEST_URI"];

    $asign['slide'] ='';
    $asign['count_slide']=count($data['slide']);
    if($asign['count_slide']>0)
    {
        $asign['slide'] = print_item('slide_index', $data['slide']);
    }
    $asign['video_index'] ='';
    if(count($data['video_index'])>0)
    {
        $asign['link_video'] = $data['video_index'][0]->link_video;
    }

    $asign['dichvu'] ='';
    if(count($data['dichvu'])>0)
    {
        $asign['dichvu'] = print_item('dichvu', $data['dichvu']);
    }

    $data_session=checkSession('', 1);
    $asign['form_']='';
    $count_un_read=0;
    $asign['coutn_mes_noti']='';
    $asign['content_noti_user']='';
    if(count($data_session)>0) {
        $array_check_noti = array(
            'id' => _return_mc_encrypt($data_session['id']),
            'name' => _return_mc_encrypt($data_session['name']),
            'user_email' => _return_mc_encrypt($data_session['user_email']),
            'user_code' => _return_mc_encrypt($data_session['user_code']),
            'created' => _return_mc_encrypt($data_session['created']),
            'avatar' => _return_mc_encrypt($data_session['avatar']),
            'token_code' => _return_mc_encrypt($data_session['token_code']),
            'time_token' => _return_mc_encrypt($data_session['time_token']),
            'top_5' => 1,
        );
        $asign['form_'] = '<form style="display: none" action="" method="" id="form_noti">
        <input name="noti_name" value="' . _return_mc_encrypt(json_encode($array_check_noti)) . '">
        <input name="id" value="' . _return_mc_encrypt($data_session['id']) . '">
        <input name="name" value="' . _return_mc_encrypt($data_session['name']) . '">
        <input name="user_email" value="' . _return_mc_encrypt($data_session['user_email']) . '">
        <input name="user_code" value="' . _return_mc_encrypt($data_session['user_code']) . '">
        <input name="created" value="' . _return_mc_encrypt($data_session['created']) . '">
        <input name="avatar" value="' . _return_mc_encrypt($data_session['avatar']) . '">
        <input name="token_code" value="' . _return_mc_encrypt($data_session['token_code']) . '">
        <input name="time_token" value="' . _return_mc_encrypt($data_session['time_token']) . '">
        <input id="top_5" name="top_5" value="1">
        <input id="page_noti" name="page" value="1">
        </form>';
        $list_noti= returnCURL($array_check_noti, SITE_NAME_MANAGE.'/return-list-notification.html');
        $data_list_noti=json_decode($list_noti,true);
        if($data_list_noti['success']==0){
            redict(SITE_NAME.'/tiep-thi-lien-ket/dang-xuat/');
        }
        $count_noti_string='';
        $count_noti=count($data_list_noti['data_noti']);
        if(isset($data_list_noti['count_active'])&& $data_list_noti['count_active']>0){
            $count_noti_string='<span class="badge badge-important" id="count_notification">'.$data_list_noti['count_active'].'</span>';
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
        $scroll='';
        if($count_noti>=3){
            $scroll='scroll_noti';
        }
        $hidden_div='';
        if($count_noti==0){
            $hidden_div='hidden';
        }


            $list_notification='<div class="dropdown-content-noti">
                        <p class="dropdown-header">
                           '.$count_un_read.'
                        </p>
                        <div '.$hidden_div.'  class="content_ul_li '.$scroll.'">
                        <ul style="background:#ffffff" class="sub-menu sub-menu-noti ul_noti">';
            foreach($data_list_noti['data_noti'] as $row_noti){
                $row_color='';
                if($row_noti['status']!=1){
                    $row_color='background-color: #edf2fa;';
                }
                $date_show = date("d-m-Y H:i:s", strtotime($row_noti['created']));
                $date_noti =timeAgo($row_noti['created']);
                $list_notification.='
                            <li class="menu-item" style="'.$row_color.'">
                                <a style="color: #4F99C6!important;border-bottom: 1px dotted #e1e1e1;" href="'.SITE_NAME.'/'.$row_noti['link'].'&id_noti='._return_mc_encrypt($row_noti['id']).'" class="clearfix">
												<span class="msg-body">
													<span class="msg-title">
														'.$row_noti['name'].'
													</span>
													<span title="'.$date_show.'" class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i> <span> '.$date_noti.' </span>
														 <span style="float: right;color: #4F99C6!important;"> <i class="ace-icon fa fa-hand-o-right"></i> </span>
													</span>
												</span>
                                </a>

                            </li>
                            ';
            }
            $list_notification.='
                        </ul></div>
                         <p '.$hidden_div.' class="dropdown-footer" style="margin-bottom: 0px;     padding: 10px; text-align: center;">
                                    <a href="'.SITE_NAME.'/tiep-thi-lien-ket/thong-bao/"> Xem tất cả <i class="ace-icon fa fa-arrow-right"></i></a></p>
                    </div>

                    ';

            $asign['content_noti_user']=' <li class="menu-item menu-item-has-children dropdown-noti">
                            <a style="padding: 14px 25px;" href="javascript:void(0)" class="notification_menu">
                                <i class="fa fa-globe" style="font-size: 20px;" aria-hidden="true"></i>
                                '.$count_noti_string.'
                            </a>
                            '.$list_notification.'
                    </li>';
            $avatar='<img class="nav-user-photo" title="'.$data_session['name'].'" alt="'.$data_session['name'].'"  src="'.$data_session['avatar'].'">';
            $asign['content_noti_user'].='
                        <li class="menu-item menu-item-has-children "><a href="javascript:void(0)" style="padding: 0px 15px;   ">
                                '.$avatar.'
                                <span class="user-info"><small>Xin chào,</small>'.$data_session['name'].'</span>
                                <i class="ace-icon fa fa-caret-down color_white"
                                   style="margin-left: 10px ;vertical-align: top;margin-top: 14px;"></i>
                            </a>
                            <ul class="sub-menu" style="text-align: left; width: 235px;">
                                <li class="menu-item"><a href="'.SITE_NAME.'/tiep-thi-lien-ket/ho-so/"><i class="fa fa-cogs "></i> Cài đặt tài khoản</a></li>
                                <li class="menu-item"><a href="'.SITE_NAME.'/tiep-thi-lien-ket/"><i class="fa fa-share-alt "></i> Tiếp thị liên kết </a></li>
                                <li class="menu-item"><a target="_blank" href="'.SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/?type=dang-ky&key_id='._return_mc_encrypt($data_session['id']).'"><i class="fa fa-link "></i> Link đăng ký </a></li>
                                <li class="menu-item"><a target="_blank"  href="https://www.facebook.com/sharer/sharer.php?u='.SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/?type=dang-ky&key_id='._return_mc_encrypt($data_session['id']).'" ><i class="fa fa-facebook "></i> Chia sẻ đăng ký <i>(Facebook)</i> </a> </li>
                                <li class="menu-item"><a target="_blank"  href="https://twitter.com/intent/tweet?source=webclient&text='.SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/?type=dang-ky&key_id='._return_mc_encrypt($data_session['id']).' + '.$data_session['name'].'" ><i class="fa fa fa-twitter "></i> Chia sẻ đăng ký <i>(Twitter)</i> </a> </li>
                                <li class="menu-item"><a target="_blank"  href="https://plus.google.com/share?url='.SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/?type=dang-ky&key_id='._return_mc_encrypt($data_session['id']).'" ><i class="fa fa fa fa-google-plus"></i> Chia sẻ đăng ký <i>(Google)</i> </a> </li>

                                <li class="menu-item"><a href="'.SITE_NAME.'/tiep-thi-lien-ket/dang-xuat/"><i class="fa fa-sign-out "></i> Đăng xuất</a></li>
                            </ul>
                        </li>';


    }else{
        $asign['content_noti_user']='
                         <li class="menu-item menu-item-has-children "><a href="'.SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/?type=dang-ky"><i class="fa fa-user"
                                                                                     aria-hidden="true"></i> Đăng ký</a>
                        </li>
                        <li class="menu-item menu-item-has-children ">
                            <a href="'.SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/"> <i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</a>
                        </li>
        ';
    }
    $asign['site_name_manage'] = SITE_NAME_MANAGE;
    print_template($asign, 'index');
}



