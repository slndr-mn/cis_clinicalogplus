import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { globSync } from 'glob';
import vue from '@vitejs/plugin-vue';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
               ...globSync('resources/css/**/*.css'), 
                ...globSync('resources/js/**/*.js')
            ],

            list: 'resources/js/plugin/list.js/list.min.js',
            refresh: true,

        }),
       vue(),
    ],
});


