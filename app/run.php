<?php

/**
 * ./services/bootstrap.php
 *
 * C. Moller <xavier.tnc@gmail.com>
 * 
 * Date: 19 Mar 2022
 * 
 * Last update: 23 Jun 2022
 * 
 */

$app = new stdClass();

include 'config.php';

include $app->servicesDir . '/debug.php';
include $app->servicesDir . '/logger.php';
include $app->servicesDir . '/request.php';
include $app->servicesDir . '/database.php';
include $app->servicesDir . '/controller.php';
include $app->servicesDir . '/auth.php';
include $app->servicesDir . '/view.php';

// $app->debug->dump( $app );

include $app->controller->getFile();
