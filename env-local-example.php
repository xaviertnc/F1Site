<?php

/**
 * env-local-example.php
 *
 * C. Moller <xavier.tnc@gmail.com>
 * 
 * Date: 19 Mar 2022
 * 
 */

define( '__PROD__' , false );
define( '__DEBUG__', true  );

$app->env = new stdClass();

$app->env->siteUrl  = 'F1Site.localhost';
$app->env->rootDir  = 'C:/laragon/www/F1Site';
$app->env->timezone = 'Africa/Johannesburg';
$app->env->services = __DIR__ . '/services';
$app->env->vendors  = __DIR__ . '/vendors';
$app->env->storage  = __DIR__ . '/storage';
$app->env->theme    = __DIR__ . '/app/themes/default';
$app->env->site     = __DIR__ . '/app/site';

$app->env->dbConnection = [
  'DBHOST' => 'localhost',
  'DBNAME' => 'f1s',
  'DBUSER' => 'f1s_user',
  'DBPASS' => 'root'
];