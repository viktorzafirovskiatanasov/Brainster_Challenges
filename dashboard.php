<?php
session_start();

include_once './autoload.php';
include_once './functions.php';
if (!isset($_SESSION['username'])) {
  
    header('Location: login.php');
    die();
} else {
    $registrations = RegistrationSelect::getAllRegistrations();
  
    if(isset($_POST['search'])){
        $search = $_POST['search'];

    if (!empty($search)) {
        $registrations = RegistrationSelect::adminSearch($search);
    } 
    }
    $i = 1;
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />

    <!-- Latest compiled and minified Bootstrap 4.6 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- CSS script -->
    <link rel="stylesheet" href="style.css">
    <!-- Latest Font-Awesome CDN -->
    <script src="https://kit.fontawesome.com/0e37b883f4.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container-fluid">
            <a href="homepage.php" class="navbar-brand">Vehicle Registration</a>
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                    <a class="nav-link" href="add_models.php">Add Models</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <form action="add_registration.php" method="post">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="vehicle_model" class="form-label">Vehicle Model</label>
                    <select id="vehicle_model" name="vehicle_model" class="form-select form-control">
                        <?php
                        foreach ($_SESSION['models'] as $model) { ?>
                            <option><?= $model['name'];  ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="vehicle_type" class="form-label">Vehicle Type</label>
                    <select id="vehicle_type" name="vehicle_type" class="form-select form-control">
                        <?php
                        foreach ($_SESSION['vehicle_types'] as $vehicle_types) { ?>
                            <option><?= $vehicle_types['type'];  ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="chassis_number" class="form-label">Vehicle Chassis Number</label>
                    <input type="chassis_number" name="chassis_number" class="form-control" id="input1" placeholder="Input 1">
                </div>
                <div class="col-md-6">
                    <label for="production_year" class="form-label">Vehicle Production Year</label>
                    <input type="text" class="form-control" id="production_year" name="production_year" placeholder="yyyy">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="registration" class="form-label">Vehicle Registration Number</label>
                    <input type="text" class="form-control" id="registration" name="registration">
                </div>
                <div class="col-md-6">
                    <label for="fuel_type" class="form-label">Fuel Type</label>
                    <select id="fuel_type" name="fuel_type" class="form-select form-control">
                        <?php
                        foreach ($_SESSION['fuel_types'] as $fuel_types) { ?>
                            <option><?= $fuel_types['type'];  ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="registrated_till" class="form-label">Registration to</label>
                    <input type="text" class="form-control" id="registrated_till" name="registrated_till" placeholder="dd/mm/yyyy">
                </div>
                <div class="col-md-6 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <div class="search mx-4 rounded shadow">
        <div class="bg-light p-4 ">
            <form action="dashboard.php" method='POST' class="d-flex justify-content-end px-5">
                <input type="text" name="search" class="form-control col-4 mr-5" placeholder="Search..." aria-label="Search..." aria-describedby="search-button">
                <button class="btn btn-primary" type="submit" id="search-button">Search</button>
            </form>
        </div>
        <table class="w-100 table-striped text-center mb-5">
            <thead class="border-bottom border-top text-dark">
                <tr>
                    <th class="py-3">#</th>
                    <th>vehicle model</th>
                    <th>vehicle cassis number</th>
                    <th>vehicle production year</th>
                    <th>registration number</th>
                    <th>fuel type</th>
                    <th>Registration to</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($registrations as $registration) {  ?>
               
                    <tr class="text-<?= getRowColor($registration['registrated_till']) ?>">
                        <td class='py-3'><?= $i ?></td>
                        <td><?= $registration['vehicle_model'] ?></td>
                        <td><?= $registration['chassis_number'] ?></td>
                        <td><?= $registration['production_year'] ?></td>
                        <td><?= $registration['registration'] ?></td>
                        <td><?= $registration['fuel_type'] ?></td>
                        <td><?= date('d.m.Y', strtotime($registration['registrated_till'])) ?></td>
                        <td class="d-flex justify-content-center">
                            <form action="edit_registration.php" method="POST">
                                <input type="hidden" name="id" value="<?= $registration['chassis_number'] ?>">
                                <button type="submit" class="btn btn-warning mr-2">Edit</button>
                            </form>
                            <form action="delete_registration.php" method="POST">

                                <input type="hidden" name="id" value="<?= $registration['chassis_number'] ?>">
                                <button type="submit" class="btn btn-danger mr-2">Delete</button>
                            </form>
                            <?php if (getRowColor($registration['registrated_till']) == 'warning' || getRowColor($registration['registrated_till']) == 'danger') { ?>
                                <form action="extend_registration.php" method="POST">
                                    <input type="hidden" name="date" value="<?= date('d.m.Y', strtotime($registration['registrated_till'])) ?>">
                                    <input type="hidden" name="id" value="<?= $registration['chassis_number'] ?>">
                                    <button type="submit" class="btn btn-success">Extend</button>
                                </form>
                            <?php } ?>
                        </td>
                    </tr>
                <?php $i++;
                } ?>
            </tbody>
        </table>
    </div>
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="ha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>