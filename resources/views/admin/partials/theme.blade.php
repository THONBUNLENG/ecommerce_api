<script>
(function () {
    try {
        var stored = localStorage.getItem('looma-admin-theme');
        var theme = stored === 'light' ? 'light' : 'dark';
        document.documentElement.setAttribute('data-theme', theme);
        document.documentElement.setAttribute('data-bs-theme', theme);
    } catch (e) {
        document.documentElement.setAttribute('data-theme', 'dark');
        document.documentElement.setAttribute('data-bs-theme', 'dark');
    }
}());
</script>

<style>
html[data-theme="dark"] {
    --admin-bg-base: #0f172a;
    --admin-bg-gradient: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    --admin-bg-elevated: rgba(15, 23, 42, 0.98);
    --admin-bg-card: rgba(30, 41, 59, 0.7);
    --admin-bg-card-solid: #1e293b;
    --admin-bg-input: rgba(255, 255, 255, 0.04);
    --admin-bg-input-focus: rgba(255, 255, 255, 0.07);
    --admin-bg-button: rgba(255, 255, 255, 0.04);
    --admin-bg-button-hover: rgba(255, 255, 255, 0.08);
    --admin-border: rgba(255, 255, 255, 0.06);
    --admin-border-strong: rgba(255, 255, 255, 0.12);
    --admin-text-primary: #f1f5f9;
    --admin-text-muted: #94a3b8;
    --admin-text-faint: #64748b;
    --admin-brand-blue: #0066ff;
    --admin-brand-blue-hover: #2563eb;
}

html[data-theme="light"] {
    --admin-bg-base: #f8fafc;
    --admin-bg-gradient: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    --admin-bg-elevated: rgba(255, 255, 255, 0.96);
    --admin-bg-card: rgba(255, 255, 255, 0.9);
    --admin-bg-card-solid: #ffffff;
    --admin-bg-input: #ffffff;
    --admin-bg-input-focus: #f8fafc;
    --admin-bg-button: rgba(15, 23, 42, 0.04);
    --admin-bg-button-hover: rgba(15, 23, 42, 0.07);
    --admin-border: rgba(15, 23, 42, 0.08);
    --admin-border-strong: rgba(15, 23, 42, 0.14);
    --admin-text-primary: #0f172a;
    --admin-text-muted: #64748b;
    --admin-text-faint: #94a3b8;
    --admin-brand-blue: #0066ff;
    --admin-brand-blue-hover: #2563eb;
}

html[data-theme="dark"] body,
html[data-theme="light"] body {
    background: var(--admin-bg-gradient);
    color: var(--admin-text-primary);
}

html[data-theme="dark"] .sidebar,
html[data-theme="light"] .sidebar {
    background: var(--admin-bg-elevated);
    border-right: 1px solid var(--admin-border);
}

html[data-theme="dark"] .sidebar-brand,
html[data-theme="light"] .sidebar-brand {
    border-bottom-color: var(--admin-border);
}

html[data-theme="dark"] .brand-logo,
html[data-theme="light"] .brand-logo {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
}

html[data-theme="dark"] .sidebar-brand h4,
html[data-theme="light"] .sidebar-brand h4,
html[data-theme="dark"] .sidebar-brand h5,
html[data-theme="light"] .sidebar-brand h5 {
    color: var(--admin-text-primary);
}

html[data-theme="dark"] .nav-section,
html[data-theme="light"] .nav-section {
    color: var(--admin-text-faint);
}

html[data-theme="dark"] .sidebar-nav .nav-link,
html[data-theme="light"] .sidebar-nav .nav-link {
    color: var(--admin-text-muted);
}

html[data-theme="dark"] .sidebar-nav .nav-link:hover,
html[data-theme="light"] .sidebar-nav .nav-link:hover {
    background: rgba(59, 130, 246, 0.08);
    color: var(--admin-text-primary);
}

html[data-theme="dark"] .sidebar-nav .nav-link.active,
html[data-theme="light"] .sidebar-nav .nav-link.active {
    background: rgba(59, 130, 246, 0.12);
    color: #ffffff;
    border-left-color: var(--admin-brand-blue);
}

html[data-theme="dark"] .main-content,
html[data-theme="light"] .main-content {
    color: var(--admin-text-primary);
}

html[data-theme="dark"] .topbar,
html[data-theme="light"] .topbar,
html[data-theme="dark"] .navbar,
html[data-theme="light"] .navbar {
    background: var(--admin-bg-elevated);
    border-bottom-color: var(--admin-border);
}

html[data-theme="dark"] .search-input,
html[data-theme="light"] .search-input,
html[data-theme="dark"] .search-bar,
html[data-theme="light"] .search-bar {
    background: var(--admin-bg-input);
    border-color: var(--admin-border);
    color: var(--admin-text-primary);
}

html[data-theme="dark"] .search-input::placeholder,
html[data-theme="light"] .search-input::placeholder,
html[data-theme="dark"] .search-bar::placeholder,
html[data-theme="light"] .search-bar::placeholder {
    color: var(--admin-text-faint);
}

html[data-theme="dark"] .search-input:focus,
html[data-theme="light"] .search-input:focus,
html[data-theme="dark"] .search-bar:focus,
html[data-theme="light"] .search-bar:focus {
    background: var(--admin-bg-input-focus);
    border-color: rgba(0, 102, 255, 0.5);
}

html[data-theme="dark"] .icon-btn,
html[data-theme="light"] .icon-btn {
    background: var(--admin-bg-button);
    border-color: var(--admin-border);
    color: var(--admin-text-muted);
}

html[data-theme="dark"] .icon-btn:hover,
html[data-theme="light"] .icon-btn:hover {
    background: var(--admin-bg-button-hover);
    color: var(--admin-text-primary);
}

html[data-theme="dark"] .navbar .nav-icon,
html[data-theme="light"] .navbar .nav-icon {
    color: var(--admin-text-muted);
}

html[data-theme="dark"] .navbar .nav-icon:hover,
html[data-theme="light"] .navbar .nav-icon:hover {
    color: var(--admin-text-primary);
}

html[data-theme="dark"] .avatar-btn,
html[data-theme="light"] .avatar-btn {
    border-color: rgba(0, 102, 255, 0.4);
}

html[data-theme="dark"] .dropdown-menu,
html[data-theme="light"] .dropdown-menu {
    background: var(--admin-bg-card-solid);
    border-color: var(--admin-border);
    color: var(--admin-text-primary);
}

html[data-theme="dark"] .dropdown-item,
html[data-theme="light"] .dropdown-item {
    color: var(--admin-text-muted);
}

html[data-theme="dark"] .dropdown-item:hover,
html[data-theme="light"] .dropdown-item:hover {
    background: var(--admin-bg-button-hover);
    color: var(--admin-text-primary);
}

html[data-theme="dark"] .dropdown-divider,
html[data-theme="light"] .dropdown-divider {
    border-color: var(--admin-border);
}

html[data-theme="dark"] .card-panel,
html[data-theme="light"] .card-panel,
html[data-theme="dark"] .admin-card,
html[data-theme="light"] .admin-card,
html[data-theme="dark"] .chart-card,
html[data-theme="light"] .chart-card,
html[data-theme="dark"] .metric-card,
html[data-theme="light"] .metric-card,
html[data-theme="dark"] .stat-mini,
html[data-theme="light"] .stat-mini {
    background: var(--admin-bg-card);
    border-color: var(--admin-border);
}

html[data-theme="dark"] .page-header h4,
html[data-theme="light"] .page-header h4,
html[data-theme="dark"] .page-header p,
html[data-theme="light"] .page-header p {
    color: var(--admin-text-primary);
}

html[data-theme="dark"] .page-header p,
html[data-theme="light"] .page-header p {
    color: var(--admin-text-faint);
}

html[data-theme="dark"] .form-control,
html[data-theme="light"] .form-control,
html[data-theme="dark"] .form-select,
html[data-theme="light"] .form-select {
    background: var(--admin-bg-input);
    border-color: var(--admin-border);
    color: var(--admin-text-primary);
}

html[data-theme="dark"] .form-control:focus,
html[data-theme="light"] .form-control:focus,
html[data-theme="dark"] .form-select:focus,
html[data-theme="light"] .form-select:focus {
    background: var(--admin-bg-input-focus);
    border-color: var(--admin-brand-blue);
    color: var(--admin-text-primary);
}

html[data-theme="dark"] .form-control::placeholder,
html[data-theme="light"] .form-control::placeholder {
    color: var(--admin-text-faint);
}

html[data-theme="dark"] .form-select option,
html[data-theme="light"] .form-select option {
    background: var(--admin-bg-card-solid);
    color: var(--admin-text-primary);
}

html[data-theme="dark"] .form-label,
html[data-theme="light"] .form-label,
html[data-theme="dark"] .form-section-title,
html[data-theme="light"] .form-section-title {
    color: var(--admin-text-muted);
}

html[data-theme="dark"] .table,
html[data-theme="light"] .table {
    color: var(--admin-text-primary);
    --bs-table-bg: transparent;
    --bs-table-color: var(--admin-text-primary);
    --bs-table-border-color: var(--admin-border);
    --bs-table-hover-bg: rgba(59, 130, 246, 0.05);
}

html[data-theme="dark"] .table thead th,
html[data-theme="light"] .table thead th {
    background: rgba(59, 130, 246, 0.05);
    border-bottom-color: var(--admin-border);
    color: var(--admin-text-faint);
}

html[data-theme="dark"] .table tbody td,
html[data-theme="light"] .table tbody td {
    background-color: transparent;
    border-bottom-color: var(--admin-border);
}

html[data-theme="dark"] .table tbody tr:hover,
html[data-theme="light"] .table tbody tr:hover {
    background: rgba(59, 130, 246, 0.05);
}

html[data-theme="dark"] .action-btn,
html[data-theme="light"] .action-btn,
html[data-theme="dark"] .img-mgr-btn,
html[data-theme="light"] .img-mgr-btn,
html[data-theme="dark"] .btn-reset,
html[data-theme="light"] .btn-reset {
    background: var(--admin-bg-button);
    border-color: var(--admin-border);
    color: var(--admin-text-muted);
}

html[data-theme="dark"] .action-btn:hover,
html[data-theme="light"] .action-btn:hover,
html[data-theme="dark"] .img-mgr-btn:hover,
html[data-theme="light"] .img-mgr-btn:hover,
html[data-theme="dark"] .btn-reset:hover,
html[data-theme="light"] .btn-reset:hover {
    background: var(--admin-bg-button-hover);
    color: var(--admin-text-primary);
}

html[data-theme="dark"] .btn-primary,
html[data-theme="light"] .btn-primary {
    background: var(--admin-brand-blue);
    border-color: var(--admin-brand-blue);
}

html[data-theme="dark"] .btn-primary:hover,
html[data-theme="light"] .btn-primary:hover {
    background: var(--admin-brand-blue-hover);
    border-color: var(--admin-brand-blue-hover);
}

html[data-theme="dark"] .btn-outline-secondary,
html[data-theme="light"] .btn-outline-secondary {
    border-color: var(--admin-border);
    color: var(--admin-text-muted);
}

html[data-theme="dark"] .btn-outline-secondary:hover,
html[data-theme="light"] .btn-outline-secondary:hover {
    background: var(--admin-bg-button-hover);
    border-color: var(--admin-border-strong);
    color: var(--admin-text-primary);
}

html[data-theme="dark"] .modal-content,
html[data-theme="light"] .modal-content,
html[data-theme="dark"] .delete-modal,
html[data-theme="light"] .delete-modal {
    background: var(--admin-bg-elevated);
    border-color: var(--admin-border);
    color: var(--admin-text-primary);
}

html[data-theme="dark"] .modal-header,
html[data-theme="light"] .modal-header,
html[data-theme="dark"] .modal-footer,
html[data-theme="light"] .modal-footer,
html[data-theme="dark"] .delete-modal-actions,
html[data-theme="light"] .delete-modal-actions {
    border-color: var(--admin-border);
}

html[data-theme="dark"] .modal-title,
html[data-theme="light"] .modal-title,
html[data-theme="dark"] .delete-modal h5,
html[data-theme="light"] .delete-modal h5 {
    color: var(--admin-text-primary);
}

html[data-theme="dark"] .modal-body,
html[data-theme="light"] .modal-body,
html[data-theme="dark"] .delete-modal p,
html[data-theme="light"] .delete-modal p {
    color: var(--admin-text-muted);
}

html[data-theme="dark"] .empty-state,
html[data-theme="light"] .empty-state {
    color: var(--admin-text-faint);
}

html[data-theme="dark"] .product-img-placeholder,
html[data-theme="light"] .product-img-placeholder,
html[data-theme="dark"] .logo-placeholder,
html[data-theme="light"] .logo-placeholder,
html[data-theme="dark"] .table-customer-avatar,
html[data-theme="light"] .table-customer-avatar {
    background: var(--admin-bg-button);
    border-color: var(--admin-border);
    color: var(--admin-text-primary);
}

html[data-theme="dark"] .pagination .page-link,
html[data-theme="light"] .pagination .page-link {
    background: var(--admin-bg-button);
    border-color: var(--admin-border);
    color: var(--admin-text-muted);
}

html[data-theme="dark"] .pagination .page-link:hover,
html[data-theme="light"] .pagination .page-link:hover {
    background: var(--admin-bg-button-hover);
    color: var(--admin-text-primary);
}

html[data-theme="dark"] .pagination .page-item.active .page-link,
html[data-theme="light"] .pagination .page-item.active .page-link {
    background: var(--admin-brand-blue);
    border-color: var(--admin-brand-blue);
    color: #ffffff;
}

html[data-theme="dark"] .pagination .page-item.disabled .page-link,
html[data-theme="light"] .pagination .page-item.disabled .page-link {
    background: var(--admin-bg-button);
    color: var(--admin-text-faint);
}

html[data-theme="dark"] .text-muted,
html[data-theme="light"] .text-muted {
    color: var(--admin-text-muted) !important;
}

html[data-theme="dark"] .text-secondary,
html[data-theme="light"] .text-secondary {
    color: var(--admin-text-muted) !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var toggle = document.getElementById('themeToggle');

    function currentTheme() {
        return document.documentElement.getAttribute('data-theme') || 'dark';
    }

    function syncThemeIcon() {
        if (!toggle) return;
        var icon = toggle.matches('i') ? toggle : toggle.querySelector('i');
        var theme = currentTheme();
        if (icon) {
            icon.className = theme === 'dark' ? 'bi bi-moon-stars' : 'bi bi-sun';
        }
        toggle.title = theme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode';
        toggle.setAttribute('aria-label', toggle.title);
    }

    function setTheme(theme, persist) {
        document.documentElement.setAttribute('data-theme', theme);
        document.documentElement.setAttribute('data-bs-theme', theme);
        if (persist) {
            try {
                localStorage.setItem('looma-admin-theme', theme);
            } catch (e) {
                console.error('Failed to save theme preference', e);
            }
        }
        syncThemeIcon();
    }

    if (toggle) {
        toggle.addEventListener('click', function (event) {
            event.preventDefault();
            setTheme(currentTheme() === 'dark' ? 'light' : 'dark', true);
        });
    }

    syncThemeIcon();
});
</script>

