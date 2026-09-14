// Include managed images in both the Vite development server and production manifest.
import.meta.glob(['../images/**/*.{png,jpg,jpeg,webp,avif,svg}', '!../images/brand/*.png'], {
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
        const open = menuToggle.getAttribute('aria-expanded') !== 'true';

        setMenuOpen(open);

        if (open) {
            mobileMenu.querySelector('a')?.focus();
        }
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

    const desktopNavigation = window.matchMedia('(min-width: 1280px)');

    desktopNavigation.addEventListener('change', (event) => {
        if (event.matches) {
            setMenuOpen(false);
        }
    });
}
