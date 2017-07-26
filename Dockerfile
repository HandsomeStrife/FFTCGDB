FROM lamp_base:latest
MAINTAINER Nick Fraker <nickdontspam@gmail.com

# Add files
COPY . /tmp/FFTCG

# Setup application
RUN rm -rf /var/www &&\
mv /tmp/FFTCG /var/www &&\
composer install -d /var/www &&\
mv /var/www/.env.example /var/www/.env &&\
sed -i -n '/.*REDIS.*/!p' /var/www/.env &&\
sed -i -n '/.*MAIL.*/!p' /var/www/.env &&\
sed -i -n '/.*PUSHER.*/!p' /var/www/.env &&\
sed -i 's/DB_DATABASE=.*/DB_DATABASE=fftcgdb/g' /var/www/.env &&\
sed -i 's/DB_USERNAME=.*/DB_USERNAME=root/g' /var/www/.env &&\
sed -i 's/DB_PASSWORD=.*/DB_PASSWORD=/g' /var/www/.env &&\
sed -i 's|/var/www/html|/var/www/public|g' /etc/apache2/sites-enabled/* &&\
(cd /var/www && php artisan key:generate) &&\
sed -i 's/.*max_input_vars = .*/max_input_vars = 65534/g' /etc/php/5.6/apache2/php.ini &&\
echo "log_errors = On" >> /etc/php/5.6/apache2/php.ini &&\
echo "error_reporting = E_ALL" >> /etc/php/5.6/apache2/php.ini &&\

# Prime database
service mysql start &&\
mysql -u root -e "CREATE DATABASE fftcgdb /*\!40100 DEFAULT CHARACTER SET utf8 */;" &&\
mysql -u root -D fftcgdb < /var/www/fftcgdb.sql &&\
(cd /var/www && php artisan migrate) &&\
mysql -u root -D fftcgdb < /var/www/cards.sql &&\
chown -R www-data:www-data /var/www &&\
rm -rf /var/www/*.sql
