<?php

/**
 * ./app/content/builder/builder.php
 * 
 * Builder page controller
 *
 * C. Moller <xavier.tnc@gmail.com>
 * 
 * Date: 09 Jul 2022
 * 
 */

include __DIR__ . '/builder.model.php';

$view->title = 'Content Builder Demo';

$view->useStyleFile( 'css/vendors/dragula.min.css' );
$view->useScriptFile( 'js/vendors/dragula.min.js' );

include $view->getFile();