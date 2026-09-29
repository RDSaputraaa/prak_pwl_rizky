<header class="site-header">
    <div class="nav-wrap">
        <a class="brand" href="{{ route('users.index') }}">
            <span class="brand-mark" aria-hidden="true">R</span>
            <span>Ruang Akademik</span>
        </a>
        <nav class="nav-links" aria-label="Navigasi utama">
            <a class="nav-link" href="{{ route('users.index') }}" @if (request()->routeIs('users.index')) aria-current="page" @endif>Daftar pengguna</a>
            <a class="nav-link" href="{{ route('users.create') }}" @if (request()->routeIs('users.create')) aria-current="page" @endif>Tambah pengguna</a>
        </nav>
    </div>
</header>