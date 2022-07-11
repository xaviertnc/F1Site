/**
 * On Page Ready
 */

if ( F1.DEBUG ) { console.log( F1 ); }

F1.deferred.forEach( fn => fn() );