<?php
require_once DIR.'/model/danhmuc_chude.php';
require_once DIR.'/model/sqlconnection.php';
//
function danhmuc_chude_Get($command)
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
                $new_obj=new danhmuc_chude($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'danhmuc_chude');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new danhmuc_chude($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function danhmuc_chude_getById($id)
{
    return danhmuc_chude_Get('select * from danhmuc_chude where id='.$id);
}
//
function danhmuc_chude_getByAll()
{
    return danhmuc_chude_Get('select * from danhmuc_chude');
}
//
function danhmuc_chude_getByTop($top,$where,$order)
{
    return danhmuc_chude_Get("select * from danhmuc_chude ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function danhmuc_chude_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return danhmuc_chude_Get("SELECT * FROM  danhmuc_chude ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function danhmuc_chude_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return danhmuc_chude_Get("SELECT danhmuc_chude.id, danhmuc_chude.name, danhmuc_chude.name_url, danhmuc_chude.img, danhmuc_chude.position, danhmuc_chude.title, danhmuc_chude.description, danhmuc_chude.keyword FROM  danhmuc_chude ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function danhmuc_chude_insert($obj)
{
    return exe_query("insert into danhmuc_chude (name,name_url,img,position,title,description,keyword) values ('$obj->name','$obj->name_url','$obj->img','$obj->position','$obj->title','$obj->description','$obj->keyword')",'danhmuc_chude');
}
//
function danhmuc_chude_update($obj)
{
    return exe_query("update danhmuc_chude set name='$obj->name',name_url='$obj->name_url',img='$obj->img',position='$obj->position',title='$obj->title',description='$obj->description',keyword='$obj->keyword' where id=$obj->id",'danhmuc_chude');
}
//
function danhmuc_chude_delete($obj)
{
    return exe_query('delete from danhmuc_chude where id='.$obj->id,'danhmuc_chude');
}
//
function danhmuc_chude_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from danhmuc_chude '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
