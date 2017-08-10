<?php
require_once '../../config.php';
require_once DIR.'/model/thong_tin_tiep_thiService.php';
require_once DIR.'/view/admin/thong_tin_tiep_thi.php';
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
            $new_obj= new thong_tin_tiep_thi();
            $new_obj->id=$_GET["id"];
            thong_tin_tiep_thi_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/thong_tin_tiep_thi.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=thong_tin_tiep_thi_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/thong_tin_tiep_thi.php');
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
            $List_thong_tin_tiep_thi=thong_tin_tiep_thi_getByAll();
            foreach($List_thong_tin_tiep_thi as $thong_tin_tiep_thi)
            {
                if(isset($_GET["check_".$thong_tin_tiep_thi->id])) thong_tin_tiep_thi_delete($thong_tin_tiep_thi);
            }
            header('Location: '.SITE_NAME.'/controller/admin/thong_tin_tiep_thi.php');
        }
    }
    if(isset($_POST["name"])&&isset($_POST["name_url"])&&isset($_POST["img"])&&isset($_POST["content"])&&isset($_POST["title"])&&isset($_POST["keyword"])&&isset($_POST["description"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['name']))
       $array['name']='0';
       if(!isset($array['name_url']))
       $array['name_url']='0';
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
      $new_obj=new thong_tin_tiep_thi($array);
        if($insert)
        {
            thong_tin_tiep_thi_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/thong_tin_tiep_thi.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            thong_tin_tiep_thi_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/thong_tin_tiep_thi.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=thong_tin_tiep_thi_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=thong_tin_tiep_thi_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_thong_tin_tiep_thi($data);
}
else
{
     header('location: '.SITE_NAME);
}
