<?php

include $app->vendorsDir . '/f1/auth/auth.php';

/**
 * app/services/auth.php
 *
 * @author C. Moller <xavier.tnc@gmail.com>
 * 
 * Date: 24 June 2022
 * 
 */

use F1;

$app->auth = new Auth();