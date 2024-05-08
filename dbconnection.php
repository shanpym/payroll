<?php
//Database Connection Parameters
$servername="localhost";
$username="root";
$password="";
$database="dbpayroll";

//Create connection
$conn = new mysqli($servername,$username,$password,$database);

//Check connection
if($conn->connect_error){
   die("Connection Error: ".$conn->connect_error);
}

?>