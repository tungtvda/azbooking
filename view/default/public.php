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

function print_item($file,$ListItem,$LocDau=false,$LocDauAssign=false,$numberformat=false)
{
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
                $ft->assign('price_format',number_format($item->price,0,",","."));
                $content=$item->summary;
                if (strlen($content) > 200) {
                    $ten1=strip_tags($content);

                    $ten = substr($ten1, 0, 200);
                    $name = substr($ten, 0, strrpos($ten, ' ')) . "...";
                    $ft->assign('content',$name);
                } else {
                    $ft->assign('content',strip_tags($content));
                }
                $data_dm=danhmuc_tour_getById($item->danhmuc_id);
                if(count($data_dm)==0){
                    redict(SITE_NAME);
                }
                $ft->assign('link',link_tourdetail($item,$data_dm[0]->name_url));

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
                $content=$item->content;
                if (strlen($content) > 210) {
                    $ten1=strip_tags($content);

                    $ten = substr($ten1, 0, 210);
                    $name = substr($ten, 0, strrpos($ten, ' ')) . "...";
                    $ft->assign('content',$name);
                } else {
                    $ft->assign('content',strip_tags($content));
                }
                $data_dm=danhmuc_tour_getById($item->danhmuc_id);
                if(count($data_dm)==0){
                    redict(SITE_NAME);
                }
                $ft->assign('link',link_newsdetail($item,$data_dm[0]->name_url));
            }
            if(get_class($item)=='dichvu')
            {
                $content=$item->content;
                if (strlen($content) > 210) {
                    $ten1=strip_tags($content);

                    $ten = substr($ten1, 0, 210);
                    $name = substr($ten, 0, strrpos($ten, ' ')) . "...";
                    $ft->assign('content',$name);
                } else {
                    $ft->assign('content',strip_tags($content));
                }
                $data_dm=danhmuc_dichvu_getById($item->danhmuc_id);
                if(count($data_dm)==0){
                    redict(SITE_NAME);
                }
                $ft->assign('link',link_dichvu($item,$data_dm[0]->name_url));
            }
            if(get_class($item)=='danhmuc_khachsan')
            {
                $ft->assign('link',link_danhmuc_khachsan($item));
            }
            if(get_class($item)=='khachsan')
            {
                $ft->assign('price_format',number_format((int)$item->price,0,",","."));
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
                $ft->assign('start',sao($item->start));
                $ft->assign('link',link_khachsandetail($item,$data_dm[0]->name_url));
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
    return SITE_NAME.'/tour/'.$app->name_url.'/';
}
function link_dm_tour2($app, $name_url)
{
    return SITE_NAME.'/tour/'.$name_url.'/'.$app->name_url.'/';
}
function link_tourdetail($app,$name_url='')
{
    return SITE_NAME.'/tour/'.$name_url.'/'.$app->name_url.'.html';
}

function link_news($app)
{
    return SITE_NAME.'/tin-tuc/'.$app->name_url.'/';
}
function link_newsdetail($app,$name_url='')
{
    return SITE_NAME.'/tin-tuc/'.$name_url.'/'.$app->name_url.'.html';
}
function link_khachsandetail($app,$name_url='')
{
    return SITE_NAME.'/khach-san/'.$name_url.'/'.$app->name_url.'.html';
}
function link_danhmuc_khachsan($app)
{
    return SITE_NAME.'/khach-san/'.$app->name_url.'/';
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

