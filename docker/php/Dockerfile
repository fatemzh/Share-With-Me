FROM php:7.4-fpm

# Install required PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy custom PHP configuration file
COPY php.ini /usr/local/etc/php/

# Set working directory
WORKDIR /var/www/html
