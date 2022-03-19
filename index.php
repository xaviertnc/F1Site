<?php //index.php

/**
 * index.php
 * 
 * F1 Micro Framework Front Controller
 *
 * C. Moller <xavier.tnc@gmail.com>
 * 
 * Date: 19 Mar 2022
 * 
 */

define( '__SERVICES__', '/services' );
define( '__VENDORS__' , '/vendors'  );
define( '__STORAGE__' , '/storage'  );

include 'env-local.php';

include __SERVICES__ . '/system.php';
include __SERVICES__ . '/request.php';
