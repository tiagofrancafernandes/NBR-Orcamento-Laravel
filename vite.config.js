import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';
import path from 'path'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/sass/app.scss',
                'resources/js/app.js',

                'public/dashboard-assets/scripts.js',
                'public/dashboard-assets/styles.scss',
            ],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
            ],
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
            '@resources': path.resolve(__dirname, 'resources'),
            '@dashboard-assets': path.resolve(__dirname, 'public/dashboard-assets'),
        }
    },
    build: {
        chunkSizeWarningLimit: 400,
    }
});
