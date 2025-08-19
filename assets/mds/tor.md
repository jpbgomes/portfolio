# INSTALL TOR
```bash
sudo apt install tor -y
```

# CHECK THE STATUS
```bash
systemctl status tor
```

# INSTALL EDIT THE FILE
```bash
sudo nano /etc/tor/torrc
```

# ADD THIS LINES OR UNCOMMENT IT
```bash
HiddenServiceDir /var/lib/tor/hidden_service/
HiddenServicePort 80 127.0.0.1:80
```

# CHECK THE ONION ADDRESS
```bash
sudo cat /var/lib/tor/hidden_service/hostname
```
