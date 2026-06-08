@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="admin-card p-4 position-relative overflow-hidden">
            <div class="small text-secondary mb-2">Total Revenue</div>
            <div class="h2 mb-0 fw-bold" style="color: var(--gold-primary);">{{ '$' . number_format($stats['total_revenue'], 2) }}</div>
            <div class="position-absolute top-0 end-0 opacity-10">
                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" fill="var(--gold-primary)"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="admin-card p-4 position-relative overflow-hidden">
            <div class="small text-secondary mb-2">Total Orders</div>
            <div class="h2 mb-0 fw-bold">{{ $stats['total_orders'] }}</div>
            <div class="position-absolute top-0 end-0 opacity-10">
                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4h-8V5h8v2z" fill="var(--gold-primary)"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="admin-card p-4 position-relative overflow-hidden">
            <div class="small text-secondary mb-2">Pending Orders</div>
            <div class="h2 mb-0 fw-bold text-warning">{{ $stats['pending_orders'] }}</div>
            <div class="position-absolute top-0 end-0 opacity-10">
                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="12" r="10" stroke="var(--gold-primary)" stroke-width="2" fill="none"/>
                    <path d="M12 6v6l3 3" stroke="var(--gold-primary)" stroke-width="2"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="admin-card p-4 position-relative overflow-hidden">
            <div class="small text-secondary mb-2">Total Customers</div>
            <div class="h2 mb-0 fw-bold">{{ $stats['total_customers'] }}</div>
            <div class="position-absolute top-0 end-0 opacity-10">
                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" fill="var(--gold-primary)"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="admin-card p-4 position-relative overflow-hidden">
            <div class="small text-secondary mb-2">Total Products</div>
            <div class="h2 mb-0 fw-bold">{{ $stats['total_products'] }}</div>
            <small class="text-muted d-block mt-1">{{ $stats['active_products'] }} active • {{ $stats['inactive_products'] }} inactive</small>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="admin-card p-4 position-relative overflow-hidden {{ $stats['low_stock'] > 0 ? 'pulse-gold' : '' }}">
            <div class="small text-secondary mb-2">Low Stock Alert</div>
            <div class="h2 mb-0 fw-bold {{ $stats['low_stock'] > 0 ? 'text-warning' : 'text-gold-primary' }}">{{ $stats['low_stock'] }}</div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-7">
        <div class="admin-card">
            <div class="p-4 border-bottom d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">Recent Orders</h5>
                <a href="{{ route('panel.orders.index') }}" class="btn btn-sm btn-outline-secondary">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentOrders as $order)
                        <tr>
                            <td><strong class="text-warning">#{{ $order->id }}</strong></td>
                            <td>{{ $order->user->name ?? 'Guest' }}</td>
                            <td><strong>${{ number_format($order->total, 2) }}</strong></td>
                            <td>
                                @php
                                    $statusClass = match($order->status) {
                                        'paid', 'delivered' => 'badge-stock-in',
                                        'pending' => 'badge-stock-low',
                                        default => 'badge-stock-out',
                                    };
                                @endphp
                                <span class="badge {{ $statusClass }}">{{ ucfirst($order->status) }}</span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('panel.orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary">View</a>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center py-5 text-muted">No orders yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="admin-card">
            <div class="p-4 border-bottom d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">Featured Products</h5>
                <a href="{{ route('panel.products.index') }}" class="btn btn-sm btn-outline-secondary">Manage</a>
            </div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($topProducts as $product)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($product->image_url)
                                        <img src="{{ asset('storage/' . $product->image_url) }}" class="table-image me-3" alt="{{ $product->name }}" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                                        <div class="table-image me-3 bg-dark d-flex align-items-center justify-content-center" style="display:none">
                                            <span class="text-gold-primary" style="font-size: 20px;">👗</span>
                                        </div>
                                    @else
                                        <div class="table-image me-3 bg-dark d-flex align-items-center justify-content-center">
                                            <span class="text-gold-primary" style="font-size: 20px;">👗</span>
                                        </div>
                                    @endif
                                    <span class="fw-medium">{{ Str::limit($product->name, 30) }}</span>
                                </div>
                            </td>
                            <td><strong>${{ number_format($product->price, 2) }}</strong></td>
                            <td>
                                @if($product->stock_quantity < 10)
                                    <span class="text-warning">{{ $product->stock_quantity }}</span>
                                @elseif($product->stock_status == 'out_of_stock')
                                    <span class="text-danger">0</span>
                                @else
                                    <span class="text-success">{{ $product->stock_quantity }}</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('panel.products.edit', $product->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center py-4 text-muted">No products yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
