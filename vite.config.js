import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import instruckt from 'instruckt/vite'

export default defineConfig({
    plugins: [
        instruckt({ server: false, endpoint: '/instruckt', adapters: ['livewire', 'blade'], mcp: true }),
        // Stub virtual:instruckt during build (plugin uses apply:"serve" only)
        {
            name: 'instruckt-build-stub',
            apply: 'build',
            resolveId(id) { if (id === 'virtual:instruckt') return '\0virtual:instruckt'; },
            load(id) { if (id === '\0virtual:instruckt') return 'export default {}'; },
        },
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
