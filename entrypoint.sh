#!/bin/bash

echo "Waiting for MySQL to be ready..."
while ! nc -z akaunting-db 3306; do   
  sleep 2
  echo "Still waiting for Database..."
done
echo "Database is ready!"

chown -R www-data:www-data /var/www/html/storage

if [ ! -f /var/www/html/storage/installed ]; then
    echo "Starting Auto Installation..."
    
    php artisan install \
        --db-host=akaunting-db \
        --db-name=akaunting \
        --db-username=akaunting \
        --db-password=akaunting_pass \
        --admin-email=admin@company.com \
        --admin-password=password123 \
        --locale=en-GB \
        --company-name="My Company" \
        --company-email="company@test.com"
    
    touch /var/www/html/storage/installed
    echo "Installation Completed Successfully!"
else
    echo "Akaunting is already installed. Skipping..."
fi

exec apache2-foreground