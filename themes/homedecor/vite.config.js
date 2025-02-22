import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";



export default defineConfig({
    plugins: [
        laravel({
            input: [
                "themes\homedecor\sass/app.scss",
                "themes\homedecor\js/app.js"
            ],
            buildDirectory: "homedecor",
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
            '@': '/themes\homedecor\js',
            '~bootstrap': path.resolve('node_modules/bootstrap'),
        }
    },
    
});
