<nav class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-logo">
            <i class="bi bi-layers text-white" style="font-size:.9rem;"></i>
        </div>
        <h5 class="nav-text">LOOMA</h5>
    </div>

    <div class="sidebar-nav">
        <div class="nav-section nav-text">Main</div>

        <a class="nav-link {{ request()->routeIs('panel.dashboard*') ? 'active' : '' }}" href="{{ route('panel.dashboard') }}">
            <i class="bi bi-speedometer2"></i>
            <span class="nav-text">Dashboard</span>
        </a>
        <a class="nav-link {{ request()->routeIs('panel.products*') ? 'active' : '' }}" href="{{ route('panel.products.index') }}">
            <i class="bi bi-box-seam"></i>
            <span class="nav-text">Products</span>
        </a>
        <a class="nav-link {{ request()->routeIs('panel.orders*') ? 'active' : '' }}" href="{{ route('panel.orders.index') }}">
            <i class="bi bi-cart3"></i>
            <span class="nav-text">Orders</span>
        </a>
        <a class="nav-link {{ request()->routeIs('panel.customers*') ? 'active' : '' }}" href="{{ route('panel.customers.index') }}">
            <i class="bi bi-people"></i>
            <span class="nav-text">Customers</span>
        </a>

        <div class="nav-section nav-text" style="margin-top:.75rem;">System</div>

        <a class="nav-link {{ request()->routeIs('panel.settings*') ? 'active' : '' }}" href="{{ route('panel.settings.index') }}">
            <i class="bi bi-gear"></i>
            <span class="nav-text">Settings</span>
        </a>
    </div>

    <div class="sidebar-footer">
        <a class="nav-link logout-link" href="#"
           data-bs-toggle="modal" data-bs-target="#logoutModal"
           style="color:var(--text-muted);padding:.75rem 1.5rem;display:flex;align-items:center;gap:.875rem;font-weight:500;font-size:13.5px;border-left:3px solid transparent;transition:var(--transition);text-decoration:none;">
            <i class="bi bi-box-arrow-right" style="font-size:1.15rem;width:20px;text-align:center;flex-shrink:0;"></i>
            <span class="nav-text">Logout</span>
        </a>
    </div>
</nav>
