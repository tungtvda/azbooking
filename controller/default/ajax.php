<?php


if(!defined('DIR')) require_once '../../config.php';
require_once DIR.'/model/danhmuc_1Service.php';
require_once DIR.'/model/danhmuc_2Service.php';

if (isset($_POST['Tour']))
{
    $Id = $_POST['Tour'];
    $districts1 = danhmuc_2_getByTop('', 'danhmuc1_id='.$Id , 'id ASC');
}
$str = '';
if($Id=='tour_trong_nuoc'||$Id=='tour_quoc_te'){
    if($Id=="tour_quoc_te"){
        $dk='tour_quoc_te=1 and id!=1';
    }else{
        $dk='tour_quoc_te=0 and id!=1';
    }
    $data_danhmuc_1=danhmuc_1_getByTop('',$dk,'position asc');
    if(count($data_danhmuc_1)>0){
        foreach($data_danhmuc_1 as $row_1){
            $data_danhmuc_2=danhmuc_2_getByTop('','danhmuc1_id='.$row_1->id,'position asc');
            if(count($data_danhmuc_2)>0){
                foreach($data_danhmuc_2 as $row_2){
                    $str .= "<option value=".$row_2->id.">$row_2->name</option>";
                }
            }
        }
    }else{
        $str .= '<option value="1">Chưa có điểm đến</option>';
    }
}
else{
    if(count($districts1)>0)
    {
        foreach($districts1 as $dis)
        {
            $str .= "<option value=".$dis->id.">$dis->name</option>";
        }
    }
    else{
        $str .= '<option value="1">Chọn điểm đến</option>';
    }
}


echo $str;