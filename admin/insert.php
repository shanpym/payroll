<?php
    include("../dbconnection.php");
  
    if(isset($_POST['register'])){

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

        // Check if username already exist
    $checkRFIDquery = "SELECT * FROM employeedata WHERE RFID_no = '$RFID_no'";
    $result = $conn->query($checkRFIDquery);

    if($result->num_rows > 0){ 
        header('Location: addemployee.php?error=Employee No. / RFID No. Already Exist');
    }
    
    else{
        //Username is unique
        //Proceed insert record

        $sql ="INSERT INTO employeedata (id_number, RFID_no, e_name, e_contactno, e_gender, e_dob, e_datehired, e_hourlyrates, e_department, password, status) 
        VALUES (NULL,'$RFID_no', '$e_name', '$e_contactno', '$e_gender', '$e_dob', '$e_datehired', '$e_hourlyrates', '$e_department',  '$password', '$status')";

        //Execute query

        if($conn->query($sql) == TRUE){
            header('Location: listofemployees.php?insert');
        }
        else{
            echo "Error." .$sql ."<br>".$conn->error;
        }
    }
}


?>