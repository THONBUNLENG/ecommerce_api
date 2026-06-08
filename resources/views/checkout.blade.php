<x-app-layout>
@section('hero')

<style>
    .checkout-page {
        background: #fffdfa;
        min-height: 80vh;
        padding: 100px 0;
        font-family: 'Inter', sans-serif;
    }

    .checkout-heading {
        font-family: 'Playfair Display', serif;
        font-size: 48px;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 8px;
        letter-spacing: -0.02em;
    }

    .checkout-subheading {
        color: var(--text-secondary);
        font-size: 16px;
        margin-bottom: 40px;
    }

    .checkout-grid {
        display: grid;
        grid-template-columns: 1fr 380px;
        gap: 40px;
    }

    .checkout-form-section {
        display: flex;
        flex-direction: column;
        gap: 32px;
    }

    .checkout-section {
        background: #ffffff;
        border-radius: 12px;
        border: 1px solid var(--border-light);
        padding: 32px;
    }

    .checkout-section-title {
        font-family: 'Playfair Display', serif;
        font-size: 22px;
        font-weight: 700;
        color: var(--primary);
        margin: 0 0 24px;
        padding-bottom: 16px;
        border-bottom: 1px solid var(--border-light);
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-label {
        font-size: 13px;
        font-weight: 600;
        color: var(--primary);
        margin-bottom: 8px;
        letter-spacing: 0.06em;
        text-transform: uppercase;
    }

    .form-input {
        padding: 14px 16px;
        border: 1.5px solid var(--border-med);
        border-radius: 6px;
        font-size: 15px;
        font-family: 'Inter', sans-serif;
        transition: var(--transition);
    }

    .form-input:focus {
        outline: none;
        border-color: var(--secondary);
        box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2);
    }

    .form-select {
        padding: 14px 16px;
        border: 1.5px solid var(--border-med);
        border-radius: 6px;
        font-size: 15px;
        font-family: 'Inter', sans-serif;
        background: #ffffff;
        cursor: pointer;
    }

    .form-textarea {
        padding: 14px 16px;
        border: 1.5px solid var(--border-med);
        border-radius: 6px;
        font-size: 15px;
        font-family: 'Inter', sans-serif;
        min-height: 100px;
        resize: vertical;
    }

    .checkout-items {
        background: #ffffff;
        border-radius: 12px;
        border: 1px solid var(--border-light);
        padding: 32px;
    }

    .checkout-item {
        display: flex;
        gap: 16px;
        padding-bottom: 16px;
        margin-bottom: 16px;
        border-bottom: 1px solid var(--border-light);
    }

    .checkout-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .checkout-item-img {
        width: 80px;
        height: 100px;
        flex-shrink: 0;
        background: linear-gradient(135deg, #f5f3f0 0%, #ede9e2 100%);
        border-radius: 6px;
        overflow: hidden;
    }

    .checkout-item-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .checkout-item-details {
        flex: 1;
    }

    .checkout-item-title {
        font-family: 'Playfair Display', serif;
        font-size: 16px;
        font-weight: 700;
        color: var(--primary);
        margin: 0 0 8px;
    }

    .checkout-item-title a {
        color: inherit;
        text-decoration: none;
    }

    .checkout-item-title a:hover {
        color: var(--secondary);
    }

    .checkout-item-meta {
        font-size: 13px;
        color: var(--text-secondary);
        margin-bottom: 8px;
    }

    .checkout-item-price {
        font-size: 16px;
        font-weight: 700;
        color: var(--primary);
    }

    .checkout-summary {
        background: #ffffff;
        border-radius: 12px;
        border: 1px solid var(--border-light);
        padding: 32px;
    }

    .checkout-summary-title {
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

    .payment-methods {
        display: flex;
        flex-direction: column;
        gap: 12px;
        margin-bottom: 24px;
    }

    .payment-method {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 16px;
        border: 1.5px solid var(--border-med);
        border-radius: 6px;
        cursor: pointer;
        transition: var(--transition);
    }

    .payment-method:hover {
        border-color: var(--secondary);
    }

    .payment-method input[type="radio"] {
        width: 18px;
        height: 18px;
    }

    .payment-method label {
        font-size: 14px;
        font-weight: 600;
        color: var(--primary);
        cursor: pointer;
        margin: 0;
    }

    .place-order-btn {
        display: block;
        width: 100%;
        padding: 18px 24px;
        background: var(--primary);
        color: #ffffff;
        font-family: 'Inter', sans-serif;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        border: 1.5px solid var(--primary);
        border-radius: 6px;
        cursor: pointer;
        text-align: center;
        transition: var(--transition);
    }

    .place-order-btn:hover {
        background: var(--secondary);
        border-color: var(--secondary);
        color: var(--primary);
        transform: translateY(-2px);
    }

    .secure-checkout {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin-top: 16px;
        font-size: 12px;
        color: var(--text-secondary);
    }

    .secure-checkout svg {
        width: 16px;
        height: 16px;
        color: var(--secondary);
    }

    .checkout-empty {
        text-align: center;
        padding: 80px 20px;
    }

    .checkout-empty-icon {
        width: 100px;
        height: 100px;
        margin: 0 auto 32px;
        opacity: 0.4;
    }

    .checkout-empty-title {
        font-family: 'Playfair Display', serif;
        font-size: 28px;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 16px;
    }

    .checkout-empty-text {
        color: var(--text-secondary);
        margin-bottom: 36px;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
    }

    @media (max-width: 1024px) {
        .checkout-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .checkout-page {
            padding: 60px 0;
        }

        .checkout-heading {
            font-size: 36px;
        }

        .checkout-section {
            padding: 24px;
        }

        .form-row {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 576px) {
        .checkout-page {
            padding: 40px 0;
        }

        .checkout-heading {
            font-size: 28px;
        }

        .checkout-section {
            padding: 20px;
        }

        .checkout-summary-title {
            font-size: 20px;
        }
    }
</style>

<div class="body-wrapper">
    <main class="checkout-page">
        <div class="container">
            <div class="text-center">
                <h1 class="checkout-heading">Checkout</h1>
                <p class="checkout-subheading">Complete your purchase securely</p>
            </div>

            @if(count($cartItems) > 0)
            <form method="POST" action="{{ route('checkout.process') }}">
                @csrf
                <div class="checkout-grid">
                    <div class="checkout-form-section">
                        <div class="checkout-section">
                            <h2 class="checkout-section-title">Billing Information</h2>
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">First Name</label>
                                    <input type="text" name="first_name" class="form-input" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-input" required>
                                </div>
                            </div>
                            <div class="form-group full-width">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-input" value="{{ auth()->user()->email ?? '' }}" required>
                            </div>
                            <div class="form-group full-width">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" name="phone" class="form-input">
                            </div>
                        </div>

                        <div class="checkout-section">
                            <h2 class="checkout-section-title">Shipping Address</h2>
                            <div class="form-group full-width">
                                <label class="form-label">Address</label>
                                <input type="text" name="address" class="form-input" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">City</label>
                                    <input type="text" name="city" class="form-input" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">State/Province</label>
                                    <input type="text" name="state" class="form-input" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Postal Code</label>
                                    <input type="text" name="postal_code" class="form-input" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select name="country" class="form-select" required>
                                        <option value="">Select Country</option>
                                        <option value="US">United States</option>
                                        <option value="CA">Canada</option>
                                        <option value="GB">United Kingdom</option>
                                        <option value="AU">Australia</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="checkout-section">
                            <h2 class="checkout-section-title">Payment Method</h2>
                            <div class="payment-methods">
                                <div class="payment-method">
                                    <input type="radio" id="credit-card" name="payment_method" value="credit_card" checked>
                                    <label for="credit-card">Credit Card</label>
                                </div>
                                <div class="payment-method">
                                    <input type="radio" id="paypal" name="payment_method" value="paypal">
                                    <label for="paypal">PayPal</label>
                                </div>
                                <div class="payment-method">
                                    <input type="radio" id="bank-transfer" name="payment_method" value="bank_transfer">
                                    <label for="bank-transfer">Bank Transfer</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group full-width">
                                    <label class="form-label">Card Number</label>
                                    <input type="text" name="card_number" class="form-input" placeholder="1234 5678 9012 3456">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Expiry Date</label>
                                    <input type="text" name="expiry" class="form-input" placeholder="MM/YY">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">CVV</label>
                                    <input type="text" name="cvv" class="form-input" placeholder="123">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="checkout-summary">
                        <h2 class="checkout-summary-title">Order Summary</h2>
                        <div class="checkout-items">
                            @foreach($cartItems as $item)
                            <div class="checkout-item">
                                <div class="checkout-item-img">
                                    <a href="{{ route('products.show', $item->product->id) }}">
                                        <img src="{{ $item->product->image_url ? asset('storage/' . $item->product->image_url) : asset('img/looma_logo.png') }}"
                                             alt="{{ $item->product->name }}">
                                    </a>
                                </div>
                                <div class="checkout-item-details">
                                    <h3 class="checkout-item-title">
                                        <a href="{{ route('products.show', $item->product->id) }}">
                                            {{ $item->product->name }}
                                        </a>
                                    </h3>
                                    <p class="checkout-item-meta">Qty: {{ $item->quantity }}</p>
                                    <div class="checkout-item-price">${{ number_format($item->product->price * $item->quantity, 2) }}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="summary-row" style="margin-top: 24px;">
                            <span class="summary-label">Subtotal</span>
                            <span class="summary-value" id="checkout-subtotal">${{ number_format($subtotal, 2) }}</span>
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
                            <span class="summary-total-value" id="checkout-total">${{ number_format($subtotal + ($subtotal * 0.08), 2) }}</span>
                        </div>

                        <button type="submit" class="place-order-btn">Place Order</button>

                        <div class="secure-checkout">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                            <span>Secure Checkout</span>
                        </div>
                    </div>
                </div>
            </form>
            @else
            <div class="checkout-empty">
                <svg class="checkout-empty-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2" stroke="#111111" stroke-width="1.5"/>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4" stroke="#111111" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

                <h2 class="checkout-empty-title">Your cart is empty</h2>
                <p class="checkout-empty-text">You need items in your cart to proceed to checkout. Add some products first!</p>
                <a href="{{ route('view-products') }}" class="cart-continue-btn">
                    Continue Shopping
                </a>
            </div>
            @endif
        </div>
    </main>
</div>

@endsection
</x-app-layout>