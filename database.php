<?php 

$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "login-register";
$conn = "";


$conn = mysqli_connect($db_server,
               $db_user,
               $db_password,
               $db_name
            );
 

if(!$conn){
    die("there was a any problem");
}
?>