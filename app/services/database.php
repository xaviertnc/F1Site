<?php

/**
 * ./services/database.php
 *
 * C. Moller <xavier.tnc@gmail.com>
 * 
 * Date: 19 Mar 2022
 * 
 */


include $app->vendorsDir . '/f1/database.php';


$app->db = new F1\Database();