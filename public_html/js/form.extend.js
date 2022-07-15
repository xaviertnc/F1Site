/* globals F1 */


F1.Form.FieldTypes = {

	FullName: new F1.Form.FieldType( 'FullName', {
	  getName: function() { return this.elm.id || 'fullname'; },
	  getValue: function() { let val = this.inputs[0].value; if ( val === '' ) return val;
	    if ( this.inputs[1].value ) val = val + ' ' + this.inputs[1].value;
	    return val; },
	  setValue: function( val ) { if ( ! val ) { this.inputs[0].value = ''; 
	    this.inputs[1].value = ''; return; } const parts = val.split( ' ' );
	    if ( parts[0] ) { this.inputs[0].value = parts.shift(); }
	    this.inputs[1].value = parts.join( ' ' ); }
	} ),

};


F1.Form.Validators = {

	Required: new F1.Form.Validator( 'Required',
	  function( field ) { if ( ! field.getRequired() ) return true; else return field.getValue() !== ''; },
	  function( field ) { return field.getLabel() + ' is required.'; }
	),

};