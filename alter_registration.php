<?php

session_start();
include_once './autoload.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $model = $_POST['vehicle_model'];
    $vehicle_type = $_POST['vehicle_type'];
    $chassis_number = $_POST['chassis_number'];
    $production_year = $_POST['production_year'];
    $registration = $_POST['registration'];
    $fuel_type = $_POST['fuel_type'];
    $registrated_till = $_POST['registrated_till'];
    $registrated_till_date = DateTime::createFromFormat('d.m.Y', $registrated_till);
    $registrated_till = $registrated_till_date->format('Y-m-d');
    
    if (empty($model) || empty($vehicle_type) || empty($chassis_number) || empty($production_year) || empty($registration) || empty($fuel_type) || empty($registrated_till)) {

        echo "Please fill in all fields.";
    } else {
     RegistrationSelect::alterRow(
            $model,
            $chassis_number,
            $vehicle_type,
            $production_year,
            $registration,
            $fuel_type,
            $registrated_till
        );
     
        header('Location: dashboard.php');
    }
}
