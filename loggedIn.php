<?php session_start();
//print_r($_SESSION);
require_once 'dbconn.php';
require_once 'functions.php';
    $uname = $_SESSION['name'];
    $sql="SELECT * FROM details WHERE usname='$uname';";
    $retval= mysqli_query($conn,$sql);
    
    if($_SESSION['name']=='admin' && $_SESSION['p']=='admin123'){
        header("Location: admin.php"); // redirects logged user to their homepage
        exit;
    }
    
    if(mysqli_num_rows($retval) > 0){
        $_SESSION['existview'] = 'existview';
    }
    
    if(isset($_GET['login'])){
        sD();
        header("Location: index.php"); // redirects them to homepage
        exit;
    }
    
    if(!isset($_SESSION['name'])) {
        header("Location: index.php"); // redirects them to homepage
        exit; 
    }
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

    <nav class="navbar navbar-expand-md bg-warning navbar-light py-3">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="BDS_Logo.png" alt="" width="60" height="60">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="nav navbar-nav mx-auto">
                    <li class="nav-item"> <h1 style="font-family: monospace;" class="text-dark text-center">BIO - DATA SYSTEM</h1> </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav item">
                        <a id="login" href="loggedin.php?login=out" class="nav-link"><strong>Logout</strong></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Showcase -->
    <section class="bg-warning text-secondary p-5 texr-center">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <div>
                    <h2>
                        Welcome To <br> <span class="text-dark h1">
                            BIO - DATA SYSTEM
                        </span>
                    </h2>
                    <br>
                    <h3>
                        To Add BioData :
                        <p class="lead text-dark">
                            1. Go to <a href="addBD.php" class="text-dark">Add BD</a> <br>
                            2. Fill Your Details
                        </p>
                    </h3>
                    <h3>
                        To View BioData :
                        <!-- / Edit : -->
                        <p class="lead text-dark">
                            1. Go to <a href="viewBD.php" class="text-dark">View BD</a> <br>
                            2. View Your BioData <br>
                            <!-- 3. To Edit -> Go to Edit -->
                        </p>
                    </h3>
                    <h3>
                        To Edit BioData :
                        <!-- / Edit : -->
                        <p class="lead text-dark">
                            1. Go to <a href="editBD.php" class="text-dark">Edit BD</a> <br>
                            2. Edit Your BioData <br>
                            <!-- 3. To Edit -> Go to Edit -->
                        </p>
                    </h3>
                </div>
                <img class="image-fluid w-50 d-none d-sm-block mb-5" src="undraw_add_information_j2wg.svg" alt="">
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

    <hr>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>