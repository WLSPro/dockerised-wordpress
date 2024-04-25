# Use the official WordPress image
FROM wordpress:latest

# Update package lists and install MariaDB client
RUN apt-get update && \
    apt-get install -y mariadb-client && \
    rm -rf /var/lib/apt/lists/*

# Install wp-cli for command-line interaction with WordPress
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && chmod +x wp-cli.phar \
    && mv wp-cli.phar /usr/local/bin/wp

# # Copy the setup script to the container
COPY setup-wp.sh /usr/local/bin/setup-wp.sh
RUN chmod +x /usr/local/bin/setup-wp.sh

# # Run the setup script at container startup
# ENTRYPOINT ["setup-wp.sh"]
# CMD ["apache2-foreground"]
