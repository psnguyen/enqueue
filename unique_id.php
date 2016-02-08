<html>
<head>
	<meta charset = "UTF-8"/>
	<title> unique id </title>
</head>
<body>
<?php
  include_once("pdo_mysql.php");
  $host = 'dbserver.engr.scu.edu';
  $username = 'pnguyen';
  $password = '00000949559';
  $database = 'sdb_pnguyen';

  if(!$conn = pdo_connect("$host", $username, $password))
     die('Error connecting to '.host.'. '.pdo_error());

  if(!pdo_select_db($database, $conn))
    die('Error selecting '.$database.'. '.pdo_error());
 // $className = $_GET['classname'];
  //the length we want the unique reference number to be
  $unique_ref_length = 6;

  //A true/false variable that lets us know if we've found a unique reference number or not
  $unique_ref_found = false;

  //possible characters we can include in our ID
  $possible_chars = " 23456789BCDEFGHJKMNPQRSTVQXYZ";

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
  //'for class: ' $_POST[className];

?>
</body>
</html>
