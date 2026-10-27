import { useState } from 'react';
import { Heart, ShoppingBag } from 'lucide-react';

export type ProductColor = {
    name: string;
    value: string;
};

export type ProductCardProps = {
    id: string | number;
    brand: string;
    title: string;
    image: string;
    hoverImage?: string;
    originalPrice: number;
    discountedPrice: number;
    discountPercent?: number;
    colors?: ProductColor[];
    isWishlisted?: boolean;
    onWishlistToggle?: (productId: ProductCardProps['id']) => void;
    onQuickAdd?: (productId: ProductCardProps['id']) => void;
};

const formatPrice = (price: number) => `$${price.toFixed(2)}`;

export default function ProductCard({
    id,
    brand,
    title,
    image,
    hoverImage,
    originalPrice,
    discountedPrice,
    discountPercent,
    colors = [],
    isWishlisted = false,
    onWishlistToggle,
    onQuickAdd,
}: ProductCardProps) {
    const [selectedColor, setSelectedColor] = useState<string | null>(null);
    const isDiscounted = originalPrice > discountedPrice;
    const calculatedDiscount = isDiscounted
        ? Math.round(((originalPrice - discountedPrice) / originalPrice) * 100)
        : 0;
    const badgeDiscount = discountPercent ?? calculatedDiscount;

    return (
        <article className="group min-w-0">
            <div className="relative aspect-[3/4] overflow-hidden bg-zinc-100">
                <a href={`/product/${id}`} aria-label={`View ${title}`} className="block h-full w-full">
                    <img src={image} alt={title} loading="lazy" className="h-full w-full object-cover transition duration-500 group-hover:scale-[1.035]" />
                    {hoverImage && (
                        <img src={hoverImage} alt="" loading="lazy" className="absolute inset-0 h-full w-full object-cover opacity-0 transition-opacity duration-300 group-hover:opacity-100" />
                    )}
                </a>

                {isDiscounted && badgeDiscount > 0 && (
                    <span className="absolute left-3 top-3 bg-rose-600 px-2 py-1 text-[9px] font-bold tracking-[0.08em] text-white">
                        -{badgeDiscount}%
                    </span>
                )}

                <button
                    type="button"
                    onClick={() => onWishlistToggle?.(id)}
                    aria-label={isWishlisted ? `Remove ${title} from wishlist` : `Add ${title} to wishlist`}
                    aria-pressed={isWishlisted}
                    className={`absolute right-3 top-3 grid h-9 w-9 place-items-center rounded-full bg-white/95 transition hover:bg-white ${isWishlisted ? 'text-rose-600' : 'text-zinc-700'}`}
                >
                    <Heart size={17} fill={isWishlisted ? 'currentColor' : 'none'} strokeWidth={1.7} />
                </button>

                <button
                    type="button"
                    onClick={() => onQuickAdd?.(id)}
                    className="absolute inset-x-2 bottom-2 flex translate-y-0 items-center justify-center gap-2 bg-white/95 py-3 text-[9px] font-bold uppercase tracking-[0.13em] text-zinc-900 transition duration-200 hover:bg-zinc-900 hover:text-white focus:bg-zinc-900 focus:text-white sm:inset-x-3 sm:bottom-3 sm:translate-y-3 sm:text-[10px] sm:opacity-0 sm:group-hover:translate-y-0 sm:group-hover:opacity-100 sm:group-focus-within:translate-y-0 sm:group-focus-within:opacity-100"
                >
                    <ShoppingBag size={14} />Quick add
                </button>
            </div>

            <div className="pt-3">
                <p className="mb-1 text-[9px] font-semibold uppercase tracking-[0.12em] text-zinc-500 sm:text-[10px]">{brand}</p>
                <a href={`/product/${id}`} className="block truncate text-xs font-medium text-zinc-900 hover:underline sm:text-[13px]">{title}</a>
                <div className="mt-2 flex items-center gap-2 text-xs">
                    {isDiscounted && <del className="text-zinc-400">{formatPrice(originalPrice)}</del>}
                    <span className={isDiscounted ? 'font-semibold text-rose-600' : 'font-semibold'}>{formatPrice(discountedPrice)}</span>
                </div>

                {colors.length > 0 && (
                    <div className="mt-3 flex items-center gap-2" aria-label="Available colors">
                        {colors.map((color) => (
                            <button
                                key={color.name}
                                type="button"
                                title={color.name}
                                aria-label={`Select ${color.name}`}
                                aria-pressed={selectedColor === color.name}
                                onClick={() => setSelectedColor(color.name)}
                                className={`grid h-[18px] w-[18px] place-items-center rounded-full border transition ${selectedColor === color.name ? 'border-zinc-900' : 'border-transparent hover:border-zinc-400'}`}
                            >
                                <span className="h-3 w-3 rounded-full border border-black/10" style={{ backgroundColor: color.value }} />
                            </button>
                        ))}
                        {selectedColor && <span className="text-[9px] text-zinc-500">{selectedColor}</span>}
                    </div>
                )}
            </div>
        </article>
    );
}
