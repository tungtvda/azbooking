hideChat(0);

$('#prime').click(function() {
    scrollBottom();
    toggleFab();
});
$('body').on("input", '#chatSend', function () {
    var value=$('#chatSend').val();
    if(value!=''){
        if(value.length>=160){
            $('#chatSend').css('height', 90);
            $('#chatSend').attr('height', 90);
        }else{
            var height = parseInt($(this).attr('height'));
            var elem = document.getElementById('chatSend');
            if (elem.clientHeight < elem.scrollHeight) {
                if (height < 100) {
                    height = height + 30;
                    $('#chatSend').css('height', height);
                    $('#chatSend').attr('height', height);
                }
            }
        }

    }else{
        $('#chatSend').css('height', 30);
        $('#chatSend').attr('height', 30);
    }
});

//Toggle chat and links
function toggleFab() {
    $('.prime').toggleClass('zmdi-comment-outline');
    $('.prime').toggleClass('zmdi-close');
    $('.prime').toggleClass('is-active');
    $('.prime').toggleClass('is-visible');
    $('#prime').toggleClass('is-float');
    $('.chat').toggleClass('is-visible');
    $('.fab').toggleClass('is-visible');

}

$('#chat_first_screen').click(function(e) {
    hideChat(1);
});

$('#chat_second_screen').click(function(e) {
    hideChat(2);
});

$('#chat_third_screen').click(function(e) {
    hideChat(3);
});

$('#chat_fourth_screen').click(function(e) {
    hideChat(4);
});

$('#chat_fullscreen_loader').click(function(e) {
    $('.fullscreen').toggleClass('zmdi-window-maximize');
    $('.fullscreen').toggleClass('zmdi-window-restore');
    $('.chat').toggleClass('chat_fullscreen');
    $('.fab').toggleClass('is-hide');
    $('.header_img').toggleClass('change_img');
    $('.img_container').toggleClass('change_img');
    $('.chat_header').toggleClass('chat_header2');
    $('.fab_field').toggleClass('fab_field2');
    $('.chat_converse').toggleClass('chat_converse2');
    //$('#chat_converse').css('display', 'none');
    // $('#chat_body').css('display', 'none');
    // $('#chat_form').css('display', 'none');
    // $('.chat_login').css('display', 'none');
    // $('#chat_fullscreen').css('display', 'block');
});

function scrollBottom(){
    $('.chat_converse').scrollTop($('.chat_converse')[0].scrollHeight);
}

function hideChat(hide) {
    scrollBottom()
    switch (hide) {
        case 0:
            $('#chat_converse').css('display', 'block');
            // $('#chat_converse').css('display', 'none');
            $('#chat_body').css('display', 'none');
            $('#chat_form').css('display', 'none');
            $('.chat_login').css('display', 'block');
            $('.chat_fullscreen_loader').css('display', 'block');
            $('#chat_fullscreen').css('display', 'none');
            break;
        case 1:
            $('#chat_converse').css('display', 'block');
            $('#chat_body').css('display', 'none');
            $('#chat_form').css('display', 'none');
            $('.chat_login').css('display', 'none');

            break;
        case 2:
            $('#chat_converse').css('display', 'none');
            $('#chat_body').css('display', 'block');
            $('#chat_form').css('display', 'none');
            $('.chat_login').css('display', 'none');
            $('.chat_fullscreen_loader').css('display', 'block');
            break;
        case 3:
            $('#chat_converse').css('display', 'none');
            $('#chat_body').css('display', 'none');
            $('#chat_form').css('display', 'block');
            $('.chat_login').css('display', 'none');
            $('.chat_fullscreen_loader').css('display', 'block');
            break;
        case 4:
            $('#chat_converse').css('display', 'none');
            $('#chat_body').css('display', 'none');
            $('#chat_form').css('display', 'none');
            $('.chat_login').css('display', 'none');
            $('.chat_fullscreen_loader').css('display', 'block');
            $('#chat_fullscreen').css('display', 'block');
            break;
    }
}
