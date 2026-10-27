<section class="bg-white text-zinc-900">
    <div class="mx-auto max-w-[1440px] px-4 py-8 sm:px-6 lg:px-8 lg:py-12">
        <div class="mb-8 border-b border-zinc-200 pb-6 sm:mb-10">
            <p class="mb-2 text-[10px] font-semibold uppercase tracking-[0.22em] text-rose-600">Discover the latest</p>
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <h1 class="text-3xl font-semibold tracking-tight sm:text-4xl">Shop all</h1>
                    <p class="mt-2 max-w-xl text-sm leading-6 text-zinc-500">Explore fresh styles, everyday essentials, and new-season favourites.</p>
                </div>
                <label class="relative block w-full sm:max-w-xs">
                    <span class="sr-only">Search the catalog</span>
                    <svg class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-zinc-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                        <circle cx="11" cy="11" r="7"></circle><path d="m20 20-4-4"></path>
                    </svg>
                    <input
                        type="search"
                        wire:model.live.debounce.350ms="search"
                        placeholder="Search products"
                        class="w-full border border-zinc-300 bg-white py-3 pl-10 pr-3 text-sm placeholder:text-zinc-400 focus:border-zinc-900 focus:ring-0"
                    >
                </label>
            </div>
        </div>

        <div class="grid gap-8 lg:grid-cols-[220px_minmax(0,1fr)] lg:gap-10">
            <aside class="space-y-8" aria-label="Catalog filters">
                <section>
                    <h2 class="mb-4 text-xs font-bold uppercase tracking-[0.14em]">Categories</h2>
                    <div class="space-y-1">
                        <button
                            type="button"
                            wire:click="$set('categoryId', '')"
                            class="flex w-full items-center justify-between py-2 text-left text-sm transition {{ $categoryId === '' ? 'font-semibold text-zinc-950' : 'text-zinc-600 hover:text-zinc-950' }}"
                        >
                            <span>All categories</span>
                            <span class="text-xs text-zinc-400">{{ $products->total() }}</span>
                        </button>
                        @foreach ($categories as $category)
                            <button
                                type="button"
                                wire:key="catalog-category-{{ $category->id }}"
                                wire:click="$set('categoryId', '{{ $category->id }}')"
                                class="flex w-full items-center justify-between py-2 text-left text-sm transition {{ $categoryId === (string) $category->id ? 'font-semibold text-zinc-950' : 'text-zinc-600 hover:text-zinc-950' }}"
                            >
                                <span>{{ $category->name }}</span>
                                <span class="text-xs text-zinc-400">{{ $category->products_count }}</span>
                            </button>
                        @endforeach
                    </div>
                </section>

                <section class="border-t border-zinc-200 pt-6">
                    <h2 class="mb-4 text-xs font-bold uppercase tracking-[0.14em]">Price range</h2>
                    <div class="grid grid-cols-2 gap-3">
                        <label class="block text-xs text-zinc-500">
                            Min ($)
                            <input type="number" min="0" step="0.01" wire:model.live.debounce.400ms="minPrice" placeholder="0" class="mt-2 w-full border border-zinc-300 px-3 py-2.5 text-sm text-zinc-900 focus:border-zinc-900 focus:ring-0">
                        </label>
                        <label class="block text-xs text-zinc-500">
                            Max ($)
                            <input type="number" min="0" step="0.01" wire:model.live.debounce.400ms="maxPrice" placeholder="Any" class="mt-2 w-full border border-zinc-300 px-3 py-2.5 text-sm text-zinc-900 focus:border-zinc-900 focus:ring-0">
                        </label>
                    </div>
                </section>

                <button type="button" wire:click="clearFilters" class="text-xs font-semibold uppercase tracking-[0.1em] text-zinc-500 underline underline-offset-4 transition hover:text-zinc-950">
                    Clear filters
                </button>
            </aside>

            <div class="min-w-0">
                <div class="mb-5 flex flex-col gap-3 border-b border-zinc-200 pb-4 sm:flex-row sm:items-center sm:justify-between">
                    <p class="text-sm text-zinc-500" aria-live="polite">{{ $products->total() }} products</p>
                    <label class="flex items-center gap-3 text-xs text-zinc-500">
                        <span class="shrink-0">Sort by</span>
                        <select wire:model.live="sort" class="min-w-44 border-0 border-b border-zinc-300 bg-white py-2 pl-0 pr-8 text-xs font-medium text-zinc-900 focus:border-zinc-900 focus:ring-0">
                            <option value="newest">Newest</option>
                            <option value="price_asc">Price: Low to High</option>
                            <option value="price_desc">Price: High to Low</option>
                        </select>
                    </label>
                </div>

                <div class="grid grid-cols-2 gap-x-3 gap-y-8 sm:grid-cols-3 sm:gap-x-5 sm:gap-y-10 xl:grid-cols-4">
                    @forelse ($products as $product)
                        @php
                            $images = $product->images;
                            $mainImage = $images->firstWhere('is_primary', true) ?? $images->first();
                            $hoverImage = $images->first(fn ($image) => $mainImage && $image->id !== $mainImage->id);
                            $mainImageUrl = $mainImage?->url ?? $product->image_url ?? asset('img/trusted/featured_collection.png');
                            $regularPrice = (float) ($product->base_price ?: $product->price);
                            $salePrice = $product->discount_price && $product->discount_price > 0 && $product->discount_price < $regularPrice
                                ? (float) $product->discount_price
                                : $regularPrice;
                            $discountPercent = $salePrice < $regularPrice
                                ? (int) round((($regularPrice - $salePrice) / $regularPrice) * 100)
                                : 0;
                        @endphp

                        <article wire:key="catalog-product-{{ $product->id }}" class="group min-w-0">
                            <a href="{{ route('products.show', $product->id) }}" class="relative block aspect-[3/4] overflow-hidden bg-zinc-100" aria-label="View {{ $product->name }}">
                                <img src="{{ $mainImageUrl }}" alt="{{ $product->name }}" loading="lazy" class="h-full w-full object-cover transition duration-500 group-hover:scale-[1.03]">
                                @if ($hoverImage)
                                    <img src="{{ $hoverImage->url }}" alt="" loading="lazy" class="absolute inset-0 h-full w-full object-cover opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                @endif
                                @if ($discountPercent > 0)
                                    <span class="absolute left-2 top-2 bg-rose-600 px-2 py-1 text-[9px] font-bold tracking-[0.08em] text-white sm:left-3 sm:top-3">-{{ $discountPercent }}%</span>
                                @endif
                                <span class="absolute inset-x-2 bottom-2 translate-y-1 bg-white/95 py-2.5 text-center text-[9px] font-bold uppercase tracking-[0.12em] text-zinc-900 opacity-100 transition group-hover:translate-y-0 group-hover:bg-zinc-900 group-hover:text-white sm:inset-x-3 sm:bottom-3 sm:translate-y-3 sm:py-3 sm:text-[10px] sm:opacity-0 sm:group-hover:opacity-100">View product</span>
                            </a>
                            <div class="pt-3">
                                <p class="mb-1 text-[9px] font-semibold uppercase tracking-[0.12em] text-zinc-500 sm:text-[10px]">{{ $product->manufacturer ?: 'ZANDO' }}</p>
                                <a href="{{ route('products.show', $product->id) }}" class="block truncate text-xs font-medium text-zinc-900 hover:underline sm:text-[13px]">{{ $product->name }}</a>
                                <div class="mt-2 flex flex-wrap items-center gap-x-2 gap-y-1 text-xs">
                                    @if ($discountPercent > 0)
                                        <span class="font-semibold text-rose-600">${{ number_format($salePrice, 2) }}</span>
                                        <del class="text-zinc-400">${{ number_format($regularPrice, 2) }}</del>
                                    @else
                                        <span class="font-semibold">${{ number_format($regularPrice, 2) }}</span>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="col-span-full border border-zinc-200 px-6 py-16 text-center">
                            <h2 class="text-lg font-medium">No products found</h2>
                            <p class="mt-2 text-sm text-zinc-500">Try changing your search or filters.</p>
                        </div>
                    @endforelse
                </div>

                @if ($products->hasPages())
                    <div class="mt-10">{{ $products->links() }}</div>
                @endif
            </div>
        </div>

        <div wire:loading.delay class="fixed bottom-5 right-5 z-50 bg-zinc-900 px-4 py-2 text-xs font-medium text-white shadow-lg" role="status">
            Updating catalog…
        </div>
    </div>
</section>
