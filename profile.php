<?php
include ("header.php");
include ("connection.php");

$userid = $_GET["userid"];
// echo "This is ".$postid;
// SELECT `id`, `mobilese`, `category`, `headline`, `thought`, `image`, `video` FROM `post` WHERE 1
// session_start();
// $user = $conn->query("SELECT * FROM userdata WHERE id='$postid'");
// if (mysqli_num_rows($user) > 0) {
//     while ($userdata = mysqli_fetch_assoc($user)) {
//         $userid = $userdata['id'];
//         echo $userid;
//     }
// }
// if (!isset($_SESSION['mobile'])) {
//     // $usermobile = $_SESSION['mobile'];
//     // echo $usermobile;

$user = $conn->query("SELECT * FROM userdata WHERE id='$userid'");
if (mysqli_num_rows($user) > 0) {
    while ($userdata = mysqli_fetch_assoc($user)) {
        $userid = $userdata['id'];
        $userphoto = $userdata['profilephoto'];
        $username = $userdata['name'];
        $userstate = $userdata['state'];

        $data = $conn->query("SELECT * FROM `post` WHERE `userid`='$userid'");
        $output = "";
        if (mysqli_num_rows($data) > 0) {
            while ($result = mysqli_fetch_assoc($data)) {
                $userpostid = $result['userid'];
                $postid = $result['id'];
                $headline = $result['headline'];
                $thought = $result['thought'];
                $image = $result['image'];
                $video = $result['video'];

                

                $output .= "
                        
                        <div id='white' style='width: 55% !important;'>
                            <div class='flex' style='margin-top:50px'>
                                <div id='userimg'>
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
                                   </svg></button>
                               <div class='dropdown-content'>
                                   <a href='editprofile.php'>Edit Profile 1</a>
                                   <a href='editpost.php?postid=$postid'>Edit Post</a>
                                   <button onclick='deletepost($postid)'>Delete Post</button>
                               </div>
                    </div>
                        
                    </div>
                            <div>
                                <img src='./img/$image' alt='image found' height='100%' width='100%'>
                            
                            <video controls width = '500px'height='500px'  >
                            <source  src='./img/$video' type='video/mp4'></video>
                        </video>
                            
                        </div>
                        <div id='white1'>
                                <div class='icon'>
                                    <p>
                                    <i class='fa-regular fa-eye' id='iconsection1'></i></p>
                                    <p> 
                                 <button onclick='index_comment()'>
                                 <i class='fa-regular fa-comment' id='iconsection'></i>
                            </button>
                            </p>
                           
                                    <p onclick='sharepage()'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24'>
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

        }
        echo $output;
    }

}



// }












?>












































<?php
include ("footer.php");
?>