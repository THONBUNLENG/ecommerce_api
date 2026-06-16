<x-app-layout>
@section('hero')

<style>
:root {
    --cn-ink: #111111;
    --cn-muted: #666666;
    --cn-soft: #faf7f1;
    --cn-line: #e7dfd3;
    --cn-gold: #c9a86a;
    --cn-gold-dark: #b8964d;
    --cn-shadow: 0 20px 55px rgba(0, 0, 0, 0.10);
}

.category-no-sidebar-page {
    background: #fffdfa;
    color: var(--cn-ink);
    font-family: 'Poppins', sans-serif;
}

.cn-hero {
    min-height: 360px;
    display: flex;
    align-items: center;
    background:
        linear-gradient(90deg, rgba(17, 17, 17, 0.88), rgba(17, 17, 17, 0.48)),
        url("{{ asset('img/trusted/featured_collection23.png') }}");
    background-size: cover;
    background-position: center;
    color: #ffffff;
}

.cn-eyebrow {
    color: var(--cn-gold);
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    margin-bottom: 14px;
}

.cn-title {
    margin: 0;
    font-size: clamp(38px, 5vw, 64px);
    line-height: 1.02;
    font-weight: 700;
    letter-spacing: -0.04em;
}

.cn-copy {
    max-width: 620px;
    margin: 18px 0 0;
    color: rgba(255, 255, 255, 0.78);
    line-height: 1.8;
}

.cn-section {
    padding: 86px 0;
}

.cn-content {
    min-width: 0;
}

.cn-toolbar {
    display: flex;
    align-items: end;
    justify-content: space-between;
    gap: 24px;
    padding: 28px;
    background: var(--cn-soft);
    border: 1px solid var(--cn-line);
    border-radius: 18px;
    margin-bottom: 28px;
}

.cn-toolbar h2 {
    margin: 0;
    font-size: clamp(30px, 4vw, 46px);
    line-height: 1.08;
    letter-spacing: -0.035em;
}

.cn-toolbar p {
    margin: 10px 0 0;
    color: var(--cn-muted);
    line-height: 1.7;
}

.cn-count {
    white-space: nowrap;
    color: var(--cn-muted);
    font-size: 14px;
}

.cn-products {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 24px;
}

.cn-card {
    background: #ffffff;
    border: 1px solid var(--cn-line);
    border-radius: 16px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
}

.cn-card:hover {
    transform: translateY(-6px);
    border-color: rgba(201, 168, 106, 0.55);
    box-shadow: var(--cn-shadow);
}

.cn-card-media {
    display: block;
    position: relative;
    overflow: hidden;
    aspect-ratio: 3 / 4;
    background: linear-gradient(180deg, #f4eee5, #ffffff);
}

.cn-card-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center top;
    display: block;
    transition: transform 0.7s cubic-bezier(.25, .46, .45, .94);
}

.cn-card:hover .cn-card-media img {
    transform: scale(1.06);
}

.cn-badge {
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

.cn-badge.gold {
    background: var(--cn-gold);
    border-color: var(--cn-gold);
    color: var(--cn-ink);
}

.cn-card-body {
    padding: 20px;
}

.cn-card-category {
    margin: 0 0 8px;
    color: var(--cn-gold-dark);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
}

.cn-card-title {
    margin: 0 0 10px;
    font-size: 18px;
    line-height: 1.35;
    font-weight: 700;
}

.cn-card-title a {
    color: var(--cn-ink);
    text-decoration: none;
}

.cn-card-title a:hover {
    color: var(--cn-gold-dark);
}

.cn-card-description {
    min-height: 66px;
    margin: 0 0 16px;
    color: var(--cn-muted);
    font-size: 14px;
    line-height: 1.7;
}

.cn-card-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 16px;
}

.cn-price {
    font-size: 18px;
    font-weight: 700;
}

.cn-price del {
    color: #9a9a9a;
    font-size: 13px;
    font-weight: 400;
    margin-right: 8px;
}

.cn-stock {
    color: #2d7a4a;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
}

.cn-stock.out {
    color: #9a5a00;
}

.cn-cart-form button {
    width: 100%;
    min-height: 44px;
    border: 0;
    border-radius: 8px;
    background: var(--cn-ink);
    color: #ffffff;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    cursor: pointer;
    transition: background 0.25s ease, transform 0.25s ease;
}

.cn-cart-form button:hover {
    background: var(--cn-gold-dark);
    transform: translateY(-2px);
}

.cn-cart-form button:disabled {
    opacity: 0.65;
    cursor: wait;
}

.cn-empty {
    grid-column: 1 / -1;
    padding: 70px 24px;
    text-align: center;
    background: #ffffff;
    border: 1px solid var(--cn-line);
    border-radius: 16px;
}

.cn-pagination {
    display: flex;
    justify-content: center;
    gap: 10px;
    flex-wrap: wrap;
    margin-top: 38px;
}

.cn-pagination a,
.cn-pagination span {
    min-width: 42px;
    height: 42px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0 12px;
    background: #ffffff;
    border: 1px solid var(--cn-line);
    color: var(--cn-ink);
    text-decoration: none;
    font-size: 13px;
    font-weight: 700;
}

.cn-pagination .active {
    background: var(--cn-ink);
    border-color: var(--cn-ink);
    color: #ffffff;
}

.cn-pagination .disabled {
    opacity: 0.45;
    pointer-events: none;
}

@media (max-width: 1100px) {
    .cn-products {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 768px) {
    .cn-section {
        padding: 62px 0;
    }

    .cn-products {
        grid-template-columns: 1fr;
    }

    .cn-toolbar {
        align-items: flex-start;
        flex-direction: column;
    }

    .cn-card-description {
        min-height: auto;
    }
}
</style>

<main class="category-no-sidebar-page">
    <section class="cn-hero">
        <div class="container">
            <p class="cn-eyebrow">Category Pages</p>
            <h1 class="cn-title">Without Sidebar</h1>
            <p class="cn-copy">
                An immersive full-width collection that puts every product front and center with uninterrupted focus and elegant spacing.
            </p>
        </div>
    </section>

    <section class="cn-section">
        <div class="container">
            <div class="cn-content">
                <div class="cn-toolbar">
                    <div>
                        <h2>{{ $selectedCategory ? $selectedCategory->name : 'All Categories' }}</h2>
                        <p>{{ $selectedCategory ? 'Showing products from this category.' : 'Showing the complete active product catalog.' }}</p>
                    </div>
                    <span class="cn-count">{{ $products->total() }} items</span>
                </div>

                <div class="cn-products">
                    @forelse ($products as $product)
                        <article class="cn-card">
                            <a class="cn-card-media" href="{{ route('products.show', $product->id) }}">
                                <img src="{{ $product->image_url ?: asset('img/trusted/featured_collection.png') }}" alt="{{ $product->name }}">
                                @if ($product->is_latest_drop)
                                    <span class="cn-badge gold">New Drop</span>
                                @elseif ($product->is_popular)
                                    <span class="cn-badge">Featured</span>
                                @endif
                            </a>
                            <div class="cn-card-body">
                                <p class="cn-card-category">{{ $product->category?->name ?? 'Category' }}</p>
                                <h3 class="cn-card-title">
                                    <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                </h3>
                                <p class="cn-card-description">
                                    {{ Str::limit($product->description, 86) ?: 'A curated product selected for this category collection.' }}
                                </p>
                                <div class="cn-card-meta">
                                    <div class="cn-price">
                                        @if ($product->discount_price > 0 && $product->discount_price < $product->price)
                                            <del>${{ number_format($product->price, 2) }}</del>
                                        @endif
                                        <span>${{ number_format($product->discount_price > 0 ? $product->discount_price : $product->price, 2) }}</span>
                                    </div>
                                    <span class="cn-stock {{ $product->stock_status === 'out_of_stock' ? 'out' : '' }}">
                                        {{ $product->stock_status === 'out_of_stock' ? 'Out of stock' : 'In stock' }}
                                    </span>
                                </div>
                                <form method="POST" action="{{ route('cart.add', $product->id) }}" class="cn-cart-form" data-cart-form>
                                    @csrf
                                    <button type="submit" {{ $product->stock_status === 'out_of_stock' ? 'disabled' : '' }}>
                                        {{ $product->stock_status === 'out_of_stock' ? 'Sold Out' : 'Add to Cart' }}
                                    </button>
                                </form>
                            </div>
                        </article>
                    @empty
                        <div class="cn-empty">
                            <h3>No products found.</h3>
                            <p style="margin: 12px auto 0; color: var(--cn-muted); max-width: 560px;">
                                Try another category or add active products to this catalog.
                            </p>
                        </div>
                    @endforelse
                    </div>

                    @if ($products->hasPages())
                        <div class="cn-pagination">
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
