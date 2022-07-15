/* globals F1 */

/**
 * F1 Form JS
 * 
 * @author C. Moller <xavier.tnc@gmail.com>
 * 
 * @version 1.0.0 - 10 Jul 2022
 * 
 */

( function( window, document ) {


function extend( obj, props ) { 
  for ( let key in props || {} ) { obj[ key ] = props[ key ]; } }


function clearErrors( frmObj, errorsSelector ) {
  console.log( 'Clear Errors:', frmObj );
  frmObj.errors = [];
  frmObj.elm.classList.remove( frmObj.unhappyClass );
  errorsSelector = errorsSelector || '.' + frmObj.errorsClass.replace( ' ', '.' );
  frmObj.elm.querySelectorAll( errorsSelector ).forEach(
    elMsgs => elMsgs.parentElement.removeChild( elMsgs ) );
}


const Form = function( options )
{
  const defaults = {
    selector: 'form',
    fieldSelector: '.field',
    unhappyClass: 'unhappy',
    errorsClass: 'errors',
    fieldTypes: {},
    validators: {},
    fields: []
  };
  extend ( this, defaults );
  extend( this, options );
  this.elm = document.querySelector( this.selector || 'form' );
  this.getFields();
  if ( this.initialValues )
    this.init( this.initialValues );
};


Form.Error = function( elField, message )
{
  this.elField = elField;
  this.message = message;
}


Form.FieldType = function( id, options )
{
  this.type = id;
  extend( this, options );
};


Form.FieldType.prototype = {

  getInputs: function() { const field = this;
    const elements = this.elm.querySelectorAll( this.inputSelector );
    elements.forEach( elm => field.inputs.push( elm ) );
  },

  getLabel: function() { let label = this.elm.getAttribute( 'aria-label' );
    if ( ! label && this.input ) { label = this.input.getAttribute( 'aria-label' ); }
    else { const elLbl = this.elm.querySelector( 'label' );
      if ( ! label && elLbl ) { label = elLbl.innerHTML; } 
      else if ( ! label ) { label = this.getName(); } }
    return label || 'Field';
  },

  getName: function() { return this.input.name; },
  getValue: function() { return this.input.value; },
  getRequired: function() { return this.elm.classList.contains( 'required' ); },
  setValue: function( val ) { this.input.value = val; },
  clearErrors: function() { clearErrors( this ) },
  clear: function() { this.setValue( '' ); },

  showErrors: function() {
    if ( !this.errors.length ) return;
    const elMsgs = document.createElement( 'div' );
    elMsgs.innerHTML = this.errors.map( e => '<div class="error">'+e.message+'</div>' ).join('');
    elMsgs.className = this.errorsClass;
    this.elm.classList.add( this.unhappyClass );
    this.elm.appendChild( elMsgs );
  },

  validate: function( options ) {
    const validator = this.form.validators.Required;
    const valid = validator.test( this, options );
    if ( ! valid ) this.errors.push( new Error( this.elm,
      validator.getInvalidMessage( this, options ) ) );
    return valid;
  },

  inputSelector: 'input:not([type="submit"],[type="hidden"]),textarea,select'

};


Form.Field = function( form, elm )
{
  this.elm = elm;
  this.form = form;
  this.inputs = [];
  this.errors = [];
  this.errorsClass = form.errorsClass;
  this.unhappyClass = form.unhappyClass;
  const fieldTypeId = elm.getAttribute( 'data-type' );
  const fieldType = form.fieldTypes[ fieldTypeId ];
  extend( this, fieldType || new Form.FieldType( 'Text' ) );
  this.getInputs();
  this.input = this.inputs[0];
};


Form.Validator = function( id, test, getInvalidMessage )
{
  this.id = id;
  if ( test ) { this.test = test; }
  if ( getInvalidMessage ) { this.getInvalidMessage = getInvalidMessage; }
};


Form.Validator.prototype = {
  test: function( field, args ) { return true; },  
  getInvalidMessage: function( field, args ) { return field.getLabel() + ' is invalid'; }
};


Form.prototype = {

  addField: function( elm ) {
    this.fields.push( new Form.Field( this, elm ) ); },

  getFields: function() {
    const elements = this.elm.querySelectorAll( this.fieldSelector );
    elements.forEach( elm => this.addField( elm ) ); },

  getErrors: function() {
    const errors = [];
    this.fields.forEach( field => { if ( field.errors[0] ) 
      errors.push( field.errors[0] ); } );
    return errors;
  },

  showErrors: function() {
    const errors = [];
    this.elm.classList.add( this.unhappyClass );
    this.fields.forEach( field => { field.showErrors(); 
      if ( field.errors[0] ) errors.push( field.errors[0] ); } );
    const elMsgs = document.createElement( 'div' );
    elMsgs.className = this.errorsClass + ' summary';
    elMsgs.innerHTML = errors.map( e => '<div class="error">'+e.message+'</div>' ).join('');
    this.elm.appendChild( elMsgs );
  },

  clearErrors: function() { clearErrors( this, '.summary' );
    this.fields.forEach( field => field.clearErrors() ); },

  validate: function( options ) { this.fields.forEach( field => 
    { field.clearErrors(); field.validate( options ) } ); },

  focus: function() { this.elm.focus(); },

  focusError: function( focusLast ) {
    const errors = this.getErrors();
    if ( errors.length > 0 ) {
      const errIndex = focusLast ? errors.length : 0;
      errors[ errIndex ].elField.focus(); }
  },

  clear: function() { this.clearErrors();
    this.fields.forEach( field => field.clear() ); },

  reset: function() { return this.elm.reset(); },

  init: function() {},

};

window.F1.Form = Form;

}( window, document ) );