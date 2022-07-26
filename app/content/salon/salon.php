<?php

/**
 * ./app/content/salon/salon.php
 * 
 * Salon page controller - 08 Jul 2022
 *
 * @author C. Moller <xavier.tnc@gmail.com>
 * 
 * @version 2.0.0 - 14 Jul 2022
 * 
 */

$app->menu = [
  'salon' => 'Home',
  'form'  => 'Contact Us'
];


$view->theme = 'salon';
$view->title = 'Salon Allure Demo';


$today = $http->get( 'today', date( 'Y-m-d' ) );


$datetime = strtotime( $today );
$nextday = date( 'Y-m-d', strtotime('+1 day', $datetime) );
$prevday = date( 'Y-m-d', strtotime('-1 day', $datetime) );


$db->connect( $app->dbConnection[ 'salon' ] );


include __DIR__ . '/salon.model.php';
$cal = new Model( $db );


// debug_dump($cal);

// foreach( $data->stations as $s ) {
//   $station = new stdClass();
//   $station->id = $s->id;
//   $station->no = $s->id; //sprintf( '%02d', $s->id );
//   $station->name = $s->name;
//   $station->colour = $s->colour;
//   $station->created_by = 1;
//   debug_dump( $station );
//   try {
//     $db->updateOrInsertInto( 'stations', $station );
//   }
//   catch (Exception $e) {
//     debug_dump( $e->getMessage() );
//   }
// }

//  die('Keut!');


$view->useStyleFile( 'vendors/vanilla-calendar.min.css' );
$view->useScriptFile( 'vendors/vanilla-calendar.min.js' );

$view->useStyleFile( 'select.css' );
$view->useStyleFile( 'modal.css' );
$view->useStyleFile( 'form.css' );

$view->useScriptFile( 'select.js' );
$view->useScriptFile( 'modal.js' );
$view->useScriptFile( 'form.js' );

$view->useScriptFile( 'form.custom.js' );


include $view->getFile();