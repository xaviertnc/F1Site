# F1 Micro Library Demo Site - Ver 1.8.1
F1 controllers and views run within PHP's global variable scope.
  i.e. No unnecessary scope layers and limitations.  

F1 uses PHP objects to limit global variable over-crowding and conflicts.  


## Main Global Object
 - $app

## Aux (optional) Globals
 - $debug 
 - $auth
 - $http
 - $view
 - $db


The $app object serves as top-level data container and namespace.

All aux globals can also be access through $app.  e.g. $app->db, $app->http, etc.
Aux globals are convenient, saves CPU cycles and make code more readable. 

You can rename $app to something else if it conflicts with 3rd party code,
but this should never be necessary if you're a half decent coder.

If you work in a team, ensure that each team member knows about the
few global variable names used by the framework.