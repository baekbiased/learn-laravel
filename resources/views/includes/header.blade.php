<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown" aria-expanded="false">
                    <img
                        src="https://ui-avatars.com/api/?name={{Auth::user()->name}}&background=293042&color=ffffff"
                        class="avatar img-fluid rounded-circle mr-1"
                    />


                    <span class="text-dark">{{Auth::user()->name}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="/">
                        <i class="align-middle me-1" data-feather="user"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Sign out</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
