<?php namespace F1S;

/**
 * ./services/controller.php
 *
 * C. Moller <xavier.tnc@gmail.com>
 * 
 * Date: 19 Mar 2022
 * 
 * Last Update: 23 Jun 2022
 *   - Implement basic routing logic.
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

    if ( $req->segments )
    {
      $this->dir = $app->contentDir . '/' . $req->path;
      $this->name = end( $req->segments );
    }
    else
    {
      $this->dir = $app->contentDir . '/' . $app->homePage;
      $this->name = $app->homePage;
    }
    
  }


  public function getFile( $ext = '.php' )
  {

    return $this->dir . '/' . $this->name . $ext;

  }

}

$app->controller = new Controller( $app );