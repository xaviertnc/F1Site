/* global window, console, F1 */

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
  for ( let key in props || {} ) { obj[ key ] = props[ key ]; } 
}


function clearErrors() {
  console.log( 'Clear Errors', this );
  this.errors = [];
  this.elm.classList.add( 'cleared' );
  this.elm.classList.remove( 'unhappy' );
  this.elm.querySelectorAll( '.messages' ).forEach(
    elMsgs => elMsgs.parentElement.removeChild( elMsgs ) );
}


const Form = function( options )
{
  const defaults = {
    selector: 'form',
    fieldSelector: '.field',
    fieldTypes: {},
    validators: {},
    fields: []
  };
  extend ( this, defaults );
  extend( this, options );
  this.elm = document.querySelector( this.selector || 'form' );
  this.getFields();
};


Form.FieldType = function( id, options )
{
  this.type = id;
  extend( this, options );
};


Form.FieldType.prototype = {

  getInputs: function()
  {
    const field = this;
    const elements = this.elm.querySelectorAll( this.inputSelector );
    elements.forEach( elm => field.inputs.push( elm ) );
  },

  getName: function() { return this.input.name; },
  getValue: function() { return this.input.value; },
  getLabel: function() {
    let label = this.elm.getAttribute( 'aria-label' );
    if ( ! label && this.input ) {
      label = this.input.getAttribute( 'aria-label' ); 
    } else {
      const elLbl = this.elm.querySelector( 'label' );
      if ( ! label && elLbl ) { label = elLbl.innerHTML; } 
      else if ( ! label ) { label = this.getName(); }
    }
    return label || 'Field';
  },
  getRequired: function() { return this.elm.classList.contains( 'required' ); },
  setValue: function( val ) { this.input.value = val; },

  showErrors: function()
  {
    if ( !this.errors.length ) return;
    const elMsgs = document.createElement( 'div' );
    elMsgs.innerHTML = this.errors.map( e => '<div class="error">'+e+'</div>' ).join('');
    elMsgs.className = 'messages errors';
    this.elm.classList.add( 'unhappy' );
    this.elm.appendChild( elMsgs );
  },

  clearErrors,

  validate: function( options )
  {
    const validator = this.form.validators.Required;
    const valid = validator.test( this, options );
    if ( ! valid ) this.errors.push( 
      validator.getInvalidMessage( this, options ) );
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

  addField: function( elm )
  {
    this.fields.push( new Form.Field( this, elm ) );
  },

  getFields: function()
  {
    const elements = this.elm.querySelectorAll( this.fieldSelector );
    elements.forEach( elm => this.addField( elm ) );
  },

  getErrors: function() {
    const errors = [];
    this.fields.forEach( field => { if ( field.errors[0] ) 
      errors.push( field.errors[0] ); } );
    return errors;
  },

  showErrors: function()
  {
    const errors = [];
    this.elm.classList.add( 'unhappy' );
    this.fields.forEach( field => { field.showErrors(); 
      if ( field.errors[0] ) errors.push( field.errors[0] ); } );
    const elMsgs = document.createElement( 'div' );
    elMsgs.className = 'messages summary';
    elMsgs.innerHTML = errors.map( e => '<div class="error">'+e+'</div>' ).join('');
    this.elm.appendChild( elMsgs );
  },

  clearErrors, 

  validate: function( options ) { this.fields.forEach( field => 
    { field.clearErrors(); field.validate( options ) } ); },

};

window.F1.Form = Form;

}( window, document ) );