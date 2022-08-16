<?php

ob_start();

/* Email address used with your admin account */
$AdminEmail = "info@aswagroup.com";	

/* Database Hostname (usually localhost) */
$hostname = "mysql.aswagroup.com";			
/* Username for database */
$user = "istakip_yonetici";				
/* Password for database */
$pass = "Bolu1414";				

/* Database name */
$database = "istakip";		

// DO NOT ALTER THE TABLE DATA UNLESS YOU KNOW WHAT YOUR DOING	
/* table name for the user table that will be inserted into the database, If your uncertain what this is leave it as it is */
$userstable = "users";				
/* table name for the categories table that will be inserted into the database, If you are uncertain what this is leave it as it is */
$cattable = "categories";
/* table name for the dev_tasks table that will be inserted into the database, If you are uncertain what this is leave it as it is */

$ofistable = "ofisler2";
// burasi ofisleri gösteriyor 

				
$taskstable = "dev_tasks";
/* table name for the history table that will be inserted into the database, If you are uncertain what this is leave it as it is */				
$historytable = "history";



/* Do NOT enter www. or http:// */				
$domain = "aswagroup.com";
/* this is the directory account of the script ie.. /login/ be sure to add a slash at the beginning and end */			
$directory = "/krk/";




/* DO NOT REMOVE ANYTHING BELOW */
ini_set("error_reporting", E_ALL & ~E_NOTICE);
/* Versioning */
$version = "1.0";
?>