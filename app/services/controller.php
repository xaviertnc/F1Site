<?php namespace F1S;

/**
 * ./services/controller.php
 *
 * C. Moller <xavier.tnc@gmail.com>
 * 
 * Date: 19 Mar 2022
 * 
 */


class Controller {

  private $app;


  public $name;
  public $path;
  public $file;


  public function __construct( $app )
  {
    $this->app = $app;
    $this->name = 'home';
    $this->path = $app->env->site;
    $this->file = $this->path . '/' . $this->name . '.php';
  }


}


$app->ctrl = new Controller( $app );