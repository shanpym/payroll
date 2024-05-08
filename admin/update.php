<?php

include("../dbconnection.php");

$id_number = $_GET['id_number'];
$RFID_no = $_POST['RFID_no'];
$e_name = $_POST['e_name'];
$e_contactno = $_POST['e_contactno'];
$e_gender = $_POST['e_gender'];
$e_dob = $_POST['e_dob'];
$e_datehired = $_POST['e_datehired'];
$e_hourlyrates = $_POST['e_hourlyrates'];
$e_department = $_POST['e_department'];
$password = $_POST['password'];
$status = $_POST['status'];

$sql = "UPDATE employeedata
SET 
RFID_no = '$RFID_no',
e_name = '$e_name',
e_contactno = '$e_contactno',
e_gender = '$e_gender',
e_department = '$e_department',
e_dob = '$e_dob',
e_datehired = '$e_datehired',
e_hourlyrates = '$e_hourlyrates',
id_number = '$id_number',
password = '$password',
status = '$status'


WHERE id_number='$id_number'
";

if($conn->query($sql) == TRUE){
    
    header('Location: listofemployees.php');
}


?>