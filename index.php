<?php
include ('header.php');
include ("connection.php");
// include("userdatbase.php");
if (isset($_SESSION['mobile'])) {
    $mobilelogin = $_SESSION['mobile'];
    $userdata = $conn->query("SELECT * FROM `userdata` WHERE mobile ='$mobilelogin'");
    if (mysqli_num_rows($userdata) > 0) {
        while ($result = mysqli_fetch_assoc($userdata)) {
            $userid = $result['id'];

            $profilephoto = $result['profilephoto'];


            // echo $userid;

        }
    }
    // echo $mobilelogin;   
} else {

    $profilephoto = "";

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./image/logo-aima12.png" type="image/x-icon">

    <title>AIMA |HOME</title>
    <link rel="stylesheet" href="custom.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="index.js"></script>
    <!-- <link rel="shortcut icon" href="./image/favicon.ico"> -->
</head>

<body>


    <div class="flex-width90">
        <div id="w50">
            <div id="mr5"><img src="./image/29852_self55729852.jpg" alt="" id="hw">
                <p>Indarpal Uttrakhand</p>
            </div>
        </div>
        <div id="w50">
            <div id="mr5">
                <img src="./image/_self615652.jpg" alt="" id="hw">
                <p>Rakesh Madhya Pradesh</p>
            </div>
        </div>
        <div id="w50">
            <div id="mr5"><img src="./image/_self911IMG_20240106_170849_604.jpg" alt="" id="hw">
                <p>Chetan Karnatak</p>
            </div>
        </div>
        <div id="w50">
            <div id="mr5"><img src="./image/_self759IMG_20210326_074929.jpg" alt="" id="hw">
                <p>Suman Jha Bihar</p>
            </div>
        </div>
           <div id="w50">
        <div id="mr5">
            <img src="./image/13334_self23313334.jpg" alt="" id="hw">
        </div>
            <p>Manindar Jharkhand</p>
        </div>
    </div>
    <div id='showpost'>

        <div id='posttext'>
            <?php
            if ($profilephoto != "") {
                echo "
                    <div id='imgcircle'>
                        <img src='./profileimage/$profilephoto' alt='image found' height='100%' width='100%'>
                    </div>
                    ";
            } else {
                echo "
                    <div id='imgcircle'>
                        <img src='' alt='no image found' height='100%' width='100%'>
                    </div>
                    ";
            }
            ?>

            <a href='post.php' id='width-90'>
                <input type='text' id='post' placeholder='Write Your thoughts here....'>
            </a>
            </div> 

            </div>




            <?php
            $userdata = $conn->query("SELECT * FROM `userdata`");
            if (mysqli_num_rows($userdata) > 0) {
                $data = $conn->query("SELECT * FROM `post`");
              
                if (mysqli_num_rows($data) > 0) {
                    $output = "";
                    while ($result = mysqli_fetch_assoc($data)) {
                        $postno = $result['mobilese'];
                        // echo $postno;
                        $postdeldata = $conn->query("SELECT * FROM `userdata` WHERE mobile='$postno'");
                        if (mysqli_num_rows($postdeldata) > 0) {
                            while ($postresult = mysqli_fetch_assoc($postdeldata)) {
                                // $output = "";
                                $userid = $postresult['id'];
                                $username = $postresult['name'];
                                $userphoto = $postresult['profilephoto'];
                                $userstate = $postresult['state'];
                                // echo $username . " and " . $userstate;
                                // echo $userid;
                            }
                        }
                      
                        $postid = $result['id'];
                        $category = $result['category'];
                        $headline = $result['headline'];
                        $thought = $result['thought'];
                        $image = $result['image'];
                        $video = $result['video'];
                        


                            $output .= "
                        
                        <div id='white' style='width: 95% !important;'>
                            <div class='flex'>
                                <div id='userimg'>
                                    
                                <a href='profile.php?userid=$userid'>
                                <img src='./profileimage/$userphoto' alt='image found' height='100%' width='100%'></a>
                                </div>
                                <small id='userinfo'>$username.$userstate AIMA<span id='red'>MEDIA</span> 11/02/2024 07:06
                                    PM</small>
                            </div>
                        
                            <div class='flex-end'>
                                <a href='fullpost.php?aimaid=$postid' id='fullpost'>
                                    <p>$headline.....</p>
                                </a>
                                
                    <div class='dropdown'>
                                <button class='dropbtn'>
                                 <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 16 16'>
                                       <path fill='currentColor'
                                           d='M2 8a1.5 1.5 0 1 1 3 0a1.5 1.5 0 0 1-3 0m4.5 0a1.5 1.5 0 1 1 3 0a1.5 1.5 0 0 1-3 0m6-1.5a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3' />
                                   </svg>
                            </button>
                               <div class='dropdown-content'>
                                   <a href='editprofile.php'>Edit Profile 1</a>
                                   <a href='editpost.php?postid=$postid'>Edit Post</a>
                                   <button onclick='deletepost($postid)'>Delete Post</button>
                               </div>
                    </div>
                        
                    </div>
                <div>
                <div id='imageandvideoboth'>
                <script>
               
                    $.post('fullindex.php',{
                        action:'showimageandvideo',
                           }, function(data)
                    {
                        alert(data);
                        $('#imageandvideoboth').html(data);
                    })
                </script>
            </div>
                  
                    </div>
                            <div id='white1'>
                                <div class='icon'>
                                    <p>
                                    <i class='fa-regular fa-eye' id='iconsection1'></i>
                                    </p>
                                <p> 
                                  <button onclick='index_comment()'>
                                 <i class='fa-regular fa-comment' id='iconsection'></i>
                            </button>
                            </p>
                           
                                    <p onclick='sharepage()'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24'>
                                            <path fill='currentColor'
                                                d='M15.991 1.035a4 4 0 1 1-.855 6.267l-6.28 3.626a4.007 4.007 0 0 1 0 2.144l6.28 3.626a4.002 4.002 0 0 1 6.32 4.803a4 4 0 0 1-7.32-3.07l-6.28-3.627a4.002 4.002 0 1 1 0-5.608l6.28-3.626a4.002 4.002 0 0 1 1.855-4.535ZM19.723 3.5a2 2 0 1 0-3.464 2a2 2 0 0 0 3.464-2ZM3.071 12.527a2.002 2.002 0 0 0 2.93 1.204a2 2 0 1 0-2.93-1.204Zm15.92 5.242a2 2 0 1 0-2 3.464a2 2 0 0 0 2-3.464Z' />
                                        </svg>
                                        </p>                        
                                </div>
                         </div>
                         </div>
    ";
                        }
                        $output .= "</div>";
                        echo $output;

                    }
                }
            


            ?>



</body>

</html>
<?php
include ('mainfooter.php')
    ?>