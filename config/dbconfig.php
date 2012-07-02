<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', '504116');
define('DB_PASSWORD', 'pitagoras');
define('DB_DATABASE', '504116db2');
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
$database = mysql_select_db(DB_DATABASE) or die(mysql_error());
?>
