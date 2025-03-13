



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="mydashboard.css">


</head>
<body>
    
<div class="wrapper">

    <div class="row">

        <div class="col-3">

    <aside id="sidebar" >


            <div class="sidebar-logo">
                IT Asset Register
            </div>

            <ul class="sidebar-nav" >

                <li class="sidebar-item " >
                    
                    <a href="assets_reg.php" class="reg" target="frame" > 
                    <i class="fa-solid fa-pen-to-square" style="color: navy;"></i>
                       <span>Asset Register</span> 
                    </a>
                </li>

                <li class="sidebar-item  nav-item mb-1">
                    <a href="#" 
                       class="sidebar-link collapsed" 
                       data-bs-toggle="collapse"
                       data-bs-target="#settings"
                       aria-expanded="false"
                       aria-controls="settings">
                        <i class="fas fa-cog pe-2"  style="color: navy;"></i>
                        <span class="topic">Settings </span>
                    </a>
                    <ul id="settings" 
                        class="sidebar-dropdown list-unstyled collapse" 
                        data-bs-parent="#sidebar">
          
                        <li class="sidebar-item">
                            <a href="profile.php" class="sidebar-link">
                                <i class="fas fa-user-plus pe-2" style="color: navy;"></i>
                                <span class="topic">Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="login.html" class="sidebar-link">
                                <i class="fas fa-sign-out-alt pe-2"  style="color: navy;"></i>
                                <span class="topic">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

 </div>
</aside>
</div>
</div>

<!-- navbar -->

<div class="col-9">

<nav class="navbar navbar-expand-lg fixed-left mynavbar">


    <button class="navbar-toggler button" type="button" data-bs-toggle="collapse" data-bs-target="#navbarnav" aria-controls="navbarnav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse " id="navbarnav">

        <ul class="navbar-nav mynav">
            <li class="nav-item"> <a class="navbar-link" href="sign up.php">Signup</a></li>
            <li class="nav-item"> <a class="navbar-link" href="profile.php">Profile</a></li>
        </ul>




      </div>

      
</nav>

<!-- main content -->
<main>
   
<div class="container-fluid">

<iframe  name="frame"   style="border:none; height: 90vh; width: 100%;"></iframe>
</div>
</main>



<footer>
    <p>&copy; 2025 IT Asset Register. All right reserved </p>
</footer>
</div>
</div>


















 <script src="https://kit.fontawesome.com/53a255a459.js" crossorigin="anonymous"></script> 
    <script src="bootstrap/bootstrap.min.js"></script>

</body>
</html>