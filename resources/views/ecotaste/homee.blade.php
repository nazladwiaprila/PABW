<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Beranda | EcoTaste</title><link rel="stylesheet" href="{{ asset('css/ecotaste.css') }}"></head>
<body class="app-page">
    @include('ecotaste.partials.nav')
    <main class="dashboard-wrap">
        <section class="welcome-banner"><div><p class="eyebrow">ECO TASTE COMMUNITY</p><h1>Selamat Datang, {{ session('ecotaste_user.username') }}!</h1><p>Temukan rekomendasi kuliner dan bantu restoran menjadi lebih ramah lingkungan.</p></div><div class="banner-symbol" aria-hidden="true">✦</div></section>
        <section class="contribute-card"><div><p class="eyebrow">MULAI KONTRIBUSI</p><h2>Punya pengalaman di restoran favoritmu?</h2><p class="muted">Bagikan rating atau catat pengelolaan limbah restoran.</p></div><div class="contribute-actions"><a class="btn" href="{{ route('ecotaste.rating') }}">Beri Rating</a><a class="btn btn-secondary" href="{{ route('ecotaste.laporan') }}">Laporan Limbah</a></div></section>
        <div class="section-heading"><div><p class="eyebrow">JELAJAHI ECOTASTE</p><h2>Kontribusi Pilihan</h2></div></div>
        <section class="feature-grid">
            <a class="feature-card" href="{{ route('ecotaste.rating') }}"><span class="feature-icon">★</span><h3>Rating Konsumen</h3><p>Bantu pengguna lain memilih restoran dengan ulasanmu.</p><span class="text-link">Beri rating <span aria-hidden="true">→</span></span></a>
            <a class="feature-card" href="{{ route('ecotaste.laporan') }}"><span class="feature-icon">↻</span><h3>Laporan Limbah</h3><p>Catat jenis, berat, dan metode pengolahan limbah.</p><span class="text-link">Buat laporan <span aria-hidden="true">→</span></span></a>
        </section>
        <section class="recent-panel"><div class="section-heading"><div><p class="eyebrow">AKTIVITAS</p><h2>Laporan Limbah Terbaru</h2></div><a class="text-link" href="{{ route('ecotaste.laporan') }}">Lihat semua →</a></div>
            @forelse (session('ecotaste_reports', []) as $report)
                @if ($loop->first)<div class="activity-row"><span class="status-dot"></span><div><strong>{{ $report['jenis_limbah'] }}</strong><p>{{ $report['tanggal'] }} · {{ $report['metode'] }}</p></div><span class="activity-value">{{ $report['berat'] }} kg</span></div>@endif
            @empty
                <p class="empty-state">Belum ada laporan. Mulai dengan mencatat pengelolaan limbah restoran.</p>
            @endforelse
        </section>
    </main>
    <footer class="app-footer">EcoTaste · Kuliner baik, bumi lebih sehat.</footer>
</body>
</html>
