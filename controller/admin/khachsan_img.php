<?php
require_once '../../config.php';
require_once DIR.'/model/khachsan_imgService.php';
require_once DIR.'/model/khachsanService.php';
require_once DIR.'/view/admin/khachsan_img.php';
require_once DIR.'/common/messenger.php';
$data=array();
$insert=true;
returnCountData();
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new khachsan_img();
            $new_obj->id=$_GET["id"];
            khachsan_img_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/khachsan_img.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=khachsan_img_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/khachsan_img.php');
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
            $List_khachsan_img=khachsan_img_getByAll();
            foreach($List_khachsan_img as $khachsan_img)
            {
                if(isset($_GET["check_".$khachsan_img->id])) khachsan_img_delete($khachsan_img);
            }
            header('Location: '.SITE_NAME.'/controller/admin/khachsan_img.php');
        }
    }
    if(isset($_POST["danhmuc_id"])&&isset($_POST["name"])&&isset($_POST["img"])&&isset($_POST["position"]))
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
       if(!isset($array['position']))
       $array['position']='0';
      $new_obj=new khachsan_img($array);
        if($insert)
        {
            khachsan_img_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/khachsan_img.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            khachsan_img_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/khachsan_img.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=khachsan_img_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=khachsan_img_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_khachsan_img($data);
}
else
{
     header('location: '.SITE_NAME);
}
