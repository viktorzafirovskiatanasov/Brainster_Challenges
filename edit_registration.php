<?php
session_start();
include_once './autoload.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    die();
} else {
    $values = RegistrationSelect::checkCassisNumber($_POST['id']);
    $values[0]['fuel_type'] = FuelType::getFuelNameById($values[0]['fuel_type']);
    $values[0]['model'] = VehicleModel::getModelNameById($values[0]['model']);
    $values[0]['vehicle_type'] = VehicleType::getVehicleTypeNameById($values[0]['vehicle_type']);
   
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
    <div class="container mt-5">
        <form action="alter_registration.php" method="post">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="vehicle_model" class="form-label">Vehicle Model</label>
                    <select id="vehicle_model" name="vehicle_model" class="form-select form-control">
                        <?php
                        foreach ($_SESSION['models'] as $model) {
                            $selected = ($model['name'] == $values[0]['model']) ? 'selected' : '';
                        ?>
                            <option <?= $selected ?>><?= $model['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="vehicle_type" class="form-label">Vehicle Type</label>
                    <select id="vehicle_type" name="vehicle_type" class="form-select form-control">
                        <?php
                        foreach ($_SESSION['vehicle_types'] as $vehicle_type) {
                            $selected = ($vehicle_type['type'] == $values[0]['vehicle_type']) ? 'selected' : '';
                        ?>
                            <option <?= $selected ?>><?= $vehicle_type['type']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="chassis_number" class="form-label">Vehicle Cassis Number</label>
                    <input type="chassis_number" name="chassis_number" class="form-control" id="input1" value="<?= $values[0]['chassis_number'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="production_year" class="form-label">Vehicle Production Year</label>
                    <input type="text" class="form-control" id="production_year" name="production_year" value="<?= $values[0]['production_year'] ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="registration" class="form-label">Vehicle Registration Number</label>
                    <input type="text" class="form-control" id="registration" name="registration" value="<?= $values[0]['registration'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="fuel_type" class="form-label">Fuel Type</label>
                    <select id="fuel_type" name="fuel_type" class="form-select form-control">
                        <?php
                        foreach ($_SESSION['fuel_types'] as $fuel_type) {
                            $selected = ($fuel_type['type'] == $values[0]['fuel_type']) ? 'selected' : '';
                        ?>
                            <option <?= $selected ?>><?= $fuel_type['type']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="registrated_till" class="form-label">Registration to</label>
                    <input type="text" class="form-control" id="registrated_till" name="registrated_till" value="<?= date('d.m.Y', strtotime($values[0]['registrated_till'])) ?>">
                </div>
                <div class="col-md-6 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="ha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>