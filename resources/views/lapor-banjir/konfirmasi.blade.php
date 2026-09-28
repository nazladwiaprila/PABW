<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Laporan Banjir</title>
    <link rel="stylesheet" href="{{ asset('css/lapor-banjir.css') }}">
</head>
<body>
    <main class="container">
        <h1>Konfirmasi Laporan Banjir</h1>
        <p>Laporan Anda telah berhasil dikirim.</p>

        <div class="data-laporan">
            <p>Nama Pelapor: {{ $laporan['nama_pelapor'] }}</p>
            <p>Lokasi Kejadian: {{ $laporan['lokasi'] }}</p>
            <p>Tinggi Genangan Air: {{ $laporan['tinggi_genangan'] }} cm</p>
        </div>

        <a class="button" href="{{ route('lapor-banjir.create') }}">Buat Laporan Baru</a>
    </main>
</body>
</html>
