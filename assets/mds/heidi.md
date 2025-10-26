# ✅ Enable Remote Access for MariaDB (HeidiSQL Access)

---

### 1️⃣ Edit MariaDB Config to Allow External Connections
```bash
sudo nano /etc/mysql/mariadb.conf.d/50-server.cnf
```

Change:
```
bind-address = 127.0.0.1
```

To:
```
bind-address = 0.0.0.0     # allow connections from anywhere (secure with firewall!)
```

Restart MariaDB:
```bash
sudo systemctl restart mariadb
```

---

### 2️⃣ Allow MariaDB Port (3306) in UFW Firewall
```bash
sudo ufw allow 3306/tcp
sudo ufw reload
```

✅ Recommended later: restrict this rule to specific IP/subnet for security

---

### 3️⃣ Create Dedicated Dev User for HeidiSQL
```bash
sudo mysql -u root
```

Then inside MariaDB:
```sql
CREATE USER 'dev'@'%' IDENTIFIED BY 'your_password';
GRANT ALL PRIVILEGES ON *.* TO 'dev'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;
EXIT;
```
