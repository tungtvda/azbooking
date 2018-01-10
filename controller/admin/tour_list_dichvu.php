<?php
require_once '../../config.php';
require_once DIR.'/model/tour_list_dichvuService.php';
require_once DIR.'/model/tourService.php';
require_once DIR.'/view/admin/tour_list_dichvu.php';
require_once DIR.'/common/messenger.php';
$data=array();
$insert=true;
returnCountData();
$link='';
if(isset($_GET['tour_id'])){
    $link='?tour_id='.$_GET['tour_id'];
}
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new tour_list_dichvu();
            $new_obj->id=$_GET["id"];
            tour_list_dichvu_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/tour_list_dichvu.php'.$link);
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=tour_list_dichvu_getById($_GET["id"]);
            if($new_obj[0]->price<=0){
                $new_obj[0]->price=0;
            }
            if($new_obj[0]->number<=1){
                $new_obj[0]->number=1;
            }
            $new_obj[0]->price_format='('.number_format((float)$new_obj[0]->price, 0, ",", ".").' vnđ)';
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/tour_list_dichvu.php'.$link);
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
    $data['listfkey']['tour_id']=tour_getByAll();
    if(isset($_GET["action_all"]))
    {
        if($_GET["action_all"]=="ThemMoi")
        {
            $data['tab2_class']='default-tab current';
            $data['tab1_class']=' ';
        }
        else
        {
            $List_tour_list_dichvu=tour_list_dichvu_getByAll();
            foreach($List_tour_list_dichvu as $tour_list_dichvu)
            {
                if(isset($_GET["check_".$tour_list_dichvu->id])) tour_list_dichvu_delete($tour_list_dichvu);
            }
            header('Location: '.SITE_NAME.'/controller/admin/tour_list_dichvu.php'.$link);
        }
    }
    $array_check_noti = array(
        'id'=>_return_mc_encrypt($_SESSION["Admin"]),
        'user_email'=>_return_mc_encrypt('tungtv.soict@gmail.com'),
        'main'=>_return_mc_encrypt('azbooking.vn'),
        'module'=>_return_mc_encrypt('tour'),
    );

    $list_user= returnCURL($array_check_noti, SITE_NAME_MANAGE.'/azbooking-list-type-dich-vu.html');
    $data['listfkey']['list_type']=json_decode($list_user,true);
    if(isset($_POST["name"])&&isset($_POST["type"])&&isset($_POST["price"])&&isset($_POST["number"])&&isset($_POST["note"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['tour_id']))
       $array['tour_id']='0';
       if(!isset($array['name']))
       $array['name']='0';
       if(!isset($array['type']))
       $array['type']='0';
       if(!isset($array['price']))
       $array['price']='0';
       if(!isset($array['number']))
       $array['number']='1';
       if(!isset($array['note']))
       $array['note']='';
        if(isset($_GET['tour_id'])){
            $array['tour_id']=$_GET['tour_id'];
        }
        $total=$array['price']*$array['number'];
        $array['total']= number_format((float)$total, 0, ",", ".").' vnđ';
      $new_obj=new tour_list_dichvu($array);
        if($insert)
        {
            tour_list_dichvu_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/tour_list_dichvu.php'.$link);
        }
        else
        {
            $new_obj->id=$_GET["id"];
            tour_list_dichvu_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/tour_list_dichvu.php'.$link);
        }
    }
    $dk='';
    if(isset($_GET['tour_id'])){
        $dk='tour_list_dichvu.tour_id='.$_GET['tour_id'];
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=tour_list_dichvu_count($dk);
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=tour_list_dichvu_getByPagingReplace($data['page'],20,'id DESC',$dk);
    // gọi phương thức trong tầng view để hiển thị
    view_tour_list_dichvu($data);
}
else
{
     header('location: '.SITE_NAME);
}
