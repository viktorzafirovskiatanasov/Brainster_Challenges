<?php
  session_start();
  include_once './autoload.php';
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    var_dump($_POST);
  $date =  $_POST['date'];
  $row = $_POST['id']; 
  
  RegistrationSelect::extendRegistration($row,$date);
  header('Location: dashboard.php');
}