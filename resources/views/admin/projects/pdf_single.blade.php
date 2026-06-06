<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Project - {{ $project->title }}</title>
    <style>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
            vertical-align: top;
        }
        th {
            width: 30%;
            background-color: #f4f4f4;
        }
        .text-center {
            text-align: center;
        }
        .project-image {
            max-width: 300px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 5px;
        }
    </style>
</head>
<body>

    <div class="watermark-tugas">
        Tugas Portofolio - Cikal | NIM: 241011750090 | Tanggal Cetak: {{ $date }}
    </div>

    <h2 class="text-center">Detail Project</h2>

    <div class="text-center">
        @if($project->image)
            <img src="{{ public_path('images/' . $project->image) }}" class="project-image" alt="{{ $project->title }}">
        @else
            <p><i>Tidak ada gambar</i></p>
        @endif
    </div>

    <table>
        <tr>
            <th>Nama Project</th>
            <td>{{ $project->title }}</td>
        </tr>
        <tr>
            <th>Teknologi</th>
            <td>{{ $project->teknologi }}</td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td>{{ $project->description }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ ucfirst($project->status) }}</td>
        </tr>
    </table>

</body>
</html>