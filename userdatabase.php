<?php
include ('connection.php');
// if (isset($_SESSION['mobile'])) {
//     $usermobile = $_SESSION['mobile'];
$postid =$_GET['userid'];
    $user = $conn->query("SELECT * FROM userdata WHERE postid='$postid'");
    if (mysqli_num_rows($user) > 0) {
        while ($userdata = mysqli_fetch_assoc($user)) {
            $userid = $userdata['id'];
            $userphoto = $userdata['profilephoto'];
            $username = $userdata['name'];
            $userstate = $userdata['state'];
        }

    }

    // echo $usermobile;
    // echo $userid;
// }
 else {
    $usermobile;
    echo "";
}


?>