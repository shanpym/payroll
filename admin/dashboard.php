<?php

include("../dbconnection.php");
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
    <title>Admin Page</title>
    <link rel="stylesheet" href="dashboard2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
   
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
                <li><a href="#dashboard" id="dashboard" class="active"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
                <li><a href="listofemployees.php" id="employees"><i class="fa fa-th-list" aria-hidden="true"></i> List of Employees</a></li>
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
                <?php
                $current_timezone = date_default_timezone_get();
                date_default_timezone_set('Asia/Singapore');
                $date = date("Y-m-d");               
                    $sql1 = "SELECT COUNT(*) as employee_count FROM employeedata ";
                    $sql2 = "SELECT COUNT(*) as checkin_count FROM attendance WHERE e_date = '$date'";
                                            
                        $result1 = $conn->query($sql1);
                        $result2 = $conn->query($sql2);
                        if ($result1->num_rows > 0 && $result2->num_rows > 0) {
                            $row1 = $result1->fetch_assoc();
                            $row2 = $result2->fetch_assoc();
                    ?>
            <div class="container-info">
                <div class="employee-title">
                <h1>Dashboard</h1>               
                </div> 
            <div class="divider"></div>
                <div class="employees-count-box">
                    <div class="total-employees-count-box">
                        <div class="total-count-here">
                            <p><?=$row1["employee_count"]?></p>
                        </div>
                        <div class="total-title">
                            <p>Total Employees</p>
                        </div>
                        <div class="more-info">
                            <a href="listofemployees.php">More Info <i class="ph ph-paper-plane-right"></i></a>
                        </div>
                        

                    </div>
                    <div class="total-check-in-today">
                        <div class="total-count-here-2">
                            <p><?=$row2["checkin_count"]?></p>
                        </div>
                        <div class="total-title">
                                <p>Check In Today</p>
                        </div>
                        <div class="more-info">
                            <a href="timesheet/timesheet.php">More Info <i class="ph ph-paper-plane-right"></i></a>
                        </div>
                    </div>
                </div>               
            </div>
            <div class="divider"></div>
            <div class="holiday-container">
                <div class="holiday-box">
                    <div class="holiday-details">
                        <p>Regular Holidays</p>
                        <ul>
                            <li>New Year’s Day – January 1 (Monday)</li>
                            <li>Maundy Thursday – March 28</li>
                            <li>Good Friday – March 29</li>
                            <li>Araw ng Kagitingan – April 9 (Tuesday)</li>
                            <li>Labor Day – May 1 (Wednesday)</li>
                            <li>Independence Day – June 12 (Wednesday)</li>
                            <li>National Heroes Day – August 26 (Monday)</li>
                            <li>Bonifacio Day – November 30 (Saturday)</li>
                            <li>Christmas Day – December 25 (Wednesday)</li>
                            <li>Rizal Day – December 30 (Monday)</li>
                        </ul>
                    </div>
                </div>
                <div class="holiday-box"  id="announcement">
                    <div class="holiday-details-2" id="announcementp">
                        <p>Announcements</p>
                        <ul>
                            <li><a href="https://www.facebook.com/clarkcollege2005/posts/pfbid0cDC7j2yw3N1GrwYeiSYx2kAB7Kv3uJKs3HK5h4VYdKPv2x1VxAEaxQ1qf5pmAk7ql">Jan. 17, 2024 : Join Us! We're Hiring!</a></li>
                            <li><a href="https://www.facebook.com/clarkcollege2005/posts/pfbid02hF117LjaDPyczpNfGv77ctYMxNvEjqqJ229zJ8hMQPA8eFvZmoWNnN8QdwpfECzyl">Jan. 6, 2024 : Enrollment for 2nd Semester is ongoing.</a></li>
                            <li><a href="https://www.facebook.com/clarkcollege2005/posts/pfbid02tVrnx8BPrBuQP9QSUxpNiuFF1Q3wBDkH4SjhEeu9w2oJPzDyAUg95cszP1emKHgel">Dec. 17, 2023 : It is a fun filled week, SHS Clarkians! 🎉🎉🎉</a></li>
                        </ul>
                    </div>
                </div>
                
            </div>
            <?php               
            }

          
        

          ?>                 
        </div>

    </div>
    <div class="bg-container"></div>
</body>
</html>