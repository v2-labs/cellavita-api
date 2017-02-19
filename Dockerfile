# Define base image
FROM ubuntu:14.04
MAINTAINER Juvenal A. Silva Jr. <juvenal.silva.jr@gmail.com>

# Install required applications
RUN apt-get -yqq update; \
	apt-get -yqq install apache2 \
						 php5-cli \
						 php5 \
						 php5-intl \
						 libapache2-mod-php5; \
	apt-get -yqq clean; \
    echo "<VirtualHost *:80>\n    ServerName cellavita-api.test\n    DocumentRoot $DOCUMENT_ROOT_ZEND/api/public\n    SetEnv APPLICATION_ENV 'development'\n    <Directory /var/www/cellavita/api/public>\n        DirectoryIndex index.php\n        AllowOverride All\n        Order allow,deny\n        Allow from all\n    </Directory>\n</VirtualHost>\n" > /etc/apache2/sites-available/cellavita_api.conf; \
    echo "<VirtualHost *:80>\n    ServerName cellavita.test\n    DocumentRoot /var/www/cellavita/web/public\n    SetEnv APPLICATION_ENV 'development'\n    <Directory $DOCUMENT_ROOT_ZEND/web/public>\n        DirectoryIndex index.php\n        AllowOverride All\n        Order allow,deny\n        Allow from all\n    </Directory>\n</VirtualHost>\n" > /etc/apache2/sites-available/cellavita_web.conf; \
    a2enmod rewrite; \
    a2dissite 000-default; \
    a2ensite cellavita_api; \
    a2ensite cellavita_web; \
    mkdir /var/www/cellavita

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2

# Port number to expose
EXPOSE 80

# Run the application
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]