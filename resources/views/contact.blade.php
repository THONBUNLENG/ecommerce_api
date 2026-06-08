<x-app-layout>
@section('hero')

<style>
    :root {
        --contact-ink: #111111;
        --contact-muted: #666666;
        --contact-soft: #f7f4ef;
        --contact-line: #e8e1d7;
        --contact-gold: #c9a86a;
    }

    .contact-page {
        background: #fffdfa;
        color: var(--contact-ink);
        font-family: 'Poppins', sans-serif;
    }

    .contact-hero {
        min-height: 360px;
        display: flex;
        align-items: center;
        background:
            linear-gradient(90deg, rgba(17,17,17,.82), rgba(17,17,17,.34)),
            url("{{ asset('img/menu/looma.png') }}");
        background-size: cover;
        background-position: center 22%;
        color: #ffffff;
    }

    .contact-eyebrow {
        display: inline-block;
        color: var(--contact-gold);
        font-size: 13px;
        font-weight: 700;
        letter-spacing: .18em;
        text-transform: uppercase;
        margin-bottom: 14px;
    }

    .contact-title {
        max-width: 720px;
        font-size: clamp(38px, 6vw, 72px);
        line-height: 1.02;
        font-weight: 700;
        margin: 0;
    }

    .contact-copy {
        max-width: 560px;
        color: rgba(255,255,255,.88);
        font-size: 16px;
        line-height: 1.8;
        margin-top: 22px;
    }

    .contact-main {
        padding: 90px 0;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: minmax(0, .9fr) minmax(0, 1.1fr);
        gap: 56px;
        align-items: start;
    }

    .contact-info h2,
    .contact-form-wrap h2 {
        font-size: clamp(28px, 4vw, 44px);
        font-weight: 700;
        line-height: 1.15;
        margin: 0 0 18px;
    }

    .contact-info p,
    .contact-form-wrap p {
        color: var(--contact-muted);
        line-height: 1.8;
        margin-bottom: 28px;
    }

    .contact-methods {
        display: grid;
        gap: 16px;
        margin-bottom: 34px;
    }

    .contact-method {
        display: grid;
        grid-template-columns: 48px 1fr;
        gap: 16px;
        align-items: center;
        padding-bottom: 16px;
        border-bottom: 1px solid var(--contact-line);
    }

    .contact-method-icon {
        width: 48px;
        height: 48px;
        display: grid;
        place-items: center;
        border: 1px solid var(--contact-line);
        color: var(--contact-gold);
    }

    .contact-method strong {
        display: block;
        font-size: 15px;
        margin-bottom: 4px;
    }

    .contact-method a,
    .contact-method span {
        color: var(--contact-muted);
        text-decoration: none;
    }

    .contact-map {
        min-height: 260px;
        padding: 28px;
        display: flex;
        flex-direction: column;
        justify-content: end;
        background:
            linear-gradient(180deg, rgba(17,17,17,.05), rgba(17,17,17,.62)),
            url("{{ asset('img/menu/5.png') }}");
        background-size: cover;
        background-position: center 20%;
        color: #ffffff;
        border-radius: 8px;
        overflow: hidden;
    }

    .contact-map strong {
        font-size: 22px;
        margin-bottom: 6px;
    }

    .contact-map span {
        color: rgba(255,255,255,.86);
    }

    .contact-form-wrap {
        background: var(--contact-soft);
        border: 1px solid var(--contact-line);
        border-radius: 8px;
        padding: 40px;
    }

    .contact-form {
        display: grid;
        gap: 18px;
    }

    .contact-form-row {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
    }

    .contact-field label {
        display: block;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .12em;
        text-transform: uppercase;
        margin-bottom: 8px;
    }

    .contact-field input,
    .contact-field textarea,
    .contact-field select {
        width: 100%;
        border: 1px solid var(--contact-line);
        background: #ffffff;
        min-height: 52px;
        padding: 14px 16px;
        color: var(--contact-ink);
        outline: none;
        transition: border-color .2s ease, box-shadow .2s ease;
    }

    .contact-field textarea {
        min-height: 150px;
        resize: vertical;
    }

    .contact-field input:focus,
    .contact-field textarea:focus,
    .contact-field select:focus {
        border-color: var(--contact-gold);
        box-shadow: 0 0 0 4px rgba(201,168,106,.14);
    }

    .contact-submit {
        min-height: 54px;
        border: 0;
        background: #111111;
        color: #ffffff;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .14em;
        text-transform: uppercase;
        padding: 0 28px;
        transition: background .2s ease, transform .2s ease;
    }

    .contact-submit:hover {
        background: var(--contact-gold);
        color: #111111;
        transform: translateY(-2px);
    }

    @media (max-width: 991px) {
        .contact-grid {
            grid-template-columns: 1fr;
            gap: 40px;
        }
    }

    @media (max-width: 576px) {
        .contact-hero {
            min-height: 300px;
        }

        .contact-main {
            padding: 56px 0;
        }

        .contact-form-wrap {
            padding: 26px 20px;
        }

        .contact-form-row {
            grid-template-columns: 1fr;
        }
    }
</style>

<main class="contact-page">
    <section class="contact-hero">
        <div class="container">
        </div>
    </section>

    <section class="contact-main">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-info">
                    <h2>We are here to help</h2>
                    <p>
                        Reach us through the form or use the details below. For order questions, include your order number so we can help faster.
                    </p>

                    <div class="contact-methods">
                        <div class="contact-method">
                            <div class="contact-method-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.62 3.18 2 2 0 0 1 3.61 1h3a2 2 0 0 1 2 1.72c.13.96.35 1.9.66 2.81a2 2 0 0 1-.45 2.11L7.55 8.91a16 16 0 0 0 7.54 7.54l1.27-1.27a2 2 0 0 1 2.11-.45c.91.31 1.85.53 2.81.66A2 2 0 0 1 22 16.92z"/></svg>
                            </div>
                            <div>
                                <strong>Phone</strong>
                                <a href="tel:+1011820595">+1 011 820 595</a>
                            </div>
                        </div>

                        <div class="contact-method">
                            <div class="contact-method-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16v16H4z"/><path d="m22 6-10 7L2 6"/></svg>
                            </div>
                            <div>
                                <strong>Email</strong>
                                <a href="mailto:support@looma.com">support@looma.com</a>
                            </div>
                        </div>

                        <div class="contact-method">
                            <div class="contact-method-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 12-9 12S3 17 3 10a9 9 0 1 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            </div>
                            <div>
                                <strong>Visit</strong>
                                <span>Phnom Penh, Cambodia</span>
                            </div>
                        </div>
                    </div>

                    <div class="contact-map">
                        <strong>Looma Studio</strong>
                        <span>Open Monday to Saturday, 8:00 AM - 6:00 PM</span>
                    </div>
                </div>

                <div class="contact-form-wrap">
                    <h2>Send a message</h2>
                    <p>Tell us what you need. We usually reply within one business day.</p>

                    <form class="contact-form" action="mailto:support@looma.com" method="post" enctype="text/plain">
                        <div class="contact-form-row">
                            <div class="contact-field">
                                <label for="contact-name">Name</label>
                                <input id="contact-name" type="text" name="name" placeholder="Your name" required>
                            </div>
                            <div class="contact-field">
                                <label for="contact-email">Email</label>
                                <input id="contact-email" type="email" name="email" placeholder="you@example.com" required>
                            </div>
                        </div>

                        <div class="contact-form-row">
                            <div class="contact-field">
                                <label for="contact-phone">Phone</label>
                                <input id="contact-phone" type="tel" name="phone" placeholder="+855">
                            </div>
                            <div class="contact-field">
                                <label for="contact-topic">Topic</label>
                                <select id="contact-topic" name="topic">
                                    <option>Order support</option>
                                    <option>Product question</option>
                                    <option>Shipping</option>
                                    <option>Styling help</option>
                                </select>
                            </div>
                        </div>
                        <div class="contact-field">
                            <label for="contact-message">Message</label>
                            <textarea id="contact-message" name="message" placeholder="How can we help?" required></textarea>
                        </div>
                        <button class="contact-submit" type="submit">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
</x-app-layout>
