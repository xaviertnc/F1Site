/* Page Specific JS */

F1.deferred.push(function initPage() {

  const options = {};

  options.fieldTypes = {

    FullName: new F1.Form.FieldType( 'FullName', {

    } ),

  };

  options.validators = {

    Required: new F1.Form.Validator( 'Required',
      function( field ) {
        if ( ! field.getRequired() ) { return true };
        return field.getValue() !== '';
      },
      function( field ) { 
        return field.getLabel() + ' is required.';
      }
    )
  };


  F1.contactForm = new F1.Form( options );


  F1.contactForm.submit = function( event ) {
    F1.contactForm.clearErrors(); F1.contactForm.validate();
    const errors = F1.contactForm.getErrors();
    if ( errors.length > 0 ) {
      event.preventDefault(); event.stopPropagation();
      F1.contactForm.showErrors( errors );
    }
  };

  console.log( 'Contact form: ', F1.contactForm );

});