
    @extends('layouts.master')
   @section('content')
   <style>
    .background_image {
        background-image: linear-gradient(rgba(51, 47, 47, 0.574), rgba(51, 47, 47, 0.574)), url('{{ asset('images/about-bg.jpg') }}');
        background-repeat: no-repeat;
        background-position: bottom;
        background-size: cover;
        background-attachment: fixed;
    }
</style>
<main>
    <div class="mx-auto mt-5" style="width: 40%">

        <div class="mb-5">
            <p class="mb-5 text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur
                temporibus incidunt repudiandae, dolores inventore blanditiis quia, tempore placeat quas ad,
                voluptatum quae itaque recusandae corporis aperiam dolorum fuga. Veniam perferendis esse accusamus.
                Veniam repellat, aperiam eligendi quibusdam voluptatem beatae ipsa ea, error est nostrum doloremque
                distinctio maxime, obcaecati perspiciatis magnam!</p>
            <p class="mb-5 text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur
                temporibus incidunt repudiandae, dolores inventore blanditiis quia, tempore placeat quas ad,
                voluptatum quae itaque recusandae corporis aperiam dolorum fuga. Veniam perferendis esse accusamus.
                Veniam repellat, aperiam eligendi quibusdam voluptatem beatae ipsa ea, error est nostrum doloremque
                distinctio maxime, obcaecati perspiciatis magnam!</p>
            <p class=" text-secondary">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae alias
                temporibus pariatur voluptatibus beatae placeat consequuntur ex deserunt a magnam, blanditiis
                nesciunt exercitationem voluptates, optio error, neque adipisci nostrum. Natus.</p>
        </div>
    </div>
</main>
  @endsection