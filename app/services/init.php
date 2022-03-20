<?php

/**
 * ./services/init.php
 *
 * C. Moller <xavier.tnc@gmail.com>
 * 
 * Date: 19 Mar 2022
 * 
 */

include $app->env->services . '/system.php';
include $app->env->services . '/logger.php';
include $app->env->services . '/request.php';
include $app->env->services . '/controller.php';
include $app->env->services . '/database.php';
include $app->env->services . '/view.php';
include $app->env->services . '/auth.php';
