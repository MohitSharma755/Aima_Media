<?php
include("connection.php");
$action=$_POST['action'];
if($action=='showimageandvideo'){
    // echo("I m working");
    $data2 = $conn->query ("SELECT * FROM `post`  ");
    $total = mysqli_num_rows($data2);
        $output= "";
    if ($total > 0) {
       $resudata = mysqli_fetch_assoc($data2);
        $image = $resudata['image'];
        $video = $resudata['video'];
        if ($image) {
            $output.="  <img src='./img/$image'  height='100%' width='100%'> ";
        } else {
            $output.= " ";
        }
        if ($video) {
            $output.= " <video controls width = '500px'height='500px'  >
                <source  src='./img/$video' type='video/mp4'></video>
            </video>";
        } else {
            $output.= " ";
        }
        
     }

    echo $output; 
   
 
}


?>