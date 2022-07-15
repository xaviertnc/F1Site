# F1 Lib Demo - Ver 1.15.6
An example implementation / framework using F1 Lib modules as services. 

## About the F1 Lib framework 
F1 controllers and views run within PHP's global variable scope with
a single (or a very limited number) of global objects to control
global namespace over-crowding and conflicts.  

### Main Global Object
 - $app

### Optional Aux Globals ( For convenience and code readability)
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
