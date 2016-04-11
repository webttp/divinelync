<?php
	
	//the below is for web 
	/*
	$servername = "localhost";
	$username = "danjoewe_webuser";
	$password = "jesus1510";
	$dbname="danjoewe_careindia";
	*/
	
	//the below is for local
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname="rechat";
	
	error_reporting('0');
	// Create connection
	global $conn;
	$conn = new mysqli($servername, $username, $password,$dbname);
	date_default_timezone_set("Asia/Calcutta");
?>