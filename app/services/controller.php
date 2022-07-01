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

$app->controller = new Controller( [
  'baseDir'  => $app->contentDir,
  'filePath' => $http->req->path ?: $app->homePage,
  'name'     => $http->req->path ? end( $http->req->segments ) : $app->homePage
] );