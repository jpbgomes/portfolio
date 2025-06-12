# Project Description

- This is a Laravel website that will serve as my personal portfolio, showcasing my vision, past projects, and the services I offer. It's designed to give you an insight into my creative journey and highlight the skills and experiences I bring to the table.

- Feel free to explore and see if this site sparks any ideas for your own work. You're more than welcome to adapt it for your own purposes or even make enhancements if you're inspired to do so! Collaboration and innovation are always encouraged here.

```
sudo php artisan config:cache
sudo php artisan view:clear
sudo php artisan config:clear
```

```
sudo chown -R daemon:daemon /var/www/jpbgomes
sudo chown -R www-data:www-data /var/www/jpbgomes/storage
sudo chown -R www-data:www-data /var/www/jpbgomes/bootstrap/cache
sudo chmod -R 775 /var/www/jpbgomes/storage
sudo chmod -R 775 /var/www/jpbgomes/bootstrap/cache
```

```
sudo composer update
sudo npm install
sudo npm run build
sudo php artisan migrate
sudo php artisan migrate:fresh --seed
```
