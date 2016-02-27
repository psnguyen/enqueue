<html lang="en">
<head>
  <title>Instructor Session Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>

<body>
<style>
.ui-sortable tr {     
	cursor:pointer; 
}	
.ui-sortable tr:hover { 
	background-color: yellow;
}
</style>
<?php
  session_start();
  include_once("pdo_mysql.php");
  /*
  if(isset($_POST['instructorCreateBtn'])){
 	 $host = 'dbserver.engr.scu.edu';
 	 $username = 'pnguyen';
 	 $password = '00000949559';
 	 $database = 'sdb_pnguyen';

 	 if(!$conn = pdo_connect("$host", $username, $password))
  	   die('Error connecting to '.host.'. '.pdo_error());

	  if(!pdo_select_db($database, $conn))
 	   die('Error selecting '.$database.'. '.pdo_error());


	  //the length we want the unique reference number to be
	  $unique_ref_length = 6;

 	 //A true/false variable that lets us know if we've found a unique reference number or not
 	 $unique_ref_found = false;

 	 //possible characters we can include in our ID
 	 $possible_chars = "0123456789";

 	 //keep generating new IDs until we find a unique one
	  while(!$unique_ref_found){
	      //start with blank ref number
  	  	$unique_ref = "";

  		  //set up a counter to keep track of how many characters have been added
  		  $i = 0;

  		  //add random chars from $possible_chars to $unique_ref have currently been added

  		  while($i < $unique_ref_length){
  		    $char = substr($possible_chars, mt_rand(0,strlen($possible_chars) - 1), 1);
		    $unique_ref .= $char;
    		    $i++;
   		 }

   		 $query = "SELECT `classID` FROM `enqueue` WHERE `classID` = ' ".$unique_ref. "'";
   		 $result = pdo_query($query) or die(pdo_error(). ' ' .$query);
   		 if(pdo_num_rows($result) == 0){
    	 	 $unique_ref_found = true;

   		 }
  	 }
        
       echo $unique_ref; 
       $_SESSION['classID'] = $unique_ref;
	$studentName = "blank";
	$descr = "blank";
	$classID = $_SESSION['classID'];
	//date_default_timezone_set('America/Los_Angeles');
	$time = time();
	$className = "blank";
	$instrName = "blank";
	$isSolved =1;
	$NewRequestQuery = "INSERT INTO `enqueue` (`classID`, `className`, `instructorName`, `studentName`,`reqDescrip`, `timeIn`, `timeSpent`, `isSolved`) VALUES ('$classID', '$className', '$instrName', '$studentName', '$descr', now(),'0', '0')";

	if(pdo_query($NewRequestQuery)){
		//pdo_close($database);	
	}

		
	else{
		echo 'insert not completed';
		die(pdo_error());
	}

  }
*/
  //function setDeleteFlag(){
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

	  $newQuery = "UPDATE `enqueue` SET `isSolved` = '1' WHERE `reqDescrip` = '$deleteDescr' AND `studentName` = '$deleteName'";
	  if(pdo_query($newQuery)){
	  }
	  else{
	  	echo'update not complete';
		die(pdo_error());
	  }
//	}
  }
?>
<div class="container" align = "center">
  <h1>enQueue</h1>
  <h4>Class Listing: <?php echo $_SESSION['classID']; ?></h4>
  <div class = "btn-group-vertical">
 


	<input type="button" value = "Remove Request" onclick = "delRow()"/>
	  <br>	
	<input type="button" value = "Clear Queue" onclick = "clearTable()"/>

    <div id="clearqueue" class="collapse">
       <p><strong>Queue has been cleared.</strong></p>
    </div>

  </div>
<br><br>
<p>Drag + Drop rows to reorder the table! </p>
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
			if(isset($_POST['instructorJoinBtn'])){
				$_SESSION['classID']  = $_POST['joinClass'];
			}
			$classID = $_SESSION['classID'];
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
				window.location.href = "instructor_session_page.php?w1=" + xVal1 + "&w2=" + xVal2;
			}
		}
  	
	}
	catch(e){
		alert(e);
	}
}

function clearTable(){
	var table = document.getElementById("classTable");
	var rows = table.rows;
	var i = rows.length;
	while(--i){
		rows[i].parentNode.removeChild(rows[i]);
	
	}
}

$(document).ready(function(){
	$("#classTable tbody").sortable({
			opacity: 0.6,
			cursor: 'move'
		});
});
</script>
		
</body>
</html>
