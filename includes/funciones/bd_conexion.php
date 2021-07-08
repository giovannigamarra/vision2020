<?php
    define('VISION_HOST', 'localhost');
    define('VISION_DB_USUARIO', 'root');
    define('VISION_DB_PASSWORD', '');
    define('VISION_DB_DATABASE', 'vision2020');


    $conn = new mysqli(VISION_HOST, VISION_DB_USUARIO, VISION_DB_PASSWORD, VISION_DB_DATABASE);


    if($conn->connect_error) {
      echo $conn->connect_error;
    }
