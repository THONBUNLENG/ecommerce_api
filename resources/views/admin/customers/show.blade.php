<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Customer: {{ $customer->name }} - LOOMA Admin</title>
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

        .sidebar-nav .nav-link:hover { background: rgba(255,255,255,.05); color: #cbd5e1; }
        .sidebar-nav .nav-link.active { background: rgba(255,255,255,.08); color: #fff; border-left-color: #000; }
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
        .search-input:focus { border-color: rgba(255,255,255,.2); }

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
            border: 2px solid rgba(255,255,255,.2);
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

        .info-row {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .info-item {
            flex: 1;
            min-width: 200px;
        }

        .info-item .info-label {
            font-size: 12px;
            color: var(--text-faint);
            margin-bottom: 4px;
            text-transform: uppercase;
            letter-spacing: .05em;
        }

        .info-item .info-value {
            font-size: 14px;
            color: var(--text-primary);
            font-weight: 500;
        }

        .table {
            color: var(--text-primary);
            margin: 0;
        }

    .table {
            color: var(--text-primary);
            margin: 0;

            /* ── Bootstrap 5 Override Variables ── */
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
            background-color: transparent; /* Extra fallback defense against background bleed */
        }

        .table tbody tr:last-child td { border-bottom: none; }
        .table tbody tr { transition: background .15s; }
        .table tbody tr:hover { background: rgba(255,255,255,.025); }
        .order-id {
            font-family: 'SF Mono', 'Fira Code', monospace;
            font-size: 13px;
            font-weight: 600;
            color: #fff;
            background: rgba(255,255,255,.1);
            padding: 2px 8px;
            border-radius: 6px;
            white-space: nowrap;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 3px 9px;
            border-radius: 20px;
            font-size: 11.5px;
            font-weight: 500;
            white-space: nowrap;
        }

        .status-badge::before {
            content: '';
            width: 6px; height: 6px;
            border-radius: 50%;
        }

        .status-delivered { background: rgba(16,185,129,.12); color: #34d399; }
        .status-delivered::before { background: #34d399; }

        .status-paid      { background: rgba(255,255,255,.12); color: #fff; }
        .status-paid::before      { background: #fff; }

        .status-pending   { background: rgba(245,158,11,.12); color: #fbbf24; }
        .status-pending::before   { background: #fbbf24; }

        .status-cancelled { background: rgba(239,68,68,.12);  color: #f87171; }
        .status-cancelled::before { background: #f87171; }

        .status-processing { background: rgba(139,92,246,.12); color: #c4b5fd; }
        .status-processing::before { background: #c4b5fd; }

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

        .btn-outline-secondary {
            border-color: var(--border);
            color: var(--text-muted);
            border-radius: 10px;
            font-size: 13px;
            padding: .5rem 1rem;
        }

        .btn-outline-secondary:hover { background: rgba(255,255,255,.05); color: #fff; border-color: var(--border); }

        .pagination .page-link {
            background: rgba(255,255,255,.04);
            border-color: var(--border);
            color: var(--text-muted);
            font-size: 13px;
        }

        .pagination .page-link:hover { background: rgba(255,255,255,.08); color: #fff; border-color: var(--border); }
        .pagination .page-item.active .page-link { background: #000; border-color: #000; color: #fff; }
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

        .section-divider {
            border: none;
            border-top: 1px solid var(--border);
            margin: 1.75rem 0;
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
</head>
<body>

    <nav class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <div class="brand-logo">
                <i class="bi bi-layers text-white" style="font-size:.9rem;"></i>
            </div>
            <h5 class="nav-text">LOOMA</h5>
        </div>

        <div class="sidebar-nav">
            <div class="nav-section nav-text">Main</div>

            <a class="nav-link" href="{{ route('panel.dashboard') }}">
                <i class="bi bi-speedometer2"></i>
                <span class="nav-text">Dashboard</span>
            </a>
            <a class="nav-link" href="{{ route('panel.products.index') }}">
                <i class="bi bi-box-seam"></i>
                <span class="nav-text">Products</span>
            </a>
            <a class="nav-link" href="{{ route('panel.orders.index') }}">
                <i class="bi bi-cart3"></i>
                <span class="nav-text">Orders</span>
            </a>
            <a class="nav-link active" href="{{ route('panel.customers.index') }}">
                <i class="bi bi-people"></i>
                <span class="nav-text">Customers</span>
            </a>

            <div class="nav-section nav-text" style="margin-top:.75rem;">System</div>

            <a class="nav-link" href="{{ route('panel.settings.index') }}">
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

    <div class="main-content">
        <div class="topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="icon-btn d-lg-none border-0" id="sidebarToggle" aria-label="Toggle sidebar">
                    <i class="bi bi-list"></i>
                </button>
                <div class="search-wrap">
                    <i class="bi bi-search"></i>
                    <input type="search" class="search-input" placeholder="Search…">
                </div>
            </div>
            <div class="topbar-actions">
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

        <div class="content">
            <div class="page-header">
                <h4>Customer: {{ $customer->name }}</h4>
                <p>Customer profile and order history.</p>
            </div>

            <div class="d-flex align-items-center justify-content-between mb-4">
                <a href="{{ route('panel.customers.index') }}" class="btn btn-outline-secondary d-flex align-items-center gap-2">
                    <i class="bi bi-arrow-left"></i> Back to Customers
                </a>
            </div>

            <div class="card-panel mb-4">
                <div class="p-4 border-bottom" style="border-bottom:1px solid var(--border);">
                    <h5 style="font-size:1rem;font-weight:600;margin:0;">Customer Information</h5>
                </div>
                <div class="p-4">
                    <div class="info-row">
                        <div class="info-item">
                            <div class="info-label">Name</div>
                            <div class="info-value">{{ $customer->name }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Email</div>
                            <div class="info-value">{{ $customer->email }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Joined</div>
                            <div class="info-value">{{ $customer->created_at->format('F j, Y') }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Total Orders</div>
                            <div class="info-value">{{ $customer->orders_count ?? 0 }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-panel">
                <div class="p-4 border-bottom" style="border-bottom:1px solid var(--border);">
                    <h5 style="font-size:1rem;font-weight:600;margin:0;">Customer Orders</h5>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="padding-left:1.25rem;">Order</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th class="text-end" style="padding-right:1.25rem;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                            <tr>
                                <td style="padding-left:1.25rem;">
                                    <span class="order-id">#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</span>
                                </td>
                                <td style="color:var(--text-muted);font-size:13px;">{{ $order->created_at->format('M d, Y') }}</td>
                                <td style="font-weight:600;font-size:13.5px;">${{ number_format($order->total, 2) }}</td>
                                <td>
                                    @php
                                        $statusMap = [
                                            'delivered'  => 'status-delivered',
                                            'paid'       => 'status-paid',
                                            'pending'    => 'status-pending',
                                            'cancelled'  => 'status-cancelled',
                                            'processing' => 'status-processing',
                                        ];
                                        $cls = $statusMap[$order->status] ?? 'status-pending';
                                    @endphp
                                    <span class="status-badge {{ $cls }}">{{ ucfirst($order->status) }}</span>
                                </td>
                                <td class="text-end" style="padding-right:1.25rem;">
                                    <a href="{{ route('panel.orders.show', $order->id) }}" class="action-btn" title="View order">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <i class="bi bi-cart3 d-block"></i>
                                        <p>No orders yet.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($orders->hasPages())
                <div class="p-4" style="border-top:1px solid var(--border);">
                    {{ $orders->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="modal fade" id="logoutModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <h6 class="modal-title">Confirm logout</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">Are you sure you want to log out of your session?</div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal"
                            style="border-radius:8px;border-color:var(--border);color:var(--text-muted);">Cancel</button>
                    <button type="button" class="btn btn-sm btn-danger" id="confirmLogout" style="border-radius:8px;">Log out</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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

        const logoutForm = document.createElement('form');
        logoutForm.method = 'POST';
        logoutForm.action = '{{ route("logout") }}';
        logoutForm.innerHTML = `<input type="hidden" name="_token" value="{{ csrf_token() }}">`;
        document.body.appendChild(logoutForm);

        document.querySelectorAll('.logout-link').forEach(link => {
            link.addEventListener('click', e => {
                e.preventDefault();
                new bootstrap.Modal(document.getElementById('logoutModal')).show();
            });
        });

        document.getElementById('confirmLogout')?.addEventListener('click', () => logoutForm.submit());
    });
    </script>
</body>
</html>
