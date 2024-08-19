# Use the official PHP-Apache image as a base
FROM php:8.2.12-apache

# Enable the mod_rewrite module
RUN a2enmod rewrite

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# pdo
RUN docker-php-ext-install pdo_mysql


# Copy your custom PHP configuration (optional)
#COPY php.ini /usr/local/etc/php/php.ini

# Set the working directory
WORKDIR /var/www/html/PHP_Book_ECommerce
