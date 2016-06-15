sudo chmod -R 777 var
php bin/console cache:clear
php bin/console cache:clear -e prod
