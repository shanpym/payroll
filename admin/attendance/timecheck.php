<?php
    include("../../dbconnection.php");
  
session_start();
    
    if(isset($_POST['punch'])){
     
            $current_timezone = date_default_timezone_get();
            date_default_timezone_set('Asia/Singapore');

            if(isset($_SESSION["time_arrival"]))
            $RFID_no = $_POST['RFID_no'];
            $time_arrival = $_SESSION["time_arrival"];
            $time_departure = date('H:i:s');
            $date = $_POST['e_date'];
            $totalHours = $time_departure - $time_arrival;
            if($totalHours>=8){
                $overtime = $totalHours - 8;
            }
        
                // Check if RFID/DATE already exist
            $checkRFIDquery = "SELECT RFID_no, e_date FROM attendance WHERE e_date = '$date' AND RFID_no = '$RFID_no'";
            $result = $conn->query($checkRFIDquery);
                   
            if($result->num_rows > 0){
                // header('Location: attendance.php?error=Duplicate Entry');
                $sql ="UPDATE attendance SET time_departure = '$time_departure', total_hours = '$totalHours', overtime = '$overtime' WHERE e_date = '$date' AND RFID_no = '$RFID_no' ";           
                    //Execute query
            
                    if($conn->query($sql) == TRUE){               
                        header('Location: attendance.php');
                        }

        
            }
            else{
                //user is not checked in
                $current_timezone = date_default_timezone_get();
                date_default_timezone_set('Asia/Singapore');
                $_SESSION["time_arrival"] = date('H:i:s');
                $sql ="INSERT INTO attendance (employee_id, RFID_no, employee_name, e_date, time_arrival, e_department, e_hourlyrates) SELECT id_number, RFID_no,e_name, '$date', '$time_arrival', e_department, e_hourlyrates FROM employeedata WHERE RFID_no = '$RFID_no' ";
            
                    //Execute query
            
                    if($conn->query($sql) == TRUE){               
                        header('Location: attendance.php');
                        }
                
                        
            }
    
        }
    



?>