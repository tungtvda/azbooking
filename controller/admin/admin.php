<?php
require_once '../../config.php';
require_once DIR.'/model/adminService.php';
require_once DIR.'/model/khachsanService.php';
require_once DIR.'/model/quyenService.php';
require_once DIR.'/view/admin/admin.php';
require_once DIR.'/common/messenger.php';
require_once(DIR."/common/hash_pass.php");
$data=array();
$insert=true;
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["Id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new admin();
            $new_obj->Id=$_GET["Id"];
            admin_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/admin.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=admin_getById($_GET["Id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
                $pass_old=$new_obj[0]->MatKhau;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/admin.php');
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
    $data['listfkey']['khachsan_id']=khachsan_getByAll();
    $data['listfkey']['Quyen']=quyen_getByAll();
    if(isset($_GET["action_all"]))
    {
        if($_GET["action_all"]=="ThemMoi")
        {
            $data['tab2_class']='default-tab current';
            $data['tab1_class']=' ';
        }
        else
        {
            $List_admin=admin_getByAll();
            foreach($List_admin as $admin)
            {
                if(isset($_GET["check_".$admin->Id])) admin_delete($admin);
            }
            header('Location: '.SITE_NAME.'/controller/admin/admin.php');
        }
    }
    if(isset($_POST["khachsan_id"])&&isset($_POST["TenDangNhap"])&&isset($_POST["Full_name"])&&isset($_POST["MatKhau"])&&isset($_POST["Quyen"]))
    {

       $array=$_POST;
       if(!isset($array['Id']))
       $array['Id']='0';
       if(!isset($array['khachsan_id']))
       $array['khachsan_id']='0';
       if(!isset($array['TenDangNhap']))
       $array['TenDangNhap']='0';
       if(!isset($array['Full_name']))
       $array['Full_name']='0';
       if(!isset($array['MatKhau']))
       $array['MatKhau']='0';
       if(!isset($array['Quyen']))
       $array['Quyen']='0';
       if(!isset($array['status']))
       $array['status']='0';
        $new_obj=new admin($array);

        if($insert)
        {

            $new_obj->MatKhau=$Pass;
            admin_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/admin.php');
        }
        else
        {

            if($pass_old==$_POST["MatKhau"]){
                $new_obj->MatKhau=$pass_old;
            }
            else{
                $new_obj->MatKhau=$Pass;
            }

            $new_obj->Id=$_GET["Id"];
            admin_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/admin.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=admin_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=admin_getByPagingReplace($data['page'],20,'Id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_admin($data);
}
else
{
     header('location: '.SITE_NAME);
}
