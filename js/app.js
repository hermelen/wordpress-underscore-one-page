$(document).ready(function(){
  console.log('app.js');
  function displaySliderContainer() {
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
  }
  displaySliderContainer();

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

  function displaySliderImg() {
    $('div.slick-slider').each(function( index ) {
      imgSliderWidth = $(this).parent('div.slider-container').width();
      $(this).css({
        'margin': '0',
        'width': imgSliderWidth
      });
    });
  }
  displaySliderImg();

  setInterval(function(){
    displaySliderContainer();
    displaySliderImg();
  }, 2000);

  // ---------------------- display calendar ----------------------------------
  function displayCalendar() {
    var eventsArray = [];
    var checkArray = [];
    if (typeof bookedDays !== 'undefined') {
      $.each(bookedDays, function(index, value){
        endDate = new Date(value[1].thedate);
        endDate = endDate.setDate(endDate.getDate() + 1);
        endDate = new Date(endDate);
        title = value[2];
        if (typeof title !== 'undefined') {
          displayTitle = title+": réservé";
        } else {
          displayTitle = "Réservé";
        };
        eventsArray.push({
          start: new Date(value[0].thedate),
          end: endDate,
          title: displayTitle,
          color: '#550000',
          textColor: 'white'
        })
      });
    }
    if (typeof availableBed !== 'undefined') {
      $.each(availableBed, function(index, value){
        checkValues = value[0]+value[1]+value[2];
        existingRoom = $.inArray(checkValues, checkArray);
        if (existingRoom === -1) {
          day = new Date(value[0]);
          room = value[1];
          bed = value[2];
          if (room !== "") {
            var title = room+': '+bed+' lits disp.';
          } else {
            var title = bed+' lits disp.';
          }
          checkArray.push(checkValues);
          eventsArray.push({
            start: day,
            end: day,
            title: title,
            color: 'teal',
            textColor: 'white'
          })
        }
      })
    }
    $('#calendar-widget').fullCalendar({
      height: "auto",
      events: eventsArray
    })
  }
  displayCalendar();

  // -------------------------GLOBAL VARIABLE NAVBAR ----------------------------
  var clicked = false;
  var liHover = $('div.menu-primary-menu-container li.menu-item-parent');
  var windowWidth = $(window).width();
  // ----------------- manage ul expand on hover in mobile display---------------

  var windowWidth = $(window).width();
  if ( windowWidth < 960 ) {
    $('.site-main-nav .menu-item-has-children').hover(function(){
      var count = $(this).find('ul.sub-menu')['0'].childElementCount;
      var liHeight = $(this).height();
      $(this).css({
        'padding-top': liHeight / 2,
        'padding-bottom': liHeight * count + liHeight / 2
      })
    })
    $('li#bars i.fas.fa-bars').click(function(){
      clicked = !clicked;
      if (clicked == true) {
        $(this).parent().parent().find('>li.menu-item').each(function(){
          $(this).css('display', 'flex');
        });
      } else {
        $(this).parent().parent().find('>li.menu-item').each(function(){
          $(this).css('display', 'none');
        });
      }
    })
  }

  // ----------------------------------- navbar ---------------------------------
  $('li.menu-item-child').click(function(){
    $(this).closest('li.menu-item-parent').removeClass('hover');
  });
  var liHover = $('div.menu-primary-menu-container li.menu-item-parent');
  if ( windowWidth > 960) {
    liHover.mouseenter(function() {
      $(this).addClass('hover');
    });
    liHover.mouseleave(function() {
      $(this).removeClass('hover');
    });
  } else {
    liHover.click(function() {
      liHover.removeClass('hover');
      $(this).addClass('hover');
    });
  }


  // --------------------------- navbar hide on scroll --------------------------

  function hideOnScroll() {
    var c, currentScrollTop = 0,
    navbar = $('div.site-main-nav');

    $(window).scroll(function () {
      var a = $(window).scrollTop();
      var b = navbar.height();
      if ( windowWidth < 960) {
        $('div.menu-primary-menu-container li.menu-item-parent').removeClass('hover').css('display', 'none');
        clicked = false;
      }

      currentScrollTop = a;

      if (c < currentScrollTop && a > b + b) {
        navbar.addClass("scrollUp");
      } else if (c > currentScrollTop && !(a <= b)) {
        navbar.removeClass("scrollUp");
      }
      c = currentScrollTop;
    });
  }
  hideOnScroll();
})
