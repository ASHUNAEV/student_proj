FROM	php:7.3.28-apache
#-------Замена конфигурационных файлов-------
COPY 	php.ini /usr/local/etc/php/
COPY 	000-default.conf /etc/apache2/sites-available/
COPY	ports.conf /etc/apache2/
#-------Установка модулей PostgreSQL-------
RUN	apt-get update -y &&  apt-get install -y \
libpq-dev \
net-tools \
curl \
iputils-ping \
dnsutils
RUN     docker-php-ext-install pdo
RUN 	docker-php-ext-install pdo_pgsql 
RUN 	docker-php-ext-install pgsql
#RUN     docker network create my_network
