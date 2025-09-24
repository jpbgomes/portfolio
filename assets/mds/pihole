# INSTALL PI-HOLE VIA DOCKER
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
