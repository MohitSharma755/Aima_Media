<?php
include ("connection.php");
$aimaid = $_GET['aimaid'];
// echo $aimaid;
session_start();
if (isset ($_SESSION['mobile'])) {
    $commentuserid = $_SESSION['mobile'];
    // echo $mobilelogin;
} else {
    // $mobilelogin=$_SESSION['mobile'];
    // echo $mobilelogin;
    echo "";
    header("location: login.php");
}
;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment</title>
    <link rel="stylesheet" href="custom.css">
    <link rel="stylesheet" href="id.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="index.js"></script>
</head>

<body>

    <form action="" method="post">
        <input type="text" name="mobile" id="" value="<?php echo $commentuserid ?>" class="visibilty-hidden">

        <input type="text" placeholder="Comment here....." name="comment">
        <input type="text" name="aimapost" id="" value="<?php echo $aimaid ?>" class="visibilty-hidden">

        <input type="submit" value=" comment" name="commentbtn">
        <!-- <button type="submit" name="commentbtn">comment</button> -->
    </form>
</body>

</html>

<?php


if (isset ($_POST['commentbtn'])) {

    $userid = $_POST['mobile'];
    $comment = $_POST['comment'];
    $postid = $_POST['aimapost'];
    $commenttable = $conn->query("INSERT INTO `comment`( `commentuserid`, `comment`,`postid`)
    VALUES ('$userid','$comment','$postid')");
    
} else {
    echo "error";
}

