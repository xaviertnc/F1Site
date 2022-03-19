<?php define( '__APP_START__', microtime( true ) );

/***********************************
 * ==    F1 Micro Framework       ==
 * ==     Front Controller        ==
 * ==   C. Moller - 19 Mar 2022   ==
 ***********************************/

$app = new stdClass();

include __DIR__ . '/env-local.php';

include $app->env->services . '/init.php';

include $app->ctrl->file;