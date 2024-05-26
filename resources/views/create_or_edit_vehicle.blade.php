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
    <h1 class="text-center mt-5" id="form-title"></h1>
    <div class="container mt-5 w-50 mx-auto">
        <form id="vehicleForm" action="" method="POST">
            @csrf
            <input type="hidden" id="editStatus" value="{{ isset($vehicleId) ? 'edit' : 'create' }}">
            <div class="mb-3">
                <label for="brand" class="form-label">Brand</label>
                <input type="text" class="form-control" id="brand" name="brand" value="">
            </div>
            <div class="mb-3">
                <label for="model" class="form-label">Model</label>
                <input type="text" class="form-control" id="model" name="model" value="">
            </div>
            <div class="mb-3">
                <label for="plate_number" class="form-label">Plate Number</label>
                <input type="text" class="form-control" id="plate_number" name="plate_number" value="">
            </div>
            <div class="mb-3">
                <label for="insurance_date" class="form-label">Insurance Date</label>
                <input type="date" class="form-control" id="insurance_date" name="insurance_date" value="">
            </div>
            <button type="submit" class="btn btn-warning w-100" id="form-button"></button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            let editStatus = $('#editStatus').val();
            if (editStatus === 'edit') {
                let vehicleId = {{ $vehicleId ?? 0 }};
                $.ajax({
                    type: 'GET',
                    url: '/api/vehicles/' + vehicleId,
                    success: function(response) {
                        $('#brand').val(response.data.brand);
                        $('#model').val(response.data.model);
                        $('#plate_number').val(response.data.plate_number);
                        let dateParts = response.data.insurance_date.split('-');
                        let formattedDate = `${dateParts[2]}-${dateParts[1]}-${dateParts[0]}`;
                        $('#insurance_date').val(formattedDate);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
                $('#vehicleForm').attr('action', '{{ url('/api/vehicles') }}/' + vehicleId);
                $('#form-title').text('Edit Vehicle');
                $('#form-button').text('Update Vehicle').addClass('btn-warning');
            } else {
                $('#vehicleForm').attr('action', '{{ url('/api/vehicles') }}');
                $('#form-title').text('Create Vehicle');
                $('#form-button').text('Create Vehicle').removeClass('btn-warning');
                $('#form-button').text('Create Vehicle').addClass('btn-success');
            }
            $('#vehicleForm').submit(function(event) {
                event.preventDefault();
                let formData = $(this).serialize();
                let url = $(this).attr('action');
                let method = (editStatus === 'edit') ? 'PATCH' : 'POST';
                $.ajax({
                    type: method,
                    url: url,
                    data: formData,
                    success: function(response) {
                        window.location.href = "{{ route('dashboard') }}";
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
