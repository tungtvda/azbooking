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
        if($num_member>0&&$full_name!=''&&$email!=''&&$phone!=''&&$address!=''&&count($price_room)>0){

            $new = new booking_hotel();

            $new->hotel_id = $id;
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
            $price_room_string='';
            $price_room_string_table='';
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
                        $price_room_string.=$row.'-'.$amount_people;
                    }
                    else{
                        $price_room_string.='/'.$row.'-'.$amount_people;
                    }
                    $price_format='Liên hệ';
                    if($data_price_room[0]->price>0){
                        $price_format=number_format((int)$data_price_room[0]->price,0,",",".") . 'vnđ';
                    }

                    $price_room_string_table.="<tr>
                                            <th>".$data_price_room[0]->name."</th>
                                             <th>$price_format</th>
                                            <th>$amount_people</th>
                                        </tr>";

                    if($data_price_room[0]->price>0){
                        $sub_total=$data_price_room[0]->price*$amount_people;
                        $total+=$sub_total;
                    }
                    else{
                        $check_contact=1;
                        break;
                    }
                    $count_check++;
                }

            }
            if(isset($check_contact)){
                $total_format=$total='Liên hệ';

            }
            else{
                $total_format=number_format((int)$total,0,",",".") . 'vnđ';
            }
            $new->total_price = $total;
            $new->price_room = $price_room_string;
            booking_hotel_insert($new);

            $mes = 'Đặt phòng thành công';

            $message = "";
            $subject = "Azbooking.vn – Thông báo đặt phòng từ khách hàng";
            $message .= '<div style="float: left; width: 100%">
                            <style>
                                th, td, .table>tbody>tr>td {
                                    border: 1px solid #d4d4d4;
                                    padding: 12px 10px;
                                    background: rgba(238, 238, 238, 0.25);
                                }
                            </style>
                            <p>Tên khách hàng: <span style="color: #132fff; font-weight: bold">' . $full_name . '</span>,</p>
                            <p>Email: <span style="color: #132fff; font-weight: bold">' . $email . '</span>,</p>
                            <p>Điện thoại: <span style="color: #132fff; font-weight: bold">' . $phone . '</span>,</p>
                            <p>Địa chỉ: <span style="color: #132fff; font-weight: bold">' . $address . '</span>,</p>
                            <p>Ngày check-in: <span style="color: #132fff; font-weight: bold">' . $date . '</span>,</p>
                            <p>Ngày đặt: <span style="color: #132fff; font-weight: bold">' . _returnGetDateTime() . '</span>,</p>
                            <p>Khách sạn: <span style="color: #132fff; font-weight: bold">' . $data->name . '</span>,</p>
                             <p>Giá: <span style="color: #132fff; font-weight: bold">' . $data->price . '</span>,</p>
                             <p>Số người: <span style="color: #132fff; font-weight: bold">' . $num_member . '</span>,</p>

                             <p>Thông tin chi tiết</p>
                              <p><table>
                                        <tr>
                                            <th>Loại phòng</th>
                                             <th>Đơn giá</th>
                                            <th>Số lượng phòng</th>
                                        </tr>
                                      '.$price_room_string_table.'
                                    </table></p>
                            <p>Tổng tiền: '.$total_format.'</p>
                           <p>' . $request . '</p>
                        </div>';
            SendMail('sales@mixtourist.com', $message, $subject);
            SendMail($email, $message, 'Azbooking.vn – Xác nhận đặt phòng');
            echo "<script>alert('$mes')</script>";

        }else{
            echo "<script>alert('Bạn vui lòng điền đầy đủ thông tin đặt phòng')</script>";
        }
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
function _returnGetDateTime()
{
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    return date('Y-m-d H:i:s');
}