#!/usr/bin/env bash

docker-compose up -d --remove-orphans;

echo 'install composer';
docker-compose exec --user="root" webserver php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
docker-compose exec --user="root" webserver php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
docker-compose exec --user="root" webserver php composer-setup.php;
docker-compose exec --user="root" webserver php -r "unlink('composer-setup.php');"
docker-compose exec --user="root" webserver mv /var/www/html/composer.phar /usr/local/bin/composer;

docker-compose exec --user="root" webserver cd /var/www ; composer install;

echo 'install sqlite commandline';
docker-compose exec --user="root" webserver apt-get update;
docker-compose exec --user="root" webserver apt-get install -y sqlite3;
docker-compose exec --user="root" webserver sqlite3 /var/www/storage/storage.sqlite3 "VACUUM;"; 

docker-compose exec --user="root" webserver a2enmod rewrite;
docker-compose exec --user="root" webserver service apache2 restart;
./start.sh;