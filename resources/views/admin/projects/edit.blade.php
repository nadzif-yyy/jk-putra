@extends('admin.template')

@section('content')
<div class="container-fluid mt-3">
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <h4 class="mb-4">Edit Project</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="title" class="form-label">Nama Project</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="teknologi" class="form-label">Teknologi</label>
                        <input type="text" class="form-control" id="teknologi" name="teknologi" value="{{ old('teknologi', $project->teknologi) }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="active" {{ old('status', $project->status) == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="archived" {{ old('status', $project->status) == 'archived' ? 'selected' : '' }}>Archived</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="image" class="form-label">Image (Biarkan kosong jika tidak diubah)</label>
                        <input type="file" class="form-control" id="image" name="image">
                        @if($project->image)
                            <div class="mt-2">
                                <img src="{{ asset('images/' . $project->image) }}" alt="Current Image" width="100" class="img-thumbnail">
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $project->description) }}</textarea>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary me-1">Update</button>
                    <a href="{{ route('projects.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
