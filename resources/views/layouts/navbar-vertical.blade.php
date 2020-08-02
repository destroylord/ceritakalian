<nav>
    <b>Master</b>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link{{ request()->is('dashboard') ? ' btn-primary' : '' }}" href="{{ route('home') }}">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ request()->is('story/my-stories') ? ' btn-primary' : '' }}" href="{{ route('stories.index') }}">Ceritaku</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ request()->is('story/trash') ? ' btn-primary' : '' }} " href="{{ route('stories.trash') }}">Tong Sampah</a>
        </li>
    </ul>
</nav>
<hr>
<nav>
    <b>Setting</b>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link{{ request()->is('setting/profil') ? ' btn-primary' : '' }}" href="{{ route('profil') }} " href="{{ route('profil') }}">Profil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ request()->is('setting/change-password') ? ' btn-primary' : '' }}" href="{{ route('setting.password') }}">Change Password</a>
        </li>
    </ul>
</nav>
<hr>
<nav>
    <b>Lainnya</b>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="#">wishlist</a>
        </li>
    </ul>
</nav>