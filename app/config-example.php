<?php

/**
 * ./app/config-example.php
 * 
 * Application hosting server evironment info +
 * Settings specific to this specific instance of the application.
 * 
 */

$app->timezone = 'Africa/Johannesburg';

$app->servicesDir = __DIR__ . '/services';
$app->vendorsDir  = __DIR__ . '/vendors';
$app->storageDir  = __DIR__ . '/storage';
$app->contentDir  = __DIR__ . '/content';
$app->themesDir   = __DIR__ . '/themes';

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