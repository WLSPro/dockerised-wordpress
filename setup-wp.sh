#!/bin/bash

# Wait for MariaDB to be ready
until mysqladmin ping -h"$WORDPRESS_DB_HOST" --silent; do
    echo 'waiting for mariadb'
    sleep 1
done

wp core download --allow-root --path=/var/www/html

wp config create --dbname=$WORDPRESS_DB_NAME --dbuser=$WORDPRESS_DB_USER --dbpass=$WORDPRESS_DB_PASSWORD --dbhost=$WORDPRESS_DB_HOST --allow-root --extra-php <<PHP
    /* Enable SSL */
    define('FORCE_SSL_ADMIN', true);

    if( isset(\$_SERVER['HTTP_X_FORWARDED_PROTO']) && strpos( \$_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false )
        \$_SERVER['HTTPS'] = 'on';
PHP

wp core install --url="localhost" \
                    --title="$WORDPRESS_TITLE" \
                    --admin_user="$WORDPRESS_ADMIN_USER" \
                    --admin_password="$WORDPRESS_ADMIN_PASSWORD" \
                    --admin_email="admin@example.com" \
                    --skip-email \
                    --allow-root --path=/var/www/html

# Activate custom theme
wp theme activate $WORDPRESS_THEME --allow-root --path=/var/www/html

# Start Apache in the foreground
exec "$@"