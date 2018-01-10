<?php
require_once DIR.'/common/paging.php';
require_once DIR.'/common/cls_fast_template.php';

function view_tour_list_dichvu($data)
{
    $link='';
    if(isset($_GET['tour_id'])){
        $link='&tour_id='.$_GET['tour_id'];
    }
    $ft=new FastTemplate(DIR.'/view/admin/templates');
    $ft->assign('count_contact',$_SESSION['contact']);
    $ft->assign('booking_hotel',$_SESSION['booking_hotel']);
    $ft->assign('count_booking',$_SESSION['booking']);
    $ft->define('header','header.tpl');
    $ft->define('body','body.tpl');
    $ft->define('footer','footer.tpl');
    //
    $ft->assign('TAB1-CLASS',isset($data['tab1_class'])?$data['tab1_class']:'');
    $ft->assign('TAB2-CLASS',isset($data['tab2_class'])?$data['tab2_class']:'');
    $ft->assign('USER-NAME',isset($data['username'])?$data['username']:'');
    $ft->assign('NOTIFICATION-CONTENT',isset($data['notififation_content'])?$data['notififation_content']:'');
    $ft->assign('TABLE-HEADER',showTableHeader());
    $ft->assign('PAGING',showPaging($data['count_paging'],20,$data['page']));
    $ft->assign('TABLE-BODY',showTableBody($data['table_body'],$link,$data['listfkey']['list_type']));
    $ft->assign('TABLE-NAME','tour_list_dichvu');
    $ft->assign('CONTENT-BOX-LEFT',isset($data['content_box_left'])?$data['content_box_left']:'');
    $ft->assign('CONTENT-BOX-RIGHT',isset($data['content_box_right'])?$data['content_box_right']:' ');
    $ft->assign('NOTIFICATION',isset($data['notification'])?$data['notification']:' ');
    $ft->assign('SITE-NAME',isset($data['sitename'])?$data['sitename']:SITE_NAME);
    $ft->assign('kichhoat_tour', 'active');
    $ft->assign('kichhoat_tour_hienthi', 'display: block');
    $ft->assign('FORM',showFrom(isset($data['form'])?$data['form']:'',isset($data['listfkey'])?$data['listfkey']:array()));
    //
    print $ft->parse_and_return('header');
    print $ft->parse_and_return('body');
    print $ft->parse_and_return('footer');
}
//
function showTableHeader()
{
    return '<th>id</th><th>tour_id</th><th>name</th><th>type</th><th>price</th><th>number</th><th>total</th>';
}
//
function showTableBody($data,$link,$list_type)
{
    $TableBody='';
    if(count($data)>0) foreach($data as $obj)
    {
        $TableBody.="<tr><td><input type=\"checkbox\" name=\"check_".$obj->id."\"/></td>";
        $TableBody.="<td>".$obj->id."</td>";
        $TableBody.="<td>".$obj->tour_id."</td>";
        $TableBody.="<td>".$obj->name."</td>";
        $TableBody.="<td>";
        if($list_type){
            foreach ($list_type as $row){
                if($row['id']==$obj->type){
                    $TableBody.=$row['name'];
                }
            }
        }
        $TableBody.="</td>";
        $TableBody.="<td>".$obj->price."</td>";
        $TableBody.="<td>".$obj->number."</td>";
        $TableBody.="<td>".$obj->total."</td>";
        $TableBody.="<td><a href=\"?action=edit&id=".$obj->id.$link."\" title=\"Edit\"><img src=\"".SITE_NAME."/view/admin/Themes/images/pencil.png\" alt=\"Edit\"></a>";
        $TableBody.="<a href=\"?action=delete&id=".$obj->id.$link."\" title=\"Delete\" onClick=\"return confirm('Bạn có chắc chắc muốn xóa?')\"><img src=\"".SITE_NAME."/view/admin/Themes/images/cross.png\" alt=\"Delete\"></a> ";
        $TableBody.="</td>";
        $TableBody.="</tr>";
    }
    return $TableBody;
}
//
function showFrom($form,$ListKey=array())
{
    $str_from='';
    $str_from.='<p><label>tour_id</label>';
    $disabled='';
    if(isset($_GET['tour_id'])){
        $disabled='disabled';
    }
    $str_from.='<select '.$disabled.' style="width: 100%" name="tour_id">';
    if(isset($ListKey['tour_id']))
    {
        foreach($ListKey['tour_id'] as $key)
        {
            $selected='';
            if($form!=false && $form->tour_id==$key->id){
                $selected='selected';
            }
                if(isset($_GET['tour_id']) && $_GET['tour_id']==$key->id){
                    $selected='selected';
                }

            $str_from.='<option value="'.$key->id.'" '.$selected.'>'.$key->name.'</option>';
        }
    }
    $str_from.='</select></p>';
    $str_from.='<p><label>name</label><input class="text-input small-input" required type="text"  name="name" value="'.(($form!=false)?$form->name:'').'" /></p>';
    $str_from.='<p><label>type</label>';
    $str_from.='<select name="type">';
    if(isset($ListKey['list_type']))
    {
        foreach($ListKey['list_type'] as $key)
        {
            $str_from.='<option value="'.$key['id'].'" '.(($form!=false)?(($form->type==$key['id'])?'selected':''):'').'>'.$key['name'].'</option>';
        }
    }
    $str_from.='</select></p>';
    $str_from.='<p><label>price <span style="color: red" id="price_dv_format">'.(($form!=false)?$form->price_format:'').'</span></label><input required class="text-input small-input" id="price_dichvu" type="text"  name="price" value="'.(($form!=false)?$form->price:'').'" /></p>';
    $str_from.='<p><label>number</label><input class="text-input small-input" id="number_dichvu" type="number" min="1" required name="number" value="'.(($form!=false)?$form->number:'1').'" /></p>';
    $str_from.='<p><label>total</label><input disabled class="text-input small-input" id="total_dv" type="text" required  name="total" value="'.(($form!=false)?$form->total:'').'" /></p>';
    $str_from.='<p><label>note</label><textarea style="width: 100%" name="note">'.(($form!=false)?$form->note:'').'</textarea></p>';
    return $str_from;
}
