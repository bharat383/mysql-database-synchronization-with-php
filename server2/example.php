<?php

/*
FILE NAME : example.php
LOCATION : example.php
BASIC DETAILS : This file is the example file for the database synchronization for server2.
AUTHOR : Bharat Parmar
VERSION : 1.0
CREATED DATE : 08-12-2016 

*/


if(isset($_POST['table_name']) && $_POST['table_name']!=""){
	@include("class/server2.class.php");
	$server2 = new server2();
	$output = $server2->table_update($_POST);
	print_r($output);
	exit;
} else {
	echo "Parameter Missings.";
	exit;
}

?>