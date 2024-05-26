@extends('layouts.login')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
               
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('validateLogin') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Е-мејл</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Пасворд</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-warning w-100">Логирај се</button>
                    </form>
                </div>
            </div>
        </div>
   


@endsection