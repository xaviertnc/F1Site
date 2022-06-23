<?php namespace F1S;

/**
 * ./services/request.php
 *
 * C. Moller <xavier.tnc@gmail.com>
 * 
 * Date: 19 Mar 2022
 * 
 */

class Request {

  private $app;

  public $uri;
  
  public $path;

  public function __construct( $app )
  {
    $this->baseUri = $app->baseUri;
    $this->uri = $_SERVER[ 'REQUEST_URI' ];
    $this->path = $this->getPath();
    $this->segments = $this->path ? explode( '/', $this->path ) : []; 
  }

  public function get( $param, $default = null )
  {
    return isset( $_REQUEST[ $param ] ) ? $_REQUEST[ $param ] : $default;
  }

  public function getPath()
  {
    $path = $this->baseUri ? str_replace( $this->baseUri, '', $this->uri ) : $this->uri; 
    return trim( $path , '/' );
  }

}

$app->req = new Request( $app );