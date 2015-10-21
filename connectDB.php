<?php
	$dbHost='localhost';
	$dbName='firstwebpagedb';
	$dbUser='root';
	$dbPass='1';

	$myConnect = mysql_connect($dbHost,$dbUser,$dbPass));
	mysql_select_db($dbName,$myConnect);

?>