<?php
require_once '../../config.php';
require_once DIR.'/model/khachsanService.php';
require_once DIR.'/model/danhmuc_khachsanService.php';
require_once DIR.'/model/khachsan_imgService.php';
require_once DIR.'/model/khachsan_room_priceService.php';
require_once DIR.'/view/admin/khachsan.php';
require_once DIR.'/common/messenger.php';
require_once DIR.'/common/locdautiengviet.php';
$data=array();
$insert=true;
if( $_SESSION["Quyen"]==1) {
    returnCountData();
}
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["id"]))
    {
        if($_GET["action"]=="delete")
        {
            if( $_SESSION["Quyen"]==1) {
                $new_obj = new khachsan();
                $new_obj->id = $_GET["id"];
                $id=addslashes(strip_tags($_GET["id"]));
                $data_check=khachsan_getById($id);
                if(count($data_check)>0){
                    $new_img_obj = new khachsan_img();
                    $new_img_obj->danhmuc_id=$id;
                    khachsan_img_danhmuc_delete($new_img_obj);

                    $new_room_obj = new khachsan_room_price();
                    $new_room_obj->danhmuc_id=$id;
                    khachsan_room_danhmuc_delete($new_img_obj);
                }
                khachsan_delete($new_obj);
            }
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
    if( $_SESSION["Quyen"]==1){
        $data['listfkey']['danhmuc_id']=danhmuc_khachsan_getByAll();
    }
    else{
        $data['listfkey']['danhmuc_id']=danhmuc_khachsan_getById($_SESSION["khach_san_id"]);
    }

    if(isset($_GET["action_all"]))
    {
        if($_GET["action_all"]=="ThemMoi")
        {
            $data['tab2_class']='default-tab current';
            $data['tab1_class']=' ';
        }
        else
        {
            if( $_SESSION["Quyen"]==1){
                $List_khachsan=khachsan_getByAll();
                foreach($List_khachsan as $khachsan)
                {
                    if(isset($_GET["check_".$khachsan->id])) khachsan_delete($khachsan);
                }

            }
            header('Location: '.SITE_NAME.'/controller/admin/khachsan.php');
        }
    }
    if(isset($_POST["danhmuc_id"])&&isset($_POST["name"])&&isset($_POST["name_url"])&&isset($_POST["start"])&&isset($_POST["price"])&&isset($_POST["dichvu"])&&isset($_POST["img"])&&isset($_POST["address"])&&isset($_POST["phone"])&&isset($_POST["email"])&&isset($_POST["map"])&&isset($_POST["content"])&&isset($_POST["title"])&&isset($_POST["keyword"])&&isset($_POST["description"]))
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
       if(!isset($array['dichvu']))
       $array['dichvu']='0';
       if(!isset($array['img']))
       $array['img']='0';
       if(!isset($array['address']))
       $array['address']='0';
        if(!isset($array['phone']))
            $array['phone']='0';
        if(!isset($array['email']))
            $array['email']='0';
       if(!isset($array['map']))
       $array['map']='0';
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
            if( $_SESSION["Quyen"]==1){
                khachsan_insert($new_obj);

            }
            header('Location: '.SITE_NAME.'/controller/admin/khachsan.php');
        }
        else
        {
            if( $_SESSION["Quyen"]==1){
                $new_obj->id=$_GET["id"];
            }
            else{
                $new_obj->id=$_SESSION["khach_san_id"];
            }
            khachsan_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/khachsan.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    if( $_SESSION["Quyen"]==1){
        $data['count_paging']=khachsan_count('');
        $data['page']=isset($_GET['page'])?$_GET['page']:'1';
        $data['table_body']=khachsan_getByPagingReplace($data['page'],20,'id DESC','');
    }
    else{
        $data['count_paging']=khachsan_count('id='.$_SESSION["khach_san_id"]);
        $data['page']=isset($_GET['page'])?$_GET['page']:'1';
        $data['table_body']=khachsan_getByPagingReplace($data['page'],20,'id DESC','khachsan.id='.$_SESSION["khach_san_id"]);
    }

    // gọi phương thức trong tầng view để hiển thị
    view_khachsan($data);
}
else
{
     header('location: '.SITE_NAME);
}
