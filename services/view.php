<?php namespace F1S;

/**
 * ./services/view.php
 *
 * C. Moller <xavier.tnc@gmail.com>
 * 
 * Date: 19 Mar 2022
 * 
 */


class View {

  private $app;


  public function __construct( $app )
  {
    $this->app = $app;
  }


  public function getFile( $type = 'html.php' )
  {
    return $this->app->ctrl->path . '/' . $this->app->ctrl->name . '.' . $type;
  }

}


$app->view = new View( $app );