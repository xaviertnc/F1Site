<?php

/**
 * ./app/content/contact/contact.php
 * 
 * Contact Us page controller - 10 Jul 2022 
 *
 * @author C. Moller <xavier.tnc@gmail.com>
 * 
 * @version 1.0.0 - 10 Jul 2022
 * 
 */

$view->title = 'Contact Us';

$view->useScriptFile( 'form.js' );
$view->useScriptFile( 'form.extend.js' );
$view->useStyleFile( 'form.css' );

include $view->getFile();