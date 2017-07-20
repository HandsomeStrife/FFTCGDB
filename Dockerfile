FROM ubuntu:latest
MAINTAINER Nick Fraker <nickdontspam@gmail.com

# Setup environment
EXPOSE 80 443
CMD ["/bin/sh", "-c", "/startup.sh"]
ENV TERM=xterm LANG=C.UTF-8 

# Add files
COPY . /tmp/FFTCG

# Update & install
RUN apt-get update -y &&\ 
DEBIAN_FRONTEND=noninteractive apt-get install -y software-properties-common &&\
add-apt-repository ppa:ondrej/php -y &&\
apt-get update -y && \
DEBIAN_FRONTEND=noninteractive apt-get install -y apache2 \
                   libapache2-mod-php5.6 \
                   php5.6 \
                   php5.6-mcrypt \
                   php5.6-mysql \
                   php5.6-gd \
                   php5.6-curl \
                   php5.6-dev \
                   php5.6-memcache \
                   php5.6-pspell \
                   php5.6-snmp \
                   php5.6-mbstring \
                   php5.6-dom \
                   php5.6-xmlrpc \
                   php5.6-cli \
                   snmp \
                   vim \
                   bash-completion \
                   mysql-client \
                   mysql-server \
                   supervisor \
                   passwd \
                   composer \
                   unzip &&\
apt-get clean &&\

# Setup application
rm -rf /var/www &&\
mv /tmp/FFTCG /var/www &&\
ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load &&\
unlink /etc/apache2/mods-enabled/autoindex.load &&\
sed -i 's/Options.*/Options FollowSymLinks/g' /etc/apache2/apache2.conf &&\
sed -i 's/AllowOverride.*/AllowOverride All/g' /etc/apache2/apache2.conf &&\
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

# Start services
echo "service networking start && service mysql start && exec /usr/sbin/apache2ctl -D FOREGROUND" > /startup.sh &&\
chmod +x /startup.sh &&\
service mysql start &&\
mkdir -p /var/lock/apache2 /var/run/apache2 /var/log/apache2 &&\
chown -R www-data:www-data /var/lock/apache2 /var/run/apache2 /var/log/apache2 /var/www &&\

# Prime database
mysql -u root -e "CREATE DATABASE fftcgdb /*\!40100 DEFAULT CHARACTER SET utf8 */;" &&\
mysql -u root -D fftcgdb < /var/www/fftcgdb.sql &&\
(cd /var/www && php artisan migrate) &&\

# Force resolv.conf
echo "nameserver 172.17.0.1" > /etc/resolv.conf &&\
echo "nameserver 8.8.8.8" >> /etc/resolv.conf &&\
echo "nameserver 8.8.4.4" >> /etc/resolv.conf &&\

# Forward Apache logs to stdout
ln -sf /proc/self/fd/1 /var/log/apache2/access.log && \
ln -sf /proc/self/fd/1 /var/log/apache2/error.log
