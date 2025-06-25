<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Monitoring</title>
    
    {{-- LANGKAH 2.1: Tambahkan Link CSS Bootstrap dari CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Project Monitoring</h1>
            <a href="#" class="btn btn-primary">Add New Project</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    {{-- Kode tabel Anda tetap sama, karena sudah menggunakan kelas Bootstrap --}}
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
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
                            <tr>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->client }}</td>
                                <td>{{ $project->project_leader }}</td>
                                <td>{{ \Carbon\Carbon::parse($project->start_date)->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($project->end_date)->format('d M Y') }}</td>
                                <td>
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar" role="progressbar" style="width: {{ $project->progress }}%;" aria-valuenow="{{ $project->progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-outline-secondary">&#9998;</a>
                                    <a href="#" class="btn btn-sm btn-outline-danger">&#128465;</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">No projects found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- LANGKAH 2.2: Tambahkan Link JavaScript Bootstrap dari CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>