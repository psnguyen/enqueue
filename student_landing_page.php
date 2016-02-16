
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
  <p>Click here to join a new class session</p>
  <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#create">Join Session</button>
  <div id="create" class="collapse">
    <div class="form-group">
  		<label for="sessionid">Session ID:</label>
  		<input type="number" class="form-control" name = "sessionid" id="sessionid">
      <input name = "submitBtn" type="submit" class="btn btn-primary">
	  </div>
  </div>
</div>
</form>
</body>
</html>
