@extends('layouts.app')

@section('title', 'Projects Detail')
@section('content')
    <style>
        .card-img-top {
            width: 100%;
            max-height: 400px;
            object-fit: contain;
            object-position: center;
            background-color: #f8f9fa;
        }
    </style>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-8 mx-auto">
                
                <div class="mb-3">
                    <a href="{{ route('projects') }}" class="text-decoration-none">Projects</a> / <span class="text-muted">{{ $project->title }}</span>
                </div>

                <div class="card shadow-sm border-0 mb-5">
                    <img class="card-img-top" src="{{ asset('images/' . $project->image) }}"
                        alt="">
                    <div class="card-body p-4">
                        <h2 class="mb-4">{{ $project->title }}</h2>
                        
                        <div class="mb-4">
                            <h5 class="text-muted mb-2">Deskripsi Proyek</h5>
                            <p class="card-text fs-5">{{ $project->description }}</p>
                        </div>
                        
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <h5 class="text-muted mb-3">Teknologi yang Digunakan</h5>
                                <span class="badge bg-primary p-2 fs-6">{{ $project->teknologi }}</span>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-muted mb-3">Status Proyek</h5>
                                @if($project->status == 'active')
                                    <span class="badge bg-success p-2 fs-6">Active / Aktif</span>
                                @else
                                    <span class="badge bg-secondary p-2 fs-6">Archived / Diarsipkan</span>
                                @endif
                            </div>
                        </div>

                        <a href="{{ route('projects') }}" class="btn btn-danger w-100 py-2">Kembali ke Daftar Proyek</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection