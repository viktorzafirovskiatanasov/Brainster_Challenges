
   

    @extends('layouts.master')
 @section('content')
 <style>
    .background_image {
        background-image: linear-gradient(rgba(51, 47, 47, 0.574), rgba(51, 47, 47, 0.574)), url('{{ asset('images/contact-bg.jpg') }}');
        background-repeat: no-repeat;
        background-position: bottom;
        background-size: cover;
        background-attachment: fixed;
    }
</style>
<main>
    <div class="mx-auto mt-5" style="width: 40%">

        <div class="mb-5">
            <div class="mb-3">
                <label for="name" class="form-label text-secondary">Name</label>
                <input type="text" name="name" class="form-control"
                    style="border: 0; border-bottom: 1px solid rgba(128, 128, 128, 0.658)" id="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label text-secondary">Email Address</label>
                <input type="text" name="email" class="form-control"
                    style="border: 0; border-bottom: 1px solid rgba(128, 128, 128, 0.658)" id="email">
            </div>
            <div class="mb-3">
                <label for="number" class="form-label text-secondary">Phone Number</label>
                <input type="text" name="number" class="form-control"
                    style="border: 0; border-bottom: 1px solid rgba(128, 128, 128, 0.658)" id="number">
            </div>
            <div class="mb-3">
                <label for="comments" class="text-secondary">Comments</label>
                <textarea class="form-control" name="comments" id="comments"
                    style="border: 0; border-bottom: 1px solid rgba(128, 128, 128, 0.658)"></textarea>
            </div>

            <button class="btn btn-info text-white">Send</button>
        </div>
    </div>
</main>
 @endsection
  