<?php
require_once DIR.'/model/tour.php';
require_once DIR.'/model/sqlconnection.php';
//
function tour_Get($command)
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
                $new_obj=new tour($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'tour');
        }
    }
    else
    {
        $result=mysqli_query(ConnectSql(),$command);
        if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new tour($row);
            $new_obj->decode();
            if(isset($row['danh_muc_1_id'])){
                $new_obj->danh_muc_1_id=$row['danh_muc_1_id'];
            }
            if(isset($row['danh_muc_2_id'])){
                $new_obj->danh_muc_2_id=$row['danh_muc_2_id'];
            }
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function tour_getById($id)
{
    return tour_Get('select * from tour where id='.$id);
}
//
function tour_getByAll()
{
    return tour_Get('select * from tour');
}
//
function tour_getByTop($top,$where,$order)
{
    return tour_Get("select * from tour ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function tour_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
    return tour_Get("SELECT * FROM  tour ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function tour_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
    return tour_Get("SELECT tour.id, tour.status, tour.dieuhanh_id, tour.code_az_mix, tour.tour_quoc_te, danhmuc_1.id as DanhMuc1Id, danhmuc_2.id as DanhMuc2Id, tour.danhmuc_multi, tour.promotion, tour.packages, tour.name, tour.name_url, tour.count_down, tour.code, tour.img, tour.price_tiep_thi, tour.price_sales, tour.price, tour.price_2, tour.price_3, tour.price_4, tour.price_5, tour.price_6, tour.price_number, tour.price_number_2, tour.price_number_3, tour.price_number_4, tour.price_number_5, tour.price_number_6, tour.name_price, tour.name_price_2, tour.name_price_3, tour.name_price_4, tour.name_price_5, tour.name_price_6, tour.total_dichvu, tour.gia_net, tour.gia_net_m1, tour.gia_net_m2, tour.gia_net_m3, tour.ty_le_m1, tour.ty_le_m2, tour.ty_le_m3, tour.loi_nhuan, tour.loi_nhuan_m1, tour.loi_nhuan_m2, tour.loi_nhuan_m3, tour.num_nguoi_lon, tour.num_tre_em_m1, tour.num_tre_em_m2, tour.num_tre_em_m3, tour.so_cho, tour.durations, tour.departure, tour.destination, tour.departure_time, tour.vehicle, tour.hotel, tour.summary, tour.highlights, tour.schedule, tour.price_list, tour.content, tour.list_img, tour.title, tour.keyword, tour.description, tour.inclusion, tour.exclusion, tour.updated FROM  tour, danhmuc_1, danhmuc_2 where danhmuc_1.id=tour.DanhMuc1Id and danhmuc_2.id=tour.DanhMuc2Id  ".(($where!='')?(' and '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function tour_insert($obj)
{
    return exe_query("insert into tour (status,dieuhanh_id,code_az_mix,tour_quoc_te,DanhMuc1Id,DanhMuc2Id,danhmuc_chude_id,danhmuc_multi,promotion,packages,name,name_url,count_down,code,img,price_tiep_thi,price_sales,price,price_2,price_3,price_4,price_5,price_6,price_number,price_number_2,price_number_3,price_number_4,price_number_5,price_number_6,name_price,name_price_2,name_price_3,name_price_4,name_price_5,name_price_6,total_dichvu,gia_net,gia_net_m1,gia_net_m2,gia_net_m3,ty_le_m1,ty_le_m2,ty_le_m3,loi_nhuan,loi_nhuan_m1,loi_nhuan_m2,loi_nhuan_m3,num_nguoi_lon,num_tre_em_m1,num_tre_em_m2,num_tre_em_m3,so_cho,durations,departure,destination,departure_time,vehicle,hotel,summary,highlights,schedule,price_list,content,list_img,title,keyword,description,inclusion,exclusion,updated) values ('$obj->status','$obj->dieuhanh_id','$obj->code_az_mix','$obj->tour_quoc_te','$obj->DanhMuc1Id','$obj->DanhMuc2Id','$obj->danhmuc_chude_id','$obj->danhmuc_multi','$obj->promotion','$obj->packages','$obj->name','$obj->name_url','$obj->count_down','$obj->code','$obj->img','$obj->price_tiep_thi','$obj->price_sales','$obj->price','$obj->price_2','$obj->price_3','$obj->price_4','$obj->price_5','$obj->price_6','$obj->price_number','$obj->price_number_2','$obj->price_number_3','$obj->price_number_4','$obj->price_number_5','$obj->price_number_6','$obj->name_price','$obj->name_price_2','$obj->name_price_3','$obj->name_price_4','$obj->name_price_5','$obj->name_price_6','$obj->total_dichvu','$obj->gia_net','$obj->gia_net_m1','$obj->gia_net_m2','$obj->gia_net_m3','$obj->ty_le_m1','$obj->ty_le_m2','$obj->ty_le_m3','$obj->loi_nhuan','$obj->loi_nhuan_m1','$obj->loi_nhuan_m2','$obj->loi_nhuan_m3','$obj->num_nguoi_lon','$obj->num_tre_em_m1','$obj->num_tre_em_m2','$obj->num_tre_em_m3','$obj->so_cho','$obj->durations','$obj->departure','$obj->destination','$obj->departure_time','$obj->vehicle','$obj->hotel','$obj->summary','$obj->highlights','$obj->schedule','$obj->price_list','$obj->content','$obj->list_img','$obj->title','$obj->keyword','$obj->description','$obj->inclusion','$obj->exclusion','$obj->updated')",'tour');
}
//
function tour_update($obj)
{
    return exe_query("update tour set status='$obj->status',dieuhanh_id='$obj->dieuhanh_id',code_az_mix='$obj->code_az_mix',tour_quoc_te='$obj->tour_quoc_te',DanhMuc1Id='$obj->DanhMuc1Id',DanhMuc2Id='$obj->DanhMuc2Id',danhmuc_chude_id='$obj->danhmuc_chude_id',danhmuc_multi='$obj->danhmuc_multi',promotion='$obj->promotion',packages='$obj->packages',name='$obj->name',name_url='$obj->name_url',count_down='$obj->count_down',code='$obj->code',img='$obj->img',price_tiep_thi='$obj->price_tiep_thi',price_sales='$obj->price_sales',price='$obj->price',price_2='$obj->price_2',price_3='$obj->price_3',price_4='$obj->price_4',price_5='$obj->price_5',price_6='$obj->price_6',price_number='$obj->price_number',price_number_2='$obj->price_number_2',price_number_3='$obj->price_number_3',price_number_4='$obj->price_number_4',price_number_5='$obj->price_number_5',price_number_6='$obj->price_number_6',name_price='$obj->name_price',name_price_2='$obj->name_price_2',name_price_3='$obj->name_price_3',name_price_4='$obj->name_price_4',name_price_5='$obj->name_price_5',name_price_6='$obj->name_price_6',total_dichvu='$obj->total_dichvu',gia_net='$obj->gia_net',gia_net_m1='$obj->gia_net_m1',gia_net_m2='$obj->gia_net_m2',gia_net_m3='$obj->gia_net_m3',ty_le_m1='$obj->ty_le_m1',ty_le_m2='$obj->ty_le_m2',ty_le_m3='$obj->ty_le_m3',loi_nhuan='$obj->loi_nhuan',loi_nhuan_m1='$obj->loi_nhuan_m1',loi_nhuan_m2='$obj->loi_nhuan_m2',loi_nhuan_m3='$obj->loi_nhuan_m3',num_nguoi_lon='$obj->num_nguoi_lon',num_tre_em_m1='$obj->num_tre_em_m1',num_tre_em_m2='$obj->num_tre_em_m2',num_tre_em_m3='$obj->num_tre_em_m3',so_cho='$obj->so_cho',durations='$obj->durations',departure='$obj->departure',destination='$obj->destination',departure_time='$obj->departure_time',vehicle='$obj->vehicle',hotel='$obj->hotel',summary='$obj->summary',highlights='$obj->highlights',schedule='$obj->schedule',price_list='$obj->price_list',content='$obj->content',list_img='$obj->list_img',title='$obj->title',keyword='$obj->keyword',description='$obj->description',inclusion='$obj->inclusion',exclusion='$obj->exclusion',updated='$obj->updated' where id=$obj->id",'tour');
}
//
function tour_delete($obj)
{
    return exe_query('delete from tour where id='.$obj->id,'tour');
}
//
function tour_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from tour '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
        $row=mysqli_fetch_array($result);
        return $row['count'];
    }
    else return false;
}
function list_bang_gia_tour_delete($id)
{
    return exe_query('delete from tour_list_dichvu where tour_id='.$id,'booking_list_dichvu');
}