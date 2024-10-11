<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="logo.jpg"> <!--! currrent Favicon for pages-->
    <link rel="stylesheet" href="loginpage.css">
    <title>Login & Sign up</title>
</head>
<body>
 <div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <img style="width: 120px; border-radius: 90px;" src="logo.jpg">
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
        <div class="nav-button">
            <button class="btn white-btn" id="loginBtn" onclick="login()">Sign In</button>
            <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>

        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>

<!----------------------------- Form box ----------------------------------->    
    <div class="form-box">
        
        <!------------------- login form -------------------------->
        <?php 
        session_start();
        ?>

        <form class="login-container" id="login" action="login-signup.php" method="post">
            <div class="top">
                <span>if you dont have a account<a href="#" onclick="register()">Sign Up</a></span>
                <header>Login to EntertainEase 🎥</header>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" placeholder="Username or Email" name="name">
                <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" placeholder="Password" name="password">
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="one">
                    <input type="checkbox" style="margin-bottom: 15px;">
                    <label style="color: white; font-size: 13px;">Confirm Password</label>
                </div>
            <div class="input-box">
                <input type="submit" class="submit" value="Sign In" name="Sign In">
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
        
        
        <?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["name"]) && isset($_POST["password"])) {
        $_SESSION["name-email"] = $_POST["name"];
        $_SESSION["password"] = $_POST["password"];
    } else {
        
        $_SESSION["name-email"] = "";
        $_SESSION["password"] = "";
    }

    if (empty($_SESSION["name-email"]) && empty($_SESSION["password"])) {
        echo '
        <div id="custom-alert" style="
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: black;
            color: white;
            padding: 20px;
            border: solid aqua 2px;
            border-radius: 5px;
            font-size: 24px;
            z-index: 1000;
            text-align: center;
        ">
            Username and password are empty :-(
            <br><br>
            <button onclick="closeAlert()" style="
                background-color: white;
                color: #f44336;
                padding: 10px 20px;
                font-size: 18px;
                border: none;
                cursor: pointer;
            ">OK</button>
        </div>
        <script>
            function closeAlert() {
                document.getElementById("custom-alert").style.display = "none";
            }
        </script>
        ';
    } else {
        if (empty($_SESSION["name-email"])) {
            $password = isset($_SESSION["password"]) ? $_SESSION["password"] : 'Unknown User';
            echo '
            <div id="custom-alert" style="
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: black;
                color: white;
                padding: 20px;
                border: solid aqua 2px;
                border-radius: 5px;
                font-size: 24px;
                z-index: 1000;
                text-align: center;
            ">
                Password is: ' . htmlspecialchars($password) . '<br>but<br>
                please enter Username👤
                <br><br>
                <button onclick="closeAlert()" style="
                    background-color: white;
                    color: #f44336;
                    padding: 10px 20px;
                    font-size: 18px;
                    border: none;
                    cursor: pointer;
                ">OK</button>
            </div>
            <script>
                function closeAlert() {
                    document.getElementById("custom-alert").style.display = "none";
                }
            </script>
            ';
        } else {
            echo "";
        }
        if (empty($_SESSION["password"])) {
            $username = isset($_SESSION["name-email"]) ? $_SESSION["name-email"] : 'Unknown User';
            echo '
            <div id="custom-alert" style="
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: black;
                color: white;
                padding: 20px;
                border: solid aqua 2px;
                border-radius: 5px;
                font-size: 24px;
                z-index: 1000;
                text-align: center;
            ">
                Username is: ' . htmlspecialchars($username) . '<br>but<br>
                please enter password 🔑
                <br><br>
                <button onclick="closeAlert()" style="
                    background-color: white;
                    color: #f44336;
                    padding: 10px 20px;
                    font-size: 18px;
                    border: none;
                    cursor: pointer;
                ">OK</button>
            </div>
            <script>
                function closeAlert() {
                    document.getElementById("custom-alert").style.display = "none";
                }
            </script>
            ';
        } else {
            echo "";
        }

        if (!empty($_SESSION["name-email"]) && !empty($_SESSION["password"])) {
            header("Location: index.php");
        }
    }
}
?>


        <!------------------- registration form -------------------------->
        

        <form class="register-container" id="register" action="login-signup.php" method="post">
            <div class="top">
                <span>Have an account? <a href="#" onclick="login()">Login</a></span>
                <header>Sign Up to EntertainEase 🎬</header>
            </div>
            <div class="two-forms">
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Firstname" name="fname">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Lastname" name="lname">
                    <i class="bx bx-user"></i>
                </div>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" placeholder="Email" name="email">
                <i class="bx bx-envelope"></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" placeholder="Password" name="password">
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="one">
                    <input type="checkbox" style="margin-bottom: 15px;">
                    <label style="color: white; font-size: 13px;">Confirm Password</label>
                </div>
            <div class="input-box">
                <input type="submit" class="submit" value="Register" name="Signup">
            </div>
            <div class="two-col">
                <div class="one">
                    <input type="checkbox" id="register-check">
                    <label for="register-check"> Remember Me</label>
                </div>
                <div class="two">
                    <label><a href="#">Terms & conditions</a></label>
                </div>
            </div>
    </form>

    <?php 
    /*
        $_SESSION["fname"] = $_POST["fname"];
        $_SESSION["lname"] = $_POST["lname"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["password"] = $_POST["password"];

    if(empty($_SESSION["fname"]) && empty($_SESSION["lname"]) && empty($_SESSION["email"]) && empty($_SESSION["password"])){
        echo '
        <div id="custom-alert" style="
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: black;
            color: white;
            padding: 20px;
            border: solid aqua 2px;
            border-radius: 5px;
            font-size: 24px;
            z-index: 1000;
            text-align: center;
        ">
            please enter required details
            <br><br>
            <button onclick="closeAlert()" style="
                background-color: white;
                color: #f44336;
                padding: 10px 20px;
                font-size: 18px;
                border: none;
                cursor: pointer;
            ">OK</button>
        </div>
        <script>
            function closeAlert() {
                document.getElementById("custom-alert").style.display = "none";
            }
        </script>
        ';
    }else{
        header("Location: index.php");
    }
    */
?>

    
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
 
 <script>
 
     var a = document.getElementById("loginBtn");
     var b = document.getElementById("registerBtn");
     var x = document.getElementById("login");
     var y = document.getElementById("register");
 
     function login() {
         x.style.left = "4px";
         y.style.right = "-520px";
         a.className += " white-btn";
         b.className = "btn";
         x.style.opacity = 1;
         y.style.opacity = 0;
     }
 
     function register() {
         x.style.left = "-510px";
         y.style.right = "5px";
         a.className = "btn";
         b.className += " white-btn";
         x.style.opacity = 0;
         y.style.opacity = 1;
         
     }
 
 </script>
 
</body>
</html>