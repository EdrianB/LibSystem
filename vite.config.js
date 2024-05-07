import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/mdb.min.js', 'resources/css/all.min.css', 'resources/css/mdb.min.css',
                'resources/sass/app.scss','resources/css/research.css',
                'resources/js/app.js',
                'resources/css/app.js',
            ],
            refresh: true,
        }),
    ],
});
