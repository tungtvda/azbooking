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
$data['tour_PROMOTIONS']=tour_getByTop(6,'promotion=1 ','id desc');
//
$data['khachsan_index']=khachsan_getByTop(9,'highlights=1 ','id desc');
//

//$data['tintuc_index']=news_getByTop(8,'','id desc');

$title=$data['menu'][0]->title;
$description=$data['menu'][0]->description;
$keyword=$data['menu'][0]->keyword;
$title=($title)?$title:'Dulichchauau.org';
$description=($description)?$description:'Dulichchauau.org';
$keywords=($keyword)?$keyword:'Dulichchauau.org';
show_header($title,$description,$keywords,$data);
show_menu($data,'trangchu');
show_slide($data);
show_index($data);
show_footer($data);
