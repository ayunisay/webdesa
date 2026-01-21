#!/bin/bash
set -e

echo "Installing dependencies..."
npm install

echo "Building assets..."
npm run build

echo "Clearing Laravel cache..."
php artisan config:clear || true
php artisan view:clear || true
php artisan cache:clear || true

echo "Build completed!"
