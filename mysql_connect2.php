<?php # Script 8.2 - mysqli_connect.php

// This file contains the database access information. 
// This file also establishes a connection to MySQL 
// and selects the database.

// Set the database access information as constants:
DEFINE ('DB_USER', 'root');//Constant
DEFINE ('DB_PASSWORD', '');//restrict except with the required priviledges
DEFINE ('DB_HOST', 'localhost');//Constant
DEFINE ('DB_NAME', 'staff');//DB name

// Make the connection:
$dbc = mysql_connect (DB_HOST, DB_USER, DB_PASSWORD) OR die ('Could not connect to MySQL: ' . mysql_connect_error() );
mysql_select_db(DB_NAME,$dbc);

 ?>
 