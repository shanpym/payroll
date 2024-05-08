<?php

include("../dbconnection.php");

$ID = $_GET['ID'];
$password = $_POST['password'];


$sql = "UPDATE employeedata
SET 
password = '$password',



WHERE ID='$ID'
";

if($conn->query($sql) == TRUE){
    
    header('Location: page1.php');
}


?>