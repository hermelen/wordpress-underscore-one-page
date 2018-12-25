$(document).ready(function(){

  if (typeof subMenuList !== 'undefined') {
    // console.log(subMenuList);
    $.each(subMenuList, function(index, value){
      padding = 35;
      var sliderWidth = $('section#'+value).width() - (padding*2);
      $('section#'+value+' div.slider-container').css({
        'width' : sliderWidth,
        'margin' : padding
      });
    })
  }

  $('.slick-slider').slick({
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    // slidesToShow: 1,
    // centerMode: true,
    // variableWidth: true,
    // prevArrow: $('.prev_box'),
    // nextArrow: $('.next_box'),
    // infinite: true,
  });

  // ---------------------- display calendar ---------------------------------->

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

})
