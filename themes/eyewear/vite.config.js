import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";



export default defineConfig({
    plugins: [
        laravel({
            input: [
                "themes\eyewear\sass/app.scss",
                "themes\eyewear\js/app.js"
            ],
            buildDirectory: "eyewear",
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
            '@': '/themes\eyewear\js',
            '~bootstrap': path.resolve('node_modules/bootstrap'),
        }
    },
    
});
