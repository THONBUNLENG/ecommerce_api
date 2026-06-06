<x-app-layout>
@section('hero')

<style>
    :root {
        --about-ink: #111111;
        --about-muted: #666666;
        --about-soft: #faf7f1;
        --about-line: #e7dfd3;
        --about-gold: #c9a86a;
    }

    .about-page {
        background: #fffdfa;
        color: var(--about-ink);
        font-family: 'Poppins', sans-serif;
    }

    .about-hero {
        min-height: 420px;
        display: flex;
        align-items: center;
        background:
            linear-gradient(90deg, rgba(138, 138, 138, 0.84), rgba(131, 130, 130, 0.26)),
            url("{{ asset('img/trusted/featured_collection20.png') }}");
        background-size: cover;
        background-position: center 18%;
        color: #ffffff;
    }

    .about-eyebrow {
        display: inline-block;
        color: var(--about-gold);
        font-size: 13px;
        font-weight: 700;
        letter-spacing: .18em;
        text-transform: uppercase;
        margin-bottom: 14px;
    }

    .about-title {
        max-width: 780px;
        font-size: clamp(40px, 6vw, 76px);
        line-height: 1.02;
        font-weight: 700;
        margin: 0;
        color: #ffffff;
    }

    .about-hero-copy {
        max-width: 600px;
        color: rgba(255,255,255,.88);
        font-size: 16px;
        line-height: 1.8;
        margin-top: 22px;
    }

    .about-section {
        padding: 90px 0;
    }

    .about-story {
        display: grid;
        grid-template-columns: minmax(0, 1fr) minmax(0, .9fr);
        gap: 56px;
        align-items: center;
    }

    .about-kicker {
        color: var(--about-gold);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .16em;
        text-transform: uppercase;
        margin-bottom: 12px;
    }

    .about-heading {
        font-size: clamp(30px, 4vw, 48px);
        font-weight: 700;
        line-height: 1.14;
        margin: 0 0 20px;
    }

    .about-text {
        color: var(--about-muted);
        font-size: 15px;
        line-height: 1.9;
        margin-bottom: 18px;
    }

    .about-photo-grid {
        display: grid;
        grid-template-columns: .9fr 1.1fr;
        gap: 18px;
        align-items: end;
    }

    .about-photo {
        width: 100%;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 16px 42px rgba(255, 255, 255, 0.12);
    }

    .about-photo-small {
        height: 330px;
    }

    .about-photo-large {
        height: 460px;
    }

    .about-stats {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 18px;
        margin-top: 34px;
    }

    .about-stat {
        padding: 22px;
        border: 1px solid var(--about-line);
        background: #ffffff;
        border-radius: 8px;
    }

    .about-stat strong {
        display: block;
        font-size: 30px;
        line-height: 1;
        margin-bottom: 8px;
    }

    .about-stat span {
        color: var(--about-muted);
        font-size: 13px;
    }

    .about-band {
        background: var(--about-soft);
        border-top: 1px solid var(--about-line);
        border-bottom: 1px solid var(--about-line);
    }

    .about-values {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 22px;
        margin-top: 36px;
    }

    .about-value {
        background: #ffffff;
        border: 1px solid var(--about-line);
        border-radius: 8px;
        padding: 30px;
    }

    .about-value-icon {
        width: 48px;
        height: 48px;
        display: grid;
        place-items: center;
        border: 1px solid var(--about-line);
        color: var(--about-gold);
        margin-bottom: 20px;
    }

    .about-value h3 {
        font-size: 20px;
        font-weight: 700;
        margin: 0 0 10px;
    }

    .about-value p {
        color: var(--about-muted);
        line-height: 1.8;
        margin: 0;
    }

    .about-process {
        display: grid;
        grid-template-columns: .75fr 1fr;
        gap: 54px;
        align-items: start;
    }

    .about-steps {
        display: grid;
        gap: 18px;
    }

    .about-step {
        display: grid;
        grid-template-columns: 54px 1fr;
        gap: 18px;
        padding-bottom: 20px;
        border-bottom: 1px solid var(--about-line);
    }

    .about-step-number {
        width: 54px;
        height: 54px;
        display: grid;
        place-items: center;
        border-radius: 50%;
        background: #000000;
        color: #ffffff;
        font-weight: 700;
    }

    .about-step h3 {
        font-size: 19px;
        font-weight: 700;
        margin: 0 0 8px;
    }

    .about-step p {
        color: var(--about-muted);
        line-height: 1.8;
        margin: 0;
    }

    .about-cta {
        padding: 56px;
        border-radius: 8px;
        background:
            linear-gradient(90deg, rgba(17,17,17,.9), rgba(17,17,17,.62)),
            url("{{ asset('img/trusted/featured_collection24.png') }}");
        background-size: cover;
        background-position: center 22%;
        color: #ffffff;
    }

    .about-cta h2 {
        font-size: clamp(28px, 4vw, 46px);
        font-weight: 700;
        margin: 0 0 14px;
    }

    .about-cta p {
        max-width: 600px;
        color: rgba(255,255,255,.86);
        line-height: 1.8;
        margin-bottom: 26px;
    }

    .about-button {
        display: inline-flex;
        align-items: center;
        min-height: 52px;
        padding: 0 30px;
        background: var(--about-gold);
        color: #000000;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .14em;
        text-transform: uppercase;
        text-decoration: none;
    }

    .about-button:hover {
        color: #000000;
        transform: translateY(-2px);
    }

    @media (max-width: 991px) {
        .about-story,
        .about-process {
            grid-template-columns: 1fr;
        }

        .about-values {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 576px) {
        .about-hero {
            min-height: 330px;
        }

        .about-section {
            padding: 58px 0;
        }

        .about-photo-grid,
        .about-stats {
            grid-template-columns: 1fr;
        }

        .about-photo-small,
        .about-photo-large {
            height: 360px;
        }

        .about-cta {
            padding: 34px 24px;
        }
    }
</style>

<main class="about-page">
    <section class="about-hero">
        <div class="container">
            <span class="about-eyebrow">About Looma</span>

            <p class="about-hero-copy">
                Looma brings together refined silhouettes, practical comfort, and thoughtful details for women who want fashion that feels polished without feeling complicated.
            </p>
        </div>
    </section>

    <section class="about-section">
        <div class="container">
            <div class="about-story">
                <div>
                    <div class="about-kicker">Our Story</div>
                    <h2 class="about-heading">A modern fashion house with a personal touch.</h2>
                    <p class="about-text">
                        We started Looma with a simple idea: beautiful pieces should be easy to wear, easy to style, and made to move with real life. Each collection is built around clean lines, flattering fits, and details that make an outfit feel intentional.
                    </p>
                    <p class="about-text">
                        From model selection to product presentation, our goal is to help every customer picture the piece clearly and choose with confidence.
                    </p>

                    <div class="about-stats">
                        <div class="about-stat">
                            <strong>24</strong>
                            <span>Featured model looks</span>
                        </div>
                        <div class="about-stat">
                            <strong>7</strong>
                            <span>Days customer care</span>
                        </div>
                        <div class="about-stat">
                            <strong>100%</strong>
                            <span>Secure checkout</span>
                        </div>
                    </div>
                </div>

                <div class="about-photo-grid">
                    <img class="about-photo about-photo-large" src="{{ asset('img/trusted/featured_collection15.png') }}" alt="Looma model look">
                    <img class="about-photo about-photo-large" src="{{ asset('img/trusted/featured_collection4.png') }}" alt="Looma fashion styling">
                </div>
            </div>
        </div>
    </section>

    <section class="about-section about-band">
        <div class="container">
            <div class="text-center">
                <div class="about-kicker">What We Value</div>
                <h2 class="about-heading">Style that looks good and works hard.</h2>
            </div>

            <div class="about-values">
                <div class="about-value">
                    <div class="about-value-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 1 0-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 0 0 0-7.78z"/></svg>
                    </div>
                    <h3>Flattering Fit</h3>
                    <p>Every piece is selected with shape, comfort, and confidence in mind.</p>
                </div>

                <div class="about-value">
                    <div class="about-value-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2 2 7l10 5 10-5-10-5z"/><path d="m2 17 10 5 10-5"/><path d="m2 12 10 5 10-5"/></svg>
                    </div>
                    <h3>Clear Presentation</h3>
                    <p>Model imagery and product details help customers understand each item before buying.</p>
                </div>

                <div class="about-value">
                    <div class="about-value-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a4 4 0 0 1-4 4H7l-4 4V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"/></svg>
                    </div>
                    <h3>Helpful Support</h3>
                    <p>Our team is ready to help with sizing, delivery, product questions, and styling.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="about-section">
        <div class="container">
            <div class="about-process">
                <div>
                    <div class="about-kicker">Our Approach</div>
                    <h2 class="about-heading">From selection to delivery, every detail matters.</h2>
                    <p class="about-text">
                        Looma is built for shoppers who want a calm, beautiful, and practical online fashion experience.
                    </p>
                </div>

                <div class="about-steps">
                    <div class="about-step">
                        <div class="about-step-number">01</div>
                        <div>
                            <h3>Curate</h3>
                            <p>We choose styles that balance trend, comfort, and long-term wearability.</p>
                        </div>
                    </div>
                    <div class="about-step">
                        <div class="about-step-number">02</div>
                        <div>
                            <h3>Show</h3>
                            <p>Our model gallery gives customers a better sense of fit, movement, and styling.</p>
                        </div>
                    </div>
                    <div class="about-step">
                        <div class="about-step-number">03</div>
                        <div>
                            <h3>Support</h3>
                            <p>We keep help close, from product questions to order and delivery assistance.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-section pt-0">
        <div class="container">
            <div class="about-cta">

                <p>Explore popular products and new looks selected for confident everyday dressing.</p>
                <a class="about-button" href="{{ route('view-products') }}">Shop Collection</a>
            </div>
        </div>
    </section>
</main>

@endsection
</x-app-layout>
