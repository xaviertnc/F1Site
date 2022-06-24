<?php

include $app->vendorsDir . '/f1/debug/debug.php';

/**
 * app/services/debug.php
 *
 * @author C. Moller <xavier.tnc@gmail.com>
 * 
 * Date: 23 June 2022
 * 
 */

use F1\Debug;

$app->debugLevel = ( __ENV__ == 'Prod' ) ? 1 : ( __DEBUG__ ? 3 : 2 );
$app->debugLogFile = $app->storageDir . '/logs/' . date( Debug::$shortDateFormat ) . '.log';

$app->debug = new Debug( $app->debugLevel, $app->debugLogFile );

register_shutdown_function( [ $app->debug, 'onShutdown' ] );