<?php

include("../dbconnection.php");
session_start();
    if (!isset($_SESSION['user'])) {
    header("Location: login.php"); // Redirect to the login page
    exit();
    }
$reference_no = $_GET['reference_no'];
$sql = "SELECT * from companyrecords WHERE reference_no='$reference_no'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Page</title>
    <link rel="stylesheet" href="payslipview1.css">
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
                <p>EMPLOYEE</p>
                </div>
                <ul>
                <li><a href="page1.php" id="dashboard" ><i class="fa fa-vcard-o" style="font-size:16px"></i> View Profile</a></li>
                <li><a href="payslip.php" id="employees" class="active"><i class="fa fa-money" style="font-size:16px"></i> Payslip</a></li>
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
                <div class="employee-title">
                    <h1>Payslip</h1>               
                </div> 
                <div class="divider"></div>
                <div class="employee-data">                    
                    <div class="employee-details">
                    <form action="process.php" method="post">
                        <div class="e-data">
                            
                                <div class="e-left">
                                    <table>
                                    <tr>
                                    <th>Date</th>                                  
                                    <td><input type="text" name="datepaid" id="input-paycheck" value="<?=$row["date_paid"]?>" readonly="readonly" required></td>
                                    </tr>
                                    <th>Hourly Rates</th>
                                    <td><input type="text" name="e_hourlyrates" id="input-paycheck" value="<?=$row["e_hourlyrates"]?>" readonly="readonly" required></td>
                                    </tr>
                                    <tr>
                                    <th>Total Hours</th>
                                    <td><input type="text" name="hours_worked" id="input-paycheck" value="<?=$row["total_hours"]?>" readonly="readonly" required></td> 
                                    </tr>         
                                    <tr>
                                    <th>Overtime Hours</th>
                                    <td><input type="text" name="total_overtime" id="input-paycheck" value="<?=$row["overtime"]?>" readonly="readonly" required></td>                    
                                    </tr>         
                                    </table>
                                </div>

                                <div class="e-right">
                                    <table>
                                    <tr>
                                    <th>Employee ID</th>
                                    <td><input type="text" name="employee_id" id="input-paycheck" value="<?=$row["id_number"]?>" readonly="readonly" required></td>
                                    </tr>
                                    <tr>
                                    <th>Employee Name</th>
                                    <td><input type="text" name="employee_name" id="input-paycheck" value="<?=$row["e_name"]?>" required> </td>
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
                        <td><input type="text" name="grosspay" id="input-paycheck" value="<?=$row["tgrosspay"]?>" readonly="readonly" required></td>
                        </tr>
                        <tr>
                        <th>Overtime Rate</th>
                        <td><input type="text" name="overtimeTotal" id="input-paycheck" value="<?=$row["tovertime"]?>" readonly="readonly" required></td>
                        </tr> 
                        </table>                     
                    </div>  
                    <div class="p-deduct">
                        <table>
                        <th id="earn">Deductions</th>
                        <th id="earn">Amount</th>
                        <tr>
                        <th>Tax 3%</th>
                        <td><input type="text" name="tax" id="input-paycheck" value="<?=$row["tax"]?>" readonly="readonly" required></td>
                        </tr>
                    
                        <tr>
                        <th>SSS 2%</th>
                        <td><input type="text" name="sss" id="input-paycheck" value="<?=$row["sss"]?>" readonly="readonly"required ></td> 
                        </tr>
                                    
                        <tr>
                        <th>Philhealth P50</th>
                        <td><input type="text" name="philhealth" id="input-paycheck" value="<?=$row["philhealth"]?>" readonly="readonly" required></td>                    
                        </tr>
                        </table>
                    </div> 
                    </div> 
                    <div class="total-pay">
                        <div class="t-earn">
                            <table>
                                <th>Total Earnings</th>
                                <td><input type="text" name="total_earn" id="input-paycheck" value="<?=$row["total_earn"]?>" readonly="readonly" required></td> 
                                </tr>
                                
                                </table>    
                        </div> 
                        <div class="t-deduct">
                            <table>
                                <th>Total Deductions</th>
                                <td><input type="text" name="total_deduct" id="input-paycheck" value="<?=$row["total_deduct"]?>" readonly="readonly" required></td> 
                                </tr>
                                
                                </table>    
                        </div> 
                    </div>
                     <div class="netpay">
                        <table>
                            <th>Netpay</th>
                            <td><input type="text" name="netpay" id="input-paycheck" value="<?=$row["netpay"]?>" readonly="readonly" required></td> 
                            </tr>
                           
                            </tr>
                            </table>    
                    </div>    
                          
                    </form>
                
                </div>
                </div>
            </div>
            </form>
        
            </div>
        </div>    

    </div>
    <div class="bg-container"></div>
</body>
</html>