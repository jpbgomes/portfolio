# STEP-TO-STEP FOR ESSENCIALS

## Ubuntu Update and Upgrade
```bash
sudo apt-get update && sudo apt-get upgrade
```

## Change Swap Value
```bash
sudo dphys-swapfile swapoff
sudo nano /etc/dphys-swapfile
```

```bash
CONF_SWAPSIZE=2048
```

```bash
sudo dphys-swapfile setup
sudo dphys-swapfile swapon
```

## Install Git
```bash
sudo apt-get install git
```

## Install PHP
```bash
sudo add-apt-repository ppa:ondrej/php
sudo apt policy php

sudo apt install php8.4 -y
sudo apt install php8.4-common php8.4-cli php8.4-opcache php8.4-mysql php8.4-xml php8.4-curl php8.4-zip php8.4-mbstring php8.4-gd php8.4-intl php8.4-bcmath -y
```

## Install Composer
```bash
https://getcomposer.org/download/
```

## Install NodeJS e NPM
```bash
sudo apt install -y nodejs npm
```

## Automated Backups
```bash
nano backup-pi-full.sh
```

```bash
#!/bin/bash

# Set paths
DEVICE="/dev/sda1"
MOUNT_POINT="/media/jpbgomes/KINGSTON"
BACKUP_DIR="$MOUNT_POINT/pi-backups"
BACKUP_NAME="pi-full-backup-$(date +%F_%H-%M-%S).img.gz"
BACKUP_DEST="$BACKUP_DIR/$BACKUP_NAME"
SOURCE_DISK="/dev/nvme0n1"

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

echo "📦 Creating full disk backup of $SOURCE_DISK..."
if ! sudo dd if=$SOURCE_DISK bs=4M status=progress | gzip > "$BACKUP_DEST"; then
    echo "❌ Failed to create backup"
    sudo umount $MOUNT_POINT
    exit 1
fi

echo "✅ Backup created at: $BACKUP_DEST"

echo "🔌 Unmounting external disk..."
if ! sudo umount $MOUNT_POINT; then
    echo "❌ Failed to unmount $MOUNT_POINT"
    exit 1
fi

echo "🎉 Full system backup complete!"
```

```bash
chmod +x ~/Desktop/backup-pi-full.sh
sudo bash ~/Desktop/backup-pi-full.sh
```

```bash
sudo mount /dev/sda1 /media/jpbgomes/KINGSTON
ls -lh /media/jpbgomes/KINGSTON/pi-backups
sudo umount /media/jpbgomes/KINGSTON
```

```bash
# Full Pi backup on the 1st of each month at 3:00 AM
0 3 1 * * /bin/bash /home/jpbgomes/Desktop/backup-pi-full.sh >> /home/jpbgomes/pi-backup.log 2>&1

# Full Pi backup on the 15th of each month at 3:00 AM
0 3 15 * * /bin/bash /home/jpbgomes/Desktop/backup-pi-full.sh >> /home/jpbgomes/pi-backup.log 2>&1
```

## Others

[Fail2Ban](./assets/mds/fail2ban.md)

[MariaDB](./assets/mds/mariadb.md)

[VaultWarden](./assets/mds/vaultwarden.md)
