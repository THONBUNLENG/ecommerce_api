<x-app-layout>
@section('hero')

<style>
    :root {
        --wishlist-primary: #111111;
        --wishlist-secondary: #c9a86a;
        --wishlist-muted: #666666;
        --wishlist-border: #e8e6e1;
    }

    .wishlist-page {
        background: #fffdfa;
        min-height: 80vh;
        padding: 100px 0;
        font-family: 'Poppins', sans-serif;
    }

    .wishlist-heading {
        font-size: 48px;
        font-weight: 700;
        color: var(--wishlist-primary);
        margin-bottom: 8px;
        letter-spacing: -0.02em;
    }

    .wishlist-subheading {
        color: var(--wishlist-muted);
        font-size: 16px;
        margin-bottom: 40px;
    }

    .wishlist-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 30px;
        margin-top: 40px;
    }

    .wishlist-card {
        background: #ffffff;
        border-radius: 12px;
        border: 1px solid var(--wishlist-border);
        overflow: hidden;
        transition: all 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .wishlist-card:hover {
        box-shadow: 0 16px 48px rgba(0, 0, 0, 0.08);
        transform: translateY(-4px);
    }

    .wishlist-card-img {
        position: relative;
        aspect-ratio: 3/4;
        background: linear-gradient(135deg, #f5f3f0 0%, #ede9e2 100%);
        overflow: hidden;
    }

    .wishlist-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .wishlist-card:hover .wishlist-card-img img {
        transform: scale(1.08);
    }

    .wishlist-remove {
        position: absolute;
        top: 12px;
        right: 12px;
        background: rgba(255, 255, 255, 0.9);
        border: 1px solid var(--wishlist-border);
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .wishlist-remove:hover {
        background: var(--wishlist-secondary);
        border-color: var(--wishlist-secondary);
    }

    .wishlist-remove svg {
        width: 18px;
        height: 18px;
    }

    .wishlist-card-body {
        padding: 24px;
    }

    .wishlist-product-title {
        font-size: 18px;
        font-weight: 600;
        color: var(--wishlist-primary);
        margin: 0 0 12px;
        line-height: 1.3;
    }

    .wishlist-product-title a {
        color: inherit;
        text-decoration: none;
    }

    .wishlist-product-title a:hover {
        color: var(--wishlist-secondary);
    }

    .wishlist-product-price {
        font-size: 20px;
        font-weight: 700;
        color: var(--wishlist-primary);
        margin-bottom: 16px;
    }

    .wishlist-product-category {
        font-size: 13px;
        color: var(--wishlist-muted);
        text-transform: uppercase;
        letter-spacing: 0.08em;
        margin-bottom: 16px;
    }

    .wishlist-actions {
        display: flex;
        gap: 12px;
    }

    .wishlist-btn {
        flex: 1;
        padding: 12px 20px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        border-radius: 4px;
        transition: all 0.3s ease;
        cursor: pointer;
        border: 1.5px solid;
    }

    .wishlist-btn-cart {
        background: var(--wishlist-primary);
        color: #ffffff;
        border-color: var(--wishlist-primary);
    }

    .wishlist-btn-cart:hover {
        background: var(--wishlist-secondary);
        border-color: var(--wishlist-secondary);
        color: var(--wishlist-primary);
    }

    .wishlist-btn-view {
        background: transparent;
        color: var(--wishlist-primary);
        border-color: var(--wishlist-border);
    }

    .wishlist-btn-view:hover {
        background: var(--wishlist-primary);
        color: #ffffff;
    }

    .wishlist-empty {
        text-align: center;
        padding: 80px 20px;
    }

    .wishlist-empty-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 24px;
        opacity: 0.3;
    }

    .wishlist-empty-title {
        font-size: 24px;
        font-weight: 600;
        color: var(--wishlist-primary);
        margin-bottom: 12px;
    }

    .wishlist-empty-text {
        color: var(--wishlist-muted);
        margin-bottom: 30px;
    }

    .wishlist-continue-btn {
        display: inline-block;
        padding: 14px 36px;
        background: var(--wishlist-secondary);
        color: var(--wishlist-primary);
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        text-decoration: none;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .wishlist-continue-btn:hover {
        background: var(--wishlist-primary);
        color: #ffffff;
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .wishlist-page {
            padding: 60px 0;
        }

        .wishlist-heading {
            font-size: 36px;
        }

        .wishlist-grid {
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 20px;
        }
    }

    @media (max-width: 576px) {
        .wishlist-page {
            padding: 40px 0;
        }

        .wishlist-heading {
            font-size: 28px;
        }

        .wishlist-card-body {
            padding: 20px;
        }
    }
</style>

<div class="body-wrapper">
    <main class="wishlist-page">
        <div class="container">
            <div class="text-center">
                <h1 class="wishlist-heading">My Wishlist</h1>
                <p class="wishlist-subheading">Items you've saved for later</p>
            </div>

            <div class="wishlist-grid">
                @forelse($wishlistItems ?? [] as $item)
                <div class="wishlist-card">
                    <div class="wishlist-card-img">
                        <a href="{{ route('products.show', $item->product->id ?? $item->id) }}">
                            <img src="{{ $item->product && $item->product->image_url ? asset('storage/' . $item->product->image_url) : asset('img/looma_logo.png') }}"
                                 alt="{{ $item->product->name ?? $item->name }}">
                        </a>
                        <button class="wishlist-remove"
                                data-product-id="{{ $item->product->id ?? $item->id }}"
                                aria-label="Remove from Wishlist">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                    <div class="wishlist-card-body">
                        <p class="wishlist-product-category">{{ $item->product->category->name ?? 'Fashion' }}</p>
                        <h3 class="wishlist-product-title">
                            <a href="{{ route('products.show', $item->product->id ?? $item->id) }}">
                                {{ $item->product->name ?? $item->name }}
                            </a>
                        </h3>
                        <div class="wishlist-product-price">
                            ${{ number_format($item->product->price ?? $item->price, 2) }}
                        </div>
                        <div class="wishlist-actions">
                            <button class="wishlist-btn wishlist-btn-cart"
                                    data-product-id="{{ $item->product->id ?? $item->id }}">
                                Add to Cart
                            </button>
                            <a href="{{ route('products.show', $item->product->id ?? $item->id) }}"
                               class="wishlist-btn wishlist-btn-view text-center">
                                View
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="wishlist-empty" style="grid-column: 1 / -1;">
                    <svg class="wishlist-empty-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 0 0 0-7.78z" stroke="#00234D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    <h2 class="wishlist-empty-title">Your wishlist is empty</h2>
                    <p class="wishlist-empty-text">Save items you love to your wishlist and they'll appear here.</p>
                    <a href="{{ route('view-products') }}" class="wishlist-continue-btn">
                        Continue Shopping
                    </a>
                </div>
                @endforelse
            </div>
        </div>
    </main>
</div>

<script>
    $(document).on('click', '.wishlist-remove', function() {
        var productId = $(this).data('product-id');
        $.ajax({
            url: '/wishlist/remove/' + productId,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                location.reload();
            }
        });
    });

    $(document).on('click', '.wishlist-btn-cart', function() {
        var productId = $(this).data('product-id');
        $.ajax({
            url: '/cart/add/' + productId,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $(this).text('Added!').prop('disabled', true);
            }.bind(this)
        });
    });
</script>

@endsection
</x-app-layout>