<?php
require_once '../../config.php';
require_once DIR.'/model/khachsanService.php';
require_once DIR.'/model/danhmuc_khachsanService.php';
require_once DIR.'/model/danhmuc_room_typeService.php';
require_once DIR.'/view/admin/khachsan.php';
require_once DIR.'/common/messenger.php';
require_once DIR.'/common/locdautiengviet.php';
$data=array();
$insert=true;
returnCountData();
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new khachsan();
            $new_obj->id=$_GET["id"];
            khachsan_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/khachsan.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=khachsan_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/khachsan.php');
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
    $data['listfkey']['danhmuc_id']=danhmuc_khachsan_getByAll();
    $data['listfkey']['room_type']=danhmuc_room_type_getByAll();
    if(isset($_GET["action_all"]))
    {
        if($_GET["action_all"]=="ThemMoi")
        {
            $data['tab2_class']='default-tab current';
            $data['tab1_class']=' ';
        }
        else
        {
            $List_khachsan=khachsan_getByAll();
            foreach($List_khachsan as $khachsan)
            {
                if(isset($_GET["check_".$khachsan->id])) khachsan_delete($khachsan);
            }
            header('Location: '.SITE_NAME.'/controller/admin/khachsan.php');
        }
    }
    if(isset($_POST["danhmuc_id"])&&isset($_POST["name"])&&isset($_POST["name_url"])&&isset($_POST["start"])&&isset($_POST["price"])&&isset($_POST["room_type"])&&isset($_POST["img"])&&isset($_POST["content"])&&isset($_POST["title"])&&isset($_POST["keyword"])&&isset($_POST["description"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['danhmuc_id']))
       $array['danhmuc_id']='0';
       if(!isset($array['highlights']))
       $array['highlights']='0';
       if(!isset($array['name']))
       $array['name']='0';
       if(!isset($array['name_url']))
       $array['name_url']='0';
        $array['name_url']=LocDau($array['name']);
       if(!isset($array['start']))
       $array['start']='0';
       if(!isset($array['price']))
       $array['price']='0';
       if(!isset($array['room_type']))
       $array['room_type']='0';
        $mutil_dm='';
        if($_POST["room_type"]!=''){
            $mutil_dm=implode(',',$_POST["room_type"]);
        }
        $array['room_type']=$mutil_dm;
       if(!isset($array['img']))
       $array['img']='0';
       if(!isset($array['content']))
       $array['content']='0';
       if(!isset($array['title']))
       $array['title']='0';
       if(!isset($array['keyword']))
       $array['keyword']='0';
       if(!isset($array['description']))
       $array['description']='0';
      $new_obj=new khachsan($array);
        if($insert)
        {
            khachsan_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/khachsan.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            khachsan_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/khachsan.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=khachsan_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=khachsan_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_khachsan($data);
}
else
{
     header('location: '.SITE_NAME);
}
