<?php

    include("../dbconnection.php");
    //Get value from URL

    $id_number = $_GET['id_number'];

    //Create a SQL command to delete record

    $sql = "DELETE from employeedata WHERE id_number='$id_number'";

    //Execute the SQL command

    if($conn->query($sql) == TRUE){
      
        header('Location: listofemployees.php');
    }

?>