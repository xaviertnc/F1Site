<?php

/**
 * ./app/config-example.php
 * 
 * Application hosting server evironment info +
 * Settings specific to this specific instance of the application.
 * 
 */

date_default_timezone_set( 'Africa/Johannesburg' );

$app->servicesDir = __DIR__ . __DS__ . 'services';
$app->vendorsDir  = __DIR__ . __DS__ . 'vendors';
$app->storageDir  = __DIR__ . __DS__ . 'storage';
$app->contentDir  = __DIR__ . __DS__ . 'content';
$app->themesDir   = __DIR__ . __DS__ . 'themes';

$app->host    = 'F1Site.localhost';
$app->baseUri = 'public_html';
$app->cssUri  = 'css';
$app->jsUri   = 'js';

$app->theme = 'default';
$app->homePage = 'home'; 

$app->dbConnection = [
  'DBHOST' => 'localhost',
  'DBNAME' => 'f1s',
  'DBUSER' => 'f1s_user',
  'DBPASS' => 'root'
];