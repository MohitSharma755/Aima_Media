<?php
// session_start();
include ("header.php");
include ("connection.php");
if (isset ($_SESSION['mobile'])) {
    $mobilelogin = $_SESSION['mobile'];
    $userdata = $conn->query("SELECT * FROM `userdata` WHERE mobile ='$mobilelogin'");
    if (mysqli_num_rows($userdata) > 0) {
        while ($result = mysqli_fetch_assoc($userdata)) {
        //   $userid =$result['id'];
        
            $profilephoto = $result['profilephoto'];

          
            // echo $userid;
           
        }
    }
    // echo $mobilelogin;   
} else {
  
    $profilephoto = "";
 
}
 

$aimagetid = $_GET['aimaid'];

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fullpost</title>
    <script src="index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <body>
    <div id="postid"><?=$aimagetid?></div>
    <?php
   
     
        $data2 = $conn->query(" SELECT * FROM `post` WHERE id='$aimagetid'");
        $total = mysqli_num_rows($data2);
        if ($total > 0) {
            $output1 = "";
            $resudata = mysqli_fetch_assoc($data2);
            $userid =$resudata['userid'];
            $headline = $resudata['headline'];
            $thought = $resudata['thought'];
            $image = $resudata['image'];
            $video = $resudata['video'];
    //   echo $userid;
            $userdata = $conn->query("SELECT * FROM `userdata` WHERE id='$userid'");
            if (mysqli_num_rows($userdata)>0) {
                
                $profile = mysqli_fetch_assoc($userdata);
                $username = $profile['name'];
                $userphoto = $profile['profilephoto'];
                $output = "";
            $output .= " 
            <div>
        <div id='fullpostimg'>
            <div class='flex'>
                <div id='userimg'>
                    <img src='./profileimage/$userphoto' alt='image found' height='100%' width='100%'>
                </div>
                <div  id='fullpostuser'>
                    <div>$username AIMA<span id='red'>MEDIA</span> </div>
                    <small>11/02/2024 07:06 PM</small>
                </div>
            </div>
        </div>
        <div class='margin  mr-20' id='w70'>
            <div id='w90'>
            <h1 style='color:red'> $headline</h1>
            <div> $thought</div>
            <div id='imageandvideo'>
                <script>
                    var postid=document.getElementById('postid').innerText;
                    // alert(postid);
                    $.post('postimageandvideo.php',{
                        action:'showpostandimage',
                        postid:postid
                    }, function(data){
                        $('#imageandvideo').html(data);
                    })
                </script>
            </div>
         
   " ?>;
            <?php
            $output.="
 
   
            <div class='icon'>
                    <p><i class='fa-regular fa-eye' id='iconsection1'></i></p>
                    <a href='comment.php'>
                    <i class='fa-regular fa-comment' id='iconsection'></i>
                    </a>
                    <p onclick='sharepage()'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24'>
                    <path fill='currentColor' d='M15.991 1.035a4 4 0 1 1-.855 6.267l-6.28 3.626a4.007 4.007 0 0 1 0 2.144l6.28 3.626a4.002 4.002 0 0 1 6.32 4.803a4 4 0 0 1-7.32-3.07l-6.28-3.627a4.002 4.002 0 1 1 0-5.608l6.28-3.626a4.002 4.002 0 0 1 1.855-4.535ZM19.723 3.5a2 2 0 1 0-3.464 2a2 2 0 0 0 3.464-2ZM3.071 12.527a2.002 2.002 0 0 0 2.93 1.204a2 2 0 1 0-2.93-1.204Zm15.92 5.242a2 2 0 1 0-2 3.464a2 2 0 0 0 2-3.464Z'/>
                </svg></p>

            </div>
        </div>
        </div>
";
            $output .= "</div>";
            echo $output;

        }

    }

    ?>
            
    <div>
        <div>
            <div id='commentpost'>

                <div id='commentse'>
                    <?php
                    if ($profilephoto != "") {
                        echo "
            <div id='commemntimg' class='margin'>
                <img src='./profileimage/$profilephoto' alt='image found' height='100%' width='100%'>
            </div>
            ";
                    } else {
                        echo "
    <div id='imgcircle' class='margin'>
        <img src='' alt='no image found' height='100%' width='100%'>
    </div>
    ";
                    }
                    ?>
                    <!-- #region -->
                    <form action="" method="post">
                        <input type="text" name="mobilee" id="" value="<?php echo $mobilelogin ?>"
                            class="visibilty-hidden">
                        <input type="text" name="aimapost" id="" value="<?php echo $aimagetid ?>"
                            class="visibilty-hidden">
                        <input type='text' id='post' placeholder='Comments here....' name="comment" onclick="alertt()">
                        <button class="margin " name="commentbtn" onclick="alertt()">Comment</button>
                    </form>
                </div>
                <input type="text" name="" id="psid" class="visibilty-hidden" value="<?php echo $aimagetid ?>">
                <input type="text" name="" id="usid" class="visibilty-hidden" value="<?php echo $mobilelogin ?>">
                <div id="showcommentpart"></div>
                <script>
                    var postid = $("#psid").val();
                    var userid = $("#usid").val();
                    alert(postid + " and " + userid);
                    $.post("showcomment.php", {
                        action: "showcomment",
                        psid: postid,
                        usid: userid
                    }, function (data) {
                        // alert(data);
                        $("#showcommentpart").html(data);
                    })
                </script>
            </div>
        </div>

    </div>

    <?php
    if (!isset($_SESSION['mobile'])) {

        // header('location:login.php');
        die();
    }
    if (isset($_POST['commentbtn'])) {

        $userid = $_POST['mobilee'];
        $comment = $_POST['comment'];
        $postid = $_POST['aimapost'];
        $commenttable = $conn->query("INSERT INTO `comment`( `commentuserid`, `comment`,`postid`)
    VALUES ('$userid','$comment','$postid')");

        // echo "<pre>";
// print_r($_POST);
// echo "</pre>";
    } else {
        // echo "error";
    }

    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</html>
