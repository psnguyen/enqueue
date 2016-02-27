<?php
session_start();
include_once("pdo_mysql.php");
//if(isset($_POST['submitBtn'])){
//	$classID = $_POST['sessionid'];
//	echo $classID;
//	$_SESSION['classID']  = $_POST['sessionid'];		
	if(isset($_POST['submitted'])){

	//include_once("pdo_mysql.php");
	$host = 'dbserver.engr.scu.edu';
	$username = 'pnguyen';
	$password = '00000949559';
	$database = 'sdb_pnguyen';

	if(!$conn = pdo_connect("$host", $username, $password))
		die('Error connecting to '.host.'.'.pdo_error());
	if(!pdo_select_db($database, $conn))
		die('Error selecting '.$database.'. '.pdo_error());

//	if(isset($_POST['submitted'])){
		$studentName = $_POST['name'];
		$descr = $_POST['description'];
		$classID = $_SESSION['classID'];
	//	date_default_timezone_set('America/Los_Angeles');
		$time = time();
		$className = "COEN175";
		$instrName = "Nate";
		$isSolved =1;
		$NewRequestQuery = "INSERT INTO `enqueue` (`classID`, `className`, `instructorName`, `studentName`,`reqDescrip`, `timeIn`, `timeSpent`, `isSolved`) VALUES ('$classID', 'COEN175', 'Nate', '$studentName', '$descr', now(),'0', '0')";

		if(pdo_query($NewRequestQuery)){
			//pdo_close($database);	
		}

		
		else{
			echo 'insert not completed';
			die(pdo_error());
		}
	}
//}
?>
<html lang="en">
<head>
<style>
  .alert{
    display: none;
}
</style>

  <title>Student Session Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container" align = "center">
  <h1>enQueue</h1>
  <h4>Class Listing: <?php echo $_SESSION['classID']; ?> </h4>
  <div class = "btn-group-vertical">
 	 <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#addrequest">Add Request</button>
 	 <div id ="addrequest" class ="collapse">
 	 	<form role="form" method ="post" action = "student_session_page.php">
    		<div class="form-group">
      			
			<input type="text" class="form-control" id="name" name = "name" value = "<?php echo $_SESSION['userName']; ?>">
    		</div>
    		<div class="dropdown">
      			
          <input type="text" class="form-control" id="description" name = "description" placeholder="Describe your problem">
		  <input type = "submit" name = "submitted"/>	 
		 </div>
     	</form>
 	  </div>
  	
	<input type="button" value = "Remove Request" onclick = "delRow()"/>
    <div class="alert alert-success fade in">
      <a href="#" class="close" data-dismiss"alert" aria-label="close">&times;</a>
      Request removed successfully.
    </div>
  </div>
<table id = "classTable" class = "table table-striped table-hover">
	<thead>
		<tr>
			<th> Select </th>
			<th> Student Name </th>
			<th> Request Description </th>
			<th> Time In </th>
		</tr>
	</thead>

	<tbody>
		<?php
			
	if(isset($_POST['submitBtn'])){
			$_SESSION['classID'] = $_POST['sessionid'];
			$classID = $_POST['sessionid'];
			$_SESSION['userName'] = $_POST['studName'];
			$userName = $_SESSION['userName'];
			$_SESSION['userEmail'] = $_POST['studEmail'];
			$userEmail = $_SESSION['userEmail'];
	}
			$host = 'dbserver.engr.scu.edu';
			$username = 'pnguyen';
			$password = '00000949559';
			$database = 'sdb_pnguyen';

			if(!$conn = pdo_connect("$host", $username, $password))
				die('Error connecting to '.host.'.'.pdo_error());
			if(!pdo_select_db($database, $conn))
				die('Error selecting '.$database.'. '.pdo_error());
			
			$classID = $_SESSION['classID'];
			$execItems = pdo_query("SELECT classID, studentName, reqDescrip, timeIn FROM `enqueue` WHERE classID = $classID and studentName != 'blank' and isSolved = 'FALSE'");
			
			while($row = pdo_fetch_array($execItems, MYSQL_ASSOC)){
				echo "
					<tr>
							<td> <input type=\"checkbox\" name=\"chk\"/></td>
							<td>".$row['studentName']."</td>
							<td>".$row['reqDescrip']."</td>
							<td>".$row['timeIn']."</td>
						</tr>
						";

				}
?>	
	</tbody>
</table>

</div>

<script>
function test(){
	alert("test");
}

function delRow(){
	  try{
		var table = document.getElementById("classTable");
		var rowCount = table.rows.length;
		var checkList = window.document.getElementsByName('chk');
		for(var j =0; j<checkList.length; j++){
			if(checkList[j].checked == true){
				table.deleteRow(j+1);
				rowCount--;
				j--;
			}
		}
  	
	}
	catch(e){
		alert(e);
	}
}

</script>

</body>
</html>
