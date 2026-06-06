@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-8 text-center">
            <h1 class="display-4">Halo, Saya Putra Cikal</h1>
            <img src="{{ asset('images/user-image.png') }}" alt="Profile Image" class="rounded-circle mb-4" width="150" height="150" style="object-fit: cover;">
            <p class="lead">Saya adalah seorang Software Enginering dengan pengalaman dalam merancang dan mengembangkan aplikasi berbasis web dari sisi front-end hingga back-end.</p>
            <hr>
            <p>Selamat Datang dihalaman web profile saya</p>
        </div>
    </div>

    <div class="row mt-5 mb-5 text-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pengalaman</h5>
                    <p class="card-text">2 tahun pengalaman</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Project</h5>
                    <p class="card-text">20 Project Selesai</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Klien</h5>
                    <p class="card-text">50+ Klien</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection