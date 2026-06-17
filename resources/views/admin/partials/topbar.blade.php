<div class="topbar">
    <div class="d-flex align-items-center gap-3">
        <button class="icon-btn d-lg-none border-0" id="sidebarToggle" aria-label="Toggle sidebar">
            <i class="bi bi-list"></i>
        </button>
        <div class="search-wrap">
            <i class="bi bi-search"></i>
            <input type="search" class="search-input" placeholder="{{ $searchPlaceholder ?? 'Search…' }}">
        </div>
    </div>
    <div class="topbar-actions">
        <a class="icon-btn" id="themeToggle" title="Toggle theme" aria-label="Toggle theme">
            <i class="bi bi-moon-stars"></i>
        </a>
        <a class="icon-btn" title="Notifications">
            <i class="bi bi-bell"></i>
            <span class="notif-dot"></span>
        </a>
        <div class="dropdown">
            <div class="avatar-btn" data-bs-toggle="dropdown" aria-expanded="false" role="button" aria-label="User menu">
                <img src="https://ui-avatars.com/api/?name=Admin+User&background=3b82f6&color=fff" alt="Admin">
            </div>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('profile.show') }}"><i class="bi bi-person me-2"></i>Profile</a></li>
                <li><a class="dropdown-item" href="{{ route('panel.settings.index') }}"><i class="bi bi-gear me-2"></i>Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item logout-link text-danger" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
            </ul>
        </div>
    </div>
</div>
