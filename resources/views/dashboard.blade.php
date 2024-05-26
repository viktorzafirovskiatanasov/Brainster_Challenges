<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0e37b883f4.js" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="text-center mt-5">Welcome to the dealership</h1>
    <div class="container mt-5">
        <table class="table text-center" id="vehiclesTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Model</th>
                    <th scope="col">Plate Number</th>
                    <th scope="col">Insurance Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be filled dynamically using AJAX -->
            </tbody>
        </table>
    </div>
    <div class="container mb-5 text-center">
        <h2>Or you can create a new entry</h2>
        <a href="{{route('web_create')}}" class="btn btn-success" data-id="${vehicle.id}">Create new Vehicle</a>
    </div>

    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            loadVehicles();

            function loadVehicles() {
                $.ajax({
                    type: 'GET',
                    url: '/api/dashboard',
                    success: function(response) {
                        $('#vehiclesTable tbody').empty();

                        $.each(response.data, function(index, vehicle) {
                            $('#vehiclesTable tbody').append(`
                                <tr>
                                    <th scope="row">${index + 1}</th>
                                    <td>${vehicle.brand}</td>
                                    <td>${vehicle.model}</td>
                                    <td>${vehicle.plate_number}</td>
                                    <td>${vehicle.insurance_date}</td>
                                    <td>
                                        <a href="#" class="btn btn-warning edit-vehicle" data-id="${vehicle.id}">Edit</a>
                                        <button class="btn btn-danger delete_button" data-id="${vehicle.id}">Delete</button>
                                    </td>
                                </tr>
                            `);
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

            $('#vehiclesTable').on('click', '.edit-vehicle', function(e) {
                e.preventDefault();
                var vehicleId = $(this).data('id');
                var editUrl = '{{ url('vehicle/edit') }}/' + vehicleId;
                window.location.href = editUrl;
            });

            $('#vehiclesTable').on('click', '.delete_button', function(e) {
                e.preventDefault();
                var vehicleId = $(this).data('id');

                $.ajax({
                    type: 'DELETE',
                    url: 'api/vehicles/' + vehicleId,
                    success: function(response) {
                        console.log(response.message);
                        loadVehicles();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
</body>
</html>
