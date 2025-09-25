# INSTALL FAIL2BAN

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

```bash
[sshd]

# To use more aggressive sshd modes set filter parameter "mode" in jail.local:
# normal (default), ddos, extra or aggressive (combines all).
# See "tests/files/logs/sshd" or "filter.d/sshd.conf" for usage example and details.
#mode   = normal
enabled = true
ignoreip = 127.0.0.1/8 192.168.0.0/24
port    = ssh
logpath = %(sshd_log)s
#backend = %(sshd_backend)s
backend = systemd
```

```bash
sudo systemctl restart fail2ban
```

- # SEE STATUS / BANNED IP´S
```bash
cat /var/log/fail2ban.log
sudo fail2ban-client status sshd
```

# Alias For Checking the Status
```bash
sudo nano ~/.bashrc
```

```bash
alias lsfail='cat  /var/log/fail2ban.log && sudo fail2ban-client status sshd'
```

```bash
source ~/.bashrc
```

```bash
lsfail
```

- # UNBAN A SPECIFIC IP
```bash
sudo fail2ban-client set sshd unbanip <IP_ADDRESS>
```

- # BAN A SPECIFIC IP
```bash
sudo fail2ban-client set sshd banip <IP_ADDRESS>
```
