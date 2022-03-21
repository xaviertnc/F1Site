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

  public $dir;
  public $name;
  public $file;


  public function __construct( $app )
  {
    $this->app = $app;
    $this->name = 'home';
    $this->dir = $app->siteDir;
    $this->file = $this->dir . '/' . $this->name . '.php';
  }

}


$app->page = new Controller( $app );