<x-app-layout>
@section('hero')

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Inter:wght@300;400;500;600;700&display=swap');

:root {
    --primary:      #0f0f0f;
    --secondary:    #d4af37;
    --tertiary:     #c9a961;
    --light:        #fafaf8;
    --lighter:      #f5f3f0;
    --dark-accent:  #1a1a1a;
    --border-light: #e8e6e1;
    --border-med:   #d9d6d0;
    --text-primary: #1a1a1a;
    --text-secondary: #4a4a4a;
    --text-tertiary: #888888;
    --ff-display:   'Playfair Display', serif;
    --ff-body:      'Inter', sans-serif;
    --shadow-sm:    0 4px 12px rgba(0, 0, 0, 0.08);
    --shadow-md:    0 8px 24px rgba(0, 0, 0, 0.12);
    --shadow-lg:    0 16px 48px rgba(0, 0, 0, 0.15);
    --transition:   all 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

* { box-sizing: border-box; }
html { scroll-behavior: smooth; }
body {
    font-family: var(--ff-body);
    background: var(--light);
    color: var(--text-primary);
    line-height: 1.6;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

/* HERO SLIDER - Premium 2025 */
.slideshow-section {
    background: linear-gradient(135deg, #0f0f0f 0%, #1a1a1a 50%, #2a2a2a 100%);
    position: relative;
    overflow: hidden;
    border-bottom: 1px solid var(--border-light);
}

.slide-item {
    min-height: 640px !important;
    display: flex !important;
    align-items: stretch;
    position: relative;
}
.slide-img {
    height: 640px !important;
    object-fit: cover;
    object-position: center;
    filter: brightness(0.65) contrast(1.15) saturate(1.1);
    transform: scale(1.01);
}

.content-slide {
    top: 0; left: 0; right: 0; bottom: 0;
    background: linear-gradient(125deg, rgba(0,0,0,.65) 0%, rgba(212,175,55,.12) 50%, rgba(0,0,0,.3) 100%);
    backdrop-filter: blur(1px);
}
.slide-content { max-width: 580px; padding: 60px 0; }

.slide-heading.heading_72 {
    font-family: var(--ff-display) !important;
    font-size: clamp(42px, 7vw, 80px) !important;
    font-weight: 800 !important;
    line-height: 1.05 !important;
    color: #fff !important;
    letter-spacing: -0.03em !important;
    margin: 0 !important;
    text-shadow: 0 8px 32px rgba(0,0,0,.5);
    word-spacing: 100vw;
}
.slide-subheading.heading_18 {
    font-family: var(--ff-body) !important;
    font-size: 18px !important;
    font-weight: 300 !important;
    color: rgba(255,255,255,.92) !important;
    letter-spacing: 0.08em !important;
    margin-top: 24px !important;
    max-width: 440px;
    text-shadow: 0 4px 16px rgba(0,0,0,.3);
}

.slide-btn.btn-primary, a.slide-btn {
    display: inline-block !important;
    margin-top: 40px !important;
    padding: 18px 56px !important;
    background: var(--secondary) !important;
    color: var(--primary) !important;
    font-family: var(--ff-body) !important;
    font-size: 12px !important;
    font-weight: 700 !important;
    letter-spacing: 0.14em !important;
    text-transform: uppercase !important;
    text-decoration: none !important;
    border: 2px solid var(--secondary) !important;
    border-radius: 2px !important;
    transition: var(--transition) !important;
    box-shadow: 0 12px 32px rgba(212,175,55,.25) !important;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}
.slide-btn.btn-primary::before, a.slide-btn::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: rgba(255,255,255,.2);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: width 0.6s, height 0.6s;
}
.slide-btn.btn-primary:hover::before, a.slide-btn:hover::before {
    width: 300px;
    height: 300px;
}
.slide-btn.btn-primary:hover, a.slide-btn:hover {
    background: transparent !important;
    color: var(--secondary) !important;
    transform: translateY(-3px);
    box-shadow: 0 16px 48px rgba(212,175,55,.35) !important;
}

.slick-dots { bottom: 40px !important; }
.slick-dots li button::before {
    color: rgba(255,255,255,.35) !important;
    font-size: 8px !important;
    transition: var(--transition) !important;
}
.slick-dots li.slick-active button::before {
    color: var(--secondary) !important;
    box-shadow: 0 0 0 6px rgba(212,175,55,.2) !important;
    transform: scale(1.2);
}
.slick-prev, .slick-next { top: 50% !important; width: 50px !important; height: 50px !important; }
.slick-prev::before, .slick-next::before {
    color: rgba(255,255,255,.8) !important;
    font-size: 22px !important;
    transition: var(--transition) !important;
}
.slick-prev:hover::before, .slick-next:hover::before {
    color: var(--secondary) !important;
    transform: scale(1.3);
}


/* TRUSTED BADGES - Premium Glassmorphism 2025 */
.trusted-section {
    background: linear-gradient(180deg, #fafaf8 0%, rgba(212,175,55,.03) 100%);
    border: none;
    padding: 80px 0 !important;
}
.trusted-section.mt-100 { margin-top: 0 !important; }

.trusted-badge {
    display: flex !important;
    align-items: center !important;
    gap: 28px !important;
    padding: 36px 32px !important;
    background: rgba(255,255,255,.75) !important;
    backdrop-filter: blur(20px);
    border: 1px solid rgba(212,175,55,.15);
    border-radius: 12px !important;
    transition: var(--transition) !important;
    box-shadow: 0 8px 24px rgba(0,0,0,.04) !important;
}
.trusted-badge:hover {
    background: rgba(255,255,255,.95) !important;
    border-color: var(--secondary);
    transform: translateY(-6px);
    box-shadow: 0 24px 56px rgba(212,175,55,.15) !important;
}
.trusted-row > .col-lg-4:last-child .trusted-badge { border-right: none; }

.trusted-icon { flex-shrink: 0; }
.icon-trusted {
    width: 52px !important;
    height: 52px !important;
    object-fit: contain !important;
    filter: drop-shadow(0 4px 12px rgba(0,0,0,.06));
}

.trusted-heading.heading_18 {
    font-family: var(--ff-display) !important;
    font-size: 20px !important;
    font-weight: 700 !important;
    color: var(--primary) !important;
    margin: 0 0 8px !important;
    letter-spacing: -0.01em;
}
.trusted-subheading {
    font-size: 15px !important;
    color: var(--text-secondary) !important;
    margin: 0 !important;
    font-weight: 400;
    line-height: 1.5;
}

/* FEATURED COLLECTION - Premium Section 2025 */
.featured-collection {
    background: linear-gradient(180deg, #fafaf8 0%, var(--light) 100%);
    padding: 100px 0 !important;
}
.featured-collection.mt-100 { margin-top: 0 !important; }

.section-header { margin-bottom: 72px !important; padding: 0 16px; }
.section-icons {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 36px;
    justify-items: center;
    align-items: center;
    width: min(100%, 1200px);
    margin: 0 auto 56px;
    padding: 0 20px;
}
.section-header .section-icon {
    display: block;
    width: 200px;
    height: 260px;
    object-fit: cover;
    object-position: center;
    transition: var(--transition) !important;
    filter: drop-shadow(0 8px 24px rgba(0,0,0,.18));
    border-radius: 14px;
    cursor: pointer;
}
.section-header .section-icon:hover {
    transform: translateY(-16px) scale(1.14);
    filter: drop-shadow(0 28px 64px rgba(212,175,55,.4));
}

.section-heading {
    font-family: var(--ff-display) !important;
    font-size: 56px !important;
    font-weight: 800 !important;
    color: var(--primary) !important;
    letter-spacing: -0.03em !important;
    position: relative;
    display: inline-block;
    margin: 0 !important;
}
.section-heading::after {
    content: '';
    display: block;
    width: 80px; height: 4px;
    background: linear-gradient(90deg, var(--secondary), var(--tertiary), transparent);
    margin: 20px auto 0;
    border-radius: 2px;
}

/* PRODUCT CARDS - Advanced Hover Effects 2025 */
.product-card {
    border: none !important;
    background: transparent !important;
    box-shadow: none !important;
    border-radius: 0 !important;
    overflow: visible !important;
    padding: 0 !important;
    margin-bottom: 48px;
    transition: none;
}

.product-card-img {
    position: relative;
    overflow: hidden;
    aspect-ratio: 3/4;
    background: linear-gradient(135deg, #f5f3f0 0%, #ede9e2 100%);
    margin-bottom: 24px;
    transition: var(--transition) !important;
    border-radius: 8px;
}
.product-card:hover .product-card-img {
    box-shadow: 0 28px 64px rgba(0,0,0,.18);
    transform: scale(1.025) translateY(-4px);
}
.product-card-img .hover-switch {
    display: block !important;
    position: relative !important;
    width: 100% !important;
    height: 100% !important;
}
.product-card-img img,
.product-card-img .primary-img,
.product-card-img .secondary-img {
    position: absolute !important;
    inset: 0 !important;
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    object-position: center !important;
    display: block !important;
    transition: opacity 0.4s ease, transform 0.6s cubic-bezier(.25,.46,.45,.94) !important;
}
.product-card-img .primary-img {
    opacity: 1 !important;
    z-index: 2 !important;
}
.product-card-img .secondary-img {
    opacity: 0 !important;
    z-index: 1 !important;
}
.product-card-img:hover .primary-img {
    opacity: 0 !important;
}
.product-card-img:hover .secondary-img {
    opacity: 1 !important;
}
.product-card:hover .product-card-img img { transform: scale(1.12); }

.product-badge {
    position: absolute;
    top: 16px;
    left: 16px;
    display: flex;
    flex-direction: column;
    gap: 8px;
    z-index: 3;
}
.badge-label {
    font-family: var(--ff-body) !important;
    font-size: 10px !important;
    padding: 6px 14px !important;
    letter-spacing: 0.12em !important;
    text-transform: uppercase !important;
    font-weight: 700 !important;
    border-radius: 2px !important;
    backdrop-filter: blur(15px);
}
.badge-new {
    background: rgba(15, 15, 15, .88) !important;
    color: #fff !important;
    border: 1px solid rgba(255,255,255,.25);
}
.badge-percentage {
    background: rgba(212,175,55,.92) !important;
    color: var(--primary) !important;
    border: 1px solid rgba(212,175,55,.4);
}

.product-card-action {
    position: absolute !important;
    bottom: 0 !important;
    left: 0 !important;
    right: 0 !important;
    background: linear-gradient(180deg, transparent 0%, rgba(0,0,0,.85) 50%);
    padding: 28px 16px 16px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 12px !important;
    transform: translateY(100%) !important;
    transition: transform 0.35s cubic-bezier(.25,.46,.45,.94) !important;
    opacity: 1 !important;
}
.product-card:hover .product-card-action { transform: translateY(0) !important; }

.action-card {
    background: rgba(255,255,255,.12) !important;
    border: 1.5px solid rgba(255,255,255,.35) !important;
    padding: 12px !important;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 44px;
    height: 44px;
    border-radius: 6px;
    transition: var(--transition) !important;
    backdrop-filter: blur(15px);
}
.action-card:hover {
    background: var(--secondary) !important;
    border-color: var(--secondary) !important;
    transform: translateY(-3px) scale(1.1);
    box-shadow: 0 12px 32px rgba(212,175,55,.35) !important;
}
.action-card svg path { fill: #fff !important; }

.product-card-details { padding: 0 !important; }

.color-lists{
    display:flex !important;
    flex-wrap:nowrap !important;
    align-items:center !important;

    gap:10px !important;
    margin-bottom:14px !important;

    overflow-x:auto !important;
    overflow-y:hidden !important;

    white-space:nowrap;
    width:100%;

    scrollbar-width:none;
    -ms-overflow-style:none;
    -webkit-overflow-scrolling:touch;

    cursor:grab;
    user-select:none;
}

.color-lists::-webkit-scrollbar{
    display:none;
}

.color-lists.dragging{
    cursor:grabbing;
}

.color-lists li{
    flex:0 0 auto !important;
}

.color-swatch{
    width:18px !important;
    height:18px !important;
    border-radius:50% !important;
    display:block !important;
    flex-shrink:0;
}

.color-lists::-webkit-scrollbar {
    display: none;
}

.color-lists.dragging {
    cursor: grabbing;
}

.color-lists li {
    flex: 0 0 auto !important;
}

.color-swatch {
    width: 18px !important;
    height: 18px !important;
    border-radius: 50% !important;
    flex-shrink: 0;
}
.color-lists.dragging { cursor: grabbing; }
.color-lists::-webkit-scrollbar { display: none; }
.color-lists > li {
    flex: 0 0 auto !important;
    display: inline-flex !important;
    scroll-snap-align: start;
}
.color-swatch {
    width: 16px !important;
    height: 16px !important;
    border-radius: 50% !important;
    display: inline-block !important;
    border: 2.5px solid transparent !important;
    transition: var(--transition) !important;
    cursor: pointer;
    box-shadow: 0 2px 6px rgba(0,0,0,.1);
}
.color-swatch.active,
.color-swatch:hover {
    border-color: var(--secondary) !important;
    transform: scale(1.25);
    box-shadow: 0 4px 12px rgba(212,175,55,.25) !important;
}
.color-swatch.swatch-black { background: #111 !important; }
.color-swatch.swatch-cyan { background: #22d3ee !important; }
.color-swatch.swatch-purple { background: #a855f7 !important; }
.color-swatch.swatch-blue { background: #2563eb !important; }
.color-swatch.swatch-orange { background: #f97316 !important; }
.color-swatch.swatch-teal { background: #14b8a6 !important; }

.product-card-title {
    font-family: var(--ff-display) !important;
    font-size: 18px !important;
    font-weight: 700 !important;
    margin: 0 0 10px !important;
    line-height: 1.35 !important;
}
.product-card-title a {
    color: var(--primary) !important;
    text-decoration: none !important;
    transition: color 0.3s;
}
.product-card-title a:hover { color: var(--secondary) !important; }

.product-card-price { font-size: 16px !important; }
.card-price-regular {
    color: var(--primary) !important;
    font-weight: 700 !important;
}
.card-price-compare {
    color: var(--text-tertiary) !important;
    text-decoration: line-through !important;
    font-size: 14px !important;
    margin-right: 10px;
}

/* VIEW ALL BUTTON */
.view-all { margin-top: 72px !important; }
.view-all .btn-primary {
    display: inline-block !important;
    padding: 18px 56px !important;
    background: var(--primary) !important;
    color: #fff !important;
    font-family: var(--ff-body) !important;
    font-size: 12px !important;
    font-weight: 700 !important;
    letter-spacing: 0.14em !important;
    text-transform: uppercase !important;
    text-decoration: none !important;
    border-radius: 2px !important;
    border: 2px solid var(--primary) !important;
    transition: var(--transition) !important;
    box-shadow: 0 12px 32px rgba(0,0,0,.15) !important;
    position: relative;
    overflow: hidden;
}
.view-all .btn-primary::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: var(--secondary);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: width 0.6s, height 0.6s;
    z-index: -1;
}
.view-all .btn-primary:hover::before {
    width: 300px;
    height: 300px;
}
.view-all .btn-primary:hover {
    color: var(--primary) !important;
    border-color: var(--secondary) !important;
    transform: translateY(-3px);
    box-shadow: 0 16px 48px rgba(212,175,55,.25) !important;
}

/* BANNER SECTION - Premium 2025 */
.banner-section {
    background: linear-gradient(135deg, #f9f7f5 0%, rgba(212,175,55,.04) 100%);
    padding: 100px 0 !important;
}
.banner-section.mt-100 { margin-top: 0 !important; }

.banner-item {
    display: block !important;
    overflow: hidden !important;
    border-radius: 12px !important;
    position: relative;
    text-decoration: none !important;
    transition: var(--transition) !important;
    box-shadow: 0 16px 48px rgba(0,0,0,.1) !important;
}
.banner-item:hover {
    box-shadow: 0 28px 72px rgba(0,0,0,.18) !important;
    transform: translateY(-6px);
}

.banner-img {
    width: 100% !important;
    height: 380px !important;
    object-fit: cover !important;
    object-position: center !important;
    display: block !important;
    transition: transform 0.7s cubic-bezier(.25,.46,.45,.94) !important;
    filter: brightness(0.72) contrast(1.08) saturate(1.05);
}
.banner-item:hover .banner-img { transform: scale(1.08) rotate(0.5deg); }

.banner-item .content-absolute.content-slide {
    background: linear-gradient(125deg, rgba(0,0,0,.72) 0%, rgba(212,175,55,.18) 65%, transparent 100%) !important;
}

.banner-content {
    padding: 56px !important;
    position: relative;
    z-index: 2;
}
.banner-content .heading_18 {
    font-family: var(--ff-body) !important;
    font-size: 12px !important;
    font-weight: 700 !important;
    letter-spacing: 0.16em !important;
    text-transform: uppercase !important;
    color: var(--secondary);
    margin-bottom: 14px !important;
}
.banner-content .heading_34 {
    font-family: var(--ff-display) !important;
    font-size: clamp(28px, 5vw, 48px) !important;
    font-weight: 800 !important;
    line-height: 1.15 !important;
    color: #fff !important;
}

/* DRAWER CART - Premium 2025 */
#drawer-cart .offcanvas-header {
    padding: 28px 32px !important;
    border-bottom: 1px solid var(--border-light) !important;
    background: linear-gradient(135deg, #fafaf8 0%, rgba(212,175,55,.02) 100%);
}
.cart-drawer-heading {
    font-family: var(--ff-display) !important;
    font-size: 18px !important;
    font-weight: 700 !important;
    letter-spacing: 0.08em !important;
    text-transform: uppercase !important;
    color: var(--primary) !important;
}
.minicart-item {
    padding: 28px 32px !important;
    border-bottom: 1px solid var(--border-light) !important;
    gap: 18px !important;
}
.mini-img {
    width: 80px !important;
    height: 100px !important;
    object-fit: cover !important;
    border-radius: 6px !important;
    box-shadow: 0 6px 16px rgba(0,0,0,.1);
}
.product-title a {
    font-size: 15px !important;
    color: var(--primary) !important;
    font-weight: 700 !important;
}
.product-vendor {
    font-size: 13px !important;
    color: var(--text-secondary) !important;
}
.product-price {
    font-size: 15px !important;
    color: var(--primary) !important;
    font-weight: 700 !important;
}
.product-remove {
    font-size: 12px !important;
    color: var(--secondary) !important;
    text-decoration: none !important;
    transition: var(--transition) !important;
    font-weight: 600;
}
.product-remove:hover {
    color: var(--primary) !important;
    text-decoration: underline !important;
}

.qty-btn {
    background: rgba(0,0,0,.02) !important;
    border: 1px solid var(--border-med) !important;
    width: 36px !important;
    height: 36px !important;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer !important;
    transition: var(--transition) !important;
    border-radius: 4px;
    font-weight: 600;
}
.qty-btn:hover {
    border-color: var(--secondary) !important;
    background: rgba(212,175,55,.08) !important;
}
.qty-input {
    width: 44px !important;
    text-align: center !important;
    border: none !important;
    font-size: 14px !important;
    font-family: var(--ff-body) !important;
}

.minicart-footer {
    padding: 28px 32px !important;
    border-top: 1px solid var(--border-light) !important;
    background: linear-gradient(135deg, #fafaf8 0%, rgba(212,175,55,.02) 100%);
}
.cart-subtotal, .cart-subprice {
    font-family: var(--ff-body) !important;
    font-size: 16px !important;
    font-weight: 700 !important;
    color: var(--primary) !important;
}
.cart-taxes {
    font-size: 12px !important;
    color: var(--text-secondary) !important;
}

.minicart-btn {
    padding: 16px 0 !important;
    flex: 1 !important;
    text-align: center !important;
    font-family: var(--ff-body) !important;
    font-size: 11px !important;
    letter-spacing: 0.14em !important;
    text-transform: uppercase !important;
    font-weight: 700 !important;
    text-decoration: none !important;
    border-radius: 4px !important;
    transition: var(--transition) !important;
}
.minicart-btn.btn-secondary {
    background: rgba(0,0,0,.04) !important;
    color: var(--primary) !important;
    border: 1.5px solid var(--border-med) !important;
    margin-right: 12px;
}
.minicart-btn.btn-secondary:hover {
    background: var(--primary) !important;
    color: #fff !important;
    border-color: var(--primary) !important;
    transform: translateY(-2px);
}
.minicart-btn.btn-primary {
    background: var(--primary) !important;
    color: #fff !important;
    border: 1.5px solid var(--primary) !important;
}
.minicart-btn.btn-primary:hover {
    background: var(--secondary) !important;
    border-color: var(--secondary) !important;
    color: var(--primary) !important;
    transform: translateY(-2px);
}

/* QUICK VIEW MODAL - Premium 2025 */
#quickview-modal .modal-content {
    border-radius: 12px !important;
    border: 1px solid var(--border-light) !important;
    box-shadow: 0 32px 80px rgba(0,0,0,.2) !important;
}
#quickview-modal .modal-header {
    padding: 24px 32px !important;
    border-bottom: 1px solid var(--border-light) !important;
}

.product-availability {
    font-size: 11px !important;
    font-family: var(--ff-body) !important;
    letter-spacing: 0.12em !important;
    text-transform: uppercase !important;
    color: #2d7a4a !important;
    background: rgba(45,122,74,.08) !important;
    padding: 8px 14px !important;
    border-radius: 3px !important;
    font-weight: 700;
}
.product-title {
    font-family: var(--ff-display) !important;
    font-size: 36px !important;
    font-weight: 800 !important;
    color: var(--primary) !important;
    line-height: 1.15 !important;
    letter-spacing: -0.02em;
}
.regular-price {
    font-size: 26px !important;
    font-weight: 700 !important;
    color: var(--primary) !important;
}
.compare-price {
    font-size: 16px !important;
    color: var(--text-tertiary) !important;
}

.label {
    font-size: 13px !important;
    font-weight: 700 !important;
    color: var(--primary) !important;
    letter-spacing: 0.06em !important;
    text-transform: uppercase;
}

.variant-item input[type="radio"] { display: none !important; }
.variant-label.swatch-cyan, .variant-label.swatch-black, .variant-label.swatch-purple,
.variant-label.swatch-blue, .variant-label.swatch-orange, .variant-label.swatch-teal {
    width: 32px !important;
    height: 32px !important;
    border-radius: 50% !important;
    display: block !important;
    border: 2.5px solid transparent !important;
    cursor: pointer;
    transition: var(--transition) !important;
    box-shadow: 0 2px 8px rgba(0,0,0,.08);
}
.variant-item input[type="radio"]:checked + .variant-label {
    border-color: var(--secondary) !important;
    box-shadow: 0 0 0 3px rgba(212,175,55,.25) !important;
}

.variant-label:not([class*="swatch-"]) {
    width: 48px !important;
    height: 48px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    font-size: 14px !important;
    font-weight: 600 !important;
    border: 1.5px solid var(--border-med) !important;
    cursor: pointer !important;
    transition: var(--transition) !important;
    border-radius: 4px !important;
}
.variant-label:not([class*="swatch-"]):hover {
    border-color: var(--secondary) !important;
    background: rgba(212,175,55,.04) !important;
}
.variant-item input[type="radio"]:checked + .variant-label:not([class*="swatch-"]) {
    background: var(--primary) !important;
    color: #fff !important;
    border-color: var(--primary) !important;
}

.btn-add-to-cart, .btn-buyit-now {
    font-family: var(--ff-body) !important;
    font-size: 12px !important;
    letter-spacing: 0.14em !important;
    text-transform: uppercase !important;
    font-weight: 700 !important;
    border-radius: 4px !important;
    padding: 16px 32px !important;
    border: 1.5px solid transparent !important;
    transition: var(--transition) !important;
    cursor: pointer !important;
}
.btn-add-to-cart {
    background: var(--primary) !important;
    color: #fff !important;
    border-color: var(--primary) !important;
    flex: 1 !important;
    margin-right: 12px;
}
.btn-add-to-cart:hover {
    background: var(--secondary) !important;
    border-color: var(--secondary) !important;
    color: var(--primary) !important;
    transform: translateY(-2px);
    box-shadow: 0 12px 32px rgba(212,175,55,.25) !important;
}
.btn-buyit-now {
    background: var(--lighter) !important;
    color: var(--primary) !important;
    border-color: var(--border-light) !important;
    width: 100% !important;
}
.btn-buyit-now:hover {
    background: var(--primary) !important;
    color: #fff !important;
    border-color: var(--primary) !important;
    transform: translateY(-2px);
}

/* SCROLL UP - Premium Button 2025 */
#scrollup {
    background: var(--primary) !important;
    border: none !important;
    width: 52px !important;
    height: 52px !important;
    border-radius: 4px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    cursor: pointer !important;
    transition: var(--transition) !important;
    box-shadow: 0 12px 32px rgba(0,0,0,.2) !important;
}
#scrollup:hover {
    background: var(--secondary) !important;
    color: var(--primary) !important;
    transform: translateY(-4px);
    box-shadow: 0 16px 48px rgba(212,175,55,.3) !important;
}

/* DRAWER MENU - Premium 2025 */
#drawer-menu .offcanvas-header, #drawer-menu .drawer-heading {
    font-family: var(--ff-display) !important;
    font-size: 18px !important;
    font-weight: 700 !important;
    letter-spacing: 0.08em !important;
    text-transform: uppercase !important;
}
.site-navigation .nav-link, .site-navigation .nav-link-sub {
    font-family: var(--ff-body) !important;
    font-size: 15px !important;
    color: var(--primary) !important;
    transition: var(--transition) !important;
    font-weight: 500;
}
.site-navigation .nav-link:hover, .site-navigation .nav-link-sub:hover {
    color: var(--secondary) !important;
    padding-left: 8px;
}

/* RESPONSIVE 2025 MOBILE-FIRST */
@media (max-width: 1200px) {
    .slide-item { min-height: 580px !important; }
    .slide-img { height: 580px !important; }
    .section-heading { font-size: 48px !important; }
}

@media (max-width: 1024px) {
    .slide-item { min-height: 520px !important; }
    .slide-img { height: 520px !important; }
    .featured-collection { padding: 80px 0 !important; }
    .banner-section { padding: 80px 0 !important; }
}

@media (max-width: 768px) {
    .slide-item { min-height: 400px !important; }
    .slide-img { height: 400px !important; }
    .slide-heading.heading_72 { font-size: 40px !important; }
    .slide-subheading.heading_18 { font-size: 16px !important; }
    .slide-btn.btn-primary, a.slide-btn { padding: 14px 40px !important; font-size: 11px !important; }

    .trusted-section { padding: 60px 0 !important; }
    .trusted-badge { padding: 28px 24px !important; gap: 20px !important; border-radius: 8px !important; }
    .trusted-heading.heading_18 { font-size: 18px !important; }
    .icon-trusted { width: 44px !important; }

    .featured-collection { padding: 60px 0 !important; }
    .section-header { margin-bottom: 48px !important; }
    .section-icons { grid-template-columns: repeat(4, 1fr); gap: 28px; width: min(100%, 1000px); margin: 0 auto 32px; }
    .section-header .section-icon { width: 160px !important; height: 210px !important; border-radius: 12px; }
    .section-heading { font-size: 38px !important; }

    .product-card { margin-bottom: 36px; }
    .product-card-img { margin-bottom: 16px; }
    .product-card-title { font-size: 16px !important; }
    .color-lists { margin-bottom: 10px !important; }

    .banner-img { height: 300px !important; }
    .banner-content { padding: 40px !important; }
    .banner-content .heading_34 { font-size: clamp(24px, 4vw, 36px) !important; }

    .view-all { margin-top: 48px !important; }
    .view-all .btn-primary { padding: 14px 40px !important; font-size: 11px !important; }
}

@media (max-width: 576px) {
    :root {
        --shadow-sm:    0 2px 8px rgba(0, 0, 0, 0.06);
        --shadow-md:    0 4px 16px rgba(0, 0, 0, 0.1);
        --shadow-lg:    0 8px 32px rgba(0, 0, 0, 0.12);
    }

    .slide-item { min-height: 340px !important; }
    .slide-img { height: 340px !important; }
    .slide-heading.heading_72 { font-size: 32px !important; }
    .slide-subheading.heading_18 { font-size: 14px !important; margin-top: 16px !important; }
    .slide-content { max-width: 100%; padding: 40px 0; }
    .slide-btn.btn-primary, a.slide-btn { margin-top: 24px !important; padding: 13px 32px !important; font-size: 10px !important; }

    .trusted-section { padding: 40px 0 !important; }
    .trusted-badge {
        padding: 20px 16px !important;
        gap: 16px !important;
        flex-direction: column;
        text-align: center;
    }
    .trusted-heading.heading_18 { font-size: 16px !important; }
    .icon-trusted { width: 40px !important; }

    .featured-collection { padding: 40px 0 !important; }
    .section-header { margin-bottom: 32px !important; padding: 0 12px; }
    .section-icons { grid-template-columns: repeat(2, 1fr); gap: 18px; width: 100%; margin: 0 0 24px 0; }
    .section-header .section-icon { width: 110px !important; height: 145px !important; border-radius: 10px; }
    .section-heading { font-size: 28px !important; }
    .section-heading::after { width: 50px; }

    .product-card { margin-bottom: 28px; }
    .product-card-img { margin-bottom: 12px; border-radius: 6px; }
    .product-card-title { font-size: 14px !important; }
    .product-card-price { font-size: 14px !important; }
    .color-swatch { width: 12px !important; height: 12px !important; }

    .banner-section { padding: 40px 0 !important; }
    .banner-img { height: 240px !important; }
    .banner-content { padding: 28px !important; }
    .banner-content .heading_34 { font-size: 20px !important; }

    .view-all { margin-top: 32px !important; }
    .view-all .btn-primary { padding: 12px 32px !important; font-size: 10px !important; }

    #scrollup { width: 44px !important; height: 44px !important; }

    .qty-btn { width: 32px !important; height: 32px !important; font-size: 13px !important; }
    .variant-label:not([class*="swatch-"]) { width: 40px !important; height: 40px !important; font-size: 12px !important; }
}
</style>

<div class="body-wrapper">

    <main id="MainContent" class="content-for-layout">

        {{-- ── Slideshow ── --}}
        <div class="slideshow-section position-relative">
            <div class="slideshow-active activate-slider" data-slick='{
                "slidesToShow": 1,
                "slidesToScroll": 1,
                "dots": true,
                "arrows": true,
                "fade": true,
                "speed": 600,
                "responsive": [{"breakpoint": 768,"settings":{"arrows":false}}]
            }'>
                @foreach($slides as $slide)
                <div class="slide-item slide-item-bag position-relative">
                    <img class="slide-img d-none d-md-block"
                         src="{{ asset('/storage/'.$slide->image) }}"
                         alt="{{ $slide->title }}"
                         style="width:100%">
                    <div class="content-absolute content-slide">
                        <div class="container height-inherit d-flex align-items-center">
                            <div class="content-box slide-content py-4">
                                <h2 class="slide-heading heading_72 animate__animated animate__fadeInUp"
                                    data-animation="animate__animated animate__fadeInUp">
                                    {{ $slide->title }}
                                </h2>
                                <p class="slide-subheading heading_18 animate__animated animate__fadeInUp"
                                   data-animation="animate__animated animate__fadeInUp">
                                    {{ $slide->sub_title }}
                                </p>
                                <a class="btn-primary slide-btn animate__animated animate__fadeInUp"
                                   href="{{ route('view-products') }}"
                                   data-animation="animate__animated animate__fadeInUp">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="activate-arrows"></div>
            <div class="activate-dots dot-tools"></div>
        </div>

        {{-- ── Trusted badges ── --}}
        <div class="trusted-section mt-100 overflow-hidden">
            <div class="trusted-section-inner">
                <div class="container">
                    <div class="row justify-content-center trusted-row g-0">
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="trusted-badge bg-trust-1">
                                <div class="trusted-icon">
                                    {{-- <div>

                                        <i class="fa-solid fa-user" style="color:#0d0c0a;"></i
                                    </div> --}}
                                    <img class="icon-trusted" src="{{ asset('img/trusted/1.png') }}" alt="Free Shipping">
                                </div>
                                <div class="trusted-content">
                                    <h2 class="heading_18 trusted-heading">Free Shipping &amp; Return</h2>
                                    <p class="text_16 trusted-subheading trusted-subheading-2">On all orders over $99.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="trusted-badge bg-trust-2">
                                <div class="trusted-icon">
                                    <img class="icon-trusted" src="{{ asset('img/trusted/2.png') }}" alt="Customer Support">
                                </div>
                                <div class="trusted-content">
                                    <h2 class="heading_18 trusted-heading">Customer Support 24/7</h2>
                                    <p class="text_16 trusted-subheading trusted-subheading-2">Instant access to support</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="trusted-badge bg-trust-3">
                                <div class="trusted-icon">
                                    <img class="icon-trusted" src="{{ asset('img/trusted/3.png') }}" alt="Secure Payment">
                                </div>
                                <div class="trusted-content">
                                    <h2 class="heading_18 trusted-heading">100% Secure Payment</h2>
                                    <p class="text_16 trusted-subheading trusted-subheading-2">We ensure secure payment!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

 {{-- ── Popular Products ── --}}
<div class="featured-collection mt-100 overflow-hidden">
    <div class="collection-tab-inner">
        <div class="container">
            <div class="section-header text-center">
                <div class="section-icons-slider">
                    <div class="icons-carousel">
                        @foreach ($trustedImages as $image)
                            <div class="carousel-item">
                                <img class="section-icon"
                                     src="{{ asset('img/trusted/' . $image) }}"
                                     alt="{{ pathinfo($image, PATHINFO_FILENAME) }}">
                            </div>
                        @endforeach
                    </div>
                </div>
                <h2 class="section-heading">Popular Products</h2>
            </div>
            <div class="row">
                @foreach ($products as $pro)
                <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                    <div class="product-card" data-product-id="{{ $pro->id }}">

                        <div class="product-card-img">
                            {{-- Point to specific product show page --}}
                            <a class="hover-switch" href="{{ route('products.show', $pro->id) }}">
                                {{-- Fallback to main image if secondary doesn't exist in database --}}
                                <img class="secondary-img"
                                     src="{{ asset('/storage/' . ($pro->secondary_image_url ?? $pro->image_url)) }}"
                                     alt="{{ $pro->name }}">
                                <img class="primary-img"
                                     src="{{ asset('/storage/'.$pro->image_url) }}"
                                     alt="{{ $pro->name }}">
                            </a>

                            <div class="product-badge">
                                <span class="badge-label badge-new">Featured</span>
                            </div>
                         Action Triggers
                            <div class="product-card-action product-card-action-2 justify-content-center">
                                <button class="action-card action-quickview"
                                        data-bs-toggle="modal"
                                        data-bs-target="#quickview-modal"
                                        data-product-id="{{ $pro->id }}"
                                        aria-label="Quick view">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="https://scontent.fpnh19-1.fna.fbcdn.net/v/t39.30808-6/557741691_122176398464481161_7039324981622306173_n.jpg?stp=cp6_dst-jpg_s960x960_tt6&_nc_cat=105&ccb=1-7&_nc_sid=cc71e4&_nc_ohc=PL1rCRemzXoQ7kNvwEUtauP&_nc_oc=AdqqnUpqWJDUINkWL83irXzfMTHUehAS2guj9nrHGXRov_BlLkTynCy55nU6RS_Lln8&_nc_zt=23&_nc_ht=scontent.fpnh19-1.fna&_nc_gid=HOZfQsNyqrpzDqgVEvIRsw&_nc_ss=7b2a8&oh=00_Af9VF8-oS4XA8sSum4OVypY7CgSOiXJs9sJC3jNJpakUbw&oe=6A2705B9">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <circle cx="12" cy="12" r="3" stroke="#fff" stroke-width="1.5"/>
                                    </svg>
                                </button>

                                <button class="action-card action-wishlist"
                                        data-product-id="{{ $pro->id }}"
                                        aria-label="Add to Wishlist">
                                    <svg width="20" height="18" viewBox="0 0 26 22" fill="none" xmlns="https://scontent.fpnh19-1.fna.fbcdn.net/v/t39.30808-6/608662649_122186976320481161_2039172089804274684_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=127cfc&_nc_ohc=oxIU-v8FTAkQ7kNvwFk9EhW&_nc_oc=AdpTESYomYrlMk9LnuWBDSg49_sIVsOz-hCZ40fSNlL1Lqzywho3OCcxSJPpabYZhNM&_nc_zt=23&_nc_ht=scontent.fpnh19-1.fna&_nc_gid=-PjkmlMHYEGascZQOh2VYQ&_nc_ss=7b2a8&oh=00_Af-hBo4zXA6cNtFguYX3SINz1a0WwP3WLt0evfjmDmgjnA&oe=6A270D4C">
                                        <path d="M6.96429 0C3.12305 0 0 3.10686 0 6.84843C0 8.15388 0.602121 9.28455 1.16071 10.1014C1.71931 10.9181 2.29241 11.4425 2.29241 11.4425L12.3326 21.3439L13 22.0002L13.6674 21.3439L23.7076 11.4425C23.7076 11.4425 26 9.45576 26 6.84843C26 3.10686 22.877 0 19.0357 0C15.8474 0 13.7944 1.88702 13 2.68241C12.2056 1.88702 10.1526 0 6.96429 0ZM6.96429 1.82638C9.73912 1.82638 12.3036 4.48008 12.3036 4.48008L13 5.25051L13.6964 4.48008C13.6964 4.48008 16.2609 1.82638 19.0357 1.82638C21.8613 1.82638 24.1429 4.10557 24.1429 6.84843C24.1429 8.25732 22.4018 10.1584 22.4018 10.1584L13 19.4036L3.59821 10.1584C3.59821 10.1584 3.14844 9.73397 2.69866 9.07411C2.24888 8.41426 1.85714 7.55466 1.85714 6.84843C1.85714 4.10557 4.13867 1.82638 6.96429 1.82638Z" fill="#fff"/>
                                    </svg>
                                </button>

                                <button class="action-card action-addtocart"
                                        data-product-id="{{ $pro->id }}"
                                        aria-label="Add to Cart">
                                    <svg width="18" height="20" viewBox="0 0 24 26" fill="none" xmlns="https://scontent.fpnh19-1.fna.fbcdn.net/v/t39.30808-6/584120694_122181395726481161_5788273367915787290_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=833d8c&_nc_ohc=y-R6E5EaIPUQ7kNvwH-0mls&_nc_oc=AdpDTMPzEEYFDB0ulLRoi1LMBSZ2ptcbTRbDbBvvjAnDnf8b2pseWTWVS-pMmNzOSu4&_nc_zt=23&_nc_ht=scontent.fpnh19-1.fna&_nc_gid=lZRryZtdilmDVSe0wdxaAg&_nc_ss=7b2a8&oh=00_Af8PVWSkKiS4AFOcrSn9-krerK2wSgxquTOoWFOfOY3g-w&oe=6A27112B">
                                        <path d="M12 0C9.25391 0 7 2.25391 7 5V6H2.0625L2 6.9375L1 24.9375L0.9375 26H23.0625L23 24.9375L22 6.9375L21.9375 6H17V5C17 2.25391 14.7461 0 12 0ZM12 2C13.6563 2 15 3.34375 15 5V6H9V5C9 3.34375 10.3438 2 12 2ZM3.9375 8H7V11H9V8H15V11H17V8H20.0625L20.9375 24H3.0625L3.9375 8Z" fill="#fff"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="product-card-details">
                            {{-- Color Variant Selection swatches --}}
                            <ul class="color-lists list-unstyled d-flex align-items-center mb-2">
                                <li>
                                    <span class="color-swatch swatch-black active" data-color="black"></span>
                                </li>
                            </ul>

                            <h3 class="product-card-title">
                                <a href="{{ route('products.show', $pro->id) }}">{{ $pro->name }}</a>
                            </h3>

                            <div class="product-card-price">
                                <span class="card-price-regular">${{ number_format($pro->price, 2) }}</span>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
            <div class="view-all text-center" data-aos="fade-up" data-aos-duration="700">
                <a class="btn-primary" href="{{ route('view-products') }}">View All Products</a>
            </div>
        </div>
    </div>
</div>
        {{-- ── Promotional Banners ── --}}
        <div class="banner-section mt-100 overflow-hidden">
            <div class="banner-section-inner">
                <div class="container">
                    <div class="row justify-content-center g-3">
                        @foreach ($promotions as $pro)
                        <div class="col-lg-6 col-md-6 col-12" data-aos="fade-up" data-aos-duration="700">
                            <a class="banner-item position-relative" href="{{ route('view-products') }}">
                                <img class="banner-img"
                                     src="{{ asset('/storage/'.$pro->image) }}"
                                     alt="Promotion">
                                <div class="content-absolute content-slide">
                                    <div class="container height-inherit d-flex align-items-center">
                                        <div class="content-box banner-content">
                                            <p class="heading_18 mb-3 text-white">Sports Collection</p>
                                            <h2 class="heading_34 text-white">25% off for<br>sports men</h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </main>

    @include('layouts.partials.footer')

    {{-- Scroll-up --}}
    <button id="scrollup" aria-label="Back to top">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
             fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="18 15 12 9 6 15"></polyline>
        </svg>
    </button>

    {{-- ── Drawer: Mobile Menu ── --}}
    <div class="offcanvas offcanvas-start d-flex d-lg-none" tabindex="-1" id="drawer-menu">
        <div class="offcanvas-wrapper">
            <div class="offcanvas-header border-btm-black">
                <h5 class="drawer-heading">Menu</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body p-0 d-flex flex-column justify-content-between">
                <nav class="site-navigation">
                    <ul class="main-menu list-unstyled">
                        <li class="menu-list-item nav-item has-dropdown active">
                            <div class="mega-menu-header">
                                <a class="nav-link active" href="{{ url('/') }}">Home</a>
                                <span class="open-submenu">
                                    <svg class="icon icon-dropdown" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </span>
                            </div>
                        </li>
                        <li class="menu-list-item nav-item">
                            <a class="nav-link" href="{{ route('view-products') }}">Shop</a>
                        </li>
                        <li class="menu-list-item nav-item">
                            <a class="nav-link" href="#">Blog</a>
                        </li>
                        <li class="menu-list-item nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </nav>
                <ul class="utility-menu list-unstyled">
                    <li class="utilty-menu-item">
                        <a class="announcement-text" href="tel:+1-078-2376">
                            <span class="utilty-icon-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 1.35h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            </span>
                            Call: +1 078 2376
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- ── Drawer: Cart ── --}}
    <div class="offcanvas offcanvas-end" tabindex="-1" id="drawer-cart">
        <div class="offcanvas-header border-btm-black">
            <h5 class="cart-drawer-heading text_16">Your Cart (04)</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div class="cart-content-area d-flex justify-content-between flex-column">
                <div class="minicart-loop custom-scrollbar">
                    <div class="minicart-item d-flex">
                        <div class="mini-img-wrapper">
                            <img class="mini-img" src="assets/img/products/furniture/1.jpg" alt="img">
                        </div>
                        <div class="product-info">
                            <h2 class="product-title"><a href="#">Eliot Reversible Sectional</a></h2>
                            <p class="product-vendor">XS / Dove Gray</p>
                            <div class="misc d-flex align-items-end justify-content-between">
                                <div class="quantity d-flex align-items-center justify-content-between">
                                    <button class="qty-btn dec-qty">−</button>
                                    <input class="qty-input" type="number" name="qty" value="1" min="0">
                                    <button class="qty-btn inc-qty">+</button>
                                </div>
                                <div class="product-remove-area d-flex flex-column align-items-end">
                                    <div class="product-price">$580.00</div>
                                    <a href="#" class="product-remove">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="minicart-item d-flex">
                        <div class="mini-img-wrapper">
                            <img class="mini-img" src="assets/img/products/furniture/2.jpg" alt="img">
                        </div>
                        <div class="product-info">
                            <h2 class="product-title"><a href="#">Vita Lounge Chair</a></h2>
                            <p class="product-vendor">XS / Pink</p>
                            <div class="misc d-flex align-items-end justify-content-between">
                                <div class="quantity d-flex align-items-center justify-content-between">
                                    <button class="qty-btn dec-qty">−</button>
                                    <input class="qty-input" type="number" name="qty" value="1" min="0">
                                    <button class="qty-btn inc-qty">+</button>
                                </div>
                                <div class="product-remove-area d-flex flex-column align-items-end">
                                    <div class="product-price">$580.00</div>
                                    <a href="#" class="product-remove">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="minicart-footer">
                    <div class="minicart-calc-area">
                        <div class="minicart-calc d-flex align-items-center justify-content-between">
                            <span class="cart-subtotal mb-0">Subtotal</span>
                            <span class="cart-subprice">$1,160.00</span>
                        </div>
                        <p class="cart-taxes text-center my-4">Taxes and shipping calculated at checkout.</p>
                    </div>
                    <div class="minicart-btn-area d-flex align-items-center justify-content-between">
                        <a href="#" class="minicart-btn btn-secondary">View Cart</a>
                        <a href="#" class="minicart-btn btn-primary">Checkout</a>
                    </div>
                </div>
            </div>
            <div class="cart-empty-area text-center py-5 d-none">
                <div class="cart-empty-icon pb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M16 16s-1.5-2-4-2-4 2-4 2"></path>
                        <line x1="9" y1="9" x2="9.01" y2="9"></line>
                        <line x1="15" y1="9" x2="15.01" y2="9"></line>
                    </svg>
                </div>
                <p class="cart-empty">You have no items in your cart</p>
            </div>
        </div>
    </div>

    {{-- ── Quick-view Modal ── --}}
    <div class="modal fade" tabindex="-1" id="quickview-modal">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="product-gallery product-gallery-vertical d-flex">
                                <div class="product-img-large">
                                    <div class="qv-large-slider img-large-slider common-slider" data-slick='{"slidesToShow":1,"slidesToScroll":1,"dots":false,"arrows":false,"asNavFor":".qv-thumb-slider"}'>
                                        <div class="img-large-wrapper"><img src="assets/img/products/bags/39.jpg" alt="img"></div>
                                        <div class="img-large-wrapper"><img src="assets/img/products/bags/38.jpg" alt="img"></div>
                                        <div class="img-large-wrapper"><img src="assets/img/products/bags/37.jpg" alt="img"></div>
                                        <div class="img-large-wrapper"><img src="assets/img/products/bags/36.jpg" alt="img"></div>
                                    </div>
                                </div>
                                <div class="product-img-thumb">
                                    <div class="qv-thumb-slider img-thumb-slider common-slider" data-vertical-slider="true" data-slick='{"slidesToShow":4,"slidesToScroll":1,"dots":false,"arrows":true,"infinite":false,"focusOnSelect":true,"swipeToSlide":true,"asNavFor":".qv-large-slider"}'>
                                        <div><div class="img-thumb-wrapper"><img src="assets/img/products/bags/39.jpg" alt="img"></div></div>
                                        <div><div class="img-thumb-wrapper"><img src="assets/img/products/bags/38.jpg" alt="img"></div></div>
                                        <div><div class="img-thumb-wrapper"><img src="assets/img/products/bags/37.jpg" alt="img"></div></div>
                                        <div><div class="img-thumb-wrapper"><img src="assets/img/products/bags/36.jpg" alt="img"></div></div>
                                    </div>
                                    <div class="activate-arrows show-arrows-always arrows-white d-none d-lg-flex justify-content-between mt-3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="product-details ps-lg-4">
                                <div class="mb-3"><span class="product-availability">In Stock</span></div>
                                <h2 class="product-title mb-3">Accessories Leather Bag</h2>
                                <div class="product-rating d-flex align-items-center mb-3">
                                    <span class="star-rating">
                                        @for($i = 1; $i <= 5; $i++)
                                        <svg width="14" height="14" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.168 5.77344L10.082 5.23633L8 0.566406L5.91797 5.23633L0.832031 5.77344L4.63086 9.19727L3.57031 14.1992L8 11.6445L12.4297 14.1992L11.3691 9.19727L15.168 5.77344Z" fill="{{ $i <= 4 ? '#FFAE00' : '#D4CEC8' }}"/>
                                        </svg>
                                        @endfor
                                    </span>
                                    <span class="rating-count ms-2" style="font-size:12px;color:var(--c-ink3)">(22 reviews)</span>
                                </div>
                                <div class="product-price-wrapper mb-4">
                                    <span class="product-price regular-price">$24.00</span>
                                    <del class="product-price compare-price ms-2">$32.00</del>
                                </div>
                                <div class="product-sku product-meta mb-1">
                                    <strong class="label">SKU:</strong> <span style="font-size:13px;color:var(--c-ink3)">401</span>
                                </div>
                                <div class="product-vendor product-meta mb-4">
                                    <strong class="label">Vendor:</strong> <span style="font-size:13px;color:var(--c-ink3)">Leather Co.</span>
                                </div>
                                <div class="product-variant-wrapper">
                                    <div class="product-variant product-variant-color mb-3">
                                        <strong class="label mb-2 d-block">Color</strong>
                                        <ul class="variant-list list-unstyled d-flex align-items-center flex-wrap gap-2">
                                            <li class="variant-item"><input type="radio" name="qv-color" value="cyan" id="qv-cyan" checked><label class="variant-label swatch-cyan" for="qv-cyan"></label></li>
                                            <li class="variant-item"><input type="radio" name="qv-color" value="black" id="qv-black"><label class="variant-label swatch-black" for="qv-black"></label></li>
                                            <li class="variant-item"><input type="radio" name="qv-color" value="purple" id="qv-purple"><label class="variant-label swatch-purple" for="qv-purple"></label></li>
                                            <li class="variant-item"><input type="radio" name="qv-color" value="blue" id="qv-blue"><label class="variant-label swatch-blue" for="qv-blue"></label></li>
                                            <li class="variant-item"><input type="radio" name="qv-color" value="orange" id="qv-orange"><label class="variant-label swatch-orange" for="qv-orange"></label></li>
                                            <li class="variant-item"><input type="radio" name="qv-color" value="teal" id="qv-teal"><label class="variant-label swatch-teal" for="qv-teal"></label></li>
                                        </ul>
                                    </div>
                                    <div class="product-variant product-variant-other mb-4">
                                        <strong class="label mb-2 d-block">Size</strong>
                                        <ul class="variant-list list-unstyled d-flex align-items-center flex-wrap gap-2">
                                            <li class="variant-item"><input type="radio" name="qv-size" value="34" id="qv-34" checked><label class="variant-label" for="qv-34">34</label></li>
                                            <li class="variant-item"><input type="radio" name="qv-size" value="36" id="qv-36"><label class="variant-label" for="qv-36">36</label></li>
                                            <li class="variant-item"><input type="radio" name="qv-size" value="38" id="qv-38"><label class="variant-label" for="qv-38">38</label></li>
                                            <li class="variant-item"><input type="radio" name="qv-size" value="40" id="qv-40"><label class="variant-label" for="qv-40">40</label></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="misc d-flex align-items-center gap-3 mb-4">
                                    <div class="quantity d-flex align-items-center" style="border:1px solid var(--c-border);height:44px">
                                        <button class="qty-btn dec-qty" style="width:36px;height:44px;border:none;border-right:1px solid var(--c-border)">−</button>
                                        <input class="qty-input" type="number" name="qty" value="1" min="1" style="width:44px;height:44px;text-align:center;border:none;font-size:14px">
                                        <button class="qty-btn inc-qty" style="width:36px;height:44px;border:none;border-left:1px solid var(--c-border)">+</button>
                                    </div>
                                </div>
                                <div class="product-form-buttons d-flex align-items-center gap-3 mb-3">
                                    <button type="button" class="btn-add-to-cart position-relative" style="flex:1">Add to Cart</button>
                                    <a href="#" class="product-wishlist" aria-label="Wishlist" style="display:flex;align-items:center;padding:10px">
                                        <svg width="22" height="20" viewBox="0 0 26 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.96429 0C3.12305 0 0 3.10686 0 6.84843C0 8.15388 0.602121 9.28455 1.16071 10.1014C1.71931 10.9181 2.29241 11.4425 2.29241 11.4425L12.3326 21.3439L13 22.0002L13.6674 21.3439L23.7076 11.4425C23.7076 11.4425 26 9.45576 26 6.84843C26 3.10686 22.877 0 19.0357 0C15.8474 0 13.7944 1.88702 13 2.68241C12.2056 1.88702 10.1526 0 6.96429 0ZM6.96429 1.82638C9.73912 1.82638 12.3036 4.48008 12.3036 4.48008L13 5.25051L13.6964 4.48008C13.6964 4.48008 16.2609 1.82638 19.0357 1.82638C21.8613 1.82638 24.1429 4.10557 24.1429 6.84843C24.1429 8.25732 22.4018 10.1584 22.4018 10.1584L13 19.4036L3.59821 10.1584C3.59821 10.1584 3.14844 9.73397 2.69866 9.07411C2.24888 8.41426 1.85714 7.55466 1.85714 6.84843C1.85714 4.10557 4.13867 1.82638 6.96429 1.82638Z" fill="#0d0c0a"/></svg>
                                    </a>
                                </div>
                                <div class="buy-it-now-btn">
                                    <button type="button" class="btn-buyit-now position-relative">Buy It Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.color-lists').forEach(slider => {

        let isDown = false;
        let startX;
        let scrollLeft;

        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            slider.classList.add('dragging');

            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });

        slider.addEventListener('mouseleave', () => {
            isDown = false;
            slider.classList.remove('dragging');
        });

        slider.addEventListener('mouseup', () => {
            isDown = false;
            slider.classList.remove('dragging');
        });

        slider.addEventListener('mousemove', (e) => {

            if (!isDown) return;

            e.preventDefault();

            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 2;

            slider.scrollLeft = scrollLeft - walk;
        });

        // Touch Mobile
        let touchStartX = 0;
        let touchScrollLeft = 0;

        slider.addEventListener('touchstart', (e) => {

            touchStartX = e.touches[0].clientX;
            touchScrollLeft = slider.scrollLeft;

        }, { passive: true });

        slider.addEventListener('touchmove', (e) => {

            const touchX = e.touches[0].clientX;
            const walk = (touchX - touchStartX) * 2;

            slider.scrollLeft = touchScrollLeft - walk;

        }, { passive: true });

    });

});
</script>

@endsection
</x-app-layout>
