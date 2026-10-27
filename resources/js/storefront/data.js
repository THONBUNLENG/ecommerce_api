const image = (photo, width = 900) =>
    `https://images.unsplash.com/${photo}?auto=format&fit=crop&w=${width}&q=85`;

export const slides = [
    {
        eyebrow: 'New season · 2025 collection',
        title: 'A fresh take\non everyday style.',
        description: 'Meet the pieces that make getting dressed the best part of your day.',
        action: 'Discover the collection',
        image: image('photo-1529139574466-a303027c1d8', 1800),
        position: 'center 38%',
    },
    {
        eyebrow: 'The new essentials',
        title: 'Made for\nyour kind of day.',
        description: 'Easy layers, confident details and everything in between.',
        action: 'Shop new arrivals',
        image: image('photo-1483985988355-763728e1935b', 1800),
        position: 'center 34%',
    },
    {
        eyebrow: 'Style, your way',
        title: 'Find your\nnext favourite.',
        description: 'Fresh looks for every plan on your calendar.',
        action: 'Explore ZANDO',
        image: image('photo-1539109136881-3be0616acf4b', 1800),
        position: 'center 35%',
    },
];

export const categories = [
    { name: 'Women', note: 'New looks for her', image: image('photo-1483985988355-763728e1935b', 950), position: 'center 30%' },
    { name: 'Men', note: 'Everyday, elevated', image: image('photo-1516257984-b1b4d707412e', 950), position: 'center 28%' },
    { name: 'Accessories', note: 'The finishing touch', image: image('photo-1523170335258-f5ed11844a49', 950), position: 'center 48%' },
];

export const products = [
    { id: 1, name: 'Relaxed linen blend shirt', category: 'Women · Clothing', price: 24.95, oldPrice: 35.95, discount: '−30%', image: image('photo-1598554747436-c9293d6a588f'), tone: 'Sand' },
    { id: 2, name: 'Everyday straight-leg denim', category: 'Women · Denim', price: 32.95, oldPrice: null, discount: null, image: image('photo-1541099649105-f69ad21f3246'), tone: 'Blue' },
    { id: 3, name: 'Soft structure shoulder bag', category: 'Accessories · Bags', price: 28.95, oldPrice: 39.95, discount: '−28%', image: image('photo-1584917865442-de89df76afd3'), tone: 'Black' },
    { id: 4, name: 'Classic cotton overshirt', category: 'Men · Clothing', price: 34.95, oldPrice: null, discount: null, image: image('photo-1591047139829-d91aecb6caea'), tone: 'Olive' },
    { id: 5, name: 'Minimal leather-look sneakers', category: 'Shoes · Unisex', price: 39.95, oldPrice: 54.95, discount: '−27%', image: image('photo-1542291026-7eec264c27ff'), tone: 'White' },
    { id: 6, name: 'Ribbed knit summer top', category: 'Women · Clothing', price: 19.95, oldPrice: null, discount: null, image: image('photo-1551163943-3f6a855d1153'), tone: 'Cream' },
    { id: 7, name: 'City daypack', category: 'Accessories · Bags', price: 29.95, oldPrice: 42.95, discount: '−30%', image: image('photo-1553062407-98eeb64c6a62'), tone: 'Black' },
    { id: 8, name: 'Relaxed cotton tee', category: 'Men · Clothing', price: 15.95, oldPrice: null, discount: null, image: image('photo-1521572163474-6864f9cf17ab'), tone: 'White' },
];
