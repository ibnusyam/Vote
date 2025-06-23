<div class="sidebar d-flex flex-column flex-shrink-0 p-3">
    <div class="sidebar-header d-flex align-items-center">
        <h4 class="mb-0 text-white">E-VOTING</h4>
    </div>

    <div class="profile-section my-4">
        <div class="d-flex align-items-center">
            <img src="https://i.pravatar.cc/60?img=1" alt="User" class="rounded-circle">
            <div class="ms-3">
                <h6 class="text-white mb-0">Lorem Ipsum</h6>
                <small class="text-white-50">Pemilih (Aktif)</small>
            </div>
        </div>
    </div>

    <span class="nav-title">NAVIGASI UTAMA</span>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            {{-- Mengarah ke rute 'dashboard' dan aktif jika rute saat ini adalah 'dashboard' --}}
            <a href="{{ route('admin') }}" class="nav-link {{ request()->routeIs('admin') ? 'active' : '' }}">
                <i class="bi bi-house-door-fill me-2"></i> Dashboard
            </a>
        </li>
        <li>
            {{-- Mengarah ke rute 'candidate.index' dan aktif jika rute saat ini adalah 'candidate.index' (atau rute anak dari 'candidate.*') --}}
            <a href="{{ route('candidate') }}" class="nav-link {{ request()->routeIs('candidate') ? 'active' : '' }}">
                <i class="bi bi-inbox-fill me-2"></i> Kandidat
            </a>
        </li>
        <li>
            {{-- Mengarah ke rute 'candidate.index' dan aktif jika rute saat ini adalah 'candidate.index' (atau rute anak dari 'candidate.*') --}}
            <a href="{{ route('voter') }}" class="nav-link {{ request()->routeIs('voter') ? 'active' : '' }}">
                <i class="bi bi-inbox-fill me-2"></i> Voter
            </a>
        </li>

    </ul>
</div>
