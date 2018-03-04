<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:40 PM
 */
if(!defined('SITE_NAME'))
{
    require_once '../../config.php';
}

require_once DIR.'/controller/default/public.php';
require_once DIR . '/common/paging.php';
require_once DIR . '/common/redict.php';
$data['menu']=menu_getByTop('','','');
$data['config']=config_getByTop(1,'','');
$active='';
$date_now=_returnGetDateTime();

if(isset($_GET['Id'])&&$_GET['Id']!=''){
    if($_GET['Id']=='tour-theo-chu-de')
    {

        $dk='danhmuc_chude_id > 0';
        $active='tour_chu_de';
        $link='/tour-theo-chu-de';
        $name_dm=$data['menu'][20]->name;
        $data['current']=isset($_GET['page'])?$_GET['page']:'1';;
        $data['pagesize']=9;
        $data['count']=tour_count($dk);
        $data['danhsach']=tour_getByPaging($data['current'],$data['pagesize'],'updated desc',$dk);
        $data['PAGING'] = showPagingAtLink($data['count'], $data['pagesize'], $data['current'], '' . SITE_NAME . $link);
//            $name=$data['menu'][1]->name;
        $data['banner']=array(
            'banner_img'=>$data['menu'][20]->img,
            'name'=>$name,
            'url'=>'<li><a href="'.SITE_NAME.'">Trang chủ</a></li><li><span>'.$name_dm.'</span></li>'
        );
        $data['link_anh']=$data['menu'][20]->img;
        $title=$data['menu'][20]->title;
        $description=$data['menu'][20]->description;
        $keyword=$data['menu'][20]->keyword;

        $data['tour_count_down']=tour_getByTop(9,'count_down!="" and count_down>"'.$date_now.'" and '.$dk,'id desc');
        $data['tour_PROMOTIONS']=tour_getByTop(9,'promotion=1 and '.$dk,'id desc');
        $data['tour_sales']=tour_getByTop(9,'price_sales!="" and '.$dk,'id desc');
    }
    else{
        $id=addslashes(strip_tags($_GET['Id']));
        $danhmuc=danhmuc_chude_getByTop(1,'name_url="'.$id.'"','');
        if(count($danhmuc)==0){
            redict(SITE_NAME);
        }
        $active='tour_chu_de';
        $link='/tour-theo-chu-de/';
        $name_dm=$data['menu'][9]->name;
        $dk='danhmuc_chude_id='.$danhmuc[0]->id;

        $data['current']=isset($_GET['page'])?$_GET['page']:'1';;
        $data['pagesize']=9;
        $data['count']=tour_count($dk);
        $data['danhsach']=tour_getByPaging($data['current'],$data['pagesize'],'id desc',$dk);
        $data['PAGING'] = showPagingAtLink($data['count'], $data['pagesize'], $data['current'], '' . SITE_NAME . '/tour/'.$danhmuc[0]->name_url.'/');
        $name=$danhmuc[0]->name;
        $data['banner']=array(
            'banner_img'=>$danhmuc[0]->img,
            'name'=>$name,
            'url'=>'<li><a href="'.SITE_NAME.'">Trang chủ</a></li><li><span>'.$name.'</span></li>'
        );
        $data['link_anh']=$danhmuc[0]->img;
        $title=$danhmuc[0]->title;
        $description=$danhmuc[0]->description;
        $keyword=$danhmuc[0]->keyword;
        $data['tour_count_down']=tour_getByTop(9,'count_down!="" and count_down>"'.$date_now.'" and DanhMuc1Id='.$danhmuc[0]->id,'id desc');
        $data['tour_PROMOTIONS']=tour_getByTop(9,'promotion=1 and DanhMuc1Id='.$danhmuc[0]->id,'id desc');
        $data['tour_sales']=tour_getByTop(9,'price_sales!="" and DanhMuc1Id='.$danhmuc[0]->id,'id desc');
    }
}
else{
    $link_action=$_SERVER['REQUEST_URI'];
    $string_check= strchr($link_action,'tour-du-lich-trong-nuoc');

        $active='tour_chu_de';
        $link='/tour-theo-chu-de/';
        $data_menu=$data['menu'][20];
        $dk='danhmuc_chude_id>0';

    $data['current']=isset($_GET['page'])?$_GET['page']:'1';;
    $data['pagesize']=9;
    $data['count']=tour_count($dk);
    $data['danhsach']=tour_getByPaging($data['current'],$data['pagesize'],'updated desc',$dk);
    $data['PAGING'] = showPagingAtLink($data['count'], $data['pagesize'], $data['current'], '' . SITE_NAME . $link);
    $name=$data_menu->name;
    $data['banner']=array(
        'banner_img'=>$data_menu->img,
        'name'=>$name,
        'url'=>'<li><a href="'.SITE_NAME.'">Trang chủ</a></li><li><span>'.$name.'</span></li>'
    );
    $data['link_anh']=$data_menu->img;
    $title=$data_menu->title;
    $description=$data_menu->description;
    $keyword=$data_menu->keyword;

    $data['tour_count_down']=tour_getByTop(9,'count_down!="" and count_down>"'.$date_now.'" and '.$dk,'id desc');
    $data['tour_PROMOTIONS']=tour_getByTop(9,'promotion=1 and '.$dk,'id desc');
    $data['tour_sales']=tour_getByTop(9,'price_sales!="" and '.$dk,'id desc');
}
$data['tab_tour_title']='active_tab_left';
$data['tab_khachsan_title']='';
$data['tab_tintuc_title']='';

$data['tab_tour']='';
$data['tab_khachsan']='hidden';
$data['tab_tintuc']='hidden';


$title=($title)?$title:'Azbooking.vn';
$description=($description)?$description:'Azbooking.vn';
$keywords=($keyword)?$keyword:'Azbooking.vn';
show_header($title,$description,$keywords,$data);
show_menu($data,$active);
show_banner($data);
show_danhmuc_tour($data);
show_left_danhmuc($data);
show_footer($data);
