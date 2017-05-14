<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_login($data = array())
{
    $asign = array();
    $asign['name']= $data['menu'][16]->name;

    print_template($asign, 'login');
}



