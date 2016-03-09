<?php
session_start();
include_once("pdo_mysql.php");
	$host = 'dbserver.engr.scu.edu';
	$username = 'pnguyen';
	$password = '00000949559';
	$database = 'sdb_pnguyen';

	if(!$conn = pdo_connect("$host", $username, $password))
		die('Error connecting to '.host.' . '.pdo_error());
	if(!pdo_select_db($database, $conn))
		die('Error Selecting DB');

	$classID = $_SESSION['classID'];
	$i = 1;
	foreach($_POST['item'] as $itemvalue){
		$newQuery = "UPDATE `enqueue` SET `order` = $i WHERE `classID` = $classID AND `reqCount` = $itemvalue";
		if(pdo_query($newQuery)){
		
		}
		else{
			echo 'update not complete';
			die(pdo_error());
		}
		$i++;
	}
?>
