<?php
if(isset($_POST['name'])){
    $string_info_booking = "name=" . $_POST['name'];
    $string_info_booking .= "&email=" . $_POST['email'];
    $string_info_booking .= "&phone=" . $_POST['phone'];
    $string_info_booking .= "&title=" . $_POST['title'];
    $string_info_booking .= "&content=" . $_POST['content'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://azbooking.vn/contact-tiep-thi-lien-ket.html");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $string_info_booking);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    curl_close($ch);
    if ($res == 1) {
        echo "<script>alert('Azbooking.vn cảm ơn quý khách đã gửi liên hệ đến chúng tôi, Azbooking.vn sẽ liên hệ với bạn sớm nhất, xin cảm ơn!')</script>";
    }else{
        echo "<script>alert('Liên hệ thất bại, bạn vui lòng thử lại')</script>";
    }
}

?>
<a name="support"></a>
<div id="layers-widget-contactus-10"
     class="widget content-vertical-massive apptech-contactus    block-lg block-md block-sm block-xs  ">


    <div class="container clearfix">
        <div class="section-title clearfix medium text-center ">
            <h3 class="heading">
               Liên hệ với <span style="color: #f70000;">AZBOOKING.VN</span></h3>
            <div class="excerpt"><p>Bất cứ lúc nào bạn cần hỗ trợ hãy liên hệ ngay với chúng tôi</p>
            </div>
        </div>
    </div>
    <!-- Section title end -->

    <div class="container">
        <div class="grid">
            <div class="column middled  span-12">
                <div class="grid">

                    <div class="column  span-8 middled">
                        <div class="contact-form-area">
                            <div>
                                <form  method="post" action="">
                                    <div class="contact-form">
                                        <div class="form-group">
                                                    <span class=""><input type="text" required
                                                                                                          name="name"
                                                                                                          class=""
                                                                                                          placeholder="Họ tên *"/></span>
                                        </div>
                                        <div class="form-group">
                                                    <span class=""><input type="email" required
                                                                                                            name="email"
                                                                                                            class=""
                                                                                                            placeholder="Email *"/></span>
                                        </div>
                                        <div class="form-group">
                                                    <span class=""><input type="text" required
                                                                                                            name="phone"
                                                                                                            class=""
                                                                                                            placeholder="Điện thoại *"/></span>
                                        </div>
                                        <div class="form-group">
                                                    <span class=""><input type="text" required
                                                                                                            name="title"
                                                                                                            class=""
                                                                                                            placeholder="Tiêu đề *"/></span>
                                        </div>
                                        <div class="form-group">
                                                    <span class=""><textarea
                                                            name="content" cols="40" rows="10"
                                                            class="wpcf7-form-control wpcf7-textarea" placeholder="Nội dung"></textarea></span>
                                        </div>
                                        <div class="submit-form" style="text-align: center">
                                            <input id="submit_contact" type="submit" value="Gửi liên hệ" style="border-radius:4px"
                                                   class=" "/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="column setaddressinfo span-12">
                        <div class="company-location">
                            <div class="conatct-info">
                                <!-- single start -->
                                <div class="single-contact-info col-xs-12">
                                    <div class="contact-icon">
                                        <i class="zmdi zmdi-phone"></i>
                                    </div>
                                    <div class="contact-text">
														<span><a href="tel:0943 838 222">0943 838 222</a>
															<br>
															<a href="tel:0975 820 479">0975 820 479</a>																									</span>
                                    </div>
                                </div>
                                <!-- single end -->
                                <!-- single start -->
                                <div class="single-contact-info col-xs-12">
                                    <div class="contact-icon">
                                        <i class="zmdi zmdi-globe-alt"></i>
                                    </div>
                                    <div class="contact-text">
														<span>
																													<a href="mailto:info@azbooking.vn">info@azbooking.vn</a>																												<br>
																												<a href="mailto:info@azbooking.vn">thanhtuyen@mixmedia.vn</a>																										</span>
                                    </div>
                                </div>
                                <!-- single end -->
                                <!-- single start -->
                                <div class="single-contact-info col-xs-12">

                                    <div class="contact-icon">
                                        <i class="zmdi zmdi-pin"></i>
                                    </div>

                                    <div class="contact-text">
														<span>Phòng 2001, tầng 20, tòa nhà 137 Nguyễn Ngọc Vũ, Cầu Giấy, Hà Nội</span>																												</span>

                                    </div>
                                </div>
                                <!-- single end -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <style type="text/css"> /* INLINE WIDGET CSS */
        #layers-widget-contactus-10 {
            background-color: #f1f1f1;
            background-repeat: no-repeat;
            background-position: center;
        }
        #submit_contact{
            background: rgba(24, 121, 253, 1) none repeat scroll 0 0;
            border: 1px solid transparent;
            color: #fff;
            font-size: 15px;
            font-weight: 400;
            height: 40px;
            line-height: 38px;
            margin-top: 20px;
            padding: 0 15px;
            text-transform: none;
            border-radius: 0px;
            width: inherit;
        }
    </style>
</div>