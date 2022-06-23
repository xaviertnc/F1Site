<?php namespace F1S;

/**
 * ./services/debug.php
 *
 * C. Moller <xavier.tnc@gmail.com>
 * 
 * Date: 19 Mar 2022
 * 
 * Last update: 23 Jun 2022
 *
 *  - Rename class from System to Debug
 * 
 */


class Debug {

  private $app;


  public function __construct( $app )
  {
     $this->app = $app;
  }


  public function interceptErrors()
  {
    $app = $this->app;
    $trace = error_get_last();

    $error = ( isset( $app->req ) and isset( $app->req->error ) )
      ? $app->req->error
      : ( $trace ? 'Oops, something went wrong!' : '' );

    if ( ! $error )
    {
      exit;
    }

    if ( isset( $app->log ) )
    {
      $app->log->error( $error );
      if ( $trace and __DEBUG__ )
      {
        $app->log->trace( print_r( $trace, true ) );
      }
    }

    if ( ! __PROD__ )
    {
      echo '<div class="error"><h3>', $error, '</h3>', PHP_EOL;
      if ( $trace and __DEBUG__ )
      {
        echo '<pre>', print_r( $trace, true ), '</pre>';
      }      
      echo '</div>', PHP_EOL;
    }
	}

  public function dump( $var )
  {
    echo '<pre>';
    print_r( $var );
    echo '</pre>';
  }

} // end: Class Debug



$app->debug = new Debug( $app );

register_shutdown_function( [ $app->debug, 'interceptErrors' ] );