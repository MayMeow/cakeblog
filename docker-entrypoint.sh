#!/bin/bash
set -e

# Ensure db/tmp/logs directories exist and are writable
mkdir -p db tmp logs
chown -R www-data:www-data tmp logs db
chmod -R 777 tmp logs

# Clear cache
bin/cake cache clear_all

# Run migrations
echo "Running database migrations..."
if ! bin/cake migrations migrate; then
    echo "Migration failed! Attempting to create database file first..."
    touch db/database.sqlite
    chown www-data:www-data db/database.sqlite
    bin/cake migrations migrate
fi

# Execute the passed command (apache2-foreground)
exec apache2-foreground
