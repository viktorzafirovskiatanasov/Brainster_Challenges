 <style>
    .navbar-toggler:focus {
    text-decoration: none;
    outline: 0;
    box-shadow: none;
}
     @media only screen and (max-width: 789px) {
         nav .navbar-nav li {
             font-size: 12px !important;
         }

         nav .navbar-nav .blog {
             margin: 0 5px !important;
         }

     }
 </style>
 <nav class="navbar navbar-expand-md navbar-light py-1 bg-warning ">
     <div class="container d-flex flex-row col-12 col-xl-8 mx-auto p-0">
         <div class="col-2 offset-5 offset-sm-0">
             <a class="navbar-brand w-full d-flex flex-column justify-content-center align-items-center"
                 href="{{ route('homepage') }}">
                 <img class="logo" src="{{ asset('images/logo.png') }}" alt="logo" style="width: 40px" />
                 <p class="m-0 text-uppercase" style="font-size: 15px"><strong>brainster</strong></p>
             </a>
         </div>
        
         <button class="navbar-toggler d-flex justify-content-center align-items-center toggler-example d-block d-sm-none col-1" style="margin-right: 20px"
             type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
             aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
             <span class="dark-blue-text"><i class="fa-solid fa-bars"></i></span>
         </button>
         <div class="d-none  d-sm-block col-10 ">
             <ul class="navbar-nav d-flex flex-row justify-content-end align-items-center fw-bold text-dark">
                 <li class="nav-item text-wrap text-center">
                     <a class="nav-link" href="https://brainster.co/marketing/" target="_blank">Академија за
                         маркетинг</a>
                 </li>
                 <li class="nav-item text-wrap text-center">
                     <a class="nav-link" href="https://brainster.co/full-stack/" target="_blank">Академија за
                         програмирање</a>
                 </li>
                 <li class="nav-item text-wrap text-center">
                     <a class="nav-link text-center" href="https://brainster.co/data-science/" target="_blank">Академија
                         за data
                         sciense</a>
                 </li>
                 <li class="nav-item text-wrap text-center">
                     <a class="nav-link text-center" href="https://brainster.co/graphic-design/"
                         target="_blank">Академија за
                         дизајн</a>
                 </li>
                 <li class="nav-item text-wrap text-center blog">
                     <a class="nav-link text-center" href="https://brainster.co/graphic-design/"
                         target="_blank">Блог</a>
                 </li>
                 <li class="nav-item text-center text-wrap">
                     <a href="#" class="nav-link" onclick="openHireStudentModal()">Вработи наш студент</a>
                 </li>
                 @if (session('user_id'))
                 <li class="nav-item text-wrap text-center">
                     <a class="nav-link" href="{{ route('logout') }}">Log out</a>
                 </li>
                 <li class="nav-item text-wrap text-center">
                     <a class="nav-link" href="{{ route('adminPanel') }}">Admin Panel</a>
                 </li>
             @else
                 <li class="nav-item text-wrap text-center">
                     <a href="{{ route('login') }}" class="nav-link">Log in</a>
                 </li>
             @endif
             </ul>
         </div>
         <div class="collapse navbar-collapse" id="navbarSupportedContent1">

             <!-- Links -->
             <ul class="navbar-nav fw-bold text-dark d-sm-none">
                 <li class="nav-item text-wrap">
                     <a class="nav-link" style="margin-left: 10px" href="https://brainster.co/marketing/"
                         target="_blank">Академија за
                         маркетинг</a>
                 </li>
                 <li class="nav-item text-wrap">
                     <a class="nav-link" style="margin-left: 10px" href="https://brainster.co/full-stack/"
                         target="_blank">Академија за
                         програмирање</a>
                 </li>
                 <li class="nav-item text-wrap">
                     <a class="nav-link" style="margin-left: 10px" href="https://brainster.co/data-science/"
                         target="_blank">Академија
                         за data
                         sciense</a>
                 </li>
                 <li class="nav-item text-wrap">
                     <a class="nav-link" style="margin-left: 10px" href="https://brainster.co/graphic-design/"
                         target="_blank">Академија за
                         дизајн</a>
                 </li>
                 <li class="nav-item text-wrap blog">
                     <a class="nav-link" style="margin-left: 10px" href="https://blog.brainster.co/"
                         target="_blank">Блог</a>
                 </li>
                 <li class="nav-item text-wrap">
                     <a href="#" class="nav-link" style="margin-left: 10px" onclick="openHireStudentModal()">Вработи наш студент</a>
                 </li>
                 @if (session('user_id'))
                    <li class="nav-item text-wrap text-center">
                        <a class="nav-link" href="{{ route('logout') }}">Log out</a>
                    </li>
                    <li class="nav-item text-wrap text-center">
                        <a class="nav-link" href="{{ route('adminPanel') }}">Admin Panel</a>
                    </li>
                @else
                    <li class="nav-item text-wrap text-center">
                        <a href="{{ route('login') }}" class="nav-link">Log in</a>
                    </li>
                @endif
             </ul>
             <!-- Links -->

         </div>
     </div>
 </nav>
 <div class="modal fade" id="hireStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Вработи наши студенти</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p style="color: rgb(134, 134, 134)">Внесете ваши информации за да стапиме во контант:</p>
                <form method="post" action="{{route('employment')}}" id="contactForm">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Е-мејл</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Телефон</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="company" class="form-label">Компанија</label>
                        <input type="text" class="form-control" id="company" name="company" required>
                    </div>
                    <button class="btn btn-warning w-100">Испрати</button>
                </form>
            </div>
           
        </div>
    </div>
</div>

<script>
    function openHireStudentModal() {
        var myModal = new bootstrap.Modal(document.getElementById('hireStudentModal'));
        myModal.show();
    }
</script>