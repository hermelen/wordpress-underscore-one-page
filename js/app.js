$(document).ready(function(){

  if (typeof subMenuList !== 'undefined') {
    $.each(subMenuList, function(index, value){
      var windowWidth = $(window).width();
      if ( windowWidth > 540) {
        var padding = windowWidth / 30;
      } else {
        var padding = 0;
      }
      var sliderWidth = $('section#'+value).width() - (padding*2);
      $('section#'+value+' div.slider-container').css({
        'width' : sliderWidth,
        'margin' : padding
      });
      $('section#'+value+' img').css({
        'width' : sliderWidth,
      });
    });
  }

  $('.slick-slider').slick({
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 3000,
    prevArrow: '<i class="fas fa-chevron-left slick-prev-custom"></i>',
    nextArrow: '<i class="fas fa-chevron-right slick-next-custom"></i>',
    speed: 600
    // appendArrows: $('.slick-list')
    // slidesToShow: 1,
    // centerMode: true,
    // variableWidth: true,
    // prevArrow: $('.prev_box'),
    // nextArrow: $('.next_box'),
    // infinite: true,
  });


  $('div.slick-slider').each(function( index ) {
    imgSliderWidth = $(this).parent('div.slider-container').width();
    console.log(imgSliderWidth);
    $(this).css({
      'margin': '0',
      'width': imgSliderWidth
    });
  });

  // ---------------------- display calendar ----------------------------------

  $(function() {
    if (typeof bookedDays !== 'undefined') {
      var eventsArray = [
        // { title: "over", start: "2018-12-03T00:00:00.000Z", end: "2018-12-07T00:00:00.000Z" }
      ];
      $.each(bookedDays, function(index, value){
        endDate = new Date(value[1].thedate);
        endDate = endDate.setDate(endDate.getDate() + 1);
        eventsArray.push({
          start: new Date(value[0].thedate),
          end: endDate,
          title: value[2]
        })
      })
      // console.log(eventsArray);

      $('#calendar-widget').fullCalendar({
        height: "auto",
        events: eventsArray
      })
    }
  });

  // ----------------- manage ul expand on hover in mobile display---------------
  function navbarMobileDisplay(){
    var windowWidth = $(window).width();
    if ( windowWidth < 960 ) {
      $('.menu-item-has-children').hover(function(){
        var count = $(this).find('ul.sub-menu')['0'].childElementCount;
        var liHeight = $(this).height();     
        $(this).css({
          'padding-top': liHeight / 2,
          'padding-bottom': liHeight * count + liHeight / 2
        })
      })    
      var clicked = false;
      $('li#bars').click(function(){
        clicked = !clicked;
        if (clicked == true) {
          $(this).parent().find('>li.menu-item').each(function(){
            $(this).css('display', 'flex');
          });
        } else {
          $(this).parent().find('>li.menu-item').each(function(){
            $(this).css('display', 'none');
          });
        }
      })
    }
  }
  navbarMobileDisplay();


})
