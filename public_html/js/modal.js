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

    F1.console.log( 'F1.Modal::show(), selector:', selector, ', opts:', options );    
    
    if ( options.event ) event.preventDefault();

    const elModal = document.querySelector( selector );

    if ( ! elModal ) return;

    const elClose = elModal.querySelector( '.modal-close' );
    if ( elClose && ! elClose.MODAL ) elClose.MODAL = elModal;

    // NB: options.form === F1.Form object
    if ( options.form )
    {
      if ( options.clear ) form.clear();
        else if ( options.reset ) form.reset();
          else if ( options.init ) form.init( options.init );
      if ( options.focus ) form.focus();
    }

    elModal.classList.add( 'open' );
  },


  close: function ( elClose, event )
  {
    event.preventDefault();
    elClose.MODAL.classList.remove( 'open' );
  }

};

// end: F1.Modal
