<?php 
include("connection.php");
$action=$_POST['action'];

if($action=="deletepost"){
    $postid=$_POST['postid'];
    $data=$conn->query("DELETE FROM post WHERE id='$postid'");
    if($data){
        echo 1;
    }
    else {
        echo 0;
    }
}
if($action=="comment"){
    // $data=$conn->query("SELECT FROM userdata WHERE id='$userid'");
    
    $userid = $_POST['userid'];
    echo $userid;
    $data2 = $conn->query("INSERT INTO `comment`(`commentuserid`, `comment`, `postid`)
     VALUES ('[$userid]','[$comment]','[$postid]')");
}

?>