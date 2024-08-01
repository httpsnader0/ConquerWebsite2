import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import path from "path";
import fs from "fs";
import { homedir } from "os";
import { resolve } from "path";
import { exec } from "node:child_process";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.scss", "resources/js/app.js"],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        {
            name: "ziggy",
            enforce: "post",
            handleHotUpdate({ server, file }) {
                if (file.includes("/routes/") && file.endsWith(".php")) {
                    exec(
                        "php artisan ziggy:generate",
                        (error, stdout) =>
                            error === null &&
                            console.log(`Ziggy Routes Generated Successfully !`)
                    );
                }
            },
        },
        {
            name: "lang",
            enforce: "post",
            handleHotUpdate({ server, file }) {
                if (file.includes("/lang/")) {
                    exec(
                        "php artisan generate:lang",
                        (error, stdout) =>
                            error === null &&
                            console.log(`Lang Generated Successfully !`)
                    );
                }
            },
        },
    ],
    resolve: {
        alias: {
            ziggy: path.resolve("vendor/tightenco/ziggy/dist/vue.es.js"),
        },
    },
});

function detectServerConfig(host) {
    let keyPath = resolve(homedir(), `.config/valet/Certificates/${host}.key`);
    let certificatePath = resolve(
        homedir(),
        `.config/valet/Certificates/${host}.crt`
    );

    if (!fs.existsSync(keyPath)) {
        return {};
    }

    if (!fs.existsSync(certificatePath)) {
        return {};
    }

    return {
        hmr: { host },
        host,
        https: {
            key: fs.readFileSync(keyPath),
            cert: fs.readFileSync(certificatePath),
        },
    };
}
