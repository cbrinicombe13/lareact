FROM alpine:3.11

ADD https://packages.whatwedo.ch/php-alpine.rsa.pub /etc/apk/keys/php-alpine.rsa.pub
RUN apk --update add ca-certificates && \
    echo "https://packages.whatwedo.ch/php-alpine/v3.11/php-7.4" >> /etc/apk/repositories


# Install software
RUN apk update && apk --no-cache add \
    nodejs \
    yarn \
    bash \
    #  php \
    #  php-cli \
    #  php-ctype \
    #  php-curl \
    #  php-dom \
    #  php-fileinfo \
    #  php-fpm \
    #  php-gd \
    #  php-imagick \
    #  php-json \
    #  php-mbstring \
    #  php-opcache \
    #  php-openssl \
    #  php-pdo \
    #  php-pdo_pgsql \
    #  php-pdo_mysql \
    #  php-simplexml \
    #  php-phar \
    #  php-mysqli \
    #  php-tokenizer \
    #  php-session \
    #  php-xmlwriter \
    #  php-zip \
    #  php-zlib \
    nginx \
    supervisor \
    curl \
    tzdata \
    zlib \
    openssh \
    chromium \
    udev \
    ttf-freefont \
    findutils \
    git \
    grep

# Create folders
RUN mkdir -p /etc/nginx/sites-enabled
RUN mkdir -p /var/www/platform

# Set timezone
RUN ln -sf \
    /usr/share/zoneinfo/Europe/London \
    /etc/localtime

# Start container
EXPOSE 80
EXPOSE 443
WORKDIR /var/www/platform
CMD ["/bin/bash", "docker/web/start.sh"]
