<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        :root {
            --gold-primary: #D4AF37;
            --gold-secondary: #C9A961;
            --obsidian-dark: #0A0A0A;
            --obsidian-medium: #1A1A1A;
            --obsidian-light: #2A2A2A;
            --glass-bg: rgba(26, 26, 26, 0.7);
            --glass-border: rgba(212, 175, 55, 0.15);
            --text-primary: #F8F9FA;
            --text-secondary: #ADB5BD;
            --text-muted: #6C757D;
        }

        body {
            background: linear-gradient(135deg, var(--obsidian-dark) 0%, #050505 100%);
            font-family: 'Inter', 'Helvetica Neue', Arial, sans-serif;
            color: var(--text-primary);
            min-height: 100vh;
        }

        .admin-layout {
            min-height: 100vh;
            background: radial-gradient(circle at 100% 0%, rgba(212, 175, 55, 0.03) 0%, transparent 50%);
        }

        .admin-sidebar {
            background: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(20px);
            min-height: 100vh;
            position: fixed;
            width: 260px;
            border-right: 1px solid var(--glass-border);
            z-index: 1000;
        }

        .admin-logo {
            padding: 24px 20px;
            border-bottom: 1px solid var(--glass-border);
        }

        .admin-logo img {
            filter: brightness(1.2);
        }

        .admin-nav .nav-link {
            color: var(--text-secondary);
            padding: 14px 24px;
            display: flex;
            align-items: center;
            gap: 16px;
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            border-left: 3px solid transparent;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .admin-nav .nav-link:hover,
        .admin-nav .nav-link.active {
            background: linear-gradient(90deg, rgba(212, 175, 55, 0.15) 0%, transparent 100%);
            color: var(--gold-primary);
            border-left-color: var(--gold-primary);
        }

        .admin-nav .nav-link svg {
            width: 20px;
            height: 20px;
            opacity: 0.7;
        }

        .admin-nav .nav-link:hover svg {
            opacity: 1;
        }

        .admin-content {
            margin-left: 260px;
            padding: 32px;
            background: transparent;
        }

        .admin-header {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            padding: 24px 32px;
            margin-bottom: 32px;
            border-radius: 16px;
            border: 1px solid var(--glass-border);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .admin-header h1 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            letter-spacing: 1px;
            color: var(--text-primary);
        }

        .admin-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border-radius: 16px;
            border: 1px solid var(--glass-border);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .admin-card:hover {
            box-shadow: 0 12px 48px rgba(212, 175, 55, 0.1);
        }

        .admin-card .card-header,
        .admin-card .p-4.border-bottom,
        .admin-card .p-3.border-bottom {
            border-bottom: 1px solid var(--glass-border) !important;
            background: rgba(26, 26, 26, 0.5);
        }

        .table {
            --bs-table-bg: transparent;
            --bs-table-color: var(--text-primary);
            --bs-table-border-color: var(--glass-border);
        }

        .table thead th {
            color: var(--text-secondary);
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-size: 11px;
            border-bottom: 1px solid var(--glass-border);
        }

        .table tbody tr {
            transition: background 0.2s ease;
        }

        .table tbody tr:hover {
            background: rgba(212, 175, 55, 0.05);
        }

        .badge-stock-low {
            background: rgba(212, 175, 55, 0.2);
            color: var(--gold-secondary);
            border: 1px solid rgba(212, 175, 55, 0.3);
            position: relative;
            overflow: hidden;
        }

        .badge-stock-low::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(90deg, transparent, rgba(212, 175, 55, 0.3), transparent);
            background-size: 200% 100%;
            animation: shimmer 2s linear infinite;
        }

        .badge-stock-out {
            background: rgba(220, 53, 69, 0.2);
            color: #DC3545;
            border: 1px solid rgba(220, 53, 69, 0.3);
        }

        .badge-stock-in {
            background: rgba(25, 135, 84, 0.2);
            color: #198754;
            border: 1px solid rgba(25, 135, 84, 0.3);
        }

        .table-image {
            width: 48px;
            height: 48px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s ease;
        }

        .table-image:hover {
            transform: scale(1.05);
        }

        .btn-primary, .btn-primary:hover {
            background: linear-gradient(135deg, var(--gold-primary) 0%, var(--gold-secondary) 100%);
            border: none;
            color: #0A0A0A;
            font-weight: 600;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            box-shadow: 0 8px 24px rgba(212, 175, 55, 0.3);
            transform: translateY(-2px);
        }

        .btn-outline-secondary, .btn-outline-secondary:hover {
            border: 1px solid var(--glass-border);
            color: var(--text-secondary);
            background: transparent;
        }

        .btn-outline-secondary:hover {
            background: rgba(212, 175, 55, 0.1);
            color: var(--gold-primary);
            border-color: var(--gold-primary);
        }

        .form-control, .form-select {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--glass-border);
            color: var(--text-primary);
            border-radius: 12px;
        }

        .form-control:focus, .form-select:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--gold-primary);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.15);
            color: var(--text-primary);
        }

        .form-label {
            color: var(--text-secondary);
            font-weight: 500;
            letter-spacing: 0.5px;
            font-size: 12px;
            text-transform: uppercase;
        }

        .alert-success {
            background: rgba(25, 135, 84, 0.15);
            border: 1px solid rgba(25, 135, 84, 0.3);
            color: #198754;
        }

        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        @keyframes pulse-gold {
            0%, 100% { box-shadow: 0 0 0 0 rgba(212, 175, 55, 0.4); }
            50% { box-shadow: 0 0 20px 5px rgba(212, 175, 55, 0.2); }
        }

        .gold-accent {
            position: relative;
        }

        .gold-accent::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, var(--gold-primary), var(--gold-secondary));
            opacity: 0.5;
        }

        .pulse-gold {
            animation: pulse-gold 2s ease-in-out infinite;
        }

        @media (max-width: 768px) {
            .admin-sidebar {
                width: 60px;
            }
            .admin-content {
                margin-left: 60px;
            }
            .admin-nav .nav-text {
                display: none;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="admin-layout d-flex">
        @include('admin.layouts.partials.sidebar')
        <div class="admin-content flex-grow-1">
            <div class="admin-header d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0 fw-bold">@yield('title', 'Dashboard')</h1>
                @yield('header-actions')
            </div>
            <main>
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>

    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>