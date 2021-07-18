#!/bin/bash

 

# Copy configs
cp docker/web/nginx.conf /etc/nginx/nginx.conf
cp docker/web/server/local /etc/nginx/sites-enabled/default

chmod 0777 /tmp
chmod -R 0777 /var/log/php7
# Make sure storage is writable and run migrations
chmod -R 0777 storage

 

# Start processes
supervisord -n -c docker/web/supervisord.conf