<?php
    include("../dbconnection.php");

    $id_number = $_GET['id_number'];
    $sql = "SELECT * from employeedata WHERE id_number='$id_number'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    session_start();
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
    <title>Summary Page</title>
    <link rel="stylesheet" href="view5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
</head>
<body>

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
                <li><a href="listofemployees.php" id="employees" class="active"><i class="fa fa-th-list" aria-hidden="true"></i> List of Employees</a></li>
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

        <div class="summary-container">
            
            <div class="summary-title">
            <p>Employee Summary</p>
            <h1>(A summary of a CCST Employee.)</h1>
            </div>
            <div class="divider"></div>
            <div class="employment-information">
                <form action="update.php?id_number=<?=$row["id_number"]?>" method="post">
                <table> 
                    <tr>
                    <th>Employee ID</th>
                    <td><?=$row["id_number"]?></td>
                    <th>RFID No.</th>
                    <td><?=$row["RFID_no"]?></td>
                    </tr>
                    <tr>
                    <th>Full Name</th>
                    <td colspan="4"><?=$row["e_name"]?> </td> 
                    </tr>
                                   
                    <tr>
                    <th>Department</th>
                    <td colspan="4"><?=$row["e_department"]?></td>                    
                    </tr>
                    <tr>
                    <th>Status</th>
                    <td colspan="4"><?=$row["status"]?></td> 
                    </tr>
                    <tr>
                    <th>Date Hired</th>
                    <td colspan="4"><?=$row["e_datehired"]?></td> 
                    </tr>
                    <tr>
                    
                    <tr>               
                    <th>Gender</th>
                    <td colspan="4"><?=$row["e_gender"]?></td> 
                    </tr>
                    <tr>
                    <th>Date Of Birth</th>
                    <td colspan="4"><?=$row["e_dob"]?></td> 
                    </tr>
                    <tr>
                    <th>Contact No.</th>
                    <td colspan="4"><?=$row["e_contactno"]?></td> 
                    </tr>
                </table>

                <table>
                <th>Hourly Rates</th>
                    <td colspan="4" id="second-table"><?=$row["e_hourlyrates"]?></td> 
                    </tr>   
                   
                </table>
                </form>
            </div>

            
                        
        </div>

    </div>
    <div class="bg-container"></div>
</body>
</html>

