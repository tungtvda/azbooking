<?php
/**
 * Created by PhpStorm.
 * User: ductho
 * Date: 11/20/14
 * Time: 11:00 AM
 */

$array_files=scandir(DIR.'/model');
foreach ($array_files as $filename) {
    $path = DIR.'/model/' . $filename;
    if (is_file($path)) {
        require_once $path;
    }
}
//
$array_files=scandir(DIR.'/view/default');
foreach ($array_files as $filename) {
    $path = DIR.'/view/default/' . $filename;
    if (is_file($path)) {
        require_once $path;
    }
}
function show_header($title,$description,$keyword,$data1=array())
{
    $data=array();
    $data['Title']=$title;
    $data['Description']=$description;
    $data['Keyword']=$keyword;
    $data['config']=$data1['config'];
    if (isset($data1['link_anh'])) {
        $data['link_anh'] = $data1['link_anh'];
    } else {
        $data['link_anh'] = $data1['config'][0]->Logo;
    }
    view_header($data);
}
function show_header_tiep_thi($title,$description,$keyword,$data1=array())
{
    if(!isset($_SESSION['user_token'])){
        redict(SITE_NAME.'/tiep-thi-lien-ket/thanh-vien/');
    }
    $data=array();
    $data['Title']=$title;
    $data['Description']=$description;
    $data['Keyword']=$keyword;
    $data['config']=$data1['config'];
    if (isset($data1['link_anh'])) {
        $data['link_anh'] = $data1['link_anh'];
    } else {
        $data['link_anh'] = $data1['config'][0]->Logo;
    }
    view_header_tiep_thi($data);
}
function show_header2($title,$description,$keyword,$data1=array())
{
    $data=array();
    $data['Title']=$title;
    $data['Description']=$description;
    $data['Keyword']=$keyword;
    $data['config']=$data1['config'];
    $_SESSION['lienhe']=$data['config'][0]->Phone;
    view_header2($data);
}

function  show_slide($data1=array())
{
    $data=array();
    $data['slide']=slide_getByTop('','','Id desc');
    $data['danhmuc_1_timkiem_trongnuoc']=danhmuc_1_getByTop('','id!=1 and tour_quoc_te=0','position asc');
    $data['danhmuc_1_timkiem_quocte']=danhmuc_1_getByTop('','id!=1 and tour_quoc_te=1','position asc');
    $data['danhmuc_1_timkiem']=danhmuc_1_getByTop('','id!=1','position asc');
    $data['danhmuc_khachsan_timkiem']=danhmuc_khachsan_getByTop('','','position asc');
    $data['danhmuc_tintuc_timkiem']=danhmuc_tintuc_getByTop('','','position asc');
    $data['departure_timkiem']=departure_getByTop('','','position asc');
    view_slide($data);
}

function  show_left($data1=array(),$active='trangchu')
{
    $data=array();
//    $data['danhmuctour_left']=danhmuctour_getByTop('','','ViTri asc');
//    $data['tieude_13']=tieude_getById(13);
//    $data['tin_moinhat']=tintuc_getByTop(10,'','Id desc');
//    $data['quangcao_left']=quangcao_getByTop('','TrangThai=1','Id asc');
    $data['danhmuc_subport']=danhmuc_subport_getByTop('','','id desc');
    $data['news_list']=news_getByTop(4,'','id desc');
    view_left($data);
}

function  show_left2($data1=array())
{
    $data=array();

    $data['danhmuc1']=$data1['danhmuc1'];
    $data['doitac']=$data1['doitac'];
    $data['sanpham_left']=$data1['sanpham_left'];
    $data['tag']=$data1['tag'];
    view_left2($data);
}
function  show_right($data1=array())
{
    $data=array();
    $data['tintuc_right']=news_getByTop('10','','id desc');
    $data['video_right']=video_getByTop('7','','id desc');
    $data['hotro_right']=subport_getByTop('','','id desc');
    $data['tag_right']=tag_getByTop('','','position asc');
    $data['price_right']=price_timkiem_getByTop('','','position asc');
    view_right($data);
}
function show_menu($data1=array(),$active='trangchu')
{
    $data=array();
    $data['config']=$data1['config'];
    $data['active']=$active;
    $data['menu']=$data1['menu'];
    $data['danhmuc_menu']=danhmuc_1_getByTop('','id!=1','position asc');
    $data['danhmuc_chude']=danhmuc_chude_getByTop('','id!=1','position asc');
    $data['danhmuc_khachsan']=danhmuc_khachsan_getByTop('','id!=1','position asc');
    $data['danhmuc_tintuc']=danhmuc_tintuc_getByTop('','','position asc');
    $data['danhmuc_menu']=danhmuc_1_getByTop('','id!=1 and tour_quoc_te=0','position asc');
    $data['danhmuc_menu_quocte']=danhmuc_1_getByTop('','id!=1 and tour_quoc_te=1','position asc');
    view_menu($data);
}

function show_sidebar_tiep_thi($data1=array(),$active='trangchu')
{
    $data=array();
    $data['config']=$data1['config'];
    $data['active']=$active;
    view_sidebar_tiep_thi($data);
}
function show_navbar_tiep_thi($data1=array())
{
    $data=array();
    $data=$data1;
    view_navbar_tiep_thi($data);
}
function show_banner($data1=array())
{
    $data=array();
    $data['banner']=$data1['banner'];
    view_banner($data);
}

function show_footer($data1=array())
{
    $data=array();
    $data['config']=$data1['config'];
    $data['mangxahoi']=social_getByTop(1,'','');
    $data['info']=info_mix_getByTop('','','id asc');
    $data['danhmuc_menu_footer']=danhmuc_1_getByTop('','id!=1','position asc');
    view_footer($data);
}
function show_footer_tiep_thi($data1=array())
{
    $data=array();
    $data=$data1;
    view_footer_tiep_thi($data);
}
function  show_left_danhmuc($data1=array())
{
    $data=$data1;
    $data['tintuc_left']=news_getByTop('10','','id desc');
    $data['danhmuc_1_timkiem_trongnuoc']=danhmuc_1_getByTop('','id!=1 and tour_quoc_te=0','position asc');
    $data['danhmuc_1_timkiem_quocte']=danhmuc_1_getByTop('','id!=1 and tour_quoc_te=1','position asc');
    $data['danhmuc_1_timkiem']=danhmuc_1_getByTop('','id!=1','position asc');
    $data['danhmuc_khachsan_timkiem']=danhmuc_khachsan_getByTop('','','position asc');
    $data['danhmuc_tintuc_timkiem']=danhmuc_tintuc_getByTop('','','position asc');
    $data['departure_timkiem']=departure_getByTop('','','position asc');
    $data['tag_left']=tag_getByTop('','','id desc');

    view_left_danhmuc($data);
}
function returnTourSales(){
    $data_tour_sales = tour_getByTop(6, 'price_sales!="" and status=1', 'id desc');
    $string_re='';
    $count=1;
    foreach ($data_tour_sales as $row){
        if ($row->price == 0 || $row->price == '') {
            $price = 'Liên hệ';
        } else {
            $price = number_format((int)$row->price, 0, ",", ".") . ' vnđ';
        }
        $price_list_sales = number_format((int)$row->price_sales, 0, ",", ".") . ' vnđ';
        $count_check=$count-1;
        if($count==1 || $count_check%3==0)
        {
            $string_re.=' <div class="row" style="width: 100%; float: left; ">';
        }
        $data_danhmuc_1 = danhmuc_1_getById($row->DanhMuc1Id);
        $data_danhmuc_2 = danhmuc_2_getById($row->DanhMuc2Id);
        $name_url_dm1 = '';
        if (count($data_danhmuc_1) > 0) {
            $name_url_dm1 = $data_danhmuc_1[0]->name_url;
        }
        $name_url_dm2 = '';
        if (count($data_danhmuc_2) > 0) {
            $name_url_dm2 = $data_danhmuc_2[0]->name_url;
        }
        $link_tour_list = link_tourdetail($row, $name_url_dm1, $name_url_dm2);

        $string_re.=' <div class="col-lg-4 col-md-6"
                                                 style="margin-bottom: 30px;padding-right: 15px; padding-left: 15px;width: 29.7%;float: left">
                                                <div class="card h-100"
                                                     style="height: 100% !important;position: relative;display: flex;-webkit-box-orient: vertical;    -webkit-box-direction: normal;flex-direction: column;border-radius: 0.25rem;background: transparent;background: transparent;">
                                                    <div class="single-post post-style-1"
                                                         style="     text-align: center;   height: 100%;position: relative;overflow: hidden; box-shadow: 0px 0px 5px rgba(0,0,0,.1);    border: 1px solid #ddd;background: #fff;">

                                                        <div class="blog-image"
                                                             style="max-height: 200px;    overflow: hidden;">
                                                           <a href="'.$link_tour_list.'"> <img style="width: 100%;"
                                                                 src="'._returnCheckLinkImg($row->img).'"
                                                                 alt="'.$row->name.'" title="'.$row->name.'"></a></div>
                                                        <div class="blog-info">

                                                            <h4 class="'.$row->name.'"
                                                                style="padding: 10px; font-size: 14px;white-space: nowrap;text-overflow: ellipsis;    overflow: hidden;margin-bottom: 5px;margin-top: 5px;">
                                                                <a style="text-decoration: none;color:#0275d8;"
                                                                   href="'.$link_tour_list.'">'.$row->name.'</a></h4>
                                                            <p style="    font-weight: normal;margin-top: 0px; font-size: 14px">
                                                                Thời gian: '. $row->durations.'</p>
                                                            <ul class="post-footer"
                                                                style="bottom: 0;left: 0;right: 0;    text-align: center;    padding: 0px;margin: 0;">
                                                                <li style="width: 49.6%;margin: 0px; display: inline-block;border-right: 1px solid #fff;background: #EDF3F3;float: left;">
                                                                    <a style="line-height: 45px;width: 100%;    display: inline-block;text-decoration: none;    color: #a50505;font-size: 14px;"
                                                                       href="'.$link_tour_list.'">
                                                                        '.$price.'
                                                                    </a>
                                                                </li>
                                                                <li style="width: 50%;margin: 0px; display: inline-block;background: #EDF3F3;float: left;">
                                                                    <a style="line-height: 45px;width: 100%;    display: inline-block;text-decoration: none;    font-size: 12px;    color: #7e7c7c;"
                                                                       href="'.$link_tour_list.'">
                                                                        <del>'.$price_list_sales.'</del>
                                                                    </a>
                                                                </li>
                                                            </ul>

                                                        </div><!-- blog-info -->
                                                    </div><!-- single-post -->
                                                </div><!-- card -->
                                            </div>';
        if($count%3==0)
        {
            $string_re.=' </div>';
        }
        $count++;
    }
    return  $string_re;
}