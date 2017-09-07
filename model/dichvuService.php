<?php
require_once DIR.'/model/dichvu.php';
require_once DIR.'/model/sqlconnection.php';
//
function dichvu_Get($command)
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
                $new_obj=new dichvu($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'dichvu');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new dichvu($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function dichvu_getById($id)
{
    return dichvu_Get('select * from dichvu where id='.$id);
}
//
function dichvu_getByAll()
{
    return dichvu_Get('select * from dichvu');
}
//
function dichvu_getByTop($top,$where,$order)
{
    return dichvu_Get("select * from dichvu ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function dichvu_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return dichvu_Get("SELECT * FROM  dichvu ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function dichvu_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return dichvu_Get("SELECT dichvu.id, dichvu.name, dichvu.img, dichvu.icon, dichvu.phone, dichvu.email, dichvu.link, dichvu.position FROM  dichvu ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function dichvu_insert($obj)
{
    return exe_query("insert into dichvu (name,img,icon,phone,email,link,position) values ('$obj->name','$obj->img','$obj->icon','$obj->phone','$obj->email','$obj->link','$obj->position')",'dichvu');
}
//
function dichvu_update($obj)
{
    return exe_query("update dichvu set name='$obj->name',img='$obj->img',icon='$obj->icon',phone='$obj->phone',email='$obj->email',link='$obj->link',position='$obj->position' where id=$obj->id",'dichvu');
}
//
function dichvu_delete($obj)
{
    return exe_query('delete from dichvu where id='.$obj->id,'dichvu');
}
//
function dichvu_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from dichvu '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
