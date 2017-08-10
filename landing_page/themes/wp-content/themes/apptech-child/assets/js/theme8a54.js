(function ($) {
 "use strict";
 

    //venbox start
    $('.video-popup').venobox()
    //venbox end
    
    //venbox start
    $('.venobox').venobox({
        numeratio: true,
        titleattr: 'data-title',
        infinigall: true 
    })
    //venbox end

   $( "#accordion" ).accordion();
    


   /*--
    slick slider
    ------------------------*/
    $('.screenshot-slider').slick({
      centerMode: true,
      dots: true,
      centerPadding: '0',
      slidesToShow: 5,
      arrows: false,
      responsive: [
        {
          breakpoint: 1100,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 970,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 2,
          }
        }
      ]
    }); 

   /*--
    slick slider
    ------------------------*/
    $('.brand-image-slider').slick({
      centerMode: false,
      dots: false,
      centerPadding: '0',
      slidesToShow: 6,
      arrows: false,
      loop:true,
      responsive: [
        {
          breakpoint: 1100,
          settings: {
            slidesToShow: 5,
          }
        },
        {
          breakpoint: 970,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 2,
          }
        }
      ]
    }); 

    
    /*--
    slick slider
    ------------------------*/
    $('.slider-2').slick({
      centerMode: true,
      dots: true,
      centerPadding: '0',
      slidesToShow: 1,
      arrows: false,
      responsive: [
        {
          breakpoint: 970,
          settings: {
            slidesToShow: 1,
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
          }
        }
      ]
    }); 
    


    /*----------------------------
        text-animation
    ------------------------------ */  
    $('.apptech-ani-heading').textillate({
      loop: true,
      in: {
        delay: 40,
      },
      out: {
        delay: 50,
      },
    });
    
    /*----------------------------
        text-animation
    ------------------------------ */  
    $('.slider-subtitle').textillate({
      loop: true,
      in: {
        delay: 50,
      },
      out: {
        delay: 70,
      },
    });





$(window).resize(function(){
    resizeVideos();
  });

  $(document).on('layers-slider-init', function(s){
    resizeVideos();
  });

  function resizeVideos(){
    $( '.swiper-container .apptech-slider-video' ).each(function(){
      var $ratio;
      var $that = $(this);

      var $parent = $that.closest( '.layers-slider-widget' );

      $ratio = ( $parent.outerHeight()/$parent.outerWidth() ) * 100;

      $that.removeClass( 'layers-slider-video-ultra-wide layers-slider-video-super-wide layers-slider-video-wide layers-slider-video-square layers-slider-video-tall layers-slider-video-super-tall' );

      if( $ratio <= 20 ){
        var $video_css = 'layers-slider-video-ultra-wide';
      } else if( $ratio <= 32 ){
        var $video_css = 'layers-slider-video-super-wide';
      } else if( $ratio <= 56 ){
        var $video_css = 'layers-slider-video-wide';
      } else if( $ratio <= 75 ){
        var $video_css = 'layers-slider-video-square';
      } else if( $ratio <= 100 ){
        var $video_css = 'layers-slider-video-tall';
      } else {
        var $video_css = 'layers-slider-video-super-tall';
      }

      $that.addClass( $video_css );

    });

  }

  playActiveVideos();

  function playActiveVideos(){
    setTimeout( function(){
      var video = $( '.swiper-slide-active' ).find( 'video' );

      if( 'undefined' == typeof( video.attr( 'customizer' ) ) )
        $( '.swiper-slide-active' ).find( 'video' ).trigger( 'play' );

    }, 100 );
  }

  // Move videos in the customizer to their first frame
  $( '.swiper-container video' ).each(function(){

    if( layersCheckMobile() ) $(this).remove();

    // Get the video object
    video = $(this);

    // Generate a preview
    if( !video.prop( 'autoplay' ) && video.prop( 'customizer' ) ) {
      // Trigger play
      video.trigger( 'play' );

      // As soon as we play then trigger a stop
      video.on( 'play', function(){
        setTimeout( function(){
          // Trigger pause
          video.trigger( 'pause' );
        }, 100);
      });
    };

  });




/*========================= 
 scrollUp
===========================*/ 
  $.scrollUp({
      scrollText: '<i class="zmdi zmdi-chevron-up"></i>',
      easingType: 'linear',
      scrollSpeed: 900,
      animation: 'fade'
  });


// Sidebar menu style change
if ( $('.nav-mobile ul.menu li').has('ul') ) {
    $('.nav-mobile ul.menu li ul').parent('li').prepend('<span class="menu-hitarea"><i class="fa fa-angle-down"></i></span>');
};

$('.menu-hitarea').on('click', function(){
  $(this).siblings('ul').slideToggle("slow");
  if ( $(this).find('i').hasClass('fa-angle-up')){
    $(this).find('i').removeClass('fa-angle-up').addClass('fa-angle-down');
  }else{
    $(this).find('i').removeClass('fa-angle-down').addClass('fa-angle-up');
  }
});



// one page nenu animation
$('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top-80
        }, 1000);
        return false;
      }
    }
  });


 
})(jQuery); 




