<?php
    include("connection.php");

    $action=$_POST['action'];
    if($action == "showcomment"){
        $postid = $_POST['psid'];
        $data=$conn->query("SELECT * FROM comment WHERE postid='$postid'");
        $output="";
        if(mysqli_num_rows($data) > 0){
            while ($result= mysqli_fetch_assoc($data)) {
                $comment = $result['comment'];
                $output.="
                    <div>$comment</div>
                ";
            }
            $output.="";
            echo $output;
        }
    }



?>