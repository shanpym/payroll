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
    <link rel="stylesheet" href="payslip1.css">
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
                <li><a href="#payslip" id="employees" class="active"><i class="fa fa-money" style="font-size:16px"></i> Payslip</a></li>
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
                <table>
                
                      <tr>
                        <th id="refno">Reference No.</th>
                        <th id="dtpaid">Date Paid</th>
                        <th id="dtact">Action</th>
                        </tr>
                        <?php
                $id_number = $_SESSION['id_number'];
                $sql = "SELECT * from companyrecords WHERE id_number = {$_SESSION['id_number']}";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    //Output Data of Each Row
                    while($row = $result->fetch_assoc()){
                ?>
                        <tr>
                                        <td><?=$row["reference_no"]?></td>
                                        <td id="d-date"><?=$row["date_paid"]?></td>             
                                        <td>
                                        <a href="payslipview.php?reference_no=<?=$row["reference_no"]?>">View</a>
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