<?php


require 'paypal/autoload.php';

define('URL_SITIO', 'http://localhost:80/Vision2020-master');

$apiContext = new \PayPal\Rest\ApiContext(
      new \PayPal\Auth\OAuthTokenCredential(
          '',  // ClienteID
          ''  // Secret
      )
);

