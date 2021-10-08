<?php

require_once __DIR__ . '/vendor/autoload.php';
include_once("include/config.inc.php");


//All that is returned in the response
echo 'All the data returned from the Facebook server: ' . $me;

//Print out my name
echo 'My name is ' . $me->getName();
