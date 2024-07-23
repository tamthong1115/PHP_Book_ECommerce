# Use the official PHP image with Apache
FROM php:8.2-apache

ENV APP_ENV=docker

# Enable mod_rewrite
RUN a2enmod rewrite

# Install required PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy the content of the current directory to the Apache root directory
COPY . /var/www/html/

# Expose port 80
EXPOSE 80
