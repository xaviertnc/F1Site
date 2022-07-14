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

include __DIR__ . '/salon.model.php';


$view->title = 'Salon Calendar - ' . date('d M Y');

$data = new stdClass();

$data->clients = [];
$data->clients[] = new Client( 'Neels Moller'    , '0826941555', 'neels@tnc-it.co.za' );
$data->clients[] = new Client( 'Sonja Lindeque'  , '0826952523', 'sonja@tnc-it.co.za' );
$data->clients[] = new Client( 'Riette Pretorius', '0691234321', 'riette@mrprepaid.co.za' );

$data->stations = [];
$data->stations[] = new Station( 1 , 'LAZER'   , null, 'white'     );
$data->stations[] = new Station( 2 , 'MASSAGE' , null, 'yellow'    );
$data->stations[] = new Station( 3 , 'PEDICURE', null, 'red'       );
$data->stations[] = new Station( 4 , 'REFLEX'  , null, 'white'     );
$data->stations[] = new Station( 5 , 'STATION' , null, 'steelblue' );
$data->stations[] = new Station( 6 , 'STATION' , null, 'green'     );
$data->stations[] = new Station( 7 , 'TAN CAN' , null, 'orange'    );
$data->stations[] = new Station( 8 , 'CAFÉ'    , null, 'orangered' );
$data->stations[] = new Station( 9 , 'STATION' , null, 'deeppink'  );
$data->stations[] = new Station( 10, 'STATION' , null, 'whitesmoke');

$data->treatments = [];
$data->treatments[] = new Treatment( 'Laser Hair Removal Lip'      , 1, 15, 260, 'ea' );
$data->treatments[] = new Treatment( 'Massage Full Body Relaxation', 2, 90, 750, 'ea' );
$data->treatments[] = new Treatment( 'Pedicure Std'                , 3, 30, 350, 'ea' );
$data->treatments[] = new Treatment( 'Massage Reflex'              , 4, 60, 550, 'ea' );
$data->treatments[] = new Treatment( 'Tan Can Single Session'      , 7, 30,  50, 'ea' );

$data->therapists = [];
$data->therapists[] = new Therapist( 'House' , null        , null );
$data->therapists[] = new Therapist( 'Rita'  , '0846500246',    2 );
$data->therapists[] = new Therapist( 'Gugu'  , '0796900047',    3 );
$data->therapists[] = new Therapist( 'Elmien', '0842341779',    5 );
$data->therapists[] = new Therapist( 'Cara'  , '0722434025',    6 );

$data->appointments = [];
$data->appointments[] = new Appointment( 1, 1, 1, 2, 260, '2022-07-11', 8, 30, 15, 1 );

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

include $view->getFile( '.static.html' );