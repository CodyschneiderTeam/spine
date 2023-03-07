const { default : vite }    = await import(`${process.cwd()}/node_modules/vite/index.cjs`);
const { default : vue }     = await import(`${process.cwd()}/node_modules/@vitejs/plugin-vue/dist/index.mjs`);
const { default : laravel } = await import(`${process.cwd()}/node_modules/laravel-vite-plugin/dist/index.js`);

let plugins = [
    laravel.default([`${process.cwd()}/bootstrap/app.js`]),
    vue({ template: { transformAssetUrls : { base : null, includeAbsolute : false } } }),
];

export default vite.defineConfig({
    plugins : plugins,
    resolve : { alias : { spa : `${process.cwd()}/spa` } },
});