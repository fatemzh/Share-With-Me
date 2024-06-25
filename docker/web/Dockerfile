# Use an official PHP runtime as a parent image
FROM php:8.0-apache

# Copy the content of the web directory into the /var/www/html directory in the container
COPY . /var/www/html/

# Set the working directory
WORKDIR /var/www/html

# Install necessary PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable mod_rewrite for Apache
RUN a2enmod rewrite

# Copy the custom Apache configuration file
COPY ./docker/nginx/default.conf /etc/apache2/sites-available/000-default.conf

# Expose port 80
EXPOSE 80
