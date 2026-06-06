<x-app-layout>
@section('hero')

<style>
    :root {
        --faq-ink: #111111;
        --faq-muted: #666666;
        --faq-soft: #faf7f1;
        --faq-line: #e7dfd3;
        --faq-gold: #c9a86a;
    }

    .faq-page {
        background: #fffdfa;
        color: var(--faq-ink);
        font-family: 'Poppins', sans-serif;
    }

    .faq-hero {
        min-height: 360px;
        display: flex;
        align-items: center;
        background:
            linear-gradient(90deg, rgba(17,17,17,.84), rgba(17,17,17,.32)),
            url("{{ asset('img/trusted/featured_collection18.png') }}");
        background-size: cover;
        background-position: center 20%;
        color: #ffffff;
    }

    .faq-eyebrow {
        display: inline-block;
        color: var(--faq-gold);
        font-size: 13px;
        font-weight: 700;
        letter-spacing: .18em;
        text-transform: uppercase;
        margin-bottom: 14px;
    }

    .faq-title {
        max-width: 760px;
        font-size: clamp(40px, 6vw, 72px);
        line-height: 1.02;
        font-weight: 700;
        margin: 0;
    }

    .faq-hero-copy {
        max-width: 580px;
        color: rgba(255,255,255,.88);
        font-size: 16px;
        line-height: 1.8;
        margin-top: 22px;
    }

    .faq-main {
        padding: 90px 0;
    }

    .faq-layout {
        display: grid;
        grid-template-columns: 320px minmax(0, 1fr);
        gap: 52px;
        align-items: start;
    }

    .faq-sidebar {
        position: sticky;
        top: 110px;
        background: var(--faq-soft);
        border: 1px solid var(--faq-line);
        border-radius: 8px;
        padding: 28px;
    }

    .faq-sidebar h2 {
        font-size: 24px;
        font-weight: 700;
        margin: 0 0 12px;
    }

    .faq-sidebar p {
        color: var(--faq-muted);
        line-height: 1.8;
        margin-bottom: 22px;
    }

    .faq-help-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 48px;
        width: 100%;
        background: #111111;
        color: #ffffff;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .14em;
        text-transform: uppercase;
        text-decoration: none;
    }

    .faq-help-link:hover {
        background: var(--faq-gold);
        color: #111111;
    }

    .faq-category {
        margin-bottom: 44px;
    }

    .faq-category:last-child {
        margin-bottom: 0;
    }

    .faq-category-title {
        display: flex;
        align-items: center;
        gap: 14px;
        font-size: 28px;
        font-weight: 700;
        margin: 0 0 18px;
    }

    .faq-category-title span {
        width: 42px;
        height: 42px;
        display: grid;
        place-items: center;
        border: 1px solid var(--faq-line);
        color: var(--faq-gold);
    }

    .faq-list {
        display: grid;
        gap: 14px;
    }

    .faq-item {
        border: 1px solid var(--faq-line);
        background: #ffffff;
        border-radius: 8px;
        overflow: hidden;
    }

    .faq-item summary {
        list-style: none;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        gap: 18px;
        padding: 22px 24px;
        font-size: 16px;
        font-weight: 700;
    }

    .faq-item summary::-webkit-details-marker {
        display: none;
    }

    .faq-item summary::after {
        content: "+";
        color: var(--faq-gold);
        font-size: 24px;
        line-height: 1;
        flex: 0 0 auto;
    }

    .faq-item[open] summary::after {
        content: "-";
    }

    .faq-answer {
        color: var(--faq-muted);
        line-height: 1.85;
        padding: 0 24px 24px;
    }

    .faq-cta {
        margin-top: 58px;
        padding: 42px;
        display: grid;
        grid-template-columns: minmax(0, 1fr) auto;
        gap: 26px;
        align-items: center;
        border-radius: 8px;
        background:
            linear-gradient(90deg, rgba(17,17,17,.9), rgba(17,17,17,.6)),
            url("{{ asset('img/trusted/featured_collection24.png') }}");
        background-size: cover;
        background-position: center 22%;
        color: #ffffff;
    }

    .faq-cta h2 {
        font-size: clamp(26px, 4vw, 40px);
        font-weight: 700;
        margin: 0 0 8px;
    }

    .faq-cta p {
        color: rgba(255,255,255,.86);
        line-height: 1.8;
        margin: 0;
    }

    .faq-cta a {
        display: inline-flex;
        align-items: center;
        min-height: 52px;
        padding: 0 30px;
        background: var(--faq-gold);
        color: #111111;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .14em;
        text-transform: uppercase;
        text-decoration: none;
        white-space: nowrap;
    }

    @media (max-width: 991px) {
        .faq-layout {
            grid-template-columns: 1fr;
        }

        .faq-sidebar {
            position: static;
        }

        .faq-cta {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 576px) {
        .faq-hero {
            min-height: 310px;
        }

        .faq-main {
            padding: 56px 0;
        }

        .faq-item summary {
            padding: 18px 18px;
        }

        .faq-answer {
            padding: 0 18px 20px;
        }

        .faq-cta {
            padding: 30px 22px;
        }
    }
</style>

<main class="faq-page">
    <section class="faq-hero">
        <div class="container">
            <span class="faq-eyebrow">Help Center</span>
            <h1 class="faq-title">Frequently Asked Questions</h1>
            <p class="faq-hero-copy">
                Find quick answers about ordering, sizing, shipping, returns, payments, and Looma customer support.
            </p>
        </div>
    </section>

    <section class="faq-main">
        <div class="container">
            <div class="faq-layout">
                <aside class="faq-sidebar">
                    <h2>Need more help?</h2>
                    <p>Our support team can help with product questions, order status, sizing, and delivery details.</p>
                    <a class="faq-help-link" href="{{ route('contact') }}">Contact Support</a>
                </aside>

                <div>
                    <section class="faq-category">
                        <h2 class="faq-category-title">
                            <span>
                                <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                            </span>
                            Orders
                        </h2>

                        <div class="faq-list">
                            <details class="faq-item" open>
                                <summary>How do I place an order?</summary>
                                <div class="faq-answer">Browse the shop, open the product you like, choose your options, and add it to your cart. From there, continue to checkout and complete your payment details.</div>
                            </details>
                            <details class="faq-item">
                                <summary>Can I change my order after checkout?</summary>
                                <div class="faq-answer">Contact us as soon as possible. If the order has not been processed yet, we will do our best to update sizing, color, address, or quantity.</div>
                            </details>
                            <details class="faq-item">
                                <summary>How can I check my order status?</summary>
                                <div class="faq-answer">You can contact support with your order number and email address. We will confirm the latest order and delivery status for you.</div>
                            </details>
                        </div>
                    </section>

                    <section class="faq-category">
                        <h2 class="faq-category-title">
                            <span>
                                <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><path d="m3.27 6.96 8.73 5.05 8.73-5.05"/><path d="M12 22.08V12"/></svg>
                            </span>
                            Shipping
                        </h2>

                        <div class="faq-list">
                            <details class="faq-item">
                                <summary>How long does delivery take?</summary>
                                <div class="faq-answer">Delivery time depends on your location and shipping method. After processing, our team will share the expected delivery window and any tracking details available.</div>
                            </details>
                            <details class="faq-item">
                                <summary>Do you offer local delivery?</summary>
                                <div class="faq-answer">Yes, local delivery may be available depending on your area. Contact support before ordering if you need confirmation for a specific location.</div>
                            </details>
                            <details class="faq-item">
                                <summary>What should I do if my package is delayed?</summary>
                                <div class="faq-answer">Send us your order number and contact details. We will check the delivery status and help with the next step.</div>
                            </details>
                        </div>
                    </section>

                    <section class="faq-category">
                        <h2 class="faq-category-title">
                            <span>
                                <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 1 0-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 0 0 0-7.78z"/></svg>
                            </span>
                            Products
                        </h2>

                        <div class="faq-list">
                            <details class="faq-item">
                                <summary>How do I choose the right size?</summary>
                                <div class="faq-answer">Check the product description and model images. If you are between sizes or unsure about fit, send us your measurements and we can help recommend a size.</div>
                            </details>
                            <details class="faq-item">
                                <summary>Are product colors exactly like the photos?</summary>
                                <div class="faq-answer">We try to show colors clearly, but screen settings and lighting can make colors look slightly different. Product photos are intended to be as close as possible.</div>
                            </details>
                            <details class="faq-item">
                                <summary>Will sold-out items come back?</summary>
                                <div class="faq-answer">Some popular pieces may return depending on availability. Contact us with the item name and we can check restock plans.</div>
                            </details>
                        </div>
                    </section>

                    <section class="faq-category">
                        <h2 class="faq-category-title">
                            <span>
                                <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="5" width="20" height="14" rx="2"/><path d="M2 10h20"/></svg>
                            </span>
                            Payments & Returns
                        </h2>

                        <div class="faq-list">
                            <details class="faq-item">
                                <summary>Is checkout secure?</summary>
                                <div class="faq-answer">Yes. The store is designed for secure checkout, and payment details should be handled through the configured payment provider.</div>
                            </details>
                            <details class="faq-item">
                                <summary>Can I return an item?</summary>
                                <div class="faq-answer">Return availability depends on item condition, timing, and order details. Contact support with your order number and we will review your request.</div>
                            </details>
                            <details class="faq-item">
                                <summary>What if I receive the wrong item?</summary>
                                <div class="faq-answer">Please contact us quickly with your order number and photos of the item received. We will help resolve the issue.</div>
                            </details>
                        </div>
                    </section>

                    <div class="faq-cta">
                        <div>
                            <h2>Still have a question?</h2>
                            <p>Send us a message and our team will help you choose, order, or track your Looma pieces.</p>
                        </div>
                        <a href="{{ route('contact') }}">Ask Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
</x-app-layout>
