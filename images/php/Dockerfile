FROM php:7.3-fpm-alpine

# Instalando as dependências do lumen
RUN docker-php-ext-install mbstring tokenizer mysqli pdo_mysql

# Instalando composer 
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer