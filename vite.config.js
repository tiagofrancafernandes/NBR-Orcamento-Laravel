import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',

                'public/dashboard-assets/scripts.js',
                'public/dashboard-assets/styles.scss',
            ],
            refresh: true,
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
