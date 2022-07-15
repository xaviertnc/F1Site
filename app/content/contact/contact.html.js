/* Page Specific JS */

F1.deferred.push(function initPage() {

  F1.contactForm = new F1.Form();

  F1.contactForm.submit = function( event ) {
    F1.contactForm.validate();
    const errors = F1.contactForm.getErrors();
    if ( errors.length > 0 ) {
      event.preventDefault(); event.stopPropagation();
      F1.contactForm.showErrors( errors );
      F1.contactForm.focusOnError( errors.pop() );
    }
  };

  console.log( 'Contact form: ', F1.contactForm );

  F1.contactForm.focus();

});