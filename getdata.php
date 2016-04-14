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
		die('Error selecting '.$database.'.'.pdo_error());

	$classID = $_SESSION['classID'];

/*	$timequery = "UPDATE `enqueue` SET `timeSpent` = `TimeOut` - `timein`";
	$tquery = pdo_query($timequery);
	if(!$tquery){
		echo pdo_error();
		die;
	}
 */
	$myquery = "SELECT DISTINCT(`category`) as `category`, count(`category`) AS `categoryCount`
				FROM `enqueue`
				WHERE `classID` = $classID
				GROUP BY `category`
				HAVING `categoryCount` >= 1";
		//"SELECT `studentName`, `reqCount` FROM `enqueue` WHERE `classID` = $classID";
	
	 $query = pdo_query($myquery);

	if(!$myquery){
		echo pdo_error();
		die;
	}

	$data = array();

	for($x=0; $x < pdo_num_rows($query); $x++){
		$data[] = pdo_fetch_assoc($query);
	}

	echo json_encode($data);
	//pdo_close($server);
?>


