<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Analytics - LOOMA Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --sidebar-width: 260px;
            --sidebar-width-collapsed: 70px;
            --card-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
            --transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: #e2e8f0;
            min-height: 100vh;
            margin: 0;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            z-index: 1000;
            padding: 1.5rem 0;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
        }

        .sidebar-brand {
            padding: 0 1.5rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .sidebar-brand h4 {
            font-weight: 700;
            color: #fff;
            margin: 0;
        }

        .sidebar-brand h5 {
            font-weight: 700;
            color: #fff;
            margin: 0;
            font-size: 1rem;
            white-space: nowrap;
        }

        .brand-logo {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-right: 10px;
        }

        .sidebar-nav {
            margin-top: 2rem;
        }

        .sidebar-nav .nav-link {
            color: #94a3b8;
            padding: 0.875rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: var(--transition);
            border-left: 3px solid transparent;
            font-weight: 500;
        }

        .nav-section {
            padding: 0.25rem 1.5rem 0.5rem;
            font-size: 10px;
            font-weight: 600;
            letter-spacing: .1em;
            color: #64748b;
            text-transform: uppercase;
            margin-top: 0.5rem;
        }

        .sidebar-nav .nav-link:hover,
        .sidebar-nav .nav-link.active {
            background: rgba(59, 130, 246, 0.1);
            color: #fff;
            border-left-color: #3b82f6;
        }

        .sidebar-nav .nav-link i {
            font-size: 1.25rem;
            width: 24px;
            text-align: center;
        }

        .sidebar-footer {
            padding: 1rem 0;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            margin-top: auto;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            transition: var(--transition);
        }

        .navbar {
            background: rgba(30, 41, 59, 0.6);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding: 1rem 2rem;
        }

        .search-bar {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 0.5rem 1rem;
            color: #fff;
        }

        .search-bar::placeholder {
            color: #64748b;
        }

        .navbar .nav-icon {
            color: #94a3b8;
            font-size: 1.25rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .navbar .nav-icon:hover {
            color: #fff;
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 900;
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
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
            left: .75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            font-size: .9rem;
        }

        .search-input {
            background: rgba(255, 255, 255, .04);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            padding: .45rem 1rem .45rem 2.25rem;
            color: #fff;
            font-size: 13px;
            width: 100%;
            outline: none;
        }

        .search-input::placeholder {
            color: #64748b;
        }

        .search-input:focus {
            border-color: rgba(0, 102, 255, 0.5);
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: .875rem;
        }

        .notif-dot {
            position: absolute;
            top: 6px;
            right: 6px;
            width: 7px;
            height: 7px;
            background: #ef4444;
            border-radius: 50%;
            border: 1.5px solid #0f172a;
        }

        .avatar-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
            border: 2px solid rgba(0, 102, 255, 0.4);
        }

        .avatar-btn img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .content-wrapper {
            padding: 2rem;
        }

        .admin-card {
            background: rgba(30, 41, 59, 0.6);
            backdrop-filter: blur(20px);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: var(--card-shadow);
            margin-bottom: 1.5rem;
        }

        .chart-card {
            background: rgba(30, 41, 59, 0.6);
            backdrop-filter: blur(20px);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }

        .chart-card .card-header {
            background: rgba(255, 255, 255, 0.02);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding: 1rem 1.5rem;
            font-weight: 600;
        }

        .chart-card .card-body {
            padding: 1.5rem;
        }

        .metric-card {
            background: rgba(30, 41, 59, 0.6);
            backdrop-filter: blur(20px);
            border-radius: 16px;
            padding: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: var(--card-shadow);
            transition: var(--transition);
        }

        .metric-card.blue { background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); }
        .metric-card.orange { background: linear-gradient(135deg, #f97316 0%, #ea580c 100%); }
        .metric-card.teal { background: linear-gradient(135deg, #14b8a6 0%, #0d9488 100%); }
        .metric-card.gray { background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%); }

        .metric-card .icon { opacity: 0.5; }
        .metric-card .label { font-size: 0.875rem; opacity: 0.8; }
        .metric-card .value { font-size: 1.75rem; font-weight: 700; }

        @media (max-width: 992px) {
            .sidebar { width: var(--sidebar-width-collapsed); }
            .sidebar .nav-text { display: none; }
            .main-content { margin-left: var(--sidebar-width-collapsed); }
        }

        @media (max-width: 768px) {
            .main-content { margin-left: 0; padding: 1rem; }
            .sidebar { transform: translateX(-100%); }
            .sidebar.show { transform: translateX(0); }
        }
    </style>
    @include('admin.partials.theme')
</head>
<body>
    @include('admin.partials.sidebar')

    <div class="main-content">
        @include('admin.partials.topbar', ['searchPlaceholder' => 'Search analytics…'])

        <div class="content-wrapper">
            <div class="admin-card p-4 mb-4">
                <h4 class="mb-0">Analytics Dashboard</h4>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-sm-6 col-lg-3">
                    <div class="metric-card blue h-100">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="label mb-1">Total Revenue</div>
                                <div class="value">$45,231</div>
                            </div>
                            <div class="icon"><i class="bi bi-currency-dollar display-4"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="metric-card orange h-100">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="label mb-1">Orders Today</div>
                                <div class="value">128</div>
                            </div>
                            <div class="icon"><i class="bi bi-cart-check display-4"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="metric-card teal h-100">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="label mb-1">New Customers</div>
                                <div class="value">42</div>
                            </div>
                            <div class="icon"><i class="bi bi-person-plus display-4"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="metric-card gray h-100">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="label mb-1">Conversion Rate</div>
                                <div class="value">3.2%</div>
                            </div>
                            <div class="icon"><i class="bi bi-graph-up-arrow display-4"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-lg-8">
                    <div class="chart-card h-100">
                        <div class="card-header">
                            <i class="bi bi-graph-up me-2"></i>Revenue Overview
                        </div>
                        <div class="card-body">
                            <canvas id="revenueChart" height="100"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="chart-card h-100">
                        <div class="card-header">
                            <i class="bi bi-pie-chart me-2"></i>Sales by Category
                        </div>
                        <div class="card-body">
                            <canvas id="categoryChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-lg-6">
                    <div class="chart-card h-100">
                        <div class="card-header">
                            <i class="bi bi-geo-alt me-2"></i>Top Locations
                        </div>
                        <div class="card-body">
                            <canvas id="locationChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="chart-card h-100">
                        <div class="card-header">
                            <i class="bi bi-clock-history me-2"></i>Traffic Sources
                        </div>
                        <div class="card-body">
                            <canvas id="trafficChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @include('admin.partials.logout')
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.querySelector('.sidebar');
            sidebarToggle?.addEventListener('click', function() {
                sidebar.classList.toggle('show');
            });

            const revenueCtx = document.getElementById('revenueChart').getContext('2d');
            const revenueChart = new Chart(revenueCtx, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Revenue',
                        data: [12, 19, 15, 18, 22, 25, 20],
                        borderColor: '#3b82f6',
                        backgroundColor: 'rgba(59, 130, 246, 0.2)',
                        borderWidth: 3,
                        pointRadius: 4,
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: { grid: { display: false }, ticks: { color: '#64748b' } },
                        y: {
                            beginAtZero: true,
                            grid: { color: 'rgba(255, 255, 255, 0.03)' },
ticks: { color: '#64748b', callback: v => '$' + v + 'k' }
                         }
                     },
                    plugins: { legend: { display: false } }
                }
            });

            const categoryCtx = document.getElementById('categoryChart').getContext('2d');
            const categoryChart = new Chart(categoryCtx, {
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
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '60%',
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: { color: '#94a3b8', padding: 20 }
                        }
                    }
                }
            });

            const locationCtx = document.getElementById('locationChart').getContext('2d');
            const locationChart = new Chart(locationCtx, {
                type: 'bar',
                data: {
                    labels: ['New York', 'Los Angeles', 'Dallas', 'Chicago', 'Miami'],
                    datasets: [{
                        label: 'Sales',
                        data: [45, 32, 28, 22, 18],
                        backgroundColor: ['#3b82f6', '#14b8a6', '#f97316', '#6b7280', '#8b5cf6'],
                        borderWidth: 0,
                        borderRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: { grid: { display: false }, ticks: { color: '#64748b' } },
                        y: {
                            beginAtZero: true,
                            grid: { color: 'rgba(255, 255, 255, 0.03)' },
                            ticks: { color: '#64748b' }
                        }
                    },
                    plugins: { legend: { display: false } }
                }
            });

            const trafficCtx = document.getElementById('trafficChart').getContext('2d');
            const trafficChart = new Chart(trafficCtx, {
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
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '60%',
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: { color: '#94a3b8', padding: 20 }
                        }
                    }
                }
            });

        });
    </script>
</body>
</html>
