FROM php:8.4-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libicu-dev \
    sqlite3 \
    libsqlite3-dev \
    unzip \
    && docker-php-ext-install \
    intl \
    pdo_sqlite

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Configure Apache DocumentRoot to point to /webroot
ENV APACHE_DOCUMENT_ROOT /var/www/html/webroot
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy application code
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/tmp \
    && chmod -R 775 /var/www/html/logs \
    && chmod +x bin/cake

# Expose port 80
EXPOSE 80

# Use default Apache entrypoint or custom one if needed
# We'll use a custom one to ensure migrations/cache clearing if desired, 
# but for now standard apache start is often enough. 
# Let's stick to the plan and add a simple entrypoint.
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["docker-entrypoint.sh"]
