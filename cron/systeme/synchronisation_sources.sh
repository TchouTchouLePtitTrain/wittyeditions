sudo php ../../app/console assets:install
sudo php ../../app/console assetic:dump --env=prod --no-debug
sudo rm -Rf ../../app/cache/*