# OTHER SETUPS

## Configure DDNS Using Cloudflare

```
git clone https://github.com/K0p1-Git/cloudflare-ddns-updater.git

sudo cp cloudflare-template.sh cloudflare.sh

sudo chmod +x cloudflare.sh
./cloudflare.sh

crontab -e
*/1 * * * * /bin/bash /home/jpbgomes/Downloads/cloudflare-ddns-updater/cloudflare.sh
sudo systemctl restart cron
```
