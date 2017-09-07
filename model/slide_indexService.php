<?php
require_once DIR.'/model/slide_index.php';
require_once DIR.'/model/sqlconnection.php';
//
function slide_index_Get($command)
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
                $new_obj=new slide_index($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'slide_index');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new slide_index($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function slide_index_getById($id)
{
    return slide_index_Get('select * from slide_index where id='.$id);
}
//
function slide_index_getByAll()
{
    return slide_index_Get('select * from slide_index');
}
//
function slide_index_getByTop($top,$where,$order)
{
    return slide_index_Get("select * from slide_index ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function slide_index_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return slide_index_Get("SELECT * FROM  slide_index ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function slide_index_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return slide_index_Get("SELECT slide_index.id, slide_index.name, slide_index.contents_short, slide_index.img, slide_index.img_small, slide_index.link, slide_index.position FROM  slide_index ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function slide_index_insert($obj)
{
    return exe_query("insert into slide_index (name,contents_short,img,img_small,link,position) values ('$obj->name','$obj->contents_short','$obj->img','$obj->img_small','$obj->link','$obj->position')",'slide_index');
}
//
function slide_index_update($obj)
{
    return exe_query("update slide_index set name='$obj->name',contents_short='$obj->contents_short',img='$obj->img',img_small='$obj->img_small',link='$obj->link',position='$obj->position' where id=$obj->id",'slide_index');
}
//
function slide_index_delete($obj)
{
    return exe_query('delete from slide_index where id='.$obj->id,'slide_index');
}
//
function slide_index_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from slide_index '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
