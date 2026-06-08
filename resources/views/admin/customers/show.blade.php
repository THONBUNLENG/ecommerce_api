@extends('admin.layouts.app')

@section('title', 'Customer: ' . $customer->name)

@section('header-actions')
<a href="{{ route('panel.customers.index') }}" class="btn btn-outline-secondary">Back to Customers</a>
@endsection

@section('content')
<div class="admin-card mb-4">
    <div class="p-4 row g-4">
        <div class="col-md-6">
            <h6 class="fw-bold mb-2">Customer Information</h6>
            <p class="mb-1"><strong>Name:</strong> {{ $customer->name }}</p>
            <p class="mb-1"><strong>Email:</strong> {{ $customer->email }}</p>
            <p class="mb-0"><strong>Joined:</strong> {{ $customer->created_at->format('F j, Y') }}</p>
        </div>
        <div class="col-md-6">
            <h6 class="fw-bold mb-2">Order Statistics</h6>
            <p class="mb-1"><strong>Total Orders:</strong> {{ $customer->orders_count }}</p>
        </div>
    </div>
</div>

<div class="admin-card">
    <div class="p-4 border-bottom">
        <h5 class="mb-0">Customer Orders</h5>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr>
<td><strong>#{{ $order->id }}</strong></td>
                     <td>{{ $order->created_at->format('M d, Y') }}</td>
                     <td>${{ number_format($order->total, 2) }}</td>
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
                <tr><td colspan="5" class="text-center py-4 text-muted">No orders yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
