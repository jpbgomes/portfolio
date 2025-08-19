# CREATE APACHE2 FILE E EDIT IT
```
sudo nano /etc/apache2/sites-available/jpbgomes.conf
```

# INSERT THIS INTO THE FILE
```
<VirtualHost *:80>
    ServerName jpbgomes.com
    ServerAlias www.jpbgomes.com jpbgomesljuyfhrkmczv7zg722yvo6a4q43rbedrgdvpsedy434da7yd.onion
    DocumentRoot /var/www/jpbgomes

    <Directory /var/www/jpbgomes>
        AllowOverride All
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/jpbgomes.log
    CustomLog ${APACHE_LOG_DIR}/jpbgomes.log combined
RewriteEngine on
RewriteCond %{SERVER_NAME} =jpbgomes.com [OR]
RewriteCond %{SERVER_NAME} =www.jpbgomes.com
RewriteRule ^ https://%{SERVER_NAME}%{REQUEST_URI} [END,NE,R=permanent]
</VirtualHost>
```

# ACTIVATE THE CONFIG, TEST IT AND RELOAD APACHE2
```
sudo a2ensite jpbgomes.conf
sudo apache2ctl configtest
sudo systemctl reload apache2
```

# RUN AND ACTIVATE THE SSL CERTIFICATE
```
sudo certbot --apache -d jpbgomes.com -d www.jpbgomes.com
```

# CRONTAB CODE TO AUTOMATE IT
```
sudo crontab -e
```

```
0 4 * * * certbot renew >> /var/log/certbot-renew.log 2>&1
```

# RUN THE RENEW MANUALLY
```
sudo certbot renew 2>&1 | sudo tee -a /var/log/certbot-renew.log > /dev/null
```