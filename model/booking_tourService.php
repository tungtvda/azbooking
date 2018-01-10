<?php
require_once DIR.'/model/booking_tour.php';
require_once DIR.'/model/sqlconnection.php';
//
function booking_tour_Get($command)
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
                $new_obj=new booking_tour($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'booking_tour');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new booking_tour($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function booking_tour_getById($id)
{
    return booking_tour_Get('select * from booking_tour where id='.$id);
}
//
function booking_tour_getByAll()
{
    return booking_tour_Get('select * from booking_tour');
}
//
function booking_tour_getByTop($top,$where,$order)
{
    return booking_tour_Get("select * from booking_tour ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function booking_tour_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return booking_tour_Get("SELECT * FROM  booking_tour ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function booking_tour_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
    return booking_tour_Get("SELECT booking_tour.id, booking_tour.code_booking, booking_tour.tour_id, booking_tour.name_tour, booking_tour.name_customer, booking_tour.language, booking_tour.phone, booking_tour.email, booking_tour.address, booking_tour.departure_day, booking_tour.num_nguoi_lon, booking_tour.num_tre_em_m1, booking_tour.num_tre_em_m2, booking_tour.num_tre_em_m3, booking_tour.price, booking_tour.price_2, booking_tour.price_3, booking_tour.price_4, booking_tour.total_price, booking_tour.request, booking_tour.status, booking_tour.created FROM  booking_tour ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function booking_tour_insert($obj)
{
    return exe_query("insert into booking_tour (code_booking,tour_id,name_tour,name_customer,language,phone,email,address,departure_day,num_nguoi_lon,num_tre_em_m1,num_tre_em_m2,num_tre_em_m3,price,price_2,price_3,price_4,total_price,request,status,created) values ('$obj->code_booking','$obj->tour_id','$obj->name_tour','$obj->name_customer','$obj->language','$obj->phone','$obj->email','$obj->address','$obj->departure_day','$obj->num_nguoi_lon','$obj->num_tre_em_m1','$obj->num_tre_em_m2','$obj->num_tre_em_m3','$obj->price','$obj->price_2','$obj->price_3','$obj->price_4','$obj->total_price','$obj->request','$obj->status','$obj->created')",'booking_tour');
}
//
function booking_tour_update($obj)
{
    return exe_query("update booking_tour set code_booking='$obj->code_booking',tour_id='$obj->tour_id',name_tour='$obj->name_tour',name_customer='$obj->name_customer',language='$obj->language',phone='$obj->phone',email='$obj->email',address='$obj->address',departure_day='$obj->departure_day',num_nguoi_lon='$obj->num_nguoi_lon',num_tre_em_m1='$obj->num_tre_em_m1',num_tre_em_m2='$obj->num_tre_em_m2',num_tre_em_m3='$obj->num_tre_em_m3',price='$obj->price',price_2='$obj->price_2',price_3='$obj->price_3',price_4='$obj->price_4',total_price='$obj->total_price',request='$obj->request',status='$obj->status',created='$obj->created' where id=$obj->id",'booking_tour');
}
//
function booking_tour_delete($obj)
{
    return exe_query('delete from booking_tour where id='.$obj->id,'booking_tour');
}
//
function booking_tour_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from booking_tour '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
