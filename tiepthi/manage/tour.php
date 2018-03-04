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
$data['config']=config_getByTop(1,'','');
if(isset($_GET['type'])){
    $type=_returnGetParamSecurity('type');
}else{
    $type=0;
}
$data['current']=isset($_GET['page'])?$_GET['page']:'1';
$data['pagesize']=10;
$dk='price_tiep_thi!="" and status=1 ';
$name_module='Danh sách tour';
$data['active_tab']='all';
switch($type){
    case '1':
        $dk .=' and promotion=1';
        $name_module='Danh sách tour nổi bật';
        $data['active_tab']='noi_bat';
        break;
    case '2':
        $dk .=' and price_sales!=""';
        $name_module='Danh sách tour giảm giá';
        $data['active_tab']='giam_gia';
        break;
    case '3':
        $dk .=' and tour_quoc_te=1';
        $name_module='Danh sách tour quốc tế';
        $data['active_tab']='quoc_te';
        break;
    case '4':
        $dk .=' and tour_quoc_te=0';
        $name_module='Danh sách tour trong nước';
        $data['active_tab']='trong_nuoc';
        break;
}
$link='/tiep-thi-lien-ket/tour?type='.$type;
$data['count']=tour_count($dk);
$data['danhsach']=tour_getByPaging($data['current'],$data['pagesize'],'id desc',$dk);
$data['PAGING'] = showPagingAtLinkTiepThi($data['count'], $data['pagesize'], $data['current'], '' . SITE_NAME . $link);


$data['breadcrumb']="<li class='active'>Tour</li>";

$title='Hệ thống quản lý tiếp thị liên kết';
$description='Hệ thống quản lý tiếp thị liên kết';
$keyword='Hệ thống quản lý tiếp thị liên kết';
$data['name_module']=$name_module;
$data['title_table']=$name_module;
show_header_tiep_thi($title,$description,$keyword,$data);
show_sidebar_tiep_thi($data,'tour');
show_navbar_tiep_thi($data);
show_tiepthi_tour($data);
show_footer_tiep_thi($data);