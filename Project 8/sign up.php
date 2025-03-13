<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['fullname'];
    $pass = $_POST['password'];
    $email = $_POST['email'];

    if (empty($name) || empty($pass) || empty($email)) {
        $error_message = "Please fill in all the fields.";
    } else {
  
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user_reg (username, passwords, email) VALUES (?, ?, ?)";

  
        $res = $conn->prepare($sql);
        $res->bind_param("sss", $name, $hashed_pass, $email);

       
        if ($res->execute()) {
            $message = "<p class='success-message'>Registration successful!</p>";
        } else {
            $message = "<p class='error-message'>Error: " . $conn->error . "</p>";
        }
    }
}



?>






















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="signup.css">

    
</head>
<body>
    

    <div class="headers"><p>Welcome To CityCot University</p></div>
   <div class="container d-flex justify-content-center align-items-center min-vh-100">


 

<div class="row border rounded-4 p-3 m bg-white shadow box">

<!-- image box -->

<div class="col-sm-12 col-md-6 col-lg-6 left-box d-flex rounded-4 justify-content-center align-items-center flex-column " style="background-color: rgb(217,234,253);">
    <div class="featured-image">
        <img src="image/undraw_welcome-cats_tw36.svg" alt="image" class="image-fluid image" width="250px">
    </div> 
    </div>
<?php
    if(!empty($message)) 
echo $message;
?>
        <!-- form box -->

<div class="col-sm-12 col-md-6 col-lg-6 align-items-center right-box " >

   <div class="row align-items-center">
        <div class="header mb-4 ">
           <p style="text-align: center; color:brown;" >Welcome Sign Up</p>

           
        </div>
        <form action="" method="post">

        <div class="input-group  username">
            <label for="user" >Full Name </label> 
            <input type="text" name="fullname" class="form-control" placeholder="Enter Username" required>
        </div>

        <div class="input-group  email">
            <label for="email" >Email</label> 
            <input type="email" name="email" class="form-control" placeholder="Example@gmail.com" required>
        </div>


        <div class="input-group  password">
            <label for="password">Password</label>
            <input type="text" name="password" class="form-control" placeholder="Enter Password" required>
        </div>

       


       
    </div>

    <div class="signup" style="text-align: center;">
        <button type="submit" class="btn border rounded-3 button " style="align-items: center; "> <a href="mydashboard.php" > Sign Up</a></button>
    </div>

    <div class="OR">Or</div>

    <div class="icons">
<img src="image/icons8-google (1).svg" alt="">
<img src="image/icons8-facebook-logo.svg" alt="">
    </div>

    <div class="login">Already have an account? <a href="login.html">log in</a></div>
</div>



</form>


   </div>
    </div>

   

   <script src="bootstrap/bootstrap.min.js"></script>
</body>
</html>