<?php 

  // start session
  session_start();

// create constants to store non repeating values
define('SITEURL','http://localhost/food-order/');
define('LOCALHOST','localhost:3307');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','food-order');

// Database Connection
$conn = new mysqli(LOCALHOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

// Check Connection
if($conn->connect_error){
    die("Connection Failed: " .$conn->connect_error);
}


?>