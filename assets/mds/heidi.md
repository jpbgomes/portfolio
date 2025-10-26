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
CREATE USER 'dev'@'%' IDENTIFIED BY 'YLiQ~X4qw,Mar-yv';
GRANT ALL PRIVILEGES ON *.* TO 'dev'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;
EXIT;
```

---

### 4️⃣ HeidiSQL Connection Settings

| Field | Value |
|-------|-------|
| Network type | MariaDB or MySQL (TCP/IP) |
| Hostname / IP | Your server LAN or public IP |
| Port | 3306 |
| User | dev |
| Password | (your password above) |

---

## 🔒 Security Notes (Important!)

Restrict user to only local network (much safer):
```sql
CREATE USER 'dev'@'192.168.1.%' IDENTIFIED BY 'YourStrongPassword';
GRANT ALL PRIVILEGES ON *.* TO 'dev'@'192.168.1.%';
FLUSH PRIVILEGES;
```

Restrict to singletrusted IP:
```sql
CREATE USER 'dev'@'YOUR_PC_IP' IDENTIFIED BY 'YourStrongPassword';
GRANT ALL PRIVILEGES ON *.* TO 'dev'@'YOUR_PC_IP';
FLUSH PRIVILEGES;
```

---

## ✅ Optional: SSH Tunnel Method (Best Practice)

Keep port 3306 closed to internet — allow HeidiSQL using SSH tunnel:

```bash
ssh -L 3307:localhost:3306 youruser@your.server.ip
```

Then in HeidiSQL:
```
Host: 127.0.0.1
Port: 3307
User: dev
Password: your password
```

No firewall changes needed 👍

---

