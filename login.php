<?php
   include('dbconnection.php');
   if(isset($_POST['btn_login'])) {
       
   
   
       $email = $_POST['email'];
       $password = $_POST['password'];

       $sql = "select * from Register where email='$email' AND password='$password'";

       $query = mysqli_query($conn,$sql);
   
       if ($query->num_rows !=0){
          
       echo "<script>alert('data inserted sucessfully')</script>";
           header('location:orders.php');
       } else {
           echo "<script>alert('Invalid Credential Please Check Email and Password')</script>";
   
       }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-wrapper">
        <div class="login-container">
            <div class="logo">
                <img src="image/logo.jpg" alt="Online Book Store Logo" class="logo-img" style = "height: 50px; weight: 50px; align-item=center">
            </div>
            <h2>Welcome Back!</h2>
            <p></p>
            <form action="login.php" method="POST">
                <div class="input-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email">
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Enter your password">
                </div>
                <div class="forgot-password">
                    <a href="reset-password.html">Forgot Password?</a>
                </div>
                <button type="submit" class="btn btn-success" name="btn_login">Login</button>
                <div class="signup-link">
                    Don't have an account? <a href="signup.php">Signup now</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>