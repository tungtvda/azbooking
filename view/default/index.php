<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_index($data = array())
{
    $asign = array();
    $title=$data['menu'][0]->title;
    $description=$data['menu'][0]->description;
    $keyword=$data['menu'][0]->keyword;
    $asign['title']=($title)?$title:'Azbooking.vn';
    $asign['description']=($description)?$description:'Azbooking.vn';
    $asign['keywords']=($keyword)?$keyword:'Azbooking.vn';
    $asign['icon']=$data['config'][0]->Icon;
    $asign['logo']=$data['config'][0]->Logo;
    $asign['Name']=$data['config'][0]->Name;
    $asign['Address'] = $data['config'][0]->Address;
    $asign['Phone'] = $data['config'][0]->Phone;
    $asign['Hotline'] = $data['config'][0]->Hotline;
    $asign['Email'] = $data['config'][0]->Email;
    $asign['Fax'] = $data['config'][0]->fax;

    $asign['Address_hcm'] = $data['config'][0]->Address_hcm;
    $asign['Phone_hcm'] = $data['config'][0]->Phone_hcm;
    $asign['Hotline_hcm'] = $data['config'][0]->Hotline_hcm;
    $asign['Fax_hcm'] = $data['config'][0]->fax_hcm;
    $asign['Email_hcm'] = $data['config'][0]->Email_hcm;


    $data['link_anh']=SITE_NAME.$data['config'][0]->Logo;
    if(strstr($data['link_anh'],SITE_NAME)!=''){
        $asign['link_anh']=$data['link_anh'];
    }else{
        $asign['link_anh']=SITE_NAME.$data['link_anh'];
    }
    $asign['link_url']=SITE_NAME.$_SERVER["REQUEST_URI"];

    $asign['slide'] ='';
    $asign['count_slide']=count($data['slide']);
    if($asign['count_slide']>0)
    {
        $asign['slide'] = print_item('slide_index', $data['slide']);
    }
    $asign['video_index'] ='';
    if(count($data['video_index'])>0)
    {
        $asign['link_video'] = $data['video_index'][0]->link_video;
    }
    print_template($asign, 'index');
}



