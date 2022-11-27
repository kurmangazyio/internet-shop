FROM php:8.0-fpm

# Copy composer.lock and composer.json into the working directory
COPY composer.lock composer.json /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Install dependencies for the operating system software
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libaio1 \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    libzip-dev \
    unzip \
    git \
    libonig-dev \
    curl \
    g++ \
    libicu-dev \
    libpq-dev \
    lftp \
    wget \
    zlib1g-dev

# Install composer (php package manager)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -LsS https://codeception.com/codecept.phar -o /usr/local/bin/codecept && chmod a+x /usr/local/bin/codecept

RUN docker-php-ext-install intl opcache pdo pdo_pgsql pgsql mbstring zip exif pcntl
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd


# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy existing application directory contents to the working directory
COPY . /var/www/html

# Assign permissions of the working directory to the www-data user
RUN chown -R www-data:www-data \
        /var/www/html/storage/ \
        /var/www/html/bootstrap/cache

# Expose port 9000 and start php-fpm server (for FastCGI Process Manager)
EXPOSE 9000
CMD ["php-fpm"]
