/* globals F1 */

/**
 * F1 Modal JS - Easy modal popups - 15 July 2022
 * 
 * @author C. Moller <xavier.tnc@gmail.com>
 * 
 * @version 1.0.0 - 15 July 2022
 * 
 */

F1.Modal = {

  show: function ( selector, options )
  {
    options = options || {};

    console.log( 'F1.Modal::show(), selector:', selector, ', opts:', options );    
    
    if ( options.event ) event.preventDefault();

    document.documentElement.classList.add('has-modal');

    const elModal = document.querySelector( selector );

    if ( ! elModal ) return;

    const elClose = elModal.querySelector( '.modal-close' );
    if ( elClose && ! elClose.MODAL ) elClose.MODAL = elModal;

    // NB: options.form === F1.Form instance
    const form = options.form;
 
    if ( form )
    {
      if ( options.clear ) form.clear();
        else if ( options.reset ) form.reset();
          else if ( options.init ) form.init( options.init );
      if ( options.focus ) form.focus();
    }

    elModal.addEventListener( 'click', function( event ) {
      if ( event.target === elModal ) {
        elModal.classList.remove( 'open' );
        document.documentElement.classList.remove('has-modal');
      }
    });

    elModal.classList.add( 'open' );
  },


  close: function ( elClose, event )
  {
    event.preventDefault();
    elClose.MODAL.classList.remove( 'open' );
    document.documentElement.classList.remove('has-modal');
  }

};

// end: F1.Modal
