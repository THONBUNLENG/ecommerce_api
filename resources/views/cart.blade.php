<x-app-layout>
@section('hero')

<style>
    .cart-page {
        background: #fffdfa;
        min-height: 80vh;
        padding: 100px 0;
        font-family: 'Inter', sans-serif;
    }

    .cart-heading {
        font-family: 'Playfair Display', serif;
        font-size: 48px;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 8px;
        letter-spacing: -0.02em;
    }

    .cart-subheading {
        color: var(--text-secondary);
        font-size: 16px;
        margin-bottom: 40px;
    }

    .cart-grid {
        display: grid;
        grid-template-columns: 1fr 380px;
        gap: 40px;
    }

    .cart-items {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .cart-card {
        display: flex;
        gap: 24px;
        background: #ffffff;
        border-radius: 12px;
        border: 1px solid var(--border-light);
        padding: 24px;
        transition: all 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .cart-card:hover {
        box-shadow: 0 16px 48px rgba(0, 0, 0, 0.08);
    }

    .cart-card-img {
        width: 120px;
        height: 150px;
        flex-shrink: 0;
        background: linear-gradient(135deg, #f5f3f0 0%, #ede9e2 100%);
        border-radius: 8px;
        overflow: hidden;
    }

    .cart-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .cart-card-body {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .cart-product-title {
        font-family: 'Playfair Display', serif;
        font-size: 20px;
        font-weight: 700;
        color: var(--primary);
        margin: 0 0 12px;
        line-height: 1.3;
    }

    .cart-product-title a {
        color: inherit;
        text-decoration: none;
    }

    .cart-product-title a:hover {
        color: var(--secondary);
    }

    .cart-product-category {
        font-size: 13px;
        color: var(--text-secondary);
        text-transform: uppercase;
        letter-spacing: 0.08em;
        margin-bottom: 16px;
    }

    .cart-product-price {
        font-size: 18px;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 12px;
    }

    .cart-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: auto;
    }

    .cart-qty-control {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .cart-remove {
        color: var(--secondary);
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        transition: var(--transition);
    }

    .cart-remove:hover {
        color: var(--primary);
        text-decoration: underline;
    }

    .cart-summary {
        background: #ffffff;
        border-radius: 12px;
        border: 1px solid var(--border-light);
        padding: 32px;
    }

    .cart-summary-title {
        font-family: 'Playfair Display', serif;
        font-size: 24px;
        font-weight: 700;
        color: var(--primary);
        margin: 0 0 24px;
        padding-bottom: 16px;
        border-bottom: 1px solid var(--border-light);
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 16px;
    }

    .summary-label {
        font-size: 15px;
        color: var(--text-secondary);
    }

    .summary-value {
        font-size: 16px;
        font-weight: 600;
        color: var(--primary);
    }

    .summary-total {
        display: flex;
        justify-content: space-between;
        padding-top: 16px;
        border-top: 2px solid var(--primary);
        margin-top: 16px;
    }

    .summary-total-label {
        font-family: 'Playfair Display', serif;
        font-size: 18px;
        font-weight: 700;
        color: var(--primary);
    }

    .summary-total-value {
        font-family: 'Playfair Display', serif;
        font-size: 22px;
        font-weight: 700;
        color: var(--secondary);
    }

    .cart-btn {
        display: block;
        width: 100%;
        padding: 16px 24px;
        font-family: 'Inter', sans-serif;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        border-radius: 4px;
        text-decoration: none;
        text-align: center;
        transition: var(--transition);
        cursor: pointer;
    }

    .cart-btn-checkout {
        background: var(--primary);
        color: #ffffff;
        border: 1.5px solid var(--primary);
        margin-top: 24px;
    }

    .cart-btn-checkout:hover {
        background: var(--secondary);
        border-color: var(--secondary);
        color: var(--primary);
        transform: translateY(-2px);
    }

    .cart-btn-continue {
        background: transparent;
        color: var(--primary);
        border: 1.5px solid var(--border-med);
        margin-top: 16px;
    }

    .cart-btn-continue:hover {
        background: var(--primary);
        color: #ffffff;
    }

    .cart-continue-btn {
        display: inline-block;
        padding: 14px 36px;
        background: var(--secondary);
        color: var(--primary);
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        text-decoration: none;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .cart-continue-btn:hover {
        background: var(--primary);
        color: #ffffff;
        transform: translateY(-2px);
    }

    .cart-empty {
        text-align: center;
        padding: 80px 20px;
        grid-column: 1 / -1;
    }

    .cart-empty-icon {
        width: 100px;
        height: 100px;
        margin: 0 auto 32px;
        opacity: 0.4;
    }

    .cart-empty-title {
        font-family: 'Playfair Display', serif;
        font-size: 28px;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 16px;
    }

    .cart-empty-text {
        color: var(--text-secondary);
        margin-bottom: 36px;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
    }

    @media (max-width: 1024px) {
        .cart-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .cart-page {
            padding: 60px 0;
        }

        .cart-heading {
            font-size: 36px;
        }

        .cart-card {
            flex-direction: column;
            padding: 20px;
        }

        .cart-card-img {
            width: 100%;
            height: 120px;
        }

        .cart-summary {
            padding: 24px;
        }
    }

    @media (max-width: 576px) {
        .cart-page {
            padding: 40px 0;
        }

        .cart-heading {
            font-size: 28px;
        }

        .cart-card {
            padding: 16px;
            gap: 16px;
        }

        .cart-summary {
            padding: 20px;
        }

        .cart-summary-title {
            font-size: 20px;
        }
    }
</style>

<div class="body-wrapper">
    <main class="cart-page">
        <div class="container">
            <div class="text-center">
                <h1 class="cart-heading">Shopping Cart</h1>
                <p class="cart-subheading">Review your items before checkout</p>
            </div>

            <div class="cart-grid">
                @if(count($cartItems) > 0)
                <div class="cart-items">
                    @foreach($cartItems as $item)
                    <div class="cart-card" data-item-id="{{ $item->id }}">
                        <div class="cart-card-img">
                            <a href="{{ route('products.show', $item->product->id ?? $item->id) }}">
                                <img src="{{ $item->product && $item->product->image_url ? asset('storage/' . $item->product->image_url) : asset('img/looma_logo.png') }}"
                                     alt="{{ $item->product->name ?? $item->name }}">
                            </a>
                        </div>
                        <div class="cart-card-body">
                            <p class="cart-product-category">{{ $item->product->category->name ?? 'Fashion' }}</p>
                            <h3 class="cart-product-title">
                                <a href="{{ route('products.show', $item->product->id ?? $item->id) }}">
                                    {{ $item->product->name ?? $item->name }}
                                </a>
                            </h3>
                            <div class="cart-product-price">${{ number_format($item->product->price ?? $item->price, 2) }}</div>
                            <div class="cart-actions">
                                <div class="cart-qty-control">
                                    <button class="qty-btn qty-decrease" type="button" data-item-id="{{ $item->id }}">-</button>
                                    <input type="number" class="qty-input" value="{{ $item->quantity }}" min="1" max="99" data-item-id="{{ $item->id }}">
                                    <button class="qty-btn qty-increase" type="button" data-item-id="{{ $item->id }}">+</button>
                                </div>
                                <button class="cart-remove" data-item-id="{{ $item->id }}">Remove</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="cart-summary">
                    <h2 class="cart-summary-title">Order Summary</h2>
                    <div class="summary-row">
                        <span class="summary-label">Subtotal</span>
                        <span class="summary-value" id="cart-subtotal">${{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-label">Shipping</span>
                        <span class="summary-value">Free</span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-label">Tax (estimated)</span>
                        <span class="summary-value">${{ number_format($subtotal * 0.08, 2) }}</span>
                    </div>
                    <div class="summary-total">
                        <span class="summary-total-label">Total</span>
                        <span class="summary-total-value" id="cart-total">${{ number_format($subtotal + ($subtotal * 0.08), 2) }}</span>
                    </div>
                    <a href="{{ route('view-products') }}" class="cart-btn cart-btn-continue">Continue Shopping</a>
                    <a href="#" class="cart-btn cart-btn-checkout" onclick="window.location.href='{{ route('checkout') }}'">Proceed to Checkout</a>
                </div>
                @else
                <div class="cart-empty">
                    <svg class="cart-empty-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" stroke="#111111" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <line x1="3" y1="6" x2="21" y2="6" stroke="#111111" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16 10a4 4 0 0 1-8 0" stroke="#111111" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>

                    <h2 class="cart-empty-title">Your cart is empty</h2>
                    <p class="cart-empty-text">Looks like you haven't added anything to your cart yet. Start shopping to fill it up!</p>
                    <a href="{{ route('view-products') }}" class="cart-btn cart-continue-btn">
                        Continue Shopping
                    </a>
                </div>
                @endif
            </div>
        </div>
    </main>
</div>

<script>
    $(document).on('click', '.qty-decrease', function() {
        var itemId = $(this).data('item-id');
        var input = $(this).siblings('.qty-input');
        var newQty = parseInt(input.val()) - 1;
        if (newQty >= 1) {
            input.val(newQty);
            updateCart(itemId, newQty);
        }
    });

    $(document).on('click', '.qty-increase', function() {
        var itemId = $(this).data('item-id');
        var input = $(this).siblings('.qty-input');
        var newQty = parseInt(input.val()) + 1;
        if (newQty <= 99) {
            input.val(newQty);
            updateCart(itemId, newQty);
        }
    });

    $(document).on('change', '.qty-input', function() {
        var itemId = $(this).data('item-id');
        var newQty = parseInt($(this).val());
        if (newQty >= 1 && newQty <= 99) {
            updateCart(itemId, newQty);
        }
    });

    function updateCart(itemId, quantity) {
        $.ajax({
            url: '/cart/update/' + itemId,
            type: 'PUT',
            data: { quantity: quantity },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#cart-subtotal').text('$' + response.subtotal);
                $('#cart-total').text('$' + response.total);
            }
        });
    }

    $(document).on('click', '.cart-remove', function() {
        var itemId = $(this).data('item-id');
        $.ajax({
            url: '/cart/remove/' + itemId,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                location.reload();
            }
        });
    });

</script>

@endsection
</x-app-layout>
