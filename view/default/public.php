<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nguyenvietdinh
 * Date: 2/6/14
 * Time: 3:51 PM
 * To change this template use File | Settings | File Templates.
 */
require_once DIR.'/common/cls_fast_template.php';
require_once DIR.'/common/locdautiengviet.php';
require_once DIR . '/common/redict.php';
require_once DIR.'/model/danhmuc_room_typeService.php';
function print_template($data=array(),$tem)
{
    $ft=new FastTemplate(DIR.'/view/default/template');
    $ft->define($tem,$tem.'.tpl');
    $ft->assign('SITE-NAME',SITE_NAME);
    if(count($data)>0)
    {
        $keys=array_keys($data);
        foreach($keys as $item)
        {
            $ft->assign($item,$data[$item]);
        }
    }
    print $ft->parse_and_return($tem);
}

function print_item($file,$ListItem,$LocDau=false,$LocDauAssign=false,$numberformat=false,$userType='')
{
    $id_user='';
    if(isset($_SESSION['user_token'])){
        $data_session=checkSession('', 1);
        $id_user=_return_mc_encrypt($data_session['id']);
    }

    if(count($ListItem)>0)
    {
        $array_var=get_object_vars($ListItem[0]);
        $var_name_array=array_keys($array_var);
        $result='';
        $ft=new FastTemplate(DIR.'/view/default/template/item');
        $ft->define('item',$file.'.tpl');
        $ft->assign('SITE-NAME',SITE_NAME);
        $dem=1;
        foreach($ListItem as $item)
        {

            foreach($var_name_array as $var)
            {
                if($LocDau!=false)
                {
                    if($LocDau==$var)
                    {
                        $ft->assign($LocDauAssign,LocDau($item->$var));
                    }
                }

                if($numberformat!=false)
                {
                    if($numberformat==$var)
                    {
                        $ft->assign($var,number_format($item->$var,0,'.','.'));
                    }
                    else
                    {
                        $ft->assign($var,$item->$var);
                    }
                }
                else
                {
                    $ft->assign($var,$item->$var);
                }
            }

            if(get_class($item)=='danhmuc_tour')
            {
                $ft->assign('link',link_tour($item));
            }
            if(get_class($item)=='video')
            {

                 $class='col-sm-4';
                if($dem==1){
                    $class='col-sm-12';
                }
                $ft->assign('single',$class);
            }
            if(get_class($item)=='tour')
            {
                $show_code='hidden';
                if($item->code!=''){
                    $show_code='';
                }
                $ft->assign('show_code',$show_code);
                $price_sales='';
                $show_sales='hidden';
                if($item->price_sales!=0||$item->price_sales!=''){
                    $show_sales='';
                    $price_sales=number_format((int)$item->price_sales,0,",",".").' vnđ';
                }
                if($item->tour_quoc_te==1){
                    $ft->assign('loai_tour','Tour quốc tế');
                }else{
                    $ft->assign('loai_tour','Tour trong nước');
                }
                $ft->assign('show_sales',$show_sales);
                $ft->assign('price_sales',$price_sales);
                $ft->assign('dem',$dem);
                $ft->assign('link_booking',link_booking($item));
                $songuoi='';
                if($item->so_cho!=''){
                    $songuoi='<div class="price" style="margin-top: 10px">
            <ins><span style="font-size: 16px; color: #000000">Số người: '.$item->so_cho.'</span></ins>
        </div>';
                }
                $ft->assign('so_nguoi',$songuoi);
                if($item->price==0||$item->price==''){
                    $ft->assign('price_format','Liên hệ');
                }
                else{
                    $ft->assign('price_format',number_format((int)$item->price,0,",",".").' vnđ');
                }


                if($item->price==0||$item->price==''){
                    $ft->assign('price_format_sales','');
                }
                else{
                    $ft->assign('price_format_sales',number_format((int)$item->price_sales,0,",",".").' vnđ');
                }

                $content=$item->summary;
                if (strlen($content) > 200) {
                    $ten1=strip_tags($content);

                    $ten = substr($ten1, 0, 200);
                    $name = substr($ten, 0, strrpos($ten, ' ')) . "...";
                    $ft->assign('content',$name);
                } else {
                    $ft->assign('content',strip_tags($content));
                }
                $data_dm=danhmuc_1_getById($item->DanhMuc1Id);
                if(count($data_dm)==0){
                    redict(SITE_NAME);
                }
                $data_dm2=danhmuc_2_getById($item->DanhMuc2Id);
                if(count($data_dm2)==0){
                    redict(SITE_NAME);
                }
                $link=link_tourdetail($item,$data_dm[0]->name_url,$data_dm2[0]->name_url);
                    ;
                $ft->assign('link',$link);
                $ft->assign('link_tiep_thi',$link.'/'.$id_user);
                $key_id='';
                $mes_='Đã hết hạn';
                $date_count='';
                if($item->count_down!=''){
                    $date_now=_returnGetDateTime();
                    $date_count=strtotime($item->count_down);
//                    $date=date('Y-m-d H:i:s', strtotime($item->count_down-$date_now));
                    $key_id=$item->id;
                    $mes_='';
                }
                $arr_destination=explode(',',$item->destination);
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
                $ft->assign('tring_des',$tring_des);
                $ft->assign('key_id',$key_id);
                $ft->assign('mes_',$mes_);
                $ft->assign('date_count',$date_count);
                $ft->assign('start',sao($item->hotel));
                $arr_check=explode(',',$item->departure);
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

                switch($userType){
                    case '1':
                        $sao='4 sao';
                        $price_tiep_thi = round(($item->price_tiep_thi * 50) / 100);
                        break;
                    case '2':
                        $sao='5 sao';
                        $price_tiep_thi = round(($item->price_tiep_thi * 70) / 100);
                        break;
                    case '3':
                        $sao='đại lý';
                        $price_tiep_thi = $item->price_tiep_thi;
                        break;
                    default;
                        $sao='3 sao';
                        $price_tiep_thi = round(($item->price_tiep_thi * 30) / 100);
                }
                if($item->price_tiep_thi==0||$item->price_tiep_thi==''){
                    $ft->assign('price_tiep_thi','');
                }
                else{
                    $ft->assign('price_tiep_thi',number_format((int)$item->price_tiep_thi,0,",",".").' vnđ');
                }

                if($price_tiep_thi==0||$price_tiep_thi==''){
                    $ft->assign('price_tiep_thi_giam_gia','');
                }
                else{
                    $ft->assign('price_tiep_thi_giam_gia',number_format((int)$price_tiep_thi,0,",",".").' vnđ');
                }
                $string_departure_time='';

//                $year_current=date("Y");
                $year_current='2018';
                $full_date=date("d-m-Y");
                if($item->departure_time!=''){
                    $array_item=explode(',',$item->departure_time);
                    if(count($array_item)>0){
                        foreach($array_item as $key=>$value){
                            $array_check_year=explode('/',$value);
                            if(isset($array_check_year[1])&&$array_check_year[1]==12){
                                $year_current=date("Y");
                            }else{
                                $year_current='2018';
                            }
                            $value=$value.'-'.$year_current;
                            $value=str_replace('/','-',$value);
                            if(checkmydate($value) && strtotime($value)>=strtotime($full_date)){
                                if($string_departure_time==''){
                                    $string_departure_time=  $value;
                                }else{
                                    $string_departure_time.= ', '.$value;
                                }
                            }
                        }
                    }
                }
                if($string_departure_time==''){
                    $ft->assign('departure_time','Liên hệ');
                }else{
                    $ft->assign('departure_time', $string_departure_time);
                }

                $ft->assign('khoihanh',$string_khoihanh);
            }
            if(get_class($item)=='tour_img') {
                $class='column';
                if($dem==1){
                    $class='single-col';
                }
                $ft->assign('single',$class);
            }
            if(get_class($item)=='hanhtrinh_color') {
                $class1='';
                $class2='';
                $true='false';
                if($dem==1){
                    $class1='fade active in';
                    $class2='active';
                    $true='true';
                }
                $ft->assign('active_detail',$class1);
                $ft->assign('active_tab',$class2);
                $ft->assign('true_tab',$true);
            }
            if(get_class($item)=='news')
            {
                $ft->assign('created',_returnDateFormatConvert($item->created));
                $content=$item->content;
                if (strlen($content) > 210) {
                    $ten1=strip_tags($content);

                    $ten = substr($ten1, 0, 210);
                    $name = substr($ten, 0, strrpos($ten, ' ')) . "...";
                    $ft->assign('content',$name);
                } else {
                    $ft->assign('content',strip_tags($content));
                }
                $data_dm=danhmuc_tintuc_getById($item->danhmuc_id);
                if(count($data_dm)==0){
                    redict(SITE_NAME);
                }

                $ft->assign('link',link_newsdetail($item,$data_dm[0]->name_url));
            }
            if(get_class($item)=='danhmuc_tintuc')
            {
                $ft->assign('link',link_news($item));
            }
//            if(get_class($item)=='dichvu')
//            {
//                $content=$item->content;
//                if (strlen($content) > 210) {
//                    $ten1=strip_tags($content);
//
//                    $ten = substr($ten1, 0, 210);
//                    $name = substr($ten, 0, strrpos($ten, ' ')) . "...";
//                    $ft->assign('content',$name);
//                } else {
//                    $ft->assign('content',strip_tags($content));
//                }
//                $data_dm=danhmuc_dichvu_getById($item->danhmuc_id);
//                if(count($data_dm)==0){
//                    redict(SITE_NAME);
//                }
//                $ft->assign('link',link_dichvu($item,$data_dm[0]->name_url));
//            }
            if(get_class($item)=='danhmuc_khachsan')
            {
                $ft->assign('link',link_danhmuc_khachsan($item));
            }
            if(get_class($item)=='danhmuc_khachsan_2')
            {
                $data_dm=danhmuc_khachsan_getById($item->danhmuc_id);
                if(count($data_dm)==0){
                    redict(SITE_NAME);
                }
                $ft->assign('link',link_danhmuc_khachsan_2($item,$data_dm[0]->name_url));
            }
            if(get_class($item)=='khachsan')
            {
                if($item->price==0||$item->price==''){
                    $ft->assign('price_format','Liên hệ');
                }
                else{
                    $ft->assign('price_format',number_format((int)$item->price,0,",",".").' vnđ');
                }
                $dichvu='';
                if($item->dichvu!=''){
                    $array_ex=explode('-',$item->dichvu);
                    if(count($array_ex)>0){
                        foreach($array_ex as $row_dichvu){
                            $dichvu.='<li><i class="fa fa-check-square-o"></i> '.trim($row_dichvu).'</li>';
                        }
                    }
                }



                $ft->assign('dichvu_arr',$dichvu);
                $content=$item->content;
                if (strlen($content) > 210) {
                    $ten1=strip_tags($content);

                    $ten = substr($ten1, 0, 210);
                    $name = substr($ten, 0, strrpos($ten, ' ')) . "...";
                    $ft->assign('content',$name);
                } else {
                    $ft->assign('content',strip_tags($content));
                }
                $data_dm=danhmuc_khachsan_getById($item->danhmuc_id);
                if(count($data_dm)==0){
                    redict(SITE_NAME);
                }
                $gia_phong='';
                $data_giaphong=khachsan_room_price_getByTop('','danhmuc_id='.$item->id,'id desc');
                if(count($data_giaphong)>0){
                    foreach($data_giaphong as $row_room){
                        if($row_room->price==0||$row_room->price==''){
                           $gia ='Liên hệ';
                        }
                        else{
                            $gia =number_format((int)$row_room->price,0,",",".").' vnđ';
                        }

                        $gia_phong.='<tr class="search-result-row-item-single">
                <td style="padding: 5px 5px" class="room1 quiet"> '.$row_room->name.' <span style="font-size:8pt;white-space:nowrap;color:#aaa;"></span>
                </td>
                <td style="text-align: center">'.$row_room->amount_people.'</td>
                <td class="totalprice">
                    <div id="divRate" class="top-10 bottom-5" style="text-align: right; padding-right: 20px;">'.$gia.'</div>
                </td>
                <td style="text-align: center; padding: 5px 5px" class="bookroom quiet"><a class="lnkBookHotel clearfix btn btn-sm btn-primary"
                                              href="'.link_khachsandetail($item,$data_dm[0]->name_url).'#booking"
                                              rel="nofollow">Đặt Phòng</a></td>
            </tr>';
                    }

                }
                $ft->assign('gia_phong',$gia_phong);
                $ft->assign('start',sao($item->start));
                $ft->assign('link',link_khachsandetail($item,$data_dm[0]->name_url));
            }
            if(get_class($item)=='khachsan_room_price')
            {
                if($item->price==0||$item->price==''){
                    $ft->assign('price_format','Liên hệ');
                }
                else{
                    $ft->assign('price_format',number_format((int)$item->price,0,",",".").'(vnđ/đêm)');
                }
                $dichvu='';
                if($item->dichvu!=''){
                    $array_ex=explode('-',$item->dichvu);
                    if(count($array_ex)>0){
                        foreach($array_ex as $row_dichvu){
                            $dichvu.='<li style="font-weight: normal"><i class="fa fa-check-square-o"></i> '.trim($row_dichvu).'</li>';
                        }
                    }
                }
                $ft->assign('dichvu_arr',$dichvu);
            }


                $dem=$dem+1;
            $result.=$ft->parse_and_return('item');
        }
        return $result;
    }
    else
    {
        return '';
    }

}
function link_dm_tour1($app)
{
    if($app->tour_quoc_te==0){

        $link='/tour-du-lich-trong-nuoc/';
    }else{
        $link='/tour-du-lich-quoc-te/';
    }
    return SITE_NAME.$link.$app->name_url.'/';
}
function link_dm_tour2($app, $name_url, $tour_quoc_te=0)
{
    if($tour_quoc_te==0){

        $link='/tour-du-lich-trong-nuoc/';
    }else{
        $link='/tour-du-lich-quoc-te/';
    }
    return SITE_NAME.$link.$name_url.'/'.$app->name_url.'/';
}
function link_tourdetail($app,$name_url='',$name2_url='')
{
    if($app->tour_quoc_te==0){

        $link='/tour-du-lich-trong-nuoc/';
    }else{
        $link='/tour-du-lich-quoc-te/';
    }
    if($name2_url==''){
        return SITE_NAME.$link.$name_url.'/'.$app->name_url.'.html';
    }
    else{
        return SITE_NAME.$link.$name_url.'/'.$name2_url.'/'.$app->name_url.'.html';
    }

}
function link_booking($app){
    return SITE_NAME.'/booking?id_booking='._return_mc_encrypt($app->id);
}
function link_news($app)
{
    return SITE_NAME.'/cam-nang/'.$app->name_url.'/';
}
function link_newsdetail($app,$name_url='')
{
    return SITE_NAME.'/cam-nang/'.$name_url.'/'.$app->name_url.'.html';
}
function link_khachsandetail($app,$name_url='')
{
    return SITE_NAME.'/khach-san/'.$name_url.'/'.$app->name_url.'.html';
}
function link_danhmuc_khachsan($app)
{
    return SITE_NAME.'/khach-san/'.$app->name_url.'/';
}
function link_danhmuc_khachsan_2($app, $url_dm1)
{
    return SITE_NAME.'/khach-san/'.$url_dm1.'/'.$app->name_url.'/';
}
function link_dichvu($app,$name_url='')
{
    return SITE_NAME.'/dich-vu/'.$name_url.'/'.$app->name_url.'.html';
}
function link_danhmucdichvu($app)
{
    return SITE_NAME.'/dich-vu/'.$app->name_url.'/';
}








function link_khachsan($app)
{
    return SITE_NAME.'/'.LocDau($app->Name).'-l3'.$app->Id.'.html';
}
function link_thuexe($app)
{
    return SITE_NAME.'/'.LocDau($app->Name).'-l4'.$app->Id.'.html';
}
function link_ykien($app)
{
    return SITE_NAME.'/'.LocDau($app->Name).'-l5'.$app->Id.'.html';
}

function sao($app)
{
    $sao = "";
    if ($app == 0) {
        $sao = '<i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
    } else {


        if ($app == 1) {
            $sao = '<i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
        } else {
            if ($app == 2) {
                $sao = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
            } else {
                if ($app == 3) {
                    $sao = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
                } else {
                    if ($app == 4) {
                        $sao = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>';
                    } else {
                        $sao = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
                    }

                }

            }
        }
    }
    return $sao;
}

function checkmydate($date) {
    $tempDate = explode('-', $date);
    if(count($tempDate)==3){
        // checkdate(month, day, year)
        if(is_numeric($tempDate[0])&&is_numeric($tempDate[1]) && is_numeric($tempDate[2]))
        {
            return checkdate($tempDate[1], $tempDate[1], $tempDate[2]);
        }else{
            return 0;
        }

    }else{
        return 0;
    }

}