<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Employees Page</title>
    <link rel="stylesheet" href="addemployee3.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
   
</head>
<body>

    <div class="admin-container">
        <div class="nav-left">`
            <div class="nav-left-information">           
                <div class="admin-info">
                    <h1><?php
                            session_start();
                            if (!isset($_SESSION['id_number'])) {
                                header("location: dashboard.php");
                            }
                            echo "Hi, " . $_SESSION['id_number'] . "!";
                        ?>
                    </h1>
                <p>ADMIN</p>
                </div>
                <ul>
                <li><a href="dashboard.php" id="dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
                <li><a href="listofemployees.php" id="employees" class="active"><i class="fa fa-th-list" aria-hidden="true"></i> List of Employees</a></li>
                <li><a href="attendance/attendance.php" id="attendance" ><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Attendance</a></li>
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
                    <h1>Register Employee's Data</h1>                   
                    <?php 
                    if(isset($_GET['error'])){ ?>
                       <h2 class="error"><?php echo $_GET['error']; ?></h2>
                    <?php }?>
                    
                </div>
                <div class="divider"></div>
                <div class="form-input">
                <form action="insert.php" method="post">
                <div class="personal-information">
                        <div class="p-title">
                            <p><i class="ph-light ph-user"></i> Personal Information</p>
                        </div>
                        <div class="personal-box">                                                                              
                            <label for="" id="label-ename">Employee Name</label><input type="text" name="e_name" id="" placeholder="Juan Dela Cruz" required><br>
                            <label for="" id="right-input">Gender</label>
                            <select id="stats" name="e_gender">                                  
                                    <option value="Select Gender:" disabled>Select Gender:</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select><br>                         
                                <label for="" id="label-con">Contact No.</label><input type="text" name="e_contactno" id="" placeholder="09*******" required><br>
                                <label for="" id="right-dob">Date of Birth</label><input type="text" name="e_dob" placeholder="DD/MM/YY" required onfocus="(this.type='date')" onblur="(this.type='text')"><br>                          
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="employee-work-info">
                        <div class="e-title">
                            <p><i class="ph-light ph-identification-card"></i> Employment Information</p>
                        </div>
                        <div class="personal-box">
                        <label for="" id="label-rfid">RFID No</label><input type="text" name="RFID_no" id="" placeholder="1106******"required> <br>
                            <label for="" id="label-eid">Employee ID</label><input type="text" name="id_number" id="" placeholder="7***" disabled><br>
                            <label for="" id="right-password">Password:</label><input type="text" name="password" id="" placeholder="******" required><br>                                           
                            <label for="" id="label-hired">Date Hired</label><input type="text" name="e_datehired" placeholder="DD/MM/YY" required onfocus="(this.type='date')" onblur="(this.type='text')"><br>
                            <label for="" id="right-hours">Hourly Rates:</label><input type="text" name="e_hourlyrates" id=""  placeholder="ex. 100, 200, 300, etc" required><br>                           
                            <label for="" id="right-stat">Status</label><select id="stats" name="status">                              
                                    <option value="Select Status:" disabled>Select Status:</option><br>
                                    <option value="Contractual">Contractual</option>
                                    <option value="Intern">Intern</option>
                                </select><br>
                                <label for="" id="right-dept">Department:</label><select id="dept" name="e_department" >                               
                                    <option value="Select Department:" disabled>Select Department:</option>
                                    <option value="IT Support">IT Support</option>
                                    <option value="Web Developer">Web Developer</option>
                                </select>   
                        </div>                                
                    </div>
                    <div class="divider"></div>
                        <input type="submit" name="register" value="Register">
                        
                </form>
                </div>
            </div>
        </div>
     

        

    </div>
    <div class="bg-container"></div>
</body>
</html>
