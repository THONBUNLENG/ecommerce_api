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
    --text-primary: #f8fafc;       /* FIXED: Changed from #000000 to white/off-white */
    --text-muted: #94a3b8;
    --text-faint: #64748b;
    --brand-blue: #0066ff;        /* Added brand indicator variable */
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
.sidebar-nav .nav-link.active { background: rgba(255,255,255,.08); color: #fff; border-left-color: var(--brand-blue); }
.sidebar-nav .nav-link i { font-size: 1.15rem; width: 20px; text-align: center; flex-shrink: 0; }

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
.search-input:focus { border-color: rgba(255, 255, 255, 0.2); }

.topbar-actions { display: flex; align-items: center; gap: .875rem; }

.icon-btn {
    width: 36px; height: 36px;
    border-radius: 9px;
    display: flex; align-items: center; justify-content: center;
    background: rgba(255,255,255,.03);
    border: 1px solid var(--border);
    color: var(--text-muted);
    cursor: pointer;
    transition: var(--transition);
    text-decoration: none;
    position: relative;
}

.icon-btn:hover { background: rgba(255, 255, 255, 0.08); color: #fff; }
.icon-btn i { font-size: 1rem; }

.notif-dot {
    position: absolute; top: 6px; right: 6px;
    width: 7px; height: 7px;
    background: #ef4444;
    border-radius: 50%;
    border: 1.5px solid #000000;
}

.avatar-btn {
    width: 36px; height: 36px;
    border-radius: 50%;
    overflow: hidden;
    cursor: pointer;
    border: 2px solid rgba(255,255,255,.2);
}

.avatar-btn img { width: 100%; height: 100%; object-fit: cover; }

/* ── Content ── */
.content { padding: 1.75rem; }

/* ── Cards ── */
.card-panel {
    background: var(--bg-card);
    backdrop-filter: blur(20px);
    border-radius: 14px;
    border: 1px solid var(--border);
}

/* ── Stat mini cards ── */
.stat-mini {
    background: rgba(255, 255, 255, 0.02);
    border: 1px solid var(--border);
    border-radius: 10px;
    padding: .75rem 1.1rem;
    min-width: 110px;
}

.stat-mini .sm-label { font-size: 11px; color: var(--text-faint); margin-bottom: 3px; }
.stat-mini .sm-value { font-size: 1.35rem; font-weight: 700; line-height: 1; }

/* ── Table ── */
/* ── Overriding Bootstrap's default table backgrounds ── */
.table {
    color: var(--text-primary) !important;
    margin: 0;
    --bs-table-bg: transparent !important;       /* Forces BS5 core background to clear out */
    --bs-table-hover-bg: transparent !important; /* Clears out BS5 default hover styles */
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
    background-color: transparent !important; /* Stops the white bleed on table cells */
    border-bottom: 1px solid var(--border) !important;
    border-top: none;
    padding: .875rem 1rem;
    vertical-align: middle;
    color: var(--text-primary);
}

.table tbody tr:last-child td {
    border-bottom: none !important;
}

/* Your custom dark hover effect */
.table tbody tr {
    transition: background .15s;
    background-color: transparent !important;
}

.table tbody tr:hover {
    background-color: rgba(255, 255, 255, 0.03) !important;
}

/* ── Product image ── */
.product-img {
    width: 44px; height: 44px;
    object-fit: cover;
    border-radius: 10px;
    border: 1px solid var(--border);
}

.product-img-placeholder {
    width: 44px; height: 44px;
    border-radius: 10px;
    background: rgba(255,255,255,.06);
    border: 1px solid var(--border);
    display: flex; align-items: center; justify-content: center;
    color: var(--text-primary);
    font-size: 1.1rem;
    flex-shrink: 0;
}

/* ── Stock badges ── */
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
    width: 6px; height: 6px;
    border-radius: 50%;
}

.stock-in       { background: rgba(16,185,129,.12); color: #34d399; }
.stock-in::before    { background: #34d399; }
.stock-low   { background: rgba(245,158,11,.12); color: #fbbf24; }
.stock-low::before   { background: #fbbf24; }
.stock-out   { background: rgba(239,68,68,.12);  color: #f87171; }
.stock-out::before   { background: #f87171; }

.action-btn {
    width: 30px; height: 30px;
    border-radius: 7px;
    display: inline-flex; align-items: center; justify-content: center;
    border: 1px solid var(--border);
    background: rgba(255, 255, 255, 0.04);
    color: var(--text-muted);
    cursor: pointer;
    transition: var(--transition);
    font-size: 13px;
    text-decoration: none;
}

.action-btn:hover { background: rgba(255,255,255,.1); color: #fff; }
.action-btn.edit:hover  { background: rgba(255,255,255,.15); color: #fff; border-color: rgba(255,255,255,.2); }
.action-btn.view:hover  { background: rgba(255,255,255,.08); color: #fff; border-color: rgba(255,255,255,.1); }
.action-btn.del:hover   { background: rgba(239,68,68,.15);  color: #f87171; border-color: rgba(239,68,68,.3); }

/* ── Toggle switch ── */
.form-check-input:checked { background-color: var(--brand-blue); border-color: var(--brand-blue); }
.form-check-input { background-color: rgba(255, 255, 255, 0.1); border-color: rgba(255, 255, 255, 0.2); }

/* ── Pagination ── */
.pagination .page-link {
    background: rgba(255,255,255,.04);
    border-color: var(--border);
    color: var(--text-muted);
    font-size: 13px;
}

.pagination .page-link:hover { background: rgba(255,255,255,.08); color: #fff; border-color: var(--border); }
.pagination .page-item.active .page-link { background: var(--brand-blue); border-color: var(--brand-blue); color: #fff; }
.pagination .page-item.disabled .page-link { background: rgba(255,255,255,.02); color: var(--text-faint); }

/* ── Offcanvas (drawer) ── */
.offcanvas {
    background: #111827;
    border-left: 1px solid var(--border);
    color: var(--text-primary);
}

.offcanvas-header {
    border-bottom: 1px solid var(--border);
    padding: 1.25rem 1.5rem;
}

.offcanvas-title { font-size: 1rem; font-weight: 600; }
.btn-close-white { filter: invert(1) grayscale(100%) brightness(200%); }
.offcanvas-body { padding: 1.5rem; }

/* ── Form controls inside offcanvas ── */
.form-label { font-size: 12.5px; color: var(--text-muted); margin-bottom: 5px; font-weight: 500; }

.form-control, .form-select {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255,255,255,.1);
    border-radius: 8px;
    color: var(--text-primary);
    font-size: 13.5px;
    padding: .5rem .875rem;
    transition: border-color .2s, background .2s;
}

.form-control:focus, .form-select:focus {
    background: rgba(255,255,255,.07);
    border-color: var(--brand-blue);
    box-shadow: 0 0 0 3px rgba(0, 102, 255, 0.15);
    color: var(--text-primary);
    outline: none;
}

.form-control::placeholder { color: var(--text-faint); }
.form-select option { background: #1e293b; color: var(--text-primary); }

/* Custom file upload button fix */
.form-control::file-selector-button {
    background-color: #ffffff;
    color: #000000;
    border: none;
    border-radius: 4px;
    font-weight: 500;
}

/* ── Modals ── */
.modal-content {
    background: #1e293b;
    border: 1px solid var(--border);
    color: var(--text-primary);
    border-radius: 14px;
}

.modal-header { border-bottom: 1px solid var(--border); padding: 1.1rem 1.5rem; }
.modal-footer { border-top:  1px solid var(--border); padding: 1rem 1.5rem; }
.modal-body   { padding: 1.25rem 1.5rem; font-size: 13.5px; color: var(--text-muted); }

/* ── Dropdown ── */
.dropdown-menu {
    background: #1e293b;
    border: 1px solid var(--border);
    box-shadow: 0 8px 24px rgba(0,0,0,.35);
}

.dropdown-item { color: var(--text-muted); font-size: 13px; padding: .5rem 1rem; }
.dropdown-item:hover { background: rgba(255,255,255,.06); color: #fff; }
.dropdown-divider { border-color: var(--border); }

/* ── Code tag ── */
code {
    background: rgba(255,255,255,.07);
    color: #fff;
    padding: 2px 7px;
    border-radius: 5px;
    font-size: 12px;
}

/* ── Empty state ── */
.empty-state {
    padding: 3.5rem 1rem;
    text-align: center;
    color: var(--text-faint);
}

.empty-state i { font-size: 2.5rem; margin-bottom: .75rem; opacity: .4; }
.empty-state p { margin: 0; font-size: 13.5px; }

        /* ── Responsive ── */
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
            .offcanvas { width: 100% !important; }
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

            <a class="nav-link" href="{{ route('panel.dashboard') }}">
                <i class="bi bi-speedometer2"></i>
                <span class="nav-text">Dashboard</span>
            </a>
            <a class="nav-link active" href="{{ route('panel.products.index') }}">
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
                    <input type="search" class="search-input" placeholder="Search products…">
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

        {{-- Content --}}
        <div class="content">

            {{-- Page header --}}
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h4 style="font-size:1.15rem;font-weight:600;margin:0 0 2px;color:white">Product Management</h4>
                    <p style="font-size:13px;color:var(--text-faint);margin:0;">Manage your store inventory and listings.</p>
                </div>
                <button class="btn btn-primary d-flex align-items-center gap-2"
                        data-bs-toggle="offcanvas" data-bs-target="#addProductDrawer"
                        style="background:#1a1a1a;border-color:#1a1a1a;border-radius:10px;font-size:13.5px;padding:.5rem 1.1rem;">
                    <i class="bi bi-plus-lg"></i> Add Product
                </button>
            </div>

            {{-- Stats + Table card --}}
            <div class="card-panel">

                {{-- Stats row --}}
                <div class="d-flex align-items-center gap-3 p-4" style="border-bottom:1px solid var(--border);flex-wrap:wrap;">
                    <div class="stat-mini">
                        <div class="sm-label">Total Products</div>
                        <div class="sm-value text-primary">{{ $stats['total'] }}</div>
                    </div>
                    <div class="stat-mini">
                        <div class="sm-label">Active</div>
                        <div class="sm-value" style="color:#fff;">{{ $stats['active'] }}</div>
                    </div>
                    <div class="stat-mini">
                        <div class="sm-label">Low Stock</div>
                        <div class="sm-value" style="color:#fbbf24;">{{ $stats['low_stock'] }}</div>
                    </div>

                    {{-- Bulk delete (shows when rows checked) --}}
                    <div class="ms-auto d-none" id="bulkActions">
                        <button class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1" style="border-radius:8px;font-size:12.5px;">
                            <i class="bi bi-trash"></i> Delete selected
                        </button>
                    </div>
                </div>

                {{-- Table --}}
                <div class="table-responsive">
                    <table class="table">
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
                                    <input type="checkbox" class="form-check-input product-checkbox" value="{{ $product->id }}">
                                </td>

                                {{-- Product name + image --}}
                         
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        @if($product->image_url)
                                            <img src="{{ asset('public/' . $product->image_url) }}"
                                                 alt="{{ $product->name }}"
                                                 class="product-img"
                                                 onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                                            <div class="product-img-placeholder" style="display:none;">
                                                <i class="bi bi-image"></i>
                                            </div>
                                        @else
                                            <div class="product-img-placeholder">
                                                <i class="bi bi-image"></i>

                                            </div>
                                        @endif
                                        <div>
                                            <div style="font-weight:500;font-size:13.5px;color:var(--text-primary);">{{ $product->name }}</div>
                                            <div style="font-size:12px;color:var(--text-faint);margin-top:1px;">{{ Str::limit($product->description, 45) }}</div>
                                        </div>
                                    </div>
                                </td>

                                <td><code>{{ $product->sku ?? '—' }}</code></td>

                                <td style="color:var(--text-muted);font-size:13px;">{{ $product->category->name ?? '—' }}</td>

                                {{-- Stock badge --}}
                                <td>
                                    @if($product->stock_status === 'out_of_stock')
                                        <span class="stock-badge stock-out">Out of stock</span>
                                    @elseif($product->stock_quantity < 10)
                                        <span class="stock-badge stock-low">{{ $product->stock_quantity }} low</span>
                                    @else
                                        <span class="stock-badge stock-in">{{ $product->stock_quantity }}</span>
                                    @endif
                                </td>

                                <td style="font-weight:600;font-size:13.5px;">${{ number_format($product->price, 2) }}</td>

                                {{-- Active toggle --}}
                                <td>
                                    <div class="form-check form-switch mb-0">
                                        <input class="form-check-input toggle-active"
                                               type="checkbox"
                                               role="switch"
                                               data-id="{{ $product->id }}"
                                               {{ $product->is_active ? 'checked' : '' }}>
                                    </div>
                                </td>

                                {{-- Actions --}}
                                <td style="padding-right:1.25rem;">
                                    <div class="d-flex gap-1 justify-content-end">
                                        <a href="{{ route('products.show', $product->id) }}"
                                           target="_blank"
                                           class="action-btn view"
                                           title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <button class="action-btn edit"
                                                onclick="editProduct({{ $product->id }})"
                                                title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="action-btn del"
                                                onclick="deleteProduct({{ $product->id }}, '{{ addslashes($product->name) }}')"
                                                title="Delete">
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

                {{-- Pagination --}}
                @if($products->hasPages())
                <div class="p-4" style="border-top:1px solid var(--border);">
                    {{ $products->links() }}
                </div>
                @endif

            </div>{{-- /card-panel --}}
        </div>{{-- /content --}}
    </div>{{-- /main-content --}}



    <div class="offcanvas offcanvas-end" tabindex="-1" id="addProductDrawer" style="width:480px;"c=>
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="drawerTitle">Add New Product</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="/panel/products" method="POST" enctype="multipart/form-data" id="productForm">
                @csrf
                <input type="hidden" name="form_type" value="create">

                <div class="mb-3">
                    <label class="form-label">Product Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="e.g. Classic White Tee" required>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col">
                        <label class="form-label">SKU</label>
                        <input type="text" name="sku" class="form-control" placeholder="SKU-001">
                    </div>
                    <div class="col">
                        <label class="form-label">Category <span class="text-danger">*</span></label>
                        <select name="category_id" class="form-select" required>
                            <option value="">Select…</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col">
                        <label class="form-label">Price <span class="text-danger">*</span></label>
                        <input type="number" name="price" class="form-control" step="0.01" min="0" placeholder="0.00" required>
                    </div>
                    <div class="col">
                        <label class="form-label">Stock Quantity <span class="text-danger">*</span></label>
                        <input type="number" name="stock_quantity" class="form-control" min="0" placeholder="0" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Stock Status <span class="text-danger">*</span></label>
                    <select name="stock_status" class="form-select" required>
                        <option value="in_stock">In Stock</option>
                        <option value="out_of_stock">Out of Stock</option>
                        <option value="on_backorder">On Backorder</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Product Image</label>
                    <input type="file" name="image_url" class="form-control" accept="image/*">
                    <div id="currentImagePreview" class="mt-2" style="display:none;">
                        <p class="form-label mb-1">Current image</p>
                        <img id="editImagePreview" src="" style="height:72px;object-fit:cover;border-radius:8px;border:1px solid var(--border);">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Optional product description…"></textarea>
                </div>

                <div class="form-check mb-4">
                    <input type="checkbox" name="is_active" id="isActive" class="form-check-input" checked>
                    <label class="form-check-label" for="isActive" style="font-size:13.5px;color:var(--text-muted);">Active (visible in store)</label>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary flex-grow-1" style="border-radius:9px;">
                        <i class="bi bi-check2 me-1"></i> Save Product
                    </button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas" style="border-radius:9px;border-color:var(--border);color:var(--text-muted);">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>


    {{-- ── Delete Confirm Modal ── --}}
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <h6 class="modal-title">Delete product</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete <strong id="productName" style="color:var(--text-primary);"></strong>? This action cannot be undone.
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal"
                            style="border-radius:8px;border-color:var(--border);color:var(--text-muted);">Cancel</button>
                    <form id="deleteForm" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" style="border-radius:8px;">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- ── Logout Modal ── --}}
    <div class="modal fade" id="logoutModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <h6 class="modal-title">Confirm logout</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to log out of your session?
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal"
                            style="border-radius:8px;border-color:var(--border);color:var(--text-muted);">Cancel</button>
                    <button type="button" class="btn btn-sm btn-danger" id="confirmLogout" style="border-radius:8px;">Log out</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
    $(document).ready(function () {


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

        /* ── Sidebar toggle (mobile) ── */
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

        /* ── Select all checkboxes ── */
        $('#selectAll').change(function () {
            $('.product-checkbox').prop('checked', this.checked);
            $('#bulkActions').toggleClass('d-none', !this.checked);
        });

        $(document).on('change', '.product-checkbox', function () {
            const anyChecked = $('.product-checkbox:checked').length > 0;
            $('#bulkActions').toggleClass('d-none', !anyChecked);
            $('#selectAll').prop('indeterminate',
                $('.product-checkbox:checked').length > 0 &&
                $('.product-checkbox:checked').length < $('.product-checkbox').length
            );
        });

        /* ── Toggle active ── */
        $('.toggle-active').on('change', function() {
            let productId = $(this).data('id');
            let isActive = $(this).is(':checked') ? 1 : 0;
            let $checkbox = $(this);

            $.ajax({
                url: '/panel/products/' + productId + '/toggle-active',
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: productId,
                    is_active: isActive
                },
                success: function(response) {
                    console.log('Status updated successfully');
                },
                error: function() {
                    alert('Something went wrong. Please try again.');
                    $checkbox.prop('checked', !isActive);
                }
            });
        });

        /* ── Reset drawer on close ── */
        document.getElementById('addProductDrawer')?.addEventListener('hidden.bs.offcanvas', () => {
            document.getElementById('drawerTitle').textContent = 'Add New Product';
            document.getElementById('productForm').reset();
            $('#productForm input[name="_method"]').remove();
            $('#productForm').attr('action', '/panel/products');
            $('#currentImagePreview').hide();
            $('#editImagePreview').attr('src', '');
        });
    });

    /* ── Edit product ── */
    function editProduct(id) {
        $.get('/panel/products/' + id + '/edit', function (data) {
            const $form = $('#productForm');
            $form.find('[name="name"]').val(data.name || '');
            $form.find('[name="sku"]').val(data.sku || '');
            $form.find('[name="category_id"]').val(data.category_id || '');
            $form.find('[name="price"]').val(data.price || '');
            $form.find('[name="stock_quantity"]').val(data.stock_quantity || '');
            $form.find('[name="stock_status"]').val(data.stock_status || 'in_stock');
            $form.find('[name="description"]').val(data.description || '');
            $form.find('[name="is_active"]').prop('checked', !!data.is_active);

            $form.attr('action', '/panel/products/' + id);
            $form.find('input[name="_method"]').remove();
            $form.append('<input type="hidden" name="_method" value="PUT">');

            document.getElementById('drawerTitle').textContent = 'Edit Product';

            if (data.image_url) {
                $('#editImagePreview').attr('src', '/storage/' + data.image_url);
                $('#currentImagePreview').show();
            } else {
                $('#currentImagePreview').hide();
            }

            new bootstrap.Offcanvas(document.getElementById('addProductDrawer')).show();
        });
    }

    /* ── Delete product ── */
    function deleteProduct(id, name) {
        document.getElementById('productName').textContent = name;
        document.getElementById('deleteForm').action = '/panel/products/' + id;
        new bootstrap.Modal(document.getElementById('deleteModal')).show();
    }
    </script>
</body>
</html>
