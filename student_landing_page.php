
<html lang="en">
<head>
  <title>Student Landing Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container" align = "center">
  <h1>enQueue</h1>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Join Class Session</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" align = "center">
 
		<form action = "student_session_page.php" method = "post">
		<div class="container" align = "left">
			<p>	Please Select Your Lab Section </p>
 		   <div class="form-group">
  				<label for="sessionid">Class ID:</label>
	 		 	<select name ="sessionid" id = "sessionid">
					<option value = "30952">COEN 11L Wednesday 2:15</option>
					<option value = "30953"> COEN 11L Wednesday 5:15</option>
					<option value = "30968"> COEN 11L Thursday 2:15 </option>
					<option value = "30964"> COEN 11L Thursday 9:15</option>
					<option value = "30998"> COEN 12L Monday 2:15 </option>
					<option value = "32296"> COEN 20L Monday 2:15 </option>
					<option value = "30959"> COEN 146L Wednesday 2:15</option>
				</select>
				<br><br>
			<p> Name: 
			<input type = "text" name = "studName" id ="studName">
			</p>		
			<br>
			<p> Email: 
			<input type = "text" name = "studEmail"  id ="studEmail">
			</p>
			<br><br>
			<input name = "submitBtn" type="submit" class="btn btn-primary">
	  	</div>
	</div>
</form>

       </div>
      </div>
      
    </div>
  </div>
  
</div>
<!--
<form action = "student_session_page.php" method = "post">
<div class="container" align = "center">
  <h2>Join a Class Session</h2>
	<p>	Please Select Your Lab Section </p>
    <div class="form-group">
  		<label for="sessionid">Class ID:</label>
	  	<select name ="sessionid" id = "sessionid">
			<option value = "30952">COEN 11L Wednesday 2:15</option>
			<option value = "30953"> COEN 11L Wednesday 5:15</option>
			<option value = "30968"> COEN 11L Thursday 2:15 </option>
			<option value = "30964"> COEN 11L Thursday 9:15</option>
			<option value = "30998"> COEN 12L Monday 2:15 </option>
			<option value = "32296"> COEN 20L Monday 2:15 </option>
			<option value = "30959"> COEN 146L Wednesday 2:15</option>
		</select>
		<br><br>
		<p> Name: 
		<input type = "text" name = "studName" id ="studName">
		</p>		
		<br>
		<p> Email: 
		<input type = "text" name = "studEmail"  id ="studEmail">
		</p>
		<br><br>
		<input name = "submitBtn" type="submit" class="btn btn-primary">
	  </div>
</div>
</form>

-->
</body>
</html>
