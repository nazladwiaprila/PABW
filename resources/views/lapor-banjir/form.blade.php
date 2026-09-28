<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Lapor Banjir</title>
    <link rel="stylesheet" href="{{ asset('css/lapor-banjir.css') }}">
</head>
<body>
    <main class="container">
        <h1>LaporBanjir</h1>
        <p>BPBD Kabupaten Bandung</p>
        <p>Silakan isi data laporan banjir berikut.</p>

        <form action="{{ route('lapor-banjir.store') }}" method="POST">
            @csrf

            <label for="nama_pelapor">Nama Pelapor:</label>
            <input id="nama_pelapor" name="nama_pelapor" type="text" value="{{ old('nama_pelapor') }}" required>
            @error('nama_pelapor')
                <small class="error">{{ $message }}</small>
            @enderror

            <label for="lokasi">Lokasi Kejadian:</label>
            <input id="lokasi" name="lokasi" type="text" value="{{ old('lokasi') }}" required>
            @error('lokasi')
                <small class="error">{{ $message }}</small>
            @enderror

            <label for="tinggi_genangan">Tinggi Genangan Air (cm):</label>
            <input id="tinggi_genangan" name="tinggi_genangan" type="number" value="{{ old('tinggi_genangan') }}" min="0" step="0.1" required>
            @error('tinggi_genangan')
                <small class="error">{{ $message }}</small>
            @enderror

            <button type="submit">Kirim Laporan</button>
        </form>
    </main>
</body>
</html>
