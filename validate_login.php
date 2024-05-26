<?php
 session_start();
include_once './autoload.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
   
    $usernameEmail = $_POST['username_email'];
    $password = $_POST['password'];
   
    $admin = Admin::getAdmin($usernameEmail);

    
    if (password_verify($password, $admin[0]['password'])){
        $_SESSION['username'] = $admin[0]['username'];
       
        $_SESSION['registrations'] = RegistrationSelect::getAllRegistrations();
        $_SESSION['vehicle_types'] = VehicleType::getAllTypes();
        $_SESSION['fuel_types'] = FuelType::getAllTypes();
        $_SESSION['models'] = VehicleModel::getAllModels();
        header('Location: dashboard.php');
        die(); 
    }
    else{
        $_SESSION['login_error'] = 'wrong credentials please try again';
        header('Location: login.php');
    }

}