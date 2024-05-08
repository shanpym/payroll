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
    <title>Paycheck Page</title>
    <link rel="stylesheet" href="paycheck8.css">
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
                <li><a href="../timesheet/timesheet.php" id="timesheets" ><i class="fa fa-clock-o" aria-hidden="true"></i> Timesheets</a></li></a>
                <li><a href="../paycheck/paycheck.php" id="paycheck" class="active"><i class="fa fa-credit-card" aria-hidden="true"></i> Paycheck</a></li>
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
                    <div class="timesheet-title">
                        <h1>PAYCHECK</h1><br>
                        <div class="divider"></div>
                    </div>                   
                    <div class="search-input">
                        <form action="" method="post">
                            <label for="">Search: </label><input type="text" name="employee_id" id="" placeholder="Enter Employee ID">     
                            <?php 
                    if(isset($_GET['error'])){ ?>
                       <h1 class="error"><?php echo $_GET['error']; ?></h1>
                    <?php }?>                     
                            <?php 
                    if(isset($_GET['insert'])){ ?>
                       <h2 class="insert"><?php echo $_GET['insert']; ?></h2>
                    <?php }?>
                        </form>
                    </div>
                    <div class="employee-data">                    
                    
                    <?php
                     //Query to fetch data
                    
                     if(isset($_POST['employee_id'])) {      
                        $employee_id = $_POST['employee_id'];                   
                        $sql = "SELECT employee_id, employee_name, e_department, e_hourlyrates, SUM(total_hours) AS hours_worked, SUM(overtime) AS total_overtime
                        FROM attendance WHERE employee_id = '$employee_id'";
                                     
                        $result = $conn->query($sql);
                        //condition to check if table is not empty
                        if($result->num_rows > 0){
                           
                            while($row = $result->fetch_assoc()){                               
                                $grosspay = $row["hours_worked"] * $row["e_hourlyrates"];
                                $overtimeRate = $row["e_hourlyrates"] * .25;
                                $overtimeTotal = $overtimeRate * $row["total_overtime"];
                                $tgrosspay = $grosspay + $overtimeTotal;
                                $tax = $tgrosspay * .03;
                                $sss = $tgrosspay *.02;
                                $philhealth = 50;                             
                                $deductions = $tax + $sss + $philhealth;
                                $netpay = $tgrosspay- $deductions;
                        ?> 
                    <div class="employee-details">
                    <form action="process.php" method="post">
                        <div class="e-data">
                            
                                <div class="e-left">
                                    <table>
                                    <tr>
                                    <th>Date</th>
                                        <?php
                                        $current_timezone = date_default_timezone_get();
                                        date_default_timezone_set('Asia/Singapore');
                                        $date = date("Y-m-d");
                                        ?>
                                    <td><input type="text" name="datepaid" id="input-paycheck" value="<?=$date?>" readonly="readonly" required></td>
                                    </tr>
                                    <th>Hourly Rates</th>
                                    <td><input type="text" name="e_hourlyrates" id="input-paycheck" value="<?=$row["e_hourlyrates"]?>/hr" readonly="readonly" required></td>
                                    </tr>
                                    <tr>
                                    <th>Total Hours</th>
                                    <td><input type="text" name="hours_worked" id="input-paycheck" value="<?=$row["hours_worked"]?>hr" readonly="readonly" required></td> 
                                    </tr>         
                                    <tr>
                                    <th>Overtime Hours (25%)</th>
                                    <td><input type="text" name="total_overtime" id="input-paycheck" value="<?=$row["total_overtime"]?>hr" readonly="readonly" required></td>                    
                                    </tr>         
                                    </table>
                                </div>

                                <div class="e-right">
                                    <table>
                                    <tr>
                                    <th>Employee ID</th>
                                    <td><input type="text" name="employee_id" id="input-paycheck" value="<?=$row["employee_id"]?>" readonly="readonly" required></td>
                                    </tr>
                                    <tr>
                                    <th>Employee Name</th>
                                    <td><input type="text" name="employee_name" id="input-paycheck" value="<?=$row["employee_name"]?>" required> </td>
                                    </tr>
                                    <tr>
                                    <th>Department</th>
                                    <td><input type="text" name="e_department" id="input-paycheck" value="<?=$row["e_department"]?>" readonly="readonly" required></td>
                                    </tr>
                                    </table>
                                </div>                 
                                                                            
                                        
                        </div>
                <div class="paycheck-compute">
                    <div class="p-earn">
                        <table> 
                        <th id="earn">Earnings</th>
                        <th id="earn">Amount</th>
                        <tr>
                        <th>Grosspay</th>
                        <td><input type="text" name="grosspay" id="input-paycheck" value="P<?=$grosspay?>" readonly="readonly" required></td>
                        </tr>
                        <tr>
                        <th>Overtime Rate</th>
                        <td><input type="text" name="overtimeTotal" id="input-paycheck" value="P<?=$overtimeTotal?>" readonly="readonly" required></td>
                        </tr> 
                        </table>                     
                    </div>  
                    <div class="p-deduct">
                        <table>
                        <th id="earn">Deductions</th>
                        <th id="earn">Amount</th>
                        <tr>
                        <th>Tax 3%</th>
                        <td><input type="text" name="tax" id="input-paycheck" value="- P<?=$tax?>" readonly="readonly" required></td>
                        </tr>
                    
                        <tr>
                        <th>SSS 2%</th>
                        <td><input type="text" name="sss" id="input-paycheck" value="- P<?=$sss?>" readonly="readonly"required ></td> 
                        </tr>
                                    
                        <tr>
                        <th>Philhealth P50</th>
                        <td><input type="text" name="philhealth" id="input-paycheck" value="- P<?=$philhealth?>" readonly="readonly" required></td>                    
                        </tr>
                        </table>
                    </div> 
                    </div> 
                    <div class="total-pay">
                        <div class="t-earn">
                            <table>
                                <th>Total Earnings</th>
                                <td><input type="text" name="total_earn" id="input-paycheck" value="P<?=$tgrosspay?>" readonly="readonly" required></td> 
                                </tr>
                                
                                </table>    
                        </div> 
                        <div class="t-deduct">
                            <table>
                                <th>Total Deductions</th>
                                <td><input type="text" name="total_deduct" id="input-paycheck" value="- P<?=$deductions?>" readonly="readonly" required></td> 
                                </tr>
                                
                                </table>    
                        </div> 
                    </div>
                     <div class="netpay">
                        <table>
                            <th>Netpay</th>
                            <td><input type="text" name="netpay" id="input-paycheck" value="P<?=$netpay?>" readonly="readonly" required></td> 
                            </tr>
                            <tr>
                            <td colspan="2" id="submit-td">
                            
                            </td>
                            </tr>
                            </table>    
                    </div>    
                    <input type="submit" name="process" id="paycheck-submit" value="Process Paycheck">          
                    </form>
                    <?php               
            }

          }else{
            echo "Invalid";
          }
        }

          ?>                   
            
               
                </div>
                </div>
            </div>
            </form>
        
        </div>

        

    </div>
    <div class="bg-container"></div>
</body>
</html>
