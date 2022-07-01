<?php

include $app->vendorsDir . '/f1/debug/debug.php';

/**
 * app/services/debug.php
 *
 * @author C. Moller <xavier.tnc@gmail.com>
 * 
 * Date: 23 June 2022
 * 
 * Last update: 01 July 2022
 * 
 */

use F1\Debug;

if ( __ENV__ == 'Prod' )
{
  $app->debugLevel = __DEBUG__ ? 2 : 1;
}
else
{
  $app->debugLevel = __DEBUG__ ? 3 : 2;
}

$app->debugLogFile = $app->storageDir . DIRECTORY_SEPARATOR . 'logs' .
  DIRECTORY_SEPARATOR . date( Debug::$shortDateFormat ) . '.log';


$debug = new Debug( $app->debugLevel, $app->debugLogFile );

register_shutdown_function( [ $debug, 'onShutdown' ] );

$app->debug = $debug;