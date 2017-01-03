<?php
require_once '../../config.php';
require_once DIR.'/model/khachsan_room_priceService.php';
require_once DIR.'/model/khachsanService.php';
require_once DIR.'/view/admin/khachsan_room_price.php';
require_once DIR.'/common/messenger.php';
$data=array();
$insert=true;
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new khachsan_room_price();
            $new_obj->id=$_GET["id"];
            khachsan_room_price_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/khachsan_room_price.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=khachsan_room_price_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/khachsan_room_price.php');
        }
        else
        {
            $data['tab1_class']='default-tab current';
        }
    }
    else
    {
        $data['tab1_class']='default-tab current';
    }
    $data['listfkey']['danhmuc_id']=khachsan_getByAll();
    if(isset($_GET["action_all"]))
    {
        if($_GET["action_all"]=="ThemMoi")
        {
            $data['tab2_class']='default-tab current';
            $data['tab1_class']=' ';
        }
        else
        {
            $List_khachsan_room_price=khachsan_room_price_getByAll();
            foreach($List_khachsan_room_price as $khachsan_room_price)
            {
                if(isset($_GET["check_".$khachsan_room_price->id])) khachsan_room_price_delete($khachsan_room_price);
            }
            header('Location: '.SITE_NAME.'/controller/admin/khachsan_room_price.php');
        }
    }
    if(isset($_POST["danhmuc_id"])&&isset($_POST["name"])&&isset($_POST["img"])&&isset($_POST["description"])&&isset($_POST["dichvu"])&&isset($_POST["price"])&&isset($_POST["amount_people"])&&isset($_POST["amount_room"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['danhmuc_id']))
       $array['danhmuc_id']='0';
       if(!isset($array['name']))
       $array['name']='0';
       if(!isset($array['img']))
       $array['img']='0';
       if(!isset($array['description']))
       $array['description']='0';
       if(!isset($array['dichvu']))
       $array['dichvu']='0';
       if(!isset($array['price']))
       $array['price']='0';
       if(!isset($array['amount_people']))
       $array['amount_people']='0';
       if(!isset($array['amount_room']))
       $array['amount_room']='0';
      $new_obj=new khachsan_room_price($array);
        if($insert)
        {
            khachsan_room_price_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/khachsan_room_price.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            khachsan_room_price_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/khachsan_room_price.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=khachsan_room_price_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=khachsan_room_price_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_khachsan_room_price($data);
}
else
{
     header('location: '.SITE_NAME);
}
