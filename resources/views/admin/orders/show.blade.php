@extends('admin.layouts.app')

@section('title', 'Order #' . $order->id)

@section('header-actions')
<a href="{{ route('panel.orders.index') }}" class="btn btn-outline-secondary">
    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" class="me-1"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
    Back to Orders
</a>
@endsection

@section('content')
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
@endsection
