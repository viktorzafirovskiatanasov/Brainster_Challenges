<?php

include_once './autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['search'])) {
        $search = $_POST['search'];

        if (!empty($search)) {
            $registrations = RegistrationSelect::userSearch($search);
        } else {
            $registrations = [];
        }
    }
    $i = 1;
} else {
    $registrations = [];
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
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="search w-50 mx-auto bg-light shadow text-center p-5 my-5">
        <h1>Vehicle Registration</h1>
        <p>Enter your registration number to check its validity</p>
        <form action="homepage.php" method="post">
            <input type="text" class="form-control my-3" name="search" placeholder="Input your registration">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    <table class="w-100 table-striped text-center my-5">
        <thead class="border-bottom border-top text-dark">
            <tr>
                <th class="py-3">#</th>
                <th>vehicle model</th>
                <th>vehicle chassis number</th>
                <th>vehicle production year</th>
                <th>registration number</th>
                <th>fuel type</th>
                <th>Registration to</th>
                
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($registrations as $registration) { ?>
                <tr>
                    <td class='py-3'><?= $i ?></td>
                    <td><?= $registration['vehicle_model'] ?></td>
                    <td><?= $registration['chassis_number'] ?></td>
                    <td><?= $registration['production_year'] ?></td>
                    <td><?= $registration['registration'] ?></td>
                    <td><?= $registration['fuel_type'] ?></td>
                    <td><?= date('d.m.Y', strtotime($registration['registrated_till'])) ?></td>
                    
                </tr>
            <?php $i++;
            } $registration = []; ?>
        </tbody>
    </table>
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="ha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>
