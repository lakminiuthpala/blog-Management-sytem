<li class="nav-item">
    <a href="{{ route('blogs.index') }}" class="nav-link {{ Request::is('blogs') ? 'active' : '' }}">
        <i class="nav-icon fas fa-globe"></i>
        <p>Blogs</p>
    </a>
</li>



<li class="nav-item">
    <a href="#" class="nav-link"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="nav-icon fas fa-power-off"></i>
        Sign out
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</li>
