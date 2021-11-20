<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('dashboard.index') }}">
            <span class="align-middle me-3">{{ env("APP_NAME") }}</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                General
            </li>
            <li class="sidebar-item {{ request()->is('dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="/">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->is('product*') ? 'active' : '' }} ">
                <a data-target="#bins" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="credit-card"></i>
                    <span class="align-middle">PRODUCTS</span>
                </a>
                <ul id="bins"
                    class="sidebar-dropdown list-unstyled collapse {{ request()->is('product*') ? 'show' : '' }}"
                    data-parent="#sidebar">

                    <li class="sidebar-item {{ request()->is('product') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{route('product.index')}}">
                            <i class="align-middle" data-feather="credit-card"></i>
                            <span class="align-middle">All Products</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->is('product/create') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{route('product.create')}}">
                            <i class="align-middle" data-feather="plus-square"></i>
                            <span class="align-middle">Add New PRODUCT</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
