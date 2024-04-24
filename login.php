<?php
include ("header.php");
include ("connection.php");
$data = $conn->query("SELECT * FROM userdata");
if (mysqli_num_rows($data) > 0) {
    while ($result = mysqli_fetch_assoc($data)) {
        $phone = $result['mobile'];
        $pass = $result['password'];
        echo $phone . " and " . $pass . "<br>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIMA Login</title>
    <link rel="stylesheet" href="id.css">
    <link rel="stylesheet" href="custom.css">

</head>

<body>


    <div class="dj">
        <p class="login">Login Here</p>
    </div>

    <form method="post" style="width:100%;">
        <div class="dja">
            <table id="p-left-right20px">

                <tr>
                    <td><b>Enter User ID (Mobile No.)</b></td>

                </tr>
                <tr>
                    <td><input type="tel" name="phone"></td>
                </tr>
                <tr>
                    <td><b>Enter Password</b></td>

                </tr>
                <tr>
                    <td><input type="password" name="pasword"></td>
                </tr>

                <td id="loginbtn">
                    <button type="submit" value="Login" id="loginbtn" name="login" class="btn"> Login</button>
                </td>

                <tr>
                    <td class="center">OR</td>

                </tr>

                <tr>
                    <td id="loginbtn">
                        <button type="" id="loginbtn" name="" class="btn"style="display:block !important; width: 100% !important;">Login With Mobile Number</button>
                    </td>
                </tr>

                <tr>
                    <td id="forgtbtn">
                        <a href="updatepassword.php" id="forgetbtn">Forget Password</a></td>
                </tr>
                <tr>
                    <td class="center">OR</td>
                </tr>
                <tr>
                    <td id="forgtbtn">
                        <a href="join.php" id="forgetbtn">New User Signup</a></td>
                </tr>
            </table>
        </div>

    </form>
    <?php
    if (isset ($_POST['login'])) {
        $userid = $_POST['phone'];
        $password = $_POST['pasword'];
        $data2 = $conn->query("SELECT * FROM userdata WHERE mobile='$userid' AND password='$password'");
        if (mysqli_num_rows($data2) > 0) {
            echo "welcome website";
            $_SESSION['mobile'] = $userid;
            // header("location:index.php");
            echo "<script>window.location.href='index.php'</script>";
        } else {
            echo "error";
        }
    }
    ?>

</body>

</html>