FROM php:7.4-apache

# Instalar dependencias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim unzip git curl \
    libxml2-dev \
    libzip-dev \
    libonig-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring tokenizer xml gd
    
# Habilitar mod_rewrite
RUN a2enmod rewrite

# Configurar el document root
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copiar configuración de Apache
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Copiar composer
COPY --from=composer:2.0 /usr/bin/composer /usr/bin/
# Copy custom PHP config
COPY php.ini /usr/local/etc/php/conf.d/99-custom.ini

# Copiar y configurar entrypoint personalizado
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Usar el entrypoint personalizado
ENTRYPOINT ["docker-entrypoint.sh"]
