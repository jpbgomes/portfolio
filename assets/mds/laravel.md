# Laravel and Apache Config

```bash
sudo ln -s /home/jpbgomes/Desktop/jpbgomes /var/www/jpbgomes
```

```bash
sudo nano /etc/apache2/sites-available/jpbgomes.conf
```

```bash
<VirtualHost *:80>
    ServerName jpbgomes.com
    ServerAlias www.jpbgomes.com
    DocumentRoot /var/www/jpbgomes/public

    <Directory /var/www/jpbgomes>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/jpbgomes.log
    CustomLog ${APACHE_LOG_DIR}/jpbgomes.log combined
RewriteEngine on
RewriteCond %{SERVER_NAME} =jpbgomes.com [OR]
RewriteCond %{SERVER_NAME} =www.jpbgomes.com
RewriteRule ^ https://%{SERVER_NAME}%{REQUEST_URI} [END,NE,R=permanent]
</VirtualHost>
```

```bash
sudo a2ensite jpbgomes.conf
sudo apache2ctl configtest
sudo systemctl reload apache2
```

```bash
sudo certbot --apache -d jpbgomes.com -d www.jpbgomes.com
```

```bash
sudo mysql -u root -p
```

```bash
CREATE DATABASE your_database;
CREATE USER 'your_name'@'localhost' IDENTIFIED BY 'your_password';
GRANT ALL PRIVILEGES ON your_database.* TO 'your_name'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

```bash
cd /home/jpbgomes/Desktop/jpbgomes

# Give www-data (Apache/PHP user) ownership of storage and cache
sudo chown -R www-data:www-data storage bootstrap/cache

# Give proper permissions
sudo chmod -R 775 storage bootstrap/cache

sudo ln -s /home/jpbgomes/Desktop/jpbgomes /var/www/jpbgomes
```


```bash
0 4 * * * sudo php /var/www/jpbgomes/artisan backup:database >> /dev/null 2>&1
```
