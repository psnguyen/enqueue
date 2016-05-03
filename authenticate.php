<?php
       session_start();
       include_once("pdo_mysql.php");
   
       $username = 'pnguyen';
       $password = '00000949559';
       $host = 'dbserver.engr.scu.edu';
       $database = 'sdb_pnguyen';
   
      if(!$server = pdo_connect("$host", $username, $password))
          die('Error connecting to '.$host.'.'.pdo_error());
      if(!$conn = pdo_select_db($database, $server))
          die('Error selecting '.$database.'.'.pdo_error());

	  $username = $_POST['login'];
	  $password = $_POST['password'];

	  $username = pdo_escape_string($username);
	  $password = pdo_escape_string($password);
	  $result = "SELECT `user` FROM `enqueue_login` WHERE `email` = '$username' AND `password` = '$password' AND `isInstructor` = 1";
		//$instructorquery = pdo_query($result);

	  $result2 ="SELECT `user` FROM `enqueue_login` WHERE `email` = '$username' AND `password` = '$password' AND `isInstructor` = 0"; 
	  //$studentquery = pdo_query($result2);


	 /* if(pdo_num_rows($instructorquery)==0 && pdo_num_rows($studentquery) == 0){
	  	header("Location: landing_page.php");
	  }
	  else if(pdo_num_rows($studentquery > 0)){
	  		header( "Location: student_landing_page.php" ); 	
	  }
	  else if(pdo_num_rows($instructorquery > 0)){
	  		header( "Location: instructor_landing_page.html" ); 
	  }*/

	  $instructorquery = pdo_query($result);
	  if (pdo_num_rows($instructorquery) > 0)
		  header("Location: instructor_landing_page.html");

	  $studentquery = pdo_query($result2);
	  if(pdo_num_rows($studentquery) > 0)
		  header("Location: student_landing_page.php");

	  echo nl2br("Incorrect Email/Password Combination\n");
	  echo "<a href=\"javascript:history.go(-1)\">Click here to go back</a>";
//	  if((pdo_num_rows($studentquery) == 0) && pdo_num_rows($instructorquery) ==0){
//		  echo "Incorrect Email/Password";
		  //header("Location: landing_page.php");
//	  }
	 // else if(pdo_num_rows($instructorquery)==0 && pdo_num_rows($studentquery) == 0){
	//	  echo "Please enter a valid email/password";
	 //	header( "Location: landing_page.php" ); 
	 // }
?>
