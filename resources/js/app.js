// Include official brand assets in both the Vite development server and production manifest.
import.meta.glob('../images/brand/*.{png,jpg,jpeg,webp,avif,svg}', {
    eager: true,
    query: '?url',
    import: 'default',
});

const menuToggle = document.querySelector('[data-menu-toggle]');
const mobileMenu = document.querySelector('[data-mobile-menu]');

if (menuToggle && mobileMenu) {
    const setMenuOpen = (open) => {
        menuToggle.setAttribute('aria-expanded', String(open));
        menuToggle.setAttribute('aria-label', open ? 'Cerrar menú' : 'Abrir menú');
        mobileMenu.hidden = !open;
        document.body.classList.toggle('overflow-hidden', open);
    };

    menuToggle.addEventListener('click', () => {
        setMenuOpen(menuToggle.getAttribute('aria-expanded') !== 'true');
    });

    mobileMenu.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => setMenuOpen(false));
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && menuToggle.getAttribute('aria-expanded') === 'true') {
            setMenuOpen(false);
            menuToggle.focus();
        }
    });

    window.addEventListener('resize', () => {
        if (window.matchMedia('(min-width: 1280px)').matches) {
            setMenuOpen(false);
        }
    });
}
