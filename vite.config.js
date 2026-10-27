import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    esbuild: {
        jsx: 'automatic',
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/storefront.jsx',
            ],
            refresh: true,
        }),
    ],
});
