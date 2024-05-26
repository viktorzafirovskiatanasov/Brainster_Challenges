<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    include ('functions.php');
    if(isset_input($username , $password , $email)){
    $username_valid = validate_username($username);
    $email_valid = validate_email($email);
    $password_valid = validate_password($password);
    
    
    // Check if the username or email already exists in users.txt
    $users_data = file('users.txt');
    foreach ($users_data as $user) {
        list($stored_email, $user_info) = explode(', ', $user, 2);
        list($stored_username, $stored_password) = explode('=', $user_info, 2);

        if ($username === $stored_username) {
            // Username taken
            set_error_message('Username taken');
            header("Location: signup.php");
            exit();
        }

        if ($email === $stored_email) {
            // Email already exists
            set_error_message('A user with this email already exists');
            header("Location: signup.php");
            exit();
        }
    }

    save_user($username, $password, $email);

    // Redirect to the welcome page
    session_start();
    $_SESSION['username'] = $username;
    header("Location: welcome.php");
    exit();
} else {
    set_error_message('All fields are required');
    header("Location: signup.php");
    exit();
}
}
else {
    header("Location: signup.php");
    exit();
}
?>

