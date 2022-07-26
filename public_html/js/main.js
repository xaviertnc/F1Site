/** On Page Ready */
document.addEventListener( 'DOMContentLoaded', function() {
  F1.deferred.forEach( fn => fn() );
  if ( F1.DEBUG ) console.log( F1 );
});
