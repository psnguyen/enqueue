<?php
session_start();
include_once("pdo_mysql.php");
if(isset($_POST['submitBtn'])){
//	$classID = $_POST['sessionid'];
//	echo $classID;
	$_SESSION['classID']  = $_POST['sessionid'];		
}
//	date_default_timezone_set("America/Los_Angeles");
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
			echo'insert complete';
			//pdo_close($database);	
		}

		
		else{
			echo 'insert not completed';
			die(pdo_error());
		}
	}
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
  <h4>Class Listing: </h4>
  <div class = "btn-group-vertical">
 	 <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#addrequest">Add Request</button>
 	 <div id ="addrequest" class ="collapse">
 	 	<form role="form" method ="post" action = "student_session_page.php">
    		<div class="form-group">
      			
     			 <input type="text" class="form-control" id="name" name = "name" placeholder="Enter name">
    		</div>
    		<div class="dropdown">
      			
          <input type="text" class="form-control" id="description" name = "description" placeholder="Describe your problem">
		  <input type = "submit" name = "submitted"/>	 
		 </div>
     	</form>
 	  </div>
  	
  	<button type="alertclose" class="btn btn-primary" data-toggle="collapse" data-target="#removemessage">Remove Request</button>
    <div class="alert alert-success fade in">
      <a href="#" class="close" data-dismiss"alert" aria-label="close">&times;</a>
      Request removed successfully.
    </div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script $('#classTable').on('click', 'input[type="button"]', function () {
    $(this).closest('tr').remove();
});>
</script>
<table id = "classTable" class = "table table-striped table-hover">
	<thead>
		<tr>
			<th> ID </th>
			<th> Class Name </th>
			<th> Instructor Name </th>
			<th> Student Name </th>
			<th> Request Description </th>
			<th> Time In </th>
		</tr>
	</thead>

	<tbody>
		<?php
			
			$host = 'dbserver.engr.scu.edu';
			$username = 'pnguyen';
			$password = '00000949559';
			$database = 'sdb_pnguyen';

			if(!$conn = pdo_connect("$host", $username, $password))
				die('Error connecting to '.host.'.'.pdo_error());
			if(!pdo_select_db($database, $conn))
				die('Error selecting '.$database.'. '.pdo_error());
			
			$classID = $_SESSION['classID'];
			$execItems = pdo_query("SELECT classID, className, instructorName, studentName, reqDescrip, timeIn FROM `enqueue` WHERE classID = $classID");
			
			while($row = pdo_fetch_array($execItems, MYSQL_ASSOC)){
				echo "
						<tr>
							<td>".$row['classID']."</td>	
							<td>".$row['className']."</td>
							<td>".$row['instructorName']."</td>
							<td>".$row['studentName']."</td>
							<td>".$row['reqDescrip']."</td>
							<td>".$row['timeIn']."</td>
							<td> <input type = \"button\" value = \"Delete\" /> </td>
						</tr>
						";

				}
?>	
	</tbody>
</table>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script $('#classTable').on('click', 'input[type="button"]', function () {
    $(this).closest('tr').remove();
});>
</script>
<script>

  function removeSuccess()
  {
    var removeMessage = "Request successfully removed.";
    document.getElemendById("removeSuccess").innerHTML = removeMessage;
  }

  <!--$(document).ready(function(){
    $('alertclose').click(function(){
      $('.alert').show()
    })
  });-->
</script>

</body>
</html>
