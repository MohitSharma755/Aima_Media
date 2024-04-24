<?php
include ("connection.php");
$aimagetid = $_GET['postid'];
echo $aimagetid;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="custom.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="index.js"></script>
    <link rel="stylesheet" href="id.css">
</head>

<body>
    <form action="" id="mt-10" method="post" class="dj">
        <table id="wh30">
            <tr>
                <td><label for="head">Headline</label></td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="headline" id="head">
                </td>
            </tr>
            <tr>
                <td><label for="thought">Thought</label></td>
            </tr>
            <tr>
                <td>
                    <textarea name="thought" id="" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="editpostbtn" id="" value="Edit Post"></td>
            </tr>
        </table>
    </form>
</body>

</html>
<?php

if (isset ($_POST['editpostbtn'])) {
    // echo 'im working';
    $headline = $_POST['headline'];
    $thought = $_POST['thought'];
    $data = $conn->query("UPDATE `post` SET `headline` ='$headline',`thought` ='$thought' WHERE `id`='$aimagetid'");
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    if ($data == true) {
        echo "<script>window.location.href='index.php'</script>";
    }
}
?>