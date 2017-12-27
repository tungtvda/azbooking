<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_tiepthi_thanhvien($data = array())
{
    $asign = array();
    $asign['title_table'] = $data['title_table'];
    $asign['danhsach'] = '';
    $asign['mess_null'] = '';
    if (count($data['danhsach']) > 0) {
        $dem=1;
        foreach ($data['danhsach'] as $row) {
            if($row['status']==1){
                $status='<a class="btn btn-success">Đã kích hoạt</a>';
            }else{
                $status='<a class="btn btn-danger">Chưa kích hoạt</a>';
            }

            if($row['type_tiep_thi']==1){
                $type_tiep_thi='<a class="btn btn-info">4 sao</a>';
            }else{
                if($row['type_tiep_thi']==2){
                    $type_tiep_thi='<a class="btn btn-primary">5 sao</a>';
                }else{
                    $type_tiep_thi='<a class="btn btn-warning">3 sao</a>';
                }
            }
            $lien_he='';
            if($row['phone']!=''){
                $lien_he.='<p><i class="fa fa-phone" ></i> '.$row['phone'].'</p>';
            }
            if($row['mobi']!=''){
                $lien_he.='<p><i class="fa fa-mobile " ></i> '.$row['mobi'].'</p>';
            }
            if($row['facebook']!=''){
                $lien_he.='<p><i class="fa fa-facebook " ></i> '.$row['facebook'].'</p>';
            }
            if($row['skype']!=''){
                $lien_he.='<p><i class="fa fa-skype " ></i> '.$row['skype'].'</p>';
            }
            $asign['danhsach'] .= '<tr>
            <td >'.$dem.'</td>
            <td ><img style="width: 50px" src="'.$row['avatar'].'"></td>
            <td>'.$row['name'].'</td>
            <td class="lienhe_thanhvien">'.$lien_he.'</td>
            <td>'.$type_tiep_thi.'</td>
            <td>'.$status.'</td>
            <td>'._returnDateFormatConvert($row['created']).'</td>


        </tr>
        ';
            $dem++;
        }
    } else {
        $asign['mess_null'] = 'Bạn không có thành viên nào';
        switch($data['active_tab']){
            case '3_sao':
                $asign['mess_null'] = 'Bạn không có thành viên 3 sao nào';
                break;
            case '4_sao':
                $asign['mess_null'] = 'Bạn không có thành viên 4 sao nào';
                break;
            case '5_sao':
                $asign['mess_null'] = 'Bạn không có thành viên 5 sao nào';
                break;
        }
    }
    $asign['PAGING'] = $data['PAGING'];
    $asign['all'] = ($data['active_tab'] == 'all') ? 'active' : '';
    $asign['3_sao'] = ($data['active_tab'] == '3_sao') ? 'active' : '';
    $asign['4_sao'] = ($data['active_tab'] == '4_sao') ? 'active' : '';
    $asign['5_sao'] = ($data['active_tab'] == '5_sao') ? 'active' : '';

    $title = 'Đăng ký thành viên - AZBOOKING.VN';
    $logo = SITE_NAME . '/email_template/images/logoazboong.vn.png';
    $banner = SITE_NAME . '/email_template/images/banner.jpg';
    $footer = SITE_NAME . '/email_template/images/footer.png';

    if (count($data['config']) > 0 && $data['config'][0]->Logo != '') {
        $logo = _returnCheckLinkImg($data['config'][0]->Logo);
        $banner = _returnCheckLinkImg($data['config'][0]->banner_email);
        $footer = _returnCheckLinkImg($data['config'][0]->footer_email);
        $title = $data['config'][0]->Name;
    }
    $data_session=checkSession('', 1);
    $asign['user_tiep_thi']=_return_mc_encrypt($data_session['id']);

    $name_customer = '[username_dangky]';
    $link_dangky = '[link_dangky]';
    $tour_string = '';
    $data_tour_sales = tour_getByTop(4, 'price_sales!="" ', 'id desc');
    if (count($data_tour_sales) > 0) {
        foreach ($data_tour_sales as $row_tour) {
            $name_list_tour = $row_tour->name;
            $price_list = '';
            if ($row_tour->price == 0 || $row_tour->price == '') {
                $price_list = 'Liên hệ';
            } else {
                $price_list = number_format((int)$row_tour->price, 0, ",", ".") . ' vnđ';
            }
            $price_list_sales = number_format((int)$row_tour->price_sales, 0, ",", ".") . ' vnđ';
            $durations = $row_tour->durations;
            $data_danhmuc_1 = danhmuc_1_getById($row_tour->DanhMuc1Id);
            $data_danhmuc_2 = danhmuc_2_getById($row_tour->DanhMuc2Id);
            $name_url_dm1 = '';
            if (count($data_danhmuc_1) > 0) {
                $name_url_dm1 = $data_danhmuc_1[0]->name_url;
            }
            $name_url_dm2 = '';
            if (count($data_danhmuc_2) > 0) {
                $name_url_dm2 = $data_danhmuc_2[0]->name_url;
            }
            $link_tour_list = link_tourdetail($row_tour, $name_url_dm1, $name_url_dm2);
            $img_list = _returnCheckLinkImg($row_tour->img);
            $tour_string .= '<div style="width: 23%;float: left;padding-left: 10px; padding-right: 10px" class="col-md-3 col-sm-6">
                        <div style="    text-align: center;
    margin-bottom: 30px;" class="news">
                            <a href="' . $link_tour_list . '"><img title="' . $name_list_tour . '" alt="' . $name_list_tour . '" style="    width: 100%;
    max-width: 100%;
    height: 160px;
    margin-bottom: 20px;" class="news-image" src="' . $img_list . '"></a>
                            <h3 title="' . $name_list_tour . '" style="font-size: 1em;text-overflow: ellipsis; text-align: left;
    overflow: hidden;
    white-space: nowrap;
    margin: 0 0 10px;" class="news-title"><a style="text-decoration: none;" href="' . $link_tour_list . '">' . $name_list_tour . '</a></h3>
                            <small class="date">
                                <ins><span class="amount" style="color: red; font-size: 14px; font-weight: bold">' . $price_list . '</span></ins> | <del><span class="amount" style="    color: #B1B1B1;">' . $price_list_sales . '</span></del>
                            </small>
                            <p style="text-align: left">
                                Thời gian: ' . $durations . '
                            </p>
                        </div>
                    </div>';
        }
    }
    $content_email=' <h3 style="font-weight: 600;
  font-size: 18px;
  border-bottom: 3px solid #0091EA;
  color: #0091ea;
  line-height: 1.3em;
  margin-top: 0;
  line-height: 58px;
  z-index: 9;
  text-transform: uppercase;
  text-align: center;" class="title_index">XÁC THỰC TÀI KHOẢN</h3>
                <div style="float: left;width: 100%;" class="col-xs-12 row">
                <p>Chào bạn, <b>' . $name_customer . '</b></p>
                <p>Thành viên '.$data_session['name'].' - '.$data_session['user_email'].' đã thêm bạn vào hệ thống tiếp thị liên kết <span style="color: #0091ea;">AZBOOKING.VN</span>. Để kích hoạt tài khoản, bạn vui lòng truy cập đường dẫn bên dưới để xác nhận tài khoản.</p>

                <p style="color: #0091ea;"><a href="' .SITE_NAME.'/'.$link_dangky . '">' .SITE_NAME.'/'.$link_dangky . '</a></p>
                <p>Nếu nhấp vào đường dẫn không được, bạn có thể sao chéo đường dẫn vào cửa sổ trình duyệt hoặc gõ lại trực tiếp trong đó</p>
                <p>Trân trọng !</p>
                </div>';

    $message_dangky = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <title>' . $title . '</title>
</head>
<body>
<div style="width: 1000px;  margin:auto" class="site-content">
    <header style="position: relative;z-index: 999; background: white;text-align: center; padding: 10px 0 3px;" class="site-header">
        <div style=" text-align: center" >
            <a style=" text-align: center" href="' . SITE_NAME . '" >
                <img title="' . $title . '" style="width: 20%"
                     src="' . $logo . '"
                     alt="' . $title . '">
            </a>
        </div>
    </header>

    <div style="float: left; width: 100%" class="hero">
        <div class="slides">
            <img style="width: 100%" src="' . $banner . '">
        </div>
    </div>

    <main style="float: left; width: 100%" class="main-content">
        <div class="fullwidth-block">
            <div style="width: 100%;" class="container" class="container">
               '.$content_email.'
            </div>
        </div>

        <div class="fullwidth-block">
            <div style="    width: 100%; " class="container">
                <h3 style="font-weight: 600;
  font-size: 18px;
  border-bottom: 3px solid #0091EA;
  color: #0091ea;
  line-height: 1.3em;
  margin-top: 0;
  line-height: 58px;
  z-index: 9;
  text-transform: uppercase;
  text-align: center;" class="title_index">Có thể bạn quan tâm <a
                        style="float: right; margin-top: 10px; color: red; font-weight: bold;font-size: 14px;"
                        href="' . SITE_NAME . '/tour-du-lich/">Xem thêm...</a></h3>

                <div style="float: left; width: 100%" class="row">

                   ' . $tour_string . '

                </div>
            </div>
        </div>

    </main>

    <footer class="site-footer">
        <div style="    width: 100%;" class="container">
            <div class="row">
               <img title="' . $title . '" style="width: 100%;" src="' . $footer . '">
            </div>
        </div>
    </footer>
</div>
</body>
</html>';
    $asign['message_dangky']=_return_mc_encrypt($message_dangky,'','');

    print_template($asign, 'tiep_thi_thanhvien');
}



