<?php

include $app->vendorsDir . '/f1/http/http.php';

/**
 * app/services/http.php
 *
 * @author C. Moller <xavier.tnc@gmail.com>
 * 
 * Date: 24 June 2022
 * 
 */

use F1\HTTP;

$app->http = new HTTP( $app->baseUri );
