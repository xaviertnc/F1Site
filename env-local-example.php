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
$app->env->services = '/services';
$app->env->vendors  = '/vendors';
$app->env->storage  = '/storage';

$app->env->dbConnection => [
  'DBHOST' => 'localhost',
  'DBNAME' => 'f1s',
  'DBUSER' => 'f1s_user',
  'DBPASS' => 'root'
];