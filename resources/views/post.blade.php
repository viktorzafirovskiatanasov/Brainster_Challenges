
    @extends('layouts.master')
   @section('content')
   <style>
    .background_image {
        background-image: linear-gradient(rgba(51, 47, 47, 0.574), rgba(51, 47, 47, 0.574)), url('{{ asset('images/blog-image.jpg') }}');
        background-repeat: no-repeat;
        background-position: bottom;
        background-size: cover;
        background-attachment: fixed;
    }
</style>
<main>
    <div class="mx-auto mt-5" style="width: 40%">

        <div class="mb-5">
            <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia deleniti error
                necessitatibus! Officiis ratione odio fugiat ipsa autem reiciendis magni blanditiis delectus hic,
                doloribus eligendi architecto assumenda ad perspiciatis qui!</p>
            <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia deleniti error
                necessitatibus! Officiis ratione odio fugiat ipsa autem reiciendis magni blanditiis delectus hic,
                doloribus eligendi architecto assumenda ad perspiciatis qui!</p>
            <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex fugit atque recusandae
                ipsum, nesciunt cupiditate commodi rem placeat nam? Eum eaque suscipit, optio molestiae nostrum quam
                natus commodi est corrupti nam et assumenda sequi ipsam minus ad illo, illum quae ratione expedita
                quaerat enim. Voluptatem tempora tempore reiciendis quo quisquam qui commodi necessitatibus
                perspiciatis. Magnam aliquam id quisquam voluptates explicabo?</p>
            <p class="mb-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est voluptates porro
                obcaecati consequatur excepturi odit beatae quia qui accusamus odio. Officia, consequuntur
                perspiciatis nisi aliquam deleniti numquam corporis reiciendis error.</p>
            <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, enim. Assumenda
                eveniet vitae soluta dolorem magni, est illo debitis, facere alias praesentium provident repudiandae
                ut. Suscipit at nisi incidunt facere doloribus nam sunt accusamus consectetur molestiae recusandae
                eaque veritatis earum vitae sit explicabo quos rem, omnis, ullam asperiores architecto nobis!</p>
            <h2 class="mt-5">The Final Frontier</h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati corrupti laborum
                vel nostrum debitis dicta amet maiores eius blanditiis commodi, animi illum, repellat minima tempora
                quo suscipit a natus libero.</p>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati corrupti laborum
                vel nostrum debitis dicta amet maiores eius blanditiis commodi, animi illum, repellat minima tempora
                quo suscipit a natus libero.</p>
            <p class="mb-5 text-secondary"><i>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque
                    facere cum consequuntur laboriosam dolorem eaque mollitia voluptatum. Consequuntur, corporis?
                    Similique eligendi commodi quia sequi maxime modi corrupti dignissimos vitae odit! Itaque
                    corporis officiis consectetur vero, ipsum impedit. Adipisci, quia voluptatibus praesentium porro
                    reprehenderit architecto sapiente minima, mollitia nisi eveniet atque ducimus provident itaque
                    quae. Nobis beatae mollitia animi enim omnis.</i></p>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati corrupti laborum
                vel nostrum debitis dicta amet maiores eius blanditiis commodi, animi illum, repellat minima tempora
                quo suscipit a natus libero.</p>
            <p class="mb-5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id saepe aperiam culpa, quod
                non omnis tempora suscipit, facere error incidunt dicta officia magni adipisci quae cum iste
                reprehenderit possimus iure, unde excepturi. Eius, voluptatem aspernatur repudiandae asperiores,
                adipisci reiciendis labore officia autem sunt perspiciatis laudantium, quod nobis harum architecto
                cum?</p>
            <h2 class="mt-5">Reaching For The Stars</h2>
            <p class="mb-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Pariatur tempore recusandae
                reprehenderit, unde nisi laboriosam totam atque eius illo quidem modi dolores commodi animi error
                nulla blanditiis facilis a quos sint voluptate? Ratione, dolorum. Repudiandae, neque voluptas
                provident cum expedita nisi, modi, placeat iure veniam aliquam unde voluptatibus accusamus. Sint,
                omnis accusantium ipsa, sequi tenetur excepturi magni soluta deserunt consequatur veritatis
                blanditiis ducimus dignissimos cumque id! Id corrupti dolor nulla ipsa numquam reiciendis autem cum
                repellendus velit, provident ut ipsam!</p>
            <img src="{{ asset('images/blog-image.jpg') }}" alt="" class="w-100">
            <sub class="text-secondary" style="margin-left: 30%"><i>Lorem ipsum dolor sit amet
                    consectetur.</i></sub>
            <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, explicabo cumque
                amet quo qui nam tempore quisquam hic voluptates cum aperiam ut veritatis laboriosam vitae? Nesciunt
                modi voluptatem harum minus architecto. Voluptatem nobis exercitationem animi, officiis impedit
                consequatur rerum debitis!</p>
            <p class="mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio distinctio reiciendis
                dolorem vitae libero necessitatibus a qui. Earum aperiam dignissimos assumenda eos fugiat non atque
                aut perferendis voluptates minus at voluptatem culpa dolorem ipsam natus excepturi mollitia
                doloremque est dolore eius maiores reprehenderit, animi nobis ab. Reiciendis atque suscipit, natus
                perspiciatis in dolorem, aperiam quis nobis sit debitis consequuntur ipsa.</p>
            <p class="mb-5">Lorem, ipsum <u>dolor sit</u> amet <u>consectetur adipisicing</u> elit. Tempore,
                illum.</p>
        </div>
    </div>
</main>
   @endsection