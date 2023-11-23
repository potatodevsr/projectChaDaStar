FROM webdevops/php-nginx:7.4

RUN apt-get update
RUN apt-get upgrade -y
RUN curl -s https://packages.microsoft.com/keys/microsoft.asc | apt-key add -;
RUN bash -c "curl -s https://packages.microsoft.com/config/ubuntu/20.04/prod.list > /etc/apt/sources.list.d/mssql-release.list"
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# RUN mv composer.phar /usr/local/bin/composer
# RUN apt -y install composer
RUN apt update

RUN ACCEPT_EULA=Y apt -y install msodbcsql17 mssql-tools 
RUN apt -y install unixodbc-dev

RUN apt -y install gcc g++ make autoconf libc-dev pkg-config 
# RUN pecl install sqlsrv 
# RUN pecl install pdo_sqlsrv

RUN bash -c "echo extension=sqlsrv.so > /opt/docker/etc/php/php.ini" \
    bash -c "echo extension=pdo_sqlsrv.so > /opt/docker/etc/php/php.ini"

WORKDIR /app/
# RUN composer update  &&  composer fund

# CMD chmod -R 777 writable
RUN composer require phpoffice/phpspreadsheet

RUN service php-fpm restart
#ADD vhost.conf /opt/docker/etc/nginx/
RUN service nginx restart
