FROM php:8.2-fpm

# Install additional packages and extensions
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    unzip \
    zip \
    && docker-php-ext-install \
    intl \
    pdo_mysql \
    opcache \
    zip \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install exif extension
RUN docker-php-ext-install exif

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory
WORKDIR /var/www

RUN apt-get update && apt-get install -y supervisor
RUN mkdir -p /var/log/supervisor

RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www
