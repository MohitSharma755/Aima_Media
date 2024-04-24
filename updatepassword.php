<?php
session_start();
if(isset($_SESSION['mobile'])){
    $aimaloginid= $_SESSION['mobile'];
}


include ("connection.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="custom.css">
    <link rel="stylesheet" href="id.css">
    <!-- <script href="index.js"></script> -->
</head>

<body>
    <form action="" method="post" class="dj" id="mt-10">
        <table id="w50">
            <tr>

                <td><label for="id"><b>Enter Your User ID</b></label></td>

            </tr>
            <tr>
                <td>
                    <input type="number" name="userid" id="id" placeholder="Please Enter Your User ID">
                </td>
            </tr>
            <tr>
                <td><label for="id"><b>Enter Your Password</b></label></td>
            </tr>
            <tr>
                <td>
                    <input type="number" name="password" id="id" placeholder="Please Enter Your   Password">
                </td>
            </tr>
            <td><button name="changebtn">Change Your Password</button</td>
        </table>
    </form>
</body>

</html>
<?php
if(isset($_POST['changebtn'])){
    // echo "i m working";
    $userid = $_POST['userid'];
    $password =$_POST['password'];
    $data= $conn->query("UPDATE `userdata` SET  `password` ='$password' WHERE `mobile`=$userid ");
}
else{
    // echo "Error";
}
if($data==true){
    echo "<script>window.location.href='login.php'</script>";
    // echo "<script>window.location.href='index.php'</script>";
}
else{
    echo "error...";
}
?>