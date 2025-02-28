# Stage 1: Build stage
FROM php:8.1-cli as build

# Set the working directory
WORKDIR /app

# Copy the current directory contents into the container at /app
COPY . /app

# Install any needed packages and PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip mysqli

# Stage 2: Production stage
FROM php:8.1-apache

# Set the working directory
WORKDIR /var/www/html

# Copy the necessary files from the build stage
COPY --from=build /app /var/www/html

# Adjust permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Copy custom Apache configuration
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Enable the site configuration
RUN a2ensite 000-default.conf

# Enable necessary Apache modules
RUN docker-php-ext-install mysqli

# Expose port 80
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]