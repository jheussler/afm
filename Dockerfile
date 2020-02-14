FROM webdevops/php-apache:7.3

# Install Xdebug extension
RUN pecl install xdebug
RUN echo zend_extension=xdebug.so > /usr/local/etc/php/conf.d/xdebug.ini

RUN mkdir -p /var/log/apache2

COPY ./docker/conf/httpd/default.conf /opt/docker/etc/httpd/vhost.common.d/afm.conf
COPY ./docker/conf/php/custom.ini /opt/docker/etc/php/php.ini

RUN ln -snf /usr/share/zoneinfo/Europe/Paris /etc/localtime
RUN echo "Europe/Paris" > /etc/timezone

USER application

COPY --chown=application:application . /app

WORKDIR /app

RUN composer global require hirak/prestissimo
RUN composer install

