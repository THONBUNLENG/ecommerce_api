<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Products - LOOMA Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 260px;
            --sidebar-collapsed: 70px;
            --transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            --bg-card: rgba(30, 41, 59, 0.7);
            --border: rgba(255, 255, 255, 0.06);
            --text-primary: #f8fafc;
            --text-muted: #94a3b8;
            --text-faint: #64748b;
            --brand-blue: #0066ff;
        }

        * {
            box-sizing: border-box;
        }

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
            top: 0;
            left: 0;
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
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #1a1a1a, #000000);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
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

        .sidebar-nav::-webkit-scrollbar {
            width: 0;
        }

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
            text-decoration: none;
        }

        .sidebar-nav .nav-link:hover {
            background: rgba(255, 255, 255, .05);
            color: #cbd5e1;
        }

        .sidebar-nav .nav-link.active {
            background: rgba(255, 255, 255, .08);
            color: #fff;
            border-left-color: var(--brand-blue);
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

        .main-content {
            margin-left: var(--sidebar-width);
            transition: var(--transition);
            min-height: 100vh;
        }


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
            left: .75rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-faint);
            font-size: .9rem;
        }

        .search-input {
            background: rgba(255, 255, 255, .04);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: .45rem 1rem .45rem 2.25rem;
            color: var(--text-primary);
            font-size: 13px;
            width: 100%;
            outline: none;
            transition: border-color .2s;
        }

        .search-input::placeholder {
            color: var(--text-faint);
        }

        .search-input:focus {
            border-color: rgba(255, 255, 255, 0.2);
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: .875rem;
        }

        .icon-btn {
            width: 36px;
            height: 36px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, .03);
            border: 1px solid var(--border);
            color: var(--text-muted);
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            position: relative;
        }

        .icon-btn:hover {
            background: rgba(255, 255, 255, 0.08);
            color: #fff;
        }

        .icon-btn i {
            font-size: 1rem;
        }

        .notif-dot {
            position: absolute;
            top: 6px;
            right: 6px;
            width: 7px;
            height: 7px;
            background: #ef4444;
            border-radius: 50%;
            border: 1.5px solid #000000;
        }

        .avatar-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
            border: 2px solid rgba(255, 255, 255, .2);
        }

        .avatar-btn img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }


        .content {
            padding: 1.75rem;
        }

        .card-panel {
            background: var(--bg-card);
            backdrop-filter: blur(20px);
            border-radius: 14px;
            border: 1px solid var(--border);
        }


        .stat-mini {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: .75rem 1.1rem;
            min-width: 110px;
        }

        .stat-mini .sm-label {
            font-size: 11px;
            color: var(--text-faint);
            margin-bottom: 3px;
        }

        .stat-mini .sm-value {
            font-size: 1.35rem;
            font-weight: 700;
            line-height: 1;
        }


        .table {
            color: var(--text-primary) !important;
            margin: 0;
            --bs-table-bg: transparent !important;
            --bs-table-hover-bg: transparent !important;
            background-color: transparent !important;
        }

        .table thead th {
            background: rgba(255, 255, 255, 0.03) !important;
            border-bottom: 1px solid var(--border) !important;
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
            background-color: transparent !important;
            border-bottom: 1px solid var(--border) !important;
            border-top: none;
            padding: .875rem 1rem;
            vertical-align: middle;
            color: var(--text-primary);
        }

        .table tbody tr:last-child td {
            border-bottom: none !important;
        }

        .table tbody tr {
            transition: background .15s;
            background-color: transparent !important;
        }

        .table tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.03) !important;
        }


        .product-img {
            width: 44px;
            height: 44px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid var(--border);
        }

        .product-img-placeholder {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            background: rgba(255, 255, 255, .06);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-primary);
            font-size: 1.1rem;
            flex-shrink: 0;
        }


        .stock-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 3px 9px;
            border-radius: 20px;
            font-size: 11.5px;
            font-weight: 500;
        }

        .stock-badge::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
        }

        .stock-in {
            background: rgba(16, 185, 129, .12);
            color: #34d399;
        }

        .stock-in::before {
            background: #34d399;
        }

        .stock-low {
            background: rgba(245, 158, 11, .12);
            color: #fbbf24;
        }

        .stock-low::before {
            background: #fbbf24;
        }

        .stock-out {
            background: rgba(239, 68, 68, .12);
            color: #f87171;
        }

        .stock-out::before {
            background: #f87171;
        }

        .action-btn {
            width: 30px;
            height: 30px;
            border-radius: 7px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border);
            background: rgba(255, 255, 255, 0.04);
            color: var(--text-muted);
            cursor: pointer;
            transition: var(--transition);
            font-size: 13px;
            text-decoration: none;
        }

        .action-btn:hover {
            background: rgba(255, 255, 255, .1);
            color: #fff;
        }

        .action-btn.edit:hover {
            background: rgba(255, 255, 255, .15);
            color: #fff;
            border-color: rgba(255, 255, 255, .2);
        }

        .action-btn.view:hover {
            background: rgba(255, 255, 255, .08);
            color: #fff;
            border-color: rgba(255, 255, 255, .1);
        }

        .action-btn.del:hover {
            background: rgba(239, 68, 68, .15);
            color: #f87171;
            border-color: rgba(239, 68, 68, .3);
        }


        .form-check-input:checked {
            background-color: var(--brand-blue);
            border-color: var(--brand-blue);
        }

        .form-check-input {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.2);
        }


        .pagination .page-link {
            background: rgba(255, 255, 255, .04);
            border-color: var(--border);
            color: var(--text-muted);
            font-size: 13px;
        }

        .pagination .page-link:hover {
            background: rgba(255, 255, 255, .08);
            color: #fff;
            border-color: var(--border);
        }

        .pagination .page-item.active .page-link {
            background: var(--brand-blue);
            border-color: var(--brand-blue);
            color: #fff;
        }

        .pagination .page-item.disabled .page-link {
            background: rgba(255, 255, 255, .02);
            color: var(--text-faint);
        }

        #addProductDrawer {
            position: fixed;
            top: 0;
            bottom: 0;
            right: 0;
            z-index: 1060;
            width: 640px;
            min-width: 420px;
            max-width: 96vw;
            background: #0f1623;
            box-shadow: -20px 0 60px rgba(0, 0, 0, .6);
            transform: translateX(100%);
            transition: transform .3s cubic-bezier(.25, .46, .45, .94), width .25s ease;
            display: flex;
            flex-direction: column;
        }

        #addProductDrawer.drawer-open {
            transform: translateX(0);
        }

        #addProductDrawer.drawer-maximized {
            width: 85vw !important;
        }

        #addProductDrawer.drawer-maximized .form-row {
            flex-wrap: nowrap;
        }

        #addProductDrawer.drawer-maximized .desc-grid {
            grid-template-columns: 1fr 1fr;
        }

        #addProductDrawer.drawer-maximized .flags-grid {
            grid-template-columns: repeat(3, 1fr);
        }

        #drawerResizer {
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            cursor: ew-resize;
            z-index: 10;
            background: transparent;
            transition: background .15s;
        }

        #drawerResizer:hover,
        #drawerResizer.resizing {
            background: rgba(0, 102, 255, .45);
        }

        #drawerResizer::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 2px;
            height: 40px;
            border-radius: 2px;
            background: rgba(255, 255, 255, .18);
            opacity: 0;
            transition: opacity .15s;
        }

        #drawerResizer:hover::after {
            opacity: 1;
        }

        #drawerWidthBadge {
            position: absolute;
            top: 50%;
            left: -38px;
            transform: translateY(-50%);
            background: #0066ff;
            color: #fff;
            font-size: 10px;
            font-weight: 600;
            padding: 3px 6px;
            border-radius: 5px;
            white-space: nowrap;
            pointer-events: none;
            opacity: 0;
            transition: opacity .15s;
        }

        #drawerResizer.resizing #drawerWidthBadge {
            opacity: 1;
        }

        #addProductDrawerBackdrop {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 1050;
            background: rgba(0, 0, 0, .55);
            backdrop-filter: blur(4px);
        }

        #addProductDrawerBackdrop.backdrop-open {
            display: block;
        }

        .drawer-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: .875rem 1.25rem;
            border-bottom: 1px solid var(--border);
            flex-shrink: 0;
            user-select: none;
        }

        .drawer-ctrl-btn {
            width: 30px;
            height: 30px;
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, .04);
            border: 1px solid rgba(255, 255, 255, .08);
            color: rgba(255, 255, 255, .45);
            cursor: pointer;
            transition: all .15s;
            font-size: .85rem;
            padding: 0;
        }

        .drawer-ctrl-btn:hover {
            background: rgba(255, 255, 255, .1);
            color: #fff;
            border-color: rgba(255, 255, 255, .18);
        }

        .drawer-ctrl-btn.active {
            background: rgba(0, 102, 255, .2);
            color: #60a5fa;
            border-color: rgba(0, 102, 255, .35);
        }

        .drawer-body {
            flex: 1;
            overflow-y: auto;
            padding: 1.25rem;
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 255, 255, .1) transparent;
        }

        .drawer-body::-webkit-scrollbar {
            width: 5px;
        }

        .drawer-body::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, .1);
            border-radius: 3px;
        }


        .form-label {
            font-size: 11.5px;
            color: var(--text-faint);
            margin-bottom: 4px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: .04em;
            display: block;
        }

        .form-label .req {
            color: #ef4444;
            margin-left: 2px;
        }

        .form-control,
        .form-select {
            background: rgba(255, 255, 255, .04);
            border: 1px solid rgba(255, 255, 255, .09);
            border-radius: 7px;
            color: var(--text-primary);
            font-size: 13px;
            padding: .42rem .75rem;
            width: 100%;
            transition: border-color .2s, background .2s;
            outline: none;
        }

        .form-control:focus,
        .form-select:focus {
            background: rgba(255, 255, 255, .07);
            border-color: var(--brand-blue);
            box-shadow: 0 0 0 3px rgba(0, 102, 255, .15);
            color: var(--text-primary);
        }

        .form-control::placeholder {
            color: var(--text-faint);
        }

        .form-select option {
            background: #1e293b;
            color: var(--text-primary);
        }

        /* section divider */
        .form-section {
            margin-bottom: 1.1rem;
        }

        .form-section-title {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: .09em;
            text-transform: uppercase;
            color: var(--text-faint);
            padding-bottom: 6px;
            border-bottom: 1px solid var(--border);
            margin-bottom: 10px;
        }

        .form-row {
            display: flex;
            gap: 8px;
            margin-bottom: 10px;
            flex-wrap: wrap;
        }

        .form-col {
            flex: 1;
            min-width: 100px;
        }

        .form-col-auto {
            flex: 0 0 auto;
        }

        .img-field-row {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 7px;
        }

        .img-field-label {
            font-size: 12px;
            color: var(--text-muted);
            width: 76px;
            flex-shrink: 0;
        }

        .img-field-input {
            flex: 1;
        }

        .img-mgr-btn {
            background: rgba(255, 255, 255, .06);
            border: 1px solid rgba(255, 255, 255, .1);
            border-radius: 6px;
            color: var(--text-muted);
            font-size: 11.5px;
            padding: 4px 9px;
            cursor: pointer;
            white-space: nowrap;
            transition: background .2s;
        }

        .img-mgr-btn:hover {
            background: rgba(255, 255, 255, .12);
            color: #fff;
        }


        .exemptions-list {
            background: rgba(255, 255, 255, .03);
            border: 1px solid rgba(255, 255, 255, .09);
            border-radius: 7px;
            padding: 6px 8px;
            min-height: 90px;
        }

        .exemptions-list label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            color: var(--text-muted);
            padding: 2px 0;
            cursor: pointer;
        }

        .exemptions-list label:hover {
            color: var(--text-primary);
        }


        .flags-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4px 16px;
        }

        .flags-grid label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            color: var(--text-muted);
            cursor: pointer;
        }

        .flags-grid label:hover {
            color: var(--text-primary);
        }


        .dim-wrap {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .dim-wrap input {
            width: 56px;
            text-align: center;
        }

        .dim-sep {
            color: var(--text-faint);
            font-size: 12px;
        }

        .qty-pricing-row {
            display: flex;
            gap: 4px;
        }

        .qty-pricing-row input {
            width: 60px;
            text-align: center;
        }

        .desc-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .drawer-footer {
            display: flex;
            gap: 8px;
            padding: 1rem 1.25rem;
            border-top: 1px solid var(--border);
            flex-shrink: 0;
        }

        .btn-save {
            flex: 1;
            background: var(--brand-blue);
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 13.5px;
            font-weight: 500;
            padding: .55rem 1rem;
            cursor: pointer;
            transition: opacity .2s;
        }

        .btn-save:hover {
            opacity: .88;
        }

        .btn-reset {
            background: rgba(255, 255, 255, .05);
            border: 1px solid rgba(255, 255, 255, .1);
            border-radius: 8px;
            color: var(--text-muted);
            font-size: 13.5px;
            padding: .55rem 1.1rem;
            cursor: pointer;
            transition: background .2s;
        }

        .btn-reset:hover {
            background: rgba(255, 255, 255, .1);
            color: #fff;
        }

        code {
            background: rgba(255, 255, 255, .07);
            color: #fff;
            padding: 2px 7px;
            border-radius: 5px;
            font-size: 12px;
        }

        .empty-state {
            padding: 3.5rem 1rem;
            text-align: center;
            color: var(--text-faint);
        }

        .empty-state i {
            font-size: 2.5rem;
            margin-bottom: .75rem;
            opacity: .4;
        }

        .empty-state p {
            margin: 0;
            font-size: 13.5px;
        }

        .action-btn.del {
            color: #fca5a5;
        }

        .delete-modal {
            background: rgba(15, 23, 42, 0.98);
            border: 1px solid var(--border);
            border-radius: 18px;
            color: var(--text-primary);
            box-shadow: 0 24px 80px rgba(0, 0, 0, 0.45);
        }

        .delete-modal-body {
            padding: 1.4rem;
            text-align: center;
        }

        .delete-modal-icon {
            width: 58px;
            height: 58px;
            margin: 0 auto 1rem;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(239, 68, 68, 0.14);
            color: #f87171;
            font-size: 1.6rem;
        }

        .delete-modal h5 {
            margin: 0 0 .45rem;
            font-size: 1rem;
            font-weight: 700;
            color: #fff;
        }

        .delete-modal p {
            margin: 0;
            color: var(--text-muted);
            font-size: 13px;
            line-height: 1.6;
        }

        .delete-modal strong {
            color: #fff;
            word-break: break-word;
        }

        .delete-modal-actions {
            display: flex;
            gap: 8px;
            margin-top: 1.25rem;
        }

        .btn-save-danger {
            background: #ef4444;
        }

        .btn-save-danger:hover {
            opacity: .88;
        }

        @media (max-width: 1200px) {
            .sidebar {
                width: var(--sidebar-collapsed);
            }

            .sidebar .nav-text,
            .sidebar .nav-section,
            .sidebar-brand h5 {
                display: none;
            }

            .sidebar-nav .nav-link {
                padding: .75rem;
                justify-content: center;
            }

            .sidebar-nav .nav-link i {
                width: auto;
                margin: 0;
            }

            .main-content {
                margin-left: var(--sidebar-collapsed);
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: var(--sidebar-width);
            }

            .sidebar .nav-text,
            .sidebar .nav-section,
            .sidebar-brand h5 {
                display: block;
            }

            .sidebar-nav .nav-link {
                padding: .75rem 1.5rem;
                justify-content: flex-start;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .search-wrap {
                flex: 1;
            }

            #addProductDrawer {
                max-width: 100%;
            }

            .desc-grid {
                grid-template-columns: 1fr;
            }

            .flags-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    @include('admin.partials.theme')
</head>

<body>

    {{-- ── Sidebar ── --}}
    @include('admin.partials.sidebar')

    <div class="main-content">
        @include('admin.partials.topbar', ['searchPlaceholder' => 'Search products…'])

        {{-- Content --}}
        <div class="content">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h4 style="font-size:1.15rem;font-weight:600;margin:0 0 2px;color:white">Product Management</h4>
                    <p style="font-size:13px;color:var(--text-faint);margin:0;">Manage your store inventory and
                        listings.</p>
                </div>
                <button class="btn btn-primary d-flex align-items-center gap-2" onclick="initAddProduct()"
                    style="background:#0066ff;border-color:#0066ff;border-radius:10px;font-size:13.5px;padding:.5rem 1.1rem;">
                    <i class="bi bi-plus-lg"></i> Add Product
                </button>
            </div>

            <div class="card-panel overflow-x-auto">
                <div class="d-flex align-items-center gap-3 p-4"
                    style="border-bottom:1px solid var(--border);flex-wrap:wrap;">
                    <div class="stat-mini">
                        <div class="sm-label">Total Products</div>
                        <div class="sm-value text-primary">{{ $stats['total'] ?? 0 }}</div>
                    </div>
                    <div class="stat-mini">
                        <div class="sm-label">Active</div>
                        <div class="sm-value" style="color:#fff;">{{ $stats['active'] ?? 0 }}</div>
                    </div>
                    <a href="{{ route('panel.products.index', ['incomplete' => 1]) }}" class="stat-mini" style="cursor:pointer;text-decoration:none;color:inherit;">
                        <div class="sm-label" style="color:#fca5a5;">Product Errors</div>
                        <div class="sm-value" style="color:#ef4444;">{{ $stats['incomplete'] ?? 0 }}</div>
                    </a>
                    <div class="stat-mini">
                        <div class="sm-label">Low Stock</div>
                        <div class="sm-value" style="color:#fbbf24;">{{ $stats['low_stock'] ?? 0 }}</div>
                    </div>
                    <div class="ms-auto d-none" id="bulkActions">
                        <button class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1"
                            style="border-radius:8px;font-size:12.5px;">
                            <i class="bi bi-trash"></i> Delete selected
                        </button>
                    </div>
                </div>

                <div style="overflow-x:auto;">
                    <table class="table" style="min-width:960px;">
                        <thead>
                            <tr>
                                <th style="width:40px;padding-left:1.25rem;">
                                    <input type="checkbox" id="selectAll" class="form-check-input">
                                </th>
                                <th>Product</th>
                                <th>SKU</th>
                                <th>Category</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th class="text-end" style="padding-right:1.25rem;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                                <tr>
                                    <td style="padding-left:1.25rem;">
                                        <input type="checkbox" class="form-check-input product-checkbox"
                                            value="{{ $product->id }}">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            @php
                                                $firstImg = null;
                                                if ($product->images && $product->images->count() > 0) {
                                                    $firstImg = asset('storage/' . $product->images->sortBy('sort_order')->first()->image_path);
                                                } elseif ($product->image_url) {
                                                    $firstImg = asset('storage/' . $product->image_url);
                                                }
                                            @endphp
                                            @if($firstImg)
                                                <img src="{{ $firstImg }}" alt="{{ $product->name }}" class="product-img"
                                                    onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                                                <div class="product-img-placeholder" style="display:none;"><i
                                                        class="bi bi-image"></i></div>
                                            @else
                                                <div class="product-img-placeholder"><i class="bi bi-image"></i></div>
                                            @endif
                                            <div>
                                                <div style="font-weight:500;font-size:13.5px;">{{ $product->name }}</div>
                                                <div style="font-size:12px;color:var(--text-faint);margin-top:1px;">
                                                    {{ \Illuminate\Support\Str::limit($product->description, 45) }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><code>{{ $product->sku ?? '—' }}</code></td>
                                    <td style="color:var(--text-muted);font-size:13px;">
                                        {{ $product->category->name ?? '—' }}
                                    </td>
                                    <td>
                                        @if($product->stock_status === 'out_of_stock' || $product->stock_quantity <= 0)
                                            <span class="stock-badge stock-out">Out of stock</span>
                                        @elseif($product->stock_quantity < 10)
                                            <span class="stock-badge stock-low">{{ $product->stock_quantity }} low</span>
                                        @else
                                            <span class="stock-badge stock-in">{{ $product->stock_quantity }}</span>
                                        @endif
                                    </td>
                                    <td style="font-weight:600;font-size:13.5px;">${{ number_format($product->price, 2) }}
                                    </td>
                                    <td>
                                        <div class="form-check form-switch mb-0">
                                            <input class="form-check-input toggle-active" type="checkbox" role="switch"
                                                data-id="{{ $product->id }}" {{ $product->is_active ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td style="padding-right:1.25rem;">
                                        <div class="d-flex gap-1 justify-content-end">
                                            <a href="{{ route('products.show', $product->id) }}" target="_blank"
                                                class="action-btn view" title="View"><i class="bi bi-eye"></i></a>
                                            <button class="action-btn edit" onclick="editProduct({{ $product->id }})"
                                                title="Edit"><i class="bi bi-pencil"></i></button>
                                            <button type="button" class="action-btn del delete-product-btn"
                                                data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                                data-url="{{ route('panel.products.destroy', $product->id) }}" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">
                                        <div class="empty-state">
                                            <i class="bi bi-box-seam d-block"></i>
                                            <p>No products found. Add your first product to get started.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if(method_exists($products, 'hasPages') && $products->hasPages())
                    <div class="p-4" style="border-top:1px solid var(--border);">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div id="addProductDrawerBackdrop"></div>
    <div id="addProductDrawer" role="dialog" aria-modal="true" aria-labelledby="drawerTitle">
        <div id="drawerResizer" title="Drag to resize">
            <div id="drawerWidthBadge">640px</div>
        </div>
        <div class="drawer-header">
            <div>
                <h5 id="drawerTitle" style="margin:0;font-size:.95rem;font-weight:600;color:#fff;">Add New Product</h5>
                <p style="margin:0;font-size:11.5px;color:var(--text-faint);">Use this page to update your store
                    products.</p>
            </div>
            <div style="display:flex;align-items:center;gap:6px;">
                <button type="button" id="drawerMinBtn" class="drawer-ctrl-btn" title="Restore default size"
                    style="display:none;">
                    <i class="bi bi-dash-lg"></i>
                </button>
                <button type="button" id="drawerMaxBtn" class="drawer-ctrl-btn" title="Expand panel">
                    <i class="bi bi-arrows-angle-expand"></i>
                </button>
                <button type="button" id="drawerCloseBtn" class="drawer-ctrl-btn" aria-label="Close" title="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
        </div>
        <div class="drawer-body">
            <form action="{{ route('panel.products.store') }}" method="POST" enctype="multipart/form-data" id="productForm"
                data-store-url="{{ route('panel.products.store') }}"
                data-update-url="{{ route('panel.products.update', '__ID__') }}">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">
                <input type="hidden" name="product_id" id="productId">
                <div class="form-section">
                    <div class="form-section-title">Identification</div>
                    <div class="form-row">
                        <div class="form-col" style="flex:2;">
                            <label class="form-label">*Reference / Prod Name</label>
                            <input type="text" name="name" id="pName" class="form-control"
                                placeholder="e.g. Luxury Silk Blazer" required>
                        </div>
                        <div class="form-col">
                            <label class="form-label">SKU</label>
                            <input type="text" name="sku" id="pSku" class="form-control" placeholder="SKU-001">
                        </div>
                        <div class="form-col">
                            <label class="form-label">*Section / Category</label>
                            <select name="category_id" id="pCategory" class="form-select" required>
                                <option value="">Please Select</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{-- ── 2. Pricing ── --}}
                <div class="form-section">
                    <div class="form-section-title">Price / WS / List</div>
                    <div class="form-row">
                        <div class="form-col">
                            <label class="form-label">*Price</label>
                            <input type="number" name="price" id="pPrice" class="form-control" step="0.01" min="0"
                                placeholder="0.00" required>
                        </div>
                        <div class="form-col">
                            <label class="form-label">Wholesale (WS)</label>
                            <input type="number" name="original_price" id="pOriginalPrice" class="form-control"
                                step="0.01" min="0" placeholder="0.00">
                        </div>
                        <div class="form-col">
                            <label class="form-label">List / Discount Price</label>
                            <input type="number" name="discount_price" id="pDiscountPrice" class="form-control"
                                step="0.01" min="0" placeholder="0.00">
                        </div>
                    </div>
                </div>

                {{-- ── 3. Stock & Physical ── --}}
                <div class="form-section">
                    <div class="form-section-title">Stock & Physical</div>
                    <div class="form-row">
                        <div class="form-col">
                            <label class="form-label">*In Stock</label>
                            <select name="stock_status" id="pStockStatus" class="form-select" required>
                                <option value="in_stock">In Stock</option>
                                <option value="out_of_stock">Out of Stock</option>
                                <option value="on_backorder">On Backorder</option>
                            </select>
                        </div>
                        <div class="form-col">
                            <label class="form-label">*Stock Qty</label>
                            <input type="number" name="stock_quantity" id="pQuantity" class="form-control" min="0"
                                placeholder="0" required>
                        </div>
                        <div class="form-col">
                            <label class="form-label">Product Weight</label>
                            <input type="number" name="weight" id="pWeight" class="form-control" step="0.01" min="0"
                                placeholder="0.00">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label class="form-label">Dimensions (L × W × H)</label>
                            <div class="dim-wrap">
                                <input type="number" name="dim_l" class="form-control" placeholder="L" min="0">
                                <span class="dim-sep">×</span>
                                <input type="number" name="dim_w" class="form-control" placeholder="W" min="0">
                                <span class="dim-sep">×</span>
                                <input type="number" name="dim_h" class="form-control" placeholder="H" min="0">
                            </div>
                        </div>
                        <div class="form-col">
                            <label class="form-label">Manufacturer</label>
                            <select name="manufacturer" id="pManufacturer" class="form-select">
                                <option value="">None</option>
                                <option>LV</option>
                                <option>Gucci</option>
                                <option>Dior</option>
                                <option>Chanel</option>
                                <option>Hermes</option>
                                <option>Prada</option>
                                <option>Polo ralph lauren</option>
                                <option>Fendi</option>
                                <option>Coach </option>
                                <option>Burberry</option>
                                <option>Yves Saint Laurent </option>
                                <option>Cartier</option>
                                <option>Balenciaga</option>
                                <option>Saint Laurent</option>
                                <option>Dolce & Gabbana</option>
                                <option>Miu Miu</option>
                                <option>Bottega Veneta</option>
                            </select>
                        </div>
                        <div class="form-col">
                            <label for="drop_shipper" class="form-label">Drop Shipper / Supplier Source</label>
                            <select name="drop_shipper" id="drop_shipper" class="form-select">
                                <option value="">None (In-House / Own Stock)</option>
                                <option value="private_agent_luxury">Private Agent (Luxury Line)</option>
                                <option value="guangzhou_warehouse">Guangzhou Premium Warehouse</option>
                                <option value="cjdropshipping">CJ Dropshipping (VIP Supplier)</option>
                                <option value="aliexpress_vip">AliExpress (Gold Supplier)</option>
                                <option value="zendrop">Zendrop Pro</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-section">
                    <div class="form-section-title">Images</div>
                    <div class="img-field-row">
                        <span class="img-field-label">Small Image:</span>
                        <input type="file" name="images[]" id="imgSmall" class="form-control img-field-input"
                            accept="image/*">
                        <button type="button" class="img-mgr-btn"
                            onclick="document.getElementById('imgSmall').click()">… Image Mgr.</button>
                    </div>
                    <div class="img-field-row">
                        <span class="img-field-label">Large Image:</span>
                        <input type="file" name="images[]" id="imgLarge" class="form-control img-field-input"
                            accept="image/*">
                        <button type="button" class="img-mgr-btn"
                            onclick="document.getElementById('imgLarge').click()">…</button>
                    </div>
                    <div class="img-field-row">
                        <span class="img-field-label">Giant Image:</span>
                        <input type="file" name="images[]" id="imgGiant" class="form-control img-field-input"
                            accept="image/*">
                        <button type="button" class="img-mgr-btn"
                            onclick="document.getElementById('imgGiant').click()">…</button>
                    </div>
                    <p style="font-size:11.5px;color:var(--text-faint);margin:6px 0 0;">
                        <i class="bi bi-info-circle me-1"></i>First uploaded image becomes the primary display image.
                    </p>
                </div>
                <div class="form-section">
                    <div class="form-section-title">Exemptions & Flags</div>
                    <div class="form-row" style="align-items:flex-start;">
                        <div class="form-col">
                            <label class="form-label" style="margin-bottom:6px;">Exemptions</label>
                            <div class="exemptions-list">
                                <label><input type="checkbox" name="exemptions[]" value="state_tax"
                                        class="form-check-input"> State Tax Exempt</label>
                                <label><input type="checkbox" name="exemptions[]" value="country_tax"
                                        class="form-check-input"> Country Tax Exempt</label>
                                <label><input type="checkbox" name="exemptions[]" value="shipping"
                                        class="form-check-input"> Shipping Exempt</label>
                                <label><input type="checkbox" name="exemptions[]" value="handling"
                                        class="form-check-input"> Handling Exempt</label>
                                <label><input type="checkbox" name="exemptions[]" value="free_shipping"
                                        class="form-check-input"> Free Shipping Exempt</label>
                            </div>
                        </div>
                        <div class="form-col">
                            <label class="form-label" style="margin-bottom:6px;">Flags</label>
                            <div class="flags-grid">
                                <label>
                                    <input class="form-check-input" type="checkbox" name="is_active" id="pActive"
                                        value="1" checked>
                                    Display Product
                                </label>
                                <label>
                                    <input class="form-check-input" type="checkbox" name="is_recommended"
                                        id="pRecommended" value="1">
                                    Recommended
                                </label>
                                <label>
                                    <input class="form-check-input" type="checkbox" name="gift_wrap" value="1">
                                    Gift Wrap Available
                                </label>
                                <label>
                                    <input class="form-check-input" type="checkbox" name="back_order" value="1">
                                    Back Order Available
                                </label>
                                <label>
                                    <input class="form-check-input" type="checkbox" name="is_popular" id="pPopular"
                                        value="1">
                                    Is Popular
                                </label>
                                <label>
                                    <input class="form-check-input" type="checkbox" name="is_latest_drop"
                                        id="pLatestDrop" value="1">
                                    Latest Drop
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-section">
                    <div class="form-section-title">Sizes & Colors</div>
                    <div class="form-row" style="align-items:flex-start;gap:16px;">
                        <div class="form-col">
                            <label class="form-label" style="margin-bottom:6px;">Standard Sizes</label>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach(['S', 'M', 'L', 'XL', 'XXL'] as $size)
                                    <label
                                        style="display:flex;align-items:center;gap:5px;font-size:12.5px;color:var(--text-muted);cursor:pointer;">
                                        <input class="form-check-input check-size mt-0" type="checkbox" name="sizes[]"
                                            value="{{ $size }}" id="size_{{ $size }}">
                                        {{ $size }}
                                    </label>
                                @endforeach
                            </div>
                            <label class="form-label" style="margin:8px 0 6px;">Numerical Sizes</label>
                            <div class="d-flex flex-wrap gap-3">
                                @foreach([20, 30, 40] as $waist)
                                    <label
                                        style="display:flex;align-items:center;gap:5px;font-size:12.5px;color:var(--text-muted);cursor:pointer;">
                                        <input class="form-check-input check-waist mt-0" type="checkbox"
                                            name="waist_sizes[]" value="{{ $waist }}" id="waist_{{ $waist }}">
                                        {{ $waist }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-col">
                            <label class="form-label" style="margin-bottom:6px;">Colors</label>
                            <div class="d-flex flex-wrap gap-3">
                                @foreach(['White' => '#ffffff', 'Black' => '#000000', 'Red' => '#ef4444', 'Blue' => '#3b82f6', 'Grey' => '#64748b'] as $cName => $cHex)
                                    <label
                                        style="display:flex;align-items:center;gap:5px;font-size:12.5px;color:var(--text-muted);cursor:pointer;">
                                        <input class="form-check-input check-color mt-0" type="checkbox" name="colors[]"
                                            value="{{ $cName }}" id="color_{{ $cName }}">
                                        <span
                                            style="width:13px;height:13px;border-radius:3px;background:{{ $cHex }};border:1px solid rgba(255,255,255,.2);flex-shrink:0;"></span>
                                        {{ $cName }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-section">
                    <div class="form-section-title">SEO & Search</div>
                    <div style="margin-bottom:8px;">
                        <label class="form-label">Search Words</label>
                        <input type="text" name="search_words" class="form-control" placeholder="">
                    </div>
                    <div style="margin-bottom:8px;">
                        <label class="form-label">Page Title Tag</label>
                        <input type="text" name="meta_title" id="pMetaTitle" class="form-control" placeholder=""
                            maxlength="60">
                    </div>
                    <div style="margin-bottom:8px;">
                        <label class="form-label">Meta Description</label>
                        <input type="text" name="meta_description" id="pMetaDesc" class="form-control" placeholder=""
                            maxlength="160">
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label class="form-label">Custom 1</label>
                            <input type="text" name="custom_1" class="form-control">
                        </div>
                        <div class="form-col">
                            <label class="form-label">Custom 2</label>
                            <input type="text" name="custom_2" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-section">
                    <div class="form-section-title">Product Options, Additional Sections & Attributes</div>
                    <div class="form-row">
                        <div class="form-col">
                            <label class="form-label">Product Options</label>
                            <div style="display:flex;gap:5px;align-items:center;">
                                <span style="font-size:11px;color:var(--text-faint);">1</span>
                                <select name="product_option" class="form-select">
                                    <option value="">Please Select</option>
                                    <option>Size</option>
                                    <option>Color</option>
                                    <option>Material</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-col">
                            <label class="form-label">Additional Sections</label>
                            <div style="display:flex;gap:5px;align-items:center;">
                                <span style="font-size:11px;color:var(--text-faint);">1</span>
                                <select name="additional_section" class="form-select">
                                    <option value="">Please Select (None)</option>
                                    <option value="size_guide">Size Guide & Fitting (មគ្គុទ្ទេស & ទំហំ)</option>
                                    <option value="authenticity">Authenticity Guarantee (ការធានាផលិតផលពិត)</option>
                                    <option value="product_care">Luxury Product Care (ផលិតផលប្រណិត)</option>
                                    <option value="shipping_returns">Shipping & Returns Policy (គោលការណ៍ដឹកជញ្ជូន)</option>
                                    <option value="warranty_repairs">Warranty & Repairs (ការធានា និង ការជួសជុល)</option>
                                    <option value="gift_wrapping">Premium Gift Wrapping (សេវាកម្មវេចខ្ចប់កាដូ)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-col">
                            <label class="form-label">Product Attributes</label>
                            <div style="display:flex;gap:5px;align-items:center;">
                                <span style="font-size:11px;color:var(--text-faint);">1</span>
                                <select name="product_attribute" class="form-select">
                                    <option value="">Please Select (None)</option>
                                    <option value="leather_genuine">Genuine Leather (ស្បែក)</option>
                                    <option value="leather_saffiano">Saffiano Leather</option>
                                    <option value="canvas_coated">Premium Coated Canvas</option>
                                    <option value="fabric_silk_cashmere">100% Silk / Cashmere</option>
                                    <option value="hardware_gold">Gold-Tone Hardware (គ្រឿងមាស)</option>
                                    <option value="hardware_silver">Silver-Tone Hardware (គ្រឿងប្រាក់)</option>
                                    <option value="origin_italy">Made in Italy</option>
                                    <option value="origin_france">Made in France</option>
                                    <option value="edition_limited">Limited Edition (ចំនួនកំណត់)</option>
                                    <option value="edition_runway">Runway Piece (ម៉ូដដើរលើឆាក)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="form-label">Quantity Pricing (Qty / Price / WS)</label>
                        <div class="qty-pricing-row">
                            <input type="number" name="qty_pricing_qty" class="form-control" placeholder="Qty" min="0">
                            <input type="number" name="qty_pricing_price" class="form-control" placeholder="Price"
                                step="0.01" min="0">
                            <input type="number" name="qty_pricing_ws" class="form-control" placeholder="WS" step="0.01"
                                min="0">
                        </div>
                    </div>
                </div>
                <div class="form-section">
                    <div class="form-section-title">Descriptions</div>
                    <div class="desc-grid">
                        <div>
                            <label class="form-label" style="margin-bottom:5px;">Description</label>
                            <textarea name="description" id="pDescription" class="form-control" rows="7"
                                placeholder="Short product description…"></textarea>
                        </div>
                        <div>
                            <label class="form-label" style="margin-bottom:5px;">Long Description</label>
                            <textarea name="long_description" id="pLongDescription" class="form-control" rows="7"
                                placeholder="Full product description…"></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="drawer-footer">
            <button type="submit" form="productForm" class="btn-save">
                <i class="bi bi-check-lg me-1"></i> Submit
            </button>
            <button type="reset" form="productForm" class="btn-reset">Reset</button>
            <button type="button" onclick="closeDrawer()" class="btn-reset" style="margin-left:auto;">
                <i class="bi bi-x me-1"></i> Cancel
            </button>
        </div>
    </div>
    <div class="modal fade" id="deleteProductModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content delete-modal">
                <form id="deleteProductForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="delete-modal-body">
                        <div class="delete-modal-icon">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                        </div>
                        <h5>Delete Product?</h5>
                        <p class="mb-0">
                            This will move <strong id="deleteProductName"></strong> to trash.
                        </p>
                        <div class="delete-modal-actions">
                            <button type="button" class="btn-reset" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn-save btn-save-danger">
                                <i class="bi bi-trash me-1"></i> Move to Trash
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @include('admin.partials.logout')
    <script>
        const drawer = document.getElementById('addProductDrawer');
        const drawerBackdrop = document.getElementById('addProductDrawerBackdrop');
        const drawerCloseBtn = document.getElementById('drawerCloseBtn');
        const drawerMaxBtn = document.getElementById('drawerMaxBtn');
        const drawerMinBtn = document.getElementById('drawerMinBtn');
        const resizer = document.getElementById('drawerResizer');
        const widthBadge = document.getElementById('drawerWidthBadge');
        const productForm = document.getElementById('productForm');
        const formMethod = document.getElementById('formMethod');
        const productId = document.getElementById('productId');
        const storeUrl = productForm.dataset.storeUrl;
        const updateUrlTemplate = productForm.dataset.updateUrl;
        productForm.addEventListener('submit', function () {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
            const csrfInput = this.querySelector('input[name="_token"]');
            if (csrfToken && csrfInput) csrfInput.value = csrfToken;
        });

        const DEFAULT_WIDTH = 640;
        const MIN_WIDTH = 420;
        const MAX_WIDTH = Math.round(window.innerWidth * 0.96);
        const LARGE_WIDTH = Math.round(window.innerWidth * 0.85);
        let currentWidth = DEFAULT_WIDTH;
        let isMaximized = false;
        function openDrawer() {
            drawer.classList.add('drawer-open');
            drawerBackdrop.classList.add('backdrop-open');
            document.body.style.overflow = 'hidden';
        }
        function closeDrawer() {
            drawer.classList.remove('drawer-open');
            drawerBackdrop.classList.remove('backdrop-open');
            document.body.style.overflow = '';
        }
        drawerCloseBtn.addEventListener('click', closeDrawer);
        drawerBackdrop.addEventListener('click', closeDrawer);
        document.addEventListener('keydown', e => { if (e.key === 'Escape') closeDrawer(); });
        function setMaximized(on) {
            isMaximized = on;
            if (on) {
                drawer.style.transition = 'transform .3s ease, width .25s ease';
                drawer.style.width = LARGE_WIDTH + 'px';
                drawer.classList.add('drawer-maximized');
                drawerMaxBtn.classList.add('active');
                drawerMaxBtn.querySelector('i').className = 'bi bi-arrows-angle-contract';
                drawerMaxBtn.title = 'Restore size';
                drawerMinBtn.style.display = 'flex';
            } else {
                drawer.style.transition = 'transform .3s ease, width .25s ease';
                drawer.style.width = currentWidth + 'px';
                drawer.classList.remove('drawer-maximized');
                drawerMaxBtn.classList.remove('active');
                drawerMaxBtn.querySelector('i').className = 'bi bi-arrows-angle-expand';
                drawerMaxBtn.title = 'Expand panel';
                drawerMinBtn.style.display = 'none';
            }
        }

        drawerMaxBtn.addEventListener('click', () => setMaximized(!isMaximized));
        drawerMinBtn.addEventListener('click', () => {
            currentWidth = DEFAULT_WIDTH;
            drawer.style.width = DEFAULT_WIDTH + 'px';
            setMaximized(false);
        });
        let isDragging = false;
        let startX = 0;
        let startWidth = 0;
        resizer.addEventListener('mousedown', e => {
            isDragging = true;
            startX = e.clientX;
            startWidth = drawer.offsetWidth;
            resizer.classList.add('resizing');
            drawer.style.transition = 'transform .3s ease';
            document.body.style.cursor = 'ew-resize';
            document.body.style.userSelect = 'none';
            e.preventDefault();
        });

        document.addEventListener('mousemove', e => {
            if (!isDragging) return;
            const delta = startX - e.clientX;
            const newWidth = Math.min(MAX_WIDTH, Math.max(MIN_WIDTH, startWidth + delta));
            drawer.style.width = newWidth + 'px';
            currentWidth = newWidth;
            widthBadge.textContent = newWidth + 'px';
            if (newWidth >= LARGE_WIDTH * 0.98) {
                drawer.classList.add('drawer-maximized');
            } else {
                drawer.classList.remove('drawer-maximized');
            }
        });
        document.addEventListener('mouseup', () => {
            if (!isDragging) return;
            isDragging = false;
            resizer.classList.remove('resizing');
            drawer.style.transition = 'transform .3s ease, width .25s ease';
            document.body.style.cursor = '';
            document.body.style.userSelect = '';
        });
        resizer.addEventListener('touchstart', e => {
            isDragging = true;
            startX = e.touches[0].clientX;
            startWidth = drawer.offsetWidth;
            resizer.classList.add('resizing');
            drawer.style.transition = 'transform .3s ease';
        }, { passive: true });
        document.addEventListener('touchmove', e => {
            if (!isDragging) return;
            const delta = startX - e.touches[0].clientX;
            const newWidth = Math.min(MAX_WIDTH, Math.max(MIN_WIDTH, startWidth + delta));
            drawer.style.width = newWidth + 'px';
            currentWidth = newWidth;
            widthBadge.textContent = newWidth + 'px';
        }, { passive: true });
        document.addEventListener('touchend', () => {
            if (!isDragging) return;
            isDragging = false;
            resizer.classList.remove('resizing');
            drawer.style.transition = 'transform .3s ease, width .25s ease';
        });
        function initAddProduct() {
            document.getElementById('drawerTitle').innerText = 'Add New Product';
            productForm.action = storeUrl;
            formMethod.value = 'POST';
            productId.value = '';
            productForm.reset();
            document.getElementById('imgSmall').value = '';
            document.getElementById('imgLarge').value = '';
            document.getElementById('imgGiant').value = '';
            clearImagePreviews();
            openDrawer();
        }
        function editProduct(id) {
            document.getElementById('drawerTitle').innerText = 'Edit Product Details';
            productForm.action = updateUrlTemplate.replace('__ID__', id);
            formMethod.value = 'PUT';
            document.querySelectorAll('.check-size, .check-waist, .check-color').forEach(el => el.checked = false);
            fetch(`/panel/products/${id}/edit`)
                .then(res => res.json())
                .then(data => {
                    document.getElementById('productId').value = data.id;
                    document.getElementById('pName').value = data.name;
                    document.getElementById('pSku').value = data.sku || '';
                    document.getElementById('pCategory').value = data.category_id || '';
                    document.getElementById('pPrice').value = data.price;
                    document.getElementById('pQuantity').value = data.stock_quantity;
                    document.getElementById('pStockStatus').value = data.stock_status;
                    document.getElementById('pActive').checked = !!data.is_active;
                    document.getElementById('pPopular').checked = !!data.is_popular;
                    document.getElementById('pLatestDrop').checked = !!data.is_latest_drop;
                    document.getElementById('pOriginalPrice').value = data.original_price ?? '';
                    document.getElementById('pDiscountPrice').value = data.discount_price ?? '';
                    document.getElementById('pMetaTitle').value = data.meta_title ?? '';
                    document.getElementById('pMetaDesc').value = data.meta_description ?? '';
                    document.getElementById('pDescription').value = data.description ?? '';
                    document.getElementById('pLongDescription').value = data.long_description ?? '';
                    if (data.sizes) data.sizes.forEach(s => { const el = document.getElementById(`size_${s}`); if (el) el.checked = true; });
                    if (data.waist_sizes) data.waist_sizes.forEach(w => { const el = document.getElementById(`waist_${w}`); if (el) el.checked = true; });
                    if (data.colors) data.colors.forEach(c => { const el = document.getElementById(`color_${c}`); if (el) el.checked = true; });
                    openDrawer();
                })
                    .catch(err => console.error('Could not fetch product data:', err));
        }
        function clearImagePreviews() {
            const previews = document.querySelectorAll('.drawer-img-preview');
            previews.forEach(el => el.remove());
        }
        function attachImagePreview(inputId, labelEl) {
            const input = document.getElementById(inputId);
            if (!input) return;
            input.addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (!file || !file.type.startsWith('image/')) return;
                const reader = new FileReader();
                reader.onload = function (ev) {
                    const img = document.createElement('img');
                    img.src = ev.target.result;
                    img.className = 'drawer-img-preview';
                    img.style.cssText = 'width:60px;height:60px;object-fit:cover;border-radius:6px;border:1px solid rgba(255,255,255,.12);margin-left:6px;cursor:pointer;';
                    img.title = file.name;
                    img.onclick = function () { input.value = ''; img.remove(); };
                    if (labelEl) labelEl.parentNode.insertBefore(img, labelEl.nextSibling);
                };
                reader.readAsDataURL(file);
            });
        }
        attachImagePreview('imgSmall');
        attachImagePreview('imgLarge');
        attachImagePreview('imgGiant');
        const deleteProductForm = document.getElementById('deleteProductForm');
        const deleteProductName = document.getElementById('deleteProductName');
        const deleteModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('deleteProductModal'));
        document.querySelectorAll('.delete-product-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const url = this.dataset.url;
                const name = this.dataset.name;
                deleteProductForm.action = url;
                deleteProductName.textContent = name;
                deleteModal.show();
            });
        });
        document.getElementById('sidebarToggle')?.addEventListener('click', () => {
            document.getElementById('sidebar').classList.toggle('show');
        });
    </script>
</body>
</html>
