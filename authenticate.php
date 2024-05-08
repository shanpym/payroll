<?php
   include ("dbconnection.php");
   session_start();




   //Check if the form is submitted
   if (isset($_POST['login'])){
    $id_number = $_POST['id_number'];
    $password = $_POST['password']; 
    //Query to check user credentials
    if($sql = "SELECT * FROM admindata WHERE admin_id = '$id_number' AND password = '$password'"){
        $result = $conn->query($sql);


        if($result->num_rows == 1){
            //Authentication Successful
            $_SESSION['id_number'] = $id_number;
            $_SESSION['password'] = $password;
            $_SESSION['admin_name'] = $admin_name;
            $_SESSION['admin'] = 'admin';

            //redirect to profile page
            header("Location: admin/dashboard.php");

    
        }   
        else{
            //Authentication Unsuccessful       
            header("Location: index.php?error=Invalid. Please try again!");

        }
    }

    if($sql = "SELECT * FROM employeedata WHERE id_number = '$id_number' AND password = '$password' "){
        $result = $conn->query($sql);


        if($result->num_rows == 1){
            //Authentication Successful
            $_SESSION['id_number'] = $id_number;
            $_SESSION['password'] = $password;
            $_SESSION['user'] = 'user';

            //redirect to profile page
            header("Location: employee/page1.php");           
        }
    
    }
    else{
        //Authentication Unsuccessful
 
        header("Location: index.php?error=Invalid. Please try again!");

    }
    



   }

//Close Connection
$conn->close();


?>

