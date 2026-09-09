FROM php:8.3-apache

WORKDIR /var/www/html

# Dependencias del sistema + extensiones PHP para Laravel/SQLite
RUN apt-get update && apt-get install -y \
    curl \
    git \
    unzip \
    libzip-dev \
    libsqlite3-dev \
    && docker-php-ext-install \
        pdo \
        pdo_sqlite \
        zip \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

# Apache sirve desde Laravel /public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri \
    -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Node.js + npm para Vite
RUN curl -fsSL https://deb.nodesource.com/setup_24.x | bash - \
    && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*

CMD ["apache2-foreground"]