<?php
if(!defined('DIR')) require_once '../../config.php';
require_once DIR . '/controller/default/public.php';
require_once DIR . '/model/tourService.php';
require_once DIR . '/model/tourService.php';
$data_tour_sales = tour_getByTop(6, 'price_sales!="" and status=1', 'id desc');
//if(count($data_tour_sales)<=0){
//    $data_tour_sales = tour_getByTop(6, 'promotion=1 and status=1 ', 'id desc');
//}
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

echo $string_re;