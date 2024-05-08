<?php

include("../../dbconnection.php");

$ID = $_GET['ID'];
$total_hours = $_POST['total_hours'];
$overtime = $_POST['overtime'];


$sql = "UPDATE attendance
SET 
total_hours = '$total_hours',
overtime = '$overtime'


WHERE ID='$ID'
";

if($conn->query($sql) == TRUE){
    
    header('Location: timesheet.php');
}


?>