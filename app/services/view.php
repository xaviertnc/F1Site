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

  public $title;


  public function __construct( $app )
  {
    $this->app = $app;
  }


  public function getTitle()
  {
    return $this->title ?: $this->app->page->name;
  }


  public function getFile( $type = 'html.php' )
  {
    return $this->app->page->dir . '/' . $this->app->page->name . '.' . $type;
  }


  public function getTemplate( $name )
  {
     return $this->app->themeDir . '/' . $name . '.html.php';
  }

}


$app->view = new View( $app );