
// requestAnimationFrame polyfill
(function() {
    url = $('#site_name_manage').val();
    if($('#program_slide').length){
        sliderPoint('program_slide','program_point');
        sliderPoint('tour_guide_full_slide','tour_guide_full_point');
        //sliderPoint('tour_guide_local_slide','tour_guide_local_point');
        sliderPoint('hotel_slide','hotel_point');
        sliderPoint('restaurant_slide','restaurant_point');
        sliderPoint('transportation_slide','transportation_point');

        function sliderPoint(id_range, id_point){
            var slider = document.getElementById(id_range);
            var output = document.getElementById(id_point);
            output.innerHTML = slider.value; // Display the default slider value
            slider.oninput = function() {
                output.innerHTML = this.value;
            }
        }
    }

    $('body').on("click", '#show_hide_statis', function () {
       $('#tooltip_score_distribution').slideToggle();
    });
    $('body').on("click", '.icon_show_hide_form_review', function () {
        $('#form_review_show_hide').slideToggle();
    });
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        minDate: '0',
        startDate: '-3d',
    });

    $( "#show_hide_statis" ).hover(
        function() {
            $('#tooltip_score_distribution').show();
        }, function() {
            $('#tooltip_score_distribution').hide();
        }
    );

    $('body').on("input",'.valid_input',function(){
        var name=$(this).attr('name');
        if(name){
            if(name=='email_cus_review'){
                $('#error_'+name).html('Bạn vui lòng nhập email');
            }
            if($(this).val()==''){
                $('#error_'+name).show();
                $(this).removeClass('valid');
            }else{
                $('#error_'+name).hide();
                if(name=='email_cus_review'){
                    var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                    var is_email = re.test($(this).val());
                    if (is_email) {
                        $(this).addClass('valid');
                        $('#error_'+name).html('Bạn vui lòng nhập email');
                    }else {
                        $('#error_'+name).html('Email không đúng định dạng').show();
                    }
                }else{
                    $(this).addClass('valid');
                }
            }
        }
    });
    $('body').on("click", '.submit_review', function () {
        var form_data = $("#form_submit_review").serializeArray();
        var error_free = true;
        for (var input in form_data) {
            var name_input=form_data[input]['name'];
            var element = $("#input_" + form_data[input]['name']);
            var error = $("#error_" + form_data[input]['name']);
            var valid = element.hasClass("valid");
            if (valid == false) {
                if(name_input!='ngay_khoi_hanh_review' && name_input!='comment_review' && name_input!='comment_upcoming'&& name_input!='program'&& name_input!='tour_guide_full'&& name_input!='tour_guide_local'&& name_input!='hotel'&& name_input!='restaurant'&& name_input!='transportation'){
                    console.log(name_input);
                    error.show();
                    error_free = false
                }
            }
        }
        if (error_free != false) {
            var link = url + '/add-review.html';
           var loading_form=0;
            $.ajax({
                method: 'POST',
                url: link,
                data:  $('#form_submit_review').serialize(),
                success: function (response) {
                    try {
                        response = $.parseJSON(response);
                        if(response.success==1){
                            $('#show_mess').slideDown().removeClass('alert-danger').addClass('alert-success');
                            $('#show_mess strong').text(response.mess);
                        }else{
                            $('#show_mess').slideDown().removeClass('alert-success').addClass('alert-danger');
                            $('#show_mess strong').text(response.mess)
                        }
                        loading_form=1;
                    }
                    catch(err) {
                        $('#show_mess').slideDown().removeClass('alert-success').addClass('alert-danger');
                        $('#show_mess strong').text('Đánh giá lỗi, bạn vui lòng thử thại')
                    }
                    if(loading_form==1){
                        $('#input_content_review').val('').removeClass('valid');
                        $('#input_name_cus_review').val('').removeClass('valid');
                        $('#input_email_cus_review').val('').removeClass('valid');
                        $('#input_phone_cus_review').val('').removeClass('valid');
                        $('#input_ngay_khoi_hanh').val('');
                        $('#input_comment_review').val('');
                        $('#input_comment_upcoming').val('');
                        $('.slider').val(5);
                        $('.review_score_value').text(5);
                    }
                    setTimeout(function(){
                        $('#show_mess').slideToggle();
                        $('#show_mess strong').text('')
                        if(loading_form==1){
                            hideTabRevie()
                        }
                    }, 5000);
                }
            });
        }else{
            $('#show_mess').slideDown().removeClass('alert-success').addClass('alert-danger');
            $('#show_mess strong').text('Bạn vui lòng điền đẩy đủ thông tin đánh giá')
        }
    });
    $('body').on("click", '#hidden_mess_review', function () {
        $('#show_mess').hide();
    });
    $('body').on("click", '.sliding-panel-widget-close-button', function () {
        hideTabRevie()
    });
    //$('body').on("click", '.sliding-panel-widget-scrollable', function () {
    //    hideTabRevie()
    //});
    $('body').on("click", '#tab-review-click', function () {
        $('.tab-tour').removeClass('active');
        $('#tab-review-li').addClass('active');
        var  url=window.location.href;
        $('#url_tab_review').val(url+'#tab-reviews');
        //if(url.indexOf("#tab-reviews")>-1){
        //
        //}else{
        //    url=url.replace("#tab-reviews", "");
        //    window.history.replaceState({}, "", url);
        //    $('#url_tab_review').val(url);
        //}
        $('#hp-reviews-sliding').addClass('is-shown');
        copyToClipboard(document.getElementById('url_tab_review'));
    });
    function hideTabRevie(){
        $('.tab-tour').removeClass('active');
        $('#tab-tour-li').addClass('active');
        $('#hp-reviews-sliding').removeClass('is-shown');
        //var url =  window.location.href;
        var url =  $('#url_tab_review').val();
        if(!url){
            url=window.location.href;
        }
        url=url.replace("#tab-reviews", "");
        window.history.replaceState({}, "", url);
        $('#url_tab_review').val(url);
    }

    showTabReview();
    function  showTabReview(){
        var  url=window.location.href;
        if(url.indexOf("#tab-reviews")>-1){
            $('#hp-reviews-sliding').addClass('is-shown');
            $('.tab-tour').removeClass('active');
            $('#tab-review-li').addClass('active');
        }
        $('#url_tab_review').val(url);
    }
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });

    $('body').on("click", '.show_full_comment', function () {
       var value=$(this).attr('data-value');
       var id=$(this).attr('data-id');
        if(value && id){
            if(value=='short'){
                $('#long_comment_'+id).show();
                $('#short_comment_'+id).hide();
                $(this).attr('data-value','long');
                $(this).attr('title','Thu gọn');
                $('#icon_show_hide_review_'+id).removeClass('fa-plus-circle').addClass('fa-minus-circle');
            }else{
                $('#long_comment_'+id).hide();
                $('#short_comment_'+id).show();
                $(this).attr('data-value','short');
                $(this).attr('title','Xem thêm');
                $('#icon_show_hide_review_'+id).removeClass('fa-minus-circle').addClass('fa-plus-circle');
            }
        }
    });
    $('body').on("click", '.next_pre_review', function () {
       //console.log('fsdfa');
    });
    $('body').on("change", '#review_total', function () {
        filterReview();
    });
    $('body').on("change", '#review_sort', function () {
        filterReview();
    });
    $('body').on("change", '#review_limit', function () {
        filterReview();
    });
    function filterReview(){
        var review_total=$('#review_total').val();
        var review_sort=$('#review_sort').val();
        var review_limit=$('#review_limit').val();
        var tour_id=$('#input_tour_id').val();
        var code_tour_review=$('#input_code_tour_review').val();
        var code_check_send_email=$('#input_code_check_send_email').val();
        var link = url + '/list-review.html';
        console.log(tour_id);
        console.log(code_tour_review);
        console.log(code_check_send_email);
        if(tour_id && code_tour_review && code_check_send_email){
            $.ajax({
                method: 'POST',
                url: link,
                data:  {
                    id_tour:tour_id,
                    domain:'azbooking.vn',
                    code_check_send_email:code_check_send_email,
                    code_tour_review:code_tour_review,
                    review_total:review_total,
                    review_sort:review_sort,
                    review_limit:review_limit,
                },
                success: function (response) {
                    try {
                        response = $.parseJSON(response);
                        if(response.listReview){
                            $('#review_filter').html(response.listReview)
                        }else{
                            if(review_total){
                                var pointText='';
                                switch(review_total){
                                    case '9':
                                        pointText='rất tốt';
                                        break;
                                    case '7':
                                        pointText='tốt';
                                        break;
                                    case '5':
                                        pointText='trung bình';
                                        break;
                                    case '3':
                                        pointText='kém';
                                        break;
                                    case '1':
                                        pointText='rất kém';
                                        break;
                                }
                                $('#review_filter').html('<p style="padding: 20px;">Không có đánh giá '+pointText+'</p>')
                            }else{
                                $('#review_filter').html('<p style="padding: 20px;">Không có đánh giá</p>')
                            }

                        }
                    }
                    catch(err) {
                        $('#review_filter').html('<p style="padding: 20px;">Lỗi, bạn vui lòng thử thại</p>')
                    }
                }
            });
        }

    }
    function copyToClipboard(elem) {
        // create hidden text element, if it doesn't already exist
        var targetId = "_hiddenCopyText_";
        var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
        var origSelectionStart, origSelectionEnd;
        if (isInput) {
            // can just use the original source element for the selection and copy
            target = elem;
            origSelectionStart = elem.selectionStart;
            origSelectionEnd = elem.selectionEnd;
        } else {
            // must use a temporary form element for the selection and copy
            target = document.getElementById(targetId);
            if (!target) {
                var target = document.createElement("textarea");
                target.style.position = "absolute";
                target.style.left = "-9999px";
                target.style.top = "0";
                target.id = targetId;
                document.body.appendChild(target);
            }
            target.textContent = elem.textContent;
        }
        // select the content
        var currentFocus = document.activeElement;
        target.focus();
        target.setSelectionRange(0, target.value.length);

        // copy the selection
        var succeed;
        try {
            succeed = document.execCommand("copy");
        } catch (e) {
            succeed = false;
        }
        // restore original focus
        if (currentFocus && typeof currentFocus.focus === "function") {
            currentFocus.focus();
        }

        if (isInput) {
            // restore prior selection
            elem.setSelectionRange(origSelectionStart, origSelectionEnd);
        } else {
            // clear temporary content
            target.textContent = "";
        }
        return succeed;
    }
}());

