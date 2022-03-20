<?php namespace F1S;

/**
 * ./services/system.php
 *
 * C. Moller <xavier.tnc@gmail.com>
 * 
 * Date: 19 Mar 2022
 * 
 */


class System {

  public function shutdown()
  {
    global $app;

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

} // end: Class System



$app->sys = new System();

register_shutdown_function(array($app->sys, 'shutdown'));