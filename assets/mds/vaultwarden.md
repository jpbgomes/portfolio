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

# AUTOMATING BACKUPS
```bash
nano backup-vaultwarden.sh
```

```bash
#!/bin/bash

# Set paths
VAULTWARDEN_DIR="$HOME/vaultwarden"
DATA_DIR="$VAULTWARDEN_DIR/vw-data"
BACKUP_NAME="vaultwarden-backup-$(date +%F_%H-%M-%S).tar.gz"
DEVICE="/dev/sda1"
MOUNT_POINT="/media/jpbgomes/KINGSTON"
BACKUP_DIR="$MOUNT_POINT/vault-backups"
BACKUP_DEST="$BACKUP_DIR/$BACKUP_NAME"

echo "🔄 Unmounting external disk if mounted..."
sudo umount $MOUNT_POINT 2>/dev/null || true

echo "📁 Creating mount point if it doesn't exist..."
if [ ! -d "$MOUNT_POINT" ]; then
    sudo mkdir -p "$MOUNT_POINT"
    if [ $? -ne 0 ]; then
        echo "❌ Failed to create mount point $MOUNT_POINT"
        exit 1
    fi
fi

echo "🔌 Mounting external disk..."
if ! sudo mount $DEVICE $MOUNT_POINT; then
    echo "❌ Failed to mount $DEVICE to $MOUNT_POINT"
    exit 1
fi

echo "📁 Creating backup directory if it doesn't exist..."
sudo mkdir -p $BACKUP_DIR

echo "🔄 Stopping Vaultwarden container..."
cd "$VAULTWARDEN_DIR" || exit 1
sudo docker-compose down

echo "📦 Creating backup..."
sudo tar -czvf "$BACKUP_DEST" -C "$VAULTWARDEN_DIR" vw-data

echo "✅ Backup created at: $BACKUP_DEST"

echo "🚀 Starting Vaultwarden container..."
sudo docker-compose up -d

echo "🔌 Unmounting external disk..."
if ! sudo umount $MOUNT_POINT; then
    echo "❌ Failed to unmount $MOUNT_POINT"
    exit 1
fi

echo "🎉 Backup complete!"
```

```bash
chmod +x ~/Desktop/backup-vaultwarden.sh
bash ~/Desktop/backup-vaultwarden.sh
```

```bash
sudo mkdir /media/jpbgomes
sudo chown jpbgomes:jpbgomes /media/jpbgomes
```

```bash
ls -ld /media/jpbgomes
sudo mount /dev/sda1 /media/jpbgomes/KINGSTON
ls -lh /media/jpbgomes/KINGSTON/vault-backups
sudo umount /media/jpbgomes/KINGSTON
```
