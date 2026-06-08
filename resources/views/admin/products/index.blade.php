@extends('admin.layouts.app')

@section('title', 'Product Management')

@section('header-actions')
<div class="d-flex gap-2">
    @if(request('trashed'))
        <a href="{{ route('panel.products.index') }}" class="btn btn-outline-secondary">
            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" class="me-1">
                <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
            </svg>
            Back to Products
        </a>
    @else
        @if($stats['trashed'] > 0)
            <a href="{{ route('panel.products.index', ['trashed' => '1']) }}" class="btn btn-outline-warning">
                <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" class="me-1">
                    <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zm2-12h8v2H8V7zm0 4h8v2H8v-2z"/>
                </svg>
                View Trash ({{ $stats['trashed'] }})
            </a>
        @endif
    @endif
    <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#addProductDrawer">
        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24" class="me-1">
            <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
        </svg>
        Add Product
    </button>
</div>
@endsection

@section('content')
<div class="admin-card">
    <div class="p-4 border-bottom">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="d-flex gap-2 align-items-center">
                <form method="GET" class="d-flex gap-2">
                    <input type="text" name="search" value="{{ request('search') }}" 
                           class="form-control" placeholder="Search products..." style="width: 240px;">
                    <select name="category_id" class="form-select" style="width: 160px;">
                        <option value="">All Categories</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                    <select name="stock_status" class="form-select" style="width: 150px;">
                        <option value="">Stock Status</option>
                        <option value="in_stock" {{ request('stock_status') == 'in_stock' ? 'selected' : '' }}>In Stock</option>
                        <option value="out_of_stock" {{ request('stock_status') == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
                        <option value="on_backorder" {{ request('stock_status') == 'on_backorder' ? 'selected' : '' }}>Backorder</option>
                    </select>
                    <button type="submit" class="btn btn-outline-secondary">Filter</button>
                </form>
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-auto">
                <div class="admin-card p-3 d-inline-block">
                    <div class="small text-secondary">Total Products</div>
                    <div class="h5 mb-0 text-gold-primary">{{ $stats['total'] }}</div>
                </div>
            </div>
            <div class="col-auto">
                <div class="admin-card p-3 d-inline-block">
                    <div class="small text-secondary">Active</div>
                    <div class="h5 mb-0" style="color: #198754;">{{ $stats['active'] }}</div>
                </div>
            </div>
            <div class="col-auto">
                <div class="admin-card p-3 d-inline-block {{ $stats['low_stock'] > 0 ? 'pulse-gold' : '' }}">
                    <div class="small text-secondary">Low Stock</div>
                    <div class="h5 mb-0 text-warning">{{ $stats['low_stock'] }}</div>
                </div>
            </div>
            <div class="col-auto">
                <div class="admin-card p-3 d-inline-block">
                    <div class="small text-secondary">Trashed</div>
                    <div class="h5 mb-0 text-danger">{{ $stats['trashed'] }}</div>
                </div>
            </div>
        </div>

        <div class="bulk-action-bar" id="bulkActionBar">
            <span class="fw-medium"><span id="selectedCount">0</span> items selected</span>
            @if(request('trashed'))
                <button class="btn btn-sm btn-success" onclick="bulkRestore()">Bulk Restore</button>
                <button class="btn btn-sm btn-danger" onclick="bulkForceDelete()"><svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24" class="me-1"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 3H5c-.55 0-1 .45-1 1v1h16V4c0-.55-.45-1-1-1z"/></svg>Bulk Delete Permanently</button>
            @else
                <button class="btn btn-sm btn-outline-warning" onclick="bulkDeactivate()">Bulk Deactivate</button>
                <button class="btn btn-sm btn-danger" onclick="bulkDelete()"><svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24" class="me-1"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 3H5c-.55 0-1 .45-1 1v1h16V4c0-.55-.45-1-1-1z"/></svg>Bulk Delete</button>
            @endif
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th width="40"><input type="checkbox" id="selectAll" class="form-check-input"></th>
                    <th>Product</th>
                    <th>SKU</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td><input type="checkbox" class="form-check-input product-checkbox" value="{{ $product->id }}"></td>
                    <td>
                        <div class="d-flex align-items-center">
                            @if($product->image_url)
                                <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="table-image me-2" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                                <div class="table-image me-2 bg-dark d-flex align-items-center justify-content-center" style="display:none">
                                    <span class="text-gold-primary" style="font-size: 18px;">👗</span>
                                </div>
                            @else
                                <div class="table-image me-2 bg-dark d-flex align-items-center justify-content-center">
                                    <span class="text-gold-primary" style="font-size: 18px;">👗</span>
                                </div>
                            @endif
                            <div>
                                <div class="fw-medium">{{ $product->name }}</div>
                                <small class="text-muted">{{ Str::limit($product->description, 40) }}</small>
                            </div>
                        </div>
                    </td>
                    <td><code>{{ $product->sku ?? '-' }}</code></td>
                    <td>{{ $product->category->name ?? '-' }}</td>
                    <td>
                        <span class="badge {{ $product->stock_quantity < 10 ? 'badge-stock-low' : ($product->stock_status == 'out_of_stock' ? 'badge-stock-out' : 'badge-stock-in') }}">
                            {{ $product->stock_quantity }} {{ $product->stock_status == 'out_of_stock' ? '(Out)' : '' }}
                        </span>
                    </td>
                    <td><strong>${{ number_format($product->price, 2) }}</td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input toggle-active" type="checkbox" 
                                   data-id="{{ $product->id }}" 
                                   {{ $product->is_active ? 'checked' : '' }}>
                        </div>
                    </td>
                    <td class="text-end">
                        <div class="d-flex gap-1 justify-content-end">
                            @if(request('trashed'))
                                <button class="btn btn-sm btn-success" onclick="restoreProduct({{ $product->id }})" title="Restore">
                                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M10 3L5 8l5 5V11c3.31 0 6 2.69 6 6s-2.69 6-6 6-6-2.69-6-6V8H5c-1.1 0-2-.9-2-2V3h9z"/>
                                    </svg>
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="forceDeleteProduct({{ $product->id }}, '{{ $product->name }}')" title="Delete Permanently">
                                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 3H5c-.55 0-1 .45-1 1v1h16V4c0-.55-.45-1-1-1z"/>
                                    </svg>
                                </button>
                            @else
                                <a href="{{ route('products.show', $product->id) }}" target="_blank" 
                                   class="btn btn-sm btn-outline-secondary" title="View on Storefront">
                                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 4.5C7 4.5 2.73 7.11 1 12c1.73 4.89 6 7.5 11 7.5s9.27-2.61 11-7.5C21.27 7.11 17 4.5 12 4.5zm0 12c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                    </svg>
                                </a>
                                <button class="btn btn-sm btn-outline-primary" 
                                        onclick="editProduct({{ $product->id }})" title="Edit">
                                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a1.003 1.003 0 0 0 0-1.42l-2.34-2.34a1.003 1.003 0 0 0-1.42 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                    </svg>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" 
                                        onclick="deleteProduct({{ $product->id }}, '{{ $product->name }}')" title="Delete">
                                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 3H5c-.55 0-1 .45-1 1v1h16V4c0-.55-.45-1-1-1z"/>
                                    </svg>
                                </button>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-5">No products found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($products->hasPages())
        <div class="p-4 border-top">
            {{ $products->links() }}
        </div>
    @endif
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="addProductDrawer" style="width: 500px;">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title">Add New Product</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
                        <form action="/panel/products" method="POST" enctype="multipart/form-data" id="productForm">
            @csrf
            <input type="hidden" name="form_type" value="create">
            <div class="mb-3">
                <label class="form-label">Product Name *</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">SKU</label>
                    <input type="text" name="sku" class="form-control">
                </div>
                <div class="col">
                    <label class="form-label">Category *</label>
                    <select name="category_id" class="form-select" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Price *</label>
                    <input type="number" name="price" class="form-control" step="0.01" min="0" required>
                </div>
                <div class="col">
                    <label class="form-label">Original Price</label>
                    <input type="number" name="original_price" class="form-control" step="0.01" min="0">
                </div>
                <div class="col">
                    <label class="form-label">Discount Price</label>
                    <input type="number" name="discount_price" class="form-control" step="0.01" min="0">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Stock Quantity *</label>
                    <input type="number" name="stock_quantity" class="form-control" min="0" required>
                </div>
                <div class="col">
                    <label class="form-label">Stock Status</label>
                    <select name="stock_status" class="form-select">
                        <option value="in_stock">In Stock</option>
                        <option value="out_of_stock">Out of Stock</option>
                        <option value="on_backorder">On Backorder</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Short Description</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Long Description</label>
                <textarea name="long_description" class="form-control" rows="5"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Product Image</label>
                <input type="file" name="image_url" class="form-control" accept="image/*">
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div class="form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" checked>
                        <label class="form-check-label">Active</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input type="checkbox" name="is_popular" class="form-check-input">
                        <label class="form-check-label">Popular</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input type="checkbox" name="is_latest_drop" class="form-check-input">
                        <label class="form-check-label">Latest Drop</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" maxlength="60">
                </div>
                <div class="col">
                    <label class="form-label">Meta Description</label>
                    <input type="text" name="meta_description" class="form-control" maxlength="160">
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary flex-grow-1">Save Product</button>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete <strong id="productName"></strong>? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteForm" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Permanently</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function editProduct(id) {
    $.get("/panel/products/" + id + "/edit", function(data) {
        $('#productForm input[name="name"]').val(data.name);
        $('#productForm input[name="sku"]').val(data.sku);
        $('#productForm select[name="category_id"]').val(data.category_id);
        $('#productForm input[name="price"]').val(data.price);
        $('#productForm input[name="original_price"]').val(data.original_price);
        $('#productForm input[name="discount_price"]').val(data.discount_price);
        $('#productForm input[name="stock_quantity"]').val(data.stock_quantity);
        $('#productForm select[name="stock_status"]').val(data.stock_status);
        $('#productForm textarea[name="description"]').val(data.description);
        $('#productForm textarea[name="long_description"]').val(data.long_description);
        $('#productForm input[name="is_active"]').prop('checked', data.is_active);
        $('#productForm input[name="is_popular"]').prop('checked', data.is_popular);
        $('#productForm input[name="is_latest_drop"]').prop('checked', data.is_latest_drop);
        $('#productForm input[name="meta_title"]').val(data.meta_title);
        $('#productForm input[name="meta_description"]').val(data.meta_description);
        $('#productForm').attr('action', "/panel/products/" + id);
        $('#productForm input[name="_method"]').remove();
        $('#productForm').append('<input type="hidden" name="_method" value="PUT">');
        $('#productForm input[name="form_type"]').val('edit');
        $('#addProductDrawer .offcanvas-title').text('Edit Product');
        var drawer = new bootstrap.Offcanvas(document.getElementById('addProductDrawer'));
        drawer.show();
    });
}

function deleteProduct(id, name) {
    $('#productName').text(name);
    $('#deleteForm').attr('action', "/panel/products/" + id);
    $('#deleteForm button').text('Move to Trash');
    var modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}

function restoreProduct(id) {
    if (!confirm('Restore this product?')) return;
    $.post("/panel/products/" + id + "/restore", {
        _token: $('meta[name="csrf-token"]').attr('content')
    }).done(function() { location.reload(); });
}

function forceDeleteProduct(id, name) {
    if (!confirm('Permanently delete "' + name + '"? This cannot be undone.')) return;
    $.ajax({
        url: "/panel/products/" + id + "/force",
        method: 'DELETE',
        data: { _token: $('meta[name="csrf-token"]').attr('content') }
    }).done(function() { location.reload(); });
}

function bulkDeactivate() {
    var ids = $('.product-checkbox:checked').map(function() { return this.value; }).get();
    if (ids.length === 0) return;
    if (!confirm('Deactivate ' + ids.length + ' selected product(s)?')) return;
    $.post("/panel/products/bulk-deactivate", { ids: ids, _token: $('meta[name="csrf-token"]').attr('content') })
        .done(function() { location.reload(); });
}

function bulkDelete() {
    var ids = $('.product-checkbox:checked').map(function() { return this.value; }).get();
    if (ids.length === 0) return;
    if (!confirm('Move ' + ids.length + ' selected product(s) to trash?')) return;
    $.post("/panel/products/bulk-delete", { ids: ids, _token: $('meta[name="csrf-token"]').attr('content') })
        .done(function() { location.reload(); });
}

function bulkRestore() {
    var ids = $('.product-checkbox:checked').map(function() { return this.value; }).get();
    if (ids.length === 0) return;
    if (!confirm('Restore ' + ids.length + ' selected product(s)?')) return;
    $.post("/panel/products/bulk-restore", { ids: ids, _token: $('meta[name="csrf-token"]').attr('content') })
        .done(function() { location.reload(); });
}

function bulkForceDelete() {
    var ids = $('.product-checkbox:checked').map(function() { return this.value; }).get();
    if (ids.length === 0) return;
    if (!confirm('Permanently delete ' + ids.length + ' selected product(s)? This cannot be undone.')) return;
    $.ajax({
        url: "/panel/products/bulk-force-delete",
        method: 'DELETE',
        data: { ids: ids, _token: $('meta[name="csrf-token"]').attr('content') }
    }).done(function() { location.reload(); });
}

$(document).ready(function() {
    $('#selectAll').change(function() {
        $('.product-checkbox').prop('checked', this.checked);
        updateBulkBar();
    });
        
        $('.product-checkbox').change(updateBulkBar);
        
        $('.toggle-active').change(function() {
            var id = $(this).data('id');
            $.post("/panel/products/toggle-active/" + id, {
                _token: $('meta[name="csrf-token"]').attr('content')
            });
        });

        var offcanvasEl = document.getElementById('addProductDrawer');
        offcanvasEl.addEventListener('hidden.bs.offcanvas', function () {
            $('#addProductDrawer .offcanvas-title').text('Add New Product');
            $('#productForm')[0].reset();
        $('#productForm input[name="_method"]').remove();
        $('#productForm').attr('action', '/panel/products');
        $('#productForm').remove('<input type="hidden" name="_method" value="POST">');
        $('#productForm input[name="form_type"]').val('create');
        });
        
        function updateBulkBar() {
            var count = $('.product-checkbox:checked').length;
            $('#selectedCount').text(count);
            $('#bulkActionBar').toggleClass('active', count > 0);
            $('#selectAll').prop('indeterminate', count > 0 && count < $('.product-checkbox').length);
        }
    });
</script>
@push('styles')
<style>
    .text-gold-primary {
        color: var(--gold-primary) !important;
    }
</style>
@endpush
@endsection