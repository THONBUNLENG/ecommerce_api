import React, { useState } from 'react';
import { ChevronDown, Heart, Menu, Search, ShoppingBag, UserRound, X } from 'lucide-react';

const categories = ['Clothing', 'Shoes', 'Accessories'];

const navigation = [
    { label: 'NEW IN', href: '#featured' },
    { label: 'WOMEN', href: '/kh/en-gb/women', menu: true },
    { label: 'MEN', href: '#featured', menu: true },
    { label: 'BEAUTY', href: '#categories', menu: true },
    { label: 'KIDS', href: '#categories', menu: true },
    { label: 'SALE', href: '#featured', sale: true },
];

function MegaMenu({ label, href }) {
    return (
        <div className="group relative flex h-full items-center">
            <a href={href} className="inline-flex h-full items-center gap-1.5 text-[11px] font-semibold tracking-[0.1em] text-zinc-800 transition hover:text-rose-600 focus:text-rose-600 focus:outline-none">
                {label}<ChevronDown size={12} className="transition-transform group-hover:rotate-180 group-focus-within:rotate-180" />
            </a>
            <div className="invisible absolute left-1/2 top-full z-50 w-[min(90vw,760px)] -translate-x-1/2 translate-y-2 border border-zinc-100 bg-white p-8 opacity-0 shadow-xl transition-all duration-150 group-hover:visible group-hover:translate-y-0 group-hover:opacity-100 group-focus-within:visible group-focus-within:translate-y-0 group-focus-within:opacity-100">
                <div className="grid grid-cols-[1.1fr_2fr] gap-10">
                    <div className="border-r border-zinc-100 pr-8">
                        <p className="text-[10px] font-semibold uppercase tracking-[0.18em] text-rose-600">Discover</p>
                        <h2 className="mt-3 text-2xl font-medium tracking-[-0.04em]">Shop {label.toLowerCase()}</h2>
                        <p className="mt-3 max-w-[220px] text-xs leading-5 text-zinc-500">New-season favourites and everyday essentials, selected for you.</p>
                        <a href={href} className="mt-6 inline-block border-b border-zinc-900 pb-1 text-[10px] font-semibold uppercase tracking-[0.12em] hover:border-rose-600 hover:text-rose-600">View all {label.toLowerCase()}</a>
                    </div>
                    <div className="grid grid-cols-3 gap-5">
                        {categories.map((category) => (
                            <a key={category} href={href} className="group/category">
                                <span className="mb-4 block aspect-[4/5] overflow-hidden bg-zinc-100">
                                    <img src={`https://images.unsplash.com/${category === 'Clothing' ? 'photo-1483985988355-763728e1935b' : category === 'Shoes' ? 'photo-1542291026-7eec264c27ff' : 'photo-1584917865442-de89df76afd3'}?auto=format&fit=crop&w=400&q=80`} alt="" className="h-full w-full object-cover transition duration-300 group-hover/category:scale-105" />
                                </span>
                                <span className="text-[11px] font-semibold uppercase tracking-[0.1em] group-hover/category:text-rose-600">{category}</span>
                            </a>
                        ))}
                    </div>
                </div>
            </div>
        </div>
    );
}

function SearchField({ value, onChange, mobile = false }) {
    return (
        <label className={`flex items-center gap-2 border-b border-zinc-300 text-zinc-500 transition focus-within:border-zinc-900 ${mobile ? 'h-10' : 'h-9 w-[190px]'}`}>
            <Search size={17} strokeWidth={1.6} />
            <span className="sr-only">Search products</span>
            <input
                value={value}
                onChange={(event) => onChange(event.target.value)}
                className="w-full border-0 bg-transparent p-0 text-xs text-zinc-900 placeholder:text-zinc-400 focus:ring-0"
                placeholder="Search products"
                type="search"
            />
        </label>
    );
}

export default function Header({ cartCount = 0, wishlistCount = 0, searchQuery = '', onSearchChange = () => {} }) {
    const [menuOpen, setMenuOpen] = useState(false);

    return (
        <header className="sticky top-0 z-40 border-b border-zinc-100 bg-white/95 backdrop-blur">
            <div className="mx-auto grid h-[72px] max-w-[1600px] grid-cols-[1fr_auto_1fr] items-center gap-3 px-4 sm:px-8 lg:h-[82px] lg:gap-5">
                <button
                    className="justify-self-start text-zinc-800 lg:hidden"
                    aria-label={menuOpen ? 'Close navigation menu' : 'Open navigation menu'}
                    aria-expanded={menuOpen}
                    aria-controls="mobile-navigation-drawer"
                    onClick={() => setMenuOpen((open) => !open)}
                >
                    {menuOpen ? <X size={23} strokeWidth={1.6} /> : <Menu size={23} strokeWidth={1.6} />}
                </button>

                <a href="/" className="justify-self-center text-[27px] font-black leading-none tracking-[-0.1em] sm:text-[31px] lg:justify-self-start" aria-label="ZANDO home">
                    ZANDO<span className="text-rose-600">.</span>
                </a>

                <nav className="hidden h-full items-center justify-center gap-5 lg:flex 2xl:gap-7" aria-label="Main navigation">
                    {navigation.map((item) => item.menu ? (
                        <MegaMenu key={item.label} label={item.label} href={item.href} />
                    ) : (
                        <a key={item.label} href={item.href} className={`inline-flex h-full items-center text-[11px] font-semibold tracking-[0.1em] transition hover:text-rose-600 ${item.sale ? 'text-rose-600' : 'text-zinc-800'}`}>
                            {item.label}
                        </a>
                    ))}
                </nav>

                <div className="flex items-center justify-self-end gap-3 sm:gap-4 lg:gap-5">
                    <div className="hidden xl:block">
                        <SearchField value={searchQuery} onChange={onSearchChange} />
                    </div>
                    <a href="/login" className="text-zinc-800 transition hover:text-rose-600" aria-label="User account">
                        <UserRound size={20} strokeWidth={1.6} />
                    </a>
                    <a href="#featured" className="relative text-zinc-800 transition hover:text-rose-600" aria-label={`Wishlist, ${wishlistCount} items`}>
                        <Heart size={20} strokeWidth={1.6} />
                        {wishlistCount > 0 && <span className="absolute -right-2 -top-2 grid h-4 min-w-4 place-items-center rounded-full bg-rose-600 px-1 text-[9px] text-white">{wishlistCount}</span>}
                    </a>
                    <a href="#featured" className="relative text-zinc-800 transition hover:text-rose-600" aria-label={`Shopping bag, ${cartCount} items`}>
                        <ShoppingBag size={20} strokeWidth={1.6} />
                        <span className="absolute -right-2 -top-2 grid h-4 min-w-4 place-items-center rounded-full bg-zinc-900 px-1 text-[9px] text-white">{cartCount}</span>
                    </a>
                </div>
            </div>

            <div className="border-t border-zinc-100 px-4 xl:hidden">
                <div className="mx-auto max-w-[720px]">
                    <SearchField mobile value={searchQuery} onChange={onSearchChange} />
                </div>
            </div>

            {menuOpen && (
                <div className="fixed inset-0 z-[60] lg:hidden" role="presentation">
                    <button className="absolute inset-0 h-full w-full bg-black/45" onClick={() => setMenuOpen(false)} aria-label="Close navigation menu" />
                    <nav id="mobile-navigation-drawer" className="absolute inset-y-0 left-0 flex w-[min(88vw,380px)] flex-col overflow-y-auto bg-white px-5 pb-8 pt-5 shadow-2xl" aria-label="Mobile navigation">
                        <div className="mb-7 flex items-center justify-between border-b border-zinc-100 pb-5">
                            <a href="/" className="text-[26px] font-black tracking-[-0.1em]" onClick={() => setMenuOpen(false)}>ZANDO<span className="text-rose-600">.</span></a>
                            <button onClick={() => setMenuOpen(false)} aria-label="Close menu" className="grid h-10 w-10 place-items-center"><X size={22} /></button>
                        </div>
                        <div className="mb-5"><SearchField mobile value={searchQuery} onChange={onSearchChange} /></div>
                        <div className="divide-y divide-zinc-100">
                            {navigation.map((item) => (
                                <div key={item.label}>
                                    {item.menu ? (
                                        <details className="group/mobile">
                                            <summary className={`flex cursor-pointer list-none items-center justify-between py-4 text-xs font-semibold tracking-[0.12em] ${item.sale ? 'text-rose-600' : 'text-zinc-900'}`}>
                                                {item.label}<ChevronDown size={16} className="transition group-open/mobile:rotate-180" />
                                            </summary>
                                            <div className="grid grid-cols-1 gap-1 pb-4 pl-3">
                                                {categories.map((category) => <a key={category} href={item.href} onClick={() => setMenuOpen(false)} className="py-2 text-xs text-zinc-600">{category}</a>)}
                                            </div>
                                        </details>
                                    ) : (
                                        <a href={item.href} onClick={() => setMenuOpen(false)} className={`block py-4 text-xs font-semibold tracking-[0.12em] ${item.sale ? 'text-rose-600' : 'text-zinc-900'}`}>{item.label}</a>
                                    )}
                                </div>
                            ))}
                        </div>
                    </nav>
                </div>
            )}
        </header>
    );
}
