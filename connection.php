<?php
$servername = "localhost";  //servername
$user = "root";  //username
$pass = ""; //password
$db = "myproject"; //databasename;

//make connection;
$conn=mysqli_connect($servername,$user,$pass,$db);
//pass connection in conn;
// $conn
// check connection

  if($conn){
    // echo 'New record created my project';

}
else{
    echo 'error';
}




?>