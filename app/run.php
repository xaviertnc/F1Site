<?php

/**
 * app/run.php
 *
 * @author C. Moller <xavier.tnc@gmail.com>
 * 
 * Date: 19 Mar 2022
 * 
 * Last update: 24 Jun 2022
 * 
 */

$app = new stdClass();


include 'config.php';


// -----------------------------------------------------------------------
// Load and configure application core services.
// Each service gets it's own file to keep things tidy and easy to follow.
// PS: Vendor libs are loaded (if required) in the respective service files.
// NB: The order of includes is VERY important!
// -----------------------------------------------------------------------

include $app->servicesDir . '/debug.php';
include $app->servicesDir . '/http.php';
include $app->servicesDir . '/database.php';
include $app->servicesDir . '/controller.php';
include $app->servicesDir . '/auth.php';
include $app->servicesDir . '/view.php';


// $app->debug->dump( $app );

include $app->controller->getFile();