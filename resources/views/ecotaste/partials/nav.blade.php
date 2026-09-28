<header class="topbar">
    <a class="brand" href="{{ route('ecotaste.home') }}"><span class="brand-mark">E</span> EcoTaste</a>
    <nav class="topnav" aria-label="Navigasi utama">
        <a href="{{ route('ecotaste.home') }}" class="{{ request()->routeIs('ecotaste.home') ? 'active' : '' }}">Beranda</a>
        <a href="{{ route('ecotaste.laporan') }}" class="{{ request()->routeIs('ecotaste.laporan*') ? 'active' : '' }}">Laporan Limbah</a>
        <a href="{{ route('ecotaste.rating') }}" class="{{ request()->routeIs('ecotaste.rating*') ? 'active' : '' }}">Rating</a>
    </nav>
    <div class="topbar-user"><span>Halo, {{ session('ecotaste_user.username') }}</span><form action="{{ route('ecotaste.logout') }}" method="POST">@csrf<button class="btn btn-small btn-outline" type="submit">Logout</button></form></div>
</header>
