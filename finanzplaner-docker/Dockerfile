FROM php:8.1-apache

# Install system dependencies (zip, unzip, git)
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git

# Install PDO MySQL extension
RUN docker-php-ext-install pdo pdo_mysql

# Copy application source code to the container
COPY ./src/ /var/www/html/

# Set the working directory
WORKDIR /var/www/html

# Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

# Install PHP dependencies
RUN composer install

# Set permissions for the Apache server
RUN chown -R www-data:www-data /var/www/html

# Enable Apache mod_rewrite
RUN a2enmod rewrite

EXPOSE 80