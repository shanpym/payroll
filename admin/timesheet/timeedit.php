<?php
    include("../../dbconnection.php");

    $ID = $_GET['ID'];
    $sql = "SELECT * from attendance WHERE ID='$ID'";
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
    <title>Timesheet Edit Page</title>
    <link rel="stylesheet" href="edit2.css">
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
                <li><a href="../dashboard.php" id="dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
                <li><a href="../listofemployees.php" id="employees"><i class="fa fa-th-list" aria-hidden="true"></i> List of Employees</a></li>
                <li><a href="../attendance/attendance.php" id="attendance"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Attendance</a></li>
                <li><a href="#timesheets" id="timesheets" class="active"><i class="fa fa-clock-o" aria-hidden="true"></i> Timesheets</a></li></a>
                <li><a href="../paycheck/paycheck.php" id="paycheck"><i class="fa fa-credit-card" aria-hidden="true"></i> Paycheck</a></li>
                </ul>
            </div>

           



            <div class="logout">
                <form action="" method="post">
                    <a href="../../logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                </form>
            </div>
        </div>
        <div class="timesheet-container">
            <div class="container-info">               
                    <p>Timesheet / Daily Time Record</p>     
                    <div class="divider"></div>                
                    <table>
                        <tr>
                            <th>Date</th>
                            <th>Employee ID</th>
                            <th>Employee Name</th>                           
                            <th>Total Hours</th>
                            <th>Overtime</th>
                            <th>Action</th>
                        </tr>                                   
                                <tr>
                                    <form action="update.php?ID=<?=$row["ID"]?>" method="post">
                                        <td><?=$row["e_date"]?></td>
                                        <td><?=$row["employee_id"]?></td>             
                                        <td><?=$row["employee_name"]?></td>
                                        <td><input type="text" name="total_hours" id="" value="<?=$row["total_hours"]?>"> </td>
                                        <td><input type="text" name="overtime" id="" value="<?=$row["overtime"]?>"> </td>
                                        <td>
                                        
                                        <a href="timedelete.php?ID=<?=$row["ID"]?>" onclick="return confirm('Do you want to delete this data?')">Delete |</a>
                                        
                                        <input type="submit" name="confirm" value="Confirm">
                                        </td>
                                    </form>    
                                </tr>
                               
     
                </table>  
            </div>

        
        </div>

        

    </div>
    <div class="bg-container"></div>
</body>
</html>
