<?php 
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="logo.jpg">
    <link rel="stylesheet" href="register.css">
    <title>Sign Up</title>
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
                <a href="login.php"><button class="l-btn" id="loginBtn">Sign In</button></a>
                <button class="s-btn" id="registerBtn">Sign Up</button>
            </div>
            <div class="nav-menu-btn">
                <i class="bx bx-menu" onclick="myMenuFunction()"></i>
            </div>
        </nav>

        <div class="form-box">
            <?php 
            if (isset($_POST["Signup"])) {
                $first_name = htmlspecialchars(trim($_POST["fname"]));
                $last_name = htmlspecialchars(trim($_POST["lname"]));
                $email = htmlspecialchars(trim($_POST["email"]));
                $password = $_POST["password"];
                $ConfirmPassword = $_POST["confirm-password"]; 
                $PasswordHash = password_hash($password, PASSWORD_DEFAULT);
                $errors = array();

                if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($ConfirmPassword)) {
                    $errors[] = "All fields are required.<br>";
                } else {
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $errors[] = "Invalid email format.<br>";
                    } 
                    if (strlen($password) < 8) {
                        $errors[] = "Password must be at least 8 characters long.<br>";
                    }
                    if ($password !== $ConfirmPassword) {
                        $errors[] = "Passwords do not match.<br>";
                    }

                    require_once('database.php');
                    $sql = "SELECT * FROM users WHERE email = ?";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, "s", $email);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    if (mysqli_num_rows($result) > 0) {
                        $errors[] = "Email already exists.";
                    }
                }

                if (!empty($errors)) {
                    echo '<div id="error-message" style="background-color: black; color: red; font-size: 17px; font-weight: bold;
                    font-family: Arial; margin-left: 120px; margin-top: 100px; padding: 13px 25px; box-shadow: inset 0 0 15px red;">';
                    foreach ($errors as $error) {
                        echo $error;
                    }
                    echo '</div>';
                    echo '<script>
                        setTimeout(function() {
                            document.getElementById("error-message").style.display = "none";
                        }, 5000);
                    </script>';
                } else {
                    $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
                    $stmt = mysqli_prepare($conn, $sql);
                    if ($stmt) {
                        mysqli_stmt_bind_param($stmt, "ssss", $first_name, $last_name, $email, $PasswordHash);
                        mysqli_stmt_execute($stmt);
                        echo '<div style="color: green; font-size: 17px; font-weight: bold; margin-left: 120px; margin-top: 20px;">You have registered successfully.</div>';
                    } else {
                        die("Something went wrong");
                    }
                }
            }
            ?>
            <form class="register-container" id="register" action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
                <div class="top">
                    <span>Already have an account? <a href="login.php">Login</a></span>
                    <header>Sign Up to EntertainEase 🎬</header>
                </div>
                <div class="two-forms">
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Firstname" name="fname" required>
                        <i class="bx bx-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Lastname" name="lname" required>
                        <i class="bx bx-user"></i>
                    </div>
                </div>
                <div class="input-box">
                    <input type="email" class="input-field" placeholder="Email" name="email" required>
                    <i class="bx bx-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Password" name="password" required>
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Confirm Password" name="confirm-password" required>
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class="submit" value="Register" name="Signup">
                </div>
            </form>
        </div>
    </div>
    <script>
        function myMenuFunction() {
            var i = document.getElementById("navMenu");
            i.className = i.className === "nav-menu" ? i.className + " responsive" : "nav-menu";
        }
    </script>
</body>
</html>
