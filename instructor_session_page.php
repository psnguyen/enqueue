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
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
<meta http-equiv="refresh" content="20">
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
 if(isset($_POST['instructorJoinBtn'])){
	$_SESSION['classID']  = $_POST['joinClass'];
}
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
		
	  $deleteName = pdo_escape_string($deleteName);
	  $deleteDescr = pdo_escape_string($deleteDescr);
	  $newQuery = "UPDATE `enqueue` SET `isSolved` = '1', `TimeOut` = now() WHERE `reqDescrip` LIKE '%$deleteDescr%' AND `studentName` LIKE '%$deleteName%'";
	  if(pdo_query($newQuery)){
	  }
	  else{
	  	echo'update not complete';
		die(pdo_error());
	  }
//	}
  }

	  if(isset($_POST["savebutton"])){
	  	
	  	
 	 $host = 'dbserver.engr.scu.edu';
 	 $username = 'pnguyen';
 	 $password = '00000949559';
 	 $database = 'sdb_pnguyen';

 	 if(!$conn = pdo_connect("$host", $username, $password))
  	   die('Error connecting to '.host.'. '.pdo_error());

	  if(!pdo_select_db($database, $conn))
 	   die('Error selecting '.$database.'. '.pdo_error());

	  $classID = $_SESSION['classID'];
	  $id_ary = explode(",", $_POST["row_order"]);
	  for($i = 0; $i<count($id_ary); $i++){
		 $newSaveQuery = "UPDATE `enqueue` SET `order` = '$i' WHERE `classID` = '$classID' AND `reqCount` = '$id_ary[$i]'";
		  if(pdo_query($newSaveQuery)){
	  }
	  else{
	  	echo'update not complete';
		die(pdo_error());
	  }
	  }
	  }
?>
<div class="container" align = "center">
  <h1>enQueue</h1>
  <h4>Class Listing: <?php echo $_SESSION['classID']; ?></h4>
  <div class = "btn-group-vertical">
 

<!--<form><input type=button value="Refresh" onClick="window.location.reload()"></form> -->
<!--	<input type="button" value = "Remove Request" onclick = "delRow()"/>
	  <br>	
	<input type="button" value = "Clear Queue" onclick = "clearTable()"/>
-->
    <div id="clearqueue" class="collapse">
       <p><strong>Queue has been cleared.</strong></p>
    </div>

  </div>
<p>Drag + Drop rows to reorder the table! </p>
<form name = "frmQA" method = "POST" />

<input type = "hidden" name = "row_order" id = "row_order" />
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
			$execItems = pdo_query("SELECT classID, reqCount, studentName, reqDescrip, category, timeIn FROM `enqueue` WHERE classID = $classID and studentName != 'blank' and isSolved = 'FALSE' ORDER BY `order`");
			$countID = 0;	
			while($row = pdo_fetch_array($execItems, MYSQL_ASSOC)){
				echo "
					<tr id = ".$row['reqCount'].">
							<td> <input type=\"checkbox\" name=\"chk\"/></td>
							<td>".$row['studentName']."</td>
							<td>".$row['reqDescrip']."</td>
							<td>".$row['category']."</td>
							<td>".$row['timeIn']."</td>
						</tr>
						";
				$countID++;
				}
?>	
	</tbody>
</table>
<br>
	<input type="button" value = "Remove Request" onclick = "delRow()"/>
	<input type = "submit" class = "btnSave" name = "savebutton" value = 'Save Order' onclick = "saveOrder();"/>

<form><input type=button value="Refresh" onClick="window.location.reload()"></form> 
<!--	<input type="button" value = "Clear Queue" onclick = "clearTable()"/>-->
</form>
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
			/*
			update: function(event, ui){
				var data = $(this).sortable('serialize');
				$.ajax({
					data: data,
					type: 'POST',
					url: 'save_order.php'
				});
	}*/
	});
});

function saveOrder() {
	var selectedLanguage = new Array();
		$('table#classTable tr').each(function() {
	selectedLanguage.push($(this).attr("id"));
	});
	document.getElementById("row_order").value = selectedLanguage;
  }
/*
function saveOrder() {
    var articleorder="";
    $("#classTable tbody").each(function(i) {
        if (articleorder=='')
            articleorder = $(this).attr('id');
        else
            articleorder += "," + $(this).attr('id');
    });
            //articleorder now contains a comma separated list of the ID's of the articles in the correct order.
    $.post('save_order.php', { order: articleorder })
        .success(function(data) {
            alert('saved');
        })
        .error(function(data) { 
            alert('Error: ' + data); 
        }); 
}*/

</script>
<center>
<!--
<a href="logout.php">Exit Session</a><br>
<a href ="index.html">Analyze 1</a>
<a href="index3.html">Analyze 2</a>
-->
<br>
<p>View Class Statistics</p>
<select onChange="window.location.href=this.value">
   	<option selected="selected" disabled = "disabled">Select a Method of Analysis</option>
	 <option value="index.html"># of Requests in Each Category</option>
    <option value="index3.html">Amount of Time Spent Receiving Assistance</option>
</select>
<br>
<a href = "logout.php">Exit Session</a>
<br><br>	
<p>We appreciate you guys using our enQueue prototype! Please take 2 minutes and click <a href ="http://goo.gl/forms/mQqHIL0SjS">here</a> to fill out a very brief survey about your experience. Thank you!
</center>
</body>
</html>
