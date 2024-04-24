<?php
include("connection.php");
// include("userdatabase.php");
 
session_start();
if (isset($_SESSION['mobile'])) {
    $usermobile = $_SESSION['mobile'];
    // echo $mobilelogin;
    $user =$conn->query("SELECT * FROM userdata WHERE mobile ='$usermobile'");
if(mysqli_num_rows($user)>0){
    while($userdata =mysqli_fetch_assoc($user)){
        $userid =$userdata['id'];
        $userphoto =$userdata['profilephoto'];
        $username =$userdata['name'];
        $userstate =$userdata['state'];
    }

}
} else {
    // $mobilelogin=$_SESSION['mobile'];
    // echo $mobilelogin;
    echo "";
    header("location: login.php");
};
 

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="custom.css">
    <link rel="stylesheet" href="id.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Create Your post</title>
</head>

<body style="background-color: #ffff;">
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="mobile" id=" visibilty-hidden" value="<?php echo $usermobile?>">
        <input type="text" name="userid" id="" value="<?php echo $userid?>">
        <div class="w50">
            <div class="post-section">

                <div class="post-section2">
                    <a href="index.php" id="arow">
                        <i class="fa-solid fa-arrow-left"></i></a>
                    <p id="create"> Create Post</p>
                </div>
                <input type="submit" value="POST" class="postbtn" name="postbtn">
            </div>
            <div class="username">
                <div id="imguser"><img src="./image/noimage.jpg" alt="" height="100%" width="100%">
                </div>
                <p id="username">Gaurav Sharma ,Meerut</p>
            </div>
            <div>
                <div class="flex-margin">
                    <div id="radio"> <input type="radio" value="news" name="news">
                        <p id="arrow">News</p>
                    </div>
                    <div id="radio"> <input type="radio" value="entertain" name="news">
                        <p id="arrow">Entertain</p>
                    </div>
                    <div id="radio"> <input type="radio" value="sport" name="news">
                        <p id="arrow">Sport</p>
                    </div>
                    <div id="radio"> <input type="radio" value="health" name="news">
                        <p id="arrow">Health</p>
                    </div>
                </div>
                <div class="flex-margin">
                    <div id="radio"> <input type="radio" value="problem" name="news">
                        <p id="arrow">Problem</p>
                    </div>
                    <div id="radio"> <input type="radio" value="spritual" name="news">
                        <p id="arrow">Spritual</p>
                    </div>
                    <div id="radio"> <input type="radio" value="art" name="news">
                        <p id="arrow">Art</p>
                    </div>

                </div>
            </div>
            <div class="headline">
                <textarea cols="30" rows="10" placeholder="Headline Maximum 150 Characters" name="headline" id="head" onkeyup="counter(this.value)"></textarea>

            </div>
            <div class="headline">
                <textarea cols="30" rows="10" placeholder="Type your post" id="postuser" name="post"></textarea>

            </div>
            <div>
                <div id="border"></div>
                <div class="headline">
                    <label for="image">
                        <div class="username"> <i class="fa-solid fa-image"></i>
                            <p id="arrow"> Photo</p>
                        </div>
                        <input type="file" name="photo" id="image" style="display: none; cursor:pointer !important;">
                        <small>Only 5 photos</small>
                    </label>
                </div>
                <div class="headline">
                    <label for="video">
                    <div class="username"> <i class="fa-solid fa-video"></i>
                        <p id="arrow"> Video</p>
                    </div>
                    <small>Max size 10 MB</small>
                    <input type="file" name="video" id="video" style="display: none; cursor:pointer !important;">
                </label>
                </div>
            </div>

        </div>
    </form>
    </body>
</html>
<?php
    if (isset($_POST['postbtn'])){
        $seassionid =$_POST['mobile'];
        $userid =$_POST['userid'];
        // echo $userid;
        $category = $_POST['news'];
        $headline = $_POST['headline'];
        $post = $_POST['post'];
        $imagename = $_FILES['photo']['name'];
        $tempname = $_FILES['photo']['tmp_name'];
        echo $imagename . " this is temp name " . $tempname;
        $address = './img/'.$imagename;
        if ($imagename) {
            move_uploaded_file($tempname , $address);
            echo "imageupload";
        }
        else{
            echo "code error";
        }
        $video= $_FILES['video']['name'];
        $videopath= $_FILES['video']['tmp_name'];
        echo  $video." this is video name".$videopath;
        $videoaddress ='./img/'.$video;
        if($video){
            move_uploaded_file($videopath, $videoaddress);
            echo "video upload";
        }
        else{
            echo "Error....";
        }
       
        // if($headline['bits']>150){
        //     echo $headline;
        // }
        // else{
        //     echo"error";
        // }
        // $imageext = explode(".", $imagename);
        //  $imagesize = getimagesize($_FILES['uploadimg1']['tmp_name']);
        // if ($imagesize['bits'] > 3145728) {
            //  echo "Size is exceeded , Please add image with less than 3MB";
        // } else {
            // $ext = array("jpg", "webp", "jpeg", "gif", "png");
            // if (in_array($imageext[1], $ext)) {
                //  echo "image uploaded";
            // } else {
                //  $imagename = "";
                //  echo "No extention found";
            //  }
        //  }
        echo "<pre>";
            print_r($_POST);
            echo "</pre>";

            $data=$conn->query("INSERT INTO `post`(`mobilese`,`userid`,`category`, `headline`, `thought`, `image`, `video`) VALUES 
            ('$seassionid','$userid','$category','$headline','$post','$imagename','$video')");
             if($data==true){
                header("location:index.php");
                echo "<script>window.location.href='index.php'</script>";
            }
            else{
                echo "Bad";
            } 

    }
    
    ?>
    <script>
    function counter(x){
        // var x =document.getElementById("head").value;
        console.log (x);
        // alert(x);
        if(x.length<=5){
            
            // console.log("keep on");
        }
        else{
            // alert ('Maximum limit reached');
            // document.getElementById('head').value=5;
        document.getElementById("head").value=x.slice(0,150);
        }


    }


    </script>