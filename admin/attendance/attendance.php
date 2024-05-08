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
    <title>Attendance Page</title>
    <link rel="stylesheet" href="attendance.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="time2.js"></script>
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
                <li><a href="#attendance" id="attendance" class="active"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Attendance</a></li>
                <li><a href="../timesheet/timesheet.php" id="timesheets"><i class="fa fa-clock-o" aria-hidden="true"></i> Timesheets</a></li></a>
                <li><a href="../paycheck/paycheck.php" id="paycheck"><i class="fa fa-credit-card" aria-hidden="true"></i> Paycheck</a></li>
                </ul>
            </div>

           



            <div class="logout">
                <form action="" method="post">
                    <a href="../../logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                </form>
            </div>
        </div>



        <div class="attendance-container">
            <div class="attendance-title">
                <h1>ATTENDANCE</h1>
                <?php 
                    if(isset($_GET['error'])){ ?>
                       <h2 class="error"><?php echo $_GET['error']; ?></h2>
                    <?php }?>
            </div>
            <div class="divider"></div>
            <div class="form-container">
                
                <form action="timecheck.php" method="post">
                    <div class="emp-info">
                        <label for="">RFID No.</label><input type="text" name="RFID_no" id="rfidno" placeholder="RFID No." autofocus><br>
                   
                    </div>
                    <div class="date-time-info">
                        <label for="">DATE </label> <input type="date" name="e_date" id="d1" value="<?php date_default_timezone_set('Asia/Singapore'); echo date("Y-m-d");?>"><br>
                        <label for="">TIME</label><input type="text" name="time" id="time" placeholder="Time">
                    
                    <input type="submit" name="punch" value="PUNCH">
                    </div>
                </form>
            </div>
                    
            <table>
                <tr>
                    <th>Employee ID</th>
                    <th>RFID No.</th>
                    <th>Employee Name</th>
                    <th>Time Arrival</th>
                    <th>Time Departure</th>
                    <th>Date</th>
                </tr>
                <?php
                        //condition to check if table is not empty
                        if($result->num_rows > 0){
                            //Output Data of Each Row
                            while($row = $result->fetch_assoc()){
                        ?>    
                                <tr>
                                        <td><?=$row["employee_id"]?></td> 
                                        <td><?=$row["RFID_no"]?></td>                                                   
                                        <td><?=$row["employee_name"]?></td>
                                        <td><?=$row["time_arrival"]?></td>
                                        <td><?=$row["time_departure"]?></td>
                                        <td><?=$row["e_date"]?></td>
                                </tr>
                        <?php               
            }

          }
         

          ?>
            </table>
        </div>
            
       

    </div>
    <div class="bg-container"></div>
</body>
</html>

