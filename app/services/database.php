<?php

include $app->vendorsDir . '/f1/database/database.php';

/**
 * app/services/database.php
 *
 * @author C. Moller <xavier.tnc@gmail.com>
 * 
 * Date: 23 June 2022
 * 
 */

use F1\DB;

$app->db = new DB();