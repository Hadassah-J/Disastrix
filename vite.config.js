import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/all.min.css',
                'resources/css/adminlte.min.css',
                'resources/js/jquery.min.js',
                'resources/js/bootstrap.bundle.min.css',
                'resources/js/adminlte.js'

            ],
            refresh: true,
        }),
    ],
});
