import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0', // Permite acceder al servidor desde cualquier IP
        port: 8000, // Puedes cambiar el puerto si lo deseas
        hmr: {
            host: '192.168.1.141', // Cambia esto a tu dominio si es necesario
        },
    },
});
