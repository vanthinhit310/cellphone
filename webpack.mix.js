// let mix = require('laravel-mix');
// let glob = require('glob');
//
// mix.options({
//     processCssUrls: false,
//     clearConsole: true,
//     terser: {
//         extractComments: false,
//     }
// });
//
// // Run all webpack.mix.js in app
// glob.sync('./platform/**/**/webpack.mix.js').forEach(item => require(item));

// Run only for a package, replace [package] by the name of package you want to compile assets
// require('./platform/packages/[package]/webpack.mix.js');

// Run only for a plugin, replace [plugin] by the name of plugin you want to compile assets
// require('./platform/plugins/[plugin]/webpack.mix.js');

// Run only for themes, you shouldn't modify below config, just uncomment if you want to compile only theme's assets
// glob.sync('./platform/themes/**/webpack.mix.js').forEach(item => require(item));


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
