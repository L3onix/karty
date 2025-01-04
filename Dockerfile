FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
  git \
  unzip \
  libssl-dev \
  && docker-php-ext-install sockets

RUN pecl install openswoole && docker-php-ext-enable openswoole

WORKDIR /var/www

COPY src/ .

CMD ["php", "index.php"]
