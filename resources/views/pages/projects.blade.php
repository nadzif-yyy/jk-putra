@extends('layouts.app')

@section('title', 'Projects')
@section('content')
    <style>
        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: contain;
            object-position: center;
            background-color: #f8f9fa;
        }
    </style>
    <div class="container">
        <h2 class="text-center my-5">My Projects</h2>
        <div class="row">
            @forelse($projects as $project)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img class="card-img-top" src="{{ asset('images/' . $project->image) }}"
                            alt="">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p class="card-text">{{ $project->description }}</p>
                            <p class="text-muted mb-4">Tech: {{ $project->teknologi }}</p>
                            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary w-100 mt-auto">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
            <div class="d-flex justify-content-center mt-4">
                {{ $projects->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

@endsection