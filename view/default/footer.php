<?php
require_once DIR . '/view/default/public.php';
function view_footer($data = array())
{
    $asign = array();
    $asign['Logo'] = $data['config'][0]->Logo;
    $asign['Name'] = $data['config'][0]->Name;

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

    $asign['twitter'] = $data['mangxahoi'][0]->twitter;
    $asign['youtube'] = $data['mangxahoi'][0]->youtube;
    $asign['facebook'] = $data['mangxahoi'][0]->facebook;
    $asign['google'] = $data['mangxahoi'][0]->google;
    $asign['rss'] = $data['mangxahoi'][0]->rss;
    print_template($asign, 'footer');
}
