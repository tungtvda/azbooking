<?php
require_once DIR . '/common/paging.php';
require_once DIR . '/common/cls_fast_template.php';
function view_tour($data)
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
    $ft->assign('TABLE-NAME', 'tour');
    $ft->assign('CONTENT-BOX-LEFT', isset($data['content_box_left']) ? $data['content_box_left'] : '');
    $ft->assign('CONTENT-BOX-RIGHT', isset($data['content_box_right']) ? $data['content_box_right'] : ' ');
    $ft->assign('NOTIFICATION', isset($data['notification']) ? $data['notification'] : ' ');
    $ft->assign('SITE-NAME', isset($data['sitename']) ? $data['sitename'] : SITE_NAME);
    $ft->assign('kichhoat_tour', 'active');
    $ft->assign('kichhoat_tour_hienthi', 'display: block');
    $ft->assign('FORM', showFrom(isset($data['form']) ? $data['form'] : '', isset($data['listfkey']) ? $data['listfkey'] : array()));
    //
    print $ft->parse_and_return('header');
    print $ft->parse_and_return('body');
    print $ft->parse_and_return('footer');
}

//
function showTableHeader()
{
    return '<th>id</th><th>Trạng thái</th><th>Điều hành</th><th>Quốc tế</th><th>DanhMuc1Id / DanhMuc2Id</th><th>Promotion/Packages</th><th>name</th><th>code</th><th>img</th><th>Hoa hồng</th><th>price_sales</th><th>price</th>';
}

//
function showTableBody($data)
{
    $danhmuc_id_get = '';
    if (isset($_GET['DanhMuc1Id']) && $_GET['DanhMuc1Id'] != '') {
        $danhmuc_id_get = '&DanhMuc1Id=' . $_GET['DanhMuc1Id'];
    } else {
        if (isset($_GET['DanhMuc2Id']) && $_GET['DanhMuc2Id'] != '') {
            $danhmuc_id_get = '&DanhMuc2Id=' . $_GET['DanhMuc2Id'];
        }
    }
    $TableBody = '';
    if (count($data) > 0) foreach ($data as $obj) {
        $TableBody .= "<tr><td><input type=\"checkbox\" name=\"check_" . $obj->id . "\"/></td>";
        $TableBody .= "<td>" . $obj->id . "</td>";
        $TableBody .= "<td>" . $obj->status . "</td>";
        $TableBody .= "<td>" . $obj->dieuhanh_id . "</td>";
        $TableBody .= "<td>" . $obj->tour_quoc_te . "</td>";
        $TableBody .= "<td>" . $obj->DanhMuc1Id . " / " . $obj->DanhMuc2Id . "</td>";
        $TableBody .= "<td>" . $obj->promotion . "/" . $obj->packages . "</td>";
        $TableBody .= "<td>" . $obj->name . "</td>";
        $TableBody .= "<td>" . $obj->code . "</td>";
        $TableBody .= "<td><img src=\"" . $obj->img . "\" width=\"50px\" height=\"50px\"/> </td>";
        $TableBody .= "<td>" . number_format((float)$obj->price_tiep_thi, 0, ",", ".").' vnđ)' . "</td>";
        $TableBody .= "<td>" . number_format((float)$obj->price_sales, 0, ",", ".").' vnđ)' . "</td>";
        $TableBody .= "<td>" . number_format((float)$obj->price, 0, ",", ".").' vnđ)' . "</td>";
        $TableBody .= "<td><a href=\"?action=edit&id=" . $obj->id . $danhmuc_id_get . "\" title=\"Edit\"><img src=\"" . SITE_NAME . "/view/admin/Themes/images/pencil.png\" alt=\"Edit\"></a>";
        $TableBody .= "<a href=\"?action=delete&id=" . $obj->id . $danhmuc_id_get . "\" title=\"Delete\" onClick=\"return confirm('Bạn có chắc chắc muốn xóa?')\"><img src=\"" . SITE_NAME . "/view/admin/Themes/images/cross.png\" alt=\"Delete\"></a> ";
        $TableBody .= "</td>";
        $TableBody .= "</tr>";
    }
    return $TableBody;
}

//
function showFrom($form, $ListKey = array())
{
    $str_from = '';
    $str_from .= '<p><label>Trạng thái</label><input  type="checkbox"  name="status" value="1" ' . (($form != false) ? (($form->status == '1') ? 'checked' : '') : '') . ' /></p>';
    $str_from .= '<p><label>Điều hành</label>';
    $str_from .= '<select name="dieuhanh_id">';
    $str_from .= '<option value="0">Chọn người điều hành</option>';
    if (isset($ListKey['list_user'])) {
        foreach ($ListKey['list_user'] as $key_dieu_hanh) {
            $str_from .= '<option value="' . $key_dieu_hanh['id'] . '" ' . (($form != false) ? (($form->dieuhanh_id == $key_dieu_hanh['id']) ? 'selected' : '') : '') . '>' . $key_dieu_hanh['name'] . '</option>';
        }
    }
    $str_from .= '</select></p>';
    $str_from .= '<p><label>tour_quoc_te</label><input  type="checkbox"  name="tour_quoc_te" value="1" ' . (($form != false) ? (($form->tour_quoc_te == '1') ? 'checked' : '') : '') . ' /></p>';
    $str_from .= '<p><label>Chọn danh mục cấp 1 <span style="color: red">*</span></label>';
    $str_from .= '<select name="DanhMuc1Id" id="DanhMuc1Id">';
    if ($form != false) {
        if (isset($ListKey['DanhMuc1Id'])) {
            foreach ($ListKey['DanhMuc1Id'] as $key) {
                $str_from .= '<option value="' . $key->id . '" ' . (($form != false) ? (($form->DanhMuc1Id == $key->id) ? 'selected' : '') : '') . '>' . $key->name . '</option>';
            }
        }
    } else {

        if (isset($ListKey['DanhMuc1Id'])) {
            foreach ($ListKey['DanhMuc1Id'] as $key) {
                $str_from .= '<option value="' . $key->id . '" ' . (($form != false) ? (($form->DanhMuc1Id == $key->id) ? 'selected' : '') : '') . '>' . $key->name . '</option>';
            }
        }
    }
    $str_from .= '</select></p>';
    $str_from .= '<p><label>Chọn danh mục cấp 2 <span style="color: red">*</span></label>';
    $str_from .= '<select name="DanhMuc2Id" id="DanhMuc2Id">';
    if ($form != false) {
        $str_from .= '<option value="1">Chọn danh mục cấp 2</option>';
        if (isset($ListKey['DanhMuc2Id'])) {
            foreach ($ListKey['DanhMuc2Id'] as $key) {
                $str_from .= '<option value="' . $key->id . '" ' . (($form != false) ? (($form->DanhMuc2Id == $key->id) ? 'selected' : '') : '') . '>' . $key->name . '</option>';
            }
        }
    } else {
        $str_from .= '<option value="1">Chọn danh mục cấp 2</option>';
    }
    $str_from .= '</select></p>';
    $str_from .= '<p><label>promotion</label><input  type="checkbox"  name="promotion" value="1" ' . (($form != false) ? (($form->promotion == '1') ? 'checked' : '') : '') . ' /></p>';
    $str_from .= '<p><label>packages</label><input  type="checkbox"  name="packages" value="1" ' . (($form != false) ? (($form->packages == '1') ? 'checked' : '') : '') . ' /></p>';
    $str_from .= '<p><label>name <span style="color: red">*</span></label><input class="text-input small-input" type="text"  name="name" value="' . (($form != false) ? $form->name : '') . '" /></p>';
    $str_from .= '<p><label>name_url</label><input class="text-input small-input" type="text"  name="name_url" value="' . (($form != false) ? $form->name_url : '') . '" /></p>';
    $str_from .= '<p><label>Count down</label><input class="text-input small-input" type="text"  name="count_down" value="' . (($form != false) ? $form->count_down : '') . '" /></p>';
    $str_from .= '<p><label>code</label><input class="text-input small-input" type="text"  name="code" value="' . (($form != false) ? $form->code : '') . '" /></p>';
    $str_from .= '<p><label>img</label><input class="text-input small-input" type="text"  name="img" value="' . (($form != false) ? $form->img : '') . '"/><a class="button" onclick="openKcEditor(\'img\');">Upload ảnh</a></p>';
    $str_from .= '<p><label>Hoa hồng tiếp thị liên kết <span  id="hoa_hong_format" class="price_format">' . (($form != false) ? '('.number_format((float)$form->price_tiep_thi, 0, ",", ".").' vnđ)' : '0 vnđ') . '</span> <span style="color: red">*</span></label><input class="text-input small-input" id="input_hoa_hong" type="text" required  name="price_tiep_thi" value="' . (($form != false) ? $form->price_tiep_thi : '') . '" /></p>';
    $str_from .= '<p><label>Giá sales</label><input class="text-input small-input" type="text"  name="price_sales" value="' . (($form != false) ? $form->price_sales : '') . '" /></p>';
    $str_from .= '<div class="col col_full">
<label>Bảng giá dịch vụ</label>
<style>
th, td {
    padding-top: 5px;
    padding-bottom: 5px;
    text-align: left;
}
</style>
<table class="table_tour">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên dịch vụ</th>
                                            <th>Loại dịch vụ</th>
                                             <th>Số lượng</th>
                                            <th>Đơn giá <span class="price_format" id="don_gia_th"></span></th>
                                            <th>Thành tiền</th>
                                            <th>Ghi chú</th>
                                            <th></th>
                                        </tr>
                                        </thead>

                                        <tbody id="list_dichvu">';
                                       if ($form != false) {
                                           $str_from .=$form->list_dich_vu;
                                        }
                                            $str_from .= '</tbody>
                                        <tbody >
                                        <tr>
                                            <td></td>
                                            <td><a style="margin-top: 10px; margin-bottom: 10px; width: 90px;" href="javascript:void(0)" id="add_dichvu" class="btn btn-success"><i class="fa fa-plus"></i>Thêm dịch vụ</a></td>
                                        </tr>
                                        <tr style="background:#EDF3F4; margin-top:20px">
                                            <td></td>
                                            <td><b>Người lớn</b></td>
                                            <td>Tổng <i class="fa fa-dollar"></i>:&nbsp;
                                            <input readonly="" name="total_dichvu" id="input_tong_tien_nguoi_lon"  value="' . (($form != false) ? $form->total_dichvu : '0 vnđ') . '" type="text" class="valid input_table width-input-150" >
                                            </td>
                                            <td >SL khách:</br><input style="width: 50px" disabled name="total_khach" id="input_total_khach"  value="1" type="text" class="valid input_table"></td>
                                            <td>Giá NET/pax: <input  readonly="" name="gia_net" id="input_don_gia_net"   value="' . (($form != false) ? $form->gia_net : '0 vnđ') . '" type="text" class="valid input_table width-input-150"></td>
                                            <td>Lợi nhuận <span  id="price_loinhuan_format" class="price_format"></span>
                                            <input  name="loi_nhuan" min="0" id="input_loi_nhuan"  value="' . (($form != false) ? $form->loi_nhuan : '0') . '" type="number" class="valid input_table width-input-150">
                                            </td>
                                            <td>Giá bán: <input  disabled name="gia_ban" id="input_gia_ban"  value="' . (($form != false) ? number_format((float)$form->price, 0, ",", ".").' vnđ' : '0 vnđ') . '" type="text" class="valid input_table width-input-150"></td>
                                            <td></td>
                                        </tr>

                                        <tr style="background:#f2fbfd; margin-top:20px">
                                            <td></td>
                                            <td><b>Trẻ em m1</b></td>
                                            <td>Tỷ lệ %: <input  name="ty_le_m1" min="0" id="input_tyle_m1"  value="' . (($form != false) ? $form->ty_le_m1 : '0') . '" type="number" class="valid input_table width-input-150"></td>
                                            <td >SL khách:</br><input style="width: 50px" disabled name="total_khach_m1" id="input_total_khach_m1"  value="1" type="text" class="valid input_table "></td>
                                            <td>Giá NET/pax: <input  readonly="" name="gia_net_m1" id="input_don_gia_net_m1"  value="' . (($form != false) ? $form->gia_net_m1 : '0 vnđ') . '" type="text" class="valid input_table width-input-150"></td>
                                            <td>Lợi nhuận <span  id="price_loinhuan_format_1" class="price_format"></span>
                                            <input  name="loi_nhuan_m1" min="0" id="input_loi_nhuan_m1"  value="' . (($form != false) ? $form->loi_nhuan_m1 : '0') . '" type="number" class="valid input_table width-input-150">
                                            </td>
                                            <td>Giá bán: <input disabled name="gia_ban_m1" id="input_gia_ban_m1"  value="' . (($form != false) ? number_format((float)$form->price_2, 0, ",", ".").' vnđ' : '0 vnđ') . '" type="text" class="valid input_table width-input-150"></td>
                                            <td></td>
                                        </tr>
                                        <tr style="background:#edf3f4; margin-top:20px">
                                            <td></td>
                                            <td><b>Trẻ em m2</b></td>
                                            <td>Tỷ lệ %: <input  name="ty_le_m2" min="0" id="input_tyle_m2" value="' . (($form != false) ? $form->ty_le_m2 : '0') . '" type="number" class="valid input_table width-input-150"></td>
                                            <td >SL khách:</br><input style="width: 50px" disabled name="total_khach_m2" id="input_total_khach_m2" value="1" type="text" class="valid input_table"></td>
                                            <td>Giá NET/pax: <input  readonly="" name="gia_net_m2" id="input_don_gia_net_m2"  value="' . (($form != false) ? $form->gia_net_m2 : '0 vnđ') . '" type="text" class="valid input_table width-input-150"></td>
                                            <td>Lợi nhuận <span  id="price_loinhuan_format_2" class="price_format"></span>
                                            <input  min="0" name="loi_nhuan_m2" id="input_loi_nhuan_m2"  value="' . (($form != false) ? $form->loi_nhuan_m2 : '0') . '" type="number" class="valid input_table width-input-150">
                                            </td>
                                            <td>Giá bán: <input  disabled name="gia_ban_m2" id="input_gia_ban_m2"  value="' . (($form != false) ? number_format((float)$form->price_3, 0, ",", ".").' vnđ' : '0 vnđ') . '" type="text" class="valid input_table width-input-150"></td>
                                            <td></td>
                                        </tr>
                                        <tr style="background:#f2fbfd; margin-top:20px">
                                            <td></td>
                                            <td><b>Trẻ em m3</b></td>
                                            <td>Tỷ lệ %: <input  name="ty_le_m3" min="0" id="input_tyle_m3" value="' . (($form != false) ? $form->ty_le_m2 : '0') . '" type="number" class="valid input_table width-input-150"></td>
                                            <td >SL khách:</br><input style="width: 50px" disabled name="total_khach_m3" id="input_total_khach_m3" value="1" type="text" class="valid input_table "></td>
                                            <td>Giá NET/pax: <input  readonly="" name="gia_net_m3" id="input_don_gia_net_m3"  value="' . (($form != false) ? $form->gia_net_m3 : '0 vnđ') . '" type="text" class="valid input_table width-input-150"></td>
                                            <td>Lợi nhuận <span  id="price_loinhuan_format_3" class="price_format"></span>
                                            <input min="0" name="loi_nhuan_m3" id="input_loi_nhuan_m3"  value="' . (($form != false) ? $form->loi_nhuan_m3 : '0') . '" type="number" class="valid input_table width-input-150">
                                            </td>
                                            <td>Giá bán: <input  disabled name="gia_ban_m3" id="input_gia_ban_m3"  value="' . (($form != false) ? number_format((float)$form->price_4, 0, ",", ".").' vnđ' : '0 vnđ') . '" type="text" class="valid input_table width-input-150"></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
</div>';
    $str_from .= '<div class="col col_full">
    <div class="col-responsive">
    <label>Độ tuổi người lớn</label>
    <input placeholder="Độ tuổi người lớn"  class="text-input-full text-input small-input" type="text"  name="name_price" value="' . (($form != false) ? $form->name_price : '') . '" /></div>
    <div class="col-responsive">
     <label>Đơn giá <span class="price_format" id="don_gia_price_format">' . (($form != false) ? '('.number_format((float)$form->price, 0, ",", ".").' vnđ)' : '') . '</span></label>
    <input readonly class="text-input-full text-input small-input" type="text" id="input_price"  name="price" value="' . (($form != false) ? $form->price : '') . '" /></div>
    </div>';
    $str_from .= '<div class="col col_full">
    <div class="col-responsive">
    <label>Độ tuổi trẻ em mức 1</label>
    <input placeholder="Độ tuổi trẻ em mức 1"  class="text-input-full text-input small-input" type="text"  name="name_price_2" value="' . (($form != false) ? $form->name_price_2 : '') . '" /></div>
    <div class="col-responsive">
     <label>Đơn giá <span class="price_format" id="don_gia_price_2_format">' . (($form != false) ? '('.number_format((float)$form->price_2, 0, ",", ".").' vnđ)' : '') . '</span></label>
    <input readonly class="text-input-full text-input small-input" type="text" id="input_price_2"  name="price_2" value="' . (($form != false) ? $form->price_2 : '') . '" /></div>
    </div>';
    $str_from .= '<div class="col col_full">
    <div class="col-responsive">
    <label>Độ tuổi trẻ em mức 2</label>
    <input  placeholder="Độ tuổi trẻ em mức 2"  class="text-input-full text-input small-input" type="text"  name="name_price_3" value="' . (($form != false) ? $form->name_price_3 : '') . '" /></div>
    <div class="col-responsive">
     <label>Đơn giá <span class="price_format" id="don_gia_price_3_format">' . (($form != false) ? '('.number_format((float)$form->price_3, 0, ",", ".").' vnđ)' : '') . '</span></label>
    <input readonly class="text-input-full text-input small-input" type="text" id="input_price_3"  name="price_3" value="' . (($form != false) ? $form->price_3 : '') . '" /></div>
    </div>';
    $str_from .= '<div class="col col_full" style="margin-bottom: 10px">
    <div class="col-responsive">
    <label>Độ tuổi trẻ em mức 3</label>
    <input placeholder="Độ tuổi trẻ em mức 3"  class="text-input-full text-input small-input" type="text"  name="name_price_4" value="' . (($form != false) ? $form->name_price_4 : '') . '" /></div>
    <div class="col-responsive">
     <label>Đơn giá <span class="price_format" id="don_gia_price_4_format">' . (($form != false) ? '('.number_format((float)$form->price_4, 0, ",", ".").' vnđ)' : '') . '</span></label>
    <input readonly class="text-input-full text-input small-input" type="text" id="input_price_4"  name="price_4" value="' . (($form != false) ? $form->price_4 : '') . '" /></div>
    </div>';

    $str_from .= '<p hidden><label>Đơn giá theo số người(1)___Chú ý: định dạng theo  <span style="color: blue">songuoi1-gia1,songuoi2-gia2</span>___Ví dụ: <span style="color: red">1-1000000,2-2000000,3-3000000</span></label>
<input style="width: 100%" class="text-input small-input" type="text"   name="price_number" value="' . (($form != false) ? $form->price_number : '') . '" /></p>';

    $str_from .= '<p hidden><label>Đơn giá theo số người(2)___Chú ý: định dạng theo  <span style="color: blue">songuoi1-gia1,songuoi2-gia2</span>___Ví dụ: <span style="color: red">1-1000000,2-2000000,3-3000000</span></label>
<input style="width: 100%" class="text-input small-input" type="text"  name="price_number_2" value="' . (($form != false) ? $form->price_number_2 : '') . '" /></p>';


    $str_from .= '<p hidden><label>Đơn giá theo số người(3)___Chú ý: định dạng theo  <span style="color: blue">songuoi1-gia1,songuoi2-gia2</span>___Ví dụ: <span style="color: red">1-1000000,2-2000000,3-3000000</span></label>
<input style="width: 100%" class="text-input small-input" type="text"  name="price_number_3" value="' . (($form != false) ? $form->price_number_3 : '') . '" /></p>';
    $str_from .= '<p hidden><label>Đơn giá theo số người(4)___Chú ý: định dạng theo  <span style="color: blue">songuoi1-gia1,songuoi2-gia2</span>___Ví dụ: <span style="color: red">1-1000000,2-2000000,3-3000000</span></label>
<input style="width: 100%" class="text-input small-input" type="text"  name="price_number_4" value="' . (($form != false) ? $form->price_number_4 : '') . '" /></p>';

    $str_from .= '<p hidden><label>Tên Giá - Giá(5)</label>
<input style="width: 40%" class="text-input small-input" type="text"  name="name_price_5" value="' . (($form != false) ? $form->name_price_5 : '') . '" />
<input style="width: 40%" class="text-input small-input" type="text"  name="price_5" value="' . (($form != false) ? $form->price_5 : '') . '" />
</p>';
    $str_from .= '<p hidden><label>Đơn giá theo số người(5)___Chú ý: định dạng theo  <span style="color: blue">songuoi1-gia1,songuoi2-gia2</span>___Ví dụ: <span style="color: red">1-1000000,2-2000000,3-3000000</span></label>
<input style="width: 100%" class="text-input small-input" type="text"  name="price_number_5" value="' . (($form != false) ? $form->price_number_5 : '') . '" /></p>';


    $str_from .= '<p hidden><label>price_6</label>
<input style="width: 40%" class="text-input small-input" type="text"  name="name_price_6" value="' . (($form != false) ? $form->name_price_6 : '') . '" />
<input style="width: 40%" class="text-input small-input" type="text"  name="price_6" value="' . (($form != false) ? $form->price_6 : '') . '" />
</p>';
    $str_from .= '<p hidden><label>Đơn giá theo số người(6)___Chú ý: định dạng theo  <span style="color: blue">songuoi1-gia1,songuoi2-gia2</span>___Ví dụ: <span style="color: red">1-1000000,2-2000000,3-3000000</span></label>
<input style="width: 100%" class="text-input small-input" type="text"  name="price_number_6" value="' . (($form != false) ? $form->price_number_6 : '') . '" /></p>';


    $str_from .= '<p><label>Số chỗ nếu có</label><input class="text-input small-input" type="text"  name="so_cho" value="' . (($form != false) ? $form->so_cho : '') . '" /></p>';
    $str_from .= '<p><label>durations</label><input class="text-input small-input" type="text"  name="durations" value="' . (($form != false) ? $form->durations : '') . '" /></p>';
    $str_from .= '<p><label>departure</label><input class="text-input small-input" type="text"  name="departure" value="' . (($form != false) ? $form->departure : '') . '" /></p>';
    $str_from .= '<p><label>departure</label>';
    $str_from .= '<p><label>Điểm khởi hành</label>';
    $arr_check = array();
    if ($form != false) {
        $arr_check = explode(',', $form->departure);
    }
    foreach ($ListKey['departure'] as $key) {
        $checked = '';
        if (in_array($key->id, $arr_check)) {
            $checked = 'checked';
        }
        $str_from .= $key->name . ' <input style="margin-top: -4px;" ' . $checked . '  class="text-input small-input show_' . $key->id . '" type="checkbox"  name="departure[]" value="' . $key->id . '" /> --- ';
    }

    $str_from .= '</p>';
    $str_from .= '<p><label>departure_time</label><input class="text-input small-input" type="text"  name="departure_time" value="' . (($form != false) ? $form->departure_time : '') . '" /></p>';
    $str_from .= '<p><label>destination</label><input class="text-input small-input" type="text"  name="destination" value="' . (($form != false) ? $form->destination : '') . '" /></p>';
    $str_from .= '<p><label>vehicle</label><input class="text-input small-input" type="text"  name="vehicle" value="' . (($form != false) ? $form->vehicle : '') . '" /></p>';
    $str_from .= '<p><label>hotel</label><input class="text-input small-input" type="text"  name="hotel" value="' . (($form != false) ? $form->hotel : '') . '" /></p>';
    $str_from .= '<p><label>summary</label><textarea name="summary">' . (($form != false) ? $form->summary : '') . '</textarea><script type="text/javascript">CKEDITOR.replace(\'summary\'); </script></p>';
    $str_from .= '<p><label>highlights</label><textarea name="highlights">' . (($form != false) ? $form->highlights : '') . '</textarea><script type="text/javascript">CKEDITOR.replace(\'highlights\'); </script></p>';
    $str_from .= '<p><label>schedule</label><textarea name="schedule">' . (($form != false) ? $form->schedule : '') . '</textarea><script type="text/javascript">CKEDITOR.replace(\'schedule\'); </script></p>';
    $str_from .= '<p><label>price_list</label><textarea name="price_list">' . (($form != false) ? $form->price_list : '') . '</textarea><script type="text/javascript">CKEDITOR.replace(\'price_list\'); </script></p>';
    $str_from .= '<p><label>content</label><textarea name="content">' . (($form != false) ? $form->content : '') . '</textarea><script type="text/javascript">CKEDITOR.replace(\'content\'); </script></p>';
    $str_from .= '<p><label>list_img</label><textarea name="list_img">' . (($form != false) ? $form->list_img : '') . '</textarea><script type="text/javascript">CKEDITOR.replace(\'list_img\'); </script></p>';
    $str_from .= '<p><label>title</label><input class="text-input small-input" type="text"  name="title" value="' . (($form != false) ? $form->title : '') . '" /></p>';
    $str_from .= '<p><label>keyword</label><input class="text-input small-input" type="text"  name="keyword" value="' . (($form != false) ? $form->keyword : '') . '" /></p>';
    $str_from .= '<p><label>description</label><input class="text-input small-input" type="text"  name="description" value="' . (($form != false) ? $form->description : '') . '" /></p>';
    $str_from .= '<p><label>inclusion</label><textarea name="inclusion">' . (($form != false) ? $form->inclusion : '') . '</textarea><script type="text/javascript">CKEDITOR.replace(\'inclusion\'); </script></p>';
    $str_from .= '<p><label>exclusion</label><textarea name="exclusion">' . (($form != false) ? $form->exclusion : '') . '</textarea><script type="text/javascript">CKEDITOR.replace(\'exclusion\'); </script></p>';
    $str_from .= '<p hidden><label>updated</label><input class="text-input small-input" type="text"  name="updated" value="' . (($form != false) ? $form->updated : '') . '" /></p>';
    $str_from.=' <div hidden id="danhmuc_dichvu_select">'.$ListKey['list_type_string'].'</div>';
    return $str_from;
}
