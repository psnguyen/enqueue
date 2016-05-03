<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>enQueue</title>
    
    
    <link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    
    <link rel="stylesheet" href="css/style.css">
 	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
</style>  
    
    
  </head>

  <body>
<!--
    <div class='menu'>
  <span class='toggle'>
    <i></i>
    <i></i>
    <i></i>
  </span>
  <div class='menuContent'>
    <ul>
      <li>Home</li>
      <li>About</li>
      <li>Contact</li>
    </ul>
  
  </div>
</div>
-->
<div class='sectionHeroImg'>
  <h1>
    enQueue
    <span>
      
      <p>
        
      </p>
    </span>
    
  </h1>
  <button type="button" class = "modalbutton pure-button-primary" data-toggle="modal" data-target="#myModal">Join Class Session</button>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4> Please Select Your Lab Section</h4>
		</div>
        <div class="modal-body" align = "left">
 
    <form action = "student_session_page.php" method = "post">
    <div class="container" align = "left">
      
       <div class="form-group">
          <label for="sessionid">Class ID:</label>
        <select name ="sessionid" id = "sessionid">
        <!--  <option value = "30952">COEN 11L Wednesday 2:15</option>
          <option value = "30953"> COEN 11L Wednesday 5:15</option>
      -->    <option value = "30968"> COEN 11L Thursday 2:15 </option>
         <!-- <option value = "30964"> COEN 11L Thursday 9:15</option>
		  --><option value = "35042"> COEN 12L Wednesday 2:15 </option>
	      <option value = "35076"> COEN 12L Thursday 2:15</option>
			<option value = "35043"> COEN 20L Thursday 9:15</option>
		</select>
        <br>
      <p> Name: 
      <input type = "text" style = "width:30%" name = "studName" id ="studName">
      </p>    
      <p> Email: 
      <input type = "text" style = "width:30%"name = "studEmail"  id ="studEmail">
      </p>
      <input  name = "submitBtn" type="submit" class="pure-button-primary">
      </div>
  </div>
</div>
</form>

       </div>
      </div>
      
    </div>
  </div>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
    <script src="js/index.js"></script>

    
    
    
  </body>
</html>
