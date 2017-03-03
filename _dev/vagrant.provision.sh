# /_dev/vagrant.provision.sh - Vagrant provision file
# ----- Update system
echo '################ UPDATING SYSTEM ################'
sudo apt-get update -q
sudo apt-get upgrade -qqy

# Leaving out timezone since we all have a different one.
#timedatectl set-timezone Europe/Brussels

# ----- Install MySQL
echo '################ INSTALLING MYSQL ################'
debconf-set-selections <<< "mysql-server mysql-server/root_password password root"
debconf-set-selections <<< "mysql-server mysql-server/root_password_again password root"
sudo apt-get install -qqy mysql-server

sed -i "s/skip-external-locking/#skip-external-locking/g" /etc/mysql/mysql.conf.d/mysqld.cnf
sed -i "s/bind-address.*/bind-address = 0.0.0.0/" /etc/mysql/mysql.conf.d/mysqld.cnf
sudo service mysql restart

mysql -uroot -proot <<EOF
CREATE USER 'pipeline'@'localhost' IDENTIFIED BY '99f6f4be0908f24bb4a22a4ffb277da4';
CREATE USER 'pipeline'@'%' IDENTIFIED BY '99f6f4be0908f24bb4a22a4ffb277da4';
GRANT ALL PRIVILEGES ON *.* TO 'pipeline'@'localhost';
GRANT ALL PRIVILEGES ON *.* TO 'pipeline'@'%';
RENAME USER 'root'@'localhost' TO 'root'@'%';
FLUSH PRIVILEGES;
CREATE DATABASE IF NOT EXISTS pipeline CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci';
EOF

if [ -f /vagrant/_dev/dump.sql ]; then
    cat /vagrant/_dev/dump.sql | mysql -uroot -proot pipeline
else
	echo '[PROVISION NOTICE] No SQL dump was found'
fi

# ----- Install apache2
echo '################ INSTALLING APACHE2 ################'
sudo apt-get install -qqy apache2
rm /etc/apache2/sites-available/000-default.conf
cp /vagrant/_dev/apache2/000-default.conf /etc/apache2/sites-available/

# ----- Install PHP
echo '################ INSTALLING PHP ################'
sudo apt-get install -yqq php php-fpm php-mysql php-curl php-json php-gd php-mcrypt php-intl php-sqlite3 php-gmp php-mbstring php-xml php-zip php-geoip php-apcu php-apcu php-xdebug php-codesniffer libapache2-mod-php7.0

sed -i "s/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/g" /etc/php/7.0/fpm/php.ini
sed -i "s/listen.owner = www-data/listen.owner = ubuntu/g" /etc/php/7.0/fpm/pool.d/www.conf
sed -i "s/listen.group = www-data/listen.group = ubuntu/g" /etc/php/7.0/fpm/pool.d/www.conf
sudo service php7.0-fpm restart

echo '################ SETUP LOGS ################'
mkdir -p /vagrant/logs
chown -R ubuntu: /vagrant/logs

# ----- Add some aliases to bashrc
echo '################ ADD BASH ALIASES ################'
echo -en "
alias c='clear'
alias tree=\"find . | sed 's/[^/]*\//|   /g;s/| *\([^| ]\)/+--- \1/'\"
alias l='ls -Falh'
alias duh='du -h --max-depth=1'
alias rm='rm -I'
alias ..='cd ..'
alias ...='cd ~-'
cd /vagrant
" >> /home/ubuntu/.bashrc

sudo /etc/init.d/apache2 restart