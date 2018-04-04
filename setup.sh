#!/bin/bash

echo "              +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++"
echo "              |                                                                   |"
echo "              | Setting up your machine for some good hacking. Please be patient! |"
echo "              |                                                                   |"
echo "              +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++"
echo ""
echo ""
read -n 1 -s -r -p "Press any key to continue the setup..."
sudo tar -xvzf hackme.tar.gz
cd bash-3.1 && sudo ./configure
sudo make
echo "========================================================"
echo "Setting up the cgi-bin for dynamic content on the server..."
cd .. && mv bash-3.1 hackme
sudo touch server-ip.shtml
sudo chmod 777 server-ip.shtml
cd /etc/apache2/mods-enabled
sudo ln -s ../mods-available/cgi.load
echo ""
echo "========================================================"
echo "Setting up the dynamic content:"
cd - && cp myserver.sh /usr/lib/cgi-bin/
sudo chmod +x /usr/lib/cgi-bin/myserver.sh
echo ""
echo "========================================================"
echo "Writing apache2.conf for configuration. [if it fails in this step, please revert apache2.conf from apache2.conf.backup in the same folder."
sudo cp /etc/apache2/apache2.conf /etc/apache2/apache2.conf.backup
sudo /bin/cat <<EOF >> "/etc/apache2/apache2.conf"
<Directory /var/www/html/dvwa/vulnerabilities/spc/>
Options +Includes
</Directory>

AddType text/html .shtml
AddHandler server-parsed .shtml
EOF
echo "*******Successfully written apache2.conf*******"
echo ""
cd /etc/apache2/mods-enabled
sudo ln -s ../mods-available/include.load
echo "*******Dynamic Content configured successfully*******"
echo ""
echo "========================================================"
echo "Reloading the Apache server for configuration changes..."
sudo service apache2 reload
echo ""
echo "Apache reload successful..."
echo ""
echo ""
echo "              ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++"
echo "              |                                                        |"
echo "              |You are ready to go! SHOW me your hacking skills . . . .|"
echo "              |                                                        |"
echo "              ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++"

