<?php

include $app->vendorsDir . '/f1/controller/controller.php';

/**
 * app/services/controller.php
 *
 * @author C. Moller <xavier.tnc@gmail.com>
 * 
 * Date: 24 June 2022
 * 
 */

use F1\Controller;

$app->req = $app->http->req;
$app->requestedPage = $app->req->segments ? end( $app->req->segments ) : $app->homePage; 

$app->controller = new Controller( $app->contentDir, $app->req->path, $app->requestedPage );