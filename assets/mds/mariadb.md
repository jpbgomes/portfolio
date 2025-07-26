# INSTALL MARIADB E CREATE USER
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