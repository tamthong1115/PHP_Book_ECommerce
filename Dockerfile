# Use the official PHP image with Apache
FROM php:8.1-apache

# Install required PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy the content of the current directory to the Apache root directory
COPY . /var/www/html/

# Expose port 80
EXPOSE 80
