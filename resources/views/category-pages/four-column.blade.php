<x-app-layout>
@section('hero')

<style>
:root {
    --cf-ink: #111111;
    --cf-muted: #666666;
    --cf-soft: #faf7f1;
    --cf-line: #e7dfd3;
    --cf-gold: #c9a86a;
    --cf-gold-dark: #b8964d;
    --cf-shadow: 0 20px 55px rgba(0, 0, 0, 0.10);
}

.category-four-column-page {
    background: #fffdfa;
    color: var(--cf-ink);
    font-family: 'Poppins', sans-serif;
}

.cf-hero {
    min-height: 300px;
    display: flex;
    align-items: center;
    background:
        linear-gradient(90deg, rgba(17, 17, 17, 0.88), rgba(17, 17, 17, 0.48)),
        url("{{ asset('img/trusted/featured_collection19.png') }}");
    background-size: cover;
    background-position: center;
    color: #ffffff;
}

.cf-eyebrow {
    color: var(--cf-gold);
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    margin-bottom: 14px;
}

.cf-title {
    margin: 0;
    font-size: clamp(38px, 5vw, 64px);
    line-height: 1.02;
    font-weight: 700;
    letter-spacing: -0.04em;
}

.cf-copy {
    max-width: 620px;
    margin: 18px 0 0;
    color: rgba(255, 255, 255, 0.78);
    line-height: 1.8;
}

.cf-section {
    padding: 86px 0;
}

.cf-content {
    min-width: 0;
}

.cf-toolbar {
    display: flex;
    align-items: end;
    justify-content: space-between;
    gap: 24px;
    padding: 24px;
    background: var(--cf-soft);
    border: 1px solid var(--cf-line);
    border-radius: 18px;
    margin-bottom: 24px;
}

.cf-toolbar h2 {
    margin: 0;
    font-size: clamp(24px, 3vw, 36px);
    line-height: 1.08;
    letter-spacing: -0.035em;
}

.cf-toolbar p {
    margin: 8px 0 0;
    color: var(--cf-muted);
    font-size: 14px;
    line-height: 1.7;
}

.cf-count {
    white-space: nowrap;
    color: var(--cf-muted);
    font-size: 13px;
}

.cf-products {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 16px;
}

.cf-card {
    background: #ffffff;
    border: 1px solid var(--cf-line);
    border-radius: 12px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
}

.cf-card:hover {
    transform: translateY(-5px);
    border-color: rgba(201, 168, 106, 0.55);
    box-shadow: var(--cf-shadow);
}

.cf-card-media {
    display: block;
    position: relative;
    overflow: hidden;
    aspect-ratio: 3 / 4;
    background: linear-gradient(180deg, #f4eee5, #ffffff);
}

.cf-card-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center top;
    display: block;
    transition: transform 0.7s cubic-bezier(.25, .46, .45, .94);
}

.cf-card:hover .cf-card-media img {
    transform: scale(1.06);
}

.cf-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    display: inline-flex;
    align-items: center;
    min-height: 22px;
    padding: 0 8px;
    border-radius: 999px;
    background: rgba(17, 17, 17, 0.86);
    color: #ffffff;
    border: 1px solid rgba(255, 255, 255, 0.24);
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
}

.cf-badge.gold {
    background: var(--cf-gold);
    border-color: var(--cf-gold);
    color: var(--cf-ink);
}

.cf-card-body {
    padding: 14px;
}

.cf-card-category {
    margin: 0 0 6px;
    color: var(--cf-gold-dark);
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
}

.cf-card-title {
    margin: 0 0 8px;
    font-size: 15px;
    line-height: 1.35;
    font-weight: 700;
}

.cf-card-title a {
    color: var(--cf-ink);
    text-decoration: none;
}

.cf-card-title a:hover {
    color: var(--cf-gold-dark);
}

.cf-card-description {
    min-height: 48px;
    margin: 0 0 12px;
    color: var(--cf-muted);
    font-size: 12px;
    line-height: 1.6;
}

.cf-card-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    margin-bottom: 12px;
}

.cf-price {
    font-size: 15px;
    font-weight: 700;
}

.cf-price del {
    color: #9a9a9a;
    font-size: 11px;
    font-weight: 400;
    margin-right: 6px;
}

.cf-stock {
    color: #2d7a4a;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
}

.cf-stock.out {
    color: #9a5a00;
}

.cf-cart-form button {
    width: 100%;
    min-height: 36px;
    border: 0;
    border-radius: 6px;
    background: var(--cf-ink);
    color: #ffffff;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    cursor: pointer;
    transition: background 0.25s ease, transform 0.25s ease;
}

.cf-cart-form button:hover {
    background: var(--cf-gold-dark);
    transform: translateY(-2px);
}

.cf-cart-form button:disabled {
    opacity: 0.65;
    cursor: wait;
}

.cf-empty {
    grid-column: 1 / -1;
    padding: 50px 20px;
    text-align: center;
    background: #ffffff;
    border: 1px solid var(--cf-line);
    border-radius: 12px;
}

.cf-pagination {
    display: flex;
    justify-content: center;
    gap: 8px;
    flex-wrap: wrap;
    margin-top: 36px;
}

.cf-pagination a,
.cf-pagination span {
    min-width: 38px;
    height: 38px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0 10px;
    background: #ffffff;
    border: 1px solid var(--cf-line);
    color: var(--cf-ink);
    text-decoration: none;
    font-size: 12px;
    font-weight: 700;
    border-radius: 8px;
}

.cf-pagination .active {
    background: var(--cf-ink);
    border-color: var(--cf-ink);
    color: #ffffff;
}

.cf-pagination .disabled {
    opacity: 0.45;
    pointer-events: none;
}

@media (max-width: 1200px) {
    .cf-products {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}

@media (max-width: 992px) {
    .cf-products {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 640px) {
    .cf-section {
        padding: 60px 0;
    }

    .cf-products {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
    }

    .cf-hero {
        min-height: 240px;
    }

    .cf-toolbar {
        flex-direction: column;
        align-items: flex-start;
    }
}
</style>

<main class="category-four-column-page">
    <section class="cf-hero">
        <div class="container">
            <p class="cf-eyebrow">Category Pages</p>
            <h1 class="cf-title">4 Column Layout</h1>
            <p class="cf-copy">
                A compact, high-density grid that maximizes product visibility and is ideal for browsing extensive catalogs with quick scanning.
            </p>
        </div>
    </section>

    <section class="cf-section">
        <div class="container">
            <div class="cf-content">
                <div class="cf-toolbar">
                    <div>
                        <h2>{{ $selectedCategory ? $selectedCategory->name : 'All Categories' }}</h2>
                        <p>{{ $selectedCategory ? 'Showing products from this category.' : 'Showing the complete active product catalog.' }}</p>
                    </div>
                    <span class="cf-count">{{ $products->total() }} items</span>
                </div>

                <div class="cf-products">
                    @forelse ($products as $product)
                        <article class="cf-card">
                            <a class="cf-card-media" href="{{ route('products.show', $product->id) }}">
                                <img src="{{ $product->image_url ?: asset('img/trusted/featured_collection.png') }}" alt="{{ $product->name }}">
                                @if ($product->is_latest_drop)
                                    <span class="cf-badge gold">New Drop</span>
                                @elseif ($product->is_popular)
                                    <span class="cf-badge">Featured</span>
                                @endif
                            </a>
                            <div class="cf-card-body">
                                <p class="cf-card-category">{{ $product->category?->name ?? 'Category' }}</p>
                                <h3 class="cf-card-title">
                                    <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                </h3>
                                <p class="cf-card-description">
                                    {{ Str::limit($product->description, 60) ?: 'A curated product selected for this category collection.' }}
                                </p>
                                <div class="cf-card-meta">
                                    <div class="cf-price">
                                        @if ($product->discount_price > 0 && $product->discount_price < $product->price)
                                            <del>${{ number_format($product->price, 2) }}</del>
                                        @endif
                                        <span>${{ number_format($product->discount_price > 0 ? $product->discount_price : $product->price, 2) }}</span>
                                    </div>
                                    <span class="cf-stock {{ $product->stock_status === 'out_of_stock' ? 'out' : '' }}">
                                        {{ $product->stock_status === 'out_of_stock' ? 'Out' : 'In' }}
                                    </span>
                                </div>
                                <form method="POST" action="{{ route('cart.add', $product->id) }}" class="cf-cart-form" data-cart-form>
                                    @csrf
                                    <button type="submit" {{ $product->stock_status === 'out_of_stock' ? 'disabled' : '' }}>
                                        {{ $product->stock_status === 'out_of_stock' ? 'Sold Out' : 'Add to Cart' }}
                                    </button>
                                </form>
                            </div>
                        </article>
                    @empty
                        <div class="cf-empty">
                            <h3>No products found.</h3>
                            <p style="margin: 10px auto 0; color: var(--cf-muted); max-width: 480px;">
                                Try another category or add active products to this catalog.
                            </p>
                        </div>
                    @endforelse
                    </div>

                    @if ($products->hasPages())
                        <div class="cf-pagination">
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
