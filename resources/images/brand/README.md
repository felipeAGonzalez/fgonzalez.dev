# Identidad visual

Este directorio contiene los archivos oficiales de marca:

- `Isotipo.png`: isotipo FG;
- `logotipo.png`: logotipo completo con nombre y descriptor.
- `Isotipo.webp` y `logotipo.webp`: derivados optimizados utilizados por el frontend.

Las rutas públicas se centralizan en `config/brand.php`. Los PNG oficiales se conservan intactos
como archivos fuente y no deben recrearse, redibujarse ni sustituirse por aproximaciones. El
favicon se gestiona por separado en `public/favicon.ico` y no forma parte de este directorio.

El logotipo completo se utiliza como fallback temporal para metadata social cuando una página no
tiene imagen propia. Queda pendiente preparar una imagen social oficial de 1200 × 630 px.
