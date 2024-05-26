
@extends('layouts.homepage')

@section('content')
<div>
  <div class="container-xl py-5">
    <div class="row">
        @foreach ($projects as $project)
            <div class="col-12 col-sm-6 col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $project->image_url }}" class="card-img-top pt-2 mx-auto" style="width: 150px;" alt="{{ $project->name }}">
                    <div class="card-body text-center px-0">
                        <h5 class="card-title text-secondary">{{ $project->name }}</h5>
                        <p class="card-text text-secondary">{{ $project->subtitle }}</p>
                        <p class="card-text">{{ $project->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
  </div>
</div>
<style>
    .card:hover {
        border: 1px solid #ffc107;
    }
</style>
@endsection