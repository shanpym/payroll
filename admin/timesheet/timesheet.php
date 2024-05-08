<?php
    include("../../dbconnection.php");

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
    <title>Timesheet Page</title>
    <link rel="stylesheet" href="timesheet5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
</head>
<body>
<?php
          //Query to fetch data       
          $sql = "SELECT * FROM attendance";
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
                            <th>Department</th>                                             
                            <th>Total Hours</th>
                            <th>Overtime</th>
                            <th>Action</th>
                        </tr>
                     
                   
    
                    <?php
                        //condition to check if table is not empty
                        if($result->num_rows > 0){
                            //Output Data of Each Row
                            while($row = $result->fetch_assoc()){
                        ?>    
                                <tr>
                                        <td><?=$row["e_date"]?></td>
                                        <td><?=$row["employee_id"]?></td>             
                                        <td><?=$row["employee_name"]?></td>
                                        <td><?=$row["e_department"]?></td>                                                                              
                                        <td><?=$row["total_hours"]?></td>
                                        <td><?=$row["overtime"]?></td>
                                        <td>
                                        
                                        <a href="timedelete.php?ID=<?=$row["ID"]?>" onclick="return confirm('Do you want to delete this data?')">Delete |</a>
                                        <a href="timeedit.php?ID=<?=$row["ID"]?>">Edit</a>
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
