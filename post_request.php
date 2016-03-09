<?php 
session_start();
include_once("pdo_mysql.php");
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
  
  
  //      $studentName = $_POST['name'];
          $studentName = $_SESSION['userName'];
          $descr = $_POST['description'];
          $category = $_POST['category'];
          $classID = $_SESSION['classID'];
          $className = "COEN175";
          $instrName = "Nate";
          $isSolved =1;
			
		$studentName = pdo_escape_string($studentName);
		$descr = pdo_escape_string($descr);
          $countQuery = "SELECT * FROM `enqueue` WHERE `classID` = '$classID'";
          $getCountQuery = pdo_query($countQuery);
          $row_count = pdo_num_rows($getCountQuery);
          $NewRequestQuery = "INSERT INTO `enqueue` (`classID`, `reqCount`, `order`, `className`, `instructorName`, `studentName`,`reqDescrip`, `category`, `timeIn`, `timeSpent`, `isSolved`) VALUES ('$classID', '$row_count', '100', 'none','none', '$studentName', '$descr', '$category', now(),'0', '0')";
  
          if(pdo_query($NewRequestQuery)){
  
          }
  
 
          else{
              echo 'insert not completed';
              die(pdo_error());
		  }
		  header("Location:student_session_page.php?");
}
?>
