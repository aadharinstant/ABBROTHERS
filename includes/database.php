<?php 
 $hostname = "localhost";
 $username = "u616189242_1234";
 $password = "Fresh@8585";
 $database = "u616189242_uclnew";


 $conn = mysqli_connect($hostname,$username,$password,$database);
 if(!$conn){
    echo "database Not Connected ";
 }
//  else{
//     echo "Database Connected";
//  }

?>