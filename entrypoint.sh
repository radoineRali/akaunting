#!/bin/bash
set -e

cd /var/www/html


cp .env.example .env

php artisan key:generate --force

php artisan migrate --force

php artisan install \
  --db-name="${DB_DATABASE:-akaunting}" \
  --db-username="${DB_USERNAME:-akaunting}" \
  --db-password="${DB_PASSWORD:-akaunting_pass}" \
  --admin-email="${ADMIN_EMAIL:-admin@company.com}" \
  --admin-password="${ADMIN_PASSWORD:-123456}" || true

exec apache2-foreground
