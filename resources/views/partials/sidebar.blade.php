<div class="sidebar">
    <h3 style="color: #fff; text-align: center;">Menu</h3>
    <a href="{{ route('dashboard.index') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a>
    <a href="{{ route('users.index') }}" class="{{ request()->is('users*') ? 'active' : '' }}">User</a>
    <a href="{{ route('materis.index') }}" class="{{ request()->is('materis*') ? 'active' : '' }}">Materi</a>
    <a href="{{ route('soals.index') }}" class="{{ request()->is('soals*') ? 'active' : '' }}">Soal</a>
    <a href="{{ route('ujian.index') }}" class="{{ request()->is('ujian*') ? 'active' : '' }}">Ujian</a>
    
    <!-- Tambah menu lainnya di sini -->
</div>
