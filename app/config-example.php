<?php

/**
 * config-example.php
 *
 * C. Moller <xavier.tnc@gmail.com>
 * 
 * Date: 19 Mar 2022
 * 
 */

define( '__PROD__' , false );
define( '__DEBUG__', true  );

$app->timezone = 'Africa/Johannesburg';

$app->servicesDir = __DIR__ . '/services';
$app->vendorsDir  = __DIR__ . '/vendors';
$app->storageDir  = __DIR__ . '/storage';
$app->siteDir     = __DIR__ . '/content';
$app->themeDir    = __DIR__ . '/themes/default';

$app->host    = 'F1Site.localhost';
$app->baseUri = '/public_html';
$app->cssUri  = $app->baseUri . '/css';
$app->jsUri   = $app->baseUri . '/js';

$app->dbConnection = [
  'DBHOST' => 'localhost',
  'DBNAME' => 'f1s',
  'DBUSER' => 'f1s_user',
  'DBPASS' => 'root'
];