#!/bin/bash
docker compose up -d
docker exec -it chmury-projekt-php-1 php artisan migrate --force
