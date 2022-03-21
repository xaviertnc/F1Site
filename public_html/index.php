<?php define( '__APP_START__', microtime( true ) );

/***********************************
 * ==    F1 Micro Framework       ==
 * ==     Front Controller        ==
 * ==   C. Moller - 19 Mar 2022   ==
 ***********************************/

$app = new stdClass();

include __DIR__ . '/../app/config.php';

include $app->servicesDir . '/bootstrap.php';

include $app->page->file;