#!/bin/bash

echo "========================================="
echo "   Laravel Blog Project Startup"
echo "========================================="
echo ""

# Check if composer is installed
if ! command -v composer &> /dev/null; then
    echo "Error: composer is not installed. Please install composer first."
    exit 1
fi

# Check if PHP is installed
if ! command -v php &> /dev/null; then
    echo "Error: PHP is not installed. Please install PHP first."
    exit 1
fi

echo "1. Checking dependencies..."
if [ ! -d "vendor" ]; then
    echo "   Installing PHP dependencies..."
    composer install
else
    echo "   PHP dependencies already installed."
fi

echo ""
echo "2. Setting up environment..."
if [ ! -f ".env" ]; then
    echo "   Creating .env file..."
    cp .env.example .env
    echo "   Generating application key..."
    php artisan key:generate
else
    echo "   .env file already exists."
fi

echo ""
echo "3. Setting proper permissions..."
chmod -R 775 storage bootstrap/cache
chmod +x artisan

echo ""
echo "4. Migrating database..."
php artisan migrate --force

echo ""
echo "5. Seeding database with sample data..."
php artisan db:seed --class=BlogSeeder --force

echo ""
echo "========================================="
echo "   Setup complete!"
echo "========================================="
echo ""
echo "Test accounts (password: password123):"
echo "  - admin@example.com (Admin)"
echo "  - jane@example.com (Author)"
echo "  - john@example.com (Author)"
echo "  - bob@example.com (User)"
echo ""
echo "To start the development server, run:"
echo "  php artisan serve"
echo ""
echo "Or you can use this script with the --serve flag:"
echo "  ./startup.sh --serve"
echo ""

# Check if --serve flag is provided
if [ "$1" = "--serve" ]; then
    echo "Starting development server..."
    php artisan serve
fi

