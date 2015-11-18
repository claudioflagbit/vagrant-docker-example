FROM ubuntu:14.04

RUN apt-get update && apt-get install -y ca-certificates curl ssl-cert apache2 libapache2-mod-php5

ADD dockerdocker.conf /etc/apache2/sites-available/

RUN a2enmod ssl
RUN a2enmod rewrite
RUN a2enmod proxy_fcgi
RUN a2dismod mpm_event
RUN a2enmod mpm_prefork

RUN make-ssl-cert generate-default-snakeoil --force-overwrite

RUN ln -s /etc/apache2/sites-available/dockerdocker.conf /etc/apache2/sites-enabled/dockerdocker.conf
RUN rm /etc/apache2/sites-enabled/*default*

RUN usermod -u 1000 www-data

EXPOSE 80
EXPOSE 443

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]