<?php
include_once('functions.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $users_data = file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($users_data as $user) {
        list($stored_email, $user_info) = explode(', ', $user, 2);
        list($stored_username, $stored_password) = explode('=', $user_info, 2);

        if ($username == $stored_username && password_verify($password, $stored_password)) {
            // Successful login
            session_start();
            $_SESSION['username'] = $username;
            header("Location: welcome.php");
            exit();
        }
    }

    set_error_message('Wrong username/password combination');
    header("Location: login.php");
    exit();
} else {
    header("Location: login.php");
    exit();
}
?>

