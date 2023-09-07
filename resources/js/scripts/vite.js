const { default : vite }    = await import(`${process.cwd()}/node_modules/vite/index.cjs`);
const { default : vue }     = await import(`${process.cwd()}/node_modules/@vitejs/plugin-vue/dist/index.mjs`);
const { default : laravel } = await import(`${process.cwd()}/node_modules/laravel-vite-plugin/dist/index.cjs`);

let plugins = [
    vite.splitVendorChunkPlugin(),
    laravel.default([`${process.cwd()}/bootstrap/app.js`]),
    vue({ template: { transformAssetUrls : { base : null, includeAbsolute : false } } }),
];

export default vite.defineConfig({
    plugins : plugins,
    build   : { chunkSizeWarningLimit : 1000 },
    resolve : { alias : { ui : `${process.cwd()}/vendor/caneara/spine/resources/js` } },
});