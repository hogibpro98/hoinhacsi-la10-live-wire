import {defineConfig} from 'vite';
import laravel, {refreshPaths} from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        // hmr: {
        //     host: 'localhost',
        // },
        watch: {
            ignored: [
                "**/vendor/**",
                "**/mysql-data/**",
                "**/redis-data/**",
            ],
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/library.js',
                'resources/js/home.js',
                'resources/js/profile.js',
                'resources/js/guest.js',
                'resources/css/custom_style.css',
                'resources/css/profile.css',
                'resources/css/guest.css',
                'resources/css/home.css'
            ],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
            ],
        }),
    ],
});
