<?php

/**
 * @author vdbkpro
 * @copyright 2013
 */
define("SITE_NAME", "http://localhost/azbooking");
define("DIR", dirname(__FILE__));
define('SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','azbooking');
define('CACHE',false);
define('DATETIME_FORMAT',"y-m-d H:i:s");
define('PRIVATE_KEY','hoidinhnvbk');
session_start();
require_once DIR.'/common/minifi.output.php';
ob_start("minify_output");

function returnSearchDurations(){
    $data['data']=tour_getByTop('','','durations asc');
    $data_arr=array();
    foreach($data['data'] as $row)
    {
        $name=$row->durations;
        if(!in_array($name,$data_arr)){
            array_push($data_arr,$name);
        }
    }
    $string='';
    if(count($data_arr)>0){
        foreach($data_arr as $val){
            if($val!='')
            {
                $string .="<option value=\"".$val."\">".$val."</option>";
            }
        }
    }
    return $string;
}
function returnPriceKhachSan(){
    $data['data']=price_khachsan_getByTop('','','position asc');
    $string='';
    foreach($data['data'] as $row)
    {
        $string .="<option value=\"".$row->value."\">".$row->name."</option>";
    }
    return $string;
}
function returnPriceTour(){
    $data['data']=price_timkiem_getByTop('','','position asc');
    $string='';
    foreach($data['data'] as $row)
    {
        $string .="<option value=\"".$row->value."\">".$row->name."</option>";
    }
    return $string;
}

function _returnDateFormatConvert($date)
{
    if ($date == '') {
        $DatesRemainder = '';
    } else {
        $DatesRemainder = date("d-m-Y H:i:s", strtotime($date));
    }
    return $DatesRemainder;
}
function bookingHotel($data){
    if(isset($_POST['date_input'])&&isset($_POST['date_get_now'])&&isset($_POST['id_input'])&&isset($_POST['price_room'])&&isset($_POST['num_member'])&&isset($_POST['name_booking'])&&isset($_POST['email_booking'])&&isset($_POST['phone_booking'])&&isset($_POST['address_booking'])&&isset($_POST['request_booking'])){
        $contact = "Liên hệ";
        $id = $data->id;
        $name_url = $data->name_url;
        $date = checkPostParamSecurity('date_input');
        $price =$data->price;
        $num_member = checkPostParamSecurity('num_member');
        $full_name = checkPostParamSecurity('name_booking');
        $email = checkPostParamSecurity('email_booking');
        $phone = checkPostParamSecurity('phone_booking');
        $address = checkPostParamSecurity('address_booking');
        $request = checkPostParamSecurity('request_booking');
        $price_room=$_POST['price_room'];
        print_r($price_room);
        exit;
        if($num_member>0&&$full_name!=''&&$email!=''&&$phone!=''&&$address!=''&&count($price_room)>0){

            $new = new booking_hotel();

            $new->tour_id = $id;
            $new->name_hotel =  $data->name;
            $new->name_customer = $full_name;
            $new->phone = $phone;
            $new->email = $email;
            $new->address = $address;
            $new->departure_day = $date;
            $new->num_member = $num_member;
            $new->price = $price;
            $new->request = $request;
            $new->status = 0;
            $new->created = date(DATETIME_FORMAT);
            $total=0;
            $price_room='';
            $count_check=1;
            foreach($price_room as $row){
                $data_price_room=khachsan_room_price_getById($row);
                if(count($data_price_room)>0){
                    if(isset($_POST['amount_people_'.$row])&&$_POST['amount_people_'.$row]>0){
                        $amount_people=checkPostParamSecurity('amount_people_'.$row);
                    }
                    else{
                        $amount_people=1;
                    }
                    if($count_check==1){
                        $price_room.=$row.'-'.$amount_people;
                    }
                    else{
                        $price_room.='/'.$row.'-'.$amount_people;
                    }
                    if($data_price_room[0]->price>0){
                        $sub_total=$data_price_room[0]->price*$amount_people;
                        $total+=$sub_total;
                    }
                    else{
                        $total=0;
                        break;
                    }
                }

            }
            $new->total_price = $total;
            $new->price_room = $price_room;
            print_r($new);
        }else{
            echo "<script>alert('Bạn vui lòng điền đầy đủ thông tin đặt phòng')</script>";
        }
    }
    else{
        echo "<script>alert('Bạn vui lòng điền đầy đủ thông tin đặt phòng')</script>";
    }
}
function checkPostParamSecurity($param)
{
    if (isset($_POST[$param])) {
        return addslashes(strip_tags($_POST[$param]));
    } else {
        return false;
    }

}