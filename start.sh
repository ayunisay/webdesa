#!/bin/bash
set -e

echo "Starting Laravel application..."

# Create .env file if it doesn't exist
if [ ! -f .env ]; then
    cp .env.example .env
fi

# Generate APP_KEY if empty
if ! grep -q "APP_KEY=base64:" .env; then
    php artisan key:generate --force
fi

# Clear caches
php artisan config:cache
php artisan view:cache
php artisan route:cache

# Create storage directories if they don't exist
mkdir -p storage/logs
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views

# Fix permissions
chmod -R 775 storage bootstrap/cache

echo "Laravel application ready!"
