<?php
    include("../dbconnection.php");
    session_start();

 if(isset($_GET['delete'])){
  echo "<script>
            alert('Data Deleted Successfully.');
            </script>";
 }

 if(isset($_GET['update'])){
  echo "<script>
            alert('Data Edited Successfully.');
            </script>";
 }


 
 if (!isset($_SESSION['admin'])) {
 header("Location: login.php"); // Redirect to the login page
 exit();
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Employees Page</title>
    <link rel="stylesheet" href="e_list5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
</head>
<body>
<?php
          //Query to fetch data       
          $sql = "SELECT * FROM employeedata";
          $result = $conn->query($sql);
          ?>
    <div class="admin-container">
        <div class="nav-left">
            <div class="nav-left-information">
            
                <div class="admin-info">
                    <h1><?php
                            echo "Hi, " . $_SESSION['id_number'] . "!";
                        ?>
                    </h1>
                <p>ADMIN</p>
                </div>
                <ul>
                <li><a href="dashboard.php" id="dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
                <li><a href="#employees" id="employees" class="active"><i class="fa fa-th-list" aria-hidden="true"></i> List of Employees</a></li>
                <li><a href="attendance/attendance.php" id="attendance"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Attendance</a></li>
                <li><a href="timesheet/timesheet.php" id="timesheets"><i class="fa fa-clock-o" aria-hidden="true"></i> Timesheets</a></li></a>
                <li><a href="paycheck/paycheck.php" id="paycheck"><i class="fa fa-credit-card" aria-hidden="true"></i> Paycheck</a></li>
                </ul>
            </div>

           



            <div class="logout">
                <form action="" method="post">
                    <a href="../logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                </form>
            </div>
        </div>
        <div class="employees-container">
            <div class="container-info">
                <div class="employee-btn-container">
                <p>List of Employees</p>

                <div class="add-employee-btn"><a href="addemployee.php"><i class="fa fa-user-plus"></i> Add an Employee</a></div>
                </div>

                <div class="divider"></div>

                <table>
                    <tr>
                        <th>Employee ID</th>
                        <th>RFID No.</th>
                        <th>Full Name</th>
                        <th>Date Hired</th>
                        <th>Department</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        //condition to check if table is not empty
                        if($result->num_rows > 0){
                            //Output Data of Each Row
                            while($row = $result->fetch_assoc()){
                        ?>    
                                <tr>
                                        <td><?=$row["id_number"]?></td>
                                        <td><?=$row["RFID_no"]?></td>               
                                        <td><?=$row["e_name"]?></td>
                                        <td><?=$row["e_datehired"]?></td>
                                        <td><?=$row["e_department"]?></td>
                                        <td><?=$row["status"]?></td>
                                        <td>
                                        <a href="view.php?id_number=<?=$row["id_number"]?>">View | </a>
                                        <a href="delete.php?id_number=<?=$row["id_number"]?>" onclick="return confirm('Do you want to delete this data?')">Delete |</a>
                                        <a href="edit.php?id_number=<?=$row["id_number"]?>">Edit</a>
                                        </td>
                                </tr>
                        <?php               
            }

          }
         

          ?>
                </table>
            </div>
        </div>

        

    </div>
    <div class="bg-container"></div>
</body>
</html>


<?php
//Close Connection
 $conn->close();


?>