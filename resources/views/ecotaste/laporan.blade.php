<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Laporan Limbah | EcoTaste</title><link rel="stylesheet" href="{{ asset('css/ecotaste.css') }}"></head>
<body class="app-page">
    @include('ecotaste.partials.nav')
    <main class="content-wrap"><header class="page-heading"><p class="eyebrow">DASHBOARD ECOTASTE</p><h1>Laporan Limbah</h1><p>Catat pengelolaan limbah restoran untuk mendukung praktik yang lebih berkelanjutan.</p></header>
        @if (session('status'))<div class="alert">{{ session('status') }}</div>@endif
        @if ($errors->any())<div class="alert alert-error">{{ $errors->first() }}</div>@endif
        <section class="panel"><div class="panel-heading"><div><h2>Formulir Pelaporan Pembuangan Limbah</h2><p class="muted">Isi data laporan di bawah ini.</p></div><span class="panel-tag">INPUT DATA</span></div>
            <form action="{{ route('ecotaste.laporan.store') }}" method="POST" class="report-grid">
                @csrf
                <div class="form-group"><label for="tanggal">Tanggal</label><input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" required></div>
                <div class="form-group"><label for="jenis_limbah">Jenis Limbah</label><select id="jenis_limbah" name="jenis_limbah" required><option value="">Pilih jenis</option><option>Organik</option><option>Anorganik</option><option>Minyak Jelantah</option></select></div>
                <div class="form-group"><label for="berat">Berat (kg)</label><input type="number" id="berat" name="berat" min="0.1" step="0.1" placeholder="0,0" required></div>
                <div class="form-group"><label for="metode">Metode Pembuangan</label><input id="metode" name="metode" placeholder="Kompos, daur ulang, vendor" required></div>
                <div class="form-group form-wide"><label for="catatan">Catatan</label><input id="catatan" name="catatan" placeholder="Opsional"></div>
                <div class="form-wide form-submit"><button class="btn" type="submit">Simpan Laporan</button></div>
            </form>
        </section>
        <section class="panel"><div class="panel-heading"><div><h2>Daftar Laporan Limbah</h2><p class="muted">Laporan tersimpan sementara selama sesi ini.</p></div></div>
            <div class="table-scroll"><table><thead><tr><th>No.</th><th>Tanggal</th><th>Jenis</th><th>Berat</th><th>Metode</th><th>Status</th></tr></thead><tbody>
                @forelse ($reports as $report)<tr><td>{{ $loop->iteration }}</td><td>{{ $report['tanggal'] }}</td><td>{{ $report['jenis_limbah'] }}</td><td>{{ $report['berat'] }} kg</td><td>{{ $report['metode'] }}</td><td><span class="badge">{{ $report['status'] }}</span></td></tr>@empty<tr><td colspan="6" class="empty-state">Belum ada laporan limbah.</td></tr>@endforelse
            </tbody></table></div>
        </section>
    </main>
    <footer class="app-footer">EcoTaste · Kuliner baik, bumi lebih sehat.</footer>
</body>
</html>
