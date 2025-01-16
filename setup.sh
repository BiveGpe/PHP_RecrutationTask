#!/bin/bash

# 1. Instalacja zależności PHP
composer install

# 2. Skopiowanie pliku .env, jeśli nie istnieje
if [ ! -f .env ]; then
    cp .env.example .env
    echo "Plik .env został skopiowany z .env.example."
fi

# 3. Generowanie klucza aplikacji
php artisan key:generate

# 4.1 Utworzenie pliku database.sqlite, jeśli nie istnieje
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"

# 4.2 Migracje i seedery
php artisan migrate --seed

# 5. Instalacja zależności JavaScript
if [ -f package.json ]; then
    npm install
    npm run build
fi

echo "Aplikacja została przygotowana do uruchomienia."

# 6. Uruchomienie aplikacji
php artisan serve
