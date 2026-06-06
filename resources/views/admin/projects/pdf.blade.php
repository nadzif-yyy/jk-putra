<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Project</title>
    <style>
        /* Tambahan style agar tulisan watermark rapi dan tidak merusak tabel utama */
        .watermark-tugas {
            text-align: right;
            font-family: sans-serif;
            font-size: 11px;
            color: #888;
            font-style: italic;
            margin-bottom: 15px;
            border-bottom: 1px dashed #ccc;
            padding-bottom: 5px;
        }
        body {
            font-family: sans-serif;
        }
    </style>
</head>
<body>

    <div class="watermark-tugas">
        Tugas Portofolio - Cikal | NIM: 241011750090 | Tanggal Cetak: {{ $date }}
    </div>

    <h1>Data Projects</h1>
    <table border="1" cellPadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Title</th>
                <th>Teknologi</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $index => $project)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    @if($project->image)
                        <img src="{{ public_path('images/' . $project->image) }}" alt="{{ $project->title }}" style="max-width: 100px;">
                    @else
                        <span>No Image</span>
                    @endif
                </td>
                <td>{{ $project->title }}</td>
                <td>{{ $project->teknologi }}</td>
                <td>{{ $project->description }}</td>
                <td>{{ $project->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>