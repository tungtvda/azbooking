<?php
require_once DIR . '/common/paging.php';
require_once DIR . '/common/cls_fast_template.php';
function view_admin($data)
{
    $ft = new FastTemplate(DIR . '/view/admin/templates');
    $ft->assign('count_contact', $_SESSION['contact']);
    $ft->assign('booking_hotel', $_SESSION['booking_hotel']);
    $ft->assign('count_booking', $_SESSION['booking']);
    $ft->define('header', 'header.tpl');
    $ft->define('body', 'body.tpl');
    $ft->define('footer', 'footer.tpl');
    //
    $ft->assign('TAB1-CLASS', isset($data['tab1_class']) ? $data['tab1_class'] : '');
    $ft->assign('TAB2-CLASS', isset($data['tab2_class']) ? $data['tab2_class'] : '');
    $ft->assign('USER-NAME', isset($data['username']) ? $data['username'] : '');
    $ft->assign('NOTIFICATION-CONTENT', isset($data['notififation_content']) ? $data['notififation_content'] : '');
    $ft->assign('TABLE-HEADER', showTableHeader());
    $ft->assign('PAGING', showPaging($data['count_paging'], 20, $data['page']));
    $ft->assign('TABLE-BODY', showTableBody($data['table_body']));
    $ft->assign('TABLE-NAME', 'admin');
    $ft->assign('CONTENT-BOX-LEFT', isset($data['content_box_left']) ? $data['content_box_left'] : '');
    $ft->assign('CONTENT-BOX-RIGHT', isset($data['content_box_right']) ? $data['content_box_right'] : ' ');
    $ft->assign('NOTIFICATION', isset($data['notification']) ? $data['notification'] : ' ');
    $ft->assign('SITE-NAME', isset($data['sitename']) ? $data['sitename'] : SITE_NAME);

    $ft->assign('kichhoat_admin', 'active');
    $ft->assign('FORM', showFrom(isset($data['form']) ? $data['form'] : '', isset($data['listfkey']) ? $data['listfkey'] : array()));
    //
    print $ft->parse_and_return('header');
    print $ft->parse_and_return('body');
    print $ft->parse_and_return('footer');
}

//
function showTableHeader()
{
    return '<th>Id</th><th>khachsan_id</th><th>TenDangNhap</th><th>Full_name</th><th>Quyen</th><th>status</th>';
}

//
function showTableBody($data)
{
    $TableBody = '';
    if (count($data) > 0) foreach ($data as $obj) {
        $TableBody .= "<tr><td><input type=\"checkbox\" name=\"check_" . $obj->Id . "\"/></td>";
        $TableBody .= "<td>" . $obj->Id . "</td>";
        $TableBody .= "<td>" . $obj->khachsan_id . "</td>";
        $TableBody .= "<td>" . $obj->TenDangNhap . "</td>";
        $TableBody .= "<td>" . $obj->Full_name . "</td>";
        $TableBody .= "<td>" . $obj->Quyen . "</td>";
        $TableBody .= "<td>" . $obj->status . "</td>";
        $TableBody .= "<td><a href=\"?action=edit&Id=" . $obj->Id . "\" title=\"Edit\"><img src=\"" . SITE_NAME . "/view/admin/Themes/images/pencil.png\" alt=\"Edit\"></a>";
        $TableBody .= "<a href=\"?action=delete&Id=" . $obj->Id . "\" title=\"Delete\" onClick=\"return confirm('Bạn có chắc chắc muốn xóa?')\"><img src=\"" . SITE_NAME . "/view/admin/Themes/images/cross.png\" alt=\"Delete\"></a> ";
        $TableBody .= "</td>";
        $TableBody .= "</tr>";
    }
    return $TableBody;
}

//
function showFrom($form, $ListKey = array())
{
    $str_from = '<p style="color: red">Chú ý: Phần chọn các tour chỉ phục vụ cho các đối tác để họ cập nhật số chỗ của tour, nếu là admin của hệ thống thì tuyệt đối không được chọn mục này</p>';
    if (isset($ListKey['tour_list'])) {
        $arr_tour = array();
        if ($form) {
            $arr_tour = explode(',', $form->tour_id);
        }
        $str_from .= '<p><label>Danh sách tour cho đối tác</label><select multiple="multiple" name="favorite_fruits" id="fruit_select">';
        foreach ($ListKey['tour_list'] as $key) {
            $selec = '';
            if (in_array($key->id, $arr_tour)) {
                $selec = 'selected';
            }
            $str_from .= '<option value="' . $key->id . '" ' . $selec . '>' . $key->name . '</option>';
        }
        $str_from .= '</select>';
    }
    $str_from .= '<p hidden><label>tour_id</label><input class="text-input small-input" id="tour_id" type="text"  name="tour_id" value="' . (($form != false) ? $form->tour_id : '') . '" /></p>';

    $str_from .= '<p><label>Quyen</label>';
    $str_from .= '<select name="Quyen">';
    if (isset($ListKey['Quyen'])) {
        foreach ($ListKey['Quyen'] as $key) {
            $str_from .= '<option value="' . $key->id . '" ' . (($form != false) ? (($form->Quyen == $key->id) ? 'selected' : '') : '') . '>' . $key->name . '</option>';
        }
    }
    $str_from .= '</select></p>';

    $str_from .= '<p><label>Khách sạn</label>';
    $str_from .= '<select name="khachsan_id" style="width: 50%">';
    $str_from .= '<option value="">Nếu tài khoản là Hotel vui lòng chọn tên khách sạn</option>';
    if (isset($ListKey['khachsan_id'])) {
        foreach ($ListKey['khachsan_id'] as $key) {
            $str_from .= '<option value="' . $key->id . '" ' . (($form != false) ? (($form->khachsan_id == $key->id) ? 'selected' : '') : '') . '>' . $key->name . '</option>';
        }
    }
    $str_from .= '</select></p>';


    $str_from .= '<p><label>status</label><input  type="checkbox"  name="status" value="1" ' . (($form != false) ? (($form->status == '1') ? 'checked' : '') : '') . ' /></p>';
    $str_from .= '<p><label>TenDangNhap</label><input class="text-input small-input" type="text"  name="TenDangNhap" value="' . (($form != false) ? $form->TenDangNhap : '') . '" /></p>';
    $str_from .= '<p><label>Full_name</label><input class="text-input small-input" type="text"  name="Full_name" value="' . (($form != false) ? $form->Full_name : '') . '" /></p>';
    $str_from .= '<p><label>MatKhau</label><input class="text-input small-input" type="password"  name="MatKhau" value="' . (($form != false) ? $form->MatKhau : '') . '" /></p>';


    return $str_from;
}
