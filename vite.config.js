import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: 'localhost',
        port: 5173,
        proxy: {
            '^/(?!@vite|@id|resources/|node_modules/|favicon\\.ico|build/).*': {
                target: process.env.VITE_BACKEND_URL || 'http://[::1]:8000',
                changeOrigin: true,
                agent: false,
                headers: {
                    connection: 'close',
                },
            },
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
