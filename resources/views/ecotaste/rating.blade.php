<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Rating Konsumen | EcoTaste</title><link rel="stylesheet" href="{{ asset('css/ecotaste.css') }}"></head>
<body class="app-page">
    @include('ecotaste.partials.nav')
    <main class="content-wrap"><header class="page-heading"><p class="eyebrow">DASHBOARD ECOTASTE</p><h1>Rating Konsumen</h1><p>Bagikan pengalamanmu untuk membantu orang lain menemukan kuliner yang tepat.</p></header>
        @if (session('status'))<div class="alert">{{ session('status') }}</div>@endif
        @if ($errors->any())<div class="alert alert-error">{{ $errors->first() }}</div>@endif
        <section class="panel rating-panel"><div class="panel-heading"><div><h2>Beri Rating Restoran</h2><p class="muted">Ulasanmu disimpan sementara selama sesi ini.</p></div></div>
            <form action="{{ route('ecotaste.rating.store') }}" method="POST">
                @csrf
                <div class="form-group"><label for="restoran">Nama Restoran</label><input id="restoran" name="restoran" placeholder="Contoh: Nasi Ngawur" required></div>
                <div class="form-group"><label for="rating">Rating</label><select id="rating" name="rating" required><option value="">Pilih rating</option><option value="5">5 - Sangat baik</option><option value="4">4 - Baik</option><option value="3">3 - Cukup</option><option value="2">2 - Kurang</option><option value="1">1 - Buruk</option></select></div>
                <div class="form-group"><label for="ulasan">Ulasan</label><textarea id="ulasan" name="ulasan" rows="4" placeholder="Ceritakan pengalamanmu (opsional)"></textarea></div>
                <button class="btn" type="submit">Kirim Rating</button>
            </form>
        </section>
        <section class="panel"><div class="panel-heading"><div><h2>Rating Terbaru</h2></div></div><div class="rating-list">
            @forelse ($ratings as $item)<article class="rating-item"><div><strong>{{ $item['restoran'] }}</strong><p>{{ $item['username'] }} · {{ $item['ulasan'] ?: 'Tanpa ulasan' }}</p></div><span class="rating-score">★ {{ $item['rating'] }}.0</span></article>@empty<p class="empty-state">Belum ada rating konsumen.</p>@endforelse
        </div></section>
    </main>
    <footer class="app-footer">EcoTaste · Kuliner baik, bumi lebih sehat.</footer>
</body>
</html>
