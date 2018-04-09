
// requestAnimationFrame polyfill
(function() {
    url = $('#site_name_manage').val();
    if($('#program_slide').length){
        sliderPoint('program_slide','program_point');
        sliderPoint('tour_guide_full_slide','tour_guide_full_point');
        sliderPoint('tour_guide_local_slide','tour_guide_local_point');
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
                if(name_input!='ngay_khoi_hanh_review' && name_input!='comment_review' && name_input!='comment_upcoming'){
                    console.log(name_input);
                    error.show();
                    error_free = false
                }
            }
        }
        if (error_free != false) {
            var link = url + '/add-review.html';
            console.log(link);
            $.ajax({
                method: 'POST',
                url: link,
                data:  $('#form_submit_review').serialize(),
                success: function (response) {
                    console.log(response);
                    $('#show_mess').slideDown().text('Đánh giá thành công').removeClass().addClass('message_success_review');
                }
            });
        }else{
            $('#show_mess').slideDown().text('Bạn vui lòng điền đẩy đủ thông tin đánh giá').removeClass().addClass('message_false_review');
        }
    });
}());

