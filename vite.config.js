import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/filament/core/theme.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    // server: {
    //     host: process.env.APP_URL ? new URL(process.env.APP_URL).hostname : 'localhost',
    //     port: 3000, // Anda bisa mengganti port sesuai kebutuhan
    // },
});
