<?php
require_once DIR.'/model/dieu_khoan.php';
require_once DIR.'/model/sqlconnection.php';
//
function dieu_khoan_Get($command)
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
                $new_obj=new dieu_khoan($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'dieu_khoan');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new dieu_khoan($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function dieu_khoan_getById($id)
{
    return dieu_khoan_Get('select * from dieu_khoan where id='.$id);
}
//
function dieu_khoan_getByAll()
{
    return dieu_khoan_Get('select * from dieu_khoan');
}
//
function dieu_khoan_getByTop($top,$where,$order)
{
    return dieu_khoan_Get("select * from dieu_khoan ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function dieu_khoan_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return dieu_khoan_Get("SELECT * FROM  dieu_khoan ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function dieu_khoan_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return dieu_khoan_Get("SELECT dieu_khoan.id, dieu_khoan.name, dieu_khoan.content FROM  dieu_khoan ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function dieu_khoan_insert($obj)
{
    return exe_query("insert into dieu_khoan (name,content) values ('$obj->name','$obj->content')",'dieu_khoan');
}
//
function dieu_khoan_update($obj)
{
    return exe_query("update dieu_khoan set name='$obj->name',content='$obj->content' where id=$obj->id",'dieu_khoan');
}
//
function dieu_khoan_delete($obj)
{
    return exe_query('delete from dieu_khoan where id='.$obj->id,'dieu_khoan');
}
//
function dieu_khoan_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from dieu_khoan '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
