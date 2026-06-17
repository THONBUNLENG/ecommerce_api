<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Customers - LOOMA Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 260px;
            --sidebar-collapsed: 70px;
            --transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            --bg-card: rgba(30, 41, 59, 0.7);
            --border: rgba(255, 255, 255, 0.06);
            --text-primary: #f1f5f9;
            --text-muted: #94a3b8;
            --text-faint: #64748b;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: var(--text-primary);
            min-height: 100vh;
            margin: 0;
            font-size: 14px;
        }

        .sidebar {
            position: fixed;
            top: 0; left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: rgba(10, 17, 34, 0.96);
            backdrop-filter: blur(20px);
            border-right: 1px solid var(--border);
            z-index: 1000;
            display: flex;
            flex-direction: column;
            padding: 0;
            transition: var(--transition);
            overflow: hidden;
        }

        .sidebar-brand {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
        }

        .brand-logo {
            width: 32px; height: 32px;
            background: linear-gradient(135deg, #1a1a1a, #000000);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .sidebar-brand h5 {
            font-weight: 700;
            color: #fff;
            margin: 0;
            font-size: 1rem;
            white-space: nowrap;
        }

        .sidebar-nav {
            flex: 1;
            overflow-y: auto;
            padding: 1rem 0;
        }

        .sidebar-nav::-webkit-scrollbar { width: 0; }

        .nav-section {
            padding: 0.25rem 1.5rem 0.5rem;
            font-size: 10px;
            font-weight: 600;
            letter-spacing: .1em;
            color: var(--text-faint);
            text-transform: uppercase;
            margin-top: 0.5rem;
        }

        .sidebar-nav .nav-link {
            color: var(--text-muted);
            padding: 0.75rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.875rem;
            transition: var(--transition);
            border-left: 3px solid transparent;
            font-weight: 500;
            font-size: 13.5px;
            white-space: nowrap;
        }

        .sidebar-nav .nav-link:hover { background: rgba(59,130,246,0.08); color: #cbd5e1; }
        .sidebar-nav .nav-link.active { background: rgba(255,255,255,.06); color: #fff; border-left-color: #000; }
        .sidebar-nav .nav-link i { font-size: 1.15rem; width: 20px; text-align: center; flex-shrink: 0; }

        .sidebar-footer {
            padding: 1rem 0;
            border-top: 1px solid var(--border);
        }

        .main-content {
            margin-left: var(--sidebar-width);
            transition: var(--transition);
            min-height: 100vh;
        }

        .topbar {
            position: sticky;
            top: 0; z-index: 900;
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 0.875rem 1.75rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .search-wrap { position: relative; flex: 0 0 260px; }
        .search-wrap i { position: absolute; left: .75rem; top: 50%; transform: translateY(-50%); color: var(--text-faint); font-size: .9rem; }

        .search-input {
            background: rgba(255,255,255,.04);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: .45rem 1rem .45rem 2.25rem;
            color: var(--text-primary);
            font-size: 13px;
            width: 100%;
            outline: none;
            transition: border-color .2s;
        }

        .search-input::placeholder { color: var(--text-faint); }
        .search-input:focus { border-color: rgba(59,130,246,.4); }

        .topbar-actions { display: flex; align-items: center; gap: .875rem; }

        .icon-btn {
            width: 36px; height: 36px;
            border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
            background: rgba(255,255,255,.04);
            border: 1px solid var(--border);
            color: var(--text-muted);
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            position: relative;
        }

        .icon-btn:hover { background: rgba(255,255,255,.08); color: #fff; }
        .icon-btn i { font-size: 1rem; }

        .notif-dot {
            position: absolute; top: 6px; right: 6px;
            width: 7px; height: 7px;
            background: #ef4444;
            border-radius: 50%;
            border: 1.5px solid #0f172a;
        }

        .avatar-btn {
            width: 36px; height: 36px;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
            border: 2px solid rgba(59,130,246,.4);
        }

        .avatar-btn img { width: 100%; height: 100%; object-fit: cover; }

        .content { padding: 1.75rem; }

        .page-header {
            margin-bottom: 1.5rem;
        }

        .page-header h4 {
            font-size: 1.15rem;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0 0 2px;
        }

        .page-header p {
            font-size: 13px;
            color: var(--text-faint);
            margin: 0;
        }

        .card-panel {
            background: var(--bg-card);
            backdrop-filter: blur(20px);
            border-radius: 14px;
            border: 1px solid var(--border);
        }

        .stat-mini {
            background: rgba(255,255,255,.04);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: .75rem 1.1rem;
            min-width: 120px;
        }

        .stat-mini .sm-label { font-size: 11px; color: var(--text-faint); margin-bottom: 3px; }
        .stat-mini .sm-value { font-size: 1.35rem; font-weight: 700; line-height: 1; }

        /* ── Table (Fixed for Dark Mode Overrides) ── */
        .table {
            color: var(--text-primary);
            margin: 0;
            /* Direct fix for Bootstrap 5 white cell bleed */
            --bs-table-bg: transparent;
            --bs-table-hover-bg: rgba(255, 255, 255, 0.025);
            --bs-table-color: var(--text-primary);
            --bs-table-border-color: var(--border);
        }

        .table thead th {
            background: rgba(255,255,255,.03);
            border-bottom: 1px solid var(--border);
            border-top: none;
            color: var(--text-faint);
            font-size: 11px;
            font-weight: 600;
            letter-spacing: .06em;
            text-transform: uppercase;
            padding: .875rem 1rem;
            white-space: nowrap;
        }

        .table tbody td {
            border-bottom: 1px solid var(--border);
            border-top: none;
            padding: .875rem 1rem;
            vertical-align: middle;
            background-color: transparent; /* Ensures fallback is dark */
        }

        .table tbody tr:last-child td { border-bottom: none; }
        .table tbody tr { transition: background .15s; }
        .table tbody tr:hover { background: rgba(255,255,255,.025); }

        .action-btn {
            width: 30px; height: 30px;
            border-radius: 7px;
            display: inline-flex; align-items: center; justify-content: center;
            border: 1px solid var(--border);
            background: rgba(255,255,255,.04);
            color: var(--text-muted);
            cursor: pointer;
            transition: var(--transition);
            font-size: 13px;
            text-decoration: none;
        }

        .action-btn:hover { background: rgba(255,255,255,.1); color: #fff; border-color: rgba(255,255,255,.2); }

        .pagination .page-link {
            background: rgba(255,255,255,.04);
            border-color: var(--border);
            color: var(--text-muted);
            font-size: 13px;
        }

        .pagination .page-link:hover { background: rgba(255,255,255,.08); color: #fff; border-color: var(--border); }
        .pagination .page-item.active .page-link { background: #3b82f6; border-color: #3b82f6; color: #fff; }
        .pagination .page-item.disabled .page-link { background: rgba(255,255,255,.02); color: var(--text-faint); }

        .dropdown-menu {
            background: #1e293b;
            border: 1px solid var(--border);
            box-shadow: 0 8px 24px rgba(0,0,0,.35);
        }

        .dropdown-item { color: var(--text-muted); font-size: 13px; padding: .5rem 1rem; }
        .dropdown-item:hover { background: rgba(255,255,255,.06); color: #fff; }
        .dropdown-divider { border-color: var(--border); }

        .modal-content {
            background: #1e293b;
            border: 1px solid var(--border);
            color: var(--text-primary);
            border-radius: 14px;
        }

        .modal-header { border-bottom: 1px solid var(--border); padding: 1.1rem 1.5rem; }
        .modal-footer { border-top:  1px solid var(--border); padding: 1rem 1.5rem; }
        .modal-body   { padding: 1.25rem 1.5rem; font-size: 13.5px; color: var(--text-muted); }

        .empty-state {
            padding: 3.5rem 1rem;
            text-align: center;
            color: var(--text-faint);
        }

        .empty-state i { font-size: 2.5rem; margin-bottom: .75rem; opacity: .4; display: block; }
        .empty-state p { margin: 0; font-size: 13.5px; }

        .form-control, .form-select {
            background: rgba(255,255,255,.05);
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 8px;
            color: var(--text-primary);
            font-size: 13.5px;
            padding: .5rem .875rem;
            transition: border-color .2s, background .2s;
        }

        .form-control:focus, .form-select:focus {
            background: rgba(255,255,255,.07);
            border-color: rgba(59,130,246,.5);
            box-shadow: 0 0 0 3px rgba(59,130,246,.1);
            color: var(--text-primary);
            outline: none;
        }

        .form-control::placeholder { color: var(--text-faint); }
        .form-select option { background: #1e293b; color: var(--text-primary); }

        .form-label { font-size: 12.5px; color: var(--text-muted); margin-bottom: 5px; font-weight: 500; }

        .btn-primary {
            background: #3b82f6;
            border-color: #3b82f6;
            border-radius: 9px;
            font-size: 13.5px;
            padding: .5rem 1.1rem;
        }

        .btn-primary:hover { background: #2563eb; border-color: #2563eb; }

        .btn-outline-secondary {
            border-color: var(--border);
            color: var(--text-muted);
            border-radius: 10px;
            font-size: 13px;
            padding: .5rem 1rem;
        }

        .btn-outline-secondary:hover { background: rgba(255,255,255,.05); color: #fff; border-color: var(--border); }

        .table-customer-avatar {
            width: 40px; height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,.1);
            border: 1px solid rgba(255,255,255,.2);
            display: flex; align-items: center; justify-content: center;
            font-size: 14px;
            font-weight: 600;
            color: #fff;
            flex-shrink: 0;
            text-transform: uppercase;
        }

        @media (max-width: 1200px) {
            .sidebar { width: var(--sidebar-collapsed); }
            .sidebar .nav-text, .sidebar .nav-section, .sidebar-brand h5 { display: none; }
            .sidebar-nav .nav-link { padding: .75rem; justify-content: center; }
            .sidebar-nav .nav-link i { width: auto; margin: 0; }
            .main-content { margin-left: var(--sidebar-collapsed); }
        }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); width: var(--sidebar-width); }
            .sidebar .nav-text, .sidebar .nav-section, .sidebar-brand h5 { display: block; }
            .sidebar-nav .nav-link { padding: .75rem 1.5rem; justify-content: flex-start; }
            .sidebar.show { transform: translateX(0); }
            .main-content { margin-left: 0; }
            .search-wrap { flex: 1; }
        }
    </style>
    @include('admin.partials.theme')
</head>
<body>

    @include('admin.partials.sidebar')

    <div class="main-content">
        @include('admin.partials.topbar', ['searchPlaceholder' => 'Search customers…'])

        <div class="content">
            <div class="page-header">
                <h4>Customers</h4>
                <p>Manage your customer base and their profiles.</p>
            </div>

            <div class="d-flex gap-3 mb-4 flex-wrap">
                <div class="stat-mini">
                    <div class="sm-label">Total Customers</div>
                    <div class="sm-value" style="color:#f1f5f9;">{{ $customers->total() }}</div>
                </div>
            </div>

            <div class="card-panel">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="padding-left:1.25rem;">Customer</th>
                                <th>Email</th>
                                <th>Joined</th>
                                <th class="text-center">Orders</th>
                                <th class="text-end" style="padding-right:1.25rem;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($customers as $customer)
                            <tr>
                                <td style="padding-left:1.25rem;">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="table-customer-avatar">
                                            {{ strtoupper(substr($customer->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div style="font-size:13.5px;font-weight:500;color:var(--text-primary);">{{ $customer->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td style="color:var(--text-muted);font-size:13px;">{{ $customer->email }}</td>
                                <td style="color:var(--text-muted);font-size:13px;">{{ $customer->created_at->format('M d, Y') }}</td>
                                <td class="text-center">
                                    <span class="badge bg-dark" style="border-radius:20px;font-size:11.5px;padding:3px 10px;">{{ $customer->orders_count ?? 0 }}</span>
                                </td>
                                <td class="text-end" style="padding-right:1.25rem;">
                                    <a href="{{ route('panel.customers.show', $customer->id) }}" class="action-btn" title="View customer">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <i class="bi bi-people d-block"></i>
                                        <p>No customers found.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($customers->hasPages())
                <div class="p-4" style="border-top:1px solid var(--border);">
                    {{ $customers->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @include('admin.partials.logout')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.getElementById('sidebar');
        document.getElementById('sidebarToggle')?.addEventListener('click', () => {
            sidebar.classList.toggle('show');
        });

        document.addEventListener('click', e => {
            if (window.innerWidth < 768 &&
                sidebar && !sidebar.contains(e.target) &&
                !document.getElementById('sidebarToggle')?.contains(e.target)) {
                sidebar.classList.remove('show');
            }
        });
    });
    </script>
</body>
</html>
