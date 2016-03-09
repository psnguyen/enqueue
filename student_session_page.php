<?php
session_start();
include_once("pdo_mysql.php");
if(isset($_POST['submitBtn'])){
		$_SESSION['classID'] = $_POST['sessionid'];
		$classID = $_POST['sessionid'];
		$_SESSION['userName'] = $_POST['studName'];
		$userName = $_SESSION['userName'];
		$_SESSION['userEmail'] = $_POST['studEmail'];
		$userEmail = $_SESSION['userEmail'];
}
/*
//if student submits a request
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


//		$studentName = $_POST['name'];
	$studentName = $_SESSION['userName'];
	$descr = $_POST['description'];
	$category = $_POST['category'];
	$classID = $_SESSION['classID'];
	$className = "COEN175";
	$instrName = "Nate";
	$isSolved =1;
		
	$countQuery = "SELECT * FROM `enqueue` WHERE `classID` = '$classID'";
	$getCountQuery = pdo_query($countQuery);
	$row_count = pdo_num_rows($getCountQuery);
	$NewRequestQuery = "INSERT INTO `enqueue` (`classID`, `reqCount`, `order`, `className`, `instructorName`, `studentName`,`reqDescrip`, `category`, `timeIn`, `timeSpent`, `isSolved`) VALUES ('$classID', '$row_count', '100', 'none', 'none', '$studentName', '$descr', '$category', now(),'0', '0')";
	
		if(pdo_query($NewRequestQuery)){

		}

		
		else{
			echo 'insert not completed';
			die(pdo_error());
		}
	}
 */

if(isset($_GET["w1"]) && isset($_GET["w2"])){
		$deleteName = $_GET["w1"];
		$deleteDescr = $_GET["w2"];

 	 $host = 'dbserver.engr.scu.edu';
 	 $username = 'pnguyen';
 	 $password = '00000949559';
 	 $database = 'sdb_pnguyen';

 	 if(!$conn = pdo_connect("$host", $username, $password))
  	   die('Error connecting to '.host.'. '.pdo_error());

	  if(!pdo_select_db($database, $conn))
 	   die('Error selecting '.$database.'. '.pdo_error());

	  $newQuery = "UPDATE `enqueue` SET `isSolved` = '1', `TimeOut` = now() WHERE `reqDescrip` = '$deleteDescr' AND `studentName` = '$deleteName'";
	
	 if(strcmp($_SESSION['userName'], $deleteName) == 0){ 
		  
	 	 if(pdo_query($newQuery)){
		  }
		  else{
	  		echo'update not complete';
			die(pdo_error());
		  }
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>

<body>

<div class="container" align = "center">
  <h1>enQueue</h1>
  <h4>Class Listing: <?php echo $_SESSION['classID']; ?> </h4>
<br><br> 

<table id = "classTable" class = "pure-table pure-table-bordered">
	<thead>
		<tr>
			<th> Select </th>
			<th> Student Name </th>
			<th> Request Description </th>
			<th> Type </th>
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
			$execItems = pdo_query("SELECT classID, studentName, reqDescrip, category, timeIn FROM `enqueue` WHERE classID = $classID and studentName != 'blank' and isSolved = 'FALSE' ORDER BY `order`");
			
			while($row = pdo_fetch_array($execItems, MYSQL_ASSOC)){
				echo "
					<tr>
							<td> <input type=\"checkbox\" name=\"chk\"/></td>
							<td>".$row['studentName']."</td>
							<td>".$row['reqDescrip']."</td>
							<td>".$row['category']."</td>
							<td>".$row['timeIn']."</td>
						</tr>
						";

				}
?>	
	</tbody>
</table>

<p>*Students may only delete their own requests!</p>
	<div class="container">
  		<!-- Trigger the modal with a button -->
  			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" style = "margin-right: 25px;">Add Request</button>

 			 <!-- Modal -->
 			 <div class="modal fade" id="myModal" role="dialog">
    			<div class="modal-dialog">
    
  			    	<!-- Modal content-->
     				 <div class="modal-content">
      					  <div class="modal-header">
  					        <button type="button" class="close" data-dismiss="modal">&times;</button>
       					 </div>
       					 <div class="modal-body">
   
							<form role="form" method ="post" id = "requestForm" action = "post_request.php">
    						<div class="form-group">
      			
								Category:	<br>
			
								<select id = "category" name = "category">
									<option value = "Clarification"> Clarification </option>
									<option value = "Conceptual"> Conceptual </option>
									<option value = "Logical Error"> Logical Error </option>
									<option value = "Compiling Error"> Compiling Error </option>
									<option value = "Runtime Error"> Runtime Error </option>
									<option value ="Demo"> Demo </option> 
									<option value = "Other"> Other </option>	
								</select>
    						</div>
    						<div class="dropdown">      			
								Description: <br>
								<textarea rows = "4" cols = "25" name = "description" id = "description"> </textarea><br>
		 						 <input type = "submit" name = "submitted" value = "Add Request"/>	 
							 </div>
     						</form>
					     </div>
      					  <div class="modal-footer">
        					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     					   </div>
  					    </div>
      
  					  </div>
				  </div>
<br> <br> 
<!--
		<form role="form" method ="post" id = "requestForm" action = "post_request.php">
    		<div class="form-group">
      			
				Category:	<br>
			
				<select id = "category" name = "category">
						<option value = "Clarification"> Clarification </option>
						<option value = "Conceptual"> Conceptual </option>
						<option value = "Logical Error"> Logical Error </option>
						<option value = "Compiling Error"> Compiling Error </option>
						<option value = "Runtime Error"> Runtime Error </option>
						<option value ="Demo"> Demo </option> 
						<option value = "Other"> Other </option>	
				</select>
    		</div>
    		<div class="dropdown">
      			
			Description: <br>
			<textarea rows = "4" cols = "25" name = "description" id = "description"> </textarea><br>
		  <input type = "submit" name = "submitted" value = "Add Request"/>	 
		 </div>
     	</form>
 	


-->
  </div>
<!--
<table id = "classTable" class = "pure-table pure-table-bordered">
	<thead>
		<tr>
			<th> Select </th>
			<th> Student Name </th>
			<th> Request Description </th>
			<th> Type </th>
			<th> Time In </th>
		</tr>
	</thead>

	<tbody>
		<?php
/*			
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
			$execItems = pdo_query("SELECT classID, studentName, reqDescrip, category, timeIn FROM `enqueue` WHERE classID = $classID and studentName != 'blank' and isSolved = 'FALSE' ORDER BY `order`");
			
			while($row = pdo_fetch_array($execItems, MYSQL_ASSOC)){
				echo "
					<tr>
							<td> <input type=\"checkbox\" name=\"chk\"/></td>
							<td>".$row['studentName']."</td>
							<td>".$row['reqDescrip']."</td>
							<td>".$row['category']."</td>
							<td>".$row['timeIn']."</td>
						</tr>
						";

				}
*/
?>	
	</tbody>
</table>

<p>*Students may only delete their own requests!</p>
-->	
<input type="button" value = "Remove Request" onclick = "delRow()"/>

 <form action = "http://students.engr.scu.edu/~pnguyen/enqueue_master/student_session_page.php"><input type= "submit"  value="Refresh"></form> 	
</div>

<script>
function delRow(){
	  try{
		var table = document.getElementById("classTable");
		var rowCount = table.rows.length;
		var checkList = window.document.getElementsByName('chk');
		for(var j =0; j<checkList.length; j++){
			if(checkList[j].checked == true){
				var x = document.getElementById("classTable").rows[j+1].cells;
				xVal1 = x[1].innerHTML;
				xVal2 = x[2].innerHTML;
				
				table.deleteRow(j+1);
				rowCount--;
				j--;
				window.location.href = "student_session_page.php?w1=" + xVal1 + "&w2=" + xVal2;
			}
		}
  	
	}
	catch(e){
		alert(e);
	}
}

function test(){
	alert("test");
}



</script>
<center>
 <a href="logout_student.php">Exit Session</a>

<br><br>
<p>We appreciate you guys using our enQueue prototype! Please take 2 minutes and click <a href ="http://goo.gl/forms/fX7shxhV3d">here</a> to fill out a very brief survey about your experience. Thank you!
 </center>
</body>
</html>
