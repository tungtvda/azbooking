<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_chitiet_tour($data = array())
{
    $asign = array();
    $asign['name']= $data['detail'][0]->name;
    $asign['code']= $data['detail'][0]->code;
    $asign['img']= $data['detail'][0]->img;
    $asign['durations']= $data['detail'][0]->durations;
    $asign['destination']=$data['detail'][0]->destination;
    $asign['start']=sao($data['detail'][0]->hotel);
    $asign['name_url']=$data['detail'][0]->name_url;
    $asign['id']= $data['detail'][0]->id;
    $asign['title']= $data['detail'][0]->title;
    $asign['description']= $data['detail'][0]->description;
    $asign['price_tiep_thi']= $data['detail'][0]->price_tiep_thi;
    $content=$data['detail'][0]->summary;
    if (strlen($content) > 200) {
        $ten1=strip_tags($content);

        $ten = substr($ten1, 0, 200);
        $asign['content_short'] = substr($ten, 0, strrpos($ten, ' ')) . "...";
    } else {
        $asign['content_short']=strip_tags($content);
    }
    $asign['summary']=$data['detail'][0]->summary;
    $asign['hidden_summary']='';
    if($data['detail'][0]->summary==''){
        $asign['hidden_summary']='hidden';
    }
    $asign['highlights']=$data['detail'][0]->highlights;
    $asign['hidden_summary']='';
    if($data['detail'][0]->summary==''){
        $asign['hidden_summary']='hidden';
    }
    $asign['price']= $data['detail'][0]->price;
    $asign['price_2']= $data['detail'][0]->price_2;
    $asign['price_3']= $data['detail'][0]->price_3;
    $asign['price_4']= $data['detail'][0]->price_4;
    $asign['price_5']= $data['detail'][0]->price_5;
    $asign['price_6']= $data['detail'][0]->price_6;
    $asign['link']=$data['link_url'];


    if($data['detail'][0]->price==0||$data['detail'][0]->price==''){
        $asign['price_format']='Liên hệ';
        $asign['vnd']='';
    }
    else{
        $asign['price_format']= number_format($data['detail'][0]->price,0,",",".");
        $asign['vnd']='vnđ';
    }
    $asign['price_2_format']='';
    if($data['detail'][0]->price_2){
        $asign['price_2_format']= number_format($data['detail'][0]->price_2,0,",",".");
    }
    $asign['price_3_format']='';
    if($data['detail'][0]->price_3){
        $asign['price_3_format']= number_format($data['detail'][0]->price_3,0,",",".");
    }
    $asign['price_4_format']='';
    if($data['detail'][0]->price_4){
        $asign['price_4_format']= number_format($data['detail'][0]->price_4,0,",",".");
    }
    $asign['price_5_format']='';
    if($data['detail'][0]->price_5){
        $asign['price_5_format']= number_format($data['detail'][0]->price_5,0,",",".");
    }
    $asign['price_6_format']='';
    if($asign['price_6_format'])
    {
        $asign['price_6_format']= number_format($data['detail'][0]->price_6,0,",",".");
    }

    $asign['date_now'] = date('Y-m-d', strtotime(date(DATETIME_FORMAT)));
    $asign['date_now_vn'] = date('d-m-Y', strtotime(date(DATETIME_FORMAT)));

    $asign['schedule']=$data['detail'][0]->schedule;

    $asign['inclusion']=$data['detail'][0]->inclusion;
    $asign['hidden_inclusion']='';
    if($data['detail'][0]->inclusion==''){
        $asign['hidden_inclusion']='hidden';
    }
    $asign['exclusion']=$data['detail'][0]->exclusion;
    $asign['hidden_exclusion']='';
    if($data['detail'][0]->exclusion==''){
        $asign['hidden_exclusion']='hidden';
    }

    $asign['price_list']=$data['detail'][0]->price_list;
    $asign['vehicle']=$data['detail'][0]->vehicle;

    $asign['tour_lienquan'] ='';
    if(count($data['tour_lienquan'])>0) {
        $asign['tour_lienquan'] = print_item('lienquan', $data['tour_lienquan']);
    }

    $asign['Hotline'] = $data['config'][0]->Hotline;
    $asign['Hotline_hcm'] = $data['config'][0]->Hotline_hcm;

    $arr_check=explode(',',$data['detail'][0]->departure);
    if($arr_check==''){
        $arr_check=array();
    }
    $string_khoihanh='';
    $data_khoihanh=departure_getByTop('','','position asc');
    $count_khoihanh=0;
    foreach($data_khoihanh as $row_kh){
        if(in_array($row_kh->id,$arr_check)){
            if($count_khoihanh==0)
            {
                $string_khoihanh.=$row_kh->name;
            }
            else{
                $string_khoihanh.=', '.$row_kh->name;
            }

            $count_khoihanh++;
        }

    }
    $asign['khoihanh']=$string_khoihanh;
    $asign['departure_time']=$data['detail'][0]->departure_time;
    $asign['hidden_date']='';
    $asign['hidden_date_select']='hidden';
    $asign['date_select']='';
    $now = getdate();
    $year_current=$now["year"];
    if($data['detail'][0]->departure_time!=''&&$data['detail'][0]->departure_time!='Theo yêu cầu'&&$data['detail'][0]->departure_time!='theo yêu cầu'){
        $asign['hidden_date']='hidden';
        $arr_explode=explode(',',$data['detail'][0]->departure_time);
        if(count($arr_explode)>0){
            if(strlen($arr_explode[0])>=8){
                $time_explode_0=$arr_explode[0];
            }else{
                $time_explode_0=$arr_explode[0].'-'.$year_current;
            }
            $asign['date_now']=date('Y-m-d', strtotime(trim($time_explode_0)));
            $asign['date_now_vn'] =trim($time_explode_0);
            $asign['hidden_date_select']='';
            foreach($arr_explode as $row){
                $date=trim($row);
                if(strlen($date)>=8){
                    $time_format=$date;
                }else{
                    $time_format=$date.'-'.$year_current;
                }
                $validate= validateDate($time_format);
                if($validate==false){
                    $asign['hidden_date']='';
                    $asign['hidden_date_select']='hidden';
                    break;
                }
                $date_en=date('Y-m-d', strtotime(trim($time_format)));
                $asign['date_select'].='<option value="'.$date_en.'">'.$time_format.'</option>';
            }
        }
    }

    $asign['quocgia']='';
    $arr=explode(',',trim($data['detail'][0]->danhmuc_multi));
    if(count($arr)>0){
        $asign['quocgia'].='<div class="package-details-choose">
                            <h3 class="title">Quốc gia</h3>
                            <ul class="clearfix">';

        foreach($arr as $val){
            $data_danhmuc=danhmuc_2_getById($val);
            if(count($data_danhmuc)>0){
                $data_danhmuc_1=danhmuc_1_getById($data_danhmuc[0]->danhmuc1_id);

                if(count($data_danhmuc_1)>0){

                    $asign['quocgia'].='<li><span><a href="'.link_dm_tour2($data_danhmuc[0], $data_danhmuc_1[0]->name_url,$data_danhmuc_1[0]->tour_quoc_te).'"><i class="fa fa-check"></i>'.$data_danhmuc[0]->name.' </span></a></li>';
                }

            }

        }
        $asign['quocgia'].=' </ul></div>';
    }
    $asign['link_booking']=link_booking($data['detail'][0]);

    $arr_destination=explode(',',$data['detail'][0]->destination);
    $tring_des='';
    if(count($arr_destination)>0)
    {
        $count_check=1;
        foreach($arr_destination as $row_des){
            $tring_des.=' <span class="from">'.$row_des;
            if($count_check<count($arr_destination))
            {
                $tring_des.=' <i class="awe-icon fa fa-long-arrow-right"></i></span> ';
            }
            $count_check++;
        }
    }
    $asign['hanh_trinh']=$tring_des;

    $asign['tour_sales'] ='';
    if(count($data['tour_sales'])>0) {
        $asign['tour_sales'] = print_item('tour_sales', $data['tour_sales']);
    }
    $data_session=checkSession('', 1);
    $asign['div_tiep_thi']='';
    $asign['id_user']='';
    $asign['code_user']='';
    if(isset($_GET['key'])){
        $asign['id_user']='&key='._returnGetParamSecurity('key');
        $array_user_share_noti = array(
            'id'=>_returnGetParamSecurity('key'),
        );
        $list_noti= returnCURL($array_user_share_noti, SITE_NAME_MANAGE.'/azbooking-hoso.html');
        $data_list_noti=json_decode($list_noti,true);
       if(isset($data_list_noti['user']['code']) && $data_list_noti['user']['code']!=''){
           $asign['code_user']='  <p class="price"><i class="icon-dollar"></i> Mã booking:
                                    <ins><span class="amount"> '.$data_list_noti['user']['code'].'</span></ins>
                                </p>';
       }

    }

    if(count($data_session)>0 && $asign['price_tiep_thi']!='' && $asign['price_tiep_thi']>0){
        $array_user_share_noti = array(
            'id'=>_return_mc_encrypt($data_session['id']),
            'all'=>1,
        );
        $user_detail_pro= returnCURL($array_user_share_noti, SITE_NAME_MANAGE.'/azbooking-hoso.html');
        $user_detail_pro=json_decode($user_detail_pro,true);
        if(count($user_detail_pro)>0 && isset($user_detail_pro['user'])){
            $link_tiep_thi=$asign['link'].'/'._return_mc_encrypt($data_session['id']);
            switch($user_detail_pro['user']['type_tiep_thi']){
                case '1':
                    $sao='4 sao';
                    $price_tiep_thi = round(($asign['price_tiep_thi'] * 50) / 100);
                    break;
                case '2':
                    $sao='5 sao';
                    $price_tiep_thi = round(($asign['price_tiep_thi'] * 70) / 100);
                    break;
                case '3':
                    $sao='đại lý';
                    $price_tiep_thi = $asign['price_tiep_thi'];
                    break;
                default;
                    $sao='3 sao';
                    $price_tiep_thi = round(($asign['price_tiep_thi'] * 30) / 100);
            }
            $asign['div_tiep_thi']='<div class="link_tiep_thi_lien_ket package-details-content">
                            <h3 class="title "><b>Tiếp thị liên kết</b>    <b style="color: red">(Hoa hồng '.number_format($price_tiep_thi,0,",",".").' vnđ - '.$sao.')</b></h3>
                            <p>Bạn hãy kích <span></span> hoặc copy nội dung trong ô textbox hoặc bạn có thể kích vào các biểu tượng mạng xã hội để chia sẻ liên kết</p>
                            <div class="col-xs-12">
                                <div class="col-md-3 col-sm-6 col-xs-6" style="text-align: center">
                                    <p><i style="color: red" class="fa fa-hand-o-down fa-2x"></i></p>
                                    <button type="button" class="btn btn-primary" id="copy_link_tiep_thi"><i class="fa fa-share-alt "></i> Link tiếp thị</button>
                                </div>
                                <div class="col-md-5 col-sm-6 col-xs-6" style="text-align: center">
                                    <p><i style="color: #357ebd" class="fa fa-link fa-2x"></i></p>
                                    <input style="height: 34px;    width: 100%;" id="check_link_tiep_thi" class="form-control"  value="'.$link_tiep_thi.'">
                                    <input hidden  id="link_old" type="password" value="'.$link_tiep_thi.'">
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6" style="text-align: center">
                                    <p><i style="color: #eea236" class="fa fa-globe fa-2x"></i></p>
                                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.$link_tiep_thi.'" style="margin-right: 5px;"  class="btn btn-primary"><i style="background:none" class="fa  fa-facebook"></i></a>
                                    <a target="_blank" href="https://twitter.com/intent/tweet?source=webclient&text='.$link_tiep_thi.'+'.$asign['name'].'" style="margin-right: 5px;"  class="btn btn-info"><i style="background:none" class="fa  fa-twitter"></i></a>
                                    <a target="_blank" href="https://plus.google.com/share?url='.$link_tiep_thi.'" style="margin-right: 5px;" class="btn btn-danger"><i style="background:none" class="fa  fa-google-plus"></i></a>
                                    <a target="_blank" href="mailto:?Subject='.$asign['title'].'&body='.$asign['description'].'%0D%0A%0D%0A'.$link_tiep_thi.'" class="btn btn-warning"><i style="background:none" class="fa  fa-envelope"></i></a>
                                </div>
                                <div class="col-md-12 col-xs-12 col-sm-12" style="margin-top: 20px; display: none" id="box_alert">
                                    <div class="col-xs-12">
                                        <div class="alert alert-block alert-success">
                                            <button type="button" class="close" id="close_alert">
                                                <i class="ace-icon fa fa-times"></i>
                                            </button>

                                            <i class="ace-icon fa fa-check green"></i> Link tiếp thị liên kết đã được copy
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>';
        }
    }
    print_template($asign, 'chitiettour');
}

function validateDate($date, $format = 'd-m-Y')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

