<?php

/*
FILE NAME : config.php
LOCATION : includes/config.php
BASIC DETAILS : This file includes details about the database connections and basic settings.
AUTHOR : Bharat Parmar
VERSION : 1.0
CREATED DATE : 08-12-2016 

*/

//DATABASE DETAILS
define("HOST","localhost");
define("DBNAME","bharat_syncdb2");
define("DBUSER","root");
define("DBPASSWORD","");

//QUERY AND TIME TO SYNCHRONIZATION
define("QUERY_LIMIT","500"); // MAX INSERT QUERY AT A TIME

//SET TIMEZONE
date_default_timezone_set("Asia/Kolkata");
?>