<?php define( '__APP_START__', microtime( true ) );

/***********************************
 * ==    F1 Micro Framework       ==
 * ==     Front Controller        ==
 * ==   C. Moller - 19 Mar 2022   ==
 ***********************************/

define( '__PROD__' , false );
define( '__DEBUG__', true  );
define( '__ROOT_DIR__', dirname( __DIR__ ) );

include __ROOT_DIR__ . '/app/run.php';