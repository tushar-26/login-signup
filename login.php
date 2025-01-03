<?php 

session_start();
if (isset($_SESSION["user"])){
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="logo.jpg">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <nav class="nav">
            <div class="nav-logo">
                <img style="width: 120px; border-radius: 90px;" src="logo.jpg" alt="logo">
            </div>
            <div class="nav-menu" id="navMenu">
                <ul>
                    <li><a href="#" class="link active">Home</a></li>
                    <li><a href="#" class="link">About</a></li>
                    <li><a href="names.html" class="link">Members</a></li>
                    <li><a href="#" class="link">Theatres</a></li>
                    <li><a href="#" class="link">Movies</a></li>
                </ul>
            </div>
            <div class="nav-btns">
                
                  <button class="l-btn" id="loginBtn">Sign In</button>
                  <a href="re.php"><button class="s-btn" id="registerBtn">Sign Up</button></a>

            </div>
            <div class="nav-menu-btn">
                <i class="bx bx-menu" onclick="myMenuFunction()"></i>
            </div>
        </nav>

        <div class="form-box">
           <?php 
           
           if(isset($_POST["Signin"])){

            $email = $_POST["email"];
            $password = $_POST["password"];
            require_once('database.php');
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql); 
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if($user){
                if(password_verify($password, $user["password"])){
                    session_start();
                    $_SESSION["user"] = "confirmed";
                    header("Location: index.php");
                    die();
                }else{
                    
                    echo '<div id="error-message" style="background-color:black; color: red; font-size:17px; font-weight:bold;
                 font-family:Arial; margin-left:120px; margin-top:100px; padding: 13px 25px 13px 25px; box-shadow: red inset 0 0 15px;">
                Password doesn\'t match 
                 </div>';
              echo '<script>
            setTimeout(function() {
                document.getElementById("error-message").style.display = "none";
            }, 5000); // 5000 milliseconds = 5 seconds
             </script>';
 
                }

            }else{
                echo '<div id="error-message" style="background-color:black; color: red; font-size:17px; font-weight:bold;
                font-family:Arial; margin-left: 100px; margin-top: -48px; padding: 13px 25px 13px 25px; box-shadow: red inset 0 0 15px;">
               Email doesn\'t match 
                </div>';
             echo '<script>
           setTimeout(function() {
               document.getElementById("error-message").style.display = "none";
           }, 5000); // 5000 milliseconds = 5 seconds
            </script>';
            }

           }
           
           ?>
            <form class="login-container" id="login" action="login.php" method="post">
                <div class="top">
                    <span>if you dont have a account<a href="register.php" onclick="register()">Sign Up</a></span>
                    <header>Login to EntertainEase 🎥</header>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Enter  Email" name="email">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Enter Password" name="password">
                    <i class="bx bx-lock-alt"></i>
                </div>
               
                <div class="input-box">
                    <input type="submit" class="submit" value="Sign In" name="Signin">
                </div>
                <div class="two-col">
                    <div class="one">
                        <input type="checkbox" id="login-check">
                        <label for="login-check"> Remember Me</label>
                    </div>
                    <div class="two">
                        <label><a href="#">Forgot password?</a></label>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
    <script>
   
        function myMenuFunction() {
           var i = document.getElementById("navMenu");
       
           if(i.className === "nav-menu") {
               i.className += " responsive";
           } else {
               i.className = "nav-menu";
           }
          }
        
       </script>
</body>
</html>
