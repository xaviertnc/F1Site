<?php

include $app->vendorsDir . '/f1/files/files.php';

/**
 * ./app/content/explorer/explorer.php
 *
 * C. Moller <xavier.tnc@gmail.com>
 * 
 * Date: 23 Jun 2022
 * 
 */

use F1\Files;

$files = new Files();

$view->subdirs = $files->list( $app->rootDir, 'subdirs' );

$view->title = 'File Explorer Demo';

$view->useStyleFile( 'css/tree.css' );

include $view->getFile();