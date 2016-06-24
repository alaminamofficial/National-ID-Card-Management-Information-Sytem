<?php
error_reporting(0);
$con  = mysql_connect("localhost","root","");
if(!$con)
	die("Could not connect to db");
mysql_select_db("National_ID_Information",$con);
?>