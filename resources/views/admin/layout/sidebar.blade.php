<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">SPK Obat</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">HERB</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ request()->is('/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Menu</li>
            <li class="{{ request()->segment(2) == 'pegawai' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pegawai.index') }}">
                    <i class="fas fa-user-tie"></i>
                    <span>Pegawai</span>
                </a>
            </li>
            <li class="{{ request()->segment(2) == 'kriteria' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kriteria.index') }}">
                    <i class="fas fa-list-alt"></i>
                    <span>Kriteria</span>
                </a>
            </li>
            <li class="menu-header">Perhitungan SPK</li>
            <li class="{{ request()->segment(2) == 'roc' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('roc.index') }}">
                    <i class="fas fa-calculator" aria-hidden="true"></i>
                    <span>ROC</span>
                </a>
            </li>
            <li class="{{ request()->segment(2) == 'moora' ? 'active' : '' }}">
                <a class="nav-link" href="/admin/moora">
                    <i class="fas fa-laptop-code" aria-hidden="true"></i>
                    <span>Moora</span>
                </a>
            </li>
            <li class="menu-header">Manajemen Web</li>
            <li class="{{ request()->segment(2) == 'user' ? 'active' : '' }}">
                <a class="nav-link" href="/admin/user">
                    <i class="fas fa-user-lock    "></i>
                    <span>Customer</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
