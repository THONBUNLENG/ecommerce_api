import React, { useMemo } from 'react';
import { ArrowRight } from 'lucide-react';
import ProductCard from './ProductCard.tsx';
import { products } from '../data';

const defaultSwatches = [
    { name: 'Black', value: '#272727' },
    { name: 'Cream', value: '#e8e0d3' },
    { name: 'Olive', value: '#72745f' },
];

export default function FeaturedProducts({ wishlist, onToggleWishlist, onAddToCart, searchQuery }) {
    const filteredProducts = useMemo(() => {
        const query = searchQuery.trim().toLowerCase();
        return products.filter((product) => !query || `${product.name} ${product.category}`.toLowerCase().includes(query));
    }, [searchQuery]);

    return (
        <section id="featured" className="border-t border-zinc-100 bg-[#fafafa]">
            <div className="mx-auto max-w-[1600px] px-4 py-16 sm:px-8 sm:py-20 lg:px-12 lg:py-24">
                <div className="mb-8 flex items-end justify-between gap-4 sm:mb-10">
                    <div>
                        <p className="mb-2 text-[10px] font-semibold uppercase tracking-[0.2em] text-rose-600">Just landed</p>
                        <h2 className="text-3xl font-semibold tracking-[-0.045em] sm:text-4xl">Featured this week</h2>
                    </div>
                    <a href="/kh/en-gb/women" className="inline-flex items-center gap-2 pb-1 text-[10px] font-semibold uppercase tracking-[0.1em] sm:text-xs">View all <ArrowRight size={15} /></a>
                </div>
                {filteredProducts.length ? (
                    <div className="grid grid-cols-2 gap-x-3 gap-y-8 sm:grid-cols-3 sm:gap-x-5 sm:gap-y-10 lg:grid-cols-4 lg:gap-x-6">
                        {filteredProducts.map((product) => (
                            <ProductCard
                                key={product.id}
                                id={product.id}
                                brand={product.brand ?? 'ZANDO'}
                                title={product.name}
                                image={product.image}
                                originalPrice={product.oldPrice ?? product.price}
                                discountedPrice={product.price}
                                colors={product.colors ?? defaultSwatches}
                                isWishlisted={wishlist.includes(product.id)}
                                onWishlistToggle={onToggleWishlist}
                                onQuickAdd={onAddToCart}
                            />
                        ))}
                    </div>
                ) : (
                    <div className="py-16 text-center text-sm text-zinc-500">No products match "{searchQuery}". Try another search.</div>
                )}
            </div>
        </section>
    );
}
