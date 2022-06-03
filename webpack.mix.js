const mix = require("laravel-mix");

const postcssImport = require("postcss-import");
const tailwindcssNesting = require("tailwindcss/nesting");
const tailwindcss = require("tailwindcss");
const postcssCustomProperties = require("postcss-custom-properties");
const autoprefixer = require("autoprefixer");

// Public Path
// mix.setPublicPath("dist");

// Options
mix.options({
    processCssUrls: false,
});

// CSS
mix.postCss("resources/css/style.css", "public/css", [
    postcssImport(),
    tailwindcssNesting(),
    tailwindcss(),
    postcssCustomProperties(),
    autoprefixer(),
]);

// JS
mix.combine(
    ["resources/js/script.js", "resources/js/extras.js", "resources/js/components/"],
    "public/js/script.js"
);

// Vendor
mix.copy(
    // Line Awesome (Copy Fonts)
    "node_modules/line-awesome/dist/line-awesome/fonts/**/*",
    "public/fonts"
);

// Vendor JS
mix.combine(
    [
        // Tippy.js
        "node_modules/@popperjs/core/dist/umd/popper.min.js",
        "node_modules/tippy.js/dist/tippy.umd.min.js",
        "node_modules/alpinejs/dist/cdn.min.js",
    ],
    "public/js/vendor.js"
);

// Vendor Extras
mix.copy(
    [
        // Chart.js
        "node_modules/chart.js/dist/chart.min.js",
        // Sortable.js
        "node_modules/sortablejs/Sortable.min.js",
        // Glide.js
        "node_modules/@glidejs/glide/dist/glide.min.js",
        // CKEditor
        "node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js",
    ],
    "public/js"
);

if (!mix.inProduction()) {
    mix.copy(
        [
            // CKEditor
            "node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js.map",
            // Tippy.js
            "node_modules/tippy.js/dist/tippy.umd.min.js.map",
        ],
        "public/js"
    );
}

// Images
mix.copy("resources/images", "public/images");

// Live Server
mix.browserSync({
    proxy: "http://127.0.0.1:8080",
    notify: false,
});
