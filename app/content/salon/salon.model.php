<?php //salon.model.php

$last_id = 0;

function get_id()
{
  global $last_id;
  return $last_id++;
}


class Client {

  public function __construct( $name, $cell, $email = 'none' )
  {
    $this->id = get_id();
    $this->name = $name;
    $this->cell = $cell;
    $this->email = $email;
    $this->lastAppointment = null;
  }

}


class Station {

  public function __construct( $no, $name, $therapist_id, $colour )
  {
    $this->id = $no;
    $this->name = $name;
    $this->therapist_id = $therapist_id;
    $this->colour = $colour;
  }

}


class Treatment {

  public function __construct( $name, $station_no, $duration, $price, $units )
  {
    $this->id = get_id();
    $this->name = $name;
    $this->station_no = $station_no;
    $this->duration = $duration;
    $this->price = $price;
    $this->units = $units;
  }

}


class Therapist {

  public function __construct( $name, $cell, $station_no )
  {
    $this->id = get_id();
    $this->name = $name;
    $this->cell = $cell;
    $this->station_no = $station_no;
  }

}


class Appointment {
  public function __construct( $client_id, $treatment_id, $station_id,
    $therapist_id, $est_amount, $date, $start_hour, $start_min, 
    $duration, $status_id )
  {
    $this->id = get_id();
    $this->client_id = $client_id;
    $this->treatment_id = $treatment_id;
    $this->station_id = $station_id;
    $this->therapist_id = $therapist_id;
    $this->est_amount = $est_amount;
    $this->date = $date;
    $this->start_hour = $start_hour;
    $this->start_min = $start_min;
    $this->duration = $duration;
    $this->status_id = $status_id;
  }

}


class TimeSlot {

  public $station;
  public $hour;
  public $min;

  public function __construct( $station, $hour, $min )
  {
    $this->station = $station;
    $this->hour = $hour;
    $this->min = $min;
  }

}