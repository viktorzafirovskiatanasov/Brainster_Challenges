 <?php
 session_start();
 include_once './autoload.php';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $new_model = $_POST['new_vehicle_model'];
    foreach($_SESSION['models'] as $model){
        // var_dump($model['name']);
        // var_dump($new_model);
        // echo '<br>';
        if(strtolower($model['name']) == strtolower($new_model)){
            
            header('Location: dashboard.php');
            die();
        }
    }
    VehicleModel::addModel($new_model);
    $_SESSION['models'] = VehicleModel::getAllModels();
    header('Location: dashboard.php');
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
            <h1 class="mb-4 text-uppercase text-center mx-auto">Create New Vehicle Model</h1>
            <div class="row mx-auto">
                <div class="col-md-6 mx-auto">
                    <form action="add_models.php" method="post">
                        <div class="mb-3">
                            <label for="new_vehicle_model" class="form-label">New Model Name:</label>
                            <input type="text" name="new_vehicle_model" id="new_vehicle_model" class="form-control" placeholder="Enter New Model Name" required>
                        </div>
                        <div class="mt-5 w-100">
                            <button type="submit"  class="d-block btn btn-primary w-100">Add Model</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="ha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>