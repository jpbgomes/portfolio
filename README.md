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
