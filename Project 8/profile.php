<?php

include("connection.php");


if (isset($_GET['email'])) {
    $email = $_GET['email'];

 
    $sql = "SELECT username, passwords, email FROM user_reg WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['username'];
        $password = $row['passwords'];
    } else {
        $name = "Not Found";
        $password = "Not Found";
        $email = "Not Found";
    }
} else {
    $name = "";
    $email = "";
    $password = "";
}

?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">

    <style>

        body{

            justify-content: center;
            background-color: rgb(241, 251, 255);
        }
        .card{
        
           height: 70vh;

           width: 40%;
           justify-content: center;
           align-items: center;
           margin-top: -20px;
        }

        .header{
            text-align: center;
        }

.header p{
    font-size: 40px;
    margin-top: 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
   color: brown;
   font-weight: 700;
        }

        
  
        
    .profile-container { max-width: 500px; margin: auto; margin-top: 50px; }
    
    .card { background-color: rgb(232, 249, 255); padding: 20px; border-radius: 10px; }
    
    .form-control {
            border: 2px solid #ccc;
            border-radius: 5px;
            padding: 8px;
            font-size: 16px;
            width: 100%;
            background-color: white;
            font-weight: 500;

        }
        .form-label { 
            font-weight: bold;
             font-size: 16px; 
             color: brown; }


        .back-btn {
            margin-top: 15px;
            background-color: brown;
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            display: block;
            text-align: center;
        }
  

        .user-info{
            line-height: 50px;
            margin-right: 60px;
            padding-top: 10px;
            
        }
        .user-info span{
            font-size: 20px;
            font-weight: 600;
            padding-right: 40px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

       .back{
    
        background-color: brown;
 
        padding-left: 60px;
        padding-right: 60px;
        
       }
       .back a{
        text-decoration: none;
        color: white;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        font-size: larger;
       }
       .back:hover{
        background-color:black;
       }

    </style>
</head>
<body>

    <div class="header"> <p>User Profile</p></div>
    <div class="container-fluid  d-flex justify-content-center align-items-center min-vh-100">
 
    <div class="card mt-4" style="background-color: rgb(232, 249, 255);">
       
        <div class="card-body">
            <div class="row">
                <!-- <div class="col-md-6">
                    <img src="image/user profile.jpg" alt="user" width="130px">


                </div> -->
            </div>

                <div class="row mt-9 user-info" >
                <div class="col-sm-12 col-md-12 ">

                    <div class="">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" value="<?php echo htmlspecialchars($name);?>" readonly>
                    </div>
        
                    <div class="">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" value="<?php echo htmlspecialchars($email); ?>" readonly>
                    </div>
        
                    <div class="">
                        <label class="form-label">Password</label>
                        <input type="text" class="form-control" value="<?php echo htmlspecialchars($password); ?>" readonly>
                    </div>
        

                   

                   

                </div>
              
            </div]
            '>

            <button class="btn border rounded-3 button mt-5 back">
                <i class="fa-solid fa-arrow-left" style="color: white; padding-right: 5px;"></i>
                <a href="mydashboard.php">Back</a></button>
        </div>
        </div>

    </div>
    <script src="https://kit.fontawesome.com/53a255a459.js" crossorigin="anonymous"></script>
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
</body>
</html>