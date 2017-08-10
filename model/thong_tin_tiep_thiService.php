<?php
require_once DIR.'/model/thong_tin_tiep_thi.php';
require_once DIR.'/model/sqlconnection.php';
//
function thong_tin_tiep_thi_Get($command)
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
                $new_obj=new thong_tin_tiep_thi($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'thong_tin_tiep_thi');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new thong_tin_tiep_thi($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function thong_tin_tiep_thi_getById($id)
{
    return thong_tin_tiep_thi_Get('select * from thong_tin_tiep_thi where id='.$id);
}
//
function thong_tin_tiep_thi_getByAll()
{
    return thong_tin_tiep_thi_Get('select * from thong_tin_tiep_thi');
}
//
function thong_tin_tiep_thi_getByTop($top,$where,$order)
{
    return thong_tin_tiep_thi_Get("select * from thong_tin_tiep_thi ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function thong_tin_tiep_thi_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return thong_tin_tiep_thi_Get("SELECT * FROM  thong_tin_tiep_thi ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function thong_tin_tiep_thi_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return thong_tin_tiep_thi_Get("SELECT thong_tin_tiep_thi.id, thong_tin_tiep_thi.name, thong_tin_tiep_thi.name_url, thong_tin_tiep_thi.img, thong_tin_tiep_thi.content, thong_tin_tiep_thi.title, thong_tin_tiep_thi.keyword, thong_tin_tiep_thi.description FROM  thong_tin_tiep_thi ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function thong_tin_tiep_thi_insert($obj)
{
    return exe_query("insert into thong_tin_tiep_thi (name,name_url,img,content,title,keyword,description) values ('$obj->name','$obj->name_url','$obj->img','$obj->content','$obj->title','$obj->keyword','$obj->description')",'thong_tin_tiep_thi');
}
//
function thong_tin_tiep_thi_update($obj)
{
    return exe_query("update thong_tin_tiep_thi set name='$obj->name',name_url='$obj->name_url',img='$obj->img',content='$obj->content',title='$obj->title',keyword='$obj->keyword',description='$obj->description' where id=$obj->id",'thong_tin_tiep_thi');
}
//
function thong_tin_tiep_thi_delete($obj)
{
    return exe_query('delete from thong_tin_tiep_thi where id='.$obj->id,'thong_tin_tiep_thi');
}
//
function thong_tin_tiep_thi_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from thong_tin_tiep_thi '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
