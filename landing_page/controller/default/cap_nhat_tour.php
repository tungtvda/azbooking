<?php


if(!defined('DIR')) require_once '../../config.php';
require_once DIR.'/model/tourService.php';
require_once DIR.'/model/adminService.php';
if(isset($_POST['id']) && isset($_POST['name'])&& isset($_POST['so_cho']))
{
    $id =_returnPostParamSecurity('id');
    $name =_returnPostParamSecurity('name');
    $so_cho =_returnPostParamSecurity('so_cho');
    if (!is_numeric($so_cho) &&$so_cho!='') {
        echo 'Bạn vui lòng nhập số chỗ là kiểu số nguyên';
        exit;
    }
//    $districts1 = danhmuc_khachsan_2_getByTop('', 'danhmuc_id='.$Id , 'id ASC');
}else{
    echo 'Bạn không thể cập nhật số chỗ cho tour';
    exit;
}

if(!isset($_SESSION["admin_id"])||!isset($_SESSION["tour_id"])||!isset($_SESSION["TenDangNhap"])||!isset($_SESSION["Full_name"])||!isset($_SESSION["Email"])){
    echo 'Bạn không có quyền cập nhật số chỗ cho tour "'.$name.'"';
    exit;
}
$data_admin=admin_getById($_SESSION["admin_id"]);
if(count($data_admin)==0){
    echo 'Bạn không thể cập nhật số chỗ cho tour';
    exit;
}
$array_tour_id=explode(',',$data_admin[0]->tour_id);
if(!in_array($id,$array_tour_id)){
    echo 'Bạn không có quyền cập nhật số chỗ cho tour "'.$name.'"';
    exit;
}
$data_tour=tour_getById($id);
if(count($data_tour)==0){
    echo 'Bạn không thể cập nhật số chỗ cho tour';
    exit;
}
if($so_cho<0){
    $so_cho=0;
}
$tour_obj=new tour((array)$data_tour[0]);
$tour_obj->so_cho=$so_cho;
tour_update($tour_obj);
echo 1;