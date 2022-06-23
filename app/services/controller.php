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


  public function __construct( $app )
  {

    $this->app = $app;

    $req = $app->req;

    if ( count( $req->segments ) < 2 )
    {
      $this->dir = $app->contentDir;
      $this->name = $app->homePage;
    }
    else
    {
      $this->dir = $app->contentDir . '/' . $req->path;
      $this->name = end( $req->segments );
    }
    
  }


  public function getFile()
  {

    return $this->dir . '/' . $this->name . '.php';

  }

}

$app->controller = new Controller( $app );