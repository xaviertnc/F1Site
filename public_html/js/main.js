/**
 * On Page Ready
 */

F1.console = window.console || { log: function(){} };

if ( F1.DEBUG ) { F1.console.log( F1 ); }

F1.deferred.forEach( fn => fn() );