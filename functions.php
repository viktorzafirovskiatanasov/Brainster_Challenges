<?php 
function isset_input($username , $password , $email){
    if($username != '' && $password != '' && $email != ''){
        return true;
    }
    else return false;
}
function validate_username($username) {
    if (preg_match('/\s/', $username)) {
        set_error_message("Username can't contain empty spaces");
        header("Location: signup.php");
        exit();
    } else if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        set_error_message("Username can only contain alphanumeric characters and underscores");
        header("Location: signup.php");
        exit();
    }

    return true;
}


function validate_email($email) {
   
   if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
    set_error_message("Invalid email");
        header("Location: signup.php");
   } else if (strpos($email, '@') < 5){
    set_error_message("Your email must contain 5 caracters before @");
    header("Location: signup.php");
   }
   else return true;
}

function validate_password($password) {
    if (!preg_match('/[0-9]/', $password)) {
        set_error_message("Password must contain at least one number.");
        header("Location: signup.php");
        exit(); // Early return to stop further validation
    }

    if (!preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $password)) {
        set_error_message("Password must contain at least one special character.");
        header("Location: signup.php");
        exit(); // Early return to stop further validation
    }

    if (!preg_match('/[A-Z]/', $password)) {
        set_error_message("Password must contain at least one uppercase letter.");
        header("Location: signup.php");
        exit(); // Early return to stop further validation
    }

    return true;
}

function save_user($username, $password, $email) {
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $user_data = $email . ', ' . $username . '=' . $hashed_password . PHP_EOL;
    file_put_contents('users.txt', $user_data, FILE_APPEND);
}
function set_error_message($message) {
    session_start();
    return $_SESSION['error_message'] = $message;
}