<x-app-layout>
@section('hero')

<style>
:root {
    --fc-ink: #111111;
    --fc-muted: #666666;
    --fc-soft: #faf7f1;
    --fc-line: #e7dfd3;
    --fc-gold: #c9a86a;
    --fc-gold-dark: #b8964d;
    --fc-shadow: 0 24px 70px rgba(0, 0, 0, 0.12);
}

.featured-collection-page {
    background: #fffdfa;
    color: var(--fc-ink);
    font-family: 'Poppins', sans-serif;
    overflow: hidden;
}

.fc-hero {
    min-height: 620px;
    display: flex;
    align-items: center;
    position: relative;
    background:
        linear-gradient(90deg, rgba(17, 17, 17, 0.9), rgba(17, 17, 17, 0.58), rgba(17, 17, 17, 0.18)),
        url("{{ asset('img/trusted/featured_collection24.png') }}");
    background-size: cover;
    background-position: center;
    color: #ffffff;
}

.fc-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 70% 50%, rgba(201, 168, 106, 0.22), transparent 36%);
    pointer-events: none;
}

.fc-hero-inner {
    position: relative;
    z-index: 1;
}

.fc-eyebrow {
    color: var(--fc-gold);
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    margin-bottom: 18px;
}

.fc-title {
    max-width: 780px;
    font-size: clamp(44px, 7vw, 88px);
    line-height: 0.98;
    font-weight: 700;
    margin: 0;
    letter-spacing: -0.045em;
}

.fc-copy {
    max-width: 590px;
    color: rgba(255, 255, 255, 0.86);
    font-size: 17px;
    line-height: 1.9;
    margin: 28px 0 0;
}

.fc-actions {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 16px;
    margin-top: 38px;
}

.fc-discover {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 54px;
    padding: 0 34px;
    background: var(--fc-gold);
    color: var(--fc-ink);
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    text-decoration: none;
    transition: all 0.3s ease;
}

.fc-discover:hover {
    background: #ffffff;
    color: var(--fc-ink);
    transform: translateY(-3px);
}

.fc-hero-note {
    color: rgba(255, 255, 255, 0.72);
    font-size: 13px;
    letter-spacing: 0.12em;
    text-transform: uppercase;
}

.fc-section {
    padding: 92px 0;
}

.fc-section-soft {
    background: var(--fc-soft);
    border-top: 1px solid var(--fc-line);
    border-bottom: 1px solid var(--fc-line);
}

.fc-kicker {
    color: var(--fc-gold-dark);
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    margin: 0 0 14px;
}

.fc-heading {
    max-width: 760px;
    font-size: clamp(34px, 5vw, 58px);
    line-height: 1.05;
    font-weight: 700;
    letter-spacing: -0.035em;
    margin: 0;
}

.fc-muted {
    color: var(--fc-muted);
    font-size: 16px;
    line-height: 1.9;
}

.fc-editorial {
    display: grid;
    grid-template-columns: 1.05fr 0.95fr;
    gap: 54px;
    align-items: center;
}

.fc-mosaic {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
}

.fc-mosaic-img {
    width: 100%;
    height: 330px;
    object-fit: cover;
    border-radius: 10px;
    box-shadow: var(--fc-shadow);
}

.fc-mosaic-img.large {
    grid-row: span 2;
    height: 678px;
}

.fc-points {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 18px;
    margin-top: 42px;
}

.fc-point {
    padding: 26px;
    background: #ffffff;
    border: 1px solid var(--fc-line);
    border-radius: 10px;
}

.fc-point strong {
    display: block;
    font-size: 28px;
    line-height: 1;
    margin-bottom: 12px;
}

.fc-point span {
    color: var(--fc-muted);
    font-size: 14px;
    line-height: 1.7;
}

.fc-product-bar {
    display: flex;
    align-items: end;
    justify-content: space-between;
    gap: 24px;
    margin-bottom: 34px;
}

.fc-product-count {
    color: var(--fc-muted);
    font-size: 14px;
    white-space: nowrap;
}

.fc-products {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 24px;
}

.fc-card {
    background: #ffffff;
    border: 1px solid var(--fc-line);
    border-radius: 16px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
}

.fc-card:hover {
    transform: translateY(-8px);
    border-color: rgba(201, 168, 106, 0.55);
    box-shadow: var(--fc-shadow);
}

.fc-card-media {
    position: relative;
    display: block;
    aspect-ratio: 3 / 4;
    overflow: hidden;
    background: linear-gradient(180deg, #f5efe5, #ffffff);
}

.fc-card-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center top;
    display: block;
    transition: transform 0.7s cubic-bezier(.25, .46, .45, .94);
}

.fc-card:hover .fc-card-media img {
    transform: scale(1.06);
}

.fc-badge {
    position: absolute;
    top: 14px;
    left: 14px;
    display: inline-flex;
    align-items: center;
    min-height: 30px;
    padding: 0 12px;
    background: rgba(17, 17, 17, 0.86);
    color: #ffffff;
    border: 1px solid rgba(255, 255, 255, 0.24);
    border-radius: 999px;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
}

.fc-badge.gold {
    background: var(--fc-gold);
    color: var(--fc-ink);
    border-color: var(--fc-gold);
}

.fc-card-body {
    padding: 22px;
}

.fc-card-category {
    margin: 0 0 8px;
    color: var(--fc-gold-dark);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
}

.fc-card-title {
    margin: 0 0 12px;
    font-size: 18px;
    line-height: 1.35;
    font-weight: 700;
}

.fc-card-title a {
    color: var(--fc-ink);
    text-decoration: none;
}

.fc-card-title a:hover {
    color: var(--fc-gold-dark);
}

.fc-card-description {
    min-height: 72px;
    margin: 0 0 16px;
    color: var(--fc-muted);
    font-size: 14px;
    line-height: 1.75;
}

.fc-card-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 18px;
}

.fc-price {
    font-size: 18px;
    font-weight: 700;
}

.fc-price del {
    color: #9a9a9a;
    font-size: 13px;
    font-weight: 400;
    margin-right: 8px;
}

.fc-stock {
    color: #2d7a4a;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
}

.fc-stock.out {
    color: #9a5a00;
}

.fc-cart-form button {
    width: 100%;
    min-height: 46px;
    background: var(--fc-ink);
    color: #ffffff;
    border: 0;
    border-radius: 8px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    cursor: pointer;
    transition: background 0.25s ease, transform 0.25s ease;
}

.fc-cart-form button:hover {
    background: var(--fc-gold-dark);
    transform: translateY(-2px);
}

.fc-cart-form button:disabled {
    opacity: 0.65;
    cursor: wait;
}

.fc-empty {
    grid-column: 1 / -1;
    padding: 80px 24px;
    text-align: center;
    background: #ffffff;
    border: 1px solid var(--fc-line);
    border-radius: 16px;
}

.fc-pagination {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 42px;
    flex-wrap: wrap;
}

.fc-pagination a,
.fc-pagination span {
    min-width: 42px;
    height: 42px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0 12px;
    color: var(--fc-ink);
    background: #ffffff;
    border: 1px solid var(--fc-line);
    text-decoration: none;
    font-size: 13px;
    font-weight: 700;
}

.fc-pagination .active {
    background: var(--fc-ink);
    border-color: var(--fc-ink);
    color: #ffffff;
}

.fc-pagination .disabled {
    opacity: 0.45;
    pointer-events: none;
}

.fc-cta {
    display: grid;
    grid-template-columns: 1fr auto;
    align-items: center;
    gap: 28px;
    padding: 46px;
    background: #111111;
    border-radius: 20px;
    color: #ffffff;
}

.fc-cta h2 {
    margin: 0 0 10px;
    font-size: clamp(30px, 4vw, 48px);
    line-height: 1.08;
    letter-spacing: -0.03em;
}

.fc-cta p {
    margin: 0;
    color: rgba(255, 255, 255, 0.72);
    line-height: 1.8;
}

.fc-cta .fc-discover {
    background: #ffffff;
}

@media (max-width: 1180px) {
    .fc-products {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}

@media (max-width: 900px) {
    .fc-hero {
        min-height: 560px;
    }

    .fc-editorial,
    .fc-cta {
        grid-template-columns: 1fr;
    }

    .fc-product-bar {
        align-items: flex-start;
        flex-direction: column;
    }

    .fc-products {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .fc-points {
        grid-template-columns: 1fr;
    }

    .fc-mosaic-img.large {
        height: 460px;
    }
}

@media (max-width: 620px) {
    .fc-hero {
        min-height: 520px;
        padding-top: 80px;
    }

    .fc-section {
        padding: 64px 0;
    }

    .fc-mosaic {
        grid-template-columns: 1fr;
    }

    .fc-mosaic-img,
    .fc-mosaic-img.large {
        height: 420px;
        grid-row: auto;
    }

    .fc-products {
        grid-template-columns: 1fr;
    }

    .fc-card-description {
        min-height: auto;
    }

    .fc-cta {
        padding: 30px;
    }
}
</style>

<main class="featured-collection-page">
    <section class="fc-hero">
        <div class="container fc-hero-inner">
            <p class="fc-eyebrow">Curated for the season</p>
            <h1 class="fc-title">Featured Collection</h1>
            <p class="fc-copy">
                Discover standout pieces selected for confident styling, effortless movement, and timeless everyday polish.
            </p>
            <div class="fc-actions">
                <a class="fc-discover" href="#featured-products">DISCOVER NOW</a>
                <span class="fc-hero-note">New edits · Popular picks · Limited styles</span>
            </div>
        </div>
    </section>

    <section class="fc-section">
        <div class="container">
            <div class="fc-editorial">
                <div>
                    <p class="fc-kicker">The edit</p>
                    <h2 class="fc-heading">A focused collection of pieces that feel intentional from first wear.</h2>
                    <p class="fc-muted" style="margin-top: 22px;">
                        This page brings your featured and latest-drop products together in one premium shopping experience, with clear product cards, soft editorial imagery, and a direct path to purchase.
                    </p>
                    <div class="fc-points">
                        <div class="fc-point">
                            <strong>12+</strong>
                            <span>Featured products displayed with premium card styling.</span>
                        </div>
                        <div class="fc-point">
                            <strong>New</strong>
                            <span>Latest-drop products are highlighted with a gold badge.</span>
                        </div>
                        <div class="fc-point">
                            <strong>Fast</strong>
                            <span>Direct cart actions keep the shopping flow simple.</span>
                        </div>
                    </div>
                </div>

                <div class="fc-mosaic">
                    <img class="fc-mosaic-img large" src="{{ asset('img/trusted/featured_collection20.png') }}" alt="Featured collection look">
                    <img class="fc-mosaic-img" src="{{ asset('img/trusted/featured_collection15.png') }}" alt="Fashion model styling">
                    <img class="fc-mosaic-img" src="{{ asset('img/trusted/featured_collection24.png') }}" alt="Curated outfit detail">
                </div>
            </div>
        </div>
    </section>

    <section class="fc-section fc-section-soft" id="featured-products">
        <div class="container">
            <div class="fc-product-bar">
                <div>
                    <p class="fc-kicker">Shop the collection</p>
                    <h2 class="fc-heading">Featured products</h2>
                </div>
                <span class="fc-product-count">{{ $products->total() }} items</span>
            </div>

            <div class="fc-products">
                @forelse ($products as $product)
                    <article class="fc-card">
                        <a class="fc-card-media" href="{{ route('products.show', $product->id) }}">
                            <img src="{{ $product->image_url ?: asset('img/trusted/featured_collection.png') }}" alt="{{ $product->name }}">
                            @if ($product->is_latest_drop)
                                <span class="fc-badge gold">New Drop</span>
                            @elseif ($product->is_popular)
                                <span class="fc-badge">Featured</span>
                            @endif
                        </a>
                        <div class="fc-card-body">
                            <p class="fc-card-category">{{ $product->category?->name ?? 'Featured Edit' }}</p>
                            <h3 class="fc-card-title">
                                <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                            </h3>
                            <p class="fc-card-description">
                                {{ Str::limit($product->description, 92) ?: 'A curated favorite selected for this collection.' }}
                            </p>
                            <div class="fc-card-meta">
                                <div class="fc-price">
                                    @if ($product->discount_price > 0 && $product->discount_price < $product->price)
                                        <del>${{ number_format($product->price, 2) }}</del>
                                    @endif
                                    <span>${{ number_format($product->discount_price > 0 ? $product->discount_price : $product->price, 2) }}</span>
                                </div>
                                <span class="fc-stock {{ $product->stock_status === 'out_of_stock' ? 'out' : '' }}">
                                    {{ $product->stock_status === 'out_of_stock' ? 'Out of stock' : 'In stock' }}
                                </span>
                            </div>
                            <form method="POST" action="{{ route('cart.add', $product->id) }}" class="fc-cart-form" data-cart-form>
                                @csrf
                                <button type="submit" {{ $product->stock_status === 'out_of_stock' ? 'disabled' : '' }}>
                                    {{ $product->stock_status === 'out_of_stock' ? 'Sold Out' : 'Add to Cart' }}
                                </button>
                            </form>
                        </div>
                    </article>
                @empty
                    <div class="fc-empty">
                        <h3>No featured products are available yet.</h3>
                        <p class="fc-muted" style="margin: 12px auto 0; max-width: 520px;">
                            Mark products as Popular or Latest Drop in the admin panel to show them here.
                        </p>
                    </div>
                @endforelse
            </div>

            @if ($products->hasPages())
                <div class="fc-pagination">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </section>

    <section class="fc-section">
        <div class="container">
            <div class="fc-cta">
                <div>
                    <p class="fc-kicker">Keep browsing</p>
                    <h2>Explore the full catalog for more styles.</h2>
                    <p>Move from the featured edit to the complete product catalog when you are ready to compare more options.</p>
                </div>
                <a class="fc-discover" href="{{ route('view-products') }}">View All Products</a>
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
