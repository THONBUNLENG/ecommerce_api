<x-app-layout>
@section('hero')

<style>
:root {
    --ct-ink: #111111;
    --ct-muted: #666666;
    --ct-soft: #faf7f1;
    --ct-line: #e7dfd3;
    --ct-gold: #c9a86a;
    --ct-gold-dark: #b8964d;
    --ct-shadow: 0 20px 55px rgba(0, 0, 0, 0.10);
}

.category-three-column-page {
    background: #fffdfa;
    color: var(--ct-ink);
    font-family: 'Poppins', sans-serif;
}

.ct-hero {
    min-height: 360px;
    display: flex;
    align-items: center;
    background:
        linear-gradient(90deg, rgba(17, 17, 17, 0.88), rgba(17, 17, 17, 0.48)),
        url("{{ asset('img/trusted/featured_collection20.png') }}");
    background-size: cover;
    background-position: center;
    color: #ffffff;
}

.ct-eyebrow {
    color: var(--ct-gold);
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    margin-bottom: 14px;
}

.ct-title {
    margin: 0;
    font-size: clamp(38px, 5vw, 64px);
    line-height: 1.02;
    font-weight: 700;
    letter-spacing: -0.04em;
}

.ct-copy {
    max-width: 620px;
    margin: 18px 0 0;
    color: rgba(255, 255, 255, 0.78);
    line-height: 1.8;
}

.ct-section {
    padding: 86px 0;
}

.ct-layout {
    display: flex;
    gap: 28px;
    align-items: flex-start;
}

.ct-sidebar {
    flex: 0 0 260px;
    max-width: 260px;
    position: sticky;
    top: 110px;
    background: #ffffff;
    border: 1px solid var(--ct-line);
    border-radius: 16px;
    padding: 24px;
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.05);
}

.ct-content {
    min-width: 0;
}

.ct-sidebar-heading {
    margin: 0 0 18px;
    font-size: 20px;
    line-height: 1.2;
    letter-spacing: -0.02em;
}

.ct-sidebar-copy {
    margin: 0 0 22px;
    color: var(--ct-muted);
    font-size: 13px;
    line-height: 1.7;
}

.ct-category-list {
    list-style: none;
    margin: 0;
    padding: 0;
    display: grid;
    gap: 6px;
}

.ct-category-list a {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    padding: 10px 12px;
    border-radius: 10px;
    color: var(--ct-ink);
    text-decoration: none;
    border: 1px solid transparent;
    transition: all 0.25s ease;
    font-size: 14px;
}

.ct-category-list a:hover,
.ct-category-list a.active {
    border-color: rgba(201, 168, 106, 0.55);
    background: rgba(201, 168, 106, 0.10);
    color: var(--ct-gold-dark);
}

.ct-category-list span {
    color: var(--ct-muted);
    font-size: 11px;
    font-weight: 700;
}

.ct-content {
    min-width: 0;
}

.ct-toolbar {
    display: flex;
    align-items: end;
    justify-content: space-between;
    gap: 24px;
    padding: 24px;
    background: var(--ct-soft);
    border: 1px solid var(--ct-line);
    border-radius: 18px;
    margin-bottom: 24px;
}

.ct-toolbar h2 {
    margin: 0;
    font-size: clamp(24px, 3vw, 36px);
    line-height: 1.08;
    letter-spacing: -0.035em;
}

.ct-toolbar p {
    margin: 8px 0 0;
    color: var(--ct-muted);
    font-size: 14px;
    line-height: 1.7;
}

.ct-count {
    white-space: nowrap;
    color: var(--ct-muted);
    font-size: 13px;
}

.ct-products {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 20px;
}

.ct-card {
    background: #ffffff;
    border: 1px solid var(--ct-line);
    border-radius: 14px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
}

.ct-card:hover {
    transform: translateY(-5px);
    border-color: rgba(201, 168, 106, 0.55);
    box-shadow: var(--ct-shadow);
}

.ct-card-media {
    display: block;
    position: relative;
    overflow: hidden;
    aspect-ratio: 3 / 4;
    background: linear-gradient(180deg, #f4eee5, #ffffff);
}

.ct-card-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center top;
    display: block;
    transition: transform 0.7s cubic-bezier(.25, .46, .45, .94);
}

.ct-card:hover .ct-card-media img {
    transform: scale(1.06);
}

.ct-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    display: inline-flex;
    align-items: center;
    min-height: 26px;
    padding: 0 10px;
    border-radius: 999px;
    background: rgba(17, 17, 17, 0.86);
    color: #ffffff;
    border: 1px solid rgba(255, 255, 255, 0.24);
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
}

.ct-badge.gold {
    background: var(--ct-gold);
    border-color: var(--ct-gold);
    color: var(--ct-ink);
}

.ct-card-body {
    padding: 16px;
}

.ct-card-category {
    margin: 0 0 6px;
    color: var(--ct-gold-dark);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
}

.ct-card-title {
    margin: 0 0 8px;
    font-size: 16px;
    line-height: 1.35;
    font-weight: 700;
}

.ct-card-title a {
    color: var(--ct-ink);
    text-decoration: none;
}

.ct-card-title a:hover {
    color: var(--ct-gold-dark);
}

.ct-card-description {
    min-height: 54px;
    margin: 0 0 12px;
    color: var(--ct-muted);
    font-size: 13px;
    line-height: 1.6;
}

.ct-card-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    margin-bottom: 12px;
}

.ct-price {
    font-size: 16px;
    font-weight: 700;
}

.ct-price del {
    color: #9a9a9a;
    font-size: 12px;
    font-weight: 400;
    margin-right: 6px;
}

.ct-stock {
    color: #2d7a4a;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
}

.ct-stock.out {
    color: #9a5a00;
}

.ct-cart-form button {
    width: 100%;
    min-height: 40px;
    border: 0;
    border-radius: 8px;
    background: var(--ct-ink);
    color: #ffffff;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    cursor: pointer;
    transition: background 0.25s ease, transform 0.25s ease;
}

.ct-cart-form button:hover {
    background: var(--ct-gold-dark);
    transform: translateY(-2px);
}

.ct-cart-form button:disabled {
    opacity: 0.65;
    cursor: wait;
}

.ct-aside-block {
    background: #ffffff;
    border: 1px solid var(--ct-line);
    border-radius: 16px;
    padding: 20px;
    margin-bottom: 24px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.04);
}

.ct-aside-block h3 {
    margin: 0 0 14px;
    font-size: 16px;
    font-weight: 700;
    letter-spacing: -0.01em;
}

.ct-aside-block p {
    margin: 0;
    color: var(--ct-muted);
    font-size: 13px;
    line-height: 1.7;
}

.ct-aside-block .ct-tag-list {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.ct-aside-block .ct-tag-list li {
    margin: 0;
}

.ct-aside-block .ct-tag-list a {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 999px;
    background: var(--ct-soft);
    border: 1px solid var(--ct-line);
    color: var(--ct-ink);
    text-decoration: none;
    font-size: 12px;
    font-weight: 600;
    transition: all 0.2s ease;
}

.ct-aside-block .ct-tag-list a:hover {
    background: var(--ct-gold);
    border-color: var(--ct-gold);
    color: #ffffff;
}

.ct-empty {
    grid-column: 1 / -1;
    padding: 50px 20px;
    text-align: center;
    background: #ffffff;
    border: 1px solid var(--ct-line);
    border-radius: 14px;
}

.ct-pagination {
    display: flex;
    justify-content: center;
    gap: 8px;
    flex-wrap: wrap;
    margin-top: 36px;
}

.ct-pagination a,
.ct-pagination span {
    min-width: 38px;
    height: 38px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0 10px;
    background: #ffffff;
    border: 1px solid var(--ct-line);
    color: var(--ct-ink);
    text-decoration: none;
    font-size: 12px;
    font-weight: 700;
    border-radius: 8px;
}

.ct-pagination .active {
    background: var(--ct-ink);
    border-color: var(--ct-ink);
    color: #ffffff;
}

.ct-pagination .disabled {
    opacity: 0.45;
    pointer-events: none;
}

@media (max-width: 1200px) {
    .ct-layout {
        gap: 24px;
    }

    .ct-sidebar {
        flex: 0 0 230px;
        max-width: 230px;
    }

    .ct-products {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 1024px) {
    .ct-layout {
        flex-wrap: wrap;
        gap: 20px;
    }

    .ct-left-sidebar {
        order: -1;
    }

    .ct-right-sidebar {
        order: 2;
    }

    .ct-content {
        flex: 1 1 100%;
        max-width: 100%;
    }

    .ct-products {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .ct-toolbar {
        flex-direction: column;
        align-items: flex-start;
    }
}

@media (max-width: 640px) {
    .ct-section {
        padding: 60px 0;
    }

    .ct-layout {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .ct-sidebar {
        flex: 1 1 auto;
        max-width: 100%;
        position: static;
    }

    .ct-products {
        grid-template-columns: 1fr;
    }
}
</style>

<main class="category-three-column-page">
    <section class="ct-hero">
        <div class="container">
            <p class="ct-eyebrow">Category Pages</p>
            <h1 class="ct-title">3 Column Layout</h1>
            <p class="ct-copy">
                A balanced three-column layout with category navigation on the left, focused product browsing in the center, and helpful filters on the right for a complete shopping experience.
            </p>
        </div>
    </section>

    <section class="ct-section">
        <div class="container">
            <div class="ct-layout">
                <aside class="ct-sidebar ct-left-sidebar">
                    <h2 class="ct-sidebar-heading">Categories</h2>
                    <p class="ct-sidebar-copy">Browse products by category to find exactly what you need.</p>
                    <ul class="ct-category-list">
                        <li>
                            <a href="{{ route('category-pages.three-column') }}" class="{{ $selectedCategory ? '' : 'active' }}">
                                <span>All Categories</span>
                                <span>{{ $products->total() }}</span>
                            </a>
                        </li>
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('category-pages.three-column', ['category' => $category->id]) }}" class="{{ $selectedCategory?->id === $category->id ? 'active' : '' }}">
                                    <span>{{ $category->name }}</span>
                                    <span>{{ $category->products_count }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </aside>

                <div class="ct-content">
                    <div class="ct-toolbar">
                        <div>
                            <h2>{{ $selectedCategory ? $selectedCategory->name : 'All Categories' }}</h2>
                            <p>{{ $selectedCategory ? 'Showing products from this category.' : 'Showing the complete active product catalog.' }}</p>
                        </div>
                        <span class="ct-count">{{ $products->total() }} items</span>
                    </div>

                    <div class="ct-products">
                        @forelse ($products as $product)
                            <article class="ct-card">
                                <a class="ct-card-media" href="{{ route('products.show', $product->id) }}">
                                    <img src="{{ $product->image_url ?: asset('img/trusted/featured_collection.png') }}" alt="{{ $product->name }}">
                                    @if ($product->is_latest_drop)
                                        <span class="ct-badge gold">New Drop</span>
                                    @elseif ($product->is_popular)
                                        <span class="ct-badge">Featured</span>
                                    @endif
                                </a>
                                <div class="ct-card-body">
                                    <p class="ct-card-category">{{ $product->category?->name ?? 'Category' }}</p>
                                    <h3 class="ct-card-title">
                                        <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                    </h3>
                                    <p class="ct-card-description">
                                        {{ Str::limit($product->description, 80) ?: 'A curated product selected for this category collection.' }}
                                    </p>
                                    <div class="ct-card-meta">
                                        <div class="ct-price">
                                            @if ($product->discount_price > 0 && $product->discount_price < $product->price)
                                                <del>${{ number_format($product->price, 2) }}</del>
                                            @endif
                                            <span>${{ number_format($product->discount_price > 0 ? $product->discount_price : $product->price, 2) }}</span>
                                        </div>
                                        <span class="ct-stock {{ $product->stock_status === 'out_of_stock' ? 'out' : '' }}">
                                            {{ $product->stock_status === 'out_of_stock' ? 'Out' : 'In Stock' }}
                                        </span>
                                    </div>
                                    <form method="POST" action="{{ route('cart.add', $product->id) }}" class="ct-cart-form" data-cart-form>
                                        @csrf
                                        <button type="submit" {{ $product->stock_status === 'out_of_stock' ? 'disabled' : '' }}>
                                            {{ $product->stock_status === 'out_of_stock' ? 'Sold Out' : 'Add to Cart' }}
                                        </button>
                                    </form>
                                </div>
                            </article>
                        @empty
                            <div class="ct-empty">
                                <h3>No products found.</h3>
                                <p style="margin: 10px auto 0; color: var(--ct-muted); max-width: 480px;">
                                    Try another category or add active products to this catalog.
                                </p>
                            </div>
                        @endforelse
                    </div>

                    @if ($products->hasPages())
                        <div class="ct-pagination">
                            {{ $products->links() }}
                        </div>
                    @endif
                </div>

                <aside class="ct-sidebar ct-right-sidebar">
                    <div class="ct-aside-block">
                        <h3>Filter By</h3>
                        <p>Refine results by price, size, color, or availability.</p>
                        <ul class="ct-tag-list">
                            <li><a href="#">Under $50</a></li>
                            <li><a href="#">$50 - $100</a></li>
                            <li><a href="#">$100 - $200</a></li>
                            <li><a href="#">Over $200</a></li>
                            <li><a href="#">On Sale</a></li>
                            <li><a href="#">New Arrivals</a></li>
                        </ul>
                    </div>
                    <div class="ct-aside-block">
                        <h3>Size Guide</h3>
                        <p>XS, S, M, L, XL, XXL. Find your perfect fit with our comprehensive size chart.</p>
                    </div>
                    <div class="ct-aside-block">
                        <h3>Trending Now</h3>
                        <p>Check out our most popular items this week. Updated daily based on customer favorites.</p>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</main>

@include('layouts.partials.footer')

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('[data-cart-form]').forEach(function (form) {
        form.addEventListener('submit', async function (event) {
            event.preventDefault();

            const button = form.querySelector('button[type="submit"]');
            const originalText = button.textContent;

            button.disabled = true;
            button.textContent = 'Adding...';

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    },
                    body: new FormData(form)
                });

                const data = await response.json().catch(function () {
                    return {};
                });

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
