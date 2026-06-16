<x-app-layout>
@section('hero')

<style>
:root {
    --cl-ink: #111111;
    --cl-muted: #666666;
    --cl-soft: #faf7f1;
    --cl-line: #e7dfd3;
    --cl-gold: #c9a86a;
    --cl-gold-dark: #b8964d;
    --cl-shadow: 0 20px 55px rgba(0, 0, 0, 0.10);
}

.category-left-page {
    background: #fffdfa;
    color: var(--cl-ink);
    font-family: 'Poppins', sans-serif;
}

.cl-hero {
    min-height: 360px;
    display: flex;
    align-items: center;
    background:
        linear-gradient(90deg, rgba(17, 17, 17, 0.88), rgba(17, 17, 17, 0.48)),
        url("{{ asset('img/trusted/featured_collection21.png') }}");
    background-size: cover;
    background-position: center;
    color: #ffffff;
}

.cl-eyebrow {
    color: var(--cl-gold);
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    margin-bottom: 14px;
}

.cl-title {
    margin: 0;
    font-size: clamp(38px, 5vw, 64px);
    line-height: 1.02;
    font-weight: 700;
    letter-spacing: -0.04em;
}

.cl-copy {
    max-width: 620px;
    margin: 18px 0 0;
    color: rgba(255, 255, 255, 0.78);
    line-height: 1.8;
}

.cl-section {
    padding: 86px 0;
}

.cl-layout {
    display: grid;
    grid-template-columns: 290px minmax(0, 1fr);
    gap: 34px;
    align-items: start;
}

.cl-sidebar {
    position: sticky;
    top: 110px;
    background: #ffffff;
    border: 1px solid var(--cl-line);
    border-radius: 16px;
    padding: 24px;
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.05);
}

.cl-sidebar-heading {
    margin: 0 0 18px;
    font-size: 22px;
    line-height: 1.2;
    letter-spacing: -0.02em;
}

.cl-sidebar-copy {
    margin: 0 0 22px;
    color: var(--cl-muted);
    font-size: 14px;
    line-height: 1.7;
}

.cl-category-list {
    list-style: none;
    margin: 0;
    padding: 0;
    display: grid;
    gap: 8px;
}

.cl-category-list a {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding: 12px 14px;
    border-radius: 10px;
    color: var(--cl-ink);
    text-decoration: none;
    border: 1px solid transparent;
    transition: all 0.25s ease;
}

.cl-category-list a:hover,
.cl-category-list a.active {
    border-color: rgba(201, 168, 106, 0.55);
    background: rgba(201, 168, 106, 0.10);
    color: var(--cl-gold-dark);
}

.cl-category-list span {
    color: var(--cl-muted);
    font-size: 12px;
    font-weight: 700;
}

.cl-content {
    min-width: 0;
}

.cl-toolbar {
    display: flex;
    align-items: end;
    justify-content: space-between;
    gap: 24px;
    padding: 28px;
    background: var(--cl-soft);
    border: 1px solid var(--cl-line);
    border-radius: 18px;
    margin-bottom: 28px;
}

.cl-toolbar h2 {
    margin: 0;
    font-size: clamp(30px, 4vw, 46px);
    line-height: 1.08;
    letter-spacing: -0.035em;
}

.cl-toolbar p {
    margin: 10px 0 0;
    color: var(--cl-muted);
    line-height: 1.7;
}

.cl-count {
    white-space: nowrap;
    color: var(--cl-muted);
    font-size: 14px;
}

.cl-products {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 24px;
}

.cl-card {
    background: #ffffff;
    border: 1px solid var(--cl-line);
    border-radius: 16px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
}

.cl-card:hover {
    transform: translateY(-6px);
    border-color: rgba(201, 168, 106, 0.55);
    box-shadow: var(--cl-shadow);
}

.cl-card-media {
    display: block;
    position: relative;
    overflow: hidden;
    aspect-ratio: 3 / 4;
    background: linear-gradient(180deg, #f4eee5, #ffffff);
}

.cl-card-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center top;
    display: block;
    transition: transform 0.7s cubic-bezier(.25, .46, .45, .94);
}

.cl-card:hover .cl-card-media img {
    transform: scale(1.06);
}

.cl-badge {
    position: absolute;
    top: 14px;
    left: 14px;
    display: inline-flex;
    align-items: center;
    min-height: 30px;
    padding: 0 12px;
    border-radius: 999px;
    background: rgba(17, 17, 17, 0.86);
    color: #ffffff;
    border: 1px solid rgba(255, 255, 255, 0.24);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
}

.cl-badge.gold {
    background: var(--cl-gold);
    border-color: var(--cl-gold);
    color: var(--cl-ink);
}

.cl-card-body {
    padding: 20px;
}

.cl-card-category {
    margin: 0 0 8px;
    color: var(--cl-gold-dark);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
}

.cl-card-title {
    margin: 0 0 10px;
    font-size: 18px;
    line-height: 1.35;
    font-weight: 700;
}

.cl-card-title a {
    color: var(--cl-ink);
    text-decoration: none;
}

.cl-card-title a:hover {
    color: var(--cl-gold-dark);
}

.cl-card-description {
    min-height: 66px;
    margin: 0 0 16px;
    color: var(--cl-muted);
    font-size: 14px;
    line-height: 1.7;
}

.cl-card-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 16px;
}

.cl-price {
    font-size: 18px;
    font-weight: 700;
}

.cl-price del {
    color: #9a9a9a;
    font-size: 13px;
    font-weight: 400;
    margin-right: 8px;
}

.cl-stock {
    color: #2d7a4a;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
}

.cl-stock.out {
    color: #9a5a00;
}

.cl-cart-form button {
    width: 100%;
    min-height: 44px;
    border: 0;
    border-radius: 8px;
    background: var(--cl-ink);
    color: #ffffff;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    cursor: pointer;
    transition: background 0.25s ease, transform 0.25s ease;
}

.cl-cart-form button:hover {
    background: var(--cl-gold-dark);
    transform: translateY(-2px);
}

.cl-cart-form button:disabled {
    opacity: 0.65;
    cursor: wait;
}

.cl-empty {
    grid-column: 1 / -1;
    padding: 70px 24px;
    text-align: center;
    background: #ffffff;
    border: 1px solid var(--cl-line);
    border-radius: 16px;
}

.cl-pagination {
    display: flex;
    justify-content: center;
    gap: 10px;
    flex-wrap: wrap;
    margin-top: 38px;
}

.cl-pagination a,
.cl-pagination span {
    min-width: 42px;
    height: 42px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0 12px;
    background: #ffffff;
    border: 1px solid var(--cl-line);
    color: var(--cl-ink);
    text-decoration: none;
    font-size: 13px;
    font-weight: 700;
}

.cl-pagination .active {
    background: var(--cl-ink);
    border-color: var(--cl-ink);
    color: #ffffff;
}

.cl-pagination .disabled {
    opacity: 0.45;
    pointer-events: none;
}

@media (max-width: 1100px) {
    .cl-products {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 860px) {
    .cl-layout {
        grid-template-columns: 1fr;
    }

    .cl-sidebar {
        position: static;
    }

    .cl-category-list {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .cl-toolbar {
        align-items: flex-start;
        flex-direction: column;
    }
}

@media (max-width: 620px) {
    .cl-section {
        padding: 62px 0;
    }

    .cl-products {
        grid-template-columns: 1fr;
    }

    .cl-category-list {
        grid-template-columns: 1fr;
    }

    .cl-card-description {
        min-height: auto;
    }
}
</style>

<main class="category-left-page">
    <section class="cl-hero">
        <div class="container">
            <p class="cl-eyebrow">Category Pages</p>
            <h1 class="cl-title">With Left Sidebar</h1>
            <p class="cl-copy">
                A clean collection layout with category navigation on the left, product results on the right, and a shopping flow that keeps browsing focused.
            </p>
        </div>
    </section>

    <section class="cl-section">
        <div class="container">
            <div class="cl-layout">
                <aside class="cl-sidebar">
                    <h2 class="cl-sidebar-heading">Shop by Category</h2>
                    <p class="cl-sidebar-copy">Choose a category to filter the collection without leaving the page.</p>
                    <ul class="cl-category-list">
                        <li>
                            <a href="{{ route('category-pages.left-sidebar') }}" class="{{ $selectedCategory ? '' : 'active' }}">
                                <span>All Categories</span>
                                <span>{{ $products->total() }}</span>
                            </a>
                        </li>
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('category-pages.left-sidebar', ['category' => $category->id]) }}" class="{{ $selectedCategory?->id === $category->id ? 'active' : '' }}">
                                    <span>{{ $category->name }}</span>
                                    <span>{{ $category->products_count }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </aside>

                <div class="cl-content">
                    <div class="cl-toolbar">
                        <div>
                            <h2>{{ $selectedCategory ? $selectedCategory->name : 'All Categories' }}</h2>
                            <p>{{ $selectedCategory ? 'Showing products from this category.' : 'Showing the complete active product catalog.' }}</p>
                        </div>
                        <span class="cl-count">{{ $products->total() }} items</span>
                    </div>

                    <div class="cl-products">
                        @forelse ($products as $product)
                            <article class="cl-card">
                                <a class="cl-card-media" href="{{ route('products.show', $product->id) }}">
                                    <img src="{{ $product->image_url ?: asset('img/trusted/featured_collection.png') }}" alt="{{ $product->name }}">
                                    @if ($product->is_latest_drop)
                                        <span class="cl-badge gold">New Drop</span>
                                    @elseif ($product->is_popular)
                                        <span class="cl-badge">Featured</span>
                                    @endif
                                </a>
                                <div class="cl-card-body">
                                    <p class="cl-card-category">{{ $product->category?->name ?? 'Category' }}</p>
                                    <h3 class="cl-card-title">
                                        <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                    </h3>
                                    <p class="cl-card-description">
                                        {{ Str::limit($product->description, 86) ?: 'A curated product selected for this category collection.' }}
                                    </p>
                                    <div class="cl-card-meta">
                                        <div class="cl-price">
                                            @if ($product->discount_price > 0 && $product->discount_price < $product->price)
                                                <del>${{ number_format($product->price, 2) }}</del>
                                            @endif
                                            <span>${{ number_format($product->discount_price > 0 ? $product->discount_price : $product->price, 2) }}</span>
                                        </div>
                                        <span class="cl-stock {{ $product->stock_status === 'out_of_stock' ? 'out' : '' }}">
                                            {{ $product->stock_status === 'out_of_stock' ? 'Out of stock' : 'In stock' }}
                                        </span>
                                    </div>
                                    <form method="POST" action="{{ route('cart.add', $product->id) }}" class="cl-cart-form" data-cart-form>
                                        @csrf
                                        <button type="submit" {{ $product->stock_status === 'out_of_stock' ? 'disabled' : '' }}>
                                            {{ $product->stock_status === 'out_of_stock' ? 'Sold Out' : 'Add to Cart' }}
                                        </button>
                                    </form>
                                </div>
                            </article>
                        @empty
                            <div class="cl-empty">
                                <h3>No products found.</h3>
                                <p class="cl-copy" style="margin: 12px auto 0; color: var(--cl-muted); max-width: 560px;">
                                    Try another category or add active products to this catalog.
                                </p>
                            </div>
                        @endforelse
                    </div>

                    @if ($products->hasPages())
                        <div class="cl-pagination">
                            {{ $products->links() }}
                        </div>
                    @endif
                </div>
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
