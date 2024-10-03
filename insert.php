

<?php 
//18              

if(isset($_POST["Sign In"])){

    $username = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);

  // $username = $_POST["name"];
                                                                                 //it will convert value to given form
   /* $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);*/

    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_NUMBER_INT);

    echo "hello $username your password is $password";

}

/*if(isset($_POST["Sign in"])){ 
                                                                     //if any inconsistancies then it will not return value
    $age = filter_input(INPUT_POST, "age", FILTER_VALIDATE_INT);

    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

    if(empty($age)){
        echo "it is aint valid or empty <br>";
    }else{
        echo "your age is $age <br>";
    }
    if(empty($email)){
        echo "email is aint valid or empty <br>";
    }else{
        echo $email; 
          
          
    }
}*/

?>






<?php 
/*
$username = $_PUSH["username"];

$password = $_PUSH["password"];

echo "THIS IS USER'S NAME [$username]";

echo "THIS IS USER'S password [$password]";


if($username == $username){
    echo "this is correct";
}else{
    echo "not correct";
}

if($password == $password){
    echo "this is correct";
}else{
    echo "not correct";
}
*/



?>