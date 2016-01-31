<?php
 
//read in the old hash table 
   
$readfile = fopen('db/urls.txt', 'r');
$old_serialized_hashtable = fread($readfile, filesize('db/urls.txt'));
fclose($readfile);
   
//unserialize the hash table
$old_hashtable = unserialize($old_serialized_hashtable);
  
//generate a hash/id pair while checking to see if hash is also unique
  
do{
  $newID = openssl_random_pseudo_bytes(16, $cstrong);
  $newHashURL = md5($newID);
}while(array_key_exists($newHashURL, $old_hashtable));
  
//Add new hash/id pair to the hashtable
$old_hashtable[$newHashURL] = $newID;
  
//serializing new hash
$new_serialized_hashtable = serialize($old_hashtable);
  
$writefile = fopen('db/urls.txt', 'w');
fwrite($writefile, new_serialized_hashtable);
fclose($writefile);
  
//create a new object for requests
$newRequest = array{
  "classid" => "",
  "student_name" => "",
  "timein" => "",
  "timeout" => "",
  "totaltime" => ""

};
?>
  


