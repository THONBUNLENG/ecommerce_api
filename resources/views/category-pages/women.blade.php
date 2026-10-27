<x-app-layout>
    @section('hero')
        <style>
            .women-shop {
                --women-ink: #171717;
                --women-muted: #777;
                --women-line: #e8e8e8;
                color: var(--women-ink);
                background: #fff;
                font-family: Arial, Helvetica, sans-serif;
            }
            .women-promo {
                padding: 10px 16px;
                background: #171717;
                color: #fff;
                text-align: center;
                font-size: 11px;
                letter-spacing: .12em;
                text-transform: uppercase;
            }
            .women-wrap { width: min(1440px, calc(100% - 64px)); margin: 0 auto; }
            .women-breadcrumb { padding: 22px 0 12px; color: var(--women-muted); font-size: 12px; }
            .women-breadcrumb a { color: inherit; text-decoration: none; }
            .women-heading { padding: 10px 0 30px; border-bottom: 1px solid var(--women-line); }
            .women-heading h1 { margin: 0; font-size: clamp(30px, 4vw, 42px); font-weight: 500; letter-spacing: -.04em; }
            .women-heading p { margin: 8px 0 0; color: var(--women-muted); font-size: 13px; }
            .women-layout { display: grid; grid-template-columns: 220px minmax(0, 1fr); gap: 42px; padding: 26px 0 70px; }
            .women-filters { border-right: 1px solid var(--women-line); padding-right: 24px; }
            .women-filter-title { margin: 0 0 14px; font-size: 13px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; }
            .women-category-list { list-style: none; padding: 0; margin: 0 0 28px; }
            .women-category-list li + li { margin-top: 2px; }
            .women-category-list a { display: flex; justify-content: space-between; gap: 10px; padding: 9px 0; color: #444; font-size: 13px; text-decoration: none; }
            .women-category-list a:hover, .women-category-list a.is-active { color: #000; font-weight: 700; }
            .women-category-count { color: #999; font-size: 11px; }
            .women-filter-note { border-top: 1px solid var(--women-line); padding-top: 18px; color: var(--women-muted); font-size: 12px; line-height: 1.7; }
            .women-toolbar { display: flex; align-items: center; justify-content: space-between; gap: 20px; margin-bottom: 20px; }
            .women-result-count { color: var(--women-muted); font-size: 13px; }
            .women-sort { display: flex; align-items: center; gap: 10px; font-size: 12px; }
            .women-sort select { min-width: 180px; padding: 10px 34px 10px 12px; border: 1px solid var(--women-line); border-radius: 0; background: #fff; color: var(--women-ink); font-size: 12px; }
            .women-products { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 30px 16px; }
            .women-product { min-width: 0; }
            .women-product-media { position: relative; display: block; overflow: hidden; background: #f5f5f3; aspect-ratio: 3 / 4; }
            .women-product-media img { display: block; width: 100%; height: 100%; object-fit: cover; transition: transform .45s ease; }
            .women-product:hover .women-product-media img { transform: scale(1.035); }
            .women-product-badge { position: absolute; top: 10px; left: 10px; padding: 6px 8px; background: #fff; color: #222; font-size: 9px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; }
            .women-product-info { padding: 12px 1px 0; }
            .women-product-category { margin: 0 0 5px; color: #888; font-size: 10px; letter-spacing: .1em; text-transform: uppercase; }
            .women-product-name { display: block; overflow: hidden; margin: 0 0 8px; color: var(--women-ink); font-size: 13px; font-weight: 400; text-decoration: none; text-overflow: ellipsis; white-space: nowrap; }
            .women-product-name:hover { text-decoration: underline; text-underline-offset: 3px; }
            .women-product-price { display: flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 700; }
            .women-product-price del { color: #999; font-size: 12px; font-weight: 400; }
            .women-product-price .sale { color: #c33131; }
            .women-add { width: 100%; margin-top: 11px; padding: 10px 12px; border: 1px solid #222; background: #fff; color: #222; font-size: 10px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; cursor: pointer; transition: background .2s, color .2s; }
            .women-add:hover:not(:disabled) { background: #171717; color: #fff; }
            .women-add:disabled { border-color: #ddd; color: #888; cursor: not-allowed; }
            .women-empty { grid-column: 1 / -1; padding: 64px 20px; border: 1px solid var(--women-line); text-align: center; }
            .women-empty h2 { margin: 0 0 8px; font-size: 22px; font-weight: 500; }
            .women-empty p { margin: 0; color: var(--women-muted); font-size: 13px; }
            .women-pages { display: flex; justify-content: center; padding-top: 38px; }
            .women-mobile-categories { display: none; }
            @media (max-width: 1100px) { .women-products { grid-template-columns: repeat(3, minmax(0, 1fr)); } }
            @media (max-width: 760px) {
                .women-wrap { width: min(100% - 32px, 600px); }
                .women-layout { grid-template-columns: 1fr; gap: 18px; padding-top: 18px; }
                .women-filters { display: none; }
                .women-mobile-categories { display: block; margin-bottom: 18px; }
                .women-mobile-categories select { width: 100%; padding: 12px; border: 1px solid var(--women-line); background: #fff; }
                .women-products { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 24px 10px; }
                .women-toolbar { align-items: flex-start; flex-direction: column; gap: 12px; }
                .women-sort { width: 100%; justify-content: space-between; }
                .women-sort select { flex: 1; }
            }
        </style>

        <main class="women-shop">
            <div class="women-promo">New season styles · Shop the latest collection</div>
            <div class="women-wrap">
                <nav class="women-breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ route('home') }}">Home</a> <span aria-hidden="true">/</span> Women
                </nav>

                <header class="women-heading">
                    <h1>{{ $selectedCategory?->name ?? 'Women' }}</h1>
                    <p>Discover the latest styles for every day and every occasion.</p>
                </header>

                <div class="women-layout">
                    <aside class="women-filters" aria-label="Product categories">
                        <h2 class="women-filter-title">Categories</h2>
                        <ul class="women-category-list">
                            <li>
                                <a href="{{ route('women') }}" class="{{ $selectedCategory ? '' : 'is-active' }}">
                                    <span>All women</span><span class="women-category-count">{{ $products->total() }}</span>
                                </a>
                            </li>
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('women', array_filter(['category' => $category->id, 'sort' => request('sort')])) }}" class="{{ $selectedCategory?->id === $category->id ? 'is-active' : '' }}">
                                        <span>{{ $category->name }}</span><span class="women-category-count">{{ $category->products_count }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <p class="women-filter-note">Easy browsing, fresh arrivals, and everyday pieces selected for your wardrobe.</p>
                    </aside>

                    <section aria-label="Women's products">
                        <div class="women-mobile-categories">
                            <select aria-label="Filter by category" onchange="if (this.value) window.location.href = this.value">
                                <option value="{{ route('women') }}">All categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ route('women', array_filter(['category' => $category->id, 'sort' => request('sort')])) }}" @selected($selectedCategory?->id === $category->id)>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="women-toolbar">
                            <span class="women-result-count">{{ $products->total() }} items</span>
                            <label class="women-sort" for="women-sort">
                                <span>Sort by</span>
                                <select id="women-sort" onchange="const url = new URL(window.location); url.searchParams.set('sort', this.value); url.searchParams.delete('page'); window.location = url">
                                    <option value="newest" @selected(request('sort', 'newest') === 'newest')>New arrivals</option>
                                    <option value="price-asc" @selected(request('sort') === 'price-asc')>Price: low to high</option>
                                    <option value="price-desc" @selected(request('sort') === 'price-desc')>Price: high to low</option>
                                    <option value="name" @selected(request('sort') === 'name')>Name: A to Z</option>
                                </select>
                            </label>
                        </div>

                        <div class="women-products">
                            @forelse ($products as $product)
                                @php
                                    $salePrice = $product->discount_price > 0 && $product->discount_price < $product->price
                                        ? $product->discount_price
                                        : $product->price;
                                @endphp
                                <article class="women-product">
                                    <a class="women-product-media" href="{{ route('products.show', $product->id) }}" aria-label="View {{ $product->name }}">
                                        <img src="{{ $product->image_url ?: asset('img/trusted/featured_collection.png') }}" alt="{{ $product->name }}" loading="lazy">
                                        @if ($salePrice < $product->price)
                                            <span class="women-product-badge">Sale</span>
                                        @elseif ($product->is_latest_drop)
                                            <span class="women-product-badge">New</span>
                                        @endif
                                    </a>
                                    <div class="women-product-info">
                                        <p class="women-product-category">{{ $product->category?->name ?? 'New collection' }}</p>
                                        <a class="women-product-name" href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                        <div class="women-product-price">
                                            @if ($salePrice < $product->price)
                                                <span class="sale">${{ number_format($salePrice, 2) }}</span>
                                                <del>${{ number_format($product->price, 2) }}</del>
                                            @else
                                                <span>${{ number_format($salePrice, 2) }}</span>
                                            @endif
                                        </div>
                                        <form method="POST" action="{{ route('cart.add', $product->id) }}">
                                            @csrf
                                            <button class="women-add" type="submit" {{ $product->stock_status === 'out_of_stock' ? 'disabled' : '' }}>
                                                {{ $product->stock_status === 'out_of_stock' ? 'Sold out' : 'Add to bag' }}
                                            </button>
                                        </form>
                                    </div>
                                </article>
                            @empty
                                <div class="women-empty">
                                    <h2>No products found</h2>
                                    <p>Try another category or check back for new arrivals.</p>
                                </div>
                            @endforelse
                        </div>

                        @if ($products->hasPages())
                            <div class="women-pages">{{ $products->links() }}</div>
                        @endif
                    </section>
                </div>
            </div>
        </main>
        @include('layouts.partials.footer')
    @endsection
</x-app-layout>
