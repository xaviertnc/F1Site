<?php defined( '__APP_START__' ) or die( 'Invalid Entry Point' );

/**
 * ./app/config-example.php
 * 
 * Application hosting evironment, access and instance specific settings.
 * 
 * NB: Copy this file and rename it to "config.php" to configure your app environment.
 * Don't include config.php in version control commits for obvious reasons!
 * 
 */

date_default_timezone_set( 'Africa/Johannesburg' );

ini_set( 'log_errors'    , __ENV_PROD__ ? 1 : 0 );
ini_set( 'display_errors', __ENV_PROD__ ? 0 : 1 );

error_reporting( __ENV_PROD__ ? E_ALL : 0 );

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