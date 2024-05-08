<?php

    include("../dbconnection.php");
    //Get value from URL

    $ID = $_GET['ID'];

    //Create a SQL command to delete record

    $sql = "DELETE from employeedata WHERE ID='$ID'";

    //Execute the SQL command

    if($conn->query($sql) == TRUE){
      
        header('Location: listofemployees.php?delete');
    }

?>