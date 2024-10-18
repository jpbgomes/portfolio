# OTHER SETUPS


## Install PLEX
```
sudo apt update
sudo apt upgrade -y
```

```
sudo apt install -y apt-transport-https ca-certificates curl
```

```
curl https://downloads.plex.tv/plex-keys/PlexSign.key | sudo gpg --dearmor -o /usr/share/keyrings/plex.gpg
echo "deb [signed-by=/usr/share/keyrings/plex.gpg] https://downloads.plex.tv/repo/deb public main" | sudo tee /etc/apt/sources.list.d/plexmediaserver.list
sudo apt update
sudo apt install -y plexmediaserver
```

```
sudo systemctl enable plexmediaserver
sudo systemctl start plexmediaserver
sudo systemctl status plexmediaserver
```

```
sudo ufw allow 32400
```

```
http://jpbgomes.ddns.net:32400/web
```