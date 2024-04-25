#!/bin/bash
set -eu

# Wait for MariaDB to be ready
until mysqladmin ping -h"$WORDPRESS_DB_HOST" --silent; do
    sleep 1
done

# Check if WordPress is already installed, install if not
if ! $(wp core is-installed --allow-root); then
    wp core install --url="$(hostname --ip-address)" \
                    --title="$WORDPRESS_TITLE" \
                    --admin_user="$WORDPRESS_ADMIN_USER" \
                    --admin_password="$WORDPRESS_ADMIN_PASSWORD" \
                    --admin_email="$WORDPRESS_ADMIN_USER@example.com" \
                    --skip-email \
                    --allow-root

    # Activate custom theme
    wp theme activate home-improvement --allow-root
fi
