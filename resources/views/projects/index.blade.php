<!DOCTYPE html>
<html lang="en">
<head>
    <title>Project Monitoring</title>
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
            background-color: #dbeafe; /* Warna biru muda */
        }
        .card { 
            border: none;
            border-radius: 0.8rem; 
        }
        .action-btn { 
            width: 35px; 
            height: 35px; 
            display: inline-flex; 
            align-items: center; 
            justify-content: center; 
            border-radius: 0.4rem; 
        }
        .avatar-initials { 
            width: 40px; 
            height: 40px; 
            border-radius: 50%; 
            background-color: #0d6efd; 
            color: white; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-weight: 600; 
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h1 class="text-center fw-bold mb-4" style="color: #343a40;">Project Monitoring</h1>
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body p-4">
                <a href="{{ route('projects.create') }}" class="btn btn-primary mb-4"><i class="bi bi-plus-lg"></i> Tambah Project</a>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light text-secondary">
                            <tr>
                                <th>PROJECT NAME</th>
                                <th>CLIENT</th>
                                <th>PROJECT LEADER</th>
                                <th>START DATE</th>
                                <th>END DATE</th>
                                <th>PROGRESS</th>
                                <th class="text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($projects as $project)
                                @if ($project)
                                <tr>
                                    <td class="fw-medium">{{ $project->project_name }}</td>
                                    <td>{{ $project->client }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if ($project->project_leader_avatar)
                                                <img class="rounded-circle me-3" src="{{ asset('storage/' . $project->project_leader_avatar) }}" alt="{{ $project->project_leader_name }}" width="40" height="40">
                                            @else
                                                <div class="avatar-initials me-3">
                                                    {{ strtoupper(substr($project->project_leader_name, 0, 2)) }}
                                                </div>
                                            @endif
                                            <div>
                                                <div class="fw-medium">{{ $project->project_leader_name }}</div>
                                                <div class="small text-muted">{{ $project->project_leader_email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($project->start_date)->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($project->end_date)->format('d M Y') }}</td>
                                    
                                    <td style="min-width: 150px;">
                                        <div class="d-flex align-items-center">
                                            <div class="progress flex-grow-1" style="height: 8px;">
                                                <div class="progress-bar {{ $project->progress == 100 ? 'bg-success' : 'bg-primary' }}" role="progressbar" style="width: {{ $project->progress }}%;" aria-valuenow="{{ $project->progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="small fw-medium ms-2">{{ $project->progress }}%</span>
                                        </div>
                                    </td>
                                    
                                    <td class="text-center text-nowrap">
                                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-success action-btn me-1">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger action-btn" onclick="return confirm('Anda yakin ingin menghapus project ini?');">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">Belum ada project.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
