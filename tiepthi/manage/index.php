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

$title='Hệ thống quản lý tiếp thị liên kết';
$description='Hệ thống quản lý tiếp thị liên kết';
$keyword='Hệ thống quản lý tiếp thị liên kết';
$data['name_module']='Dashboard';
show_header_tiep_thi($title,$description,$keyword,$data);
show_sidebar_tiep_thi($data,'trangchu');
show_navbar_tiep_thi($data);
show_tiepthi();
show_footer_tiep_thi($data);