<?php

include $app->vendorsDir . '/f1/view/view.php';

/**
 * app/services/view.php
 * 
 * A custom implementation and instantiation of F1\View.
 *
 * @author C. Moller <xavier.tnc@gmail.com>
 * 
 * Date: 01 July 2022
 * 
 */

use F1\View;

$view = new View( [
  'name'      => $app->controller->name,
  'fileDir'   => $app->controller->fileDir, 
  'themesDir' => $app->themesDir
] );

$app->view = $view;