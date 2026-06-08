@extends('admin.layouts.app')

@section('title', 'Orders Management')

@section('header-actions')
<a href="{{ route('panel.orders.index') }}" class="btn btn-outline-secondary">All Orders</a>
@endsection

@section('content')
<div class="admin-card">
    <div class="p-4 border-bottom d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Order Directory</h5>
        <small class="text-secondary">{{ $orders->total() ?? 0 }} orders</small>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr>
                    <td><strong class="text-primary">#{{ $order->id }}</strong></td>
                    <td>{{ $order->user->name ?? 'Guest' }}</td>
                    <td><small>{{ $order->created_at->format('M d, Y') }}</small></td>
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
                <tr><td colspan="6" class="text-center py-5 text-muted">No orders found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($orders->hasPages())
    <div class="p-4 border-top">
        {{ $orders->links() }}
    </div>
    @endif
</div>
@endsection
