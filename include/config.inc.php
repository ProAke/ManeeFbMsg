<?php error_reporting(E_ALL ^ E_NOTICE);

// Mysql Version 
$db_config = array(
    "host" => "203.146.252.149",
    "user" => "fufudev_manee",
    "pass" => "T*v3rn29",
    "dbname" => "manee_bot",
    "charset" => "utf8"
);

$conn = @new mysqli($db_config["host"], $db_config["user"], $db_config["pass"], $db_config["dbname"]);
$conn->set_charset($db_config["charset"]);
