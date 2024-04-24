 <?php

include('connection.php');


echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit </title>
    <link rel="stylesheet" href="custom.css">
    <link rel="stylesheet" href="id.css">
</head>
<body>
    <form action="" method="post"  class="dj " id="mt-10" enctype="multipart/form-data">
        <table id="w50">
            <tr>
                <td> <label for="name">Name</label></td>
             </tr>
             <tr>
             <td><input type="text" placeholder="Please Enter your name" id="name" name= "name"></td>
         </tr>
         <tr>
             <td> <label for="password">Password</label></td>
          </tr>
          <tr>
          <td><input type="password" placeholder="Please Change your password" id="password" name= "password"></td>
         </tr>
         <tr>
             <td> <label for="profile">Profile Photo</label></td>
          </tr>
          <tr>
          <td><input type="file"  id="profile" name= "image"></td>
         </tr>
         
         <tr>
            <td><input type="submit"  id="profile" value="Edit" name="editbtn"></td>
           </tr>
        </table>
        
        
        </form>
        
</body>
</html>'
?>
<?php
if (isset($_POST['editbtn'])){
    $editname = $_POST['name'];
    $editpass = $_POST['password'];
    $editimg = $_FILES['image']['name'];
    $editpathname = $_FILES['image']['tmp_name'];
    $editadd  = '../Aima Media/profileimage/'.$editimg;
    if($editimg){
        move_uploaded_file($editpathname,$editadd);
        echo "Done";
        header("location:index.php");
    }
 
echo "<pre>";
print_r($_POST);
echo "</pre>";  

$data=$conn->query("INSERT INTO `userdata`( `name`, `password`, `profilephoto`) VALUES 
('$editname','$editpass','$editimg')");
// <!-- if($data==true){
}

?> 
<!-- <svg xmlns='http://www.w3.org/2000/svg' width='100' height='50' viewBox='0 0 16 16'>
  
        <path fill='currentColor' d='M3 9.5a1.5 1.5 0 1 1 0-3a1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3a1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3a1.5 1.5 0 0 1 0 3z'/>
</svg> -->
 