<?php
require_once '../../config.php';
require_once DIR.'/model/slide_indexService.php';
require_once DIR.'/view/admin/slide_index.php';
require_once DIR.'/common/messenger.php';
$data=array();
$insert=true;
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new slide_index();
            $new_obj->id=$_GET["id"];
            slide_index_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/slide_index.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=slide_index_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/slide_index.php');
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
    if(isset($_GET["action_all"]))
    {
        if($_GET["action_all"]=="ThemMoi")
        {
            $data['tab2_class']='default-tab current';
            $data['tab1_class']=' ';
        }
        else
        {
            $List_slide_index=slide_index_getByAll();
            foreach($List_slide_index as $slide_index)
            {
                if(isset($_GET["check_".$slide_index->id])) slide_index_delete($slide_index);
            }
            header('Location: '.SITE_NAME.'/controller/admin/slide_index.php');
        }
    }
    if(isset($_POST["name"])&&isset($_POST["contents_short"])&&isset($_POST["img"])&&isset($_POST["img_small"])&&isset($_POST["link"])&&isset($_POST["position"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['name']))
       $array['name']='0';
       if(!isset($array['contents_short']))
       $array['contents_short']='0';
       if(!isset($array['img']))
       $array['img']='0';
       if(!isset($array['img_small']))
       $array['img_small']='0';
       if(!isset($array['link']))
       $array['link']='0';
       if(!isset($array['position']))
       $array['position']='0';
      $new_obj=new slide_index($array);
        if($insert)
        {
            slide_index_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/slide_index.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            slide_index_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/slide_index.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=slide_index_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=slide_index_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_slide_index($data);
}
else
{
     header('location: '.SITE_NAME);
}
