@extends('layouts.admin')

@section('content')
    <div class="container-xl mt-4 border-bottom">
        <button class=" btn clicked" style="color:blue;" id="add" onclick="showAddForm()">Додај</button>
        <button class=" btn" style="color:blue;" id="change" onclick="showEditForm()">Измени</button>
    </div>
    <div class="container-xl py-5" id="add_project">
        <h2>Додај нов производ:</h2>
        @if ($errors->any())
            <div class="alert alert-danger mt-3 w-75 mx-auto">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @elseif (session('success'))
            <div class="alert alert-success w-75 mx-auto mt-3">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('addProject') }}" class="w-75 mx-auto mt-2" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Име</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="mb-3">
                <label for="subtitle" class="form-label">Поднасол</label>
                <input type="text" class="form-control" id="subtitle" name="subtitle">
            </div>

            <div class="mb-3">
                <label for="image_url" class="form-label">Слика</label>
                <input type="text" class="form-control" id="image_url" name="image_url" placeholder="https://">
            </div>

            <div class="mb-3">
                <label for="project_url" class="form-label">URL</label>
                <input type="text" class="form-control" id="project_url" name="project_url" placeholder="https://">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Опис</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-warning w-100">Додај</button>
        </form>
    </div>
    <div class="container-xl py-5" id="projects" style="display: none;">
        <h2 class="mb-5">Измени постоечки производи</h2>
        <div class="row">
            @foreach ($projects as $project)
                <div class="col-12 col-sm-6 col-md-4 mb-4">
                    <div class="card" onmouseover="showCardFooter(this)" onmouseout="hideCardFooter(this)">
                        <div class="text-center" id="cardContent{{ $project->id }}">
                            <img src="{{ $project->image_url }}" class="card-img-top pt-2 mx-auto" style="width: 150px;"
                                alt="{{ $project->name }}">
                            <div class="card-body text-center px-0">
                                <h5 class="card-title text-secondary">{{ $project->name }}</h5>
                                <p class="card-text text-secondary">{{ $project->subtitle }}</p>
                                <p class="card-text">{{ $project->description }}</p>
                            </div>
                            <div class="card-footer text-center" style="visibility: hidden">
                                <button class="btn px-3" style="box-shadow: 0px 0px 1px 1px grey; background-color: #d3d4d5;" onclick="showForm({{ $project->id }})"><i
                                        class="fa-solid fa-pen bg-dark p-1 rounded" style="color: #ffffff;"></i></button>
                                <!-- Link the close button with the corresponding modal -->
                                <button class="btn px-3" style="box-shadow: 0px 0px 1px 1px grey; background-color: #d3d4d5;"
                                    data-bs-toggle="modal" data-bs-target="#modal{{ $project->id }}">
                                    <i class="fa-solid fa-x p-1" style="color: black;"></i>
                                </button>
                            </div>
                        </div>
                        <form id="editForm{{ $project->id }}" action="{{ route('editProject', ['id' => $project->id]) }}" method="POST" class="edit-form text-center" style="display: none;">
                            @csrf
                            @method('PUT')
                        
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="subtitle">Subtitle</label>
                                <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $project->subtitle }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="image_url">Image URL</label>
                                <input type="text" class="form-control" id="image_url" name="image_url" value="{{ $project->image_url }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="project_url">Project URL</label>
                                <input type="text" class="form-control" id="project_url" name="project_url" value="{{ $project->project_url }}">
                            </div>
                            
                            <div class="form-group w-75 mx-auto mb-3" style="overflow-y: auto">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="2">{{ $project->description }}</textarea>
                            </div>
                        
                           <div class="buttons card-footer">
                            <button type="submit" class="btn px-3" style="box-shadow: 0px 0px 1px 1px grey; background-color: #d3d4d5;">Зачувај</button>
                            <button type="button" class="btn px-3" style="box-shadow: 0px 0px 1px 1px grey; background-color: #d3d4d5;" onclick="cancelForm('{{ $project->id }}')">Откажи</button>
                           </div>
                        </form>
                        
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modal{{ $project->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Избриши</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Modal content goes here -->
                                    <p>Дали сте сигурни дека сакате да го избришете продуктот</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Откажи</button>
                                    <form id="deleteForm{{ $project->id }}"
                                        action="{{ route('deleteProject', ['id' => $project->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-warning"
                                            onclick="submitDeleteForm('{{ $project->id }}')">Избриши</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <style>
        .card:hover {
            outline: 2px solid #ffc107;
        }

        .clicked {
            border-top: 2px solid grey !important;
            border-left: 2px solid grey !important;
            border-right: 2px solid grey !important;
            color: black !important;
            border-top-left-radius: 10% !important;
            border-top-right-radius: 10% !important;
            border-bottom-left-radius: 0% !important;
            border-bottom-right-radius: 0% !important;
            margin-bottom: -3px !important;
            background-color: rgb(240, 240, 240) !important;
            z-index: 1 !important;
        }
    </style>
    <script>
        function showAddForm() {
            document.getElementById('add_project').style.display = 'block';
            document.getElementById('projects').style.display = 'none';
            document.getElementById('add').classList.add('clicked');
            document.getElementById('change').classList.remove('clicked');
        }

        function showEditForm() {
            document.getElementById('add_project').style.display = 'none';
            document.getElementById('projects').style.display = 'block';
            document.getElementById('add').classList.remove('clicked');
            document.getElementById('change').classList.add('clicked');
        }

        function showCardFooter(card) {
            card.querySelector('.card-footer').style.visibility = 'visible';
        }

        function hideCardFooter(card) {
            card.querySelector('.card-footer').style.visibility = 'hidden';
        }

        function submitDeleteForm(projectId) {

            document.getElementById('deleteForm' + projectId).submit();

        }
        function showForm(projectId) {
    document.getElementById('cardContent' + projectId).style.display = 'none';
    document.getElementById('editForm' + projectId).style.display = 'block';
}
function cancelForm(projectId) {
    document.getElementById('cardContent' + projectId).style.display = 'block';
    document.getElementById('editForm' + projectId).style.display = 'none';
}

    </script>
@endsection
