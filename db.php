<?php
/*
dabase : manee_bot
table : tb_messenger_recive
user : fufudev_manee
password: T*v3rn29
*/
	
$servername = "localhost";
$username = "fufudev_manee";
$password = "T*v3rn29";
$dbname = "manee_bot";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



?>