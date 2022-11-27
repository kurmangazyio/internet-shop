import { defineConfig } from 'vite'

import laravel from 'laravel-vite-plugin'
import vueJsx from '@vitejs/plugin-vue-jsx'
import vue from '@vitejs/plugin-vue'

import path from 'path'

export default defineConfig({
    plugins: [
        vueJsx({}),
        vue({
            template: {
                transformAssetUrls: {
                    includeAbsolute: false,
                },
            },
        }),
        laravel({
            input: [
                'resources/css/app.css',
                'resources/ts/src/app.ts'
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias:{
            '@/': path.join(__dirname, '/resources/ts/src/'),
            '~': path.join(__dirname, '/node_modules/'),
            '@front/': path.join(__dirname, '/resources/ts/src/'),
        },
    },
    build: {
        chunkSizeWarningLimit: 1600,
    },
});
