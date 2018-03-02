FROM khs1994/php-fpm:7.2.2-alpine3.7

RUN git clone --recursive https://github.com/khs1994-php/tencent-ai.git /root/khs1994-php/tencent-ai \
    && cd /root/khs1994-php/tencent-ai \
    && composer install -q \
    && composer update -q \
    && vendor/bin/phpunit
