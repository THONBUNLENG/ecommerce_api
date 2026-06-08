<nav class="admin-sidebar">
    <div class="admin-logo">
        <a href="{{ route('panel.dashboard') }}" class="d-flex align-items-center text-white text-decoration-none">
            <img src="{{ asset('img/looma_logo.png') }}" alt="Logo" height="32">
            <span class="ms-2 fw-bold fs-5">Admin Panel</span>
        </a>
    </div>
    <ul class="nav flex-column admin-nav py-3">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('panel.dashboard') ? 'active' : '' }}" 
               href="{{ route('panel.dashboard') }}">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                </svg>
                <span class="nav-text">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('panel.orders.*') ? 'active' : '' }}" 
               href="{{ route('panel.orders.index') }}">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
                </svg>
                <span class="nav-text">Orders</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('panel.products.*') ? 'active' : '' }}" 
               href="{{ route('panel.products.index') }}">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20 2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6l-4-4zm-2 12H6v-2h12v2zm0-4H6V8h12v2zm-4 8H6v-2h8v2zm4-8V4l2 2h-2z"/>
                </svg>
                <span class="nav-text">Products</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('panel.customers.*') ? 'active' : '' }}" 
               href="{{ route('panel.customers.index') }}">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
                <span class="nav-text">Customers</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('panel.settings.*') ? 'active' : '' }}" 
               href="{{ route('panel.settings.index') }}">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19.14 12.94c.04-.31.06-.63.06-.94 0-.31-.02-.63-.06-.94l2.03-1.58a.49.49 0 00.12-.61l-1.92-3.32a.49.49 0 00-.59-.22l-2.39.96c-.5-.38-1.03-.7-1.62-.94l-.36-2.54a.484.484 0 00-.48-.41h-3.84c-.24 0-.43.17-.47.41l-.36 2.54c-.59.24-1.13.57-1.62.94l-2.39-.96c-.22-.08-.47 0-.59.22L2.74 8.87c-.12.21-.08.47.12.61l2.03 1.58c-.04.31-.06.63-.06.94s.02.63.06.94l-2.03 1.58a.49.49 0 00-.12.61l1.92 3.32c.12.22.37.29.59.22l2.39-.96c.5.38 1.03.7 1.62.94l.36 2.54c.05.24.24.41.48.41h3.84c.24 0 .44-.17.47-.41l.36-2.54c.59-.24 1.13-.56 1.62-.94l2.39.96c.22.08.47 0 .59-.22l1.92-3.32c.12-.22.07-.47-.12-.61l-2.01-1.58zM12 15.6A3.6 3.6 0 1115.6 12 3.611 3.611 0 0112 15.6z"/>
                </svg>
                <span class="nav-text">Settings</span>
            </a>
        </li>
        <li class="nav-item mt-auto">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="nav-link border-0 bg-transparent w-100 text-start">
                    <svg fill="currentColor" viewBox="0 0 24 24">
                        <path d="M16 13v-2H7V8l-5 4 5 4v-3h9zM20 3H4c-1.1 0-2 .9-2 2v4h2V5h16v14H4v-4H2v4c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/>
                    </svg>
                    <span class="nav-text">Logout</span>
                </button>
            </form>
        </li>
    </ul>
</nav>
