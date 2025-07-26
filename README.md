# STEP-TO-STEP

## Ubuntu Update and Upgrade
```
sudo apt-get update && sudo apt-get upgrade
```

## Install Git
```
sudo apt-get install git
```

## Install PHP
```
sudo add-apt-repository ppa:ondrej/php
sudo apt policy php

sudo apt install php8.4 -y
sudo apt install php8.4-common php8.4-cli php8.4-opcache php8.4-mysql php8.4-xml php8.4-curl php8.4-zip php8.4-mbstring php8.4-gd php8.4-intl php8.4-bcmath -y
```

## Install Composer

## Install NodeJS e NPM
```
sudo apt install -y nodejs npm
```

## Install MariaDB e Create User
```
sudo apt install mariadb-server -y

sudo systemctl start mariadb
sudo systemctl enable mariadb

sudo mysql_secure_installation
```

```
CREATE DATABASE nome_da_basedados;
CREATE USER 'nome_do_user'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON nome_da_basedados.* TO 'nome_do_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

## Pi-hole Docker Installation

### 1. Install Docker and Docker Compose

```bash
curl -sSL https://get.docker.com | sh
sudo usermod -aG docker $USER
# Logout or reboot to apply group changes
```

### 2. Create Pi-hole working directory

```bash
mkdir -p ~/Pihole
cd ~/Pihole
```

### 3. Create `docker-compose.yml`

```yaml
version: '3'

services:
  pihole:
    container_name: pihole
    image: pihole/pihole:latest
    ports:
      - "53:53/tcp"
      - "53:53/udp"
      - "9999:80/tcp"
    environment:
      TZ: "Europe/Lisbon"
      FTLCONF_webserver_api_password: "your_secure_password"
    volumes:
      - "./etc-pihole:/etc/pihole"
      - "./etc-dnsmasq.d:/etc/dnsmasq.d"
    cap_add:
      - NET_ADMIN
    restart: unless-stopped
```

### 4. Start Pi-hole

```bash
cd ~/Pihole
docker compose up -d
```

### 5. Open Firewall Ports

```bash
sudo ufw allow 53
sudo ufw allow 9999/tcp
```
