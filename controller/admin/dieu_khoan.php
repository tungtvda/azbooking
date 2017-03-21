<?php
require_once '../../config.php';
require_once DIR.'/model/dieu_khoanService.php';
require_once DIR.'/view/admin/dieu_khoan.php';
require_once DIR.'/common/messenger.php';
$data=array();
returnCountData();
$insert=true;
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new dieu_khoan();
            $new_obj->id=$_GET["id"];
            dieu_khoan_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/dieu_khoan.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=dieu_khoan_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/dieu_khoan.php');
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
            $List_dieu_khoan=dieu_khoan_getByAll();
            foreach($List_dieu_khoan as $dieu_khoan)
            {
                if(isset($_GET["check_".$dieu_khoan->id])) dieu_khoan_delete($dieu_khoan);
            }
            header('Location: '.SITE_NAME.'/controller/admin/dieu_khoan.php');
        }
    }
    if(isset($_POST["name"])&&isset($_POST["content"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['name']))
       $array['name']='0';
       if(!isset($array['content']))
       $array['content']='0';
      $new_obj=new dieu_khoan($array);
        if($insert)
        {
            dieu_khoan_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/dieu_khoan.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            dieu_khoan_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/dieu_khoan.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=dieu_khoan_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=dieu_khoan_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_dieu_khoan($data);
}
else
{
     header('location: '.SITE_NAME);
}
