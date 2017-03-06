<?php


if(!defined('DIR')) require_once '../../config.php';
require_once DIR.'/model/danhmuc_khachsanService.php';
require_once DIR.'/model/danhmuc_khachsan_2Service.php';

if (isset($_POST['KhachSan']))
{
    $Id = $_POST['KhachSan'];
    $districts1 = danhmuc_khachsan_2_getByTop('', 'danhmuc_id='.$Id , 'id ASC');
}

$str = '';
if(count($districts1)>0)
{
    foreach($districts1 as $dis)
    {
        $str .= "<option value=".$dis->id.">$dis->name</option>";
    }
}
else{
    $str .= '<option value="1">Chọn danh mục cấp 2</option>';
}
echo $str;