<?php
       session_start();
       include_once("pdo_mysql.php");
  if(isset($_POST['submit_signup'])){ 
	  $username = 'pnguyen';
       $password = '00000949559';
       $host = 'dbserver.engr.scu.edu';
       $database = 'sdb_pnguyen';
   
      if(!$server = pdo_connect("$host", $username, $password))
          die('Error connecting to '.$host.'.'.pdo_error());
      if(!$conn = pdo_select_db($database, $server))
          die('Error selecting '.$database.'.'.pdo_error());

	  $user = $_POST['name'];
  	if($_POST['password'] == $_POST['password2']){
		$password = $_POST['password'];
		$email = $_POST['email'];
		$NewRequestQuery = "INSERT INTO `enqueue_login` (`user`, `email`, `password`, `isInstructor`) VALUES ('$user', '$email', '$password', '0')";
		pdo_query($NewRequestQuery);
		echo"Success! Redirecting to home...";
		header( "refresh:3; url= landing_page.php" );
	}
	else{
		echo "Your passwords did not match! Redirecting to signup...";
		header( "refresh:3; url=signup.php" );

		}
  }	

	   

?>
