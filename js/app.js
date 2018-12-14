$(document).ready(function(){
  $(function() {
    var eventsArray = [
      // {
      //   title: "over",
      //   start: "2018-12-03T00:00:00.000Z",
      //   end: "2018-12-07T00:00:00.000Z"
      // }
    ];
    $.each(bookedDays, function(index, value){
      eventsArray.push({
        start: new Date(value[0].thedate),
        end: new Date(value[1].thedate),
        title: value[2]
      })
    })
    // console.log(eventsArray);

    $('#calendar-widget').fullCalendar({
      height: "auto",
      events: eventsArray
    })
  });
})
