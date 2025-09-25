# INSTALL MINECRAFT

```bash
cd ~
mkdir Minecraft
cd Minecraft
```

```bash
wget https://piston-data.mojang.com/v1/objects/6bce4ef400e4efaa63a13d5e6f6b500be969ef81/server.jar -O server.jar
java -Xms1G -Xmx1G -jar server.jar nogui
```

```bash
nano eula.txt
```

```bash
eula=true
```

```bash
wget -O server-icon.png {image_link}
```

```bash
nano server.properties
```

```bash
#Minecraft server properties
#Wed Sep 24 00:04:38 WEST 2025
accepts-transfers=false
allow-flight=false
allow-nether=true
broadcast-console-to-ops=true
broadcast-rcon-to-ops=true
bug-report-link=
difficulty=hard
enable-command-block=false
enable-jmx-monitoring=false
enable-query=false
enable-rcon=false
enable-status=false
enforce-secure-profile=true
enforce-whitelist=false
entity-broadcast-range-percentage=100
force-gamemode=true
function-permission-level=2
gamemode=survival
generate-structures=true
generator-settings={}
hardcore=false
hide-online-players=false
initial-disabled-packs=
initial-enabled-packs=vanilla
level-name=world
level-seed=
level-type=minecraft\:normal
log-ips=true
max-chained-neighbor-updates=1000000
max-players=20
max-tick-time=60000
max-world-size=29999984
motd=Minecraft Server
network-compression-threshold=256
online-mode=false
op-permission-level=4
pause-when-empty-seconds=60
player-idle-timeout=0
prevent-proxy-connections=true
pvp=true
query.port=25565
rate-limit=0
rcon.password=your_rcon_password
rcon.port=26789
region-file-compression=deflate
require-resource-pack=false
resource-pack=
resource-pack-id=
resource-pack-prompt=
resource-pack-sha1=
server-ip=
server-port=30000
simulation-distance=10
spawn-monsters=true
spawn-protection=16
sync-chunk-writes=true
text-filtering-config=
text-filtering-version=0
use-native-transport=true
view-distance=10
white-list=false
```

```bash
sudo ufw allow 30000/tcp 
sudo ufw enable
```

# START SERVER ALIAS

```bash
sudo nano ~/.bashrc
```

```bash
export PATH=$HOME/java/jdk-21.0.7/bin:$PATH
#alias startmine='cd /home/jpbgomes/Minecraft && java -Xmx2G -Xms1G -jar server.jar nogui'
alias startmine='cd /home/jpbgomes/Minecraft && java -Xmx1500M -Xms1G -jar server.jar nogui'
```

# AUTOMATIC BACKUPS

```bash
sudo nano script.sh
```

```bash
#!/bin/bash

# Variables
WORLD_DIR="$HOME/Minecraft/world"
BACKUP_DIR="$HOME/Minecraft/backups"
TIMESTAMP=$(date +"%Y-%m-%d_%H-%M-%S")
ZIP_NAME="$BACKUP_DIR/world_backup_$TIMESTAMP.zip"
MAX_BACKUPS=750

# Create backup
zip -r -q "$ZIP_NAME" "$WORLD_DIR"

# Cleanup old backups if exceeding max count
cd "$BACKUP_DIR" || exit
BACKUP_COUNT=$(ls -1 world_backup_*.zip 2>/dev/null | wc -l)

if [ "$BACKUP_COUNT" -gt "$MAX_BACKUPS" ]; then
    REMOVE_COUNT=$((BACKUP_COUNT - MAX_BACKUPS))
    ls -1tr world_backup_*.zip | head -n "$REMOVE_COUNT" | xargs rm -f
fi
```

```bash
chmod +x script.sh
```

```bash
crontab -e
```

```bash
0 */12 * * * /home/jpbgomes/Minecraft/script.sh
```