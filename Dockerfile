# Use the official PHP image with Apache
FROM php:7.4-apache

# Optionally, you can install other dependencies you might need
RUN apt-get update && apt-get install -y \
    git \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    vim \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

RUN curl -s https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer


# Install required PHP extensions
RUN docker-php-ext-install pdo pdo_mysql 

COPY ./apache/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite 

# Copy application code to the container
COPY ./ /var/www/html


# Set working directory
WORKDIR /var/www/html 

# Set permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80
