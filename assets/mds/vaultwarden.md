# UPDATE SYSTEM AND INSTALL DOCKER
```bash
sudo apt update
sudo apt install -y docker.io docker-compose-plugin
sudo systemctl enable --now docker
```

# CHECK DOCKER VERSION
```bash
docker version
docker compose version   # (or `docker-compose version`)
```

# VAULTWARDEN
```bash
sudo mkdir -p ~/~vaultwarden
sudo chown $USER:$USER ~/~vaultwarden
cd ~/~vaultwarden
```

# CREATE THE COMPOSE YML
```bash
sudo nano ~/~vaultwarden/docker-compose.yml
```

```bash
# ~/~vaultwarden/docker-compose.yml
services:
  vaultwarden:
    image: vaultwarden/server:latest
    container_name: vaultwarden
    restart: unless-stopped
    environment:
      - DOMAIN=https://vault.jpbgomes.com
      - SIGNUPS_ALLOWED=false
      - WEBSOCKET_ENABLED=true
      - ADMIN_TOKEN=admin_token
      - SMTP_HOST=smtp.gmail.com
      - SMTP_PORT=587
      - SMTP_SECURITY=starttls
      - SMTP_FROM=jpbgomesbusiness@gmail.com
      - SMTP_USERNAME=jpbgomesbusiness@gmail.com
      - SMTP_PASSWORD=smtp_password
    volumes:
      - ./vw-data:/data
    ports:
      - "127.0.0.1:9999:80"      # Porta alterada para 9999 (interno)
      - "127.0.0.1:3012:3012"    # WebSocket para notificações
```

# CREATE AND START THE DOCKER
```bash
docker compose pull
docker compose up -d
```

# ACTIVATE APACHE REVERSE PROXY
```bash
sudo a2enmod proxy proxy_http proxy_wstunnel ssl rewrite
sudo systemctl restart apache2
```

# CREATE THE VAULT APACHE CONF
```bash
sudo nano /etc/apache2/sites-available/vault.jpbgomes.com.conf
```

```bash
<VirtualHost *:80>
    ServerName vault.jpbgomes.com

    ProxyPreserveHost On
    ProxyRequests Off

    # Allow Let's Encrypt HTTP-01 challenges to reach Vaultwarden
    ProxyPass /.well-known/acme-challenge/ !

    # Proxy WebSocket traffic for notifications
    ProxyPass /notifications/hub ws://127.0.0.1:3012/notifications/hub
    ProxyPassReverse /notifications/hub ws://127.0.0.1:3012/notifications/hub

    # Main Vaultwarden interface (HTTP)
    ProxyPass / http://127.0.0.1:8000/
    ProxyPassReverse / http://127.0.0.1:8000/
</VirtualHost>
```

# ACTIVATE THE APACHE FILE
```bash
sudo a2ensite vault.jpbgomes.com.conf
sudo apache2ctl configtest
sudo systemctl reload apache2
```

# ACTIVATE THE SSL CERTIFICATES
```bash
sudo apt install -y certbot python3-certbot-apache
sudo certbot --apache -d vault.jpbgomes.com
```