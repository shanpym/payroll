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
    <title>Edit Page</title>
    <link rel="stylesheet" href="edit4.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
</head>
<body>

    <div class="admin-container">
        <div class="nav-left">`
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
                <li><a href="listofemployees.php" id="employees"  class="active"><i class="fa fa-th-list" aria-hidden="true"></i> List of Employees</a></li>
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


        <div class="addrecord-container">
            <div class="addrecord-details">
                <div class="addrecord-title">
                    <h1>Update Employee's Data</h1>
                </div>
                <div class="divider"></div>
                <form action="update.php?id_number=<?=$row["id_number"]?>" method="post">
                    <div class="personal-information">
                        <div class="p-title">
                            <p><i class="ph-light ph-user"></i> Personal Information</p>
                        </div>
                        <div class="personal-box">                           
                            <label for="" id="label-ename">Employee Name</label><input type="text" name="e_name" id="" value="<?=$row['e_name']?>" placeholder="Full Name" required autofocus><br>
                            <label for="" id="right-input">Gender</label>
                            <select id="stats" name="e_gender">
                                    <option value="<?=$row['e_gender']?>"><?=$row['e_gender']?></option>
                                    <option value="Select Gender:" disabled>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select><br>                         
                            <label for="" id="label-con">Contact No.</label><input type="text" name="e_contactno" id="" value="<?=$row['e_contactno']?>" placeholder="Contact No." required><br>
                            <label for="" id="right-dob">Date of Birth</label><input type="text" name="e_dob" value="<?=$row['e_dob']?>" required onfocus="(this.type='date')" onblur="(this.type='text')"><br>                      
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="employee-work-info">
                            <div class="e-title">
                                <p><i class="ph-light ph-identification-card"></i> Employment Information</p>
                            </div>
                            <div class="personal-box">
                            <label for="" id="label-rfid">RFID No</label><input type="text" name="RFID_no" id="" value="<?=$row['RFID_no']?>" placeholder="RFID No."required><br>
                                <label for="" id="label-eid">Employee ID:</label><input type="text" name="id_number" id="" value="<?=$row['id_number']?>" placeholder="ID Number" disabled><br>
                                <label for="" id="right-password">Password:</label><input type="text" name="password" id="" value="<?=$row['password']?>" placeholder="Password" required><br>                     
                                <label for="" id="label-hired">Date Hired:</label><input type="text" name="e_datehired" value="<?=$row['e_datehired']?>" required onfocus="(this.type='date')" onblur="(this.type='text')"><br>
                                <label for="" id="right-hours">Hourly Rates:</label><input type="text" name="e_hourlyrates" id="" value="<?=$row['e_hourlyrates']?>" placeholder="Hourly Rate" required><br>                                                                   
                                <label for="" id="right-stat">Status:</label>
                                    <select id="stats" name="status">
                                        <option value="<?=$row['status']?>" ><?=$row['status']?></option>
                                        <option value="Select Status:" disabled>Select Status:</option>
                                        <option value="Contractual">Contractual</option>
                                        <option value="Intern">Intern</option>
                                    </select><br>
                                <label for="" id="right-dept">Department:</label>
                                    <select id="dept" name="e_department" >
                                        <option value="<?=$row['e_department']?>"><?=$row['e_department']?></option>
                                        <option value="Select Department:" disabled>Select Department:</option>
                                        <option value="IT Support">IT Support</option>
                                        <option value="Web Developer">Web Developer</option>
                                    </select><br>
                            </div>                                              
                    </div>
                    <div class="divider"></div>
                    <input type="submit" name="update" value="Update">

                </form>
            </div>
        </div>
     

        

    </div>
    <div class="bg-container"></div>
</body>
</html>
