<?php

    include("../../dbconnection.php");
    //Get value from URL

    $ID = $_GET['ID'];

    //Create a SQL command to delete record

    $sql = "DELETE from attendance WHERE ID='$ID'";

    //Execute the SQL command

    if($conn->query($sql) == TRUE){
      
        header('Location: timesheet.php');
    }

?>