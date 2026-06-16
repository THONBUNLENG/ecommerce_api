<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LOOMA Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 260px;
            --sidebar-collapsed: 70px;
            --transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            --bg-base: #0f172a;
            --bg-card: rgba(30, 41, 59, 0.7);
            --bg-card-solid: #1e293b;
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

        /* ── Sidebar ── */
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

        .sidebar-brand .brand-logo {
            width: 32px; height: 32px;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
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

        .sidebar-nav .nav-section {
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

        .sidebar-nav .nav-link:hover {
            background: rgba(59, 130, 246, 0.08);
            color: #cbd5e1;
        }

        .sidebar-nav .nav-link.active {
            background: rgba(59, 130, 246, 0.12);
            color: #fff;
            border-left-color: #3b82f6;
        }

        .sidebar-nav .nav-link i {
            font-size: 1.15rem;
            width: 20px;
            text-align: center;
            flex-shrink: 0;
        }

        .sidebar-footer {
            padding: 1rem 0;
            border-top: 1px solid var(--border);
        }

        /* ── Main ── */
        .main-content {
            margin-left: var(--sidebar-width);
            transition: var(--transition);
            min-height: 100vh;
        }

        /* ── Topbar ── */
        .topbar {
            position: sticky;
            top: 0;
            z-index: 900;
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 0.875rem 1.75rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .search-wrap {
            position: relative;
            flex: 0 0 260px;
        }

        .search-wrap i {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-faint);
            font-size: 0.9rem;
        }

        .search-input {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 0.45rem 1rem 0.45rem 2.25rem;
            color: var(--text-primary);
            font-size: 13px;
            width: 100%;
            outline: none;
            transition: border-color .2s;
        }

        .search-input::placeholder { color: var(--text-faint); }
        .search-input:focus { border-color: rgba(59,130,246,.4); }

        .topbar-actions { display: flex; align-items: center; gap: 0.875rem; }

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
            position: absolute;
            top: 6px; right: 6px;
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

        /* ── Content ── */
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

        /* ── Metric Cards ── */
        .metric-card {
            border-radius: 14px;
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 90px;
        }

        .metric-card.blue    { background: linear-gradient(135deg, #2563eb, #1d4ed8); }
        .metric-card.orange  { background: linear-gradient(135deg, #ea580c, #c2410c); }
        .metric-card.teal    { background: linear-gradient(135deg, #0d9488, #0f766e); }
        .metric-card.slate   { background: linear-gradient(135deg, #475569, #334155); }
        .metric-card.violet  { background: linear-gradient(135deg, #7c3aed, #6d28d9); }
        .metric-card.rose    { background: linear-gradient(135deg, #e11d48, #be123c); }

        .metric-label {
            font-size: 12px;
            font-weight: 500;
            opacity: .72;
            margin-bottom: 5px;
            color: #fff;
        }

        .metric-value {
            font-size: 1.6rem;
            font-weight: 700;
            color: #fff;
            line-height: 1;
        }

        .metric-icon {
            font-size: 2.25rem;
            opacity: .28;
            color: #fff;
        }

        /* ── Chart Cards ── */
        .chart-card {
            background: var(--bg-card);
            backdrop-filter: blur(20px);
            border-radius: 14px;
            border: 1px solid var(--border);
            overflow: hidden;
            height: 100%;
        }

        .chart-card-header {
            padding: 1rem 1.25rem 0.75rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .ch-icon {
            width: 34px; height: 34px;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 15px;
            color: #fff;
            flex-shrink: 0;
        }

        .ch-title {
            font-size: 13.5px;
            font-weight: 600;
            color: var(--text-primary);
        }

        .ch-sub {
            font-size: 11.5px;
            color: var(--text-faint);
        }

        .chart-body {
            padding: 1.25rem;
        }

        .chart-canvas-wrap {
            position: relative;
            width: 100%;
        }

        /* ── Legend ── */
        .chart-legend {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 10px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            color: var(--text-muted);
        }

        .legend-dot {
            width: 9px; height: 9px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        /* ── Badges ── */
        .badge-pill {
            font-size: 11px;
            padding: 3px 10px;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-weight: 500;
        }

        .badge-blue   { background: rgba(59,130,246,.15); color: #93c5fd; border: 1px solid rgba(59,130,246,.25); }
        .badge-orange { background: rgba(249,115,22,.15); color: #fdba74; border: 1px solid rgba(249,115,22,.25); }

        .badge-dot { width: 7px; height: 7px; border-radius: 50%; }

        /* ── Progress Widgets ── */
        .progress-widget {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 1rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .pw-info { min-width: 100px; }
        .pw-label { font-size: 12px; color: var(--text-faint); margin-bottom: 2px; }
        .pw-value { font-size: 15px; font-weight: 600; color: var(--text-primary); }

        .pw-bar-wrap {
            flex: 1;
            height: 5px;
            background: rgba(255,255,255,.07);
            border-radius: 3px;
            overflow: hidden;
        }

        .pw-bar {
            height: 100%;
            border-radius: 3px;
            transition: width .8s ease;
        }

        /* ── Section Label ── */
        .section-label {
            font-size: 10.5px;
            font-weight: 600;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: var(--text-faint);
            margin-bottom: 1rem;
            margin-top: 0.25rem;
        }

        /* ── Divider ── */
        .section-divider {
            border: none;
            border-top: 1px solid var(--border);
            margin: 1.75rem 0;
        }

        /* ── Dropdown overrides ── */
        .dropdown-menu {
            background: #1e293b;
            border: 1px solid var(--border);
            box-shadow: 0 8px 24px rgba(0,0,0,.3);
        }

        .dropdown-item { color: var(--text-muted); font-size: 13px; }
        .dropdown-item:hover { background: rgba(255,255,255,.06); color: #fff; }
        .dropdown-divider { border-color: var(--border); }

        /* ── Modal overrides ── */
        .modal-content {
            background: #1e293b;
            border: 1px solid var(--border);
            color: var(--text-primary);
        }

        .modal-header { border-bottom-color: var(--border); }
        .modal-footer { border-top-color: var(--border); }

        /* ── Responsive ── */
        @media (max-width: 1200px) {
            .sidebar { width: var(--sidebar-collapsed); }
            .sidebar .nav-text,
            .sidebar .nav-section,
            .sidebar-brand h5 { display: none; }
            .sidebar-nav .nav-link { padding: 0.75rem; justify-content: center; }
            .sidebar-nav .nav-link i { width: auto; margin: 0; }
            .main-content { margin-left: var(--sidebar-collapsed); }
        }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); width: var(--sidebar-width); }
            .sidebar .nav-text, .sidebar .nav-section, .sidebar-brand h5 { display: block; }
            .sidebar-nav .nav-link { padding: 0.75rem 1.5rem; justify-content: flex-start; }
            .sidebar.show { transform: translateX(0); }
            .main-content { margin-left: 0; }
            .search-wrap { flex: 1; }
        }
    </style>
</head>
<body>

    {{-- ── Sidebar ── --}}
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <div class="brand-logo">
                <i class="bi bi-layers text-white" style="font-size:.9rem;"></i>
            </div>
            <h5 class="nav-text">LOOMA</h5>
        </div>

        <div class="sidebar-nav">
            <div class="nav-section nav-text">Main</div>

            <a class="nav-link active" href="{{ route('panel.dashboard') }}">
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
            <a class="nav-link" href="{{ route('panel.customers.index') }}">
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

    {{-- ── Main Content ── --}}
    <div class="main-content">

        {{-- Topbar --}}
        <div class="topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="icon-btn d-lg-none border-0" id="sidebarToggle" aria-label="Toggle sidebar">
                    <i class="bi bi-list"></i>
                </button>
                <div class="search-wrap">
                    <i class="bi bi-search"></i>
                    <input type="search" class="search-input" placeholder="Search anything…">
                </div>
            </div>
            <div class="topbar-actions">
                <a class="icon-btn" id="themeToggle" title="Toggle theme">
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

        <div class="content">
            <div class="page-header">
                <h4>Dashboard</h4>
                <p>Welcome back, Admin. Here's what's happening today.</p>
            </div>
            <div class="row g-3 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="metric-card blue">
                        <div>
                            <div class="metric-label">Join Members</div>
                            <div class="metric-value">10,145</div>
                        </div>
                        <i class="bi bi-people metric-icon"></i>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="metric-card orange">
                        <div>
                            <div class="metric-label">User Likes</div>
                            <div class="metric-value">4,410</div>
                        </div>
                        <i class="bi bi-hand-thumbs-up metric-icon"></i>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="metric-card teal">
                        <div>
                            <div class="metric-label">Store Traffic</div>
                            <div class="metric-value">80%</div>
                        </div>
                        <i class="bi bi-bar-chart metric-icon"></i>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="metric-card slate">
                        <div>
                            <div class="metric-label">Income</div>
                            <div class="metric-value">15,458</div>
                        </div>
                        <i class="bi bi-briefcase metric-icon"></i>
                    </div>
                </div>
            </div>

<div class="row g-3 mb-4">
    <div class="col-lg-4">
        <div class="chart-card">
            <div class="chart-card-header">
                <div class="ch-icon" style="background: #3b82f6;">
                    <i class="bi bi-geo-alt"></i>
                </div>
                <div>
                    <div class="ch-title">Top Locations</div>
                    <div class="ch-sub">Sales by region</div>
                </div>
            </div>
            <div class="chart-body">
                <div class="chart-canvas-wrap" style="height: 220px;">
                    <canvas id="donutChart"></canvas>
                </div>
                <div class="chart-legend justify-content-center mt-3">
                    <div class="legend-item"><span class="legend-dot" style="background: #3b82f6;"></span>New York (45%)</div>
                    <div class="legend-item"><span class="legend-dot" style="background: #10b981;"></span>Los Angeles (32%)</div>
                    <div class="legend-item"><span class="legend-dot" style="background: #f59e0b;"></span>Dallas (23%)</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="chart-card">
            <div class="chart-card-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="ch-icon" style="background: #10b981;">
                        <i class="bi bi-cart"></i>
                    </div>
                    <div>
                        <div class="ch-title">Top Products Sales</div>
                        <div class="ch-sub">Monthly performance</div>
                    </div>
                </div>
            </div>
            <div class="chart-body">
                <div class="chart-canvas-wrap" style="height: 220px;">
                    <canvas id="areaChart"></canvas>
                </div>
                <div class="d-flex flex-wrap gap-2 justify-content-center mt-3" style="max-width: 100%;">

                    <span class="badge-pill d-flex align-items-center gap-2" style="background: rgba(59, 130, 246, 0.15); padding: 5px 12px; border-radius: 50px;">
                        <span class="badge-dot" style="background: #3b82f6; width: 7px; height: 7px; border-radius: 50%;"></span>
                        <span style="font-size: 11px; font-weight: 500; color: #ffffff; letter-spacing: 0.3px;">T-Shirts</span>
                    </span>

                    <span class="badge-pill d-flex align-items-center gap-2" style="background: rgba(249, 115, 22, 0.15); padding: 5px 12px; border-radius: 50px;">
                        <span class="badge-dot" style="background: #f97316; width: 7px; height: 7px; border-radius: 50%;"></span>
                        <span style="font-size: 11px; font-weight: 500; color: #ffffff; letter-spacing: 0.3px;">Shirts</span>
                    </span>
                    <span class="badge-pill d-flex align-items-center gap-2" style="background: rgba(16, 185, 129, 0.15); padding: 5px 12px; border-radius: 50px;">
                        <span class="badge-dot" style="background: #10b981; width: 7px; height: 7px; border-radius: 50%;"></span>
                        <span style="font-size: 11px; font-weight: 500; color: #ffffff; letter-spacing: 0.3px;">Jackets</span>
                    </span>

                    <span class="badge-pill d-flex align-items-center gap-2" style="background: rgba(139, 92, 246, 0.15); padding: 5px 12px; border-radius: 50px;">
                        <span class="badge-dot" style="background: #8b5cf6; width: 7px; height: 7px; border-radius: 50%;"></span>
                        <span style="font-size: 11px; font-weight: 500; color: #ffffff; letter-spacing: 0.3px;">Jeans</span>
                    </span>


                    <span class="badge-pill d-flex align-items-center gap-2" style="background: rgba(236, 72, 153, 0.15); padding: 5px 12px; border-radius: 50px;">
                        <span class="badge-dot" style="background: #ec4899; width: 7px; height: 7px; border-radius: 50%;"></span>
                        <span style="font-size: 11px; font-weight: 500; color: #ffffff; letter-spacing: 0.3px;">Trousers</span>
                    </span>

                    <span class="badge-pill d-flex align-items-center gap-2" style="background: rgba(20, 184, 166, 0.15); padding: 5px 12px; border-radius: 50px;">
                        <span class="badge-dot" style="background: #14b8a6; width: 7px; height: 7px; border-radius: 50%;"></span>
                        <span style="font-size: 11px; font-weight: 500; color: #ffffff; letter-spacing: 0.3px;">Shorts</span>
                    </span>

                    <span class="badge-pill d-flex align-items-center gap-2" style="background: rgba(239, 68, 68, 0.15); padding: 5px 12px; border-radius: 50px;">
                        <span class="badge-dot" style="background: #ef4444; width: 7px; height: 7px; border-radius: 50%;"></span>
                        <span style="font-size: 11px; font-weight: 500; color: #ffffff; letter-spacing: 0.3px;">Sneakers</span>
                    </span>

                    <!-- 8. Leather Shoes -->
                    <span class="badge-pill d-flex align-items-center gap-2" style="background: rgba(234, 179, 8, 0.15); padding: 5px 12px; border-radius: 50px;">
                        <span class="badge-dot" style="background: #eab308; width: 7px; height: 7px; border-radius: 50%;"></span>
                        <span style="font-size: 11px; font-weight: 500; color: #ffffff; letter-spacing: 0.3px;">Leather Shoes</span>
                    </span>

                    <!-- 9. Sandals -->
                    <span class="badge-pill d-flex align-items-center gap-2" style="background: rgba(79, 70, 229, 0.15); padding: 5px 12px; border-radius: 50px;">
                        <span class="badge-dot" style="background: #4f46e5; width: 7px; height: 7px; border-radius: 50%;"></span>
                        <span style="font-size: 11px; font-weight: 500; color: #ffffff; letter-spacing: 0.3px;">Sandals</span>
                    </span>

                    <!-- 10. Bags & Acc -->
                    <span class="badge-pill d-flex align-items-center gap-2" style="background: rgba(107, 114, 128, 0.15); padding: 5px 12px; border-radius: 50px;">
                        <span class="badge-dot" style="background: #6b7280; width: 7px; height: 7px; border-radius: 50%;"></span>
                        <span style="font-size: 11px; font-weight: 500; color: #ffffff; letter-spacing: 0.3px;">Bags & Acc</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
            <hr class="section-divider">


            <div class="page-header">
                <h4>Analytics</h4>
                <p>Performance overview across all channels.</p>
            </div>
            <div class="row g-3 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="metric-card blue">
                        <div>
                            <div class="metric-label">Total Revenue</div>
                            <div class="metric-value">$45,231</div>
                        </div>
                        <i class="bi bi-currency-dollar metric-icon"></i>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="metric-card orange">
                        <div>
                            <div class="metric-label">Orders Today</div>
                            <div class="metric-value">128</div>
                        </div>
                        <i class="bi bi-cart-check metric-icon"></i>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="metric-card teal">
                        <div>
                            <div class="metric-label">New Customers</div>
                            <div class="metric-value">42</div>
                        </div>
                        <i class="bi bi-person-plus metric-icon"></i>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="metric-card slate">
                        <div>
                            <div class="metric-label">Conversion Rate</div>
                            <div class="metric-value">3.2%</div>
                        </div>
                        <i class="bi bi-graph-up-arrow metric-icon"></i>
                    </div>
                </div>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-lg-8">
                    <div class="chart-card">
                        <div class="chart-card-header">
                            <div class="ch-icon" style="background:#6366f1;">
                                <i class="bi bi-graph-up"></i>
                            </div>
                            <div>
                                <div class="ch-title">Revenue Overview</div>
                                <div class="ch-sub">This week</div>
                            </div>
                        </div>
                        <div class="chart-body">
                            <div class="chart-canvas-wrap" style="height:220px;">
                                <canvas id="revenueChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="chart-card">
                        <div class="chart-card-header">
                            <div class="ch-icon" style="background:#8b5cf6;">
                                <i class="bi bi-pie-chart"></i>
                            </div>
                            <div>
                                <div class="ch-title">Sales by Category</div>
                                <div class="ch-sub">All time</div>
                            </div>
                        </div>
                        <div class="chart-body">
                            <div class="chart-canvas-wrap" style="height:220px;">
                                <canvas id="categoryChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row g-3 mb-4">
                <div class="col-lg-6">
                    <div class="chart-card">
                        <div class="chart-card-header">
                            <div class="ch-icon" style="background:#0ea5e9;">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div>
                                <div class="ch-title">Top Locations</div>
                                <div class="ch-sub">Sales by city</div>
                            </div>
                        </div>
                        <div class="chart-body">
                            <div class="chart-canvas-wrap" style="height:220px;">
                                <canvas id="locationChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="chart-card">
                        <div class="chart-card-header">
                            <div class="ch-icon" style="background:#ec4899;">
                                <i class="bi bi-clock-history"></i>
                            </div>
                            <div>
                                <div class="ch-title">Traffic Sources</div>
                                <div class="ch-sub">Channel breakdown</div>
                            </div>
                        </div>
                        <div class="chart-body">
                            <div class="chart-canvas-wrap" style="height:220px;">
                                <canvas id="trafficChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row g-3 mb-2">
                <div class="col-md-4">
                    <div class="progress-widget">
                        <div class="pw-info">
                            <div class="pw-label">Monthly Sale</div>
                            <div class="pw-value">80%</div>
                        </div>
                        <div class="pw-bar-wrap">
                            <div class="pw-bar" style="width:80%;background:#3b82f6;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="progress-widget">
                        <div class="pw-info">
                            <div class="pw-label">New Users</div>
                            <div class="pw-value">254</div>
                        </div>
                        <div class="pw-bar-wrap">
                            <div class="pw-bar" style="width:60%;background:#10b981;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="progress-widget">
                        <div class="pw-info">
                            <div class="pw-label">Impressions</div>
                            <div class="pw-value">70%</div>
                        </div>
                        <div class="pw-bar-wrap">
                            <div class="pw-bar" style="width:70%;background:#06b6d4;"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>{{-- /content --}}
    </div>{{-- /main-content --}}

    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <h6 class="modal-title" id="logoutModalLabel">Confirm logout</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="font-size:13px;color:var(--text-muted);">
                    Are you sure you want to log out of your session?
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-sm btn-danger" id="confirmLogout">Log out</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {

        const gridColor  = 'rgba(255,255,255,0.04)';
        const tickColor  = '#64748b';
        const baseOpts   = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } }
        };

        new Chart(document.getElementById('donutChart'), {
            type: 'doughnut',
            data: {
                labels: ['New York', 'Los Angeles', 'Dallas'],
                datasets: [{
                    data: [45, 32, 23],
                    backgroundColor: ['#3b82f6', '#10b981', '#f59e0b'],
                    borderWidth: 0,
                    hoverOffset: 6
                }]
            },
            options: {
                ...baseOpts,
                cutout: '68%',
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: ctx => '  ' + ctx.label + ': ' + ctx.parsed + '%'
                        }
                    }
                }
            }
        });


        new Chart(document.getElementById('areaChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [
                    {
                        label: 'iPhone',
                        data: [42, 58, 51, 67, 72, 85, 78],
                        borderColor: '#3b82f6',
                        backgroundColor: 'rgba(59,130,246,0.12)',
                        borderWidth: 2,
                        pointRadius: 3,
                        pointHoverRadius: 5,
                        tension: 0.4,
                        fill: true
                    },
                    {
                        label: 'Mac',
                        data: [28, 35, 30, 44, 39, 51, 48],
                        borderColor: '#f97316',
                        backgroundColor: 'rgba(249,115,22,0.08)',
                        borderWidth: 2,
                        pointRadius: 3,
                        pointHoverRadius: 5,
                        tension: 0.4,
                        fill: true
                    }
                ]
            },
            options: {
                ...baseOpts,
                scales: {
                    x: { grid: { display: false }, ticks: { color: tickColor } },
                    y: { beginAtZero: true, grid: { color: gridColor }, ticks: { color: tickColor } }
                }
            }
        });


        new Chart(document.getElementById('revenueChart'), {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Revenue',
                    data: [12, 19, 15, 18, 22, 25, 20],
                    borderColor: '#6366f1',
                    backgroundColor: 'rgba(99,102,241,0.15)',
                    borderWidth: 2.5,
                    pointRadius: 3,
                    pointHoverRadius: 5,
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                ...baseOpts,
                scales: {
                    x: { grid: { display: false }, ticks: { color: tickColor } },
                    y: {
                        beginAtZero: true,
                        grid: { color: gridColor },
                        ticks: { color: tickColor, callback: v => '$' + v + 'k' }
                    }
                }
            }
        });


        new Chart(document.getElementById('categoryChart'), {
            type: 'doughnut',
            data: {
                labels: ['Electronics', 'Clothing', 'Accessories', 'Home'],
                datasets: [{
                    data: [35, 25, 20, 20],
                    backgroundColor: ['#3b82f6', '#f97316', '#14b8a6', '#6b7280'],
                    borderWidth: 0
                }]
            },
            options: {
                ...baseOpts,
                cutout: '62%',
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: { color: '#94a3b8', padding: 14, boxWidth: 10, font: { size: 11 } }
                    }
                }
            }
        });

        new Chart(document.getElementById('locationChart'), {
            type: 'bar',
            data: {
                labels: ['Phnom Penh', 'Siem Reap', 'Sihanoukville', 'Battambang', 'Kampot'],
                datasets: [{
                    label: 'Sales',
                    data: [45, 32, 28, 22, 18],
                    backgroundColor: ['#3b82f6', '#14b8a6', '#f97316', '#6b7280', '#8b5cf6'],
                    borderWidth: 0,
                    borderRadius: 6,
                    borderSkipped: false
                }]
            },
            options: {
                ...baseOpts,
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { color: tickColor, maxRotation: 30, font: { size: 11 } }
                    },
                    y: {
                        beginAtZero: true,
                        grid: { color: gridColor },
                        ticks: { color: tickColor }
                    }
                }
            }
        });

        new Chart(document.getElementById('trafficChart'), {
            type: 'doughnut',
            data: {
                labels: ['Direct', 'Social', 'Email', 'Search'],
                datasets: [{
                    data: [40, 25, 20, 15],
                    backgroundColor: ['#3b82f6', '#10b981', '#f59e0b', '#8b5cf6'],
                    borderWidth: 0
                }]
            },
            options: {
                ...baseOpts,
                cutout: '62%',
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: { color: '#94a3b8', padding: 14, boxWidth: 10, font: { size: 11 } }
                    }
                }
            }
        });

        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');

        sidebarToggle?.addEventListener('click', () => {
            sidebar.classList.toggle('show');
        });

        document.addEventListener('click', e => {
            if (window.innerWidth < 768 &&
                !sidebar.contains(e.target) &&
                !sidebarToggle.contains(e.target)) {
                sidebar.classList.remove('show');
            }
        });

        const logoutForm = document.createElement('form');
        logoutForm.method = 'POST';
        logoutForm.action = '{{ route("logout") }}';
        logoutForm.innerHTML = `<input type="hidden" name="_token" value="{{ csrf_token() }}">`;
        document.body.appendChild(logoutForm);
        document.getElementById('confirmLogout')?.addEventListener('click', () => {
            logoutForm.submit();
        });
    });
    </script>
</body>
</html>
