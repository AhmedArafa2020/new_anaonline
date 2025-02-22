import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";



export default defineConfig({
    plugins: [
        laravel({
            input: [
                "themes\style\sass/app.scss",
                "themes\style\js/app.js"
            ],
            buildDirectory: "style",
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
            '@': '/themes\style\js',
            '~bootstrap': path.resolve('node_modules/bootstrap'),
        }
    },
    
});
