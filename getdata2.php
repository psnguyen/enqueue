<?php
	session_start();
	include_once("pdo_mysql.php");

	$username = 'pnguyen';
	$password = '00000949559';
	$host = 'dbserver.engr.scu.edu';
	$database = 'sdb_pnguyen';

	if(!$server = pdo_connect("$host", $username, $password))
		die('Error connecting to '.$host.'.'.pdo_error());
	if(!$conn = pdo_select_db($database, $server))
		die('Error selecting'.$database.'.'.pdo_error());

	$classID = $_SESSION['classID'];

	$timequery = "UPDATE `enqueue` SET `timeSpent` = TIMEDIFF(`TimeOut`, `timeIn`) WHERE `isSolved` = 1";
	$tquery = pdo_query($timequery);
	if(!$tquery){
		echo pdo_error();
//		die;
	}

	$myquery = "SELECT DISTINCT(`studentName`) as `studentName`, sum(TIME_TO_SEC(`timeSpent`)/60) as `timeCount`
				FROM `enqueue`
				WHERE `classID` = $classID
				GROUP BY `studentName`
				HAVING `timeCount` > 0";

	$query = pdo_query($myquery);

	if(!$myquery){
		echo pdo_error();
		die;
	}

	$data = array();

	for($x = 0; $x< pdo_num_rows($query); $x++){
		$data[] = pdo_fetch_assoc($query);
	}

	echo json_encode($data);
?>
