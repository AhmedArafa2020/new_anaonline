import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";



export default defineConfig({
    plugins: [
        laravel({
            input: [
                "themes\logisticsboxes\sass/app.scss",
                "themes\logisticsboxes\js/app.js"
            ],
            buildDirectory: "logisticsboxes",
        }),
        
        
        {
            name: "blade",
            handleHotUpdate({ file, server }) {
                if (file.endsWith(".blade.php")) {
                    server.ws.send({
                        type: "full-reload",
                        path: "*",
                    });
                }
            },
        },
    ],
    resolve: {
        alias: {
            '@': '/themes\logisticsboxes\js',
            '~bootstrap': path.resolve('node_modules/bootstrap'),
        }
    },
    
});
