<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>login-page</title>
</head>
<body>
    <div class="main">
        <div class="login">
        </div>
        <div class="forms">
            <h2>Login</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h3>Username</h3>
                <input type="username" name="Username" id="username"placeholder="Username">
                <h3>Password</h3>
                <input type="password" name="password" id="password" placeholder="Enter Password"><br>
                <input type="button" id="submit" value="Login">
            </form>
        </div>
    </div>

    <?php
    $user = $_POST["Username"];
    $pass = $_POST["password"];

// $username = $password = $submit = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = is_valid_username($_POST["username"]);
    $password = is_valid_password($_POST["password"]);
    $submit = is_valid_submit($_POST["submit"]);
    
  }

function is_valid_username($username){
// // accepted username length between 5 and 20
   if (preg_match('/^\w{5,20}$/', $username))
         return true;
     else
         return false;
 }
 
 
function is_valid_password($password){
// // accepted password length between 5 and 20, start with character.
    if (preg_match("/^[a-zA-Z][0-9a-zA-Z_!$@#^&]{5,20}$/", $password))
         return true;
     else
         return false;
}

function is_valid_submit($submit){
    // // accepted password length between 5 and 20, start with character.
        if (preg_match("/^[a-zA-Z][0-9a-zA-Z_!$@#^&]{5,20}$/", $password))
             return true;
         else
             return false;
    }
    
?>
</body>

</html>