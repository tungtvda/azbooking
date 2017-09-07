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
$data['menu']=menu_getByTop('','','');
$data['config']=config_getByTop(1,'','');
////

$data['video_index']=video_getByTop(1,'','id desc');
$data['slide']=slide_index_getByTop('','','position asc');
$data['dichvu']=dichvu_getByTop('','','position asc');
$title=$data['menu'][0]->title;
$description=$data['menu'][0]->description;
$keyword=$data['menu'][0]->keyword;
$title=($title)?$title:'Azbooking.vn';
$description=($description)?$description:'Azbooking.vn';
$keywords=($keyword)?$keyword:'Azbooking.vn';
show_index($data);

