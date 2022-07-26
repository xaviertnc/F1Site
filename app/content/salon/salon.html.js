/* View Specific JS */
F1.deferred.push(function initPage() {

  console.log( '[Salon Page] Says Hi!' );

  F1.addAppointment = function() {
    F1.Modal.show( '#booking-modal', {
      form: F1.bookingForm,
      clear: 1,
      focus: 1
    });
  };

  F1.controllers = [];

  document.querySelectorAll( 'select[data-search="true"]' ).forEach( elm => {
    const controller = new F1.Select( elm ); controller.init();
    F1.controllers.push( controller );
  } );

  const controller = new VanillaCalendar( '#calendar', { type: 'default',
    actions: { clickDay(e) { alert( e.target.dataset.calendarDay ); }, }, } );
  controller.type = 'Calendar_Controller'; controller.init();
  F1.controllers.push( controller );

  F1.bookingForm = new F1.Form({
    selector: '#booking-modal form',
    submit: function(event) {
      console.log('submit(), event:', event);
      F1.bookingForm.validate();
      const errors = F1.bookingForm.getErrors();
      if ( errors.length > 0 ) {
        event.preventDefault(); event.stopPropagation();
        F1.bookingForm.showErrors( errors );
        const error = errors.pop();
        error.focus();
      }
    }
  });

});