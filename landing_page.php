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
        <li>About</li>
        <li>Contact</li>
		<li>Login/Sign up</li>   
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
    <button type="button" class = "modalbutton pure-button-primary" data-toggle="modal" data-target="#myModal">Login/Sign Up</button>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
  
        <!-- Modal content-->
        <div id = "modal-content" class="modal-content">
		<div id = "modal-header" class="modal-header" style="text-align: center">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4> Login/Sign Up</h4>
          </div>
          <div class="modal-body">
  
      <form action = "authenticate.php" class="pure-form pure-form-aligned" method = "post">
      <div class="container">
  
		 <div class="form-group" style = "margin:0 auto;">
<!--
            <label for="sessionid">Class ID:</label>
          <select name ="sessionid" id = "sessionid">
            <option value = "30952">COEN 11L Wednesday 2:15</option>
            <option value = "30953"> COEN 11L Wednesday 5:15</option>
            <option value = "30968"> COEN 11L Thursday 2:15 </option>
            <option value = "30964"> COEN 11L Thursday 9:15</option>
            <option value = "35042"> COEN 12L Wednesday 2:15 </option>
            <option value = "35076"> COEN 12L Thursday 2:15</option>
              <option value = "35043"> COEN 20L Thursday 9:15</option>
          </select>
		  <br>
-->
        
        <input type = "text" style="width:500px;" name = "login" id ="login" placeholder= "Email Address"><br><br>
        <input type = "password" style="width:500px;" name = "password"  id ="password" placeholder = "Password">
		</p>
		<a href = "signup.php">Click here to register</a><br>  
		<br>
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
                               
