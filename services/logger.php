<?php

/**
 * ./services/logger.php
 *
 * C. Moller <xavier.tnc@gmail.com>
 * 
 * Date: 19 Mar 2022
 * 
 */


include $app->env->vendors . '/f1/logger.php';


$app->log = new F1\Logger();