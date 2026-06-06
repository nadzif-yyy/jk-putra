@extends('admin.template')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-3 py-3">
            <h3>Data Projects</h3>
            <div>
                <a href="{{ route('projects.pdf_all') }}" class="btn btn-danger me-2">
                    <i class="fas fa-file-pdf"></i> Cetak Semua ke PDF
                </a>
                <a href="{{ route('projects.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Project
                </a>
            </div>
        </div>
    </div>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered" id="tabel_project">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Teknologi</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($project->image)
                                <img src="{{ asset('images/' . $project->image) }}" alt="{{ $project->title }}" 
                                     class="img-thumbnail" style="max-width: 100px;">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->teknologi }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->status }}</td>
                        <td>
                            <a href="{{ route('projects.pdf_single', $project->id) }}" class="btn btn-sm btn-info text-white">
                                <i class="fas fa-download"></i> Cetak PDF
                            </a>
                            
                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" 
                                onclick="return confirm('Apakah Anda yakin ingin menghapus project ini?')">
                                Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#tabel_project').DataTable();
    });
</script>
@endsection