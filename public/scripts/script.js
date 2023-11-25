$(function () {

  function Calendar(dataEvents) {
    /* initialize the calendar
    -----------------------------------------------------------------*/
    var Calendar = FullCalendar.Calendar;
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------
    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      events: dataEvents,
    });

    calendar.render();

    /* ADDING EVENTS */
    var currColor = '#005cbf' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      // Save color
      currColor = $(this).css('color')
      // Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color': currColor
      })
    })

    $('#add-new-event').click(function (e) {
      e.preventDefault()
      // Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      // Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color': currColor,
        'color': '#fff'
      }).addClass('external-event')
      event.text(val)
      $('#external-events').prepend(event)

      // Remove event from text input
      $('#new-event').val('')
    })
  }

  $.ajax({
    type: "GET",
    url: 'app/data/data_penyewaan.php',
    success: function (response) {
      let arr = [];
      let data = JSON.parse(response);
      data.map((dt) => {
        let obj = {
          title: dt[1],
          start: new Date(dt[7].split('-').join(',')),
          end: new Date(dt[8].split('-').join(',')),
        }
        arr.push(obj);
      })
      Calendar(arr);
    }
  })
})


























