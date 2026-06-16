<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create Product - LOOMA Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 260px;
            --bg-body: #f1f5f9;
            --bg-card: #ffffff;
            --text-primary: #0f172a;
            --text-secondary: #475569;
            --border: #e2e8f0;
            --brand: #0ea5e9;
            --brand-hover: #0284c7;
            --danger: #ef4444;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: var(--bg-body);
            color: var(--text-primary);
            min-height: 100vh;
            margin: 0;
            font-size: 14px;
        }

        .admin-header {
            background: #0f172a;
            color: #fff;
            padding: 14px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .admin-header h1 {
            font-size: 18px;
            font-weight: 700;
            margin: 0;
            letter-spacing: -0.01em;
        }

        .admin-header .breadcrumb {
            background: transparent;
            padding: 0;
            margin: 4px 0 0;
            font-size: 12px;
            color: #94a3b8;
        }

        .admin-header .breadcrumb a {
            color: #94a3b8;
            text-decoration: none;
        }

        .admin-header .breadcrumb a:hover {
            color: #fff;
        }

        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 28px 24px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: 24px;
            align-items: start;
        }

        @media (max-width: 992px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }

        .card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 22px;
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            color: var(--text-secondary);
            margin: 0 0 16px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 14px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 5px;
        }

        .required {
            color: var(--danger);
        }

        .form-input {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid var(--border);
            border-radius: 6px;
            font-size: 14px;
            color: var(--text-primary);
            background: #fff;
            transition: border-color 0.2s;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--brand);
            box-shadow: 0 0 0 3px rgba(14,165,233,0.12);
        }

        .form-input.is-invalid {
            border-color: var(--danger);
        }

        .error-text {
            display: block;
            font-size: 12px;
            color: var(--danger);
            margin-top: 3px;
        }

        .form-textarea {
            resize: vertical;
            min-height: 70px;
        }

        .checkbox-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            cursor: pointer;
        }

        .checkbox-row {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .chip {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border: 1px solid var(--border);
            border-radius: 999px;
            background: #fff;
            font-size: 13px;
            cursor: pointer;
            user-select: none;
            transition: all 0.2s;
        }

        .chip:hover {
            border-color: #94a3b8;
        }

        .chip input[type="checkbox"] {
            accent-color: var(--brand);
        }

        .chip-color .color-dot {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            display: inline-block;
            box-shadow: inset 0 0 0 1px rgba(0,0,0,0.15);
        }

        .upload-area {
            border: 2px dashed var(--border);
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
            position: relative;
        }

        .upload-area:hover {
            border-color: var(--brand);
            background: #f8fafc;
        }

        .upload-input {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
        }

        .upload-placeholder {
            pointer-events: none;
        }

        .upload-placeholder svg {
            color: #94a3b8;
            margin-bottom: 6px;
        }

        .upload-placeholder p {
            margin: 0;
            font-weight: 600;
            font-size: 13px;
            color: var(--text-primary);
        }

        .upload-placeholder span {
            font-size: 12px;
            color: var(--text-secondary);
        }

        .preview-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
            margin-top: 12px;
        }

        .preview-item {
            aspect-ratio: 1;
            border-radius: 6px;
            overflow: hidden;
            border: 1px solid var(--border);
            position: relative;
            background: #f8fafc;
        }

        .preview-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .preview-num {
            position: absolute;
            top: 4px;
            left: 4px;
            background: rgba(15,23,42,0.8);
            color: #fff;
            font-size: 10px;
            font-weight: 700;
            padding: 2px 6px;
            border-radius: 4px;
        }

        .preview-label {
            position: absolute;
            bottom: 4px;
            right: 4px;
            background: var(--brand);
            color: #fff;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            padding: 2px 6px;
            border-radius: 4px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 10px 18px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            border: 0;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-primary {
            background: var(--brand);
            color: #fff;
            width: 100%;
        }

        .btn-primary:hover {
            background: var(--brand-hover);
        }

        .btn-secondary {
            background: #fff;
            color: var(--text-primary);
            border: 1px solid var(--border);
            width: 100%;
        }

        .btn-secondary:hover {
            background: #f8fafc;
            border-color: #94a3b8;
        }

        .form-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .text-muted {
            color: var(--text-secondary);
            font-size: 12px;
        }
    </style>
</head>
<body>

<div class="admin-header">
    <div>
        <h1>Create New Product</h1>
        <nav class="breadcrumb" aria-label="breadcrumb">
            <a href="{{ route('panel.products.index') }}">Products</a>
            <span> / </span>
            <span>Create</span>
        </nav>
    </div>
</div>

<div class="admin-container">
    <form action="{{ route('panel.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-grid">
            <div class="form-main">
                <div class="card">
                    <h3 class="card-title">Product Information</h3>

                    <div class="form-group">
                        <label for="name">Product Name <span class="required">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                               placeholder="Enter product name" class="form-input @error('name') is-invalid @enderror">
                        @error('name')<span class="error-text">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="sku">SKU</label>
                            <input type="text" name="sku" id="sku" value="{{ old('sku') }}"
                                   placeholder="SKU-0001" class="form-input @error('sku') is-invalid @enderror">
                            @error('sku')<span class="error-text">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category <span class="required">*</span></label>
                            <select name="category_id" id="category_id" required class="form-input @error('category_id') is-invalid @enderror">
                                <option value="">Select category</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')<span class="error-text">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Short Description</label>
                        <textarea name="description" id="description" rows="3" placeholder="Brief product description..."
                                  class="form-input form-textarea @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')<span class="error-text">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="long_description">Long Description</label>
                        <textarea name="long_description" id="long_description" rows="5" placeholder="Detailed product description, features, care instructions..."
                                  class="form-input form-textarea @error('long_description') is-invalid @enderror">{{ old('long_description') }}</textarea>
                        @error('long_description')<span class="error-text">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="card">
                    <h3 class="card-title">Pricing & Inventory</h3>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="price">Price (USD) <span class="required">*</span></label>
                            <input type="number" name="price" id="price" step="0.01" min="0" value="{{ old('price') }}" required
                                   placeholder="0.00" class="form-input @error('price') is-invalid @enderror">
                            @error('price')<span class="error-text">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="original_price">Original Price</label>
                            <input type="number" name="original_price" id="original_price" step="0.01" min="0" value="{{ old('original_price') }}"
                                   placeholder="0.00" class="form-input @error('original_price') is-invalid @enderror">
                            @error('original_price')<span class="error-text">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="discount_price">Discount Price</label>
                            <input type="number" name="discount_price" id="discount_price" step="0.01" min="0" value="{{ old('discount_price') }}"
                                   placeholder="0.00" class="form-input @error('discount_price') is-invalid @enderror">
                            @error('discount_price')<span class="error-text">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="stock_quantity">Stock Quantity <span class="required">*</span></label>
                            <input type="number" name="stock_quantity" id="stock_quantity" min="0" value="{{ old('stock_quantity') }}" required
                                   placeholder="0" class="form-input @error('stock_quantity') is-invalid @enderror">
                            @error('stock_quantity')<span class="error-text">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="stock_status">Stock Status <span class="required">*</span></label>
                            <select name="stock_status" id="stock_status" required class="form-input @error('stock_status') is-invalid @enderror">
                                <option value="">Select status</option>
                                <option value="in_stock" {{ old('stock_status') === 'in_stock' ? 'selected' : '' }}>In Stock</option>
                                <option value="out_of_stock" {{ old('stock_status') === 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
                                <option value="on_backorder" {{ old('stock_status') === 'on_backorder' ? 'selected' : '' }}>On Backorder</option>
                            </select>
                            @error('stock_status')<span class="error-text">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Product Status</label>
                            <div class="checkbox-group">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                    <span>Active (visible in store)</span>
                                </label>
                                <label class="checkbox-label">
                                    <input type="checkbox" name="is_popular" value="1" {{ old('is_popular') ? 'checked' : '' }}>
                                    <span>Mark as Popular</span>
                                </label>
                                <label class="checkbox-label">
                                    <input type="checkbox" name="is_latest_drop" value="1" {{ old('is_latest_drop') ? 'checked' : '' }}>
                                    <span>Mark as Latest Drop</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <h3 class="card-title">Product Options</h3>

                    <div class="form-group">
                        <label>Product Sizes</label>
                        <div class="checkbox-row">
                            @foreach(['S', 'M', 'L', 'XL', 'XXL'] as $size)
                                <label class="chip">
                                    <input type="checkbox" name="sizes[]" value="{{ $size }}"
                                           {{ is_array(old('sizes')) && in_array($size, old('sizes')) ? 'checked' : '' }}>
                                    <span>{{ $size }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Product Colors</label>
                        <div class="checkbox-row">
                            @foreach($colors as $color)
                                <label class="chip chip-color">
                                    <input type="checkbox" name="colors[]" value="{{ $color->name }}"
                                           {{ is_array(old('colors')) && in_array($color->name, old('colors')) ? 'checked' : '' }}>
                                    <span class="color-dot" style="background:{{ $color->code ?? '#cccccc' }}"></span>
                                    <span>{{ $color->name }}</span>
                                </label>
                            @endforeach
                            @if($colors->count() === 0)
                                <span class="text-muted">No colors defined.</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card">
                    <h3 class="card-title">SEO</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title" maxlength="60" value="{{ old('meta_title') }}"
                                   placeholder="SEO title" class="form-input">
                        </div>
                        <div class="form-group">
                            <label for="meta_description">Meta Description</label>
                            <textarea name="meta_description" id="meta_description" rows="2" maxlength="160"
                                      placeholder="SEO description" class="form-input form-textarea">{{ old('meta_description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-sidebar">
                <div class="card">
                    <h3 class="card-title">Product Images</h3>
                    <div class="form-group">
                        <label for="images">Upload Images <span class="required">*</span></label>
                        <div class="upload-area" id="uploadArea">
                            <input type="file" name="images[]" id="images" multiple accept="image/*" required class="upload-input">
                            <div class="upload-placeholder">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                                <p>Click to upload</p>
                                <span>JPG, PNG, WEBP · 2-4 images · max 2MB</span>
                            </div>
                        </div>
                        @error('images')<span class="error-text">{{ $message }}</span>@enderror
                        <div class="preview-grid" id="previewGrid"></div>
                    </div>
                </div>

                <div class="card">
                    <h3 class="card-title">Publish</h3>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                <polyline points="7 3 7 8 15 8"></polyline>
                            </svg>
                            Create Product
                        </button>
                        <a href="{{ route('panel.products.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
document.getElementById('images').addEventListener('change', function(e) {
    var grid = document.getElementById('previewGrid');
    grid.innerHTML = '';
    Array.from(e.target.files).forEach(function(file, idx) {
        if (!file.type.startsWith('image/')) return;
        var reader = new FileReader();
        reader.onload = function(ev) {
            var div = document.createElement('div');
            div.className = 'preview-item';
            div.innerHTML = '<img src="' + ev.target.result + '">' +
                '<span class="preview-num">#' + (idx + 1) + '</span>' +
                '<span class="preview-label">' + (idx === 0 ? 'Primary' : 'Alt') + '</span>';
            grid.appendChild(div);
        };
        reader.readAsDataURL(file);
    });
});

document.getElementById('uploadArea').addEventListener('click', function(e) {
    if (e.target.tagName !== 'INPUT' && e.target.tagName !== 'svg' && e.target.tagName !== 'path') {
        document.getElementById('images').click();
    }
});
</script>

</body>
</html>
