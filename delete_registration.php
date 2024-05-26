<?php
include_once './autoload.php';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{ 
    $row = $_POST['id'];
    RegistrationSelect::deleteRegistration($row);
    header('Location: dashboard.php');
}