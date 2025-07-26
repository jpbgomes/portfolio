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
```
https://getcomposer.org/download/
```

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

## Install Fail2ban

```bash
sudo apt install fail2ban -y
sudo systemctl enable fail2ban
sudo systemctl start fail2ban
sudo systemctl status fail2ban
```

```bash
sudo cp /etc/fail2ban/jail.conf /etc/fail2ban/jail.local
sudo nano /etc/fail2ban/jail.local
```

```
[sshd]

# To use more aggressive sshd modes set filter parameter "mode" in jail.local:
# normal (default), ddos, extra or aggressive (combines all).
# See "tests/files/logs/sshd" or "filter.d/sshd.conf" for usage example and details.
#mode   = normal
enabled = true
port    = ssh
logpath = %(sshd_log)s
#backend = %(sshd_backend)s
backend = systemd
```

```bash
sudo systemctl restart fail2ban
```

- ### See Status / Banned IP´s
```bash
cat  /var/log/fail2ban.log
sudo fail2ban-client status sshd
```

- ### Unban a Specific IP
```bash
sudo fail2ban-client set sshd unbanip <IP_ADDRESS>
```

- ### Ban a Specific IP
```bash
sudo fail2ban-client set sshd banip <IP_ADDRESS>
```

## Install Pi-hole via Docker

```bash
curl -sSL https://get.docker.com | sh
sudo usermod -aG docker $USER
# Logout or reboot to apply group changes
```

```bash
mkdir -p ~/Pihole
cd ~/Pihole
```

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

```bash
cd ~/Pihole
docker compose up -d
```

```bash
sudo ufw allow 53
sudo ufw allow 9999/tcp
```
