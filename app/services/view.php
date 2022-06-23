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

  
  public $dir;

  public $name;

  public $title;


  public function __construct( $app )
  {
    $this->app = $app;
    $this->dir = $app->controller->dir;
    $this->name = $app->controller->name;
  }


  public function getTitle()
  {
    return $this->title ?: $this->name;
  }


  public function getFile( $ext = '.html' )
  {
    return $this->dir . '/' . $this->name . $ext;
  }


  public function getThemeFile( $name, $ext = '.html' )
  {
     return $this->app->themeDir . '/' . $name . $ext;
  }


  public function getStylesFile()
  {
    return $this->getFile( '.css' );
  }


  public function getScriptFile()
  {
    return $this->getFile( '.js' );
  }

}


$app->view = new View( $app );