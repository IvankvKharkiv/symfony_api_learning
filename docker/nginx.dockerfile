FROM nginx

ADD  docker/conf/vhost.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/symfony_api_learning.com