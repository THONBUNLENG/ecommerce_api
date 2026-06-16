<x-app-layout>
@section('hero')

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Inter:wght@300;400;500;600;700&display=swap');

:root {
    --vp-ink: #111111;
    --vp-muted: #666666;
    --vp-soft: #faf7f1;
    --vp-line: #e7dfd3;
    --vp-gold: #c9a86a;
    --vp-gold-dark: #b8964d;
    --vp-success: #2d7a4a;
    --vp-warning: #9a5a00;
}

.vp-page {
    background: #fffdfa;
    color: var(--vp-ink);
    font-family: 'Inter', 'Poppins', sans-serif;
}

.vp-breadcrumb {
    padding: 16px 0;
    border-bottom: 1px solid var(--vp-line);
}

.vp-breadcrumb-inner {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 13px;
    color: var(--vp-muted);
    flex-wrap: wrap;
}

.vp-breadcrumb a {
    color: var(--vp-muted);
    text-decoration: none;
}

.vp-breadcrumb a:hover {
    color: var(--vp-gold-dark);
}

.vp-breadcrumb-sep {
    color: var(--vp-line);
}

.vp-breadcrumb-current {
    color: var(--vp-ink);
    font-weight: 500;
}

.vp-content {
    padding: 50px 0 70px;
}

.vp-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 54px;
    align-items: start;
}

@media (max-width: 992px) {
    .vp-grid {
        grid-template-columns: 1fr;
        gap: 36px;
    }
}

.vp-gallery {
    position: sticky;
    top: 90px;
}

.vp-main-image {
    aspect-ratio: 3 / 4;
    overflow: hidden;
    border-radius: 14px;
    background: linear-gradient(180deg, #f5efe5, #ffffff);
    border: 1px solid var(--vp-line);
    margin-bottom: 12px;
}

.vp-main-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center top;
    display: block;
    transition: opacity 0.25s ease;
}

.vp-thumbnails {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 8px;
}

.vp-thumb {
    aspect-ratio: 3 / 4;
    border-radius: 6px;
    overflow: hidden;
    cursor: pointer;
    border: 2px solid transparent;
    background: linear-gradient(180deg, #f5efe5, #ffffff);
    transition: border-color 0.2s, transform 0.2s;
}

.vp-thumb:hover {
    transform: translateY(-2px);
}

.vp-thumb.active {
    border-color: var(--vp-gold);
}

.vp-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.vp-no-images {
    aspect-ratio: 3 / 4;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(180deg, #e7dfd3, #faf7f1);
    border-radius: 14px;
    border: 1px solid var(--vp-line);
    color: var(--vp-muted);
    font-size: 13px;
}

.vp-info {
    display: flex;
    flex-direction: column;
}

.vp-meta-row {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 10px;
    flex-wrap: wrap;
}

.vp-category {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--vp-gold-dark);
}

.vp-badge {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    padding: 5px 12px;
    border-radius: 999px;
}

.vp-badge-new {
    background: var(--vp-gold);
    color: var(--vp-ink);
}

.vp-badge-featured {
    background: var(--vp-ink);
    color: #fff;
}

.vp-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(28px, 4vw, 42px);
    font-weight: 700;
    line-height: 1.12;
    letter-spacing: -0.03em;
    margin: 0 0 18px;
}

.vp-price-block {
    display: flex;
    align-items: baseline;
    gap: 12px;
    margin-bottom: 10px;
    flex-wrap: wrap;
}

.vp-price-current {
    font-size: 30px;
    font-weight: 700;
    font-family: 'Playfair Display', serif;
}

.vp-price-original {
    font-size: 17px;
    color: var(--vp-muted);
    text-decoration: line-through;
}

.vp-discount-tag {
    background: #f0e9db;
    color: #7a5c2e;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    padding: 4px 10px;
    border-radius: 4px;
}

.vp-stock-indicator {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 22px;
}

.vp-stock-indicator.in {
    color: var(--vp-success);
}

.vp-stock-indicator.out {
    color: var(--vp-warning);
}

.vp-stock-indicator .dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: currentColor;
}

.vp-section {
    margin-bottom: 22px;
    padding-bottom: 22px;
    border-bottom: 1px solid var(--vp-line);
}

.vp-section-label {
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    margin-bottom: 12px;
}

.vp-color-options {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.vp-color-swatch {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    cursor: pointer;
    border: 2px solid transparent;
    box-shadow: inset 0 0 0 1px rgba(0,0,0,0.1);
    transition: transform 0.2s, box-shadow 0.2s;
    position: relative;
}

.vp-color-swatch:hover {
    transform: translateY(-2px);
}

.vp-color-swatch.active {
    border-color: var(--vp-ink);
    box-shadow: 0 0 0 2px #fff, 0 0 0 4px var(--vp-gold);
}

.vp-size-options {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.vp-size-btn {
    min-width: 52px;
    height: 44px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border: 1px solid var(--vp-line);
    border-radius: 6px;
    background: #fff;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    padding: 0 14px;
    transition: all 0.2s;
}

.vp-size-btn:hover {
    border-color: var(--vp-gold);
}

.vp-size-btn.active {
    background: var(--vp-ink);
    color: #fff;
    border-color: var(--vp-ink);
}

.vp-full-table-wrap {
    overflow-x: auto;
}

.vp-full-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
}

.vp-full-table th {
    text-align: left;
    padding: 10px 12px;
    background: var(--vp-soft);
    border: 1px solid var(--vp-line);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: var(--vp-muted);
}

.vp-full-table td {
    padding: 10px 12px;
    border: 1px solid var(--vp-line);
}

.vp-full-table tr:hover td {
    background: #fefdfb;
}

.vp-color-dot {
    width: 22px;
    height: 22px;
    border-radius: 50%;
    display: inline-block;
    vertical-align: middle;
    margin-right: 6px;
    box-shadow: inset 0 0 0 1px rgba(0,0,0,0.1);
}

.vp-instock {
    color: var(--vp-success);
    font-weight: 600;
}

.vp-outstock {
    color: var(--vp-warning);
    font-weight: 600;
}

.vp-quantity-row {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-bottom: 22px;
    flex-wrap: wrap;
}

.vp-quantity-label {
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
}

.vp-qty-selector {
    display: inline-flex;
    align-items: center;
    border: 1px solid var(--vp-line);
    border-radius: 6px;
    overflow: hidden;
    background: #fff;
}

.vp-qty-btn {
    width: 40px;
    height: 40px;
    border: 0;
    background: transparent;
    font-size: 17px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.2s;
}

.vp-qty-btn:hover {
    background: var(--vp-soft);
}

.vp-qty-input {
    width: 48px;
    height: 40px;
    border: 0;
    border-left: 1px solid var(--vp-line);
    border-right: 1px solid var(--vp-line);
    text-align: center;
    font-size: 14px;
    font-weight: 600;
    -moz-appearance: textfield;
    background: #fff;
}

.vp-qty-input::-webkit-outer-spin-button,
.vp-qty-input::-webkit-inner-spin-button {
    -webkit-appearance: none;
}

.vp-cart-actions {
    display: flex;
    gap: 10px;
    margin-bottom: 22px;
    align-items: center;
}

.vp-btn-primary {
    flex: 1;
    min-height: 50px;
    background: var(--vp-ink);
    color: #fff;
    border: 0;
    border-radius: 8px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    cursor: pointer;
    transition: background 0.25s, transform 0.25s;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.vp-btn-primary:hover:not(:disabled) {
    background: var(--vp-gold-dark);
    transform: translateY(-1px);
}

.vp-btn-primary:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

.vp-btn-wishlist {
    width: 50px;
    height: 50px;
    border: 1px solid var(--vp-line);
    border-radius: 8px;
    background: #fff;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.25s;
}

.vp-btn-wishlist:hover {
    border-color: var(--vp-gold);
    color: var(--vp-gold-dark);
}

.vp-btn-wishlist svg {
    width: 20px;
    height: 20px;
}

.vp-guarantees {
    display: flex;
    gap: 16px;
    padding-top: 16px;
    border-top: 1px solid var(--vp-line);
    font-size: 12px;
    color: var(--vp-muted);
}

.vp-tabs-section {
    padding: 50px 0;
    border-top: 1px solid var(--vp-line);
}

.vp-tabs-nav {
    display: flex;
    border-bottom: 1px solid var(--vp-line);
    margin-bottom: 24px;
}

.vp-tab-btn {
    padding: 12px 24px;
    background: transparent;
    border: 0;
    border-bottom: 2px solid transparent;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    color: var(--vp-muted);
    cursor: pointer;
    margin-bottom: -1px;
    transition: all 0.2s;
}

.vp-tab-btn:hover {
    color: var(--vp-ink);
}

.vp-tab-btn.active {
    color: var(--vp-ink);
    border-bottom-color: var(--vp-gold-dark);
}

.vp-tab-panel {
    display: none;
    max-width: 780px;
}

.vp-tab-panel.active {
    display: block;
}

.vp-tab-content {
    font-size: 15px;
    line-height: 1.85;
    color: var(--vp-muted);
}

.vp-tab-content h3 {
    font-size: 17px;
    font-weight: 700;
    color: var(--vp-ink);
    margin: 0 0 10px;
}

.vp-related-section {
    padding: 70px 0;
    background: var(--vp-soft);
    border-top: 1px solid var(--vp-line);
    border-bottom: 1px solid var(--vp-line);
}

.vp-related-bar {
    display: flex;
    align-items: end;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 28px;
}

.vp-related-kicker {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.16em;
    text-transform: uppercase;
    color: var(--vp-gold-dark);
    margin: 0 0 8px;
}

.vp-related-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(24px, 3.5vw, 36px);
    font-weight: 700;
    line-height: 1.1;
    letter-spacing: -0.03em;
    margin: 0;
}

.vp-related-count {
    color: var(--vp-muted);
    font-size: 14px;
    white-space: nowrap;
}

.vp-related-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 16px;
}

@media (max-width: 1200px) { .vp-related-grid { grid-template-columns: repeat(3, 1fr); } }
@media (max-width: 992px)  { .vp-related-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 640px)  { .vp-related-grid { grid-template-columns: repeat(2, 1fr); gap: 10px; } }

.vp-related-card {
    background: #fff;
    border: 1px solid var(--vp-line);
    border-radius: 12px;
    overflow: hidden;
    text-decoration: none;
    color: inherit;
    display: block;
    transition: transform 0.3s, box-shadow 0.3s, border-color 0.3s;
}

.vp-related-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.10);
    border-color: rgba(201,168,106,0.5);
}

.vp-related-card-media {
    display: block;
    aspect-ratio: 3 / 4;
    overflow: hidden;
    position: relative;
}

.vp-related-card-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.5s;
}

.vp-related-card:hover .vp-related-card-media img {
    transform: scale(1.05);
}

.vp-related-badge {
    position: absolute;
    top: 8px;
    left: 8px;
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    padding: 4px 10px;
    border-radius: 999px;
    background: var(--vp-ink);
    color: #fff;
}

.vp-related-badge.gold {
    background: var(--vp-gold);
    color: var(--vp-ink);
}

.vp-related-card-body {
    padding: 12px;
}

.vp-related-card-category {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--vp-gold-dark);
    margin: 0 0 4px;
}

.vp-related-card-title {
    font-size: 14px;
    font-weight: 700;
    margin: 0 0 6px;
    line-height: 1.3;
}

.vp-related-card-price {
    font-size: 14px;
    font-weight: 700;
}

.vp-related-card-price del {
    font-size: 11px;
    color: #9a9a9a;
    font-weight: 400;
    margin-right: 4px;
}
</style>

<!-- Breadcrumb -->
<div class="vp-breadcrumb">
    <div class="container">
        <nav class="vp-breadcrumb-inner">
            <a href="{{ route('home') }}">Home</a>
            <span class="vp-breadcrumb-sep">/</span>
            <a href="{{ route('view-products') }}">Shop</a>
            <span class="vp-breadcrumb-sep">/</span>
            <a href="{{ route('view-products') }}">{{ $product->category?->name ?? 'Products' }}</a>
            <span class="vp-breadcrumb-sep">/</span>
            <span class="vp-breadcrumb-current">{{ $product->name }}</span>
        </nav>
    </div>
</div>

<main class="vp-page">
    <section class="vp-content">
        <div class="container">
            <div class="vp-grid">
                <!-- Gallery -->
                <div class="vp-gallery">
                    <div class="vp-main-image">
                        @php
                            $primarySrc = $product->images->first()?->image_path
                                ? asset('storage/' . $product->images->first()->image_path)
                                : ($product->image_url ? asset('storage/' . $product->image_url) : null);
                        @endphp
                        @if($primarySrc)
                            <img src="{{ $primarySrc }}" alt="{{ $product->name }}" id="vpMainImg">
                        @else
                            <div class="vp-no-images">No image available</div>
                        @endif
                    </div>

                    @if($product->images->count() > 1)
                    <div class="vp-thumbnails">
                        @foreach($product->images as $idx => $img)
                            <div class="vp-thumb {{ $idx === 0 ? 'active' : '' }}"
                                 data-src="{{ asset('storage/' . $img->image_path) }}"
                                 onclick="vpSwitchImage(this)">
                                <img src="{{ asset('storage/' . $img->image_path) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- Product Info -->
                <div class="vp-info">
                    <div class="vp-meta-row">
                        <span class="vp-category">{{ $product->category?->name ?? 'Uncategorized' }}</span>
                        @if($product->is_latest_drop)
                            <span class="vp-badge vp-badge-new">New Drop</span>
                        @elseif($product->is_popular)
                            <span class="vp-badge vp-badge-featured">Featured</span>
                        @endif
                    </div>

                    <h1 class="vp-title">{{ $product->name }}</h1>

                    <div class="vp-price-block">
                        <span class="vp-price-current" id="vpDisplayPrice">${{ number_format($product->price, 2) }}</span>
                        @if($product->original_price && $product->original_price > $product->price)
                            <span class="vp-price-original" id="vpOriginalPrice">${{ number_format($product->original_price, 2) }}</span>
                        @endif
                        <span class="vp-discount-tag" id="vpDiscountTag" style="display:none;"></span>
                    </div>

                    <div class="vp-stock-indicator in">
                        <span class="dot"></span>
                        <span id="vpStockText">In stock · Ready to ship</span>
                    </div>

                    @if($product->description)
                    <p style="font-size:15px;line-height:1.8;color:var(--vp-muted);margin-bottom:22px;padding-bottom:22px;border-bottom:1px solid var(--vp-line);">
                        {{ $product->description }}
                    </p>
                    @endif

                    @php
                        $colors = $product->colors ?? [];
                        $sizes = $product->sizes ?? [];
                        $variations = $product->variations ?? collect();
                        $colorMap = [
                            'White' => '#ffffff', 'Black' => '#000000', 'Red' => '#ef4444',
                            'Blue' => '#3b82f6', 'Grey' => '#64748b', 'Navy' => '#1e3a5f',
                            'Beige' => '#d4b896', 'Brown' => '#8b5e3c', 'Green' => '#4ade80',
                            'Yellow' => '#facc15', 'Pink' => '#f472b6', 'Purple' => '#a855f7',
                            'Orange' => '#f97316',
                        ];
                        $variationOptions = $variations->map(function ($v) use ($product) {
                            return [
                                'id' => $v->id,
                                'color' => $v->color->name ?? null,
                                'size' => $v->size->name ?? null,
                                'stock' => $v->stock_quantity,
                                'price' => $product->price + ($v->price_adjustment ?? 0),
                            ];
                        })->values()->all();
                    @endphp

                    @if($variations->count() > 0)
                    <div class="vp-section">
                        <div class="vp-section-label">Select Options</div>

                        @if(count($colors) > 0)
                        <div class="vp-section" style="padding-bottom:14px;">
                            <div class="vp-section-label">Color: <span style="font-weight:400;color:var(--vp-muted);text-transform:none;letter-spacing:normal;" id="vpColorLabel">— select a color</span></div>
                            <div class="vp-color-options" id="vpColorOptions">
                                @foreach($colors as $colorName)
                                    @php $hex = $colorMap[$colorName] ?? '#cccccc'; @endphp
                                    <button type="button" class="vp-color-swatch"
                                        style="background:{{ $hex }};{{ $hex === '#ffffff' ? 'box-shadow:inset 0 0 0 1px rgba(0,0,0,0.15);' : '' }}"
                                        data-color="{{ $colorName }}"
                                        onclick="vpSelectColor(this, '{{ $colorName }}')">
                                    </button>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        @if(count($sizes) > 0)
                        <div class="vp-section" style="padding-bottom:14px;">
                            <div class="vp-section-label">Size: <span style="font-weight:400;color:var(--vp-muted);text-transform:none;letter-spacing:normal;" id="vpSizeLabel">— select a size</span></div>
                            <div class="vp-size-options" id="vpSizeOptions">
                                @foreach($sizes as $size)
                                    <button type="button" class="vp-size-btn" data-size="{{ $size }}" onclick="vpSelectSize(this, '{{ $size }}')">{{ $size }}</button>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <div class="vp-section" style="padding-bottom:0;">
                            <div class="vp-section-label">Available Variants</div>
                            <div class="vp-full-table-wrap">
                                <table class="vp-full-table">
                                    <thead>
                                        <tr>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                        </tr>
                                    </thead>
                                    <tbody id="vpVariationTable">
                                        @foreach($variations as $var)
                                            @php
                                                $vColor = $var->color->name ?? '';
                                                $vHex = $colorMap[$vColor] ?? '#cccccc';
                                                $inStock = $var->stock_quantity > 0;
                                                $displayPrice = $product->price + ($var->price_adjustment ?? 0);
                                            @endphp
                                            <tr class="vp-var-row"
                                                data-color="{{ $vColor }}"
                                                data-size="{{ $var->size->name ?? '' }}"
                                                data-variation-id="{{ $var->id }}"
                                                data-price="{{ $displayPrice }}"
                                                data-stock="{{ $var->stock_quantity }}">
                                                <td>
                                                    <span class="vp-color-dot" style="background:{{ $vHex }};{{ $vHex === '#ffffff' ? 'box-shadow:inset 0 0 0 1px rgba(0,0,0,0.15);' : '' }}"></span>
                                                    {{ $vColor ?: '—' }}
                                                </td>
                                                <td>{{ $var->size->name ?? '—' }}</td>
                                                <td>${{ number_format($displayPrice, 2) }}</td>
                                                <td>
                                                    <span class="{{ $inStock ? 'vp-instock' : 'vp-outstock' }}">
                                                        {{ $inStock ? 'In stock (' . $var->stock_quantity . ')' : 'Out of stock' }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if($variations->count() === 0)
                                        <tr>
                                            <td colspan="4" style="text-align:center;color:var(--vp-muted);">No active variations yet.</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Quantity -->
                    <div class="vp-quantity-row">
                        <span class="vp-quantity-label">Quantity</span>
                        <div class="vp-qty-selector">
                            <button type="button" class="vp-qty-btn" onclick="vpChangeQty(-1)">−</button>
                            <input type="number" class="vp-qty-input" id="vpQtyDisplay" value="1" min="1" max="{{ $product->stock_quantity ?? 99 }}" readonly>
                            <button type="button" class="vp-qty-btn" onclick="vpChangeQty(1)">+</button>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('cart.add', $product->id) }}" class="vp-cart-form" data-cart-form id="vpCartForm">
                        @csrf
                        <input type="hidden" name="quantity" id="vpQtyInput" value="1">
                        @if($variations->count() > 0)
                            <input type="hidden" name="variation_id" id="vpVariationId" value="">
                        @endif

                        <div class="vp-cart-actions">
                            <button type="submit" class="vp-btn-primary" id="vpAddToCartBtn" disabled>
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                Select options
                            </button>
                            <button type="button" class="vp-btn-wishlist" title="Add to Wishlist" onclick="alert('Wishlist coming soon.')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.812-.715-1.686-2.377-2.812-4.312-2.812C5.375 3.75 3.275 5.765 3.275 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                            </button>
                        </div>
                    </form>

                    <div class="vp-guarantees">
                        <span>Free Shipping</span>
                        <span>Easy Returns</span>
                        <span>Secure Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($product->long_description || $product->description)
    <section class="vp-tabs-section">
        <div class="container">
            <div class="vp-tabs-nav">
                <button class="vp-tab-btn active" onclick="vpSwitchTab(event, 'vpDesc')">Description</button>
                @if($product->long_description)
                <button class="vp-tab-btn" onclick="vpSwitchTab(event, 'vpDetails')">Details</button>
                @endif
            </div>
            <div class="vp-tab-panel active" id="vpDesc">
                <div class="vp-tab-content">
                    {{ $product->description ? '<p>' . $product->description . '</p>' : '' }}
                </div>
            </div>
            @if($product->long_description)
            <div class="vp-tab-panel" id="vpDetails">
                <div class="vp-tab-content">
                    {!! nl2br(e($product->long_description)) !!}
                </div>
            </div>
            @endif
        </div>
    </section>
    @endif

    @if($relatedProducts->count() > 0)
    <section class="vp-related-section">
        <div class="container">
            <div class="vp-related-bar">
                <div>
                    <p class="vp-related-kicker">You may also like</p>
                    <h2 class="vp-related-title">Related Products</h2>
                </div>
                <span class="vp-related-count">{{ $relatedProducts->count() }} items</span>
            </div>
            <div class="vp-related-grid">
                @foreach($relatedProducts as $rp)
                <a href="{{ route('products.show', $rp->id) }}" class="vp-related-card">
                    <div class="vp-related-card-media">
                        <img src="{{ $rp->image_url ?: asset('img/trusted/featured_collection.png') }}" alt="{{ $rp->name }}" loading="lazy">
                        @if($rp->is_latest_drop)
                            <span class="vp-related-badge gold">New Drop</span>
                        @elseif($rp->is_popular)
                            <span class="vp-related-badge">Featured</span>
                        @endif
                    </div>
                    <div class="vp-related-card-body">
                        <p class="vp-related-card-category">{{ $rp->category?->name ?? '' }}</p>
                        <h3 class="vp-related-card-title">{{ $rp->name }}</h3>
                        <div class="vp-related-card-price">
                            @if($rp->discount_price > 0 && $rp->discount_price < $rp->price)
                                <del>${{ number_format($rp->price, 2) }}</del>
                            @endif
                            ${{ number_format($rp->discount_price > 0 ? $rp->discount_price : $rp->price, 2) }}
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif
</main>

<script>
var vpColorMap = @json($colorMap);
var vpColors = @json($colors);
var vpSizes = @json($sizes);
var vpVariations = @json($variationOptions);

var vpSelectedColor = null;
var vpSelectedSize = null;

function vpSelectColor(el, colorName) {
    document.querySelectorAll('.vp-color-swatch').forEach(function(s){ s.classList.remove('active'); });
    el.classList.add('active');
    vpSelectedColor = colorName;
    document.getElementById('vpColorLabel').textContent = colorName;
    vpUpdateAddToCart();
}

function vpSelectSize(el, sizeName) {
    document.querySelectorAll('.vp-size-btn').forEach(function(s){ s.classList.remove('active'); });
    el.classList.add('active');
    vpSelectedSize = sizeName;
    document.getElementById('vpSizeLabel').textContent = sizeName;
    vpUpdateAddToCart();
}

function vpUpdateAddToCart() {
    var btn = document.getElementById('vpAddToCartBtn');
    var varIdInput = document.getElementById('vpVariationId');
    var stockText = document.getElementById('vpStockText');
    var dot = stockText.querySelector('.dot');

    if (!vpSelectedColor || !vpSelectedSize) {
        btn.disabled = true;
        btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> Select options';
        varIdInput.value = '';
        return;
    }

    var match = vpVariations.find(function(v) {
        return v.color === vpSelectedColor && v.size === vpSelectedSize;
    });

    if (!match) {
        btn.disabled = true;
        btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line></svg> Unavailable';
        varIdInput.value = '';
        stockText.textContent = 'Unavailable combination';
        stockText.className = 'vp-stock-indicator out';
        stockText.querySelector('.dot').style.background = 'currentColor';
        return;
    }

    varIdInput.value = match.id;

    if (match.stock > 0) {
        btn.disabled = false;
        btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> Add to Cart — $' + match.price.toFixed(2);
        var max = match.stock;
        var qty = document.getElementById('vpQtyInput');
        if (parseInt(qty.value, 10) > max) {
            qty.value = max;
            document.getElementById('vpQtyDisplay').value = max;
        }
        document.getElementById('vpQtyDisplay').max = max;
        stockText.textContent = 'In stock · ' + match.stock + ' available';
        stockText.className = 'vp-stock-indicator in';
        stockText.querySelector('.dot').style.background = 'currentColor';
    } else {
        btn.disabled = true;
        btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line></svg> Out of stock';
        stockText.textContent = 'Out of stock';
        stockText.className = 'vp-stock-indicator out';
        stockText.querySelector('.dot').style.background = 'currentColor';
    }
}

function vpSwitchImage(el) {
    var src = el.getAttribute('data-src');
    document.getElementById('vpMainImg').src = src;
    document.querySelectorAll('.vp-thumb').forEach(function(t) { t.classList.remove('active'); });
    el.classList.add('active');
}

function vpChangeQty(delta) {
    var input = document.getElementById('vpQtyDisplay');
    var hidden = document.getElementById('vpQtyInput');
    var val = parseInt(input.value, 10) + delta;
    var max = parseInt(input.getAttribute('max'), 10);
    if (val < 1) val = 1;
    if (max && val > max) val = max;
    input.value = val;
    hidden.value = val;
}

function vpSwitchTab(event, tabId) {
    document.querySelectorAll('.vp-tab-btn').forEach(function(b){ b.classList.remove('active'); });
    document.querySelectorAll('.vp-tab-panel').forEach(function(p){ p.classList.remove('active'); });
    event.currentTarget.classList.add('active');
    document.getElementById(tabId).classList.add('active');
}

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('[data-cart-form]').forEach(function (form) {
        form.addEventListener('submit', async function (event) {
            event.preventDefault();
            var button = form.querySelector('button[type="submit"]');
            var originalText = button.textContent;
            button.disabled = true;
            button.textContent = 'Adding...';
            try {
                var response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    },
                    body: new FormData(form)
                });
                var data = await response.json().catch(function () { return {}; });
                if (response.status === 401) {
                    window.location.href = '/login';
                    return;
                }
                if (!response.ok) {
                    alert(data.message || 'Could not add this item to your cart.');
                    return;
                }
                alert(data.message || 'Added to cart.');
            } catch (error) {
                alert('Could not add this item to your cart.');
            } finally {
                button.disabled = false;
                button.textContent = originalText;
            }
        });
    });
});
</script>

@endsection
</x-app-layout>
