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
