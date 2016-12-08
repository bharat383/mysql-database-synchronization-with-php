<?php

/*
FILE NAME : example.php
LOCATION : example.php
BASIC DETAILS : This file is the example file for the database synchronization from server1.
AUTHOR : Bharat Parmar
VERSION : 1.0
CREATED DATE : 08-12-2016 

*/
@include("class/server1.class.php");
$server1 = new server1();
$output = $server1->getdbupdate();

echo "<pre>";
print_r($output);
echo "</pre>";

?>