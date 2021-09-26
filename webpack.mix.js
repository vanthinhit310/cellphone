let mix = require("laravel-mix");

mix.webpackConfig({
    resolve: {
        extensions: [".js", ".vue", ".json"],
        alias: {
            "@": __dirname + "/platform/themes/bfs/vue",
            "@core": __dirname + "/platform/themes/bfs/vue/core",
            "@modules": __dirname + "/platform/themes/bfs/vue/modules",
        },
    },
});

mix.version().webpackConfig({
    output: {
        chunkFilename: "js/chunks/[name].[hash].js",
    },
});

mix.setPublicPath("public")
    .js("platform/themes/bfs/vue/core/app.js", "public/themes/bfs/js/app.js")
    .sass(
        "platform/themes/bfs/assets/sass/app.scss",
        "public/themes/bfs/css/app.css"
    )
    .less("platform/themes/bfs/assets/less/app.less", "public/themes/bfs/css", {
        lessOptions: {
            javascriptEnabled: true,
        },
    })
    .copyDirectory('platform/themes/bfs/assets/images', 'public/themes/bfs/images')
    .vue();

// mix.disableNotifications();
