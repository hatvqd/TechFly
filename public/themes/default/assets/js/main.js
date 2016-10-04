jQuery(document).ready(function($) {

  // menu dropdown
    //$("#menu-main-menu-vi").addClass("ddmenu");
    //$("#menu-menu-top").addClass("right nav-control hidden-sm hidden-xs");

  $('.ddmenu li').hover(function () {
      clearTimeout($.data(this,'timer'));
      $('ul',this).stop(true,true).slideDown(200);
  }, function () {
  $.data(this,'timer', setTimeout($.proxy(function() {
      $('ul',this).stop(true,true).slideUp(200);
      }, this), 100));
  });//Menu

    $('.ddmenu li ul li').hover(function () {
        clearTimeout($.data(this,'timer'));
        $('ul',this).stop(true,true).slideDown(200);
    }, function () {
        $.data(this,'timer', setTimeout($.proxy(function() {
            $('ul',this).stop(true,true).slideUp(200);
        }, this), 100));
    });//sub sub Menu

  // this is menu responsive
  $("#my-menu").mmenu();
    $("#close_open_menu").click(function() {
       $("#my-menu").trigger("open.mm");
    });

  // xem them cac nuoc
  $('#more').click(function(){
    $('.countries ul').toggleClass('active');
  })

  //ul#tourmenu
  $('ul#tourmenu > li').click(function(){
    $(this).find('a').toggleClass('active');
    $(this).find('ul').toggle();
  })

  $("#news-slider").owlCarousel({
 
        items : 4,
        itemsDesktop : [1000,4], //5 items between 1000px and 901px
        itemsDesktopSmall : [900,3], // betweem 900px and 601px
        itemsTablet: [600,2],
        navigation: false,
        autoPlay: false,
        pagination: true

  });

  $("#booking-slider").owlCarousel({
 
        items : 3,
        itemsDesktop : [1000,4], //5 items between 1000px and 901px
        itemsDesktopSmall : [900,3], // betweem 900px and 601px
        itemsTablet: [600,2],
        navigation: false,
        autoPlay: 3000,
        pagination: true,

  });


  $("#booking-brand").owlCarousel({
 
        items : 5,
        itemsDesktop : [1000,4], //5 items between 1000px and 901px
        itemsDesktopSmall : [900,3], // betweem 900px and 601px
        itemsTablet: [600,2],
        navigation: false,
        autoPlay: true,
        pagination: false,
        loop: true,

  });

  // $("span.next").click(function(){
  //     $('#news-slider').trigger('owl.next');
  // })
  // $("span.prev").click(function(){
  //     $('#news-slider').trigger('owl.prev');
  // })


  //
  var navPosition = 132;
    $(window).scroll(function(){
        var scroll = $(this).scrollTop();
        if(scroll > navPosition ){
            $('nav.main-menu').addClass('fixed');
        }else {
            $('nav.main-menu').removeClass('fixed');
        }
    });//Button fixed

});