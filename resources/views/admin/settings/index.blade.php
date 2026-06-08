@extends('admin.layouts.app')

@section('title', 'System Settings')

@section('content')
<div class="admin-card">
    <div class="p-4 border-bottom">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-0 fw-bold" style="background: linear-gradient(90deg, var(--gold-primary), var(--gold-secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">General Settings</h5>
            <svg width="24" height="24" fill="var(--gold-primary)" opacity="0.3" viewBox="0 0 24 24">
                <path d="M19.14 12.94c.04-.31.06-.63.06-.94 0-.31-.02-.63-.06-.94l2.03-1.58a.49.49 0 00.12-.61l-1.92-3.32a.49.49 0 00-.59-.22l-2.39.96c-.5-.38-1.03-.7-1.62-.94l-.36-2.54a.484.484 0 00-.48-.41h-3.84c-.24 0-.43.17-.47.41l-.36 2.54c-.59.24-1.13.57-1.62.94l-2.39-.96c-.22-.08-.47 0-.59.22L2.74 8.87c-.12.21-.08.47.12.61l2.03 1.58c-.04.31-.06.63-.06.94s.02.63.06.94l-2.03 1.58a.49.49 0 00-.12.61l1.92 3.32c.12.22.37.29.59.22l2.39-.96c.5.38 1.03.7 1.62.94l.36 2.54c.05.24.24.41.48.41h3.84c.24 0 .44-.17.47-.41l.36-2.54c.59-.24 1.13-.56 1.62-.94l2.39.96c.22.08.47 0 .59-.22l1.92-3.32c.12-.22.07-.47-.12-.61l-2.01-1.58zM12 15.6A3.6 3.6 0 1115.6 12 3.611 3.611 0 0112 15.6z"/>
            </svg>
        </div>
    </div>
    <div class="p-4">
        <form action="{{ route('panel.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Site Name *</label>
                <input type="text" name="site_name" class="form-control" value="{{ old('site_name', $settings['site_name']) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Site Description</label>
                <textarea name="site_description" class="form-control" rows="3">{{ old('site_description', $settings['site_description']) }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Site Email *</label>
                <input type="email" name="site_email" class="form-control" value="{{ old('site_email', $settings['site_email']) }}" required>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Currency Symbol *</label>
                    <input type="text" name="currency" class="form-control" value="{{ old('currency', $settings['currency']) }}" maxlength="3" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Free Shipping Threshold ($) *</label>
                    <input type="number" name="free_shipping_threshold" class="form-control" value="{{ old('free_shipping_threshold', $settings['free_shipping_threshold']) }}" min="0" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Tax Rate (%) *</label>
                    <input type="number" name="tax_rate" class="form-control" value="{{ old('tax_rate', $settings['tax_rate']) }}" min="0" max="100" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Site Logo</label>
                <input type="file" name="logo" class="form-control" accept="image/*">
                @if($settings['logo'])
                    <img src="{{ asset('storage/' . $settings['logo']) }}" alt="Current Logo" class="mt-2" style="height: 60px;">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Save Settings</button>
        </form>
    </div>
</div>
@endsection
