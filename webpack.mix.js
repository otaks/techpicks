// import .env / plugin
require("dotenv").config();
const mix = require("laravel-mix");
const glob = require("glob");

// Compile all scss files directly under the sass directory
glob.sync("resources/assets/sass/*.scss").map(function (file) {
   console.log(file);
   mix.sass(file, "public/css/front.css").options({
      processCssUrls: false,
      postCss: [
         require("css-mqpacker")(),
         require("css-declaration-sorter")({
            order: "smacss"
         })
      ],
      autoprefixer: {
         options: {
            browsers: ["last 2 versions"]
         }
      }
   });
});

// Compile all js files directly under the js directory
let jsPath = 'resources/assets/js/';
let frontJs = [`${jsPath}front.js`].concat(glob.sync(`${jsPath}/front/**/*.js`));
mix.js(frontJs, 'public/js/front.js');
// glob.sync("resources/assets/js/**/*.js").map(function (file) {
//    mix.js(file, "public/js");
// });

//Fonts
mix
   .copy('node_modules/font-awesome/fonts', 'public/fonts')
   .copy('node_modules/typeface-mplus-1p/fonts', 'public/fonts')

mix
   // Notification off
   //.disableNotifications()

   // Setting browserSync
   // .browserSync({
   //    // Using a vhost-based url
   //    // proxy: process.env.MIX_SENTRY_DSN_PUBLIC || 'http://localhost:8080',
   //    // Serve files frnpm install --save-dev css-mqpackerom the public directory
   //    server: {
   //    baseDir: "public",
   //    index: "index.html"
   //    },
   //    port: 8080,
   //    proxy: false,
   //    // Watch files
   //    files: "public/**/*"
   // })

   // Added webpackConfig settings
   .webpackConfig({
      module: {
         rules: [
            {
               // JavaScript Prettier Setting
               test: /\.js$/,
               loader: "prettier-loader",
               options: {
                  // Prettier Options https://prettier.io/docs/en/options.html
                  singleQuote: true,
                  semi: false
               }
            },
            {
               // Allow .scss files imported glob
               test: /\.scss/,
               loader: "import-glob-loader"
            },
            {
               // Sass Prettier Setting
               test: /\.scss$/,
               loader: "prettier-loader",
               options: {
                  parser: "postcss"
               }
            }
         ]
      }
   });

// Generate sourcemap only for development environment
if (!mix.inProduction()) {
   mix.sourceMaps();
}
