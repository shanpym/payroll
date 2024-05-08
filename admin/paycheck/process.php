<?php
    include("../../dbconnection.php");
  
    if(isset($_POST['process'])){

    $employee_id = $_POST['employee_id'];
    $date = $_POST['datepaid'];
    $e_hourlyrates = $_POST['e_hourlyrates'];
    $hours_worked = $_POST['hours_worked'];
    $hours_overtime = $_POST['total_overtime'];
    $employee_id = $_POST['employee_id'];
    $employee_name = $_POST['employee_name'];
    $e_department = $_POST['e_department'];
    $grosspay = $_POST['grosspay'];

    $overtimeTotal = $_POST['overtimeTotal'];
    $tax = $_POST['tax'];
    $sss = $_POST['sss'];
    $philhealth = $_POST['philhealth'];
    $netpay = $_POST['netpay'];
    $total_earn = $_POST['total_earn'];
    $total_deduct = $_POST['total_deduct'];
    $e_department = $_POST['e_department'];

        // Check if username already exist
    $checkRFIDquery = "SELECT * FROM companyrecords WHERE id_number = '$employee_id' AND date_paid = '$date'";
    $result = $conn->query($checkRFIDquery);

    if($result->num_rows > 0){ 
        // $date_paid = $date;
        // $current_timezone = date_default_timezone_get();
        // date_default_timezone_set('Asia/Singapore');
        // $dateCurrent = date("Y-m-d");
        // $biweekly= date('Y-m-d', strtotime($date_paid . ' + 14 days'));

        // if($dateCurrent == $biweekly){
        //     $sql ="INSERT INTO companyrecords (reference_no, id_number, e_name, e_hourlyrates, total_hours, overtime, tax, sss, philhealth, netpay, date_paid, total_earn, total_deduct) 
        //     VALUES (NULL,'$employee_id', '$employee_name', '$e_hourlyrates', '$hours_worked', '$hours_overtime', '$tax', '$sss', '$philhealth',  '$netpay', '$date', '$total_earn', '$total_deduct' )";
        //     //Execute query   
        //     if($conn->query($sql) == TRUE){
        //         header('Location: paycheck.php?insert=Paycheck has been processed.');
        //     }            
        // }
        header('Location: paycheck.php?error= Invalid.');
        
    }
    
    else{
        //Username is unique 
        //Proceed insert record

        $sql ="INSERT INTO companyrecords (reference_no, id_number, e_name, e_hourlyrates, total_hours, overtime, tax, sss, philhealth, netpay, date_paid, total_earn, total_deduct, tgrosspay, tovertime, e_department) 
        VALUES (NULL,'$employee_id', '$employee_name', '$e_hourlyrates', '$hours_worked', '$hours_overtime', '$tax', '$sss', '$philhealth',  '$netpay', '$date', '$total_earn', '$total_deduct', '$grosspay', '  $overtimeTotal', ' $e_department' )";
      

        //Execute query

        if($conn->query($sql) == TRUE){
            header('Location: paycheck.php?insert=Paycheck has been processed.');
        }
        else{
            echo "Error." .$sql ."<br>".$conn->error;
        }
    }
}
// echo "Hi";

?>