<?php
$db = mysql_connect("localhost", "root", "") 
	or die("Could not connect");

$db = mysql_select_db("adressboken") 
	or die("Could not connect");
?>
