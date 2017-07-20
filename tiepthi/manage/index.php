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
require_once DIR . '/common/redict.php';
$data['config']=config_getByTop(1,'','');
$data['count_tour']=tour_count('price_tiep_thi!=""');
$data['tour_noibat']=tour_count('promotion=1 and price_tiep_thi!=""');
$data['count_giangia']=tour_count('price_sales!="" and price_tiep_thi!=""');
$data['count_trongnuoc']=tour_count('tour_quoc_te=0 and price_tiep_thi!=""');
$data['count_quocte']=tour_count('tour_quoc_te=1 and price_tiep_thi!=""');

$title='Hệ thống quản lý tiếp thị liên kết';
$description='Hệ thống quản lý tiếp thị liên kết';
$keyword='Hệ thống quản lý tiếp thị liên kết';
$data['name_module']='Dashboard';
show_header_tiep_thi($title,$description,$keyword,$data);
show_sidebar_tiep_thi($data,'trangchu');
show_navbar_tiep_thi($data);
show_tiepthi($data);
show_footer_tiep_thi($data);