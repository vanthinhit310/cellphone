let mix = require("laravel-mix");

mix.webpackConfig({
    resolve: {
        extensions: [".js", ".vue", ".json"],
        alias: {
            "@": __dirname + "/platform/themes/bfs/vue",
            "@core": __dirname + "/platform/themes/bfs/vue/core",
            "@modules": __dirname + "/platform/themes/bfs/vue/modules"
        }
    }
});
// mix.disableNotifications();
mix.version().webpackConfig({
    output: {
        chunkFilename: "js/chunks/[name].[hash].js"
    }
});

mix.setPublicPath("public")
    .js("platform/themes/bfs/vue/core/app.js", "public/themes/bfs/js/app.js").vue()
    .sass("platform/themes/bfs/assets/sass/app.scss", "public/themes/bfs/css/app.css");
