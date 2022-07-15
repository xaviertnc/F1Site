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

$today = $http->get( 'today', date( 'Y-m-d' ) );

$datetime = strtotime( $today );
$nextday = date( 'Y-m-d', strtotime('+1 day', $datetime) );
$prevday = date( 'Y-m-d', strtotime('-1 day', $datetime) );


$view->theme = 'salon';

$view->title = date( 'd M Y', $datetime );


include __DIR__ . '/salon.model.php';

include __DIR__ . '/salon.data.php';


$cal = new stdClass();
$cal->open_hours = [ '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19' ];
$cal->slots_per_hour = [ '00', '15', '30', '45' ];
$cal->timeslots = [];
for ( $i = 0; $i < count( $data->stations ); $i++ )
  for ( $j = 0; $j < count( $cal->open_hours ); $j++ )
    for ( $k = 0; $k < count ($cal->slots_per_hour ); $k++ )
    {
      $slot_id = "$i:$j:$k";
      $slot = new TimeSlot( $i, $j, $k );
      $cal->timeslots[ $slot_id ] = $slot;
    }


$app->menu = [
  'salon' => 'Home',
  'contact'  => 'Contact Us'
];


include $view->getFile();