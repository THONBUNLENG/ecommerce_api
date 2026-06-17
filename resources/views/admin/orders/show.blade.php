<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Order #{{ $order->id }} - LOOMA Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
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
        }

        .badge-stock-low { background: rgba(212, 175, 55, 0.2); color: #D4AF37; }
        .badge-stock-out { background: rgba(220, 53, 69, 0.2); color: #DC3545; }
        .badge-stock-in { background: rgba(25, 135, 84, 0.2); color: #198754; }

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
        @include('admin.partials.topbar')

        <div class="content-wrapper">
            <div class="admin-card mb-4 p-4 d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Order #{{ $order->id }}</h4>
                <a href="{{ route('panel.orders.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Back to Orders
                </a>
            </div>

            <div class="admin-card mb-4">
                <div class="p-4 border-bottom d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-1">Order #{{ $order->id }}</h5>
                        <p class="text-muted mb-0">Placed on {{ $order->created_at->format('F j, Y g:i A') }}</p>
                    </div>
                    <div>
                        @php
                            $statusClass = match($order->status) {
                                'paid', 'delivered' => 'badge-stock-in',
                                'pending' => 'badge-stock-low',
                                default => 'badge-stock-out',
                            };
                        @endphp
                        <span class="badge {{ $statusClass }}">{{ ucfirst($order->status) }}</span>
                    </div>
                </div>
                <div class="p-4 row g-4">
                    <div class="col-md-6">
                        <h6 class="fw-bold mb-2">Customer Information</h6>
                        <p class="mb-1"><strong>Name:</strong> {{ $order->user->name ?? 'Guest User' }}</p>
                        <p class="mb-1"><strong>Email:</strong> {{ $order->user->email ?? 'N/A' }}</p>
                        <p class="mb-0"><strong>User ID:</strong> {{ $order->user_id ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold mb-2">Order Summary</h6>
                        <p class="mb-1"><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
                        <p class="mb-1"><strong>Payment Method:</strong> {{ ucfirst(str_replace('_', ' ', $order->payment_method ?? 'N/A')) }}</p>
                        <p class="mb-0"><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                    </div>
                </div>
            </div>

            <div class="admin-card">
                <div class="p-4 border-bottom">
                    <h5 class="mb-0">Order Items</h5>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th class="text-end">Price</th>
                                <th class="text-end">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($order->orderDetails as $detail)
                            <tr>
                                <td>{{ $detail->product->name ?? 'Product #' . $detail->product_id }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td class="text-end">${{ number_format($detail->price, 2) }}</td>
                                <td class="text-end"><strong>${{ number_format($detail->price * $detail->quantity, 2) }}</strong></td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center py-4 text-muted">No items in this order.</td></tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end"><strong>Total</strong></td>
                                <td class="text-end"><strong>${{ number_format($order->total, 2) }}</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @include('admin.partials.logout')
    <script>
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.querySelector('.sidebar');
        sidebarToggle?.addEventListener('click', function() {
            sidebar.classList.toggle('show');
        });
    </script>
</body>
</html>
