@extends('admin.layouts.app')

@section('title', 'Customers Management')

@section('header-actions')
<div class="d-flex gap-2">
    <form method="GET" class="d-flex gap-2">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search customers..." style="width: 240px;">
        <button type="submit" class="btn btn-outline-secondary">Search</button>
    </form>
</div>
@endsection

@section('content')
<div class="admin-card">
    <div class="p-4 border-bottom d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Customer Directory</h5>
        <small class="text-secondary">{{ $customers->total() ?? 0 }} customers</small>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Email</th>
                    <th>Joined</th>
                    <th class="text-center">Orders</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($customers as $customer)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="table-image me-3 bg-dark d-flex align-items-center justify-content-center">
                                <span class="text-gold-primary" style="font-size: 20px;">👤</span>
                            </div>
                            <span class="fw-medium">{{ $customer->name }}</span>
                        </div>
                    </td>
                    <td>{{ $customer->email }}</td>
                    <td><small>{{ $customer->created_at->format('M d, Y') }}</small></td>
                    <td class="text-center"><span class="badge bg-dark">{{ $customer->orders_count }}</span></td>
                    <td class="text-end">
                        <a href="{{ route('panel.customers.show', $customer->id) }}" class="btn btn-sm btn-outline-primary">View</a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center py-5 text-muted">No customers found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($customers->hasPages())
    <div class="p-4 border-top">
        {{ $customers->links() }}
    </div>
    @endif
</div>

@push('styles')
<style>
    .text-gold-primary {
        color: var(--gold-primary) !important;
    }
</style>
@endpush
@endsection
