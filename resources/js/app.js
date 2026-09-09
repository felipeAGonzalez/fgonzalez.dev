// Include official brand assets in both the Vite development server and production manifest.
import.meta.glob('../images/brand/*.{png,jpg,jpeg,webp,avif,svg}', {
    eager: true,
    query: '?url',
    import: 'default',
});
