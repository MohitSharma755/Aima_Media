<?php
session_start();
include("connection.php");
if (isset($_POST['logout'])) {
    unset($_SESSION['mobile']);
    echo 'logout';
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="custom.css">
    <link rel="stylesheet" href="id.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->
</head>

<body>

    <header>
       <div id="w33">
         <a href="#" id="text">About</a>
        <a href="#" id="text">Terms& Conditions</a>
        <a href="#" id="text">Contact us</a></div>
        <div  id="w33">
        <a href="" id="text"><i class="fa-brands fa-facebook-f"></i></a>
         <a href="" id="text"><i class="fa-brands fa-twitter"></i></a>
          <a href="" id="text"><i class="fa-brands fa-google-plus"></i></a>
         <a href="" id="text"><i class="fa-brands fa-youtube"></i></a>
         <a href="" id="text"><i class="fa-brands fa-instagram"></i></a>

        </div>
    </header>

    <div class="dj">
        <div id="w91">
            <h1 id='textc'>All India Media Association</h1>
            <h3 id='texts'>(Under Operating By AIMA<SPAN id="red">MEDIA</SPAN> Foundation)</h3>
        </div>
    </div>
    <div class="dj">
        <a href=""><img src="logo-aima12.png" alt="" id="img"></a>
    </div>
    <div class="shadow">
        <div class="djs" id="w90">
            <a href="index.php" id="navbar">HOME</a>
            <a href="about.php" id="navbar">ABOUT US</a>
            <a href="members.php" id="navbar">MEMBERS</a>
            <a href="comittee.php" id="navbar">COMMITTEE</a>
            <a href="join.php" id="navbar">JOIN US</a>
            <a href="login.php" id="navbar" class="btn">LOGIN</a>
            <a href="membership.php" id="navbar">MEMBERSHIP</a>
            <a href="profile.php" id="navbar">PROFILE STATUS</a>
            <a href="editprofile.php" id="navbar">EDIT PROFILE</a>
            <form method="post">
                <button name="logout" class="btn"><h3>LOGOUT</h3></button>
            </form>
        </div>
    </div>


</body>

</html>