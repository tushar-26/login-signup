<?php 

session_start();
if (!isset($_SESSION["user"])){
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
</head>
<body>
    <nav>
        <input type="checkbox" name="" id="check" value="">
        <label for="check" id="checkbtn"><i class="fa fa-bars"></i></label>
        <label class="logo">EntertainEase</label>
        <ul>
            <li><a class="act" href="#" target="_parent">Home</a></li>
            <li><a href="#" target="_parent">about</a></li>
            <li><a href="#" target="_parent">movies</a></li>
            <li><a href="#" target="_parent">events</a></li>
            <li><a href="index.html" target="_parent">profile</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>
    </nav>
    <div class="box1">
        <p class="pagex">USER INTERFACE WILL BE DEVELOPED BY US ON NEXT SEMESTER</p>
    </div>
    
</body>
</html>