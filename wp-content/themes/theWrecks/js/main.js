jQuery( document ).ready(function( $ ) {

  // $(function(){
  //   $('html').animate({scrollTop:0}, 1);
  //   $('body').animate({scrollTop:0}, 1);
  // });


/* =================== NAVIGATION - MIDNIGHT SHOTS =================== */
  $('nav.fixed').midnight();


/* =================== LOADING BAR =================== */
  var loadCount = 0;
  function loadingBar(){
      if( loadCount < 2 ){
          var offsetTop = $(document).scrollTop();
          if( offsetTop > 0 ){
            $('html').animate({scrollTop:0}, 1);
            $('body').animate({scrollTop:0}, 1);
            $('body').css('overflow','visible'); 
          }
          if (document.documentElement.clientWidth >= 500) {
              $('.loading-image.loading-black').css('background-position','left').delay(500).animate({width:'22%'},500,'easeInOutCirc');           
              $('.loading-image.loading-white').css('left','auto').delay(1200).animate({width:'100%'},500,'easeInOutCirc',function(){
                  $('.loading-image.loading-white').css('left','0px').delay(1).animate({width:'0%'},500,'easeInOutCirc',function(){
                      $('.loading-image.loading-black').css('background-position','right').animate({width:'0%'},500,'easeInOutCirc',function(){
                          loadingBar();
                          loadCount++;
                      });
                  });
              });
          } else {
              $('.loading-image.loading-black').css('background-position','left').delay(700).animate({width:'60%'},500,'easeInOutCirc');
              $('.loading-image.loading-black').css('background-position','right').delay(2700).animate({width:'0%'},500,'easeInOutCirc');
          }
      }
  }
  loadingBar();


/* =================== START PARTY =================== */
  var fmaBarsArray = [];
  var barCount = 250;
  function addFmaBars(){  
    for(i=0;i<barCount; i++){
      var addShotLeftValue = 100;
      var j = i / 1.65;
      if(addShotLeftValue>15) { addShotLeftValue = addShotLeftValue - j; }
      var addShotRandomTop = Math.floor(Math.random() * 100);
      var addShotRandomTop2 = Math.floor(Math.random() * 100);
      $('.fma').append('<div class="top-shot topShot-'+i+'" style="top:'+addShotRandomTop+'%; left:'+addShotLeftValue+'%;"></div>');
      $('.fma').append('<div class="top-shot topShot-'+i+'" style="top:'+addShotRandomTop2+'%; left:'+addShotLeftValue+'%;"></div>');
    }
  };  
  function animateFmaBars(){
    for(i=0;i<barCount; i++){
      TweenLite.to('.top-shot.topShot-'+i, 0.65, {delay:0.009*i, width:"100%"});
    }        
  } 

  var loader = setTimeout(function(){
    $('.pre-loader').fadeOut(500);   
    $('body').css('overflow','visible'); 
  },5000);

  var addBackground = setTimeout(function(){
    $('.fma').css('background-color','#000');    
  },8200);  

  // START RESPONSIVE :: START PARTY 
  if (document.documentElement.clientWidth >= 450) {
    addFmaBars();

    var startParty = setTimeout(function(){
      animateFmaBars();      
    },6000);
  } // END RESPONSIVE :: START PARTY 
  


/* =================== SCROLL ICON =================== */
  function scrollDown(){
    $('.scroll-animation .scroll-dot').delay(500).animate({marginTop:'10px'},function(){
      $('.scroll-animation .scroll-dot').animate({marginTop:'5px'});
      scrollDown(); 
    });  
  };

  var showScrollIcon = setTimeout(function(){
    TweenLite.to('.scroll-animation', 1, {bottom:"3%", opacity:1},'easeInOutCirc');
    $('.top-shot').remove();
  },9000);
  
  scrollDown();


/* ========================= SHOW HIDE NAV ================ */
  // VARIABLES
  var state = "up";
  var fmaHeight = $('.mainContent .fma').height()-10;

  // EVENT HANDLERS
  $(document).scroll(function() {
    var offset = window.pageYOffset ? window.pageYOffset : document.documentElement.scrollTop;
    if(offset >= fmaHeight && state=="up"){
      animateIn();
    };
    
    if(offset < fmaHeight && state=="down"){
      animateOut();
    };
  });

  // FUNCTIONS
  function animateIn(){
    state = "down";
    console.log('nav in');
    $("nav.fixed").stop(true).addClass('show-nav');;
    $("nav.fixed").removeClass('hide-nav');
  };

  function animateOut(){
    state = "up";
    console.log('nav out');
    $("nav.fixed").stop(true).addClass('hide-nav');;
    $("nav.fixed").removeClass('show-nav');
  };  


/* ========================= NAV TOGGLE ================ */
  var navShowing = false;
  $('.nav-toggle.desktop-toggle').on('click',function(){
    if(navShowing == false){
      console.log('show nav');
      TweenLite.to('.midnightHeader .title-container', 0.3, {right:"-3%", opacity:0},'easeInOutCirc');
      TweenLite.to('.hidden-navigation', 0.3, {left:"0%", opacity:1},'easeInOutCirc');
      navShowing = true;
    } else {
      console.log('hide nav');
      $('nav.fixed').removeClass('mobile-navigation');
      TweenLite.to('.midnightHeader .title-container', 0.3, {right:"0%", opacity:1},'easeInOutCirc');
      TweenLite.to('.hidden-navigation', 0.3, {left:"-3%", opacity:0},'easeInOutCirc');
      navShowing = false;
    }
  });


  $('.nav-toggle.mobile-toggle').on('click',function(){
    if(navShowing == false){
      console.log('show nav-mobile');
      $('nav.fixed').addClass('mobile-navigation');
      $('.nav-toggle.mobile-toggle').addClass('mobile-toggle-black');
      TweenLite.to('.midnightHeader .title-container', 0.3, {right:"-3%", opacity:0},'easeInOutCirc');
      TweenLite.to('.hidden-navigation', 0.3, {left:"0%", opacity:1},'easeInOutCirc');
      navShowing = true;
    } else {
      console.log('hide nav-mobile');
      $('nav.fixed').removeClass('mobile-navigation');
      $('.nav-toggle.mobile-toggle').removeClass('mobile-toggle-black');
      TweenLite.to('.midnightHeader .title-container', 0.3, {right:"0%", opacity:1},'easeInOutCirc');
      TweenLite.to('.hidden-navigation', 0.3, {left:"-3%", opacity:0},'easeInOutCirc');
      navShowing = false;
    }
  });

  // NAV EASING
    $('.menu-primary-menu-container .menu li a').on('click',function(e){
      e.preventDefault();
      var $anchor = $(this);
      $('html, body').stop().animate({
        scrollTop: $($anchor.attr('href')).offset().top-0
      }, 750,'easeInOutCirc');
      if (document.documentElement.clientWidth <= 450) {
        $('nav.fixed').removeClass('mobile-navigation');
        $('.nav-toggle.mobile-toggle').removeClass('mobile-toggle-black');
        TweenLite.to('.midnightHeader .title-container', 0.3, {right:"0%", opacity:1},'easeInOutCirc');
        TweenLite.to('.hidden-navigation', 0.3, {left:"-3%", opacity:0},'easeInOutCirc');
        navShowing = false;
      }
    });

    // ADD HOVER CLASS
    $(function(){
      $('.menu-primary-menu-container .menu li a').addClass('hvr-underline-from-middle-midnight');
      $('.gigpress-table a').addClass('hvr-underline-from-middle-gigpress');
    })

/* ========================= ADD AUDIO BARS ================ */

// SINGLE BARS ////////
  var singleBarsArray = [];
  function addSingleBars(){
    console.log('single go');
    for(j=0;j<8;j++){
      var randomAudioBarTop = Math.floor(Math.random() * 100);
      $('.single-section.audio-bars').prepend('<div class="audio-bar section-bar bar-'+j+'" style="top:'+randomAudioBarTop+'%;"></div>');
    }
    singleBarsArray = $('.single-section.audio-bars .audio-bar').toArray();
    animateSingleBars();
  }
  function animateSingleBars(){
    $(singleBarsArray).each(function(k){
      var randomAudioBarWidth = Math.floor(Math.random() * 100);      
      TweenLite.to('.audio-bar.bar-'+k, 0.2, {delay:0.1*k, width:randomAudioBarWidth+"%"});
    });
  }

  var singleBarsIn = false;
  var singleSectionOffset = $('.single-section.audio-bars').offset().top;
  $(document).scroll(function() {
    var scrollOffset = window.pageYOffset ? window.pageYOffset : document.documentElement.scrollTop;    
    if(scrollOffset >= singleSectionOffset && singleBarsIn == false){
      addSingleBars();
      singleBarsIn = true;
    };
  });


// FOOTER BARS ////////
  var footerBarsArray = [];
  function addFooterBars(){
    console.log('footer go');
    for(k=0;k<6;k++){
      var randomAudioBarTop = Math.floor(Math.random() * 100);
      $('footer.audio-bars').prepend('<div class="audio-bar section-bar bar-'+k+'" style="top:'+randomAudioBarTop+'%;"></div>');
    }
    footerBarsArray = $('footer.audio-bars .audio-bar').toArray();
    animateFooterBars();
  }
  function animateFooterBars(){
    $(footerBarsArray).each(function(k){
      var randomAudioBarWidth = Math.floor(Math.random() * 90);      
      TweenLite.to('.audio-bar.bar-'+k, 0.2, {delay:0.1*k, width:randomAudioBarWidth+"%"});
    });
  }

  var footerIn = false;
  var footerSectionOffset = $('footer.audio-bars').offset().top-250;
  $(document).scroll(function() {
    var scrollOffset = window.pageYOffset ? window.pageYOffset : document.documentElement.scrollTop;
    if(scrollOffset >= footerSectionOffset && footerIn == false){
      addFooterBars();
      footerIn = true;
    };
  });


/* ========================= HOVER AUDIO BARS ================ */
  var hoverBarsArray = [];
  var hoverBarsOut = false;
  var hoverInterval;
  $(".tour-section .tour-box").mouseenter(function(){
      var thisHover = $(this);
      hoverInterval = setInterval(function(){
        if(hoverBarsOut == false){
          hoverBarsOut = true;
          for(x=0;x<5;x++){
            var randomAudioBarTop = Math.floor(Math.random() * 100);
            $(thisHover).prepend('<div class="hover-bar bar-'+x+'" style="top:'+randomAudioBarTop+'%;"></div>');
          }
          hoverBarsArray = $(thisHover).find('.hover-bar').toArray();
          $(hoverBarsArray).each(function(y){
            var randomAudioBarWidth = Math.floor(Math.random() * 100);
            var hoverBar = $(thisHover).find('.hover-bar.bar-'+y);
            TweenLite.to('.hover-bar.bar-'+y, 0.2, {delay:0.1*y, width:randomAudioBarWidth+"%"});
          });
        }
      },1);
  }).mouseleave(function(){
      clearInterval(hoverInterval);
      var thisHoverArray = $(this).find('.hover-bar').toArray();
      $(thisHoverArray).stop().animate({width:0},150,function(){
        $(thisHoverArray).delay(1000).remove();
        hoverBarsOut = false;
      });
  });

  // if(hoverInterval >1000){clearInterval(hoverInterval)};


/* ========================= VIDEO TOGGLE ================ */
  var videoShowing = false;
  $('.single .watch-video, .single-video .close-video').on('click',function(){
    if(videoShowing == false){
      console.log('show video');
      TweenLite.to('.single-section .single-video', 0.3, {marginLeft:"0%", opacity:1, display:"block"},'easeInOutCirc');
      $('.single-section .single').stop().animate({marginRight:"-3%", marginLeft:"3%", opacity:0},300,'easeInOutCirc',function(){
        $('.single-section .single').css('visibility','hidden');
      });
      videoShowing = true;
    } else {
      console.log('hide video');
      TweenLite.to('.single-section .single', 0.3, {marginRight:"0%", marginLeft:"0%", opacity:1, visibility:"visible"},'easeInOutCirc');
      $('.single-section .single-video').stop().animate({marginLeft:"-3%", opacity:0},300,'easeInOutCirc',function(){
        $('.single-section .single-video').css('display','none');
      });
      videoShowing = false;
    }
  });


/* ========================= GIGPRESS - BUY TIX BUTTON ================ */
  
  var gigpressArray = $('.gigpress-table tbody .gigpress-info').toArray();
  $(function(){
    $('.gigpress-table tbody .gigpress-header').append('<th scope="col" class="gigpress-tickets">TICKETS</th>');
  })
  $(gigpressArray).each(function(g){
    // if(g > 0){
      var ticketEl = $(this).find('.gigpress-tickets-link');
      var ticketLink = $(ticketEl).attr('href');
      if (document.documentElement.clientWidth >= 450) {
        $(this).siblings('.gigpress-row').append('<td class="buy-tickets"><a href="'+ticketLink+'" target="_blank">GET TICKETS</a></td>');
      } else {
        $(this).siblings('.gigpress-row').append('<td class="buy-tickets"><a href="'+ticketLink+'" target="_blank">TICKETS</a></td>');
      }
    // }
  });


  var tourFeatOneDate = $('.gigpress-table tbody:nth-child(2)').find('.gigpress-date').text(),
      tourFeatOneCity = $('.gigpress-table tbody:nth-child(2)').find('.gigpress-city').text(),
      tourFeatOneVenue = $('.gigpress-table tbody:nth-child(2)').find('.gigpress-venue').text(),
      tourFeatOneTix = $('.gigpress-table tbody:nth-child(2)').find('.buy-tickets a').attr('href');
  var tourFeatTwoDate = $('.gigpress-table tbody:nth-child(3)').find('.gigpress-date').text(),
      tourFeatTwoCity = $('.gigpress-table tbody:nth-child(3)').find('.gigpress-city').text(),
      tourFeatTwoVenue = $('.gigpress-table tbody:nth-child(3)').find('.gigpress-venue').text(),
      tourFeatTwoTix = $('.gigpress-table tbody:nth-child(3)').find('.buy-tickets a').attr('href');
  var tourFeatThreeDate = $('.gigpress-table tbody:nth-child(4)').find('.gigpress-date').text(),
      tourFeatThreeCity = $('.gigpress-table tbody:nth-child(4)').find('.gigpress-city').text(),
      tourFeatThreeVenue = $('.gigpress-table tbody:nth-child(4)').find('.gigpress-venue').text(),
      tourFeatThreeTix = $('.gigpress-table tbody:nth-child(4)').find('.buy-tickets a').attr('href');

  $(function(){
    $('.tour-section .tour-box-1').find('.date').text(tourFeatOneDate);
    $('.tour-section .tour-box-1').find('.location').text(tourFeatOneCity);
    $('.tour-section .tour-box-1').find('.venue').text(tourFeatOneVenue);
    $('.tour-section .tour-box-1').find('.tickets').attr('href', tourFeatOneTix);

    $('.tour-section .tour-box-2').find('.date').text(tourFeatTwoDate);
    $('.tour-section .tour-box-2').find('.location').text(tourFeatTwoCity);
    $('.tour-section .tour-box-2').find('.venue').text(tourFeatTwoVenue);
    $('.tour-section .tour-box-2').find('.tickets').attr('href', tourFeatTwoTix);

    $('.tour-section .tour-box-3').find('.date').text(tourFeatThreeDate);
    $('.tour-section .tour-box-3').find('.location').text(tourFeatThreeCity);
    $('.tour-section .tour-box-3').find('.venue').text(tourFeatThreeVenue);
    $('.tour-section .tour-box-3').find('.tickets').attr('href', tourFeatThreeTix);
  });


/* ========================= PLAY AUDIO TRACKS ================ */
  var controlsShowing = false;
  $('.tracklist a').on('click',function(e){
    e.preventDefault();
    var trackNumber = $(this).data('track');
    var audioSrc = $(this).find('.mejs-mediaelement audio').attr('src');
    // console.log('play song '+trackNumber);
    $('.mejs-container').removeClass('show-controls');
    $('.mejs-controls .mejs-pause').trigger('click');

    $('.controls-'+trackNumber).find('.mejs-container').addClass('show-controls');
    $('.controls-'+trackNumber+' .mejs-controls .mejs-play').trigger('click');
  });

/* _______________________ TEXT FORM FOCUS _____________________________________ */
  $(".contact-form .frm_form_fields input, .contact-form .frm_form_fields textarea").on("focus",function(){
    $(this).addClass("form-focus");
    console.log('focus');
  }).on("blur",function(){
    $(this).removeClass("form-focus");
    console.log('blur');
  });  
    


/* ========================= FAKE SUBMIT CLICKS ================ */
// $(".mc4wp-form-fields .button").on('click', function(e) {
//     console.log('submit');
//     $(".mc4wp-form-fields input[type='submit']").trigger(e.type);
// })

$(".contact-form .frm_form_fields .contact-button").on('click', function(e) {
    console.log('submit');
    $(".contact-form .frm_form_fields input[type='submit']").trigger(e.type);
})


  $(window).on('resize', function(){
      var windowWidth = $(window).width();
      if( windowWidth > 650 && navShowing == true ){
          $('nav.fixed').removeClass('mobile-navigation');
      } else if( windowWidth <= 650 && navShowing == true ){
          $('nav.fixed').addClass('mobile-navigation');
      }
  });


}); //END DOCUMENT.READY







