<?php
   include ("dbconnection.php");
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCST Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    
    <script src="javascript.js"></script>
</head>
<body>
    <div class="login-container">
    <div id="digital-clock">Date / Time</div>
        <div class="login-box">
            <div class="login-title">           
                <p>CCST LOGIN</p>
            </div>
            <?php 
                    if(isset($_GET['error'])){ ?>
                       <h2 class="error"><?php echo $_GET['error']; ?></h2>
                    <?php }?>

            <div class="login-form">
                <form action="authenticate.php" method="post">               
                <i class="ph ph-identification-card"></i>
                <input type="text" name="id_number" id="" placeholder="ID Number" required><br>
                <i class="ph ph-lock-simple-open"></i><input type="password" name="password" id="myInput" placeholder="Password"  required>
                    <div class="forgot-submit">
                        <input type="checkbox" onclick="myFunction()"> Show Password
                        <input type="submit" name="login" value="LOGIN">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="bg-container"></div>
</body>
</html>