
    @extends('layouts.master')
   @section('content')
   <style>
    .background_image {
        background-image: linear-gradient(rgba(51, 47, 47, 0.574), rgba(51, 47, 47, 0.574)), url('{{ asset('images/home-bg.jpg') }}');
        background-repeat: no-repeat;
        background-position: bottom;
        background-size: cover;
        background-attachment: fixed;
    }
</style>
<main>
    <div class="mx-auto mt-5" style="width: 40%">
        <div>
            <h2>Lorem Impun</h2>
            <p class="m-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime provident quibusdam
                nesciunt corporis deserunt dolore adipisci est consequuntur impedit tempore!</p>
            <sub class="text-secondary"><i>Posted by <strong>John Doe</strong></i></sub>
        </div>
        <br>
        <hr>
        <div>
            <h2>Lorem Impun 2</h2>
            <sub class="text-secondary"><i>Posted by <strong>John Doe</strong> in another boring news</i></sub>
        </div>
        <br>
        <hr>
        <div>
            <h2>Lorem Impun 3</h2>
            <p class="m-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus temporibus qui
                laboriosam totam voluptates vero commodi doloribus, pariatur dolorem quaerat, cupiditate quasi
                recusandae similique consequatur, illum dolor ad excepturi placeat.</p>
            <sub class="text-secondary"><i>Posted by <strong>John Doe</strong></i></sub>
        </div>
        <br>
        <hr>
        <div>
            <h2>Lorem Impun 4</h2>
            <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore, modi!</p>
            <sub class="text-secondary"><i>Posted by <strong>Missy Doe</strong></i></sub>
        </div>
        <br>
        <hr>
        <div class="d-flex justify-content-end mb-5">
            <button class="btn btn-info text-white">Order Posts -></button>
        </div>
    </div>
</main>
   @endsection