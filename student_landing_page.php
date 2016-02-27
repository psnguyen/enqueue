
<html lang="en">
<head>
  <title>Student Landing Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>
<form action = "student_session_page.php" method = "post">
<div class="container" align = "center">
  <h2>Join a Class Session</h2>
    <div class="form-group">
  		<label for="sessionid">Class ID:</label>
	  	<select name ="sessionid" id = "sessionid">
			<option value = "30952">COEN 11L W 2:15</option>
			<option value = "30953"> COEN 11L W 5:15</option>
			<option value = "30968"> COEN 11L R 2:15 </option>
			<option value = "30964"> COEN 11L R 9:15</option>
			<option value = "30998"> COEN 12L M 2:15 </option>
			<option value = "32296"> COEN 20L M 2:15 </option>
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
</body>
</html>
