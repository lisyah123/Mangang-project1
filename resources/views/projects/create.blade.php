<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Project Baru</title>
    {{-- Aset Font, Ikon, dan CSS --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background-color: #dbeafe; /* Latar biru disamakan dengan index */
        }
        .card { 
            border: none;
            border-radius: 0.8rem; 
        }
        .card-title-custom { 
            font-weight: 600; 
            text-align: center; 
            margin-bottom: 2rem; 
            font-size: 1.75rem; 
            color: #343a40; 
        }
        .form-control, .form-select { 
            border-radius: 0.5rem; 
            background-color: #fff; 
            border-color: #dee2e6; 
        }
        .form-control:focus { 
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25); 
            border-color: #86b7fe; 
        }
        .btn-primary, .btn-secondary { 
            border-radius: 0.5rem; 
            padding: 0.5rem 1.5rem; 
            font-weight: 500;
        }
    </style>
</head>
<body>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm">
                <div class="card-body p-5">
                    <h2 class="card-title-custom">Tambah Project Baru</h2>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Baris 1 -->
                            <div class="col-md-6 mb-3">
                                <label for="project_name" class="form-label">Nama Project</label>
                                <input type="text" class="form-control" name="project_name" value="{{ old('project_name') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="start_date" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" required>
                            </div>

                            <!-- Baris 2 -->
                            <div class="col-md-6 mb-3">
                                <label for="client" class="form-label">Nama Klien</label>
                                <input type="text" class="form-control" name="client" value="{{ old('client') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="end_date" class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control" name="end_date" value="{{ old('end_date') }}" required>
                            </div>

                            <!-- Baris 3 -->
                            <div class="col-md-6 mb-3">
                                <label for="project_leader_name" class="form-label">Nama Project Leader</label>
                                <input type="text" class="form-control" name="project_leader_name" value="{{ old('project_leader_name') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="progress" class="form-label">Progress (%)</label>
                                <input type="number" class="form-control" name="progress" min="0" max="100" value="{{ old('progress', 0) }}" required>
                            </div>

                            <!-- Baris 4 -->
                            <div class="col-md-6 mb-3">
                                <label for="project_leader_email" class="form-label">Email Project Leader</label>
                                <input type="email" class="form-control" name="project_leader_email" value="{{ old('project_leader_email') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="project_leader_avatar" class="form-label">Foto Project Leader</label>
                                <input class="form-control" type="file" name="project_leader_avatar">
                                <small class="form-text text-muted">Opsional. Format: JPG, PNG. Maks: 2MB.</small>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('projects.index') }}" class="btn btn-secondary me-2">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Project</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
