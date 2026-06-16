<x-app-layout>
@section('hero')

<style>
:root {
    --cr-ink: #111111;
    --cr-muted: #666666;
    --cr-soft: #faf7f1;
    --cr-line: #e7dfd3;
    --cr-gold: #c9a86a;
    --cr-gold-dark: #b8964d;
    --cr-shadow: 0 20px 55px rgba(0, 0, 0, 0.10);
}

.category-right-page {
    background: #fffdfa;
    color: var(--cr-ink);
    font-family: 'Poppins', sans-serif;
}

.cr-hero {
    min-height: 360px;
    display: flex;
    align-items: center;
    background:
        linear-gradient(90deg, rgba(17, 17, 17, 0.48), rgba(17, 17, 17, 0.88)),
        url("{{ asset('img/trusted/featured_collection22.png') }}");
    background-size: cover;
    background-position: center;
    color: #ffffff;
}

.cr-eyebrow {
    color: var(--cr-gold);
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    margin-bottom: 14px;
}

.cr-title {
    margin: 0;
    font-size: clamp(38px, 5vw, 64px);
    line-height: 1.02;
    font-weight: 700;
    letter-spacing: -0.04em;
}

.cr-copy {
    max-width: 620px;
    margin: 18px 0 0;
    color: rgba(255, 255, 255, 0.78);
    line-height: 1.8;
}

.cr-section {
    padding: 86px 0;
}

.cr-layout {
    display: grid;
    grid-template-columns: minmax(0, 1fr) 290px;
    gap: 34px;
    align-items: start;
}

.cr-content {
    min-width: 0;
}

.cr-sidebar {
    position: sticky;
    top: 110px;
    background: #ffffff;
    border: 1px solid var(--cr-line);
    border-radius: 16px;
    padding: 24px;
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.05);
}

.cr-sidebar-heading {
    margin: 0 0 18px;
    font-size: 22px;
    line-height: 1.2;
    letter-spacing: -0.02em;
}

.cr-sidebar-copy {
    margin: 0 0 22px;
    color: var(--cr-muted);
    font-size: 14px;
    line-height: 1.7;
}

.cr-category-list {
    list-style: none;
    margin: 0;
    padding: 0;
    display: grid;
    gap: 8px;
}

.cr-category-list a {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding: 12px 14px;
    border-radius: 10px;
    color: var(--cr-ink);
    text-decoration: none;
    border: 1px solid transparent;
    transition: all 0.25s ease;
}

.cr-category-list a:hover,
.cr-category-list a.active {
    border-color: rgba(201, 168, 106, 0.55);
    background: rgba(201, 168, 106, 0.10);
    color: var(--cr-gold-dark);
}

.cr-category-list span {
    color: var(--cr-muted);
    font-size: 12px;
    font-weight: 700;
}

.cr-toolbar {
    display: flex;
    align-items: end;
    justify-content: space-between;
    gap: 24px;
    padding: 28px;
    background: var(--cr-soft);
    border: 1px solid var(--cr-line);
    border-radius: 18px;
    margin-bottom: 28px;
}

.cr-toolbar h2 {
    margin: 0;
    font-size: clamp(30px, 4vw, 46px);
    line-height: 1.08;
    letter-spacing: -0.035em;
}

.cr-toolbar p {
    margin: 10px 0 0;
    color: var(--cr-muted);
    line-height: 1.7;
}

.cr-count {
    white-space: nowrap;
    color: var(--cr-muted);
    font-size: 14px;
}

.cr-products {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 24px;
}

.cr-card {
    background: #ffffff;
    border: 1px solid var(--cr-line);
    border-radius: 16px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
}

.cr-card:hover {
    transform: translateY(-6px);
    border-color: rgba(201, 168, 106, 0.55);
    box-shadow: var(--cr-shadow);
}

.cr-card-media {
    display: block;
    position: relative;
    overflow: hidden;
    aspect-ratio: 3 / 4;
    background: linear-gradient(180deg, #f4eee5, #ffffff);
}

.cr-card-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center top;
    display: block;
    transition: transform 0.7s cubic-bezier(.25, .46, .45, .94);
}

.cr-card:hover .cr-card-media img {
    transform: scale(1.06);
}

.cr-badge {
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

.cr-badge.gold {
    background: var(--cr-gold);
    border-color: var(--cr-gold);
    color: var(--cr-ink);
}

.cr-card-body {
    padding: 20px;
}

.cr-card-category {
    margin: 0 0 8px;
    color: var(--cr-gold-dark);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
}

.cr-card-title {
    margin: 0 0 10px;
    font-size: 18px;
    line-height: 1.35;
    font-weight: 700;
}

.cr-card-title a {
    color: var(--cr-ink);
    text-decoration: none;
}

.cr-card-title a:hover {
    color: var(--cr-gold-dark);
}

.cr-card-description {
    min-height: 66px;
    margin: 0 0 16px;
    color: var(--cr-muted);
    font-size: 14px;
    line-height: 1.7;
}

.cr-card-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 16px;
}

.cr-price {
    font-size: 18px;
    font-weight: 700;
}

.cr-price del {
    color: #9a9a9a;
    font-size: 13px;
    font-weight: 400;
    margin-right: 8px;
}

.cr-stock {
    color: #2d7a4a;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
}

.cr-stock.out {
    color: #9a5a00;
}

.cr-cart-form button {
    width: 100%;
    min-height: 44px;
    border: 0;
    border-radius: 8px;
    background: var(--cr-ink);
    color: #ffffff;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    cursor: pointer;
    transition: background 0.25s ease, transform 0.25s ease;
}

.cr-cart-form button:hover {
    background: var(--cr-gold-dark);
    transform: translateY(-2px);
}

.cr-cart-form button:disabled {
    opacity: 0.65;
    cursor: wait;
}

.cr-empty {
    grid-column: 1 / -1;
    padding: 70px 24px;
    text-align: center;
    background: #ffffff;
    border: 1px solid var(--cr-line);
    border-radius: 16px;
}

.cr-pagination {
    display: flex;
    justify-content: center;
    gap: 10px;
    flex-wrap: wrap;
    margin-top: 38px;
}

.cr-pagination a,
.cr-pagination span {
    min-width: 42px;
    height: 42px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0 12px;
    background: #ffffff;
    border: 1px solid var(--cr-line);
    color: var(--cr-ink);
    text-decoration: none;
    font-size: 13px;
    font-weight: 700;
}

.cr-pagination .active {
    background: var(--cr-ink);
    border-color: var(--cr-ink);
    color: #ffffff;
}

.cr-pagination .disabled {
    opacity: 0.45;
    pointer-events: none;
}

@media (max-width: 1100px) {
    .cr-products {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 860px) {
    .cr-layout {
        grid-template-columns: 1fr;
    }

    .cr-sidebar {
        position: static;
    }

    .cr-category-list {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .cr-toolbar {
        align-items: flex-start;
        flex-direction: column;
    }
}

@media (max-width: 620px) {
    .cr-section {
        padding: 62px 0;
    }

    .cr-products {
        grid-template-columns: 1fr;
    }

    .cr-category-list {
        grid-template-columns: 1fr;
    }

    .cr-card-description {
        min-height: auto;
    }
}
</style>

<main class="category-right-page">
    <section class="cr-hero">
        <div class="container">
            <p class="cr-eyebrow">Category Pages</p>
            <h1 class="cr-title">With Right Sidebar</h1>
            <p class="cr-copy">
                A product-first collection layout with category filters placed on the right for focused browsing and fast discovery.
            </p>
        </div>
    </section>

    <section class="cr-section">
        <div class="container">
            <div class="cr-layout">
                <div class="cr-content">
                    <div class="cr-toolbar">
                        <div>
                            <h2>{{ $selectedCategory ? $selectedCategory->name : 'All Categories' }}</h2>
                            <p>{{ $selectedCategory ? 'Showing products from this category.' : 'Showing the complete active product catalog.' }}</p>
                        </div>
                        <span class="cr-count">{{ $products->total() }} items</span>
                    </div>

                    <div class="cr-products">
                        @forelse ($products as $product)
                            <article class="cr-card">
                                <a class="cr-card-media" href="{{ route('products.show', $product->id) }}">
                                    <img src="{{ $product->image_url ?: asset('img/trusted/featured_collection.png') }}" alt="{{ $product->name }}">
                                    @if ($product->is_latest_drop)
                                        <span class="cr-badge gold">New Drop</span>
                                    @elseif ($product->is_popular)
                                        <span class="cr-badge">Featured</span>
                                    @endif
                                </a>
                                <div class="cr-card-body">
                                    <p class="cr-card-category">{{ $product->category?->name ?? 'Category' }}</p>
                                    <h3 class="cr-card-title">
                                        <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                    </h3>
                                    <p class="cr-card-description">
                                        {{ Str::limit($product->description, 86) ?: 'A curated product selected for this category collection.' }}
                                    </p>
                                    <div class="cr-card-meta">
                                        <div class="cr-price">
                                            @if ($product->discount_price > 0 && $product->discount_price < $product->price)
                                                <del>${{ number_format($product->price, 2) }}</del>
                                            @endif
                                            <span>${{ number_format($product->discount_price > 0 ? $product->discount_price : $product->price, 2) }}</span>
                                        </div>
                                        <span class="cr-stock {{ $product->stock_status === 'out_of_stock' ? 'out' : '' }}">
                                            {{ $product->stock_status === 'out_of_stock' ? 'Out of stock' : 'In stock' }}
                                        </span>
                                    </div>
                                    <form method="POST" action="{{ route('cart.add', $product->id) }}" class="cr-cart-form" data-cart-form>
                                        @csrf
                                        <button type="submit" {{ $product->stock_status === 'out_of_stock' ? 'disabled' : '' }}>
                                            {{ $product->stock_status === 'out_of_stock' ? 'Sold Out' : 'Add to Cart' }}
                                        </button>
                                    </form>
                                </div>
                            </article>
                        @empty
                            <div class="cr-empty">
                                <h3>No products found.</h3>
                                <p class="cr-copy" style="margin: 12px auto 0; color: var(--cr-muted); max-width: 560px;">
                                    Try another category or add active products to this catalog.
                                </p>
                            </div>
                        @endforelse
                    </div>

                    @if ($products->hasPages())
                        <div class="cr-pagination">
                            {{ $products->links() }}
                        </div>
                    @endif
                </div>

                <aside class="cr-sidebar">
                    <h2 class="cr-sidebar-heading">Shop by Category</h2>
                    <p class="cr-sidebar-copy">Choose a category to filter the collection without leaving the page.</p>
                    <ul class="cr-category-list">
                        <li>
                            <a href="{{ route('category-pages.right-sidebar') }}" class="{{ $selectedCategory ? '' : 'active' }}">
                                <span>All Categories</span>
                                <span>{{ $products->total() }}</span>
                            </a>
                        </li>
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('category-pages.right-sidebar', ['category' => $category->id]) }}" class="{{ $selectedCategory?->id === $category->id ? 'active' : '' }}">
                                    <span>{{ $category->name }}</span>
                                    <span>{{ $category->products_count }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
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
