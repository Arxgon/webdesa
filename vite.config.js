import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],

    // Fix folder output untuk production
    build: {
        manifest: true,
        outDir: "public/build",
        emptyOutDir: true,
    },

    // Agar HMR berjalan di Laragon (Apache)
    server: {
        host: "localhost",
        port: 5173,
        strictPort: true,
        hmr: {
            host: "localhost",
            protocol: "ws",
        },
    },
});
