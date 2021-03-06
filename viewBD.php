<?php 
    session_start();
   
    if(!isset($_SESSION['view']) && !isset($_SESSION['existview'])){
        echo '<script> alert("Add details to view");  window.location.replace("addBD.php");</script>';
    }
    require_once 'functions.php';
    if(isset($_GET['sd'])){
        sD();
        header("Location: index.php"); // redirects them to homepage
        exit;
    }
    if($_SESSION['name']=='admin' && $_SESSION['p']=='admin123'){
        header("Location: admin.php"); // redirects logged user to their homepage
        exit;
    }
    if(!isset($_SESSION['name'])) {
        header("Location: index.php"); // redirects them to homepage
        exit; 
    }
    $uname = $_SESSION['name'];
    require_once 'dbconn.php';

    $sql="SELECT * FROM details WHERE usname='$uname';";
    $retval= mysqli_query($conn,$sql);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Bio-Data System</title>
    <link rel="icon" href="BDS_Title.png" type="image/icon type">
</head>
<body>
   
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-warning navbar-light py-3">
        <div class="container">
            <a href="loggedin.php" class="navbar-brand">
                <img src="BDS_Logo.png" alt="" width="60" height="60">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navmenu">
                <ul class="nav navbar-nav mx-auto">
                    <li class="nav-item"> <h1 style="font-family: monospace;" class="text-dark text-center">BIO - DATA SYSTEM</h1> </li>
                </ul>
                <ul class="navbar-nav">
                    <!--<li class="nav item">
                        <a href="addBD.php" class="nav-link">Add Bio-Data</a>
                    </li>
                     <li class="nav item">
                        <a href="editBD.html" class="nav-link">Edit Bio-Data</a>
                    </li> -->
                    <li class="nav item">
                        <a href="viewBD.php?sd=yes" class="nav-link" ><strong>Logout</strong></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Body -->
    <section class="bg-dark p-4 pt-5 text-dark">
        <div class="px-5 mb-3">
            <h2 class="text-center text-secondary">
                Your <span class="text-white">Bio-Data</span>
            </h2> <br>
            <div class="bg-secondary p-3">
                <div class="bg-light p-3">
                    <div class="text-center pt-4">
                        <img class="viewLogo" src="BDS_Title.png" alt="" width="90">
                        <h1 class="viewText pt-3"> BIO DATA </h1>
                    </div>
                    <div class="row">
                        <div class="justify-content-between p-3"> 
                            <div class="text-center align-items-center viewFontSize"> <br>
                                <img class="viewStudent mb-3 image-fluid" src="BDS_Title.png" alt="" width="200">
                                <?php
                                    if(mysqli_num_rows($retval) > 0){
                                    $row = mysqli_fetch_assoc($retval);
                                            echo "<p class='px-4'> First Name : {$row['name']}</p>";
                                            echo "<p class='px-4'> Date Of Birth : {$row['dob']}</p>";
                                            echo "<p class='px-4'> Age : {$row['age']}</p>";
                                            echo "<p class='px-4'> Gender : {$row['gender']}</p>";
                                            echo "<p class='px-4'> Height (in cm) : {$row['height']}</p>";
                                            echo "<p class='px-4'> Weight (in kg) : {$row['weight']}</p>";
                                            echo "<p class='px-4'> Address : {$row['addr']}</p>";
                                            echo "<p class='px-4'> Mother Tongue : {$row['mt']}</p>";
                                            echo "<p class='px-4'> Languages Known : {$row['lk']}</p>";
                                            echo "<p class='px-4'> Fathers' Name : {$row['faname']}</p>";
                                            echo "<p class='px-4'> Mothers' Name : {$row['moname']}</p>";
                                            echo "<p class='px-4'> Fathers' Occupation : {$row['fo']}</p>";
                                            echo "<p class='px-4'> Mothers' Occupation : {$row['mo']}</p>";
                                        
                                    }
                                    /*else{
                                        echo '<script> alert("Add details to view");  window.location.replace("addBD.php");</script>';
                                    }*/
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <hr>

    <!-- Footer -->
    <footer class="p-5 bg-dark text-center text-light">
        <div class="container">
            <p class="lead">
                Copyright @ 2021 Bio-Data System
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>