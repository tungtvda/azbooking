<?php
require_once DIR.'/model/danhmuc_khachsan_2.php';
require_once DIR.'/model/sqlconnection.php';
//
function danhmuc_khachsan_2_Get($command)
{
            $array_result=array();
    $key=md5($command);
    if(CACHE)
    {
        $mycache=ConnectCache();
        $cachecommand=$mycache->get($key);
        if($cachecommand)
        {
            $array_result=$cachecommand;
        }
        else
        {
          $result=mysqli_query(ConnectSql(),$command);
            if($result!=false)while($row=mysqli_fetch_array($result))
            {
                $new_obj=new danhmuc_khachsan_2($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'danhmuc_khachsan_2');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new danhmuc_khachsan_2($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function danhmuc_khachsan_2_getById($id)
{
    return danhmuc_khachsan_2_Get('select * from danhmuc_khachsan_2 where id='.$id);
}
//
function danhmuc_khachsan_2_getByAll()
{
    return danhmuc_khachsan_2_Get('select * from danhmuc_khachsan_2');
}
//
function danhmuc_khachsan_2_getByTop($top,$where,$order)
{
    return danhmuc_khachsan_2_Get("select * from danhmuc_khachsan_2 ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function danhmuc_khachsan_2_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return danhmuc_khachsan_2_Get("SELECT * FROM  danhmuc_khachsan_2 ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function danhmuc_khachsan_2_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return danhmuc_khachsan_2_Get("SELECT danhmuc_khachsan_2.id, danhmuc_khachsan.name as danhmuc_id, danhmuc_khachsan_2.name, danhmuc_khachsan_2.name_url, danhmuc_khachsan_2.img, danhmuc_khachsan_2.img_banner, danhmuc_khachsan_2.position, danhmuc_khachsan_2.title, danhmuc_khachsan_2.keyword, danhmuc_khachsan_2.description FROM  danhmuc_khachsan_2, danhmuc_khachsan where danhmuc_khachsan.id=danhmuc_khachsan_2.danhmuc_id  ".(($where!='')?(' and '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function danhmuc_khachsan_2_insert($obj)
{
    return exe_query("insert into danhmuc_khachsan_2 (danhmuc_id,name,name_url,img,img_banner,position,title,keyword,description) values ('$obj->danhmuc_id','$obj->name','$obj->name_url','$obj->img','$obj->img_banner','$obj->position','$obj->title','$obj->keyword','$obj->description')",'danhmuc_khachsan_2');
}
//
function danhmuc_khachsan_2_update($obj)
{
    return exe_query("update danhmuc_khachsan_2 set danhmuc_id='$obj->danhmuc_id',name='$obj->name',name_url='$obj->name_url',img='$obj->img',img_banner='$obj->img_banner',position='$obj->position',title='$obj->title',keyword='$obj->keyword',description='$obj->description' where id=$obj->id",'danhmuc_khachsan_2');
}
//
function danhmuc_khachsan_2_delete($obj)
{
    return exe_query('delete from danhmuc_khachsan_2 where id='.$obj->id,'danhmuc_khachsan_2');
}
//
function danhmuc_khachsan_2_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from danhmuc_khachsan_2 '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
