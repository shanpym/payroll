<?php

include("../dbconnection.php");

session_start();
    if (!isset($_SESSION['user'])) {
    header("Location: login.php"); // Redirect to the login page
    exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Page</title>
    <link rel="stylesheet" href="page2.css">
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
                <li><a href="#page1" id="dashboard" class="active"><i class="fa fa-vcard-o" style="font-size:16px"></i> View Profile</a></li>
                <li><a href="payslip.php" id="employees"><i class="fa fa-money" style="font-size:16px"></i> Payslip</a></li>
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
                    <h1>User's Profile</h1>               
                </div> 
                <div class="divider"></div>
            </div>
            <table> 
                <?php
                $id_number = $_SESSION['id_number'];
                $sql = "SELECT * from employeedata WHERE id_number = {$_SESSION['id_number']}";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    //Output Data of Each Row
                    while($row = $result->fetch_assoc()){
                ?>
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
                 <?php               
            }

          }
         

          ?>
        </div>    

    </div>
    <div class="bg-container"></div>
</body>
</html>