import {defineConfig} from "vite";
import laravel from 'laravel-vite-plugin';
import vue2 from '@vitejs/plugin-vue2';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // Control Panel assets.
                'resources/css/cp.css',
                'resources/js/cp.js',
            ],
            refresh: true,
        }),
        vue2(),
    ],
});
