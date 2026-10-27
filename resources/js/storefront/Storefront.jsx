import React, { useState } from 'react';
import AnnouncementBar from './components/AnnouncementBar.jsx';
import Header from './components/Header.jsx';
import HeroCarousel from './components/HeroCarousel.jsx';
import CategoryShowcase from './components/CategoryShowcase.jsx';
import FeaturedProducts from './components/FeaturedProducts.jsx';
import Footer from './components/Footer.jsx';

export default function Storefront() {
    const [cartCount, setCartCount] = useState(0);
    const [wishlist, setWishlist] = useState([]);
    const [searchQuery, setSearchQuery] = useState('');

    const toggleWishlist = (id) => {
        setWishlist((items) => items.includes(id) ? items.filter((item) => item !== id) : [...items, id]);
    };

    return (
        <div className="min-h-screen overflow-x-hidden bg-white text-zinc-900">
            <AnnouncementBar />
            <Header cartCount={cartCount} wishlistCount={wishlist.length} searchQuery={searchQuery} onSearchChange={setSearchQuery} />
            <main>
                <HeroCarousel />
                <CategoryShowcase />
                <FeaturedProducts
                    cartCount={cartCount}
                    onAddToCart={() => setCartCount((count) => count + 1)}
                    wishlist={wishlist}
                    onToggleWishlist={toggleWishlist}
                    searchQuery={searchQuery}
                />
            </main>
            <Footer />
        </div>
    );
}
