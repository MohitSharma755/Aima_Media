<?php
include('connection.php');
if (isset($_SESSION['mobile'])) {
    $mobilelogin = $_SESSION['mobile'];
    $userdata = $conn->query("SELECT * FROM `userdata` WHERE mobile ='$mobilelogin'");
    if (mysqli_num_rows($userdata) > 0) {
        while ($result = mysqli_fetch_assoc($userdata)) {
            $profilephoto = $result['profilephoto'];
            // echo $username." and ".$userstate;
        }
    }
    echo $mobilelogin;
}
else{
    // $mobilelogin = $_SESSION['mobile'];
  
     $profilephoto ='';
    //  header("location: login.php");  
}




?>