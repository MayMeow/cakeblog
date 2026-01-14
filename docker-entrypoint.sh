#!/bin/bash
set -e

# If we have a database file in specific location or need init, handle it here.
# For SQLite in container, we might want to ensure the file exists or is writable.
# Note: In production with Coolify, you probably want the database to be in a volume.
# For this simple setup, we check if db exists.

if [ ! -f config/database.sqlite ]; then
    echo "Creating empty SQLite database..."
    touch config/database.sqlite
    # Run migrations if you had them (bin/cake migrations migrate)
fi

# Ensure permissions on runtime/init
chown -R www-data:www-data tmp logs config/database.sqlite

# Clear cache
bin/cake cache clear_all

# Execute the passed command (apache2-foreground)
exec apache2-foreground
